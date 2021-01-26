<?php

namespace App\Http\Resources\V1;

use App\Http\Resources\V2\CategoryResource;
use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'title' =>  $this->title,
            'description' =>  $this->description,
            'categories' => CategoryResource::collection($this->categories()->get())
        ];
    }
}
