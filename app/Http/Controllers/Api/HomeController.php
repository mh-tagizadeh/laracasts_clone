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
        $categories = Category::has('categories_child')->get();        


        return response()->json([
            'categories' => $categories->map(function($category) {
                return [
                    'id' => $category->id,
                    'title' => $category->name,
                    'lessons_count' => $category->lessons_count(),
                    'courses_count' => $category->courses_count(),
                ];
            }),
        ], 200);
    }

}
