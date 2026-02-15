@extends('layouts.main')
@section('title', 'Contact Lead Details')
@section('content')
    <div class="container-fluid">
        <div class="page-header">
            <div class="row align-items-end">
                <div class="col-lg-8">
                    <div class="page-header-title">
                        <i class="ik ik-mail bg-blue"></i>
                        <div class="d-inline">
                            <h5>{{ __('CONTACT LEAD DETAILS') }}</h5>
                            <span>{{ __('View Contact Form Submission') }}</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <nav class="breadcrumb-container" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ url('/dashboard') }}" class="btn btn-outline-success" title="Home"><i
                                        class="ik ik-home"></i></a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="{{ route('contact-leads.index') }}" class="btn btn-outline-primary"
                                    title="Back to List"><i class="ik ik-list"></i></a>
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>

        <div class="row">
            @include('include.message')
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h3>Contact Details</h3>
                        <div class="card-header-right">
                            @if ($lead->is_read)
                                <span class="badge badge-success">Read</span>
                            @else
                                <span class="badge badge-warning">Unread</span>
                            @endif
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row mb-4">
                            <div class="col-md-6">
                                <h6 class="text-muted mb-2">Full Name</h6>
                                <p class="h5">{{ $lead->name }}</p>
                            </div>
                            <div class="col-md-6">
                                <h6 class="text-muted mb-2">Email Address</h6>
                                <p class="h5">
                                    <a href="mailto:{{ $lead->email }}">{{ $lead->email }}</a>
                                </p>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <div class="col-md-6">
                                <h6 class="text-muted mb-2">Phone Number</h6>
                                <p class="h5">
                                    <a href="tel:{{ $lead->phone }}">{{ $lead->phone }}</a>
                                </p>
                            </div>
                            <div class="col-md-6">
                                <h6 class="text-muted mb-2">Company Name</h6>
                                <p class="h5">{{ $lead->company_name ?? 'N/A' }}</p>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <div class="col-md-12">
                                <h6 class="text-muted mb-2">Contact Purpose</h6>
                                <p class="h5">{{ $lead->contact_purpose ?? 'N/A' }}</p>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <div class="col-md-12">
                                <h6 class="text-muted mb-2">Message</h6>
                                <div class="border p-3" style="background-color: #f8f9fa;">
                                    <p>{{ $lead->message ?? 'No message provided' }}</p>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <div class="col-md-6">
                                <h6 class="text-muted mb-2">Submitted On</h6>
                                <p>{{ $lead->created_at->format('M d, Y h:i A') }}</p>
                            </div>
                            <div class="col-md-6">
                                <h6 class="text-muted mb-2">Last Updated</h6>
                                <p>{{ $lead->updated_at->format('M d, Y h:i A') }}</p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <form action="{{ route('contact-leads.toggle-status', $lead->id) }}" method="POST"
                                    class="d-inline">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" class="btn btn-warning">
                                        <i class="ik ik-eye{{ $lead->is_read ? '-off' : '' }}"></i>
                                        Mark as {{ $lead->is_read ? 'Unread' : 'Read' }}
                                    </button>
                                </form>

                                <a href="{{ route('contact-leads.index') }}" class="btn btn-secondary">
                                    <i class="ik ik-arrow-left"></i> Back to List
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h3>Quick Actions</h3>
                    </div>
                    <div class="card-body">
                        <div class="list-group">
                            <a href="mailto:{{ $lead->email }}" class="list-group-item list-group-item-action">
                                <i class="ik ik-mail"></i> Send Email
                            </a>
                            <a href="tel:{{ $lead->phone }}" class="list-group-item list-group-item-action">
                                <i class="ik ik-phone"></i> Call Phone
                            </a>
                        </div>

                        <div class="mt-3">
                            <h6 class="text-muted">Lead Information</h6>
                            <ul class="list-unstyled">
                                <li><strong>ID:</strong> #{{ $lead->id }}</li>
                                <li><strong>Status:</strong>
                                    @if ($lead->is_read)
                                        <span class="badge badge-success">Read</span>
                                    @else
                                        <span class="badge badge-warning">Unread</span>
                                    @endif
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
