<?php

namespace App\Http\Controllers\API\Content;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\PostResource;
use App\Http\Controllers\API\BaseController;
use App\Http\Resources\PostResponseResource;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class PostController extends BaseController
{

    public function index()
    {
    	$posts = Post::paginate(10);

        $postsArray = PostResource::collection($posts);
        $response = [
            'posts' => $postsArray,
            'pagination'  => [
                'total' => $posts->total(),
                'next_page_url' => $posts->nextPageUrl(),
                'per_page' => $posts->perPage()
            ]
        ];

        return $this->sendResponse($response, 'get posts successfully.');
    }

    public function getPostBy($id)
    {
        try
        {
            $post = new PostResponseResource(Post::findOrFail($id));
            return $this->sendResponse($post, 'get post  successfully.');
        }

        catch(ModelNotFoundException $e)
        {
            return $this->sendError('Post not found',[],404);
        }
    }
}
