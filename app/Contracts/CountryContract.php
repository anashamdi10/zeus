<?php

namespace App\Contracts;

interface CountryContract
{
    public function listCountries(string $order = 'id', string $sort = 'desc', array $columns = ['*']);

    /**
     * @param int $id
     * @return mixed
     */
    public function findCountryById(int $id);

    /**
     * @param array $params
     * @return mixed
     */
    public function createCountry(array $params);

    /**
     * @param array $params
     * @return mixed
     */
    public function updateCountry(array $params);

    /**
     * @param $id
     * @return bool
     */
    public function deleteCountry($id);
}
