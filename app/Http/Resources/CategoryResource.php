<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CategoryResource extends JsonResource
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
            'id'            => $this->id,
            'name'          => $this->name,
            'slug'          => $this->slug,
            'parent_id'     => $this->parent_id,
            'discount'      => $this->discount,
            'is_home'       => $this->is_home,
            'is_home'       => $this->is_home,
            'meta_title'    => $this->meta_title,
            'meta_desc'     => $this->meta_desc,
            'meta_keyword'  => $this->meta_keyword,
        ];
    }
}
