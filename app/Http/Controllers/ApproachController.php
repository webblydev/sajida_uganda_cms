<?php

namespace App\Http\Controllers;

use App\Models\Approach;
use Illuminate\Http\Request;
use Validator;
use DataTables;
use Auth;
use Image;
use DB;
use Illuminate\Support\Str;
use App\Services\ImageUploadService;
use Illuminate\Support\Facades\File;

class ApproachController extends Controller
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
            $approaches = Approach::latest()->get();

            if (request()->ajax()) {
                return DataTables::of($approaches)

                    ->addColumn('title', function ($approache) {
                    
                        return $approache->title ?? '';
                    })
                    // type
                    ->addColumn('type', function ($approache) {
                        return $approache->type;
                    })
                    // image
                    ->addColumn('image', function ($approache) {
                        return '<div class="table-actions text-center">
                        <img src="' . asset('images/' . $approache->image) . '" alt="Banner image" height="90px" width="150px" />
                        </div>';
                    })
                    ->addColumn('status', function ($approache) {
                        if (Auth::user()->can('manage_user')) {
                            $button = '<label class="switch">';
                            $button .= ' <input type="checkbox" class="changeStatus" id="customSwitch' . $approache->id . '" getId="' . $approache->id . '" title="status"';
    
                            if ($approache->status == 1) {
                                $button .= "checked";
                            }
                            $button .= ' ><span class="slider round"></span>';
                            $button .= '</label>';
                            return $button;
                        }else{
                            if($approache->status == 1){
                                return '<span class="badge badge-success" title="Active">Active</span>';
                            }elseif($approache->status == 0){
                                    return '<span class="badge badge-danger" title="Inactive">Inactive</span>';
                            }
                        }
    
                    })
                    ->addColumn('action', function ($approache) {
                        if (Auth::user()->can('edit') && Auth::user()->can('delete')) {
                            return '<div class="table-actions text-center">
                                            <a href="' . route('home-page.approach.edit', $approache->id) . '" title="Edit"><i class="ik ik-edit-2 f-16 mr-15 text-green"></i></a>
                                            <a type="submit" onclick="showDeleteConfirm(' . $approache->id . ')" title="Delete"><i class="ik ik-trash-2 f-16 text-red"></i></a>
                                            </div>';
                        } elseif (Auth::user()->can('edit')) {
                            return '<div class="table-actions">
                                            <a href="' . route('home-page.approach.edit', $approache->id) . '" title="Edit"><i class="ik ik-edit-2 f-16 mr-15 text-green"></i></a>
                                            </div>';
                        } elseif (Auth::user()->can('delete')) {
                            return '<div class="table-actions">
                                            <a type="submit" onclick="showDeleteConfirm(' . $approache->id . ')" title="Delete"><i class="ik ik-trash-2 f-16 text-red"></i></a>
                                            </div>';
                        }
                    })
                    ->addIndexColumn()
                    ->rawColumns(['status', 'action', 'image'])
                    ->make(true);
            }
            return view('approach.index');
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
        return view('approach.create');
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
            'description' => 'required',
            'link' => 'required',
            'type' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        try {
            if ($request->hasfile('image')) {
                $destinationPath = public_path('images/');
                $imageName = $this->imageUploadService->uploadImages($request->file('image'), $destinationPath);
            }
            Approach::create([
                'title' => $request->title,
                'description' => $request->description,
                'link' => $request->link,
                'type' => $request->type,
                'image' => $imageName,
            ]);
            return redirect()->route('home-page.approach.index')->with('success','Approach Added Successfully');
        } catch (\Exception $e) {
            $bug = $e->getMessage();
            return redirect()->back()->with('error', $bug);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Approach  $approach
     * @return \Illuminate\Http\Response
     */
    public function show(Approach $approach)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Approach  $approach
     * @return \Illuminate\Http\Response
     */
    public function edit(Approach $approach)
    {
        return view('approach.edit', compact('approach'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Approach  $approach
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Approach $approach)
    {
        $this->validate($request, [
            'title'=> 'required',
            'description' => 'required',
            'link' => 'required',
            'type' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        try {
            // Get the old image file name
            $oldImageFileName = $approach->image;

            if ($request->hasFile('image')) {
                $destinationPath = public_path('images/');

                // Upload the new image
                $imageName = $this->imageUploadService->uploadImages($request->file('image'), $destinationPath);

                // Delete the old image if it exists
                $oldImagePath = $destinationPath . $oldImageFileName;
                if (File::exists($oldImagePath)) {
                    File::delete($oldImagePath);
                }
            }
            
            $approach->update([
                'title' => $request->title,
                'description' => $request->description,
                'link' => $request->link,
                'type' => $request->type,
                'image' => $imageName ?? $oldImageFileName, // Use the new image file name or keep the old one
            ]);
            return redirect()->route('home-page.approach.index')->with('success','Approach Updated Successfully');
        } catch (\Exception $e) {
            $bug = $e->getMessage();
            return redirect()->back()->with('error', $bug);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Approach  $approach
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Approach $approach)
    {
        if ($request->ajax()) {
            try {    
                $approach->delete();
    
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

    public function updateStatus(Request $request, $id)
    {
        if ($request->ajax()) {
            $approach=Approach::findOrFail($id);
            $approach->status = $approach->status == 1 ? 0 : 1;
            $approach->update();

            if ($approach->status == 1) {
                return response()->json([
                    'success' => true,
                    'message' => 'Status Enabled',
                ]);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Status Disabled',
                ]);
            }
        }

    }
}
