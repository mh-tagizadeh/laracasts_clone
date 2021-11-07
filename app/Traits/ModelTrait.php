<?php

namespace App\Traits;
use App\Models\Category;
use App\Models\Course;
use App\Models\Teacher;
use App\Models\Image;
use App\Models\Video;
use App\Models\Lesson;
use App\Models\Plan;
use App\Models\User;


Trait ModelTrait
{
    /**
     * @var Model
     */
    protected $model;





    public function courses() 
    {
        return $this->hasMany(Course::class);
    }


    public function category()
    {
        return $this->belongsTo(Category::class);
    }


    public function teacher() {
        return $this->belongsTo(Teacher::class);
    }


    public function image() {
        return $this->morphOne(Image::class, 'imageable');
    }


    public function lessons() {
        return $this->hasMany(Lesson::class);
    }


    public function course()
    {
        return $this->belongsTo(Course::class);
    }


    public function imageable()
    {
        $this->morphTo();
    }


    /**
     * Get the lesson's video.
     */
    public function video()
    {
        return $this->morphOne(Video::class, 'videoable');
    }


    public function user() 
    {
        return $this->belongsTo(User::class);
    }

    public function team()
    {
        // todo : create Team model and migration database
    }

    public function plan() 
    {
         return $this->belongsTo(Plan::class);
    }


    /**
     * Get the parent videoable model (course or lesson).
     */
    public function videoable()
    {
        return $this->morphTo();
    }


}