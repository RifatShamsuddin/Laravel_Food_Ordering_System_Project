<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        return view();
    }

    public function show_profile()
    {
        if (Auth::user()->user_type == 1) {
            return view('restaurant/profile');
        } elseif (Auth::user()->user_type == 2) {
            return view('customer/profile');
        }
    }
    public function profile_update(Request $request, $user_id)
    {
        $user = User::find($user_id);

        if ($request->user_image != '') {
            $path = 'adminDashboardSourceFiles\user_img';

            //code for remove old file
            if ($user->user_image != " "  && $user->user_image != null) {
                $user_image_old = $user->user_image;
                unlink($user_image_old);
            }

            //upload new file
            $user_image = $request->user_image;
            $filename = $user_image->getClientOriginalName();
            $user_image->move($path, $filename);
            $user_image = $path . $user_image;
            $user->update(['user_image' => $filename]);
        }

        // Getting values from the blade template form
        $user->name =  $request->get('name');
        $user->email =  $request->get('email');
        $user->user_address =  $request->get('user_address');
        $user->user_phone =  $request->get('user_phone');
        $user->save();
        return back()->with('sms', 'Updated Data');
    }
}
