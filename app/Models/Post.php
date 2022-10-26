<?php

namespace App\Models;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;

    protected $guarded=[];



    public function newPost(Request $request){

        $imagePath = Carbon::now()->microsecond.'.'.$request->image->extension();

        $request->image->storeAs('image/posts',$imagePath,'public');


        Post::query()->create([
            'title'=>$request->title,
            'slug'=>$request->slug,
            'image'=>$imagePath,
            'content'=>$request->get('content'),
            'user_id'=>1
        ]);
    }


    public function updataPost(Request $request,Post $post){


        //$imagePath =$post->image;

        if($request->has('image')){

          //  unlink(str_replace('public','storage', $post->image));
          
            $imagePath = Carbon::now()->microsecond.'.'.$request->image->extension();
            $request->image->storeAs('image/posts',$imagePath,'public');
        }

        $this->update([
            'title'=>$request->title,
            'slug'=>$request->slug,
            'image'=>$request->has('image') ? $imagePath : $this->image,
            'content'=>$request->get('content'),
            'user_id'=>1
        ]);
    }









}
