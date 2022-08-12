<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\LoginAdminRequest;
use App\Http\Resources\Admin\AdminResource;
use Illuminate\Support\Facades\Auth;


class AuthController extends Controller
{
    public function login(LoginAdminRequest $request)
    {

        if(Auth::guard('admin')->attempt($request->validated()))
        {
            $admin = Auth::guard('admin')->user();

            $token = $admin->createToken('admin_token');

            return response()->json([
                'message' => 'admin.login.success',
                'admin' => new AdminResource($admin),
                'token' => $token->plainTextToken,
            ], 200);
        }

        return response()->json([
            'message' => 'admin.login.wrong_name_or_password',
        ], 422);
    }


    public function check()
    {
        return response()->json([
            'message' => 'admin.check.success',
            'admin' => new AdminResource(Auth::user())
        ]);
    }
}
