<?php

namespace App\Http\Controllers\Clients;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pageName = 'Tin tức';
        $newsList = Blog::where('type', 'blogs')
            ->where('status', '1')
            ->paginate(20);

        return view('client.news.index', compact('pageName', 'newsList'));
    }

    public function detail(Request $request)
    {
        $pageName = 'Tin tức';
        $newsDetail = Blog::where('type', 'blogs')
            ->where('id', $request->id)
            ->first();

        return view('client.news.detail', compact('pageName', 'newsDetail'));
    }
}
