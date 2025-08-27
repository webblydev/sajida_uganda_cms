<?php

namespace App\Http\Controllers;

use App\Models\Donation\DonationInfo;
use Illuminate\Http\Request;
use Validator;
use DataTables;
use Auth;
use Image;
use DB;
use App\Services\ImageUploadService;
use Illuminate\Support\Facades\File;

class DonationInfoController extends Controller
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Donation\DonationInfo  $donationInfo
     * @return \Illuminate\Http\Response
     */
    public function show(DonationInfo $donationInfo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Donation\DonationInfo  $donationInfo
     * @return \Illuminate\Http\Response
     */
    public function edit(DonationInfo $donationInfo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Donation\DonationInfo  $donationInfo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DonationInfo $donationInfo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Donation\DonationInfo  $donationInfo
     * @return \Illuminate\Http\Response
     */
    public function destroy(DonationInfo $donationInfo)
    {
        //
    }
}
