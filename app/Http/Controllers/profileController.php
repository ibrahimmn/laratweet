<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class profileController extends Controller
{
    //
    public function show($username)
{
     $user = User::where('username', $username)->firstOrFail();
return view('profile', ['user' => $user]);
}
}
