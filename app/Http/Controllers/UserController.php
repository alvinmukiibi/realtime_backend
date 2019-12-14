<?php

namespace App\Http\Controllers;

use App\Events\UserCreatedEvent;
use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public function index(Request $request){
        return response()->json(User::all(), 200);
    }

    public function store(Request $request){

        $user = User::create($request->all());

        broadcast(new UserCreatedEvent($user));

        return response()->json($user, 200);
    }
}
