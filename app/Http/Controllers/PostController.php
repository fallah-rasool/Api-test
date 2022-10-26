<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends ApiController
{

    public function index(){

        return $this->successResponse(200,Post::all(),'okConnect');
        
    }

}
