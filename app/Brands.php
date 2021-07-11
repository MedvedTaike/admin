<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Image;

class Brands extends Model
{
    protected $table = 'brand';

    public $timestamps = false;

    protected $localImagePath = 'images/brands/';

    protected $remoteImagePath = 'D:/open_new/domains/arzan/public/images/brands/';

    protected $imageSize = 200;

    protected $fillable = ['name','id_category','status'];

    public function category()
    {
        return $this->belongsTo(Category::class, 'id_category');
    }
    public function products()
    {
        return $this->hasMany(Product::class, 'brand');
    }
    public function uploadBrandImage($image)
    {
        $path = $this->localImagePath. $this->id . '.jpg';
        $remote = $this->remoteImagePath. $this->id . '.jpg';
        Image::uploadImage($image, $path, $remote, $this->imageSize);
    }
    public function getImage(){
        $noImage = '/images/no-image.png';

        $pathToProductImage = '/'. $this->localImagePath . $this->id . '.jpg';

        if (file_exists($_SERVER['DOCUMENT_ROOT'] . $pathToProductImage)) {
            return $pathToProductImage;
        }
        return $noImage;
    }
}
