<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Product
 * @package App
 */
class Product extends Model
{
    /**
     * @var string
     */
    public $table = 'products';

    /**
     * @var array
     */
    protected $fillable = [
        'name', 'code', 'price'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
