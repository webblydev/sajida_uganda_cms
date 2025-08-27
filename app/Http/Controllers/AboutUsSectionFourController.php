<?php

namespace App\Http\Controllers;

use App\Models\AboutUsSectionFour;
use Illuminate\Http\Request;
use Validator;
use DataTables;
use Auth;
use Image;
use DB;
use Illuminate\Support\Str;
use App\Services\ImageUploadService;
use Illuminate\Support\Facades\File;

class AboutUsSectionFourController extends Controller
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
        $aboutUsSectionFour=AboutUsSectionFour::latest()->first();
        return view('about-us.section-5.createOredit', compact('aboutUsSectionFour'));
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
            'link'=> 'required',
            'description'=> 'required',
            'image' => 'required',
        ]);

        try {
            if ($request->hasfile('image')) {
                $destinationPath = public_path('images/');
                $image = $this->imageUploadService->uploadImages($request->file('image'), $destinationPath);
            }

            AboutUsSectionFour::create([
                'title' => $request->title,
                'link' => $request->link,
                'description' => $request->description,
                'image' => $image
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
     * @param  \App\Models\AboutUsSectionFour  $aboutUsSectionFour
     * @return \Illuminate\Http\Response
     */
    public function show(AboutUsSectionFour $aboutUsSectionFour)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AboutUsSectionFour  $aboutUsSectionFour
     * @return \Illuminate\Http\Response
     */
    public function edit(AboutUsSectionFour $aboutUsSectionFour)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AboutUsSectionFour  $aboutUsSectionFour
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AboutUsSectionFour $aboutUsSectionFour, $id)
    {
        $this->validate($request, [
            'title'=> 'required',
            'link'=> 'required',
            'description'=> 'required',
        ]);

        try {
            $aboutUsSectionFour=AboutUsSectionFour::findOrFail($id);
            // Get the old image file name
            $oldImageFileName = $aboutUsSectionFour->image;

            if ($request->hasFile('image')) {
                $destinationPath = public_path('images/');

                // Upload the new image
                $image = $this->imageUploadService->uploadImages($request->file('image'), $destinationPath);

                // Delete the old image if it exists
                $oldImagePath = $destinationPath . $oldImageFileName;
                if (File::exists($oldImagePath)) {
                    File::delete($oldImagePath);
                }
            }

            $aboutUsSectionFour->update([
                'title' => $request->title,
                'link' => $request->link,
                'description' => $request->description,
                'image' => $image ?? $oldImageFileName,
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
     * @param  \App\Models\AboutUsSectionFour  $aboutUsSectionFour
     * @return \Illuminate\Http\Response
     */
    public function destroy(AboutUsSectionFour $aboutUsSectionFour)
    {
        //
    }
}
