<?php

namespace App\Http\Controllers;

use App\Models\AboutUsSectionOne;
use Illuminate\Http\Request;

class AboutUsSectionOneController extends Controller
{
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
        $aboutUsSectionOne=AboutUsSectionOne::latest()->first();
        return view('about-us.section-2.createOredit', compact('aboutUsSectionOne'));
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
            'button_one_text' => 'required',
            'button_one_link' => 'required|url',
            'button_two_text' => 'required',
            'button_two_link' => 'required|url',
        ]);

        try {

            AboutUsSectionOne::create([
                'title' => $request->title,
                'description' => $request->description,
                'button_one_text' => $request->button_one_text,
                'button_one_link' => $request->button_one_link,
                'button_two_text' => $request->button_two_text,
                'button_two_link' => $request->button_two_link,
            ]);
            return redirect()->back()->with('success','Data Created Successfully');
        } catch (\Exception $e) {
            $bug = $e->getMessage();
            return redirect()->back()->with('error', $bug);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AboutUsSectionOne  $aboutUsSectionOne
     * @return \Illuminate\Http\Response
     */
    public function show(AboutUsSectionOne $aboutUsSectionOne)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AboutUsSectionOne  $aboutUsSectionOne
     * @return \Illuminate\Http\Response
     */
    public function edit(AboutUsSectionOne $aboutUsSectionOne)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AboutUsSectionOne  $aboutUsSectionOne
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AboutUsSectionOne $aboutUsSectionOne, $id)
    {
        $this->validate($request, [
            'title'=> 'required',
            'description' => 'required',
            'button_one_text' => 'required',
            'button_one_link' => 'required|url',
            'button_two_text' => 'required',
            'button_two_link' => 'required|url',
        ]);

        try {
            $aboutUsSectionOne=AboutUsSectionOne::findOrFail($id);

            $aboutUsSectionOne->update([
                'title' => $request->title,
                'description' => $request->description,
                'button_one_text' => $request->button_one_text,
                'button_one_link' => $request->button_one_link,
                'button_two_text' => $request->button_two_text,
                'button_two_link' => $request->button_two_link,
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
     * @param  \App\Models\AboutUsSectionOne  $aboutUsSectionOne
     * @return \Illuminate\Http\Response
     */
    public function destroy(AboutUsSectionOne $aboutUsSectionOne)
    {
        //
    }
}
