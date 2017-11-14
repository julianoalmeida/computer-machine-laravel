<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Categories
 * @package App
 */
class Categories extends Model
{
    /**
     * @var string
     */
    public $table = 'categories';

    /**
     * @var array
     */
    protected $fillable = [
        'name'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
