<section class="wrapper-7">
    <div class="section-padding">
        <div class="container">
            <div class="footer">
                <div class="company-details">
                    <div class="logo">
                        <a href="{{ route('foundation.index') }}"> <img src="{{ asset('assets/img/logo.svg') }}"
                                alt=""></a>
                    </div>
                    <h2 class="footer-h2">Newsletter</h2>
                    <form action="{{ route('news-letter.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="email" name="email" placeholder="Email Address" required>
                        <input type="submit" value="Submit">
                    </form>

                </div>
                <div class="quick-link">
                    <h2 class="footer-h2">Quick Links</h2>
                    <ul>
                        <li><a href="https://www.sajida.org/we-are-sajida/sajida-at-a-glance/" target="_blank">SAJIDA at
                                a Glance</a></li>
                        <li><a href="https://www.sajida.org/annual-reports/" target="_blank">Annual & Audit Reports</a>
                        </li>
                        <li><a href="https://www.sajida.org/research-learning/" target="_blank">Research & Learning</a>
                        </li>
                    </ul>
                </div>
                <div class="contact">
                    <h2 class="footer-h2">Connect With Us</h2>
                    <div class="social-icon">
                        <a href="https://www.facebook.com/NGOSAJIDA" target="_blank"><i
                                class="fa-brands fa-facebook-f"></i></a>
                        <a href="https://twitter.com/NGOSAJIDA" target="_blank"><i class="fa-brands fa-twitter"></i></a>
                        <a href="https://www.youtube.com/@sajidafoundation1993" target="_blank"> <i
                                class="fa-brands fa-youtube"></i></a>
                        <a href="mailto:get-involved@sajida.org"><i class="fa-solid fa-envelope"></i></a>

                    </div>
                </div>
            </div>
        </div>

    </div>
</section>

<div class="copyright-area">
    <h4>© 2025 All Rights Reserved <a href="https://www.sajida.org/">SAJIDA Foundation.</a></h4>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.13.0/gsap.min.js"
    integrity="sha512-NcZdtrT77bJr4STcmsGAESr06BYGE8woZdSdEgqnpyqac7sugNO+Tr4bGwGF3MsnEkGKhU2KL2xh6Ec+BqsaHA=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.13.0/ScrollTrigger.min.js"
    integrity="sha512-P2IDYZfqSwjcSjX0BKeNhwRUH8zRPGlgcWl5n6gBLzdi4Y5/0O4zaXrtO4K9TZK6Hn1BenYpKowuCavNandERg=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
    integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
    integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"
    integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/js/fontawesome.min.js"
    integrity="sha512-j12pXc2gXZL/JZw5Mhi6LC7lkiXL0e2h+9ZWpqhniz0DkDrO01VNlBrG3LkPBn6DgG2b8CDjzJT+lxfocsS1Vw=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('assets/js/main.js') }}"></script>
@section('customscript2')
    @include('frontend.include.toaster')
@endsection
