<?php

namespace App\Models;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;

    protected $guarded=[];



    public function newPost(Request $request){
        
        Post::query()->create([
            'title'=>$request->title,
            'slug'=>$request->slug,
            'image'=>$request->image,
            'content'=>$request->get('content'),
            'user_id'=>1
        ]);
    }

}
