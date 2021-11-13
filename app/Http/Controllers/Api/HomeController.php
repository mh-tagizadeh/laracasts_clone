<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Lesson;
use App\Models\Course;
use App\Models\Category;

class HomeController extends Controller
{
    public function get_count_lessons()
    {
        $lessons_count = Lesson::count();

        $courses_count = Course::count();

        return response()->json([
            'lessons_count' => $lessons_count,
            'courses_count' => $courses_count
        ], 200);
    }

    public function get_parent_categories()
    {
        $categories = Category::has('categories_child')->with('categories_child')->get();        


        return response()->json([
            'categories' => $categories->map(function($category) {
                return [
                    'id' => $category->id,
                    'title' => $category->name,
                    'courses_count' => $category->courses_count(),
                    'lessons_count' => $category->lessons_count(),
                ];
            }),
        ], 200);
    }


    public function get_popular_courses()
    {
        $arr = [];
        for($x=0;$x<16;$x++)
        {
            $arr[$x] = random_int(0,Course::count());
        }

        $courses = Course::whereIn('id', $arr)->get();



        return $courses->map(function($course) {
            return [
                'id' => $course->id,
                'title' => $course->title,
                'slug' => $course->slug,
                'description' => $course->description,
                'category' => [ 'id' => $course->category->id, 'name' => $course->category->name, 'slug' => $course->category->slug ],
                'lessons_count' => $course->lessons->count(),
            ];
        });
    }


    public function get_all_categories()
    {
        return Category::doesntHave('categories_child')->select('id', 'name')->with('courses')->get()->map(function($category) {
            return [
                'id' => $category->id,
                'name' => $category->name,
                'courses_count' => $category->courses->count(),
                'video_count' => $category->child_category_lessons_count(),
            ];
        });
    }

}
