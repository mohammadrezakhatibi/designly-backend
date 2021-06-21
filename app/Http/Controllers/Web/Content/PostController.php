<?php

namespace App\Http\Controllers\Web\Content;

use App\Models\Post;
use App\Models\Source;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Web\BaseController;

class PostController extends BaseController
{
    public function index()
    {
        $posts = Post::paginate(18);
        return view('admin.post.list')->withPosts($posts);
    }

    public function addIndex()
    {
        $categories = Category::all();
        $sources = Source::all();
        return view('admin.post.add')->withCategories($categories)->withSources($sources);
    }

    public function add(Request $request)
    {

        $post = new Post();
        $post->title = $request->name;
        $post->category_id = $request->category;
        $post->source_id = $request->category;


        $post->creator = $request->creator;
        $post->link = $request->link;

        $postsArray = Post::paginate(18);

        if ($post->save()) {
            return view('admin.post.list')->withPosts($postsArray);
        } else {
            return $this->sendError('Somthing wrong hapen', []);
        }

    }
}
