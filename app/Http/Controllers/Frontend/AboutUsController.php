<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AboutUsBanner;
use App\Models\AboutUsSectionOne;
use App\Models\AboutUsSectionTwo;
use App\Models\AboutUsSectionThree;
use App\Models\AboutUsSectionFour;
use App\Models\AboutUsSectionFive;
use App\Models\AboutUsSectionSix;
use App\Models\AboutUsSectionSeven;
use App\Models\AboutPageManager;
use App\Models\Member;
use App\Models\MemberCategory;

class AboutUsController extends Controller
{
    public function index()
    {
        $aboutPageManager=AboutPageManager::latest()->first(); 

        $aboutUsBanner=AboutUsBanner::latest()->first();
        $aboutUsSectionOne=AboutUsSectionOne::latest()->first();
        $aboutUsSectionTwo=AboutUsSectionTwo::latest()->first();
        $aboutUsSectionThree=AboutUsSectionThree::latest()->first();
        $aboutUsSectionFour=AboutUsSectionFour::latest()->first();
        $aboutUsSectionFive=AboutUsSectionFive::latest()->first();
        $aboutUsSectionSix=AboutUsSectionSix::latest()->first();
        $aboutUsSectionSeven=AboutUsSectionSeven::latest()->first();
        return view('frontend.pages.about-us.index', compact('aboutPageManager','aboutUsBanner','aboutUsSectionOne','aboutUsSectionTwo','aboutUsSectionThree','aboutUsSectionFour','aboutUsSectionFive','aboutUsSectionSix','aboutUsSectionSeven'));
    }

    public function show($slug)
    {
        $aboutUsBanner=AboutUsBanner::latest()->first();
        $memberCategory=MemberCategory::where('slug',$slug)->first();
        $members=Member::where('member_category_id', $memberCategory->id)->get();
        return view('frontend.pages.about-us.member-category', compact('aboutUsBanner','memberCategory','members'));
    }

}
