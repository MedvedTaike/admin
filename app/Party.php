<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Party extends Model
{
    protected $table = 'party';

    public $timestamps = false;

    protected $fillable = ['name','income'];

    public function orders()
    {
        return $this->hasMany(Order::class, 'party');
    }
}
