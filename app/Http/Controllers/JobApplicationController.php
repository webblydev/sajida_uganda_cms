<?php

namespace App\Http\Controllers;

use App\Models\Career\JobApplication;
use Illuminate\Http\Request;
use Validator;
use DataTables;
use Auth;
use Image;
use DB;
use App\Services\ImageUploadService;
use Illuminate\Support\Facades\File;

class JobApplicationController extends Controller
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
            $jobApplications = JobApplication::latest()->get();

            if (request()->ajax()) {
                return DataTables::of($jobApplications)

                    ->addColumn('applicant_name', function ($jobApplication) {
                    
                        return $jobApplication->applicant_name ?? '';
                    })
                    ->addColumn('applicant_email', function ($jobApplication) {
                    
                        return $jobApplication->applicant_email ?? '';
                    })
                
                    ->addColumn('date', function ($jobApplication) {
                    
                        return date('m-d-Y', strtotime($jobApplication->created_at)) ?? '';
                    })
                    ->addColumn('action', function ($jobApplication) {
                        if (Auth::user()->can('manage_user')) {
                            return '<div class="table-actions text-center">
                                            <a href="' . route('job.job-applications.show', $jobApplication->id) . '" title="Show"><i class="ik ik-eye f-16 mr-15 text-blue"></i></a>
                                            </div>';
                        }
                    })
                    ->addIndexColumn()
                    ->rawColumns(['action'])
                    ->make(true);
            }
            return view('jobs.applications.index');
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
            'job_id'=> 'required',
            'name'=> 'required',
            'email'=> 'required',
            'link'=> 'required',
            'cover_later'=> 'required',
            'attachment'=> 'required',
        ]);
        // dd($request->all());
        try {
            if ($request->hasfile('attachment')) {
                $destinationPath = public_path('images/');
                $attachment = $this->imageUploadService->uploadImages($request->file('attachment'), $destinationPath);
            }

            JobApplication::create([
                'job_id' => $request->job_id,
                'applicant_name' => $request->name,
                'applicant_email' => $request->email,
                'link' => $request->link,
                'cover_later' => $request->cover_later,
                'attachment' => $attachment,
            ]);
            return redirect()->back()->with('success','Application Submitted Successfully');
        } catch (\Exception $e) {
            $bug = $e->getMessage();
            return redirect()->back()->with('error', $bug);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Career\JobApplication  $jobApplication
     * @return \Illuminate\Http\Response
     */
    public function show(JobApplication $jobApplication, $id)
    {
        $jobApplication = JobApplication::findOrFail($id);
        return view('jobs.applications.show', compact('jobApplication'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Career\JobApplication  $jobApplication
     * @return \Illuminate\Http\Response
     */
    public function edit(JobApplication $jobApplication)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Career\JobApplication  $jobApplication
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, JobApplication $jobApplication)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Career\JobApplication  $jobApplication
     * @return \Illuminate\Http\Response
     */
    public function destroy(JobApplication $jobApplication)
    {
        //
    }
}
