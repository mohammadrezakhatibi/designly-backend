<?php

namespace App\Http\Controllers\API\Content;

use App\Models\Tag;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\PostResource;
use App\Http\Controllers\API\BaseController;

class TagController extends BaseController
{
    public function index()
    {
    	$tags = Tag::all()->take(8);

        $response = $tags;

        return $this->sendResponse($response, 'get posts successfully.');
    }

    public function getTagPost($slug) 
    {   
        $tag = Tag::where('slug', '=', $slug)->first();

        $posts = $tag->posts;
        $postsArray = PostResource::collection($posts);
        $response = [
            'tag_id' => $tag->id,
            'tag_slug' => $tag->slug,
            'posts' => $postsArray,
        ];
        return $this->sendResponse($response, 'get posts successfully.');
    }
}
