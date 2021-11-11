<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\ModelTrait;

class Category extends Model
{
    use HasFactory, ModelTrait;

    protected $courses;


    protected $fillable = [
        'name', 'slug', 'description', 'category_id'
    ];

    public function categories_child()
    {
        return $this->hasMany(Category::class);
    }


    public function get_parent_category_courses()
    {
        $categories = $this->categories_child;

        return Course::whereBetween('category_id', [$categories->first()->id, $categories->last()->id])->get();
    }


    public function courses_count()
    {
        return $this->get_parent_category_courses()->count();
    }


    public function lessons_count()
    {
        $courses = $this->get_parent_category_courses();

        $count = Lesson::whereBetween('course_id', [$courses->first()->id, $courses->last()->id])->count();

        return $count;
    }


}
