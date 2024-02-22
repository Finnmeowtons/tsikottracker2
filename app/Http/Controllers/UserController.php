<?php

namespace App\Http\Controllers;

use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all(); // Adjust if you want specific fields or filters
        return response()->json($users);
    }
}
