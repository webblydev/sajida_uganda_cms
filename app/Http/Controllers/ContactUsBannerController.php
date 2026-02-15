<?php

namespace App\Http\Controllers;

use App\Models\ContactUsBanner;
use Illuminate\Http\Request;
use Validator;
use DataTables;
use Auth;
use Image;
use DB;
use App\Services\ImageUploadService;
use Illuminate\Support\Facades\File;

class ContactUsBannerController extends Controller
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
        $contactUsBanner = ContactUsBanner::latest()->first();
        return view('contact-us.contact-us-banner.createoredit', compact('contactUsBanner'));
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
            'title' => 'required',
            'background_image' => 'required',
        ]);

        try {
            if ($request->hasfile('background_image')) {
                $destinationPath = public_path('images/');
                $background_image = $this->imageUploadService->uploadImages($request->file('background_image'), $destinationPath);
            }

            ContactUsBanner::create([
                'title' => $request->title,
                'background_image' => $background_image,
            ]);
            
            return redirect()->back()->with('success', 'Contact Us Banner Created Successfully');
        } catch (\Exception $e) {
            $bug = $e->getMessage();
            return redirect()->back()->with('error', $bug);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ContactUsBanner  $contactUsBanner
     * @return \Illuminate\Http\Response
     */
    public function show(ContactUsBanner $contactUsBanner)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ContactUsBanner  $contactUsBanner
     * @return \Illuminate\Http\Response
     */
    public function edit(ContactUsBanner $contactUsBanner)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ContactUsBanner  $contactUsBanner
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ContactUsBanner $contactUsBanner)
    {
        $this->validate($request, [
            'title' => 'required',
        ]);

        try {
            // Get the old image file name
            $oldBackgroundImageName = $contactUsBanner->background_image;

            if ($request->hasFile('background_image')) {
                $destinationPath = public_path('images/');

                // Upload the new image
                $background_image = $this->imageUploadService->uploadImages($request->file('background_image'), $destinationPath);

                // Delete the old image if it exists
                $oldImagePath = $destinationPath . $oldBackgroundImageName;
                if (File::exists($oldImagePath)) {
                    File::delete($oldImagePath);
                }
            }

            $contactUsBanner->update([
                'title' => $request->title,
                'background_image' => $background_image ?? $oldBackgroundImageName,
            ]);
            
            return redirect()->back()->with('success', 'Contact Us Banner Updated Successfully');
        } catch (\Exception $e) {
            $bug = $e->getMessage();
            return redirect()->back()->with('error', $bug);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ContactUsBanner  $contactUsBanner
     * @return \Illuminate\Http\Response
     */
    public function destroy(ContactUsBanner $contactUsBanner)
    {
        //
    }
}
