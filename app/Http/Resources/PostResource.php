<?php

namespace App\Http\Resources;

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
            'id'                    => $this->id,
            'title'                 => $this->title,
            'creator'               => $this->creator,
            'link'                  => $this->link,
            'is_external_link'      => $this->is_external_link,
            'image_url'             => $this->image_url,
            'category'              => $this->category,
            'source'                => $this->source,
            'tags'                  => $this->tags,
        ];
    }
}
