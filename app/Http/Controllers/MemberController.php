<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use DataTables;
use Auth;
use Illuminate\Support\Str;
use App\Services\ImageUploadService;
use Illuminate\Support\Facades\File;
use App\Models\Member;
use App\Models\MemberType;
use App\Models\MemberCategory;

class MemberController extends Controller
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

                $members = Member::with('designation', 'category')->orderBy('order_no','ASC')->get();

                return DataTables::of($members)

                    ->addColumn('member_name', function ($member) {
                    
                        return $member->member_name ?? '';
                    })
                    ->addColumn('designation', function ($member) {
                    
                        return $member->designation->title ?? '';
                    })
                    ->addColumn('category', function ($member) {
                    
                        return $member->category->title ?? '';
                    })
                    ->addColumn('image', function ($member) {
                    
                        return '<div class="table-actions text-center">
                        <img src="' . asset('images/' . $member->member_image) . '" alt="Banner image" height="140px" width="130px" />
                        </div>';
                    })

                    ->addColumn('action', function ($member) {
                        if (Auth::user()->can('edit') && Auth::user()->can('delete')) {
                            return '<div class="table-actions text-center d-flex">
                                            <a href="' . route('home-page.members.edit', $member->id) . '" title="Edit"><i class="ik ik-edit-2 f-16 mr-15 text-green"></i></a>
                                            <a type="submit" onclick="showDeleteConfirm(' . $member->id . ')" title="Delete"><i class="ik ik-trash-2 f-16 text-red"></i></a>
                                            </div>';
                        } elseif (Auth::user()->can('edit')) {
                            return '<div class="table-actions">
                                            <a href="' . route('home-page.members.edit', $member->id) . '" title="Edit"><i class="ik ik-edit-2 f-16 mr-15 text-green"></i></a>
                                            </div>';
                        } elseif (Auth::user()->can('delete')) {
                            return '<div class="table-actions">
                                            <a type="submit" onclick="showDeleteConfirm(' . $member->id . ')" title="Delete"><i class="ik ik-trash-2 f-16 text-red"></i></a>
                                            </div>';
                        }
                    })
                    ->addIndexColumn()
                    ->rawColumns(['image', 'action'])
                    ->make(true);
            }
            return view('member.index');
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
        $memberTypes=MemberType::latest()->get();
        $memberCategories=MemberCategory::latest()->get();
        return view('member.create',compact('memberTypes','memberCategories'));
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
            'member_name'=> 'required',
            'member_type_id'=> 'required',
            'member_category_id'=> 'required',
            'member_image' => 'required',
            'order_no' => 'required|unique:members',
        ]);

        try {
            if ($request->hasfile('member_image')) {
                $destinationPath = public_path('images/');
                $image = $this->imageUploadService->uploadImages($request->file('member_image'), $destinationPath);
            }

            Member::create([
                'member_name' => $request->member_name,
                'member_type_id' => $request->member_type_id,
                'member_category_id' => $request->member_category_id,
                'member_image' => $image,
                'order_no' => $request->order_no
            ]);
            return redirect()->route('home-page.members.index')->with('success','Member Added Successfully');
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
        $member=Member::findOrFail($id);
        $memberTypes=MemberType::latest()->get();
        $memberCategories=MemberCategory::latest()->get();
        return view('member.edit',compact('member','memberTypes','memberCategories'));
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
            'member_name'=> 'required',
            'member_type_id'=> 'required',
            'member_category_id'=> 'required',
            'order_no' => 'required|unique:members,order_no,'.$id,
        ]);

        try {
            $member=Member::findOrFail($id);
            // Get the old image file name
            $oldImageFileName = $member->member_image;

            if ($request->hasFile('member_image')) {
                $destinationPath = public_path('images/');

                // Upload the new image
                $image = $this->imageUploadService->uploadImages($request->file('member_image'), $destinationPath);

                // Delete the old image if it exists
                $oldImagePath = $destinationPath . $oldImageFileName;
                if (File::exists($oldImagePath)) {
                    File::delete($oldImagePath);
                }
            }

            $member->update([
                'member_name' => $request->member_name,
                'member_type_id' => $request->member_type_id,
                'member_category_id' => $request->member_category_id,
                'member_image' => $image ?? $oldImageFileName,
                'order_no' => $request->order_no
            ]);
            return redirect()->route('home-page.members.index')->with('success','Member Updated Successfully');
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
                $member=Member::findOrFail($id);

                $destinationPath = public_path('images/');
                $imageFileName = $member->member_image;
                $imagePath = $destinationPath . $imageFileName;
    
                if (File::exists($imagePath)) {
                    File::delete($imagePath);
                }
    
                $member->delete();
    
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
