<?php

namespace App\Http\Controllers\Api\Teacher;

use App\Http\Controllers\Controller;
use App\Models\Teacher;
use App\Models\ApplyTeacher;
use Illuminate\Http\Request;
use App\Http\Requests\ApplyTeacherRequests;
use Illuminate\Support\Facades\Storage;
use App\Models\Course;
use App\Models\RequestCourse;
use Illuminate\Support\Facades\Auth;

class RequestsController extends Controller
{
    public function request_for_apply_teacher(ApplyTeacherRequests $request)
    {
        // Retireve the validated input data 
        $validated = $request->validated();

        if(ApplyTeacher::where('user_id', Auth::id())->count()){
            return response()->json([
                'message' => 'شما قبلا درخواست ارسال کرده اید.',
            ]);
        }

        $documents = $request->file('documents')->store('doucments', 'public');

        $url = Storage::url($documents);


        ApplyTeacher::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'username' => Auth::user()->name,
            'user_id' => Auth::id(),
            'description' => $request->description,
            'address' => $request->address,
            'phone_number' => $request->phone_number,
            'documents' => $documents,
        ]);

        return response()->json([
            'message' => 'send request successfuly',
            'url' => $url,
        ], 200);
    }



    public function request_for_create_course(Request $request)
    {
        $user = Auth::user();
        $teacher = $user->teacher->id;

        RequestCourse::create([
            'title' => $request->title,
            'description' => $request->description,
            'offer_price' => $request->offer_price,
            'description_for_admin' => $request->description_for_admin,
            'teacher_id' => $teacher,
            'category_id' => $request->category_id,
        ]);

        return response()->json('susccesfuly');
    }
}
