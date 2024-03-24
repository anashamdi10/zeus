<?php

namespace App\Repositories;

use App\Models\Slide;
use App\Traits\UploadAble;
use Illuminate\Http\UploadedFile;
use App\Contracts\SlideContract;
use Illuminate\Database\QueryException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Doctrine\Instantiator\Exception\InvalidArgumentException;

/**
 * Class CategoryRepository
 *
 * @package \App\Repositories
 */
class SlideRepository extends BaseRepository implements SlideContract
{
    use UploadAble;

    /**
     * CategoryRepository constructor.
     * @param Category $model
     */
    public function __construct(Slide $model)
    {
        parent::__construct($model);
        $this->model = $model;
    }

    /**
     * @param string $order
     * @param string $sort
     * @param array $columns
     * @return mixed
     */
    public function listSlides(string $order = 'id', string $sort = 'desc', array $columns = ['*'])
    {
        return $this->all($columns, $order, $sort);
    }

    /**
     * @param int $id
     * @return mixed
     * @throws ModelNotFoundException
     */
    public function findSlideById(int $id)
    {
        try {
            return $this->findOneOrFail($id);

        } catch (ModelNotFoundException $e) {

            throw new ModelNotFoundException($e);
        }

    }

    /**
     * @param array $params
     * @return Category|mixed
     */
    public function createSlide(array $params)
    {
        try {
            $collection = collect($params);

            $image = null;

            if ($collection->has('image') && ($params['image'] instanceof  UploadedFile)) {
                $image = $this->uploadOne($params['image'], 'slides');
            }

            $featured = $collection->has('featured') ? 1 : 0;
            $menu = $collection->has('menu') ? 1 : 0;

            $merge = $collection->merge(compact('menu', 'image', 'featured'));

            $slide = new Slide($merge->all());

            $slide->save();

            return $slide;

        } catch (QueryException $exception) {
            throw new InvalidArgumentException($exception->getMessage());
        }
    }

    /**
     * @param array $params
     * @return mixed
     */
    public function updateSlide(array $params)
    {
        $slide = $this->findSlideById($params['id']);

        $collection = collect($params)->except('_token');

        if ($collection->has('image') && ($params['image'] instanceof  UploadedFile)) {

            if ($slide->image != null) {
                $this->deleteOne($slide->image);
            }

            $image = $this->uploadOne($params['image'], 'slides');
            $merge = $collection->merge(compact('image'));
        }else{

            $merge = $collection;
        }




        $slide->update($merge->all());

        return $slide;
    }

    /**
     * @param $id
     * @return bool|mixed
     */
    public function deleteSlide($id)
    {
        $slide = $this->findSlideById($id);

        if ($slide->image != null) {
            $this->deleteOne($slide->image);
        }

        $slide->delete();

        return $slide;
    }

    /**
     * @return mixed
     */
    public function treeList()
    {
        return Slide::orderByRaw('-name ASC')
            ->get()
            ->nest()
            ->setIndent('|–– ')
            ->listsFlattened('name');
    }

    public function findBySlug($slug)
    {
        return Slide::with('products')
            ->where('slug', $slug)
            ->where('menu', 1)
            ->first();
    }
}
