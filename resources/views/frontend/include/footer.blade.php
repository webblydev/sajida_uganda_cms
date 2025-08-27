<a href="#" class="ic-scroll-top"><i class="ri-arrow-up-s-line"></i></a>

<footer class="ic-footer">
    <div class="ic-footer-content">
        <div class="ic-footer-top ic-section-space">
            <div class="container">
                <div class="ic-row">
                    <div class="ic-col-4">
                        <div class="ic-footer-content-align">
                            <div class="ic-footer-content-wrapper">
                                <div class="mb-30">
                                    <a href="index.php">
                                        <img src="{{ asset('assets/images/logos-headers.png')}}" class="img-fluid" alt="logo">
                                    </a>
                                </div>
                                <div class="ic-news-letter">
                                    <h4 class="ic-title">Stay Updated</h4>


                                    <form action="{{ route('news-letter.store') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                            <div class="ic-input-field-wrapper">
                                                <input name="email" type="email" placeholder="Email Address">
                                                <button type="submit">
                                                    Subscribe
                                                </button>
                                            </div>
                                        </form>
                                </div>


                            </div>
                        </div>
                    </div>
                    <div class="ic-col-3">
                        <div class="ic-footer-content-align">
                            <div class="ic-footer-content-wrapper">
                                <h4 class="ic-title ">Quick Links</h4>
                                <ul>
                                    <li><a href="https://www.sajida.org/we-are-sajida/sajida-at-a-glance/">SAJIDA at a Glance</a></li>
                                    <li><a href="https://www.sajida.org/we-are-sajida/annual-and-audit-reports/">Annual & Audit Reports</a></li>
                                    <li><a href="https://www.sajida.org/knowledge-hub/research-and-learning/">Research & Learning</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="ic-col-5">
                        <div class="ic-footer-content-wrapper">
                            <h4 class="ic-title ">Connect With Us</h4>
                            <div class="ic-social">
                                <a href="https://www.facebook.com/NGOSAJIDA" target="blank">
                                    <i class="ri-facebook-fill icon"></i>
                                </a>
                                <a href="https://www.youtube.com/@sajidafoundation1993" target="blank">
                                    <i class="ri-youtube-fill icon"></i>
                                </a>
                                <a href="https://www.linkedin.com/company/sajida-foundation/" target="blank">
                                    <i class="ri-linkedin-fill icon"></i>
                                </a>
                                <a href="mailto:get-involved@sajida.org" target="blank">
                                    <i class="ri-mail-line icon"></i>
                                </a>
                            </div>
                            <h4 class="ic-title mt-4">Accreditation</h4>
                            <ul class="footer-logos">
                                <li>
                                    <a href="https://www.sajida.org/we-are-sajida/sajida-at-a-glance/" target="_blank"
                                        aria-label="Read more about SAJIDA Foundation"><img
                                            src="https://cms.sajida.org/images/lwBiZsKBkOo9qrwu16GFHXFJFsw=/906/width-202%7Cformat-webp/Footer_logo_1_rvHn5wa.png"
                                            alt="Sajida Foundation"></a>
                                        </li> 
                                        <li><a target="_blank"
                                    href="/we-are-sajida/sajida-at-a-glance/"
                                    aria-label="Read more about SAJIDA Foundation"><img
                                        src="https://cms.sajida.org/images/Edg3fyCn9j7FE-9TMtbvKWC4J5M=/907/width-202%7Cformat-webp/Footer_logo_2_UZMTcLv.png"
                                        alt="Sajida Foundation"></a></li>
                                <li><a target="_blank" href="/we-are-sajida/sajida-at-a-glance/"
                                        aria-label="Read more about SAJIDA Foundation"><img
                                            src="https://cms.sajida.org/images/pkW5cEDQy5qI3PVht0-oKyx4aQ8=/908/width-202%7Cformat-webp/Footer_logo_3_gNil7SB.png"
                                            alt="Sajida Foundation"></a></li>
                                <li><a target="_blank" href="/we-are-sajida/sajida-at-a-glance/"
                                        aria-label="Read more about SAJIDA Foundation"><img
                                            src="https://cms.sajida.org/images/hv1WldiQrCslR4TpfsbNuy9QXaE=/909/width-202%7Cformat-webp/Footer_logo_4_yj0YFlX.png"
                                            alt="Sajida Foundation"></a></li>
                                <li><a target="_blank" href="/we-are-sajida/sajida-at-a-glance/"
                                        aria-label="Read more about SAJIDA Foundation"><img
                                            src="https://cms.sajida.org/images/5vGrUwzZeUQT6ZZLclQFUL5OCC4=/910/width-202%7Cformat-webp/Footer_logo_5_Kz46L9R.png"
                                            alt="Sajida Foundation"></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- ic-footer-copyright -->
        <div class="ic-footer-copyright">
            <div class="container">
                <!-- ic-copyright-content  -->
                <div class="ic-copyright-content text-center">
                    <p class="copyright">
                        © <span id="currentYear"></span> All Rights Reserved
                        <a href="https://www.sajida.org/" target="_blank">
                            SAJIDA Foundation.
                        </a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</footer>
@section('customscript2')
@include('frontend.include.toaster')
@endsection
