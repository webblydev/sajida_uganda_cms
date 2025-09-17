@extends('frontend.layout.main')
@section('title', 'About Us')
@section('content')
    <section class="hero-section">
        <div class="bg">
            <img src="assets/img/hero2.jpg" alt="">
        </div>
        <div class="section-padding">
            <div class="container">
                <div class="hero-content">

                    <div class="heading">
                        <h1>About Us</h1>
                    </div>

                </div>

            </div>


        </div>


    </section>

    <section class="wrapper-8 section">
        <div class="section-padding">
            <div class="container">
                <div class="content-container">
                    <h1>Who We Are</h1>
                    <p>SAJIDA Foundation is a value-driven non-profit organization from the Global South, headquartered in Bangladesh. Established in 1993 with the vision of ensuring health, happiness, and dignity for all, SAJIDA has grown into a trusted development actor with a presence across three countries. </br></br>
                        Our work enhances community well-being through three core areas: providing access to high-quality health and mental health services, empowering entrepreneurship through financial inclusion, and promoting equitable development. Over the past three decades, we have reached more than 6 million individuals, powered by a dedicated workforce of over 6,000.

                    </p>
                    <div class="btns">
                        {{-- got to governing body section --}}
                        <a href="#wrapper-9" class="btn">Leadership Team</a>
                        <a href="https://www.sajida.org/we-are-sajida/sajida-story/" class="btn" target="blank">our history</a>
                    </div>
                </div>
                <div class="gallery row">
                    <div class="col-6">
                        <div class="gallery-item ">
                            <img src="{{ asset('assets/img/gallery-img1.jpg') }}" alt="">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="gallery-item ">
                            <img src="{{ asset('assets/img/gallery-img2.jpeg') }}" alt="">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="gallery-item ">
                            <img src="{{ asset('assets/img/gallery-img3.jpg') }}" alt="">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="gallery-item ">
                            <img src="{{ asset('assets/img/gallery-img4.jpg') }}" alt="">
                        </div>
                    </div>




                </div>
            </div>
        </div>
    </section>

    <section class="wrapper-9 section" id="wrapper-9">
        <div class="section-padding">
            <div class="container">
                <div class="headline">
                    <h1>Leadership Team</h1>
                    <p>Our diverse leadership team brings a more effective and inclusive decision-making process to benefit the communities we serve</p>
                </div>
                <div class="slider d-flex">
                    <div class="single-slider-item" data-bs-toggle="modal" data-bs-target="#myModal-01">
                        <div class="image">
                            <img src="{{ asset('assets/img/zahida_fizza_kabir.png') }}" alt="">
                        </div>
                        <div class="content">
                            <h4>Zahida Fizza Kabir<span>Director SAJIDA Microfinance Limited</span></h4>
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
                    <div class="single-slider-item" data-bs-toggle="modal" data-bs-target="#myModal-03">
                        <div class="image">
                            <img src="{{ asset('assets/img/governing-body-img4.png') }}" alt="">
                        </div>
                        <div class="content">
                            <h4>Ishtiaq Mohiuddin <span>Deputy CEO SAJIDA Foundation (BGD)</span></h4>
                        </div>
                    </div>
                    <div class="single-slider-item" data-bs-toggle="modal" data-bs-target="#myModal-04">
                        <div class="image">
                            <img src="{{ asset('assets/img/governing-body-img2.png') }}" alt="">
                        </div>
                        <div class="content">
                            <h4>Muhymin Chowdhury <span>Director SAJIDA Foundation (BGD)</span></h4>
                        </div>
                    </div>

                    <div class="single-slider-item" data-bs-toggle="modal" data-bs-target="#myModal-05">
                        <div class="image">
                            <img src="{{ asset('assets/img/Md-Sayful-Islam.png') }}" alt="">
                        </div>
                        <div class="content">
                            <h4>Md Sayful Islam <span>Country Representative SAJIDA Microfinance Limited</span></h4>
                        </div>
                    </div>


                    <div class="single-slider-item" data-bs-toggle="modal" data-bs-target="#myModal-06">
                        <div class="image">
                            <img src="{{ asset('assets/img/hridoy_islam.png') }}" alt="">
                        </div>
                        <div class="content">
                            <h4>Hridoy Islam<span>Senior Manager – Partnership & Fund Raising Unit</span></h4>
                        </div>
                    </div>
                    <div class="single-slider-item" data-bs-toggle="modal" data-bs-target="#myModal-07">
                        <div class="image">
                            <img src="{{ asset('assets/img/samanta_sarni_tira.png') }}" alt="">
                        </div>
                        <div class="content">
                            <h4>Samanta Sarni Tira <span>General Manager-Partnerships SAJIDA Foundation (BGD)</span></h4>
                        </div>
                    </div>
                    <div class="single-slider-item" data-bs-toggle="modal" data-bs-target="#myModal-08">
                        <div class="image">
                            <img src="{{ asset('assets/img/shamira_mostafa.png') }}" alt="">
                        </div>
                        <div class="content">
                            <h4>Shamira Mostafa<span>Associate Director - Risk & Research SAJIDA Foundation (BGD)</span></h4>
                        </div>
                    </div>
                    <div class="single-slider-item" data-bs-toggle="modal" data-bs-target="#myModal-09">
                        <div class="image">
                            <img src="{{ asset('assets/img/showman_roy.png') }}" alt="">
                        </div>
                        <div class="content">
                            <h4>Showman Roy <span>Associate Director-MIS & IT Infra SAJIDA Foundation (BGD)</span></h4>
                        </div>
                    </div>

                </div>



                <!-- The Modal -->
                <div class="modal" id="myModal-01">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>
                            <div class="popup-message d-flex">
                                <div class="popup-image">
                                    <img src="{{ asset('assets/img/governing-body-img1.png') }}" alt="">
                                </div>
                                <div class="popup-content">

                                    <h4>Zahida Fizza Kabir <span>Director SAJIDA Microfinance Limited</span></h4>
                                    <p>Ms. Zahida Fizza Kabir, the Chief Executive Officer of SAJIDA Foundation, boasts over 30 years of leadership experience across financial services, healthcare, and community development. She has been integral to SAJIDA since its inception in 1993. SAJIDA operates through 400 unit offices and 6,000 full time staff in Bangladesh alone.

                                    Under Ms. Kabir's guidance, SAJIDA has established six portfolio companies, focusing on mental health, geriatric care & caregiving services, and support children with development delays. She also serves as the Managing Director of two specialised healthcare enterprises: Home and Community Care Limited and Inner Circle Limited.

                                    In addition, Ms. Kabir chairs the Psychological Mental Health and Wellness Clinic and holds positions on the boards of Renata Limited, SAJIDA Uganda, and SAJIDA USA.

                                    Ms. Kabir's academic qualifications include a Post Graduate Diploma in Organisational Leadership from Said Business School, University of Oxford, a Master’s Degree in International and Intercultural Management from Vermont, USA, and a Bachelor’s Degree in Social Work from the University of the Philippines.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal" id="myModal-02">
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
                <div class="modal" id="myModal-03">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>
                            <div class="popup-message d-flex">
                                <div class="popup-image">
                                    <img src="{{ asset('assets/img/governing-body-img4.png') }}" alt="">
                                </div>
                                <div class="popup-content">

                                    <h4>Ishtiaq Mohiuddin <span>Deputy CEO SAJIDA Foundation (BGD)</span></h4>
                                    <p>Mr. Ishtiaq Mohiuddin is the Deputy Chief Executive Officer of Development Programmes and Risk Management Unit of SAJIDA Foundation. He has extensive experience in Bangladesh and abroad with financial institutions and non-government organisations. Before joining SAJIDA, Mr. Mohiuddin worked as the Deputy Managing Director of BRAC Bank. He has also worked as Director, Microfinance Programme of BRAC & BRAC International. His international experience includes working for FINCA, USA as Country Manager in Malawi and Operations Manager in South Africa. He has also managed portfolios in Saint Lucia and Grenada for Caribbean Microfinance Ltd.

                                    Mr. Mohiuddin holds an MBA and a Bachelor's degree in Accounting from Southeastern Louisiana University, Hammond, Louisiana, USA. </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal" id="myModal-05">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>
                            <div class="popup-message d-flex">
                                <div class="popup-image">
                                    <img src="{{ asset('assets/img/Md-Sayful-Islam.png') }}" alt="">
                                </div>
                                <div class="popup-content">

                                    <h4>Md Sayful Islam<span>Country Representative SAJIDA Microfinance Limited</span></h4>
                                    <p>Sayful Islam holds both a BBA and MBA in Marketing from the University of Dhaka. He began his career with BRAC in Bangladesh, Tanzania, and Myanmar, where he focused on staff training, product development, and digitizing microfinance operations. He later served as Head of Operations at Umoja Microfinance in Uganda, leading its expansion from 2 to 60 branches and growing the loan portfolio from $100,000 to $10 million. Since 2024, Sayful has been Country Representative for SAJIDA Foundation Uganda, where he has established core systems, built strong teams, developed organizational policies, and introduced financial products designed for the local market. </p>
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

                                    <h4>Muhymin Chowdhury <span>Director SAJIDA Foundation (BGD)</span></h4>
                                    <p>Muhymin Chowdhury currently serves as the Director of Impact Investment & Partnerships at SAJIDA Foundation. In this role, he leads the management of an impact fund aimed at fostering the growth of startups and build strategic partnerships with institutional stakeholders to expand SAJIDA’s development programmes.

                                    Previously, Muhymin held the position of Deputy Challenge Fund Manager at Nathan Associates, where he successfully structured 36 results-based financing agreements worth GBP 27 million with key financial market actors. Earlier at Shorebank International, Muhymin managed a USD 10 million performance-based investment in bKash, a leading mobile money service provider.

                                    Muhymin's professional experience extends across Nepal, Pakistan, and Kenya, where he collaborated with commercial banks, international non-governmental organisations (INGOs), and bilateral donors on financial product development, mobile money agent network expansion, and customer segmentation strategies.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="modal" id="myModal-06">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>
                            <div class="popup-message d-flex">
                                <div class="popup-image">
                                    <img src="{{ asset('assets/img/06. Hridoy Islam.jpg') }}" alt="">
                                </div>
                                <div class="popup-content">

                                    <h4>Hridoy Islam <span>Senior Manager – Partnership & Fund Raising Unit</span></h4>
                                    <p>Hridoy Islam is serving as Senior Manager of the Partnerships and Fundraising unit at SAJIDA Foundation. In this role, he oversees fund mobilisation to advance financial inclusion and scale SAJIDA Foundation’s healthcare social enterprises. With a strong focus on impact-driven finance, Hridoy has successfully structured investment strategies that have generated substantial funding for high-impact projects across Bangladesh.<br>
                                    In previous roles, Hridoy developed extensive expertise in alternative investment management, including in his position as Vice President, Head of Research at Alternative Investment Management of STEPs Ltd. (an asset management company licensed to manage Alternative Investment Funds in Bangladesh) where he led the structuring of Bangladesh’s first composite alternative investment fund - an initiative targeted at MSMEs in key sectors such as healthcare and technology. He also led Bangladesh’s first microfinance portfolio securitisation transaction, worth $3.25 million, facilitating increased capital flow to underserved communities. His tenure at Bangladesh SME Corporation Ltd. (a FinTech company) was marked by his leadership in developing financial products for marginalized entrepreneurs, which included securing $1.4 million for 2,300 MSMEs and deploying over $3.6 million to SMEs through innovative quasi-equity instruments.<br>
                                    Hridoy holds a Bachelor’s degree in Business Administration, with double majors in Finance & Accounting and Economics from North South University in Dhaka, Bangladesh.

                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>





                <div class="modal" id="myModal-07">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>
                            <div class="popup-message d-flex">
                                <div class="popup-image">
                                    <img src="{{ asset('assets/img/07. Samanta Sarni Tira.jpg') }}" alt="">
                                </div>
                                <div class="popup-content">

                                    <h4>Samanta Sarni Tira <span>General Manager-Partnerships SAJIDA Foundation (BGD)</span></h4>
                                    <p>Samanta Sarni Tira has over ten years of experience across Bangladesh’s private and development sectors. She currently leads international operations and partnerships at SAJIDA Foundation, where she drives global growth and strategic collaborations. Tira began her career in digital marketing, managing campaigns for leading Bangladeshi brands, before joining Grameenphone to help launch the country’s first telco B-brand. She later moved into UX design and digital product development, eventually taking on a strategic role at ShopUp, where she focused on B2B innovation. Passionate about storytelling and social impact, she bridges business strategy with nonprofit vision to develop scalable, human-centered solutions.</p>
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

                                    <h4>Shamira Mostafa <span>Associate Director - Risk & Research SAJIDA Foundation (BGD)</span></h4>
                                    <p>Ms Shamira Mostafa is the Head of Business Operations of Research, Monitoring & Evaluation. Ms Mostofa is an accomplished development practitioner with over 13 years of experience in project implementation, strategic communication, and monitoring and evaluation across diverse industries.

                                    Previously, Ms. Mostafa managed USD 13 million worth of portfolio under a financial inclusion project commenced by FCDO.  Prior to that, she managed pro-poor market lead interventions worth $1 million at Katalyst-Swisscontact. Her passion for uplifting underprivileged communities has been evident throughout her career. She actively contributed to the advancement of math and reading skills for young learners in diverse communities of the greater Boston area while collaborating with the Centre for Community-Based Learning during her Master's program.

                                    Ms. Mostafa, served as a marketing associate in Boston, where she promoted food safety measures for a bio-technology company. Prior to that, she excelled as a corporate trainer for the marketing agency of Verizon Telecommunication, facilitating access to affordable telecommunication and IT facilities for micro and small enterprises. Her academic accomplishments include a Master of Communication degree from Lasell University, Auburndale, Massachusetts, and a Bachelor of Business degree from North South University, Dhaka.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="modal" id="myModal-09">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>
                            <div class="popup-message d-flex">
                                <div class="popup-image">
                                    <img src="{{ asset('assets/img/09. Showman Roy.jpg') }}" alt="">
                                </div>
                                <div class="popup-content">

                                    <h4>Showman Roy <span>Associate Director-MIS & IT Infra SAJIDA Foundation (BGD)</span></h4>
                                    <p>Mr. Showman Roy currently serves as Associate Director of MIS, IT & IT Infrastructure at SAJIDA Foundation. In his current role, he leads IT policy engagements, stimulates technology adaptation and supports SAJIDA’s expansion.

                                    Prior to SAJIDA Foundation, Mr. Roy worked for Rahimafrooz Bangladesh as Senior Manager & Solution Architect for its technical solutions. He began his career at Southtech Group in early 2000 and served there for 16 years in different leadership roles, with his last appointment being Senior Vice President for its banking and microfinance solutions. Over the past 20+ years, he has been responsible for ensuring technical solutions to 19 microfinance institutions and banks, serving more than 3,500 branches, including BRAC, SAJIDA Foundation, Rangpur Dinajpur Rural Service, People’s Oriented Program Implementation, Integrated Development Foundation, Partnership for Cleaner Textile, and Bhutan Development Bank.

                                    Mr. Roy completed his MBA in Accounting & Finance, and Postgraduate Diploma in Computer Science and Information Technology, NCC, UK, under the BRAC Information Technology Institute. He also participated in a Certificate Course on Mastering the Skills of Business Strategy & Structured Innovation, under the Management Development Programme at the Institute of Business Administration (IBA), University of Dhaka. </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="wrapper-10 section">
        <div class="bg">
            <img src="{{ asset('assets/img/bg2.png') }}" alt="">
        </div>
        <div class="section-padding">
            <div class="container">
                <h1>The Future We Look <br> Forward to</h1>
                <div class="content-container">
                    <div class="content-item">
                        <div class="image">
                            <img src="{{ asset('assets/img/target 1.png') }}" alt="">
                        </div>
                        <div class="content">
                            <h3>Our Mission</h3>
                            <p>To serve as a Global South leader in development by advancing healthcare, financial inclusion, and equitable opportunities that empower communities to thrive.</p>
                        </div>
                    </div>
                    <div class="content-item">
                        <div class="image">
                            <img src="{{ asset('assets/img/binoculars 1.png') }}" alt="">
                        </div>
                        <div class="content">
                            <h3>Our Vision</h3>
                            <p>Ensuring Health, Happiness, and Dignity for all.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
{{--
    <!-- <section class="wrapper-11 section">
        <div class="section-padding">
            <div class="container">
                <div class="content-container">
                    <div>
                        <h1>Guiding Principles</h1>
                    </div>
                    <div class="right-side">
                        <p>We drive large-scale transformation by empowering women and their families to overcome poverty,
                            build resilience, and <br> foster resourcefulness.</p>
                    </div>
                </div>
                <div class="items-container">
                    <div class="item">
                        <img src="{{ asset('assets/img/item-img1.png') }}" alt="">
                        <p>Transparency & <br> Accountability</p>
                    </div>
                    <span class="item-separator"></span>
                    <div class="item">
                        <img src="{{ asset('assets/img/item-img2.png') }}" alt="">
                        <p>Inclusiveness & <br> Dignity</p>
                    </div>
                    <span class="item-separator"></span>
                    <div class="item">
                        <img src="{{ asset('assets/img/item-img3.png') }}" alt="">
                        <p>Compassion & <br> Empathy</p>
                    </div>
                    <span class="item-separator"></span>
                    <div class="item">
                        <img src="{{ asset('assets/img/item-img4.png') }}" alt="">
                        <p>Innovation & <br> Quality</p>
                    </div>
                    <span class="item-separator"></span>
                    <div class="item">
                        <img src="{{ asset('assets/img/item-img5.png') }}" alt="">
                        <p>Empowering <br> Mothers & Families</p>
                    </div>
                </div>
            </div>
        </div>
    </section> -->

    <!-- <section class="wrapper-12 section">
        <div class="section-padding">
            <div class="container">
                <div class="d-flex justify-content-between align-items-center">
                    <h1>Make Your Contribution</h1>
                    <a href="{{ route('donation.index') }}" class="btn">Donate Now</a>
                </div>
            </div>
        </div>
    </section> --> --}}
@endsection
