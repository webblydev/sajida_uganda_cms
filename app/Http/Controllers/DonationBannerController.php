<?php

namespace App\Http\Controllers;

use App\Models\Donation\DonationBanner;
use Illuminate\Http\Request;
use Validator;
use DataTables;
use Auth;
use Image;
use DB;
use App\Services\ImageUploadService;
use Illuminate\Support\Facades\File;

class DonationBannerController extends Controller
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
        $donationBanner=DonationBanner::latest()->first();
        return view('donation.banner.createoredit', compact('donationBanner'));
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
            'heading'=> 'required',
            'information'=> 'required',
            'form_image'=> 'required',
            'banner_image'=> 'required',
        ]);

        try {
            if ($request->hasfile('banner_image')) {
                $destinationPath = public_path('images/');
                $banner_image = $this->imageUploadService->uploadImages($request->file('banner_image'), $destinationPath);
            }
            if ($request->hasfile('form_image')) {
                $destinationPath = public_path('images/');
                $form_image = $this->imageUploadService->uploadImages($request->file('form_image'), $destinationPath);
            }

            DonationBanner::create([
                'title' => $request->title,
                'heading' => $request->heading,
                'information' => $request->information,
                'banner_image' => $banner_image,
                'form_image' => $form_image,
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
     * @param  \App\Models\Donation\DonationBanner  $donationBanner
     * @return \Illuminate\Http\Response
     */
    public function show(DonationBanner $donationBanner)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Donation\DonationBanner  $donationBanner
     * @return \Illuminate\Http\Response
     */
    public function edit(DonationBanner $donationBanner)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Donation\DonationBanner  $donationBanner
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title'=> 'required',
            'heading'=> 'required',
            'information'=> 'required',
        ]);

        try {
            $donationBanner=DonationBanner::findOrFail($id);
            // Get the old image file name
            $oldBannerImageName = $donationBanner->banner_image;
            $oldFormimgeName = $donationBanner->form_image;

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

            if ($request->hasFile('form_image')) {
                $destinationPath = public_path('images/');

                // Upload the new image
                $formImage = $this->imageUploadService->uploadImages($request->file('form_image'), $destinationPath);

                // Delete the old image if it exists
                $oldformImagePath = $destinationPath . $oldFormimgeName;
                if (File::exists($oldformImagePath)) {
                    File::delete($oldformImagePath);
                }
            }
            $donationBanner->update([
                'title' => $request->title,
                'heading' => $request->heading,
                'information' => $request->information,
                'form_image' => $formImage ?? $oldFormimgeName,
                'banner_image' => $bannerImage ?? $oldBannerImageName, // Use the new image file name or keep the old one
            ]);
            return redirect()->back()->with('success','Data Updated Successfully');
        } catch (\Exception $e) {
            $bug = $e->getMessage();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Donation\DonationBanner  $donationBanner
     * @return \Illuminate\Http\Response
     */
    public function destroy(DonationBanner $donationBanner)
    {
        //
    }
}
