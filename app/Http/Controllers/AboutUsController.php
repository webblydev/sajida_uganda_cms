<?php

namespace App\Http\Controllers;

use App\Models\AboutUs;
use Illuminate\Http\Request;
use Validator;
use DataTables;
use Auth;
use Image;
use DB;
use Illuminate\Support\Str;
use App\Services\ImageUploadService;
use Illuminate\Support\Facades\File;

class AboutUsController extends Controller
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

                $aboutUss = AboutUs::latest()->get();

                return DataTables::of($aboutUss)

                    ->addColumn('title', function ($aboutUs) {
                    
                        return $aboutUs->title ?? '';
                    })
                    ->addColumn('description', function ($aboutUs) {
                    
                        $shortDescription = Str::limit(strip_tags($aboutUs->description), 100);
    
                        return $shortDescription . (strlen($aboutUs->description) > 100 ? '...' : '');
                    })
                    ->addColumn('image', function ($aboutUs) {
                    
                        return '<div class="table-actions text-center">
                        <img src="' . asset('images/' . $aboutUs->banner_image) . '" alt="Banner image" height="90px" width="150px" />
                        </div>';
                    })

                    ->addColumn('action', function ($aboutUs) {
                        if (Auth::user()->can('edit') && Auth::user()->can('delete')) {
                            return '<div class="table-actions text-center d-flex">
                                            <a href="' . route('about-us.edit', $aboutUs->id) . '" title="Edit"><i class="ik ik-edit-2 f-16 mr-15 text-green"></i></a>
                                            <a type="submit" onclick="showDeleteConfirm(' . $aboutUs->id . ')" title="Delete"><i class="ik ik-trash-2 f-16 text-red"></i></a>
                                            </div>';
                        } elseif (Auth::user()->can('edit')) {
                            return '<div class="table-actions">
                                            <a href="' . route('about-us.edit', $aboutUs->id) . '" title="Edit"><i class="ik ik-edit-2 f-16 mr-15 text-green"></i></a>
                                            </div>';
                        } elseif (Auth::user()->can('delete')) {
                            return '<div class="table-actions">
                                            <a type="submit" onclick="showDeleteConfirm(' . $aboutUs->id . ')" title="Delete"><i class="ik ik-trash-2 f-16 text-red"></i></a>
                                            </div>';
                        }
                    })
                    ->addIndexColumn()
                    ->rawColumns(['description', 'image', 'action'])
                    ->make(true);
            }
            return view('about.index');
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
        return view('about.create');
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
            'banner_image' => 'required',
            // 'banner_image' => 'mimes:jpeg,jpg,png|required|max:10000' // max 10000kb
        ]);

        try {
            if ($request->hasfile('banner_image')) {
                $destinationPath = public_path('images/');
                $banner_image = $this->imageUploadService->uploadImages($request->file('banner_image'), $destinationPath);
            }

            AboutUs::create([
                'title' => $request->title,
                'description' => $request->description,
                'banner_image' => $banner_image
            ]);
            return redirect()->route('about-us.index')->with('success','Approach Item Added Successfully');
        } catch (\Exception $e) {
            $bug = $e->getMessage();
            return redirect()->back()->with('error', $bug);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AboutUs  $aboutUs
     * @return \Illuminate\Http\Response
     */
    public function show(AboutUs $aboutUs)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AboutUs  $aboutUs
     * @return \Illuminate\Http\Response
     */
    public function edit(AboutUs $aboutUs, $id)
    {
        $aboutUs=AboutUs::findOrFail($id);
        return view('about.edit', compact('aboutUs'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AboutUs  $aboutUs
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AboutUs $aboutUs, $id)
    {
        $this->validate($request, [
            'title'=> 'required',
            'description'=> 'required',
            'banner_image' => 'required',
        ]);

        try {
            $aboutUs=AboutUs::findOrFail($id);
            // Get the old image file name
            $oldImageFileName = $aboutUs->banner_image;

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

            $aboutUs->update([
                'title' => $request->title,
                'description' => $request->description,
                'banner_image' => $image ?? $oldImageFileName,
            ]);
            return redirect()->route('about-us.index')->with('success','Item Updated Successfully');
        } catch (\Exception $e) {
            $bug = $e->getMessage();
            return redirect()->back()->with('error', $bug);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AboutUs  $aboutUs
     * @return \Illuminate\Http\Response
     */
    public function destroy(AboutUs $aboutUs, $id)
    {
        if (request()->ajax()) {
            try {
                $aboutUs=AboutUs::findOrFail($id);

                $destinationPath = public_path('images/');
                $imageFileName = $aboutUs->banner_image;
                $imagePath = $destinationPath . $imageFileName;
    
                if (File::exists($imagePath)) {
                    File::delete($imagePath);
                }
    
                $aboutUs->delete();
    
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
