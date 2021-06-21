<?php

namespace App\Http\Controllers\Web\Content;

use App\Models\Source;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SourceController extends Controller
{
    public function index()
    {
        $sources = Source::paginate(20);
        return view('admin.source.list')->withSources($sources);
    }
}
