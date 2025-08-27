<?php

namespace App\Http\Controllers;

use App\Models\NewsCategory;
use Illuminate\Http\Request;
use Validator;
use DataTables;
use Auth;

class NewsCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $newsCategories = NewsCategory::latest()->get();

            if (request()->ajax()) {
                return DataTables::of($newsCategories)

                    ->addColumn('title', function ($newsCategory) {
                    
                        return $newsCategory->title ?? '';
                    })
                    ->addColumn('status', function ($newsCategory) {
                        if (Auth::user()->can('manage_user')) {
                            $button = '<label class="switch">';
                            $button .= ' <input type="checkbox" class="changeStatus" id="customSwitch' . $newsCategory->id . '" getId="' . $newsCategory->id . '" title="status"';
    
                            if ($newsCategory->status == 1) {
                                $button .= "checked";
                            }
                            $button .= ' ><span class="slider round"></span>';
                            $button .= '</label>';
                            return $button;
                        }else{
                            if($newsCategory->status == 1){
                                return '<span class="badge badge-success" title="Active">Active</span>';
                            }elseif($newsCategory->status == 0){
                                    return '<span class="badge badge-danger" title="Inactive">Inactive</span>';
                            }
                        }
    
                    })
                    ->addColumn('action', function ($newsCategory) {
                        if (Auth::user()->can('edit') && Auth::user()->can('delete')) {
                            return '<div class="table-actions text-center">
                                            <a href="' . route('news-category.edit', $newsCategory->id) . '" title="Edit"><i class="ik ik-edit-2 f-16 mr-15 text-green"></i></a>
                                            <a type="submit" onclick="showDeleteConfirm(' . $newsCategory->id . ')" title="Delete"><i class="ik ik-trash-2 f-16 text-red"></i></a>
                                            </div>';
                        } elseif (Auth::user()->can('edit')) {
                            return '<div class="table-actions">
                                            <a href="' . route('news-category.edit', $newsCategory->id) . '" title="Edit"><i class="ik ik-edit-2 f-16 mr-15 text-green"></i></a>
                                            </div>';
                        } elseif (Auth::user()->can('delete')) {
                            return '<div class="table-actions">
                                            <a type="submit" onclick="showDeleteConfirm(' . $newsCategory->id . ')" title="Delete"><i class="ik ik-trash-2 f-16 text-red"></i></a>
                                            </div>';
                        }
                    })
                    ->addIndexColumn()
                    ->rawColumns(['status','action'])
                    ->make(true);
            }
            return view('news.category.index');
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
        return view('news.category.create');
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
        ]);

        try {
            NewsCategory::create([
                'title' => $request->title,
            ]);
            return redirect()->route('news-category.index')->with('success','Category Added Successfully');
        } catch (\Exception $e) {
            $bug = $e->getMessage();
            return redirect()->back()->with('error', $bug);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\NewsCategory  $newsCategory
     * @return \Illuminate\Http\Response
     */
    public function show(NewsCategory $newsCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\NewsCategory  $newsCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(NewsCategory $newsCategory)
    {
        return view('news.category.edit', compact('newsCategory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\NewsCategory  $newsCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, NewsCategory $newsCategory)
    {
        $this->validate($request, [
            'title'=> 'required',
        ]);

        try {
            $newsCategory->update([
                'title' => $request->title,
            ]);
            return redirect()->route('news-category.index')->with('success','Category Updated Successfully');
        } catch (\Exception $e) {
            $bug = $e->getMessage();
            return redirect()->back()->with('error', $bug);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\NewsCategory  $newsCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, NewsCategory $newsCategory)
    {
        if ($request->ajax()) {
            try {    
                $newsCategory->delete();
    
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
            $newsCategory=NewsCategory::findOrFail($id);
            $newsCategory->status = $newsCategory->status == 1 ? 0 : 1;
            $newsCategory->update();

            if ($newsCategory->status == 1) {
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
