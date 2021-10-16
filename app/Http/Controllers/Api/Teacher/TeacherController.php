<?php

namespace App\Http\Controllers\Api\Teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\ApplyTeacher;
use App\Models\Course;
use App\Models\RequestCourse;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ApplyTeacherRequests;
use App\Http\Resources\TeacherResource;
use Illuminate\Support\Str;


class TeacherController extends Controller
{

    public function profile()
    {
        $user = Auth::user();
        if (!$user->can('teacher_dashboard'))
        {
            abort(403);
        }

        return response()->json([
            'teacher' => new TeacherResource($user->teacher),
        ], 200);
    }


    public function update(Request $request)
    {
        $user = Auth::user();
        $teacher = $user->teacher;

        if ($request->hasFile('image'))
        {
            $image = $request->image->store('profile-photos', 'public');
            $user->profile_photo_path = $image;
        }

        $teacher->first_name = $request->first_name;
        $teacher->last_name = $request->last_name;
        $teacher->username = $request->username;
        $user->name = $request->username;
        $teacher->slug = Str::slug($request->username);
        $teacher->description = $request->description;
        $teacher->phone_number = $request->phone_number;
        $teacher->address = $request->address;

        $teacher->save();
        $user->save();

        return response()->json([
            'teacher' => new TeacherResource($teacher),
            'message' => 'updated successfuly.'
        ], 200);
    }

    public function delete()
    {
        $user = Auth::user();

        $courses = Course::where('teacher_id', $user->teacher->id)->get();
        
        foreach($courses as $course)
        {
            $course->delete();
        }

        $user->teacher->delete();

        return response()->json([
            'message' => 'deleted successfuly'
        ], 200);
    }

}
