<?php

namespace App;

use Baum\Node;
use Cviebrock\EloquentSluggable\Sluggable;
use App\Image;

class Category extends Node
{
  use Sluggable;

  protected $table = 'categories';
  
  protected $parentColumn = 'parent_id';
  
  protected $leftColumn = 'lft';
  
  protected $rightColumn = 'rgt';
  
  protected $depthColumn = 'depth';

  protected $orderColumn = 'sort';
  
  protected $guarded = array('id', 'parent_id', 'lft', 'rgt', 'depth');

  protected $fillable = ['name','slug','status','sort','parent_id'];

  protected $localImagePath = 'images/categories/';

  protected $remoteImagePath = '';

  protected $imageSize = 200;

  public function sluggable()
  {
      return [
          'slug' => [
              'source' => 'name'
          ]
      ];
  }
  public function uploadCategoryImage($image)
  {
        $path = $this->localImagePath. $this->id . '.jpg';
        $remote = $this->remoteImagePath. $this->id . '.jpg';
        Image::uploadImage($image, $path, $remote, $this->imageSize);
  }
  public function getImage(){
    $noImage = '/images/no-image.png';

    $pathToProductImage = '/'. $this->localImagePath . $this->id . '.jpg';

    if (file_exists(public_path() . $pathToProductImage)) {
        return $pathToProductImage;
    }
    return $noImage;
  }
  public function products()
  {
      return $this->hasMany(Product::class,'category');
  }
  public function brands()
  {
      return $this->hasMany(Brands::class,'id_category');
  }
}
