<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    protected $table = 'orders';

    protected $fillable = ['products'];

    public function users()
    {
        return $this->belongsTo(User::class, 'user');
    }
    public function parties()
    {
        return $this->belongsTo(Party::class, 'party');
    }
    public static function getArray()
    {
        return [
            10353 => [1 => 2, 2 => 5, 3 => 5, 4 => 2],
            10354 => [1 => 23, 2 => 15, 3 => 4, 5 => 2],
            10355 => [1 => 23, 2 => 15, 3 => 4, 5 => 2],
            10356 => [1 => 1 , 2 => 1, 3 => 1, 5 => 1]
        ];
    }
    public function getSumm($products)
    {
        
        $items = json_decode($products, true);
        
        $result = Product::whereIn('id', array_keys($items))->get();
        
        $summ = $result->reduce(function($carry, $product) use ($items){
            $price = $product->price;
            if($product->price_group != null){
                $price = $product->groups->value;
            }
            return $carry + ($price * $product->convertation * $items[$product->id]);
        });
        return $summ;
    }
}
