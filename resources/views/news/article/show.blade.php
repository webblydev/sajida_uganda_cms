@extends('layouts.main')
@section('title', 'View Article')
@section('content')

<div class="container-fluid">
    <div class="page-header">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i>
                        <img src="{{ asset('sections/news/news-s2.png') }}" alt="" srcset=""
                            style="max-width: 40px; max-height: 50px">
                    </i>
                    <div class="d-inline">
                        <h5>{{ __('News PAGE') }}</h5>
                        <span>{{ __('Section-2') }}</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <nav class="breadcrumb-container" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{ route('dashboard') }}" class="btn btn-outline-success" title="Home"><i class="ik ik-home"></i></a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="{{ route('news-page.news.index') }}" class="btn btn-outline-info" title="Back to News"><i class="fa fa-list"></i></a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="{{ url()->previous() }}" class="btn btn-outline-danger" title="Go Back"><i class="fa fa-arrow-left"></i></a>
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3>{{ $news->title }}</h3>
                    <div class="card-tools">
                        @php
                            $statusClass = $news->type == 1 ? 'badge-success' : ($news->type == 2 ? 'badge-warning' : 'badge-info');
                            $statusText = $news->type == 1 ? 'Featured' : ($news->type == 2 ? 'Special' : 'Recent');
                        @endphp
                        <span class="badge {{ $statusClass }}">{{ $statusText }}</span>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <p><strong>Category:</strong> {{ $news->category->title ?? 'N/A' }}</p>
                            <p><strong>Created:</strong> {{ $news->created_at->format('M d, Y h:i A') }}</p>
                            <p><strong>Last Updated:</strong> {{ $news->updated_at->format('M d, Y h:i A') }}</p>
                        </div>
                        <div class="col-md-6 text-right">
                            @if(Auth::user()->can('edit'))
                                <a href="{{ route('news-page.news.edit', $news->id) }}" class="btn btn-primary">
                                    <i class="ik ik-edit"></i> Edit Article
                                </a>
                            @endif
                        </div>
                    </div>

                    <hr>

                    <!-- Banner Image -->
                    @if($news->banner_image)
                        <div class="mb-4">
                            <h5>Banner Image</h5>
                            <img src="{{ asset('images/' . $news->banner_image) }}" alt="Banner Image" class="img-fluid rounded" style="max-height: 300px;">
                        </div>
                    @endif

                    <!-- Article Content -->
                    <div class="article-content">
                        <div class="row">
                            <!-- Thumbnail Image -->
                            @if($news->thumbnail_image)
                                <div class="col-md-4 mb-3">
                                    <h6>Thumbnail</h6>
                                    <img src="{{ asset('images/' . $news->thumbnail_image) }}" alt="Thumbnail" class="img-fluid rounded">
                                </div>
                            @endif
                            
                            <!-- Article Image -->
                            @if($news->article_image)
                                <div class="col-md-4 mb-3">
                                    <h6>Article Image</h6>
                                    <img src="{{ asset('images/' . $news->article_image) }}" alt="Article Image" class="img-fluid rounded">
                                </div>
                            @endif
                        </div>

                        <!-- Paragraphs -->
                        @if($news->paragraph_one)
                            <div class="mb-4">
                                <h5>Paragraph One</h5>
                                <div class="content-section">
                                    {!! $news->paragraph_one !!}
                                </div>
                            </div>
                        @endif

                        @if($news->paragraph_two)
                            <div class="mb-4">
                                <h5>Paragraph Two</h5>
                                <div class="content-section">
                                    {!! $news->paragraph_two !!}
                                </div>
                            </div>
                        @endif

                        @if($news->paragraph_three)
                            <div class="mb-4">
                                <h5>Paragraph Three</h5>
                                <div class="content-section">
                                    {!! $news->paragraph_three !!}
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.content-section {
    padding: 15px;
    background-color: #f8f9fa;
    border-radius: 5px;
    border-left: 4px solid #007bff;
}

.article-content img {
    box-shadow: 0 2px 4px rgba(0,0,0,0.1);
}

.badge {
    font-size: 0.875rem;
}
</style>

@endsection
