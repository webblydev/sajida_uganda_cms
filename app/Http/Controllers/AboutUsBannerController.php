<?php

namespace App\Http\Controllers;

use App\Models\AboutUsBanner;
use Illuminate\Http\Request;
use Validator;
use DataTables;
use Auth;
use Image;
use DB;
use App\Services\ImageUploadService;
use Illuminate\Support\Facades\File;

class AboutUsBannerController extends Controller
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
        $aboutUsBanner=AboutUsBanner::latest()->first();
        return view('about-us.section-1.createOredit', compact('aboutUsBanner'));
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
            'banner_image' => 'required',
            // 'banner_image' => 'mimes:jpeg,jpg,png|required|max:10000' // max 10000kb
        ]);

        try {
            if ($request->hasfile('banner_image')) {
                $destinationPath = public_path('images/');
                $banner_image = $this->imageUploadService->uploadImages($request->file('banner_image'), $destinationPath);
            }

            AboutUsBanner::create([
                'title' => $request->title,
                'banner_image' => $banner_image
            ]);
            return redirect()->back()->with('success','Top Banner Added Successfully');
        } catch (\Exception $e) {
            $bug = $e->getMessage();
            return redirect()->back()->with('error', $bug);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AboutUsBanner  $aboutUsBanner
     * @return \Illuminate\Http\Response
     */
    public function show(AboutUsBanner $aboutUsBanner)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AboutUsBanner  $aboutUsBanner
     * @return \Illuminate\Http\Response
     */
    public function edit(AboutUsBanner $aboutUsBanner)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AboutUsBanner  $aboutUsBanner
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AboutUsBanner $aboutUsBanner, $id)
    {
        $this->validate($request, [
            'title'=> 'required',
            'banner_image' => 'sometimes|image|mimes:jpeg,jpg,png|max:10000',
        ]);

        try {
            $aboutUsBanner=AboutUsBanner::findOrFail($id);
            // Get the old image file name
            $oldImageFileName = $aboutUsBanner->banner_image;

            if ($request->hasFile('banner_image')) {
                $destinationPath = public_path('images/');

                // Upload the new image
                $banner_image = $this->imageUploadService->uploadImages($request->file('banner_image'), $destinationPath);

                // Delete the old image if it exists
                $oldImagePath = $destinationPath . $oldImageFileName;
                if (File::exists($oldImagePath)) {
                    File::delete($oldImagePath);
                }
            }

            $aboutUsBanner->update([
                'title' => $request->title,
                'banner_image' => $banner_image ?? $oldImageFileName, // Use the new image file name or keep the old one
            ]);
            return redirect()->back()->with('success','Banner Updated Successfully');
        } catch (\Exception $e) {
            $bug = $e->getMessage();
            return redirect()->back()->with('error', $bug);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AboutUsBanner  $aboutUsBanner
     * @return \Illuminate\Http\Response
     */
    public function destroy(AboutUsBanner $aboutUsBanner)
    {
        //
    }
}
