<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \App\Http\Resources\UserResource
     */
    public function profile()
    {
        $user = Auth::user();

        return response()->json([
            'user' => new UserResource($user),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $user = Auth::user();

        if($request->hasFile('image'))
        {
            $image = $request->image->store('profile-photos', 'public');
            $user->profile_photo_path = $image;
            // $user->profile_photo_url = Storage::url($image);
        }

        $user->name = $request->name;
        $user->password = bcrypt($request->password);

        $user->save();

        return response()->json([
            'user' => new UserResource($user),
            'message' => 'updated successfuly'
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        $user = Auth::user();

        if($user->teacher)
        {
            $user->teacher->delete();
        }

        $user->delete();

        return response()->json([
            'message' => 'deleted successfuly.'
        ],200);
    }
}
