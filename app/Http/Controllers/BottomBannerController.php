<?php

namespace App\Http\Controllers;

use App\Models\BottomBanner;
use Illuminate\Http\Request;
use Validator;
use DataTables;
use Auth;
use Image;
use DB;
use Illuminate\Support\Str;
use App\Services\ImageUploadService;
use Illuminate\Support\Facades\File;


class BottomBannerController extends Controller
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
            if (request()->ajax()) {

                $bottomBanners = BottomBanner::latest()->get();

                return DataTables::of($bottomBanners)

                    ->addColumn('title', function ($bottomBanner) {
                    
                        return $bottomBanner->title ?? '';
                    })

                    ->addColumn('description', function ($bottomBanner) {
                    
                        $shortDescription = Str::limit(strip_tags($bottomBanner->description), 100);
    
                        return $shortDescription . (strlen($bottomBanner->description) > 100 ? '...' : '');
                    })
                    ->addColumn('banner_image', function ($bottomBanner) {
                    
                        return '<div class="table-actions text-center">
                        <img src="' . asset('images/' . $bottomBanner->banner_image) . '" alt="Banner image" height="90px" width="150px" />
                        </div>';
                    })

                    ->addColumn('action', function ($bottomBanner) {
                        if (Auth::user()->can('edit') && Auth::user()->can('delete')) {
                            return '<div class="table-actions text-center d-flex">
                                            <a href="' . route('home-page.bottom-banner.edit', $bottomBanner->id) . '" title="Edit"><i class="ik ik-edit-2 f-16 mr-15 text-green"></i></a>
                                            <a type="submit" onclick="showDeleteConfirm(' . $bottomBanner->id . ')" title="Delete"><i class="ik ik-trash-2 f-16 text-red"></i></a>
                                            </div>';
                        } elseif (Auth::user()->can('edit')) {
                            return '<div class="table-actions">
                                            <a href="' . route('home-page.bottom-banner.edit', $bottomBanner->id) . '" title="Edit"><i class="ik ik-edit-2 f-16 mr-15 text-green"></i></a>
                                            </div>';
                        } elseif (Auth::user()->can('delete')) {
                            return '<div class="table-actions">
                                            <a type="submit" onclick="showDeleteConfirm(' . $bottomBanner->id . ')" title="Delete"><i class="ik ik-trash-2 f-16 text-red"></i></a>
                                            </div>';
                        }
                    })
                    ->addIndexColumn()
                    ->rawColumns(['description', 'banner_image', 'action'])
                    ->make(true);
            }
            return view('bottom-banner.index');
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
        $bottomBanner=BottomBanner::latest()->first();
        return view('bottom-banner.createoredit', compact('bottomBanner'));
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
            'banner_image' => 'required',
            // 'banner_image' => 'mimes:jpeg,jpg,png|required|max:10000' // max 10000kb
        ]);

        try {
            if ($request->hasfile('banner_image')) {
                $destinationPath = public_path('images/');
                $banner_image = $this->imageUploadService->uploadImages($request->file('banner_image'), $destinationPath);
            }

            bottomBanner::create([
                'title' => $request->title,
                'link' => $request->link,
                'description' => $request->description,
                'banner_image' => $banner_image
            ]);
            return redirect()->route('bottom-banner.index')->with('success','Banner Added Successfully');
        } catch (\Exception $e) {
            $bug = $e->getMessage();
            return redirect()->back()->with('error', $bug);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BottomBanner  $bottomBanner
     * @return \Illuminate\Http\Response
     */
    public function show(BottomBanner $bottomBanner)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BottomBanner  $bottomBanner
     * @return \Illuminate\Http\Response
     */
    public function edit(BottomBanner $bottomBanner)
    {
        return view('bottom-banner.edit', compact('bottomBanner'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BottomBanner  $bottomBanner
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BottomBanner $bottomBanner)
    {
        $this->validate($request, [
            'title'=> 'required',
            'link'=> 'required',
            'description'=> 'required',
            // 'banner_image' => 'required',
            // 'banner_image' => 'mimes:jpeg,jpg,png|required|max:10000' // max 10000kb
        ]);

        try {
            // Get the old image file name
            $oldImageFileName = $bottomBanner->banner_image;

            if ($request->hasFile('banner_image')) {
                $destinationPath = public_path('images/');

                // Upload the new image
                $image = $this->imageUploadService->uploadImages($request->file('banner_image'), $destinationPath);

                // Delete the old image if it exists
                $oldImagePath = $destinationPath . $oldImageFileName;
                if (File::exists($oldImagePath)) {
                    File::delete($oldImagePath);
                }
            }

            $bottomBanner->update([
                'title' => $request->title,
                'link' => $request->link,
                'description' => $request->description,
                'banner_image' => $image ?? $oldImageFileName,
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
     * @param  \App\Models\BottomBanner  $bottomBanner
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, BottomBanner $bottomBanner)
    {
        if ($request->ajax()) {
            try {

                $destinationPath = public_path('images/');
                $imageFileName = $bottomBanner->banner_image;
                $imagePath = $destinationPath . $imageFileName;
    
                if (File::exists($imagePath)) {
                    File::delete($imagePath);
                }
    
                $bottomBanner->delete();
    
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
