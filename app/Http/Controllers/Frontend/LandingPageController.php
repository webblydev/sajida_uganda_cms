<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\News;

class LandingPageController extends Controller
{
    public function landingPage()
    {
        return view('frontend.pages.home.landing-page');
    }

    //foundationPage
    public function foundationPage()
    {
        $oneFeatureNewsItems = News::where('type', 0)->where('news_category_id', 1)->with('category')->latest()->get();
        $twoFeatureNewsItems = News::where('type', 0)->where('news_category_id', 2)->with('category')->latest()->get();
        $featureNewsItems = News::where('type', 0)->with('category')->latest()->get();
        return view('frontend.pages.home.index', compact('oneFeatureNewsItems', 'twoFeatureNewsItems', 'featureNewsItems'));
        // return view('frontend.pages.home.foundation-index');
    }

    //microfinancePage
    public function microfinancePage()
    {
        return view('frontend.pages.home.index');
    }

    //healthPage
    public function healthPage()
    {
        return view('frontend.pages.home.health-index');
    }

}
