<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Str;

class CategoriesController extends Controller
{

    public function get_name_by_parent_categoires(Category $category) {
        $arr = array();

        array_push($arr, $category->name);
        
        array_push($arr, $category->category->name);
        
        $arr = array_reverse($arr);
        
        return $arr;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Inertia::render('Categories/Index', [
            'categories' => Category::all()->map(function($category){
                return [
                    'id' => $category->id,
                    'name' => $category->name,
                ];
            })
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // TODO: show categoery tree in selection parent category and show category name selected while select category 
        return Inertia::render('Categories/Create',[
            'categories' => Category::all()->map(function($category) {
                return [
                    'id' => $category->id,
                    'name' => $category->name,
                ];
            })
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Category::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'description' => $request->description,
            'category_id' => $request->parent_category,
        ]);

        return redirect()->route('categories.index');
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
        // TODO: show old selected category in Listbox component front-end.
        return Inertia::render('Categories/Create', [
            'category' => $category,
            'categories' => Category::all()->map(function($category) {
                return [
                    'id' => $category->id,
                    'name' => $category->name,
                ];
            })
        ]);
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
        // TODO: add parent catgory for update.
        $category->name = $request->name;

        $category->description = $request->description;

        $category->save();

        return redirect()->route('categories.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()->route('categories.index');
    }
}
