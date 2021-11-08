<?php

namespace App\Http\Controllers\API\Content;

use App\Models\Tag;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\API\BaseController;

class TagController extends BaseController
{
    public function index()
    {
    	$tags = Tag::all();

        $response = $tags;

        return $this->sendResponse($response, 'get posts successfully.');
    }
}
