<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Storage;

class UserController extends Controller
{
    public function index()
    {
    	return view('home');
    }

    public function uploadAvatar(Request $request)
    {
    	if ($request->hasFile('image')) {
    		User::uploadAvatar($request->image);
            return redirect()->back()->with('message','Image Uploaded');
    	}
        return redirect()->back()->with('error','Image Not Uploaded');
    }
}
