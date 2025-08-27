<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Approach;
use App\Models\ApproachItem;
use Validator;
use DataTables;
use Auth;
use Image;
use DB;
use Illuminate\Support\Str;
use App\Services\ImageUploadService;
use Illuminate\Support\Facades\File;

class ApproachItemController extends Controller
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

                $approachItems = ApproachItem::with('approach')->latest()->get();

                return DataTables::of($approachItems)

                    ->addColumn('approach_title', function ($approachItem) {
                    
                        return $approachItem->approach->title ?? '';
                    })
                    ->addColumn('content_title', function ($approachItem) {
                    
                        return $approachItem->content_title ?? '';
                    })
                    ->addColumn('url', function ($approachItem) {

                       return '<div class="text-left">
                                    <a href="' .$approachItem->url. '" target="blank" title="Click to visit the url"><i class="ik ik-globe f-16 mr-15 text-green"></i>' . $approachItem->url . '</a>
                                </div>';
                    })

                    ->addColumn('image', function ($approachItem) {
                    
                        return '<div class="table-actions text-center">
                                    <img src="' . asset('images/' . $approachItem->image) . '" alt="Banner image" height="100px" width="180px" />
                                </div>';
                    })

                    ->addColumn('action', function ($approachItem) {
                        if (Auth::user()->can('edit') && Auth::user()->can('delete')) {
                            return '<div class="table-actions text-center d-flex">
                                            <a href="' . route('home-page.approach-item.edit', $approachItem->id) . '" title="Edit"><i class="ik ik-edit-2 f-16 mr-15 text-green"></i></a>
                                            <a type="submit" onclick="showDeleteConfirm(' . $approachItem->id . ')" title="Delete"><i class="ik ik-trash-2 f-16 text-red"></i></a>
                                            </div>';
                        } elseif (Auth::user()->can('edit')) {
                            return '<div class="table-actions">
                                            <a href="' . route('home-page.approach-item.edit', $approachItem->id) . '" title="Edit"><i class="ik ik-edit-2 f-16 mr-15 text-green"></i></a>
                                            </div>';
                        } elseif (Auth::user()->can('delete')) {
                            return '<div class="table-actions">
                                            <a type="submit" onclick="showDeleteConfirm(' . $approachItem->id . ')" title="Delete"><i class="ik ik-trash-2 f-16 text-red"></i></a>
                                            </div>';
                        }
                    })
                    ->addIndexColumn()
                    ->rawColumns(['description', 'url', 'image', 'action'])
                    ->make(true);
            }
            return view('approach.approach-item.index');
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
       $approaches=Approach::latest()->get();
       return view('approach.approach-item.create', compact('approaches'));
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
            'approach_id'=> 'required',
            'description'=> 'required',
            'summary'=> 'required',
            'image' => 'required',
            'url' => 'required',
            // 'banner_image' => 'mimes:jpeg,jpg,png|required|max:10000' // max 10000kb
        ]);

        try {
            if ($request->hasfile('image')) {
                $destinationPath = public_path('images/');
                $image = $this->imageUploadService->uploadImages($request->file('image'), $destinationPath);
            }

            ApproachItem::create([
                'content_title' => $request->title,
                'approach_id' => $request->approach_id,
                'description' => $request->description,
                'summary' => $request->summary,
                'image' => $image,
                'url' => $request->url
            ]);
            return redirect()->route('home-page.approach-item.index')->with('success','Approach Item Added Successfully');
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
        $approaches=Approach::latest()->get();
        $approachItem=ApproachItem::with('approach')->findOrFail($id);
        return view('approach.approach-item.edit', compact('approaches','approachItem'));
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
            'approach_id'=> 'required',
            'description'=> 'required',
            'summary'=> 'required',
            'url' => 'required',
        ]);

        try {
            $approachItem=ApproachItem::findOrFail($id);
            // Get the old image file name
            $oldImageFileName = $approachItem->image;

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

            $approachItem->update([
                'content_title' => $request->title,
                'approach_id' => $request->approach_id,
                'description' => $request->description,
                'summary' => $request->summary,
                'image' => $image ?? $oldImageFileName,
                'url' => $request->url
            ]);
            return redirect()->route('home-page.approach-item.index')->with('success','Approach Item Updated Successfully');
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
                $approachItem=ApproachItem::findOrFail($id);

                $destinationPath = public_path('images/');
                $imageFileName = $approachItem->image;
                $imagePath = $destinationPath . $imageFileName;
    
                if (File::exists($imagePath)) {
                    File::delete($imagePath);
                }
    
                $approachItem->delete();
    
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
