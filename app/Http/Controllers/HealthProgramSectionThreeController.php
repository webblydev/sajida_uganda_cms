<?php

namespace App\Http\Controllers;

use App\Models\HealthProgramSectionThree;
use Illuminate\Http\Request;
use DataTables;

class HealthProgramSectionThreeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = HealthProgramSectionThree::latest()->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('section_title', function ($row) {
                    return $row->section_title;
                })
                ->addColumn('stat_one', function ($row) {
                    return $row->stat_one_number . ' - ' . \Str::limit($row->stat_one_description, 30);
                })
                ->addColumn('background_image', function ($row) {
                    if ($row->background_image) {
                        return '<img src="' . asset('images/' . $row->background_image) . '" alt="Image" style="width: 100px; height: 60px; object-fit: cover;">';
                    }
                    return 'No Image';
                })
                ->addColumn('action', function ($row) {
                    $btn = '<a href="' . route('health-program-section-three.create') . '" class="btn btn-sm btn-info" title="Edit"><i class="fa fa-edit"></i></a>';
                    $btn .= ' <a href="javascript:void(0)" data-id="' . $row->id . '" class="btn btn-sm btn-danger delete-btn" title="Delete"><i class="fa fa-trash"></i></a>';
                    return $btn;
                })
                ->rawColumns(['background_image', 'action'])
                ->make(true);
        }

        return view('health-program-section-three.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $healthProgramSectionThree = HealthProgramSectionThree::latest()->first();
        return view('health-program-section-three.createOredit', compact('healthProgramSectionThree'));
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
            'section_title' => 'required|string|max:255',
            'stat_one_number' => 'nullable|string|max:50',
            'stat_one_description' => 'nullable|string',
            'stat_two_number' => 'nullable|string|max:50',
            'stat_two_description' => 'nullable|string',
            'stat_three_number' => 'nullable|string|max:50',
            'stat_three_description' => 'nullable|string',
            'stat_four_number' => 'nullable|string|max:50',
            'stat_four_description' => 'nullable|string',
            'stat_five_number' => 'nullable|string|max:50',
            'stat_five_description' => 'nullable|string',
            'background_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        try {
            $data = [
                'section_title' => $request->section_title,
                'stat_one_number' => $request->stat_one_number,
                'stat_one_description' => $request->stat_one_description,
                'stat_two_number' => $request->stat_two_number,
                'stat_two_description' => $request->stat_two_description,
                'stat_three_number' => $request->stat_three_number,
                'stat_three_description' => $request->stat_three_description,
                'stat_four_number' => $request->stat_four_number,
                'stat_four_description' => $request->stat_four_description,
                'stat_five_number' => $request->stat_five_number,
                'stat_five_description' => $request->stat_five_description,
            ];

            // Handle background image upload
            if ($request->hasFile('background_image')) {
                $image = $request->file('background_image');
                $imageName = time() . '_' . $image->getClientOriginalName();
                $image->move(public_path('images'), $imageName);
                $data['background_image'] = $imageName;
            }

            HealthProgramSectionThree::create($data);
            
            return redirect()->back()->with('success', 'Health Program Section Three Created Successfully');
        } catch (\Exception $e) {
            $bug = $e->getMessage();
            return redirect()->back()->with('error', $bug);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\HealthProgramSectionThree  $healthProgramSectionThree
     * @return \Illuminate\Http\Response
     */
    public function show(HealthProgramSectionThree $healthProgramSectionThree)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\HealthProgramSectionThree  $healthProgramSectionThree
     * @return \Illuminate\Http\Response
     */
    public function edit(HealthProgramSectionThree $healthProgramSectionThree)
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
            'section_title' => 'required|string|max:255',
            'stat_one_number' => 'nullable|string|max:50',
            'stat_one_description' => 'nullable|string',
            'stat_two_number' => 'nullable|string|max:50',
            'stat_two_description' => 'nullable|string',
            'stat_three_number' => 'nullable|string|max:50',
            'stat_three_description' => 'nullable|string',
            'stat_four_number' => 'nullable|string|max:50',
            'stat_four_description' => 'nullable|string',
            'stat_five_number' => 'nullable|string|max:50',
            'stat_five_description' => 'nullable|string',
            'background_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        try {
            $healthProgramSectionThree = HealthProgramSectionThree::findOrFail($id);
            
            $data = [
                'section_title' => $request->section_title,
                'stat_one_number' => $request->stat_one_number,
                'stat_one_description' => $request->stat_one_description,
                'stat_two_number' => $request->stat_two_number,
                'stat_two_description' => $request->stat_two_description,
                'stat_three_number' => $request->stat_three_number,
                'stat_three_description' => $request->stat_three_description,
                'stat_four_number' => $request->stat_four_number,
                'stat_four_description' => $request->stat_four_description,
                'stat_five_number' => $request->stat_five_number,
                'stat_five_description' => $request->stat_five_description,
            ];

            // Handle background image upload
            if ($request->hasFile('background_image')) {
                // Delete old image if exists
                if ($healthProgramSectionThree->background_image && file_exists(public_path('images/' . $healthProgramSectionThree->background_image))) {
                    unlink(public_path('images/' . $healthProgramSectionThree->background_image));
                }

                $image = $request->file('background_image');
                $imageName = time() . '_' . $image->getClientOriginalName();
                $image->move(public_path('images'), $imageName);
                $data['background_image'] = $imageName;
            }

            $healthProgramSectionThree->update($data);
            
            return redirect()->back()->with('success', 'Health Program Section Three Updated Successfully');
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
            $healthProgramSectionThree = HealthProgramSectionThree::findOrFail($id);
            
            // Delete background image if exists
            if ($healthProgramSectionThree->background_image && file_exists(public_path('images/' . $healthProgramSectionThree->background_image))) {
                unlink(public_path('images/' . $healthProgramSectionThree->background_image));
            }
            
            $healthProgramSectionThree->delete();
            
            return response()->json(['success' => 'Health Program Section Three Deleted Successfully']);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
