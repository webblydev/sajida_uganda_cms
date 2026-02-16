<?php

namespace App\Http\Controllers;

use App\Models\HealthProgramSectionTwo;
use Illuminate\Http\Request;
use DataTables;

class HealthProgramSectionTwoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = HealthProgramSectionTwo::latest()->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('title', function ($row) {
                    return $row->title;
                })
                ->addColumn('description', function ($row) {
                    return \Str::limit(strip_tags($row->description), 50);
                })
                ->addColumn('image', function ($row) {
                    if ($row->image) {
                        return '<img src="' . asset('images/' . $row->image) . '" alt="Image" style="width: 100px; height: 60px; object-fit: cover;">';
                    }
                    return 'No Image';
                })
                ->addColumn('action', function ($row) {
                    $btn = '<a href="' . route('health-program-section-two.create') . '" class="btn btn-sm btn-info" title="Edit"><i class="fa fa-edit"></i></a>';
                    $btn .= ' <a href="javascript:void(0)" data-id="' . $row->id . '" class="btn btn-sm btn-danger delete-btn" title="Delete"><i class="fa fa-trash"></i></a>';
                    return $btn;
                })
                ->rawColumns(['image', 'action'])
                ->make(true);
        }

        return view('health-program-section-two.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $healthProgramSectionTwo = HealthProgramSectionTwo::latest()->first();
        return view('health-program-section-two.createOredit', compact('healthProgramSectionTwo'));
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
            'title' => 'required|string|max:255',
            'description' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        try {
            $data = [
                'title' => $request->title,
                'description' => $request->description,
            ];

            // Handle image upload
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = time() . '_' . $image->getClientOriginalName();
                $image->move(public_path('images'), $imageName);
                $data['image'] = $imageName;
            }

            HealthProgramSectionTwo::create($data);
            
            return redirect()->back()->with('success', 'Health Program Section Two Created Successfully');
        } catch (\Exception $e) {
            $bug = $e->getMessage();
            return redirect()->back()->with('error', $bug);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\HealthProgramSectionTwo  $healthProgramSectionTwo
     * @return \Illuminate\Http\Response
     */
    public function show(HealthProgramSectionTwo $healthProgramSectionTwo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\HealthProgramSectionTwo  $healthProgramSectionTwo
     * @return \Illuminate\Http\Response
     */
    public function edit(HealthProgramSectionTwo $healthProgramSectionTwo)
    {
        //
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
            'title' => 'required|string|max:255',
            'description' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        try {
            $healthProgramSectionTwo = HealthProgramSectionTwo::findOrFail($id);
            
            $data = [
                'title' => $request->title,
                'description' => $request->description,
            ];

            // Handle image upload
            if ($request->hasFile('image')) {
                // Delete old image if exists
                if ($healthProgramSectionTwo->image && file_exists(public_path('images/' . $healthProgramSectionTwo->image))) {
                    unlink(public_path('images/' . $healthProgramSectionTwo->image));
                }

                $image = $request->file('image');
                $imageName = time() . '_' . $image->getClientOriginalName();
                $image->move(public_path('images'), $imageName);
                $data['image'] = $imageName;
            }

            $healthProgramSectionTwo->update($data);
            
            return redirect()->back()->with('success', 'Health Program Section Two Updated Successfully');
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
        try {
            $healthProgramSectionTwo = HealthProgramSectionTwo::findOrFail($id);
            
            // Delete image if exists
            if ($healthProgramSectionTwo->image && file_exists(public_path('images/' . $healthProgramSectionTwo->image))) {
                unlink(public_path('images/' . $healthProgramSectionTwo->image));
            }
            
            $healthProgramSectionTwo->delete();
            
            return response()->json(['success' => 'Health Program Section Two Deleted Successfully']);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
