<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;

class User extends Authenticatable
{
    use Notifiable;

    protected $table = 'user';

    public $timestamps = false;

    protected $fillable = ['region', 'name', 'magazin', 'address','phone','phone_2','watsapp','password','status','role','social'];

    public function regions()
    {
        return $this->belongsTo(Region::class, 'region');
    }
    public static function getRoles()
    {
        return [
            'user' => 'Пользователь',
            'magazin'  => 'Магазин',
            'cafe'  => 'Кафе',
            'school'  => 'Школа',
            'optovik'  => 'Оптовик'
        ];
    }
    public static function makeCustomPassword($password)
    {
        return Hash::make($password);
    }
    public function orders()
    {
        return $this->hasMany(Orders::class, 'user');
    }
    public function getImage(){
        $noImage = '/images/no-image.png';
    
        $pathToProductImage = '/images/admin/' . $this->id . '.jpg';
    
        if (file_exists(public_path() . $pathToProductImage)) {
            return $pathToProductImage;
        }
        return $noImage;
      }
}
