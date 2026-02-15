<?php

namespace App\Http\Controllers;

use App\Models\AboutUsSectionTwo;
use Illuminate\Http\Request;
use Validator;
use DataTables;
use Auth;
use Image;
use DB;
use Illuminate\Support\Str;
use App\Services\ImageUploadService;
use Illuminate\Support\Facades\File;

class AboutUsSectionTwoController extends Controller
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
        $aboutUsSectionTwo=AboutUsSectionTwo::latest()->first();
        return view('about-us.section-3.createOredit', compact('aboutUsSectionTwo'));
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
            'images' => 'nullable|array|max:4',
        ]);

        try {
            if ($request->hasfile('images')) {
                $destinationPath = public_path('images/');
                $image = $this->imageUploadService->uploadImages($request->file('images'), $destinationPath);
            }

            AboutUsSectionTwo::create([
                // multiple images
                'images' => isset($image) ? json_encode($image) : null,
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
     * @param  \App\Models\AboutUsSectionTwo  $aboutUsSectionTwo
     * @return \Illuminate\Http\Response
     */
    public function show(AboutUsSectionTwo $aboutUsSectionTwo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AboutUsSectionTwo  $aboutUsSectionTwo
     * @return \Illuminate\Http\Response
     */
    public function edit(AboutUsSectionTwo $aboutUsSectionTwo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AboutUsSectionTwo  $aboutUsSectionTwo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AboutUsSectionTwo $aboutUsSectionTwo, $id)
    {
        $this->validate($request, [
            'images' => 'nullable|array|max:4',
        ]);

        try {
            $aboutUsSectionTwo=AboutUsSectionTwo::findOrFail($id);
            // Get the old image file name
            $oldImageFileName = $aboutUsSectionTwo->images;

            if ($request->hasFile('images')) {
                $destinationPath = public_path('images/');

                // Upload the new image
                $image = $this->imageUploadService->uploadImages($request->file('images'), $destinationPath);

                // Delete the old image if it exists
                $oldImagePath = $destinationPath . $oldImageFileName;
                if (File::exists($oldImagePath)) {
                    File::delete($oldImagePath);
                }
            }

            $aboutUsSectionTwo->update([
                'images' => isset($image) ? json_encode($image) : $oldImageFileName,
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
     * @param  \App\Models\AboutUsSectionTwo  $aboutUsSectionTwo
     * @return \Illuminate\Http\Response
     */
    public function destroy(AboutUsSectionTwo $aboutUsSectionTwo)
    {
        //
    }
}
