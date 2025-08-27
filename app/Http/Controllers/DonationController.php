<?php

namespace App\Http\Controllers;

use App\Models\Donation\Donation;
use Illuminate\Http\Request;
use Validator;
use DataTables;
use Auth;
use Image;
use DB;
use App\Services\ImageUploadService;
use Illuminate\Support\Facades\File;

class DonationController extends Controller
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
            $donations = Donation::latest()->get();

            if (request()->ajax()) {
                return DataTables::of($donations)

                    ->addColumn('name', function ($donation) {
                    
                        return $donation->donor_name ?? '';
                    })
                    ->addColumn('email', function ($donation) {
                    
                        return $donation->donor_email ?? '';
                    })
                    ->addColumn('phone', function ($donation) {
                    
                        return $donation->donor_phone ?? '';
                    })
                    ->addColumn('amount', function ($donation) {
                    
                        return $donation->donation_amount ?? '';
                    })
                    ->addColumn('transaction_id', function ($donation) {
                    
                        return $donation->transaction_id ?? '';
                    })
                    ->addColumn('date', function ($donation) {
                    
                        return date('m-d-Y', strtotime($donation->date)) ?? '';
                    })
                    ->addColumn('action', function ($donation) {
                        if (Auth::user()->can('show') && Auth::user()->can('delete')) {
                            return '<div class="table-actions text-center">
                                            <a href="' . route('home-page.approach.show', $donation->id) . '" title="Edit"><i class="ik ik-edit-2 f-16 mr-15 text-green"></i></a>
                                            <a type="submit" onclick="showDeleteConfirm(' . $donation->id . ')" title="Delete"><i class="ik ik-trash-2 f-16 text-red"></i></a>
                                            </div>';
                        } elseif (Auth::user()->can('edit')) {
                            return '<div class="table-actions">
                                            <a href="' . route('home-page.approach.show', $donation->id) . '" title="Edit"><i class="ik ik-edit-2 f-16 mr-15 text-green"></i></a>
                                            </div>';
                        } elseif (Auth::user()->can('delete')) {
                            return '<div class="table-actions">
                                            <a type="submit" onclick="showDeleteConfirm(' . $donation->id . ')" title="Delete"><i class="ik ik-trash-2 f-16 text-red"></i></a>
                                            </div>';
                        }
                    })
                    ->addIndexColumn()
                    ->rawColumns(['status', 'action'])
                    ->make(true);
            }
            return view('donation.index');
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

        $this->validate($request, [
            'name'=> 'required',
            'email'=> 'required',
            'phone'=> 'required',
            'amount'=> 'required',
            'transactionId'=> 'required',
            'date'=> 'required',
            'attachment'=> 'required',
        ]);

        try {
            if ($request->hasfile('attachment')) {
                $destinationPath = public_path('images/');
                $attachment = $this->imageUploadService->uploadImages($request->file('attachment'), $destinationPath);
            }

            Donation::create([
                'donor_name' => $request->name,
                'donor_email' => $request->email,
                'donor_phone' => $request->phone,
                'donation_amount' => $request->amount,
                'transaction_id' => $request->transactionId,
                'date' => $request->date,
                'attachment' => $attachment,
            ]);
            return redirect()->back()->with('success','Data Saved Successfully');
        } catch (\Exception $e) {
            $bug = $e->getMessage();
            dd($bug);
            return redirect()->back()->with('error', $bug);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Donation\Donation  $donation
     * @return \Illuminate\Http\Response
     */
    public function show(Donation $donation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Donation\Donation  $donation
     * @return \Illuminate\Http\Response
     */
    public function edit(Donation $donation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Donation\Donation  $donation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Donation $donation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Donation\Donation  $donation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Donation $donation)
    {
        //
    }
}
