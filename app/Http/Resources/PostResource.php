<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
{
   // public static $wrap ="ali";

    public function toArray($request)
    {
      //  return parent::toArray($request);

        return [
            'id'=>$this->id,
            'name'=>$this->title,
            'slug'=>$this->title,
            'created_at'=>$this->created_at,
        ];

    }
}
