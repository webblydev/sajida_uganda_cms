@extends('frontend.layout.main')
@section('title', 'News-room')
@section('content')
    <section class="hero-section individual-hero">
        <div class="bg">
            <img src="{{ asset('images/' . $news->banner_image) }}" alt="">
        </div>
        <div class="section-padding">
            <div class="container">
                <div class="hero-content">
                    <div class="hero-btns">
                        <a href="#" class="hero-btn">{{ $news->category->title }}</a>
                        <a href="#" class="hero-btn">{{ $news->created_at->format('M d, Y') }}</a>
                    </div>
                    <div class="heading">
                        <h1>{{ $news->title }}</h1>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <div class="wrapper-23">
        <div class="section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 order-lg-2">
                        <div class="image">
                            <img src="{{ asset('images/' . $news->article_image) }}" alt="">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="content">
                            {{-- <img src="{{ asset('assets/img/right 1.png') }}" alt=""> --}}
                            <h4>{{ $news->paragraph_one }}</h4>
                            <p>{{ $news->paragraph_two }}</p>
                        </div>
                    </div>
                    <div class="col-lg-10 order-lg-3">
                        <p>{{ $news->paragraph_three }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="wrapper-6 related-stories">
        <div class="section-padding">
            <div class="container">
                <h1>Latest from SAJIDA</h1>
                <div class="slider owl-carousel">
                    @foreach ($recentNewsItems as $item)
                        <a href="{{ route('news-room.show', $item->id) }}" target="_blank">
                            <div class="single-slider-item">
                                <img src="{{ asset('images/' . $item->thumbnail_image) }}" alt="">
                                <div class="space"></div>
                                <div class="content">
                                    <h4>{{ $item->category->title }}</h4>
                                    <h2>{{ $item->title }}</h2>
                                </div>
                                <span>{{ $item->created_at->format('M d, Y') }}</span>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <!-- <section class="wrapper-12 section">
        <div class="section-padding">
            <div class="container">
                <div class="d-flex align-items-center justify-content-between">
                    <h1>Make Your Contribution</h1>
                    <a href="{{ route('donation.index') }}" class="btn">Donate Now</a>
                </div>
            </div>
        </div>
    </section> -->
@endsection
