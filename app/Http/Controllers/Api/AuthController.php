<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\LoginUserRequest;
use App\Http\Resources\UserResource;


class AuthController extends Controller
{

    /*
    ** register user with api 
    ** 
    ** return UserResource 
    */
    public function register(CreateUserRequest $request) {
        // Retireve the validated input data 
        $validated = $request->validated();

        // return $url for image and upload the image storage 
        $image = null;
        if ($request->image)
        {
            $image = $request->image->store('profile-photos', 'public');
        }


        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'profile_photo_path' => ($image) ? $image : null,
        ]);


        $accessToken = $user->createToken('UserToken');


        return response()->json([
            'user' => new UserResource($user),
            'token' => $accessToken->plainTextToken,
            'token_type' => 'Bearer'
        ], 200);
    }

    public function login(LoginUserRequest $request) {
        // Retireve the validated input data 
        $validated = $request->validated();
        
        // return all data reqeust 
        $data = $request->all();

        if (!auth()->attempt($data)) {
            return response()->json('ایمیل یا رمز عبور اشتباه است.', 422);
        }

        $user = auth()->user();
        $token= $user->createToken('userToken');


        return response()->json([
            'user' => new UserResource($user),
            'token' => $token->plainTextToken,
            'token_type' => 'Bearer'
        ], 200);
    }



    public function logout(Request $request)
    {
        /** @var User $user
         */
        $request->user()->tokens()->delete();
        // $request->user()->token()->revoke();
        return response()->json('شما با موفقیت خارج شدید.');
    }
}
