<?php

namespace App\Http\Controllers;


use App\Http\Requests\CommentRequest;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class CommentController extends Controller
{
    //
    public function store(CommentRequest $request){
        try{
        $data = $request->validated();
        Comment::create($data);
        return back()->with("status","your comment is added successfully");
           
        }catch(ValidationException $e){
            return back()->withErrors($e->errors(),$request->form);
        }

        

    }
    
}
