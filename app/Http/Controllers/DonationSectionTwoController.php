<?php

namespace App\Http\Controllers;

use App\Models\DonationSectionTwo;
use Illuminate\Http\Request;

class DonationSectionTwoController extends Controller
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
        $donationSectionTwo = DonationSectionTwo::latest()->first();
        return view('donation-section-two.createOredit', compact('donationSectionTwo'));
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
            'heading' => 'required',
            'title' => 'required',
            'description' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        try {
            $data = [
                'heading' => $request->heading,
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

            DonationSectionTwo::create($data);
            
            return redirect()->back()->with('success', 'Donation Section Two Created Successfully');
        } catch (\Exception $e) {
            $bug = $e->getMessage();
            return redirect()->back()->with('error', $bug);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DonationSectionTwo  $donationSectionTwo
     * @return \Illuminate\Http\Response
     */
    public function show(DonationSectionTwo $donationSectionTwo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DonationSectionTwo  $donationSectionTwo
     * @return \Illuminate\Http\Response
     */
    public function edit(DonationSectionTwo $donationSectionTwo)
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
            'heading' => 'required',
            'title' => 'required',
            'description' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        try {
            $donationSectionTwo = DonationSectionTwo::findOrFail($id);
            
            $data = [
                'heading' => $request->heading,
                'title' => $request->title,
                'description' => $request->description,
            ];

            // Handle image upload
            if ($request->hasFile('image')) {
                // Delete old image if exists
                if ($donationSectionTwo->image && file_exists(public_path('images/' . $donationSectionTwo->image))) {
                    unlink(public_path('images/' . $donationSectionTwo->image));
                }

                $image = $request->file('image');
                $imageName = time() . '_' . $image->getClientOriginalName();
                $image->move(public_path('images'), $imageName);
                $data['image'] = $imageName;
            }

            $donationSectionTwo->update($data);
            
            return redirect()->back()->with('success', 'Donation Section Two Updated Successfully');
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
            $donationSectionTwo = DonationSectionTwo::findOrFail($id);
            
            // Delete image if exists
            if ($donationSectionTwo->image && file_exists(public_path('images/' . $donationSectionTwo->image))) {
                unlink(public_path('images/' . $donationSectionTwo->image));
            }
            
            $donationSectionTwo->delete();
            
            return redirect()->back()->with('success', 'Donation Section Two Deleted Successfully');
        } catch (\Exception $e) {
            $bug = $e->getMessage();
            return redirect()->back()->with('error', $bug);
        }
    }
}
