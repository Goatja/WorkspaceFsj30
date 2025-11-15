<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    //
    function users(){
        $user = User::all();
        return response()->json([
            'users' => $user,
            'message' => 'Users retrieved successfully',
            'status' => 200
        ]);
    }

    function insert(){
        $user = User::create(request()->all());
        return response()->json([
            'data'=> $user,
            'message' => 'User created successfully',
            'status' => 201
        ], 201);
    }
    
}
