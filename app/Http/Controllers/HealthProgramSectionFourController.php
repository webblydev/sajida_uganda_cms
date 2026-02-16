<?php

namespace App\Http\Controllers;

use App\Models\HealthProgramSectionFour;
use Illuminate\Http\Request;
use Validator;
use DataTables;
use Auth;
use App\Services\ImageUploadService;
use Illuminate\Support\Facades\File;

class HealthProgramSectionFourController extends Controller
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
                $sliders = HealthProgramSectionFour::orderBy('order_no', 'ASC')->get();

                return DataTables::of($sliders)
                    ->addColumn('description', function ($slider) {
                        return \Str::limit(strip_tags($slider->description), 50);
                    })
                    ->addColumn('image', function ($slider) {
                        return '<div class="table-actions text-center">
                        <img src="' . asset('images/' . $slider->image) . '" alt="Slider image" height="140px" width="130px" />
                        </div>';
                    })
                    ->addColumn('action', function ($slider) {
                        if (Auth::user()->can('edit') && Auth::user()->can('delete')) {
                            return '<div class="table-actions text-center d-flex">
                                            <a href="' . route('health-program-page.health-program-section-four.edit', $slider->id) . '" title="Edit"><i class="ik ik-edit-2 f-16 mr-15 text-green"></i></a>
                                            <a type="submit" onclick="showDeleteConfirm(' . $slider->id . ')" title="Delete"><i class="ik ik-trash-2 f-16 text-red"></i></a>
                                            </div>';
                        } elseif (Auth::user()->can('edit')) {
                            return '<div class="table-actions">
                                            <a href="' . route('health-program-page.health-program-section-four.edit', $slider->id) . '" title="Edit"><i class="ik ik-edit-2 f-16 mr-15 text-green"></i></a>
                                            </div>';
                        } elseif (Auth::user()->can('delete')) {
                            return '<div class="table-actions">
                                            <a type="submit" onclick="showDeleteConfirm(' . $slider->id . ')" title="Delete"><i class="ik ik-trash-2 f-16 text-red"></i></a>
                                            </div>';
                        }
                    })
                    ->addIndexColumn()
                    ->rawColumns(['image', 'action'])
                    ->make(true);
            }
            return view('health-program-section-four.index');
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
        return view('health-program-section-four.create');
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
            'description' => 'required',
            'name' => 'nullable|string|max:255',
            'location' => 'nullable|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'order_no' => 'required|unique:health_program_section_fours',
        ]);

        try {
            if ($request->hasFile('image')) {
                $destinationPath = public_path('images/');
                $image = $this->imageUploadService->uploadImages($request->file('image'), $destinationPath);
            }

            HealthProgramSectionFour::create([
                'description' => $request->description,
                'name' => $request->name,
                'location' => $request->location,
                'image' => $image,
                'order_no' => $request->order_no,
            ]);

            return redirect()->route('health-program-page.health-program-section-four.index')->with('success', 'Slider Added Successfully');
        } catch (\Exception $e) {
            $bug = $e->getMessage();
            return redirect()->back()->with('error', $bug);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\HealthProgramSectionFour  $healthProgramSectionFour
     * @return \Illuminate\Http\Response
     */
    public function show(HealthProgramSectionFour $healthProgramSectionFour)
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
        $slider = HealthProgramSectionFour::findOrFail($id);
        return view('health-program-section-four.edit', compact('slider'));
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
            'description' => 'required',
            'name' => 'nullable|string|max:255',
            'location' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'order_no' => 'required|unique:health_program_section_fours,order_no,' . $id,
        ]);

        try {
            $slider = HealthProgramSectionFour::findOrFail($id);
            
            // Get the old image file name
            $oldImageFileName = $slider->image;

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

            $slider->update([
                'description' => $request->description,
                'name' => $request->name,
                'location' => $request->location,
                'image' => $image ?? $oldImageFileName,
                'order_no' => $request->order_no,
            ]);

            return redirect()->route('health-program-page.health-program-section-four.index')->with('success', 'Slider Updated Successfully');
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
                $slider = HealthProgramSectionFour::findOrFail($id);

                $destinationPath = public_path('images/');
                $imageFileName = $slider->image;
                $imagePath = $destinationPath . $imageFileName;

                if (File::exists($imagePath)) {
                    File::delete($imagePath);
                }

                $slider->delete();

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
