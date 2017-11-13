<?php
/**
 * Created by PhpStorm.
 * User: juliano
 * Date: 11/13/17
 * Time: 5:24 PM
 */

namespace App\Repositories\Eloquent;

use App\Repositories\Contracts\RepositoryInterface;
use App\Repositories\Exceptions\RepositoryException;
use Illuminate\Container\Container as Application;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Repository
 * @package App\Repositories\Eloquent
 */
abstract class Repository implements RepositoryInterface
{
    /**
     * @var
     */
    private $application;

    /**
     * @var
     */
    protected $model;

    /**
     * Repository constructor.
     * @param Application $application
     */
    public function __construct(Application $application)
    {
        $this->application = $application;
        $this->makeModel();
    }

    /**
     * Specify Model class name
     *
     * @return mixed
     */
    abstract function model();

    /**
     * @param array $columns
     * @return mixed
     */
    public function all($columns = array('*'))
    {
        return $this->model->get($columns);
    }

    /**
     * @param int $perPage
     * @param array $columns
     * @return mixed
     */
    public function paginate($perPage = 15, $columns = array('*'))
    {
        return $this->model->paginate($perPage, $columns);
    }

    /**
     * @param array $data
     * @return mixed
     */
    public function create(array $data)
    {
        return $this->model->create($data);
    }

    /**
     * @param array $data
     * @param $id
     * @param string $attribute
     * @return mixed
     */
    public function update(array $data, $id, $attribute="id")
    {
        return $this->model->where($attribute, '=', $id)->update($data);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function delete($id)
    {
        return $this->model->destroy($id);
    }

    /**
     * Find a specific resource
     *
     * @param $id
     * @param array $columns
     * @return mixed
     */
    public function find($id, $columns = array('*'))
    {
        return $this->model->find($id, $columns);
    }

    /**
     * Find a resource by attribute
     *
     * @param $attribute
     * @param $value
     * @param array $columns
     * @return mixed
     */
    public function findBy($attribute, $value, $columns = array('*'))
    {
        return $this->model->where($attribute, '=', $value)->first($columns);
    }

    /**
     * Find or fail trying to get a specific resource
     *
     * @param $id
     * @param array $columns
     * @return mixed
     */
    public function findOrFail($id, $columns = array('*'))
    {
        return $this->model->findOrFail($id, $columns);
    }

    /**
     * Make model
     *
     * @return Model|mixed
     * @throws RepositoryException
     */
    public function makeModel()
    {
        $model = $this->application->make($this->model());
        if (!$model instanceof Model) {
            throw new RepositoryException(
                "Class {$this->model()} must be an instance of Illuminate\\Database\\Eloquent\\Model"
            );
        }
        return $this->model = $model;
    }
}