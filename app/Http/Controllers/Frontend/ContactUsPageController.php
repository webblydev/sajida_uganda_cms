<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ContactUsBanner;
use App\Models\ContactLead;

class ContactUsPageController extends Controller
{
    public function index()
    {
        $contactUsBanner = ContactUsBanner::latest()->first();
        return view('frontend.pages.contact-us.index', compact('contactUsBanner'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'company_name' => 'nullable|string|max:255',
            'contact_purpose' => 'nullable|string|max:255',
            'message' => 'nullable|string',
        ]);

        try {
            ContactLead::create([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'company_name' => $request->company_name,
                'contact_purpose' => $request->contact_purpose,
                'message' => $request->message,
            ]);

            return redirect()->back()->with('success', 'Thank you for contacting us! We will get back to you soon.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Something went wrong. Please try again.');
        }
    }
}

