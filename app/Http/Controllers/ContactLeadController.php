<?php

namespace App\Http\Controllers;

use App\Models\ContactLead;
use Illuminate\Http\Request;
use DataTables;

class ContactLeadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = ContactLead::latest()->get();
            
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('status', function($row) {
                    if ($row->is_read) {
                        return '<span class="badge badge-success">Read</span>';
                    } else {
                        return '<span class="badge badge-warning">Unread</span>';
                    }
                })
                ->addColumn('action', function($row) {
                    $viewBtn = '<a href="' . route('contact-leads.show', $row->id) . '" class="btn btn-sm btn-info" title="View"><i class="ik ik-eye"></i></a>';
                    // $deleteBtn = '<button type="button" class="btn btn-sm btn-danger delete-btn" data-id="' . $row->id . '" title="Delete"><i class="ik ik-trash-2"></i></button>';
                    
                    return $viewBtn;
                })
                ->addColumn('created_at_formatted', function($row) {
                    return $row->created_at->format('M d, Y h:i A');
                })
                ->rawColumns(['status', 'action'])
                ->make(true);
        }

        $totalLeads = ContactLead::count();
        $unreadLeads = ContactLead::unread()->count();
        
        return view('contact-leads.index', compact('totalLeads', 'unreadLeads'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $lead = ContactLead::findOrFail($id);
        
        // Mark as read when viewed
        if (!$lead->is_read) {
            $lead->markAsRead();
        }
        
        return view('contact-leads.show', compact('lead'));
    }

    /**
     * Toggle read status
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function toggleStatus($id)
    {
        try {
            $lead = ContactLead::findOrFail($id);
            
            if ($lead->is_read) {
                $lead->markAsUnread();
                $message = 'Lead marked as unread';
            } else {
                $lead->markAsRead();
                $message = 'Lead marked as read';
            }
            
            return redirect()->back()->with('success', $message);
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Something went wrong');
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
            $lead = ContactLead::findOrFail($id);
            $lead->delete();
            
            return response()->json(['success' => true, 'message' => 'Lead deleted successfully']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Something went wrong'], 500);
        }
    }
}
