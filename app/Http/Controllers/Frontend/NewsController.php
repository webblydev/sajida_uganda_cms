<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\NewsBanner;
use App\Models\News;
use App\Models\NewsPageManager;
use App\Models\NewsCategory;

class NewsController extends Controller
{
    public function index()
    {
        $newsPageManager=NewsPageManager::latest()->first(); 

        $newsBanner=NewsBanner::latest()->first();
        $featureNewsItems = News::where('type', 1)->with('category')->latest()->get();
        $recentNewsItems = News::where('type', 0)->with('category')->latest()->get();
        return view('frontend.pages.newsroom.index', compact('newsPageManager','newsBanner','featureNewsItems','recentNewsItems'));
    }

    public function show($id)
    {
        $newsBanner=NewsBanner::latest()->first();
        $news=News::findOrFail($id);
        $recentNewsItems = News::where('type', 1)->with('category')->latest()->get();
        return view('frontend.pages.newsroom.show', compact('newsBanner','news','recentNewsItems'));
    }
    public function categoryNews($id)
    {
        $newsCategory=NewsCategory::findOrFail($id);
        $newsBanner=NewsBanner::latest()->first();
        $news = News::where('news_category_id', $id)->latest()->get();
        return view('frontend.pages.newsroom.category-news', compact('newsCategory','newsBanner','news'));
    }
}
