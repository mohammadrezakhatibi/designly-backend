<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class FeaturedResponseResource extends JsonResource
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
            'id'                    => $this->post->id,
            'title'                 => $this->post->title,
            'slug'                  => $this->post->slug,
            'creator'               => $this->post->creator,
            'link'                  => $this->post->link,
            'is_external_link'      => $this->post->is_external_link,
            'image_url'             => $this->post->image_url,
            'category'              => $this->post->category,
            'source'                => $this->post->source,
        ];
    }
}
