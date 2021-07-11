<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Brands;
use App\Category;
use Illuminate\Validation\Rule;

class BrandsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brands = Brands::all();

        return view('brands.index', compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::whereNull('parent_id')->pluck('name','id');

        return view('brands.create', compact('categories'));
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
            'name' =>'required|string|unique:brand',
            'id_category' => 'required|string',
            'image' =>  'nullable|image'
        ]);
        $result = Brands::create($request->except('image'));
        if($request->file('image') != null){
            $result->uploadBrandImage($request->file('image'));
        }
        
        return redirect()->route('brands.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $brand = Brands::find($id);

        $products = $brand->products;

        return view('brands.show', compact('brand', 'products'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Category::whereNull('parent_id')->pluck('name','id');

        $brand = Brands::find($id);

        return view('brands.edit', compact('categories', 'brand'));
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
            'name' => ['required', Rule::unique('brand')->ignore($id)],
            'id_category' => 'required|string',
            'image' =>  'nullable|image'
        ]);
        $brand = Brands::find($id);

        $brand->update($request->all(['name','id_category','status']));
        
        if($request->file('image') != null){
            $brand->uploadBrandImage($request->file('image'));
        }
        
        return redirect()->route('brands.index');
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
