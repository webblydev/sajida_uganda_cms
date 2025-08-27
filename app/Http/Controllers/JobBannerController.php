<?php

namespace App\Http\Controllers;

use App\Models\Career\JobBanner;
use Illuminate\Http\Request;
use Validator;
use DataTables;
use Auth;
use Image;
use DB;
use App\Services\ImageUploadService;
use Illuminate\Support\Facades\File;

class JobBannerController extends Controller
{
    protected $imageUploadService;

    public function __construct(ImageUploadService $imageUploadService)
    {
        $this->imageUploadService = $imageUploadService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $jobBanner=JobBanner::latest()->first();
        return view('jobs.banner.createoredit', compact('jobBanner'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title'=> 'required',
            'banner_image'=> 'required',
        ]);

        try {
            if ($request->hasfile('banner_image')) {
                $destinationPath = public_path('images/');
                $banner_image = $this->imageUploadService->uploadImages($request->file('banner_image'), $destinationPath);
            }

            jobBanner::create([
                'title' => $request->title,
                'banner_image' => $banner_image,
            ]);
            return redirect()->back()->with('success','Data Added Successfully');
        } catch (\Exception $e) {
            $bug = $e->getMessage();
            return redirect()->back()->with('error', $bug);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Career\JobBanner  $jobBanner
     * @return \Illuminate\Http\Response
     */
    public function show(JobBanner $jobBanner)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Career\JobBanner  $jobBanner
     * @return \Illuminate\Http\Response
     */
    public function edit(JobBanner $jobBanner)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Career\JobBanner  $jobBanner
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title'=> 'required',
        ]);

        try {
            $jobBanner=JobBanner::findOrFail($id);
            // Get the old image file name
            $oldBannerImageName = $jobBanner->banner_image;
            if ($request->hasFile('banner_image')) {
                $destinationPath = public_path('images/');

                // Upload the new image
                $bannerImage = $this->imageUploadService->uploadImages($request->file('banner_image'), $destinationPath);

                // Delete the old image if it exists
                $oldImagePath = $destinationPath . $oldBannerImageName;
                if (File::exists($oldImagePath)) {
                    File::delete($oldImagePath);
                }
            }

            $jobBanner->update([
                'title' => $request->title,
                'banner_image' => $bannerImage ?? $oldBannerImageName, // Use the new image file name or keep the old one
            ]);
            return redirect()->back()->with('success','Data Updated Successfully');
        } catch (\Exception $e) {
            $bug = $e->getMessage();
            return redirect()->back()->with('error', $bug);
        }
           
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Career\JobBanner  $jobBanner
     * @return \Illuminate\Http\Response
     */
    public function destroy(JobBanner $jobBanner)
    {
        //
    }
}
