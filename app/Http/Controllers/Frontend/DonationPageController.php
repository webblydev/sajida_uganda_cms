<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Donation\DonationBanner;

class DonationPageController extends Controller
{
    public function index()
    {
        $donationBanner=DonationBanner::latest()->first();
        return view('frontend.pages.donation.index', compact('donationBanner'));
    }
}
