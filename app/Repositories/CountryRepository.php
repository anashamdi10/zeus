<?php

namespace App\Repositories;

use App\Models\Country;
use App\Contracts\CountryContract;
use Illuminate\Database\QueryException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Doctrine\Instantiator\Exception\InvalidArgumentException;

/**
 * Class CountryRepository
 *
 * @package \App\Repositories
 */
class CountryRepository extends BaseRepository implements CountryContract
{

    /**
     * CountryRepository constructor.
     * @param Country $model
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
    public function listCountries(string $order = 'id', string $sort = 'desc', array $columns = ['*'])
    {
        return $this->all($columns,$order,$sort);
    }

    /**
     * @param int $id
     * @return mixed
     * @throws ModelNotFoundException
     */
    public function findCountryById(int $id)
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
    public function createCountry(array $params)
    {
        try {





            $Country =Country::create($params);



            return $Country;

        } catch (QueryException $exception) {
            throw new InvalidArgumentException($exception->getMessage());
        }
    }

    /**
     * @param array $params
     * @return mixed
     */
    public function updateCountry(array $params)
    {
        $Country = $this->findCountryById($params['id']);



        $Country->update($params);

        return $Country;
    }

    /**
     * @param $id
     * @return bool|mixed
     */
    public function deleteCountry($id)
    {
        $Country = $this->findCountryById($id);



        $Country->delete();

        return $Country;
    }

    /**
     * @return mixed
     */



}
