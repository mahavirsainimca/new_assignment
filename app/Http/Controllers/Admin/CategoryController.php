<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use DB;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $allCategories = DB::table('categories')
                        ->select(['categories.*',DB::raw("(SELECT categories_2.title FROM categories as categories_2 WHERE categories_2.id = categories.parent_id limit 1) as parent")])
                        ->orderBy('id', 'asc')
                        ->get();
        return view('admin.category.index',compact('allCategories'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $CategoryData = Category::where(['parent_id'=>0])->get();
        return view('admin.category.create')->with("category",$CategoryData);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            ]);

            Category::create([
                    'parent_id'=>$request->parent_id,
                    'title'=>$request->title,
                ]);
            return redirect()->to('admin/category/listing')->with('success','Record Added Successfully !');
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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Category::destroy($id);
        return redirect()->to('admin/category/listing')->with('success','Record Deleted successfully');
    }
}
