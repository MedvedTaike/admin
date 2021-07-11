<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Brands;
use App\Sellers;
use App\Product;
use App\PriceGroup;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all()->toHierarchy();

        return view('products.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all()->toHierarchy();

        $brands = Brands::pluck('name', 'id')->all();
        $sellers = Sellers::pluck('name', 'id')->all();
        $measure = Product::getMeasure();
        $packing = Product::getPacking();
        $price_group = PriceGroup::pluck('name','id')->all();

        return view('products.create', compact('categories','brands','sellers','measure','packing','price_group'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' =>'required|string',
            'category'   =>  'required',
            'image' =>  'nullable|image'
        ]);
        $fields = $request->all(['name','description','weight','volume','sort','brand','seller','measure','price','pack','category','convertation','status','price_group']);
        
        if($request->get('price_group') != null){
            $price = PriceGroup::find($request->get('price_group'))->value;
            $fields['price'] = $price;
        }
        $result = Product::create($fields);
        if($request->file('image') != null){
            $result->uploadProductImage($request->file('image'));
        }
        
        return redirect()->route('products.show', $result->category);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category = Category::find($id);

        $name = $category->name;

        $products = $category->products;

        return view('products.show', compact('products', 'name'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);

        $categories = Category::all()->toHierarchy();

        $brands = Brands::pluck('name', 'id')->all();
        $sellers = Sellers::pluck('name', 'id')->all();
        $measure = Product::getMeasure();
        $packing = Product::getPacking();
        $price_group = PriceGroup::pluck('name','id')->all();

        return view('products.edit', compact('product','categories','brands','sellers','measure','packing','price_group'));        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' =>'required|string',
            'category'   =>  'required',
            'image' =>  'nullable|image'
        ]);
        
        $product = Product::find($id);

        $fields = $request->all(['name','description','weight','volume','price','sort','brand','seller','measure','pack','category','convertation','status','price_group']);
        if($request->get('price_group') != null){
            $group_price = PriceGroup::find($request->get('price_group'))->value;
            $fields['price'] = $group_price;
        }

        $result = $product->update($fields);

        if($request->file('image') != null){
            $product->uploadProductImage($request->file('image'));
        }
        
        return redirect()->route('products.show', $product->category);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
