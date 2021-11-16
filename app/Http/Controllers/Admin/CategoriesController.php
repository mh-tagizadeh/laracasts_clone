<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Course;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        if(!$user->can('user_management'))
        {
            abort(403);
        }


        return Inertia::render('Categories/Index', [
            'categories' => Category::has('category')->get(),        
        ]);
    }

    public function get_parent_categories()
    {
        $user = Auth::user();
        if(!$user->can('user_management'))
        {
            abort(403);
        }


        return Inertia::render('Categories/Index', [
            'categories' => Category::has('categories_child')->get(),        
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();
        if(!$user->can('user_management'))
        {
            abort(403);
        }

        // TODO: show categoery tree in selection parent category and show category name selected while select category 
        return Inertia::render('Categories/Create',[
            'categories' => Category::has('categories_child')->get(),        
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
        $user = Auth::user();
        if(!$user->can('user_management'))
        {
            abort(403);
        }
         
        Category::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'description' => $request->description,
            'category_id' => $request->parent_category,
        ]);

        return redirect()->route('categories.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        $user = Auth::user();
        if(!$user->can('user_management'))
        {
            abort(403);
        }


        // TODO: show old selected category in Listbox component front-end.
        return Inertia::render('Categories/Create', [
            'category' => $category,
            'categories' => Category::has('categories_child')->get(),        
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
        $user = Auth::user();
        if(!$user->can('user_management'))
        {
            abort(403);
        }
    


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
        $user = Auth::user();
        if(!$user->can('user_management'))
        {
            abort(403);
        }


        if($category->categories_child->count() != 0)
        {
            abort(403);
        }
        if (Course::where('category_id', $category->id)->count())
        {
            abort(403, 'this category has courses.');
        }
        $category->delete();

        return redirect()->route('categories.index');
    }
}
