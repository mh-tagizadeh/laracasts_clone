<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Teacher;
use App\Models\Category;
use App\Models\Image;
use Illuminate\Http\Request;
use App\Http\Requests\StoreCoursesRequest;
use App\Http\Requests\UpdateCourseRequest;
use Inertia\Inertia;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class CoursesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Inertia::render('Courses/Index', [
            'courses' => Course::all()->map(function($course) {
                return [
                    'id' => $course->id,
                    'sku' => $course->sku,
                    'title' => $course->title,
                    'category' => $course->category->name,
                    'teacher' => $course->teacher->username,
                    'status' => $course->status,
                    'image' => $course->image ? $course->image->url : '/img/logo.svg',
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
        return Inertia::render('Courses/CreateOrEdit', [
            'teachers'=>Teacher::select('id', 'username')->get(),
            'categories'=>Category::doesntHave('categories_child')->select('id', 'name')->get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCoursesRequest $request)
    {

        echo $request;

        // Retrieve the validated input data...
        $validated = $request->validated();




        $course = Course::create([
            'sku' => 234,
            'title' => $request->title,
            'slug' => Str::slug($request->slug),
            'description' => $request->description,
            'teacher_id' => $request->teacher,
            'category_id' => $request->category,
            'price' => $request->price,
            'sale_price' => $request->price,
            'punished_at' => $request->punished_at,
        ]);

        // $image = $request->image->store('public');
        $image = $request->file('image')->store('images', 'public');

        $url = Storage::url($image);


        $image = Image::create([
            'url' => $url,
            'imageable_id' => $course->id,
            'imageable_type' => 'App\Models\Course',
        ]);

        return redirect()->route('courses.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function show(Course $course)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course)
    {
        return Inertia::render('Courses/CreateOrEdit', [
            'course' => $course,
            'image' => $course->image ? $course->image->url : '/img/logo.svg',
            'teachers'=>Teacher::select('id', 'username')->get(),
            'categories'=>Category::doesntHave('categories_child')->select('id', 'name')->get(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Course $course)
    {
        echo $request;

        // Retrieve the validated input data...
        // $validated = $request->validated();


        $course->title = $request->title;
        $course->slug = Str::slug($request->slug);
        $course->description = $request->description;
        $course->teacher_id = $request->teacher;
        $course->category_id = $request->category;
        $course->price = $request->price;
        $course->sale_price = $request->price;

        if($request->punished_at)
        {
            $course->published_at = $request->punished_at;
        }




        if($request->has('file'))
        {
            $image = $course->image;
            if($image==null)
            {
                $path = $request->file('image')->store('images', 'public');
                $url = Storage::url($path);
                Image::create([
                    'url' => $url,
                    'imageable_id' => $course->id,
                    'imageable_type' => 'App\Models\Course',
                ]);
            }
            else {
                $path = $request->file('image')->store('images', 'public');
                $url = Storage::url($path);
                $img = Image::find($course->image->id);
                $img->url = url;
                $img->save();
            }
       }
       $course->save();

       return redirect()->route('courses.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course)
    {
        //
    }
}
