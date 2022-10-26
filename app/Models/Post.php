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

}
