<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Events\CommentCreatedEvent;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index(Request $request){

        return response()->json(Comment::all(), 200);

    }

    public function store(Request $request){

        $comment = Comment::create($request->all());

        broadcast(new CommentCreatedEvent($comment));

        return response()->json($comment, 200);
    }
}