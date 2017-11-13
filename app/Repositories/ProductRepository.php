<?php
/**
 * Created by PhpStorm.
 * User: juliano
 * Date: 11/13/17
 * Time: 5:44 PM
 */

namespace App\Repositories;

use App\Repositories\Eloquent\Repository;

/**
 * Class ProductRepository
 * @package App\Repositories
 */
class ProductRepository extends Repository
{
    /**
     * Specify model class name
     *
     * @return string
     */
    function model()
    {
        return 'App\Models\Product';
    }
}