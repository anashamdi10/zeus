<?php

namespace App\Contracts;

/**
 * Interface CategoryContract
 * @package App\Contracts
 */
interface SlideContract
{
    /**
     * @param string $order
     * @param string $sort
     * @param array $columns
     * @return mixed
     */
    public function listSlides(string $order = 'id', string $sort = 'desc', array $columns = ['*']);

    /**
     * @param int $id
     * @return mixed
     */
    public function findSlideById(int $id);

    /**
     * @param array $params
     * @return mixed
     */
    public function createSlide(array $params);

    /**
     * @param array $params
     * @return mixed
     */
    public function updateSlide(array $params);

    /**
     * @param $id
     * @return bool
     */
    public function deleteSlide($id);

    /**
     * @return mixed
     */
    public function treeList();

    /**
     * @param $slug
     * @return mixed
     */
    public function findBySlug($slug);
}
