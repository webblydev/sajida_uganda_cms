<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Career\Team;
use App\Models\Career\Profession;
use App\Models\Career\Location;
use App\Models\Career\JobBanner;
use App\Models\Career\Job;

class CareerController extends Controller
{
    public function index()
    {
        $professions=Profession::latest()->get();
        $teams=Team::latest()->get();
        $locations=Location::latest()->get();
        $jobBanner=JobBanner::latest()->first();
        $jobs = Job::where('status', 1)->with('profession')->latest()->get();
        return view('frontend.pages.career.index', compact('professions','teams','locations','jobBanner','jobs'));
    }

    public function apply($id)
    {
        $jobBanner=JobBanner::latest()->first();
        $job=Job::findOrFail($id);
        return view('frontend.pages.career.show', compact('jobBanner','job'));
    }
}
