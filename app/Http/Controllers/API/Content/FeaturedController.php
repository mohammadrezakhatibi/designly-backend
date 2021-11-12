<?php

namespace App\Http\Controllers\API\Content;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Models\FeaturedContent;
use App\Http\Controllers\Controller;
use App\Http\Resources\PostResource;
use App\Http\Controllers\API\BaseController;
use App\Http\Resources\PostResponseResource;
use App\Http\Resources\FeaturedResponseResource;

class FeaturedController extends BaseController
{
    public function index()
    {
    	$featureds = FeaturedContent::paginate(7);
    	// $posts = Post::paginate(15)->sortBy('created_at');

        $featuredsArray = FeaturedResponseResource::collection($featureds);
        //$postsArray = PostResource::collection($posts);

        $response = [
            'items' => $featuredsArray,
            'pagination'  => [
                'total' => $featureds->total(),
                'next_page_url' => $featureds->nextPageUrl(),
                'per_page' => $featureds->perPage()
            ]
        ];

        return $this->sendResponse($response, 'get posts successfully.');
    }
}
