<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function profile()
    {
        $profile = auth()->user()->profile;
        $location = auth()->user()->location;
        return view('user.profile',compact('profile','location'));
    }
}
