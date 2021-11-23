<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

class UserController extends Controller
{
    //

    public function getAllUsers()
    {
        $users = User::get();

        return view('users', compact('users'));
    }
}
