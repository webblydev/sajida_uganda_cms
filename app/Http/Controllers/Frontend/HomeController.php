<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TopBanner;
use App\Models\TopSlider;
use App\Models\Approach;
use App\Models\ApproachItem;
use App\Models\MiddleBanner;
use App\Models\MiddleBannerItem;
use App\Models\Member;
use App\Models\BottomBanner;
use App\Models\NewsCategory;
use App\Models\HomePageManager;
use App\Models\News;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $homePageManager=HomePageManager::latest()->first(); 

        $topBanner = TopBanner::latest()->first();
        $topSliders = TopSlider::latest()->get();
        $approaches = Approach::where('status',1)->with('approachItems')->latest()->get();
        $approachItems = ApproachItem::latest()->get();
        $middleBanner = MiddleBanner::latest()->first();
        $middleBannerItems = MiddleBannerItem::latest()->get();
        $members = Member::with('designation', 'category')->orderBy('order_no', 'ASC')->get();
        $bottomBanner = BottomBanner::latest()->first();
        $newsCategories = NewsCategory::where('status',1)->latest()->get();
        $featureNewsItems = News::where('type', 0)->with('category')->latest()->get();
        dd($featureNewsItems);
        return view('frontend.pages.home.index',compact('homePageManager','topBanner','topSliders','approaches','approachItems','middleBanner','middleBannerItems','members','bottomBanner','newsCategories','featureNewsItems'));
    }

    public function approachShow($id)
    {
        $approachItem = ApproachItem::findOrFail($id);
        return view('frontend.pages.home.approach-show',compact('approachItem'));
    }

}
