@extends('frontend.layout.main')
@section('title', 'About Us')
@section('content')
    <section class="hero-section">
        <div class="bg">
            <img src="{{ asset('images/' . ($aboutUsBanner->banner_image ?? 'img/hero2.jpg')) }}" alt="">
        </div>
        <div class="section-padding">
            <div class="container">
                <div class="hero-content">
                    <div class="heading">
                        <h1>{{ $aboutUsBanner->title ?? 'About Us' }}</h1>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="wrapper-8 section">
        <div class="section-padding">
            <div class="container">
                <div class="content-container">
                    <h1>{{ $aboutUsSectionOne->title ?? 'Who We Are' }}</h1>
                    <p>{!! $aboutUsSectionOne->description ?? 'SAJIDA Foundation is a value-driven non-profit organization from the Global South, headquartered in Bangladesh. Established in 1993 with the vision of ensuring health, happiness, and dignity for all, SAJIDA has grown into a trusted development actor with a presence across three countries. </br></br>
                        Our work enhances community well-being through three core areas: providing access to high-quality health and mental health services, empowering entrepreneurship through financial inclusion, and promoting equitable development. Over the past three decades, we have reached more than 6 million individuals, powered by a dedicated workforce of over 6,000.' !!}</p>
                    <div class="btns">
                        {{-- got to governing body section --}}
                        <a href="#wrapper-9" class="btn">{{ $aboutUsSectionOne->button_one_text ?? '' }}</a>
                        <a href="{{ $aboutUsSectionOne->button_two_link ?? '#' }}" class="btn" target="blank">{{ $aboutUsSectionOne->button_two_text ?? '' }}</a>
                    </div>
                </div>
                <div class="gallery row">
                    @if ($aboutUsSectionTwo && $aboutUsSectionTwo->images)
                        @php
                            $images = json_decode($aboutUsSectionTwo->images, true);
                        @endphp
                    @endif
                    @foreach ($images as $image)
                        <div class="col-6">
                            <div class="gallery-item ">
                                <img src="{{ asset('images/' . $image) }}" alt="">
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <section class="wrapper-9 section" id="wrapper-9">
        <div class="section-padding">
            <div class="container">
                <div class="headline">
                    <h1>{{ $aboutUsSectionThree->title ?? 'Leadership Team' }}</h1>
                    <p>{{ $aboutUsSectionThree->description ?? 'Our diverse leadership team brings a more effective and inclusive decision-making process to benefit the communities we serve' }}</p>
                </div>
                <div class="slider d-flex">
                    @foreach ($directorTeamMembers as $directorTeamMember)
                        <div class="single-slider-item" data-bs-toggle="modal" data-bs-target="{{ '#myModal-' . $directorTeamMember->id }}">
                            <div class="image">
                                <img src="{{ asset('images/' . $directorTeamMember->member_image) }}" alt="">
                            </div>
                            <div class="content">
                                <h4>{{ $directorTeamMember->member_name }}<span>{{ $directorTeamMember->designation->title ?? '' }}</span></h4>
                            </div>
                        </div>
                    @endforeach
                    {{-- <div class="single-slider-item" data-bs-toggle="modal" data-bs-target="#myModal-01">
                        <div class="image">
                            <img src="{{ asset('assets/img/zahida_fizza_kabir.png') }}" alt="">
                        </div>
                        <div class="content">
                            <h4>Zahida Fizza Kabir<span>Director, SAJIDA Microfinance Limited</span></h4>
                        </div>
                    </div>
                    <div class="single-slider-item" data-bs-toggle="modal" data-bs-target="#myModal-02">
                        <div class="image">
                            <img src="{{ asset('assets/img/shib_narayan_kairy.png') }}" alt="">
                        </div>
                        <div class="content">
                            <h4>Shib Narayan Kairy <span>Director, SAJIDA Foundation Uganda Ltd.</span></h4>
                        </div>
                    </div>
                    <div class="single-slider-item" data-bs-toggle="modal" data-bs-target="#myModal-04">
                        <div class="image">
                            <img src="{{ asset('assets/img/governing-body-img2.png') }}" alt="">
                        </div>
                        <div class="content">
                            <h4>Muhymin Chowdhury <span>Director, SAJIDA Foundation (BGD)</span></h4>
                        </div>
                    </div>
                    <div class="single-slider-item" data-bs-toggle="modal" data-bs-target="#myModal-08">
                        <div class="image">
                            <img src="{{ asset('assets/img/shamira_mostafa.png') }}" alt="">
                        </div>
                        <div class="content">
                            <h4>Shamira Mostafa<span>Associate Director, Risk & Research SAJIDA Foundation (BGD)</span></h4>
                        </div>
                    </div> --}}
                </div>



                <!-- The Modal -->
                @foreach ($directorTeamMembers as $modalDirectorTeamMember)
                    <div class="modal" id="{{ 'myModal-' . $modalDirectorTeamMember->id }}">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                    </div>
                                <div class="popup-message d-flex">
                                    <div class="popup-image">
                                        <img src="{{ asset('images/' . $modalDirectorTeamMember->member_image) }}" alt="">
                                    </div>
                                    <div class="popup-content">

                                        <h4>{{ $modalDirectorTeamMember->member_name }}<span>{{ $modalDirectorTeamMember->designation->title ?? '' }}</span></h4>
                                        <p>{{ $modalDirectorTeamMember->bio }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                {{-- <div class="modal" id="myModal-02">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>
                            <div class="popup-message d-flex">
                                <div class="popup-image">
                                    <img src="{{ asset('assets/img/02. Shib Narayan Kairy.jpg') }}" alt="">
                                </div>
                                <div class="popup-content">

                                    <h4>Shib Narayan Kairy <span>Director, SAJIDA Foundation Uganda Ltd.</span></h4>
                                    <p>Mr. Shib Narayan Kairy is the Treasurer of BRAC University and formerly served as the Chief Financial Officer of BRAC and BRAC International. With over 34 years of experience in development finance, he has played a critical role in strengthening financial systems in both local and global contexts.

                                    Mr. Kairy has contributed to key governance roles, serving as a Director on the boards of BRAC Bank Limited, bKash Limited, BRAC EPL Investments Limited, BRAC EPL Stock Brokerage Limited, and BRAC Tea Companies. He is also Chairman of Dhaka Handicrafts Limited and serves as a member of the Board of Trustees of RDRS and the Governing Body of the Credit and Development Forum (CDF).

                                    Mr. Kairy holds an M.Com in Accounting from the University of Dhaka. Starting his career with BRAC in 1982, he has been instrumental in promoting inclusive financial services and social entrepreneurship in Bangladesh.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal" id="myModal-04">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>
                            <div class="popup-message d-flex">
                                <div class="popup-image">
                                    <img src="{{ asset('assets/img/governing-body-img2.png') }}" alt="">
                                </div>
                                <div class="popup-content">

                                    <h4>Muhymin Chowdhury <span>Director, SAJIDA Foundation (BGD)</span></h4>
                                    <p>Muhymin Chowdhury currently serves as the Director of Impact Investment & Partnerships at SAJIDA Foundation. In this role, he leads the management of an impact fund aimed at fostering the growth of startups and build strategic partnerships with institutional stakeholders to expand SAJIDA’s development programmes.

                                    Previously, Muhymin held the position of Deputy Challenge Fund Manager at Nathan Associates, where he successfully structured 36 results-based financing agreements worth GBP 27 million with key financial market actors. Earlier at Shorebank International, Muhymin managed a USD 10 million performance-based investment in bKash, a leading mobile money service provider.

                                    Muhymin's professional experience extends across Nepal, Pakistan, and Kenya, where he collaborated with commercial banks, international non-governmental organisations (INGOs), and bilateral donors on financial product development, mobile money agent network expansion, and customer segmentation strategies.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal" id="myModal-08">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>
                            <div class="popup-message d-flex">
                                <div class="popup-image">
                                    <img src="{{ asset('assets/img/08. Shamira Mostafa.jpg') }}" alt="">
                                </div>
                                <div class="popup-content">

                                    <h4>Shamira Mostafa <span>Associate Director, Risk & Research SAJIDA Foundation (BGD)</span></h4>
                                    <p>Ms Shamira Mostafa is the Head of Business Operations of Research, Monitoring & Evaluation. Ms Mostofa is an accomplished development practitioner with over 13 years of experience in project implementation, strategic communication, and monitoring and evaluation across diverse industries.

                                    Previously, Ms. Mostafa managed USD 13 million worth of portfolio under a financial inclusion project commenced by FCDO.  Prior to that, she managed pro-poor market lead interventions worth $1 million at Katalyst-Swisscontact. Her passion for uplifting underprivileged communities has been evident throughout her career. She actively contributed to the advancement of math and reading skills for young learners in diverse communities of the greater Boston area while collaborating with the Centre for Community-Based Learning during her Master's program.

                                    Ms. Mostafa, served as a marketing associate in Boston, where she promoted food safety measures for a bio-technology company. Prior to that, she excelled as a corporate trainer for the marketing agency of Verizon Telecommunication, facilitating access to affordable telecommunication and IT facilities for micro and small enterprises. Her academic accomplishments include a Master of Communication degree from Lasell University, Auburndale, Massachusetts, and a Bachelor of Business degree from North South University, Dhaka.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}
            </div>
        </div>
    </section>
    <section class="wrapper-9 section" id="wrapper-9">
        <div class="section-padding">
            <div class="container">
                <div class="headline">
                    <h1>Management Team</h1>
                    {{-- <p>Our diverse leadership team brings a more effective and inclusive decision-making process to benefit the communities we serve</p> --}}
                </div>
                <div class="slider d-flex">
                    {{-- managementTeamMembers --}}
                    @foreach ($managementTeamMembers as $managementTeamMember)
                        <div class="single-slider-item" data-bs-toggle="modal" data-bs-target="{{ '#myModal-' . $managementTeamMember->id }}">
                            <div class="image">
                                <img src="{{ asset('images/' . $managementTeamMember->member_image) }}" alt="">
                            </div>
                            <div class="content">
                                <h4>{{ $managementTeamMember->name }} <span>{{ $managementTeamMember->designation->title ?? '' }}</span></h4>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- The Modal -->
                @foreach ($managementTeamMembers as $modalManagementTeamMember)
                    <div class="modal" id="{{ 'myModal-' . $modalManagementTeamMember->id }}">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>
                                <div class="popup-message d-flex">
                                    <div class="popup-image">
                                        <img src="{{ asset('images/' . $modalManagementTeamMember->member_image) }}" alt="">
                                    </div>
                                    <div class="popup-content">

                                        <h4>{{ $modalManagementTeamMember->name }}<span>{{ $modalManagementTeamMember->designation->title ?? '' }}</span></h4>
                                        <p>{{ $modalManagementTeamMember->bio }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <section class="wrapper-10 section">
        <div class="bg">
            <img src="{{ asset('assets/img/bg2.png') }}" alt="">
        </div>
        <div class="section-padding">
            <div class="container">
                @php
                    $title = trim($aboutUsSectionFour->title ?? '');
                    $words = preg_split('/\s+/', $title);

                    $totalWords = count($words);

                    if ($totalWords > 2) {
                        $titleOne = implode(' ', array_slice($words, 0, $totalWords - 2));
                        $titleTwo = implode(' ', array_slice($words, -2));
                    } else {
                        $titleOne = $title;
                        $titleTwo = '';
                    }
                @endphp

                <h1>
                    {{ $titleOne }}
                    @if($titleTwo)
                        <br>{{ $titleTwo }}
                    @endif
                </h1>
                <div class="content-container">
                    <div class="content-item">
                        <div class="image">
                            <img src="{{ asset('assets/img/target 1.png') }}" alt="">
                        </div>
                        <div class="content">
                            <h3>{{ $aboutUsSectionFour->content_one_title ?? '' }}</h3>
                            <p>{{ $aboutUsSectionFour->content_one_description ?? '' }}</p>
                        </div>
                    </div>
                    <div class="content-item">
                        <div class="image">
                            <img src="{{ asset('assets/img/binoculars 1.png') }}" alt="">
                        </div>
                        <div class="content">
                            <h3>{{ $aboutUsSectionFour->content_two_title ?? '' }}</h3>
                            <p>{{ $aboutUsSectionFour->content_two_description ?? '' }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
