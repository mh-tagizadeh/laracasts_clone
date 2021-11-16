<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\ModelTrait;

class Course extends Model 
{
    use HasFactory, ModelTrait;
    

    protected $fillable = [
        'sku', 'title', 'slug', 'description', 'teacher_id','state', 'published_at', 'category_id'
    ];

    public static function get_courses_paginate()
    {
        $courses = Course::paginate(20)->through(function ($course) {
            return [
                'id' => $course->id,
                'sku' => $course->sku,
                'title' => $course->title,
                'category' => $course->category->name,
                'teacher' => $course->teacher->username,
                'status' => $course->status,
                'image' => $course->image ? $course->image->url : '/img/logo.svg',
            ];
        });

        return $courses;
    }
}
