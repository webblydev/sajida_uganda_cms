<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AboutUsContent;
use Validator;
use DataTables;
use Auth;
use Image;
use DB;
use Illuminate\Support\Str;
use App\Services\ImageUploadService;
use Illuminate\Support\Facades\File;
use App\Models\MemberCategory;

class AboutUsContentController extends Controller
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

                $aboutUsContents = AboutUsContent::latest()->get();

                return DataTables::of($aboutUsContents)

                    ->addColumn('category', function ($aboutUsContent) {
                    
                        return $aboutUsContent->category->title ?? '';
                    })
                    ->addColumn('title', function ($aboutUsContent) {
                    
                        return $aboutUsContent->title ?? '';
                    })
                    ->addColumn('description', function ($aboutUsContent) {
                    
                        $shortDescription = Str::limit(strip_tags($aboutUsContent->description), 100);
    
                        return $shortDescription . (strlen($aboutUsContent->description) > 100 ? '...' : '');
                    })
                    ->addColumn('image', function ($aboutUsContent) {
                    
                        return '<div class="table-actions text-center">
                        <img src="' . asset('images/' . $aboutUsContent->banner_image) . '" alt="Banner image" height="90px" width="150px" />
                        </div>';
                    })

                    ->addColumn('action', function ($aboutUsContent) {
                        if (Auth::user()->can('edit') && Auth::user()->can('delete')) {
                            return '<div class="table-actions text-center d-flex">
                                            <a href="' . route('about-us-content.edit', $aboutUsContent->id) . '" title="Edit"><i class="ik ik-edit-2 f-16 mr-15 text-green"></i></a>
                                            <a type="submit" onclick="showDeleteConfirm(' . $aboutUsContent->id . ')" title="Delete"><i class="ik ik-trash-2 f-16 text-red"></i></a>
                                            </div>';
                        } elseif (Auth::user()->can('edit')) {
                            return '<div class="table-actions">
                                            <a href="' . route('about-us-content.edit', $aboutUsContent->id) . '" title="Edit"><i class="ik ik-edit-2 f-16 mr-15 text-green"></i></a>
                                            </div>';
                        } elseif (Auth::user()->can('delete')) {
                            return '<div class="table-actions">
                                            <a type="submit" onclick="showDeleteConfirm(' . $aboutUsContent->id . ')" title="Delete"><i class="ik ik-trash-2 f-16 text-red"></i></a>
                                            </div>';
                        }
                    })
                    ->addIndexColumn()
                    ->rawColumns(['description', 'image', 'action'])
                    ->make(true);
            }
            return view('about-us-content.index');
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
        $memberCategories=MemberCategory::latest()->get();
        return view('about-us-content.create', compact('memberCategories'));
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
            'member_category_id'=> 'required',
            'title'=> 'required',
            'description'=> 'required',
            'banner_image' => 'required',
            // 'banner_image' => 'mimes:jpeg,jpg,png|required|max:10000' // max 10000kb
        ]);

        try {
            if ($request->hasfile('banner_image')) {
                $destinationPath = public_path('images/');
                $image = $this->imageUploadService->uploadImages($request->file('banner_image'), $destinationPath);
            }

            AboutUsContent::create([
                'member_category_id' => $request->member_category_id,
                'title' => $request->title,
                'description' => $request->description,
                'banner_image' => $image
            ]);
            return redirect()->route('about-us-content.index')->with('success','Content Added Successfully');
        } catch (\Exception $e) {
            $bug = $e->getMessage();
            return redirect()->back()->with('error', $bug);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $aboutUsContent=AboutUsContent::findOrFail($id);
        $memberCategories=MemberCategory::latest()->get();
        return view('about-us-content.edit', compact('aboutUsContent','memberCategories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'member_category_id'=> 'required',
            'title'=> 'required',
            'description'=> 'required',
            'banner_image' => 'required',
            // 'banner_image' => 'mimes:jpeg,jpg,png|required|max:10000' // max 10000kb
        ]);
        try {
            $aboutUsContent=AboutUsContent::findOrFail($id);
            // Get the old image file name
            $oldImageFileName = $aboutUsContent->banner_image;

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

            $aboutUsContent->update([
                'member_category_id' => $request->member_category_id,
                'title' => $request->title,
                'description' => $request->description,
                'banner_image' => $image ?? $oldImageFileName,
            ]);
            return redirect()->route('about-us-content.index')->with('success','Content Updated Successfully');
        } catch (\Exception $e) {
            $bug = $e->getMessage();
            return redirect()->back()->with('error', $bug);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (request()->ajax()) {
            try {
                $aboutUsContent=AboutUsContent::findOrFail($id);
                $destinationPath = public_path('images/');
                $imageFileName = $aboutUsContent->banner_image;
                $imagePath = $destinationPath . $imageFileName;
    
                if (File::exists($imagePath)) {
                    File::delete($imagePath);
                }
    
                $aboutUsContent->delete();
    
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
