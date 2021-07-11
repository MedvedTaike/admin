<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use Illuminate\Validation\Rule;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all()->toHierarchy();
        
        return view('categories.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::getNestedList('name','id','--');

        return view('categories.create', compact('categories'));
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
            'name' =>'required|string|unique:categories',
            'parent_id'   =>  'nullable',
            'image' =>  'nullable|image'
        ]);
        $result = Category::create($request->except('image'));
        if($request->file('image') != null){
            $result->uploadCategoryImage($request->file('image'));
        }
        
        return redirect()->route('categories.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Category::getNestedList('name','id','--');

        $category = Category::find($id);

        return view('categories.edit', compact('categories', 'category'));
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
            'name' =>['required', Rule::unique('categories')->ignore($id)],
            'parent_id'   =>  'nullable',
            'image' =>  'nullable|image',
            'status' => 'nullable'
        ]);
        
        $category = Category::find($id);
        $result = $category->update($request->all(['name','parent_id','status']));
        
        Category::rebuild();

        if($request->file('image') != null){
            $category->uploadCategoryImage($request->file('image'));
        }

        return redirect()->route('categories.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return Category::find($id)->delete();
    }
}
