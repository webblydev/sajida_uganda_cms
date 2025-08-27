<?php

namespace App\Http\Controllers;

use App\Models\MemberCategory;
use Illuminate\Http\Request;
use Validator;
use DataTables;
use Auth;
use Illuminate\Support\Str;

class MemberCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $memberCategories = MemberCategory::latest()->get();

            if (request()->ajax()) {
                return DataTables::of($memberCategories)

                    ->addColumn('title', function ($memberCategory) {
                    
                        return $memberCategory->title ?? '';
                    })
                    ->addColumn('url', function ($memberCategory) {
                        $baseUrl = url('/');
                        $slug = $memberCategory->slug ?? '';
                        return $baseUrl . '/' . 'member-category'. '/' .$slug;
                    })

                    ->addColumn('action', function ($memberCategory) {
                        if (Auth::user()->can('edit') && Auth::user()->can('delete')) {
                            return '<div class="table-actions text-center">
                                            <a href="' . route('member-category.edit', $memberCategory->id) . '" title="Edit"><i class="ik ik-edit-2 f-16 mr-15 text-green"></i></a>
                                            <a type="submit" onclick="showDeleteConfirm(' . $memberCategory->id . ')" title="Delete"><i class="ik ik-trash-2 f-16 text-red"></i></a>
                                            </div>';
                        } elseif (Auth::user()->can('edit')) {
                            return '<div class="table-actions">
                                            <a href="' . route('member-category.edit', $memberCategory->id) . '" title="Edit"><i class="ik ik-edit-2 f-16 mr-15 text-green"></i></a>
                                            </div>';
                        } elseif (Auth::user()->can('delete')) {
                            return '<div class="table-actions">
                                            <a type="submit" onclick="showDeleteConfirm(' . $memberCategory->id . ')" title="Delete"><i class="ik ik-trash-2 f-16 text-red"></i></a>
                                            </div>';
                        }
                    })
                    ->addIndexColumn()
                    ->rawColumns(['action'])
                    ->make(true);
            }
            return view('member.member-category.index');
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
        return view('member.member-category.create');
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
            'title' => 'required|unique:member_categories',
        ]);

        try {

            // Transform the 'title' field to slug format
            $slug = Str::slug($request->title, '_');

            MemberCategory::create([
                'title' => $request->title,
                'slug' => $slug,
            ]);
            return redirect()->route('member-category.index')->with('success','Member Category Added Successfully');
        } catch (\Exception $e) {
            $bug = $e->getMessage();
            return redirect()->back()->with('error', $bug);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MemberCategory  $memberCategory
     * @return \Illuminate\Http\Response
     */
    public function show(MemberCategory $memberCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MemberCategory  $memberCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(MemberCategory $memberCategory)
    {
        return view('member.member-category.edit', compact('memberCategory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MemberCategory  $memberCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MemberCategory $memberCategory)
    {
        $this->validate($request, [
            'title' => 'required|unique:member_categories,title,'.$memberCategory->id,
        ]);

        try {
            // Transform the 'title' field to slug format
            $slug = Str::slug($request->title, '_');
            $memberCategory->update([
                'title' => $request->title,
                'slug' => $slug,
            ]);
            return redirect()->route('member-category.index')->with('success','Member Category Updated Successfully');
        } catch (\Exception $e) {
            $bug = $e->getMessage();
            return redirect()->back()->with('error', $bug);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MemberCategory  $memberCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(MemberCategory $memberCategory)
    {
        if (request()->ajax()) {
            try {    
                $memberCategory->delete();
    
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
