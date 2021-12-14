<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function follows($username)
{
    
    $user = User::where('username', $username)->firstOrFail();

    $id = Auth::id();
    $me = User::find($id);
    $me->following()->attach($user->id);
    return redirect('/' . $username);
}
public function unfollows($username)
{

    $user = User::where('username', $username)->firstOrFail();

    $id = Auth::id();
    $me = User::find($id);
    $me->following()->detach($user->id);
    return redirect('/' . $username);
}
}
