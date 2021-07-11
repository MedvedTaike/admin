<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PriceGroup extends Model
{
    protected $table = 'price_group';

    public $timestamps = false;

    protected $fillable = ['name','value'];

    public function products()
    {
        return $this->hasMany(Product::class, 'price_group');
    }
}
