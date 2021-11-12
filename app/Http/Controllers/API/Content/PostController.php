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
            'items' => $postsArray,
            'pagination'  => [
                'total' => $posts->total(),
                'next_page_url' => $posts->nextPageUrl(),
                'per_page' => $posts->perPage()
            ]
        ];

        return $this->sendResponse($response, 'get posts successfully.');
    }

    public function getPostBy($slug)
    {
        try
        {
            $post = new PostResponseResource(Post::where('slug', '=', $slug)->firstOrFail());
            return $this->sendResponse($post, 'get post  successfully.');
        }

        catch(ModelNotFoundException $e)
        {
            return $this->sendError('Post not found',[],404);
        }
    }

    public function highlights()
    {
    	$posts = Post::orderBy('created_at')->paginate(44);

        $postsArray = PostResource::collection($posts);
        $response = [
            'items' => $postsArray,
            'pagination'  => [
                'total' => $postsArray->total(),
                'next_page_url' => $postsArray->nextPageUrl(),
                'per_page' => $postsArray->perPage()
            ]
        ];

        return $this->sendResponse($response, 'get posts successfully.');
    }
}
