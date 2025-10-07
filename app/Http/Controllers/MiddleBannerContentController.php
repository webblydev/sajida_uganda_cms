<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use DataTables;
use Auth;
use Illuminate\Support\Str;
use App\Models\MiddleBannerItem;
use App\Models\MiddleBanner;
use Image;
use DB;
use App\Services\ImageUploadService;
use Illuminate\Support\Facades\File;

class MiddleBannerContentController extends Controller
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
            $middleBanner = MiddleBanner::latest()->first();
            $middleBannerItems = MiddleBannerItem::latest()->get();

            if (request()->ajax()) {
                return DataTables::of($middleBannerItems)

                    ->addColumn('country_name', function ($middleBannerItem) {
                    
                        return $middleBannerItem->country_name ?? '';
                    })

                    ->addColumn('country_image', function ($middleBannerItem) {
                    
                        return '<div class="table-actions text-center">
                        <img src="' . asset('images/' . $middleBannerItem->country_image) . '" alt="Country image" height="90px" width="150px" />
                        </div>';
                    })

                    ->addColumn('description', function ($middleBannerItem) {
                    
                        $shortDescription = Str::limit(strip_tags($middleBannerItem->description), 100);
    
                        return $shortDescription . (strlen($middleBannerItem->description) > 100 ? '...' : '');
                    })

                    ->addColumn('action', function ($middleBannerItem) {
                        if (Auth::user()->can('edit') && Auth::user()->can('delete')) {
                            return '<div class="table-actions text-center">
                                            <a href="' . route('home-page.middle-banner-content.edit', $middleBannerItem->id) . '" title="Edit"><i class="ik ik-edit-2 f-16 mr-15 text-green"></i></a>
                                            <a type="submit" onclick="showDeleteConfirm(' . $middleBannerItem->id . ')" title="Delete"><i class="ik ik-trash-2 f-16 text-red"></i></a>
                                            </div>';
                        } elseif (Auth::user()->can('edit')) {
                            return '<div class="table-actions">
                                            <a href="' . route('home-page.middle-banner-content.edit', $middleBannerItem->id) . '" title="Edit"><i class="ik ik-edit-2 f-16 mr-15 text-green"></i></a>
                                            </div>';
                        } elseif (Auth::user()->can('delete')) {
                            return '<div class="table-actions">
                                            <a type="submit" onclick="showDeleteConfirm(' . $middleBannerItem->id . ')" title="Delete"><i class="ik ik-trash-2 f-16 text-red"></i></a>
                                            </div>';
                        }
                    })
                    ->addIndexColumn()
                    ->rawColumns(['country_image','description', 'action'])
                    ->make(true);
            }
            return view('middle-banner.middle-banner-item.index', compact('middleBanner'));
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
        return view('middle-banner.middle-banner-item.create');
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
            'country_name'=> 'required',
            'country_image'=> 'required',
            'link'=> 'required',
        ]);

        try {

            if ($request->hasfile('country_image')) {
                $destinationPath = public_path('images/');
                $image = $this->imageUploadService->uploadImages($request->file('country_image'), $destinationPath);
            }

            MiddleBannerItem::create([
                'country_image' => $image,
                'country_name' => $request->country_name,
                'description' => $request->title,
                'link' => $request->link,
            ]);
            return redirect()->route('home-page.middle-banner-content.index')->with('success','Content Added Successfully');
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
        $middleBannerItem=MiddleBannerItem::findOrFail($id);
        return view('middle-banner.middle-banner-item.edit', compact('middleBannerItem'));
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
            'title'=> 'required',
            'country_name'=> 'required',
            'link'=> 'required',
            'country_image'=> 'sometimes|image|mimes:jpeg,jpg,png|max:10000',
        ]);

        try {
            $middleBannerItem=MiddleBannerItem::findOrFail($id);

            // Get the old image file name
            $oldImageFileName = $middleBannerItem->country_image;

            if ($request->hasFile('country_image')) {
                $destinationPath = public_path('images/');

                // Upload the new image
                $image = $this->imageUploadService->uploadImages($request->file('country_image'), $destinationPath);

                // Delete the old image if it exists
                $oldImagePath = $destinationPath . $oldImageFileName;
                if (File::exists($oldImagePath)) {
                    File::delete($oldImagePath);
                }
            }

            $middleBannerItem->update([
                'country_name' => $request->country_name,
                'country_image' => $image ?? $oldImageFileName,
                'description' => $request->title,
                'link' => $request->link,
            ]);
            return redirect()->route('home-page.middle-banner-content.index')->with('success','Content Updated Successfully');
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
    public function destroy(Request $request, $id)
    {
        if ($request->ajax()) {
            try {
                $middleBannerItem=MiddleBannerItem::findOrFail($id);
    
                $middleBannerItem->delete();
    
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
