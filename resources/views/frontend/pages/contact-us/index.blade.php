@extends('frontend.layout.main')
@section('title', 'Contact Us')
@section('content')
    <section class="hero-section">
        <div class="bg">
            <img src="assets/img/hero-img10.jpg" alt="">
        </div>
        <div class="section-padding">
            <div class="container">
                <div class="hero-content">
                    <div class="heading">
                        <h1>Contact Us</h1>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="contact-section">
        <div class="section-padding">
            <div class="container">
                <h1>We Are Here To Help</h1>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="contact-info">
                            <p>Have a question? Concern? Request? Your questions haven't been answered? Connect with us in
                                your convenient way.</p>
                            <div class="row mt-5">
                                <div class="col-sm-7">
                                    <div class="location d-flex">
                                        <div class="icon">
                                            <img src="assets/img/location.png" alt="">
                                        </div>
                                        <div class="info-content">
                                            <h4>Location</h4>
                                            <p>Plot 12 Kampala Road <br>Nakasero, Central Division <br>Kampala, Uganda <br> P.O. Box 12345</p>
                                        </div>

                                    </div>
                                </div>
                                <div class="col-sm-5">
                                    <div class="phone d-flex">
                                        <div class="icon">
                                            <img src="assets/img/phone.png" alt="">
                                        </div>
                                        <div class="info-content">
                                            <h4>Phone</h4>
                                            <p>+8802222290513</p>
                                        </div>

                                    </div>

                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col-sm-7">
                                    <div class="location d-flex">
                                        <div class="icon">
                                            <img src="assets/img/envelope.png" alt="">
                                        </div>
                                        <div class="info-content">
                                            <h4>Email</h4>
                                            <p>inquiry@sajida.org</p>
                                        </div>

                                    </div>
                                </div>
                                <div class="col-sm-5">
                                    <div class="phone d-flex">
                                        <div class="icon">
                                            <img src="assets/img/share-nodes.png" alt="">
                                        </div>
                                        <div class="info-content">
                                            <h4>Social</h4>
                                            <div class="social-icon">
                                                <a href="https://www.facebook.com/NGOSAJIDA" target="_blank"><i
                                                        class="fa-brands fa-facebook-f"></i></a>
                                                <a href="https://twitter.com/NGOSAJIDA" target="_blank"><i class="fa-brands fa-x-twitter"></i></a>
                                                <a href="https://www.youtube.com/@sajidafoundation1993" target="_blank"> <i
                                                        class="fa-brands fa-youtube"></i></a>
                                                <a href="mailto:inquiry@Sajida.org" target="_blank"><i class="fa-solid fa-envelope"></i></a>

                                            </div>
                                        </div>

                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="contact-form">
                            <form action="">
                                <label for="name">Name*</label><br>
                                <input type="text" id="name" name="name" required><br>

                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="email">E-mail*</label><br>
                                        <input type="email" id="name" name="email" required><br>

                                    </div>
                                    <div class="col-md-6">
                                        <label for="number">Mobile Number*</label><br>
                                        <input type="tel" id="name" name="number" required><br>
                                    </div>
                                </div>





                                <label for="companyName">Company Name*</label><br>
                                <input type="text" id="name" name="name" required><br>

                                <label for="contactPurpose">Contact Purpose*</label><br>
                                <input type="text" id="name" name="name" required><br>




                                <label for="text">Your Message</label><br>
                                <textarea id="w3review" name="w3review"></textarea>

                                <input class="submit-btn" type="submit" value="SEND >">

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="section-16">
        <div class="section-padding">
            <div class="container">
                <div class="d-md-flex">

                    <div class="office-address d-flex flex-column justify-content-md-center">
                        <h2>Our Office</h2>
                        <p>Plot 12 Kampala Road <br>Nakasero, Central Division <br>Kampala, Uganda <br> P.O. Box 12345</p>
                    </div>

                    <div class="google-maps">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3989.75894592945!2d32.580838473577145!3d0.3125800640345728!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x177dbc7e112721b1%3A0xb24549fa0cceba9c!2s12%20Kampala%20Road%2C%20Kampala%2C%20Uganda!5e0!3m2!1sen!2sbd!4v1755068669881!5m2!1sen!2sbd"
                            width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
