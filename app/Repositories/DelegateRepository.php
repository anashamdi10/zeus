<?php

namespace App\Repositories;

use App\Models\Delegate;
use App\Contracts\DelegateContract;
use Illuminate\Database\QueryException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Doctrine\Instantiator\Exception\InvalidArgumentException;

/**
 * Class DelegateRepository
 *
 * @package \App\Repositories
 */
class DelegateRepository extends BaseRepository implements DelegateContract
{

    /**
     * DelegateRepository constructor.
     * @param Delegate $model
     */
    public function __construct(Country $model)
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
    public function listDelegates(string $order = 'id', string $sort = 'desc', array $columns = ['*'])
    {
        return $this->all($columns,$order,$sort);
    }

    /**
     * @param int $id
     * @return mixed
     * @throws ModelNotFoundException
     */
    public function findDelegateById(int $id)
    {
        try {
            return $this->findOneOrFail($id);

        } catch (ModelNotFoundException $e) {

            throw new ModelNotFoundException($e);
        }

    }

    /**
     * @param array $params
     * @return Country|mixed
     */
    public function createDelegate(array $params)
    {
        try {





            $Country =Delegate::create($params);



            return $Country;

        } catch (QueryException $exception) {
            throw new InvalidArgumentException($exception->getMessage());
        }
    }

    /**
     * @param array $params
     * @return mixed
     */
    public function updateDelegate(array $params)
    {
        $Country = $this->findDelegateById($params['id']);



        $Country->update($params);

        return $Country;
    }

    /**
     * @param $id
     * @return bool|mixed
     */
    public function deleteDelegate($id)
    {
        $Country = $this->findDelegateById($id);



        $Country->delete();

        return $Country;
    }

    /**
     * @return mixed
     */



}
