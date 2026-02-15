<?php

namespace App\Http\Controllers;

use App\Models\ImpactModel;
use Illuminate\Http\Request;

class ImpactController extends Controller
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
        $impact = ImpactModel::latest()->first();
        return view('impact.createOredit', compact('impact'));
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
            'title' => 'required',
            'description' => 'required',
            'impact_1_title' => 'required',
            'impact_1_count' => 'required',
            'impact_2_title' => 'required',
            'impact_2_count' => 'required',
            'impact_3_title' => 'required',
            'impact_3_count' => 'required',
            'impact_4_title' => 'required',
            'impact_4_count' => 'required',
        ]);

        try {
            ImpactModel::create([
                'title' => $request->title,
                'description' => $request->description,
                'impact_1_title' => $request->impact_1_title,
                'impact_1_count' => $request->impact_1_count,
                'impact_2_title' => $request->impact_2_title,
                'impact_2_count' => $request->impact_2_count,
                'impact_3_title' => $request->impact_3_title,
                'impact_3_count' => $request->impact_3_count,
                'impact_4_title' => $request->impact_4_title,
                'impact_4_count' => $request->impact_4_count,
            ]);
            
            return redirect()->back()->with('success', 'Impact Data Created Successfully');
        } catch (\Exception $e) {
            $bug = $e->getMessage();
            return redirect()->back()->with('error', $bug);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ImpactModel  $impact
     * @return \Illuminate\Http\Response
     */
    public function show(ImpactModel $impact)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ImpactModel  $impact
     * @return \Illuminate\Http\Response
     */
    public function edit(ImpactModel $impact)
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
            'title' => 'required',
            'description' => 'required',
            'impact_1_title' => 'required',
            'impact_1_count' => 'required',
            'impact_2_title' => 'required',
            'impact_2_count' => 'required',
            'impact_3_title' => 'required',
            'impact_3_count' => 'required',
            'impact_4_title' => 'required',
            'impact_4_count' => 'required',
        ]);

        try {
            $impact = ImpactModel::findOrFail($id);
            
            $impact->update([
                'title' => $request->title,
                'description' => $request->description,
                'impact_1_title' => $request->impact_1_title,
                'impact_1_count' => $request->impact_1_count,
                'impact_2_title' => $request->impact_2_title,
                'impact_2_count' => $request->impact_2_count,
                'impact_3_title' => $request->impact_3_title,
                'impact_3_count' => $request->impact_3_count,
                'impact_4_title' => $request->impact_4_title,
                'impact_4_count' => $request->impact_4_count,
            ]);
            
            return redirect()->back()->with('success', 'Impact Data Updated Successfully');
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
            $impact = ImpactModel::findOrFail($id);
            $impact->delete();
            
            return redirect()->back()->with('success', 'Impact Data Deleted Successfully');
        } catch (\Exception $e) {
            $bug = $e->getMessage();
            return redirect()->back()->with('error', $bug);
        }
    }
}
