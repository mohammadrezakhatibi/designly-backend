<?php

namespace App\Http\Controllers\Web\Content;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::paginate(20);
        return view('admin.category.list')->withCategories($categories);
    }
}
