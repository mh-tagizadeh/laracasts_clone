<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'slug', 'description', 'category_id'
    ];


    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function categories_child()
    {
        return $this->hasMany(Category::class);
    }

    public function courses()
    {
        return $this->hasMany(Course::class);
    }


    public function courses_count()
    {
        $count = 0; 

        foreach ($this->categories_child as $cat)
        {
            $count += $cat->courses->count();
        }

        return $count;
    }

    public function lessons_count()
    {
        $count = 0; 

        $categories = $this->categories_child; 

        foreach ($categories as $category)
        {
            $courses = $category->courses;
        }

        foreach ($courses as $course)
        {
            $count += $course->lessons->count();
        }

        return $count;
    }


}
