<?php

namespace App\Http\Controllers;

use App\Models\Career\Job;
use Illuminate\Http\Request;
use Validator;
use DataTables;
use Auth;
use App\Models\Career\Team;
use App\Models\Career\Profession;
use App\Models\Career\Location;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $jobs = Job::with('profession','team','location')->latest()->get();

            if (request()->ajax()) {
                return DataTables::of($jobs)

                    ->addColumn('job_date', function ($job) {
                    
                        return $job->created_at->format('m-d-Y') ?? '';
                    })

                    ->addColumn('closing_date', function ($job) {
                    
                        return date('m-d-Y', strtotime($job->closing_date)) ?? '';
                    })

                    ->addColumn('job_nature', function ($job) {
                    
                        return $job->job_nature ?? '';
                    })

                    ->addColumn('vacancy', function ($job) {
                    
                        return $job->vacancy ?? '';
                    })
                    ->addColumn('status', function ($job) {
                        if (Auth::user()->can('manage_user')) {
                            $button = '<label class="switch">';
                            $button .= ' <input type="checkbox" class="changeStatus" id="customSwitch' . $job->id . '" getId="' . $job->id . '" title="status"';
    
                            if ($job->status == 1) {
                                $button .= "checked";
                            }
                            $button .= ' ><span class="slider round"></span>';
                            $button .= '</label>';
                            return $button;
                        }else{
                            if($job->status == 1){
                                return '<span class="badge badge-success" title="Active">Active</span>';
                            }elseif($clients->status == 0){
                                    return '<span class="badge badge-danger" title="Inactive">Inactive</span>';
                            }
                        }
    
                    })

                    ->addColumn('action', function ($job) {
                        if (Auth::user()->can('edit') && Auth::user()->can('delete')) {
                            return '<div class="table-actions text-center">
                                            <a href="' . route('job.circular.edit', $job->id) . '" title="Edit"><i class="ik ik-edit-2 f-16 mr-15 text-green"></i></a>
                                            <a type="submit" onclick="showDeleteConfirm(' . $job->id . ')" title="Delete"><i class="ik ik-trash-2 f-16 text-red"></i></a>
                                            </div>';
                        } elseif (Auth::user()->can('edit')) {
                            return '<div class="table-actions">
                                            <a href="' . route('job.circular.edit', $job->id) . '" title="Edit"><i class="ik ik-edit-2 f-16 mr-15 text-green"></i></a>
                                            </div>';
                        } elseif (Auth::user()->can('delete')) {
                            return '<div class="table-actions">
                                            <a type="submit" onclick="showDeleteConfirm(' . $job->id . ')" title="Delete"><i class="ik ik-trash-2 f-16 text-red"></i></a>
                                            </div>';
                        }
                    })
                    ->addIndexColumn()
                    ->rawColumns(['status','action'])
                    ->make(true);
            }
        return view('jobs.circular.index');
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
        $professions=Profession::orderBy('name', 'ASC')->get();
        $teams=Team::orderBy('name', 'ASC')->get();
        $locations=Location::orderBy('name', 'ASC')->get();
        return view('jobs.circular.create',compact('professions', 'teams', 'locations'));
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
            'profession_id'=> 'required|integer',
            'team_id'=> 'required|integer',
            'location_id'=> 'required|integer',
            'job_nature'=> 'required|string',
            'salary_range'=> 'required',
            'closing_date'=> 'required',
            'vacancy'=> 'required',
            'company_details'=> 'required',
            'job_details'=> 'required',
        ]);

        try {
            Job::create([
                'profession_id' => $request->profession_id,
                'team_id' => $request->team_id,
                'location_id' => $request->location_id,
                'job_nature' => $request->job_nature,
                'salary_range' => $request->salary_range,
                'closing_date' => $request->closing_date,
                'vacancy' => $request->vacancy,
                'company_details' => $request->company_details,
                'job_details' => $request->job_details,
            ]);
            return redirect()->route('job.circular.index')->with('success','Job Circular Added Successfully');
        } catch (\Exception $e) {
            $bug = $e->getMessage();
            return redirect()->back()->with('error', $bug);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Career\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function show(Job $job)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Career\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function edit(Job $job, $id)
    {
        $job=Job::findOrFail($id);
        $professions=Profession::orderBy('name', 'ASC')->get();
        $teams=Team::orderBy('name', 'ASC')->get();
        $locations=Location::orderBy('name', 'ASC')->get();
        return view('jobs.circular.edit',compact('professions', 'teams', 'locations','job'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Career\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Job $job, $id)
    {
        $this->validate($request, [
            'profession_id'=> 'required|integer',
            'team_id'=> 'required|integer',
            'location_id'=> 'required|integer',
            'job_nature'=> 'required|string',
            'salary_range'=> 'required',
            'closing_date'=> 'required',
            'vacancy'=> 'required',
            'company_details'=> 'required',
            'job_details'=> 'required',
        ]);

        try {
            $job=Job::findOrFail($id);
            $job->update([
                'profession_id' => $request->profession_id,
                'team_id' => $request->team_id,
                'location_id' => $request->location_id,
                'job_nature' => $request->job_nature,
                'salary_range' => $request->salary_range,
                'closing_date' => $request->closing_date,
                'vacancy' => $request->vacancy,
                'company_details' => $request->company_details,
                'job_details' => $request->job_details,
            ]);
            return redirect()->route('job.circular.index')->with('success','Job Circular Updated Successfully');
        } catch (\Exception $e) {
            $bug = $e->getMessage();
            return redirect()->back()->with('error', $bug);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Career\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Job $job, $id)
    {
        if ($request->ajax()) {
            try {  
                $job=Job::findOrFail($id);  
                $job->delete();
    
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
            $job=Job::findOrFail($id); 
            $job->status = $job->status == 1 ? 0 : 1;
            $job->update();

            if ($job->status == 1) {
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
