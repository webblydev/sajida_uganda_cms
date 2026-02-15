<?php

namespace App\Http\Controllers;

use App\Models\AboutUsSectionThree;
use Illuminate\Http\Request;
use Validator;
use DataTables;
use Auth;
use Image;
use DB;
use Illuminate\Support\Str;
use App\Services\ImageUploadService;
use Illuminate\Support\Facades\File;

class AboutUsSectionThreeController extends Controller
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
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $aboutUsSectionThree=AboutUsSectionThree::latest()->first();
        return view('about-us.section-4.createOredit', compact('aboutUsSectionThree'));
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
            'description'=> 'required',
        ]);

        try {
            AboutUsSectionThree::create([
                'title' => $request->title,
                'description' => $request->description,
            ]);
            return redirect()->back()->with('success','Data Added Successfully');
        } catch (\Exception $e) {
            $bug = $e->getMessage();
            return redirect()->back()->with('error', $bug);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AboutUsSectionThree  $aboutUsSectionThree
     * @return \Illuminate\Http\Response
     */
    public function show(AboutUsSectionThree $aboutUsSectionThree)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AboutUsSectionThree  $aboutUsSectionThree
     * @return \Illuminate\Http\Response
     */
    public function edit(AboutUsSectionThree $aboutUsSectionThree)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AboutUsSectionThree  $aboutUsSectionThree
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AboutUsSectionThree $aboutUsSectionThree, $id)
    {
        $this->validate($request, [
            'title'=> 'required',
            'description'=> 'required',
        ]);

        try {
            $aboutUsSectionThree=AboutUsSectionThree::findOrFail($id);


            $aboutUsSectionThree->update([
                'title' => $request->title,
                'description' => $request->description,
            ]);
            return redirect()->back()->with('success','Data Updated Successfully');
        } catch (\Exception $e) {
            $bug = $e->getMessage();
            return redirect()->back()->with('error', $bug);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AboutUsSectionThree  $aboutUsSectionThree
     * @return \Illuminate\Http\Response
     */
    public function destroy(AboutUsSectionThree $aboutUsSectionThree)
    {
        //
    }
}
