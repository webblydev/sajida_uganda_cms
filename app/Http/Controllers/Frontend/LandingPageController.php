<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    public function landingPage()
    {
        return view('frontend.pages.home.landing-page');
    }

    //healthPage
    public function healthPage()
    {
        return view('frontend.pages.home.health-index');
    }

    //microfinancePage
    public function microfinancePage()
    {
        return view('frontend.pages.home.index');
    }

}
