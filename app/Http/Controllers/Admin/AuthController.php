<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginAdminRequest;
use App\Http\Resources\AdminResource;
use Illuminate\Http\Request;
use App\Models\Admin;

class AuthController extends Controller
{
    public function login(LoginAdminRequest $request)
    {
        if(Auth::attempt($request->validated()))
        {
            $admin = Auth::user();

            $token = $admin->createToken('admin_token');

            return response()->json([
                'message' => 'admin.login.success',
                'admin' => new AdminRsource($admin),
                'token' => $token->plainTextToken,
            ], 200);
        }

        return response()->json([
            'message' => 'admin.login.wrong_name_or_password',
        ], 422);
    }
}
