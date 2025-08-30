<?php

namespace App\Http\Controllers;

use App\Models\NewsBanner;
use Illuminate\Http\Request;
use Validator;
use DataTables;
use Auth;
use Image;
use DB;
use App\Services\ImageUploadService;
use Illuminate\Support\Facades\File;

class NewsBannerController extends Controller
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

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $newsBanner=NewsBanner::latest()->first();
        return view('news.news-banner.createoredit', compact('newsBanner'));
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
            'description'=> 'required',
            'background_image' => 'required',
            // 'thumbnail' => 'required',
        ]);

        try {
            $thumbnail = '';
            if ($request->hasfile('background_image')) {
                $destinationPath = public_path('images/');
                $background_image = $this->imageUploadService->uploadImages($request->file('background_image'), $destinationPath);
            }
            if ($request->hasfile('thumbnail')) {
                $destinationPath = public_path('images/');
                $thumbnail = $this->imageUploadService->uploadImages($request->file('thumbnail'), $destinationPath);
            }

            NewsBanner::create([
                'title' => $request->title,
                'description' => $request->description,
                'background_image' => $background_image,
                'thumbnail' => $thumbnail,
                'link' => $request->link,
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
     * @param  \App\Models\NewsBanner  $newsBanner
     * @return \Illuminate\Http\Response
     */
    public function show(NewsBanner $newsBanner)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\NewsBanner  $newsBanner
     * @return \Illuminate\Http\Response
     */
    public function edit(NewsBanner $newsBanner)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\NewsBanner  $newsBanner
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, NewsBanner $newsBanner)
    {
        {
            $this->validate($request, [
                'title'=> 'required',
                'description'=> 'required',
            ]);
    
            try {
                // Get the old image file name
                $oldBackgroundImageName = $newsBanner->background_image;

                $oldThumbNailmageName = $newsBanner->thumbnail;
    
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

                if ($request->hasFile('thumbnail')) {
                    $destinationPath = public_path('images/');
    
                    // Upload the new image
                    $thumbnail = $this->imageUploadService->uploadImages($request->file('thumbnail'), $destinationPath);
    
                    // Delete the old image if it exists
                    $oldThumbnailImagePath = $destinationPath . $oldThumbNailmageName;
                    if (File::exists($oldThumbnailImagePath)) {
                        File::delete($oldThumbnailImagePath);
                    }
                }
    
                $newsBanner->update([
                    'title' => $request->title,
                    'description' => $request->description,
                    'background_image' => $background_image ?? $oldBackgroundImageName, // Use the new image file name or keep the old one
                    'thumbnail' => $thumbnail ?? $oldThumbNailmageName, // Use the new image file name or keep the old one
                    'link' => $request->link,
                ]);
                return redirect()->back()->with('success','Data Updated Successfully');
            } catch (\Exception $e) {
                $bug = $e->getMessage();
                return redirect()->back()->with('error', $bug);
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\NewsBanner  $newsBanner
     * @return \Illuminate\Http\Response
     */
    public function destroy(NewsBanner $newsBanner)
    {
        //
    }
}
