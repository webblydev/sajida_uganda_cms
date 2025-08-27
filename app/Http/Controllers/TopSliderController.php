<?php

namespace App\Http\Controllers;

use App\Models\TopSlider;
use Illuminate\Http\Request;
use Validator;
use DataTables;
use Auth;
use Image;
use DB;
use Illuminate\Support\Str;
use App\Services\ImageUploadService;
use Illuminate\Support\Facades\File;

class TopSliderController extends Controller
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
            $topSliders = TopSlider::latest()->get();

            if (request()->ajax()) {
                return DataTables::of($topSliders)

                    ->addColumn('link', function ($topSlider) {
                    
                        return $topSlider->link ?? '';
                    })
                    ->addColumn('slider_image', function ($topSlider) {
                    
                        return '<div class="table-actions text-center">
                        <img src="' . asset('images/' . $topSlider->slider_image) . '" alt="Banner image" height="90px" width="150px" />
                        </div>';
                    })

                    ->addColumn('description', function ($topSlider) {
                    
                        $shortDescription = Str::limit(strip_tags($topSlider->description), 100);
    
                        return $shortDescription . (strlen($topSlider->description) > 100 ? '...' : '');
                    })

                    ->addColumn('action', function ($topSlider) {
                        if (Auth::user()->can('edit') && Auth::user()->can('delete')) {
                            return '<div class="table-actions d-flex">
                                            <a href="' . route('home-page.top-slider.edit', $topSlider->id) . '" title="Edit"><i class="ik ik-edit-2 f-16 mr-15 text-green"></i></a>
                                            <a type="submit" onclick="showDeleteConfirm(' . $topSlider->id . ')" title="Delete"><i class="ik ik-trash-2 f-16 text-red"></i></a>
                                            </div>';
                        } elseif (Auth::user()->can('edit')) {
                            return '<div class="table-actions">
                                            <a href="' . route('home-page.top-slider.edit', $topSlider->id) . '" title="Edit"><i class="ik ik-edit-2 f-16 mr-15 text-green"></i></a>
                                            </div>';
                        } elseif (Auth::user()->can('delete')) {
                            return '<div class="table-actions">
                                            <a type="submit" onclick="showDeleteConfirm(' . $topSlider->id . ')" title="Delete"><i class="ik ik-trash-2 f-16 text-red"></i></a>
                                            </div>';
                        }
                    })
                    ->addIndexColumn()
                    ->rawColumns(['slider_image','description', 'action'])
                    ->make(true);
            }
            return view('top-slider.index');
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
        // $topSlider = TopSlider::latest()->first();
        return view('top-slider.create');
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
            'link'=> 'required',
            'description' => 'required',
            'slider_image' => 'required',
            // 'banner_image' => 'mimes:jpeg,jpg,png|required|max:10000' // max 10000kb
        ]);

        try {
            if ($request->hasfile('slider_image')) {
                $destinationPath = public_path('images/');
                $slider_image = $this->imageUploadService->uploadImages($request->file('slider_image'), $destinationPath);
            }

            TopSlider::create([
                'link' => $request->link,
                'slider_image' => $slider_image,
                'description' => $request->description
            ]);
            return redirect()->route('home-page.top-slider.index')->with('success','Top Slider Added Successfully');
        } catch (\Exception $e) {
            $bug = $e->getMessage();
            return redirect()->back()->with('error', $bug);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TopSlider  $topSlider
     * @return \Illuminate\Http\Response
     */
    public function show(TopSlider $topSlider)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TopSlider  $topSlider
     * @return \Illuminate\Http\Response
     */
    public function edit(TopSlider $topSlider)
    {
        return view('top-slider.edit', compact('topSlider'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TopSlider  $topSlider
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $this->validate($request, [
            'link'=> 'required',
            'description'=> 'required',
            // 'slider_image' => 'sometimes|image|mimes:jpeg,jpg,png|max:10000',
        ]);

        try {
            $topSlider=TopSlider::findOrFail($id);
            // Get the old image file name
            $oldImageFileName = $topSlider->slider_image;

            if ($request->hasFile('slider_image')) {
                $destinationPath = public_path('images/');

                // Upload the new image
                $slider_image = $this->imageUploadService->uploadImages($request->file('slider_image'), $destinationPath);

                // Delete the old image if it exists
                $oldImagePath = $destinationPath . $oldImageFileName;
                if (File::exists($oldImagePath)) {
                    File::delete($oldImagePath);
                }
            }

            $topSlider->update([
                'link' => $request->link,
                'slider_image' => $slider_image ?? $oldImageFileName, // Use the new image file name or keep the old one
                'description' => $request->description
            ]);

            return redirect()->route('home-page.top-slider.index')->with('success','Top Slider Updated Successfully');
        } catch (\Exception $e) {
            $bug = $e->getMessage();
            return redirect()->back()->with('error', $bug);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TopSlider  $topSlider
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, TopSlider $topSlider)
    {
        if ($request->ajax()) {
            try {
                $destinationPath = public_path('images/');
                $imageFileName = $topSlider->slider_image;
                $imagePath = $destinationPath . $imageFileName;
    
                if (File::exists($imagePath)) {
                    File::delete($imagePath);
                }
    
                $topSlider->delete();
    
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
