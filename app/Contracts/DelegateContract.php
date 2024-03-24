<?php

namespace App\Contracts;

interface DelegateContract
{
    public function listDelegates(string $order = 'id', string $sort = 'desc', array $columns = ['*']);

    /**
     * @param int $id
     * @return mixed
     */
    public function findDelegateById(int $id);

    /**
     * @param array $params
     * @return mixed
     */
    public function createDelegate(array $params);

    /**
     * @param array $params
     * @return mixed
     */
    public function updateDelegate(array $params);

    /**
     * @param $id
     * @return bool
     */
    public function deleteDelegate($id);
}
