<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use DB;
use Auth;
use View;
use File;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Input;
use Session;
use App\User;

class UpdateUserInfoController extends Controller
{
    public function UpdateUserInfo(Request $request)
    {

        $username = $request->name;
        $email = $request->email;
        $password = bcrypt($request->password);
        $id = $request->user_id;
        $user_avatar = '';

        // Check for user Avatar

        if ($request->hasFile('user_avatar')) {
            $file = $request->file('user_avatar');
            $name = time() . '_' . $file->getClientOriginalName();
            $file->move('uploads', $name);
            $user_avatar = $name;
        } else {
            return view('/admin/user-info')->with('failed', 'There\'s no image');
        }

        $get_avatar_name = DB::table('users')->where('id', $id)->select('user_avatar')->get()[0]->user_avatar;

        global $root_directory;

        $p_delim = DIRECTORY_SEPARATOR;
        $image_path = $root_directory ."{$p_delim}uploads{$p_delim}{$get_avatar_name}";

        if(\File::exists($image_path !== 'avatar.png')){
            \File::delete($image_path);
        }

        if ($user_avatar) {
            DB::table('users')
                ->where('id', $id)
                ->update(['name' => $username, 'email' => $email, 'password' => $password, 'user_avatar' => $user_avatar]);
        } else {
            DB::table('users')
                ->where('id', $id)
                ->update(['name' => $username, 'email' => $email, 'password' => $password]);
        }

        return redirect()->route('redirect-userinfo');
    }

    public function ViewRegisteredUsers()
    {
        $users = DB::table('users')->get();
        return $users;
    }

    public function userGetUserAvatar()
    {
        $user_avatar = DB::table('users')->get()[0];
        return $user_avatar;
    }

    public function hash_test(Request $request)
    {
        $hash = $request->hash_test;

        $encrypted = Crypt::encrypt($hash);
    }

}
