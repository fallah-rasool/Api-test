<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class PostController extends ApiController
{

    public function index(){

        return $this->successResponse(200,Post::all(),'okConnect');

    }


    public function store(Request $request, Post $post){


        //validate
        $validate  = Validator::make($request->all(),[
            'title'=>'required|string',
            'slug'=>'required|string',
            'image'=>'required|image',
            'content'=>'required|string',
            'user_id'=>'required',
        ]);

        if($validate->fails()){
            return $this->errorResponse(400, $validate->messages());
        }

        $post->newPost($request);

        $dataResponse = $post->orderBy('id','desc')->first();

        return $this->successResponse(200,$dataResponse,'post create successFully');

    }

}
