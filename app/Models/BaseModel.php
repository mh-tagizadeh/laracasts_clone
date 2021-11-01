<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BaseModel  extends Model
{
    use HasFactory, SoftDeletes;


    /**
     * @var Model
     */
    protected $model;


    /**
     * BaseModel constructor.
     * @param Model $model
    */
    public function __construct(Model $model)
    {
        $this->model = $model;
    }


    public function courses() 
    {
        return $this->model->hasMany(Course::class);
    }


    public function category()
    {
        return $this->model->belongsTo(Category::class);
    }


    public function teacher() {
        return $this->model->belongsTo(Teacher::class);
    }


    public function image() {
        return $this->model->morphOne(Image::class, 'imageable');
    }


    public function lessons() {
        return $this->model->hasMany(Lesson::class);
    }


    public function course()
    {
        return $this->model->belongsTo(Course::class);
    }


    public function imageable()
    {
        $this->model->morphTo();
    }


    /**
     * Get the lesson's video.
     */
    public function video()
    {
        return $this->model->morphOne(Video::class, 'videoable');
    }


    public function user() 
    {
        return $this->model->belongsTo(User::class);
    }

    public function team()
    {
        // todo : create Team model and migration database
    }

    public function plan() 
    {
         return $this->model->belongsTo(Plan::class);
    }


    /**
     * Get the parent videoable model (course or lesson).
     */
    public function videoable()
    {
        return $this->model->morphTo();
    }

 
}
