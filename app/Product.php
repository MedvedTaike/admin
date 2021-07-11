<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Image;

class Product extends Model
{
    protected $table = 'product';

    public $timestamps = false;

    protected $localImagePath = 'images/products/';

    protected $remoteImagePath = '';

    protected $imageSize = 200;

    protected $fillable = ['name','description','price','weight','volume','sort','brand','seller','measure','pack','category','convertation','status','price_group'];

    public function categories()
    {
        return $this->belongsTo(Category::class, 'category');
    }
    public function brands()
    {
        return $this->belongsTo(Brands::class, 'brand');
    }
    public function groups()
    {
        return $this->belongsTo(PriceGroup::class, 'price_group');
    }
    public static function getMeasure()
    {
        return [
            1 => 'Шт.',
            2 => 'Кг.',
            3 => 'Ед.'
        ];
    }
    public static function getPacking()
    {
        return [
            1 => 'Блок',
            2 => 'Упаковка',
            3 => 'Коробка',
            4 => 'Мешок',
        ];
    }
    public function getImage(){
        $noImage = '/images/no-image.png';

        $pathToProductImage = '/'. $this->localImagePath . $this->id . '.jpg';

        if (public_path(). $pathToProductImage)) {
            return $pathToProductImage;
        }
        return $noImage;
    }
    public function uploadProductImage($image)
    {
        $path = $this->localImagePath. $this->id . '.jpg';
        $remote = $this->remoteImagePath. $this->id . '.jpg';
        Image::uploadImage($image, $path, $remote, $this->imageSize);
    }
}
