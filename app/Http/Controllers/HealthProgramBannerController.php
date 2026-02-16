<?php

namespace App\Http\Controllers;

use App\Models\HealthProgramBanner;
use Illuminate\Http\Request;
use DataTables;

class HealthProgramBannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = HealthProgramBanner::latest()->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('title', function ($row) {
                    return $row->title;
                })
                ->addColumn('description', function ($row) {
                    return \Str::limit(strip_tags($row->description), 50);
                })
                ->addColumn('image', function ($row) {
                    if ($row->banner_image) {
                        return '<img src="' . asset('images/' . $row->banner_image) . '" alt="Banner Image" style="width: 100px; height: 60px; object-fit: cover;">';
                    }
                    return 'No Image';
                })
                ->addColumn('action', function ($row) {
                    $btn = '<a href="' . route('health-program-banner.create') . '" class="btn btn-sm btn-info" title="Edit"><i class="fa fa-edit"></i></a>';
                    $btn .= ' <a href="javascript:void(0)" data-id="' . $row->id . '" class="btn btn-sm btn-danger delete-btn" title="Delete"><i class="fa fa-trash"></i></a>';
                    return $btn;
                })
                ->rawColumns(['image', 'action'])
                ->make(true);
        }

        return view('health-program-banner.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $healthProgramBanner = HealthProgramBanner::latest()->first();
        return view('health-program-banner.createOredit', compact('healthProgramBanner'));
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
            'banner_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        try {
            $data = [
                'title' => $request->title,
                'description' => $request->description,
            ];

            // Handle image upload
            if ($request->hasFile('banner_image')) {
                $image = $request->file('banner_image');
                $imageName = time() . '_' . $image->getClientOriginalName();
                $image->move(public_path('images'), $imageName);
                $data['banner_image'] = $imageName;
            }

            HealthProgramBanner::create($data);
            
            return redirect()->back()->with('success', 'Health Program Banner Created Successfully');
        } catch (\Exception $e) {
            $bug = $e->getMessage();
            return redirect()->back()->with('error', $bug);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\HealthProgramBanner  $healthProgramBanner
     * @return \Illuminate\Http\Response
     */
    public function show(HealthProgramBanner $healthProgramBanner)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\HealthProgramBanner  $healthProgramBanner
     * @return \Illuminate\Http\Response
     */
    public function edit(HealthProgramBanner $healthProgramBanner)
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
            'banner_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        try {
            $healthProgramBanner = HealthProgramBanner::findOrFail($id);
            
            $data = [
                'title' => $request->title,
                'description' => $request->description,
            ];

            // Handle image upload
            if ($request->hasFile('banner_image')) {
                // Delete old image if exists
                if ($healthProgramBanner->banner_image && file_exists(public_path('images/' . $healthProgramBanner->banner_image))) {
                    unlink(public_path('images/' . $healthProgramBanner->banner_image));
                }

                $image = $request->file('banner_image');
                $imageName = time() . '_' . $image->getClientOriginalName();
                $image->move(public_path('images'), $imageName);
                $data['banner_image'] = $imageName;
            }

            $healthProgramBanner->update($data);
            
            return redirect()->back()->with('success', 'Health Program Banner Updated Successfully');
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
            $healthProgramBanner = HealthProgramBanner::findOrFail($id);
            
            // Delete image if exists
            if ($healthProgramBanner->banner_image && file_exists(public_path('images/' . $healthProgramBanner->banner_image))) {
                unlink(public_path('images/' . $healthProgramBanner->banner_image));
            }
            
            $healthProgramBanner->delete();
            
            return response()->json(['success' => 'Health Program Banner Deleted Successfully']);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
