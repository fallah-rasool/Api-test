<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Resources\PostResource;
use App\Http\Resources\PostCollection;
use Illuminate\Support\Facades\Validator;


class PostController extends ApiController
{

    public function index(){

      //  $posts = Post::all();

      //  return new PostCollection($posts);


    //    return $this->successResponse(200,PostResource::collection($posts),'okConnect');

        // return $this->successResponse(200,new PostResource($posts)  ,'okConnect');

    //    return $this->successResponse(200,Post::all(),'okConnect');


    $posts = Post::paginate(3);

    return $this->successResponse(200 , [

     'posts' =>  PostResource::collection($posts),

     'links' => PostResource::collection($posts)->response()->getData()->links,
     
     'meta' => PostResource::collection($posts)->response()->getData()->meta,
    ],'okConnect');





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

    public function show(Post $post){

      //  $dataResponse =  new PostResource($post);

      //  return $this->successResponse(200,$dataResponse,'getOk');

     // return new PostResource($post);

     $dataResponse =  new PostResource($post);

     return $dataResponse->additional([
          'food' =>[
              'slug'=>$post->slug,
          ]
      ]);

    }


    public function update(Request $request ,Post $post){


        //validate
        $validate  = Validator::make($request->all(),[
           'title'=>'required|string',
           'slug'=>'required|string',
           'image'=>'image',
           'content'=>'required|string',
           'user_id'=>'required',
       ]);
       if($validate->fails()){
           return $this->errorResponse(400, $validate->messages());
       }

        //  updataPost

        $post->updataPost($request,$post);

        return $this->successResponse(200,$post,'updata Post successFully');


    }


    public function destroy(Post $post){


        $post->deletePost($post);

         return $this->successResponse(200,$post,'deleted Post successFully');

     }




}
