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
use Illuminate\Support\Facades\Auth;

class CoursesController extends Controller
{
    public $courses;
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


        // Course::chunk(200, function ($courses){
        //     foreach ($courses as $course) {
        //         $image =  Image::select('url')->where('imageable_type', 'App\Models\Course')->where('imageable_id', $course->id)->first();
        //         $course['image'] = $image ? $image->url : '/img/logo.svg';
        //         $teacher = Teacher::select('username')->where('id', $course->teacher_id)->first();
        //         $course['teacher'] = $teacher->username;
        //         $category = Category::select('name')->where('id', $course->category_id)->first();
        //         $course['category'] = $category->name;
        //         $this->courses[] = $course;
        //     }
        // });


        
        // return Inertia::render('Courses/Index', [
        //     'courses' => $this->courses,
        // ]);

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
        $user = Auth::user();
        if(!$user->can('user_management'))
        {
            abort(403);
        }
        

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
        $user = Auth::user();
        if(!$user->can('user_management'))
        {
            abort(403);
        }
        


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
        return Inertia::render('Courses/Show', [
            'course' => $course,
            'lessons' => $course->lessons,
            'teacher' => $course->teacher->username
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course)
    {
        $user = Auth::user();
        if(!$user->can('user_management'))
        {
            abort(403);
        }
        

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
    public function update(UpdateCourseRequest $request, Course $course)
    {
        $user = Auth::user();
        if(!$user->can('user_management'))
        {
            abort(403);
        }
        

        
        // Retrieve the validated input data...
        $validated = $request->validated();

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
        $user = Auth::user();
        if(!$user->can('user_management'))
        {
            abort(403);
        }
        

        $course->delete();

        return redirect()->route('courses.index');
    }
}
