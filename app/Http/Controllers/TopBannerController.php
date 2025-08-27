<?php

namespace App\Http\Controllers;

use App\Models\TopBanner;
use Illuminate\Http\Request;
use Validator;
use DataTables;
use Auth;
use Image;
use DB;
use App\Services\ImageUploadService;
use Illuminate\Support\Facades\File;

class TopBannerController extends Controller
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
        try {
            $topBanners = TopBanner::latest()->get();

            if (request()->ajax()) {
                return DataTables::of($topBanners)

                    ->addColumn('title', function ($topBanner) {
                    
                        return $topBanner->title ?? '';
                    })
                    ->addColumn('banner_image', function ($topBanner) {
                    
                        return '<div class="table-actions text-center">
                        <img src="' . asset('images/' . $topBanner->banner_image) . '" alt="Banner image" height="90px" width="150px" />
                        </div>';
                    })

                    ->addColumn('action', function ($topBanner) {
                        if (Auth::user()->can('edit') && Auth::user()->can('delete')) {
                            return '<div class="table-actions text-center">
                                            <a href="' . route('top-banner.edit', $topBanner->id) . '" title="Edit"><i class="ik ik-edit-2 f-16 mr-15 text-green"></i></a>
                                            <a type="submit" onclick="showDeleteConfirm(' . $topBanner->id . ')" title="Delete"><i class="ik ik-trash-2 f-16 text-red"></i></a>
                                            </div>';
                        } elseif (Auth::user()->can('edit')) {
                            return '<div class="table-actions">
                                            <a href="' . route('top-banner.edit', $topBanner->id) . '" title="Edit"><i class="ik ik-edit-2 f-16 mr-15 text-green"></i></a>
                                            </div>';
                        } elseif (Auth::user()->can('delete')) {
                            return '<div class="table-actions">
                                            <a type="submit" onclick="showDeleteConfirm(' . $topBanner->id . ')" title="Delete"><i class="ik ik-trash-2 f-16 text-red"></i></a>
                                            </div>';
                        }
                    })
                    ->addIndexColumn()
                    ->rawColumns(['banner_image', 'action'])
                    ->make(true);
            }
            return view('top-banner.index');
        } catch (\Exception $e) {
            $bug = $e->getMessage();
            return redirect()->back()->with('error', $bug);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $topBanner=TopBanner::latest()->first();
        return view('top-banner.createoredit', compact('topBanner'));
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

            TopBanner::create([
                'title' => $request->title,
                'banner_image' => $banner_image
            ]);
            return redirect()->route('home-page.top-banner.create')->with('success','Top Banner Added Successfully');
        } catch (\Exception $e) {
            $bug = $e->getMessage();
            return redirect()->back()->with('error', $bug);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TopBanner  $topBanner
     * @return \Illuminate\Http\Response
     */
    public function show(TopBanner $topBanner)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TopBanner  $topBanner
     * @return \Illuminate\Http\Response
     */
    public function edit(TopBanner $topBanner)
    {
        return view ('top-banner.edit', compact('topBanner'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TopBanner  $topBanner
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TopBanner $topBanner)
    {
        $this->validate($request, [
            'title'=> 'required',
            'banner_image' => 'sometimes|image|mimes:jpeg,jpg,png|max:10000',
        ]);

        try {
            // Get the old image file name
            $oldImageFileName = $topBanner->banner_image;

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

            $topBanner->update([
                'title' => $request->title,
                'banner_image' => $banner_image ?? $oldImageFileName, // Use the new image file name or keep the old one
            ]);
            return redirect()->route('home-page.top-banner.create')->with('success','Top Banner Updated Successfully');
        } catch (\Exception $e) {
            $bug = $e->getMessage();
            return redirect()->back()->with('error', $bug);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TopBanner  $topBanner
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, TopBanner $topBanner)
    {
        if ($request->ajax()) {
            try {
                $destinationPath = public_path('images/');
                $imageFileName = $topBanner->banner_image;
                $imagePath = $destinationPath . $imageFileName;
    
                if (File::exists($imagePath)) {
                    File::delete($imagePath);
                }
    
                $topBanner->delete();
    
                return response()->json([
                    'success' => true,
                    'message' => 'Item Deleted Successfully.',
                ]);
            } catch (\Exception $e) {
                $bug = $e->getMessage();
                return response()->json([
                    'success' => false,
                    'message' => $bug,
                ]);
            }
        }
    }
    
}
