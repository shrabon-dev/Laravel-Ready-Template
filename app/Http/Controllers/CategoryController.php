<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('backend.category.index',[
            'categories' => Category::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('backend.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         if($request->category_slug){
          Category::create([
            'category_name' => $request->category_name,
            'category_slug' => str::of($request->category_slug)->slug('_'),
          ]);
         }else{
            Category::create([
                'category_name' => $request->category_name,
                'category_slug' => str::of($request->category_name)->slug('_'),
              ]);
         }
         return redirect('/category')->with('session','Successfully added a new category');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('backend.category.edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if($request->category_slug){
            Category::find($id)->update([
              'category_name' => $request->category_name,
              'category_slug' => str::of($request->category_slug)->slug('_'),
              'status' => $request->status,
            ]);
           }else{
            Category::find($id)->update([
                  'category_name' => $request->category_name,
                  'category_slug' => str::of($request->category_name)->slug('_'),
                  'status' => $request->status,
                ]);
           }
           return redirect('/category')->with('session','Successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $Category)
    {
        $Category->delete();
        return back();
    }
}
