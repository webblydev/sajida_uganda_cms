<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\News;
use App\Models\TopBanner;
use App\Models\TopSlider;
use App\Models\Approach;
use App\Models\ImpactModel;
use App\Models\MiddleBannerItem;
use App\Models\MiddleBanner;
use App\Models\DonationSection;
use App\Models\DonationSectionTwo;

class LandingPageController extends Controller
{
    public function landingPage()
    {
        return view('frontend.pages.home.landing-page');
    }

    //foundationPage
    public function foundationPage()
    {
        $topBanner = TopBanner::latest()->first();
        $topSlider = TopSlider::latest()->first();
        $healthNews = Approach::where('status',1)->where('type', 'Health')->latest()->get();
        $financialNews = Approach::where('status',1)->where('type', 'Financial')->latest()->get();
        $oneFeatureNewsItems = News::where('type', 0)->where('news_category_id', 1)->with('category')->latest()->get();
        $twoFeatureNewsItems = News::where('type', 0)->where('news_category_id', 2)->with('category')->latest()->get();
        $featureNewsItems = News::where('type', 0)->with('category')->latest()->get();
        $impact = ImpactModel::latest()->first();
        $middleBanner = MiddleBanner::latest()->first();
        $middleBannerItems = MiddleBannerItem::latest()->get();
        $donationSection = DonationSection::latest()->first();
        $donationSectionTwo = DonationSectionTwo::latest()->first();
        return view('frontend.pages.home.index', compact('topBanner', 'topSlider', 'healthNews','financialNews','oneFeatureNewsItems', 'twoFeatureNewsItems', 'featureNewsItems', 'impact', 'middleBanner', 'middleBannerItems', 'donationSection', 'donationSectionTwo'));
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
