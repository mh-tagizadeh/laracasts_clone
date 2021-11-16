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
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class CoursesController extends Controller
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

        return Inertia::render('Courses/Index', [
            'courses' => Course::get_courses_paginate(),
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
            'sku' => Str::uuid(),
            'title' => $request->title,
            'slug' => Str::slug($request->slug),
            'description' => $request->description,
            'teacher_id' => $request->teacher,
            'category_id' => $request->category,
            'published_at' => $request->published_at,
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
