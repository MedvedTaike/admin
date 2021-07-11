<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sellers extends Model
{
    protected $table = 'seller';

    public $timestamps = false; 

    protected $fillable = ['name','address','phone','status'];
    
    public function products()
    {
        return $this->hasMany(Product::class, 'seller');
    }
}
