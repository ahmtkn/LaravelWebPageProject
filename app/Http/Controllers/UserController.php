<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function profile()
    {
        $bText='My Profile';
        return view('frontend.user.profile',compact('bText'));
    }
}
