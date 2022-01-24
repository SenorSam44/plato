@extends('frontend.home_layout')

@section('content')
    <link rel="stylesheet" href="./frontend/css/amity/bootstrap.min.css">
    <link rel="stylesheet" href="./frontend/css/amity/style.min.css">

    <!-- Page Content-->
    <div class="apo-page">
        <!-- Content Section-->
        <div data-bg-img-src="frontend/images/page-bg-img-2.png" class="apo-section apo-huge apo-section-lightly">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-7"><img src="frontend/images/img-75.jpg" alt=""/></div>
                    <div class="col-lg-3 col-md-10">
                        <h2>About Us</h2>
                        <p class="apo-section-sub-title" style="font-size: 18px">We are Apolo, an innovative studio that love creating design,
                            art and photography products. </p>
                        <div class="apo-services">
                            @foreach($abouts as $about)
                                <div class="apo-service">
                                    <p><strong>{{$about->about_title}} </strong></p>
                                    <ul class="white-bullet-list">
                                        <?php
                                        $description = $about->about_description;
                                        $description = preg_replace("/\r\n|\r|\n/", '<li>', $description);
                                        echo '<li>', $description;
                                        ?>
                                    </ul>
                                </div>
                            @endforeach
                            {{--                            <div class="apo-service">--}}
                            {{--                                <p><strong>Digital Retouching: </strong>Lorem ipsum dolor sit amet, consectetur--}}
                            {{--                                    adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.--}}
                            {{--                                </p>--}}
                            {{--                            </div>--}}
                            {{--                            <div class="apo-service">--}}
                            {{--                                <p><strong>Photography: </strong>Lorem ipsum dolor sit amet, consectetur adipisicing--}}
                            {{--                                    elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>--}}
                            {{--                            </div>--}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Content Section-->
        <!-- Content Section-->
        <div class="apo-section" style='font-family: "Unna", sans-serif;'>
            <div class="container"><img src="frontend/images/img-76.jpg" alt="" class="aligncenter"/>
                <div class="row">
                    <div class="col-md-4 col-md-offset-1 col-sm-6">
                        <h4 class="apo-section-sub-title">We combine years of retouching know-how with the latest
                            technologies to get the best.</h4>
                        <p>We’re dedicated to meeting your requirements and working alongside you to engineer the finest
                            end product. We actively seek the very best people for each element of each job.s</p>
                    </div>
                    <div class="col-md-4 col-md-offset-2 col-sm-6">
                        <p>Our experience is built on a solid understanding of traditional photographic and darkroom
                            techniques, together with the latest digital technology. Our meticulous attention to detail
                            and expertise in colour allow us to achieve exceptional results and we back this up with the
                            friendliest, most attentive service around.</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Content Section-->
        <!-- Content Section-->
        <div class="apo-section">
            <div class="container">
                <div class="apo-cta">
                    <p>We are currently taking on new projects. Would you like to discuss yours?</p>
                    <footer><a href="/contacts" class="apo-btn apo-btn-small apo-btn-white">Contact Us</a>
                    </footer>
                </div>
            </div>
        </div>
        <!-- End Content Section-->

        <div class="apo-section">
            <!-- =======================* Section End *======================= -->
            <!-- =======================* Section Start *===================== -->
            <?php
            $proj = DB::table('projects')
                ->where('projects.publication_status', '=', '1')
                ->get();
            $rev = DB::table('reviews')
                ->where('reviews.publication_status', '=', '1')
                ->get();
            ?>
            <section class="bg-light section-padding counter-bg">
                <div class="container">
                    <div class="d-flex counter-flex flex-column flex-lg-row">
                        <div class="d-flex-item pb-4 pb-lg-0">
                            <div class="counter-box wow fadeInUp" data-wow-delay="200ms">
                        <span class="counter-icon"><img src="./frontend/images/medal.svg"
                                                        alt="Years of Service"></span>
                                <span class="counter">13</span>
                                <h3 class="text-light">Years of Service</h3>
                            </div> <!-- counter-box End -->
                        </div>
                        <div class="d-flex-item pt-4 pb-4 pt-lg-0 pb-lg-0">
                            <div class="counter-box wow fadeInUp" data-wow-delay="400ms">
                        <span class="counter-icon"><img src="./frontend/images/flag.svg"
                                                        alt="Completed Projects"></span>
                                <span class="counter">10</span>
                                <h3 class="text-light">Completed Projects</h3>
                            </div> <!-- counter-box End -->
                        </div>
                        <div class="d-flex-item pt-4 pt-lg-0">
                            <div class="counter-box wow fadeInUp" data-wow-delay="600ms">
                        <span class="counter-icon"><img src="./frontend/images/hands.svg"
                                                        alt="Satisfied clients"></span>
                                <span class="counter">250</span>
                                <h3 class="text-light">Satisfied Clients</h3>
                            </div> <!-- counter-box End -->
                        </div>
                    </div>
                </div>
            </section> <!-- counter End -->
            <!-- =======================* Section End *======================= -->
            <!-- =======================* Section Start *===================== -->
            <section class="section-padding">
                <div class="container">
                    <h2 class="section-title text-left">Our Team</h2>
                    <div class="row">
                        <?php
                        $members = DB::table('members')
                            ->select('members.*')
                            ->where('members.publication_status', '=', '1')
                            ->get();
                        ?>
                        @foreach($members as $member)
                            <div class="col-md-6 col-lg-3 mb-4 mb-lg-0 wow fadeInUp" data-wow-delay="200ms">
                                <div class="card team-card">
                                    <img src="{{$member->member_image}}" class="card-img-top" alt="Nathan Brown">
                                    <div class="card-body text-center">
                                        <div class="title-block">
                                            <h5 class="card-title">{{$member->member_name}}</h5>
                                            <p class="card-text">{{$member->member_designation}}</p>
                                        </div>

                                        <div class="social-icons">
                                            <a href="#" class="social-items"><i class="fa fa-facebook"
                                                                                aria-hidden="true"></i></a>
                                            <a href="#" class="social-items"><i class="fa fa-twitter"
                                                                                aria-hidden="true"></i></a>
                                            <a href="#" class="social-items"><i class="fa fa-instagram"
                                                                                aria-hidden="true"></i></a>
                                            <a href="#" class="social-items"><i class="fa fa-linkedin"
                                                                                aria-hidden="true"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div> <!-- team member loop End -->
                        @endforeach

                    </div> <!-- row End-->
                    <h2 class="section-title text-left">Advisors</h2>
                    <div class="row">
                        <?php
                        $advisors = DB::table('advisors')
                            ->select('advisors.*')
                            ->where('advisors.publication_status', '=', '1')
                            ->get();
                        ?>
                        @foreach($advisors as $advisor)
                            <div class="col-md-6 col-lg-3 mb-4 mb-lg-0 wow fadeInUp" data-wow-delay="200ms">
                                <div class="card team-card">
                                    <img src="{{$advisor->advisor_image}}" class="card-img-top" alt="Nathan Brown">
                                    <div class="card-body text-center">
                                        <div class="title-block">
                                            <h5 class="card-title">{{$advisor->advisor_name}}</h5>
                                            <p class="card-text">{{$advisor->advisor_designation}}</p>
                                        </div>

                                        <div class="social-icons">
                                            <a href="#" class="social-items"><i class="fa fa-facebook"
                                                                                aria-hidden="true"></i></a>
                                            <a href="#" class="social-items"><i class="fa fa-twitter"
                                                                                aria-hidden="true"></i></a>
                                            <a href="#" class="social-items"><i class="fa fa-instagram"
                                                                                aria-hidden="true"></i></a>
                                            <a href="#" class="social-items"><i class="fa fa-linkedin"
                                                                                aria-hidden="true"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div> <!-- team member loop End -->
                        @endforeach

                    </div> <!-- row End-->
                </div> <!-- container End-->
            </section> <!-- team End -->
            <!-- =======================* Section End *======================= -->
            <!-- =======================* Section Start *===================== -->
            <section class="testimonials section-padding">
                <div class="container">
                    <h3 class="heading-2  section-title text-left">What Our Clients Say</h3>
                    <div class="clearfix">
                        <button class="btn btn-primary" style="background-color: #Ef3e10; border-color: red" onclick="window.location.href='/review'">Add Review</button>
                    </div>
                    <div style="position: relative">
                        <div class="w-100 h-100" style="position: absolute; top:0; left: 0; background-color: rgba(243, 243, 243, 0.3); filter: blur(30px)"></div>
                        <div id="testimonialSlider" class="owl-carousel owl-theme">
                            <?php
                            $reviews = DB::table('reviews')
                                ->select('reviews.*')
                                ->where('reviews.publication_status', '=', '1')
                                ->get();
                            ?>
                            @foreach($reviews as $review)
                                <div class="testimonials-item">
                                    <figure><img src="{{$review->user_image}}" alt="{{$review->user_name}}"
                                                 class="img-fluid">
                                    </figure>
                                    <div class="what-they-said">
                                        {{$review->review_description}}
                                    </div>
                                    <h4 class="auther-title">{{$review->user_name}}</h4>
                                    <p class="auther-designation">{{$review->user_designation}}</p>
                                </div> <!-- testimonials Item Loop End -->
                            @endforeach

                        </div>
                    </div>
                </div><!-- wrapper End -->
            </section><!-- testimonials End-->
            <!-- =======================* Section End *======================= -->
        </div>
    </div>
    <!-- End Page Content-->
    <!-- Footer-->
    <footer id="footer" data-bg-img-src="frontend/images/footer_bg.png" class="apo-footer">
        <div class="container">
            <div class="apo-widget-area apo-cols-4">
                <!-- Widget-->
                <section class="apo-widget apo-widget-size-1_7x apo-contact-info-widget">
                    <h2 class="apo-widget-title">Say hi!</h2>
                    <ul class="apo-contact-info">
                        <li><a href="mailto:#">contact@yourwebsite.com</a></li>
                        <li><a href="tel:#">+533 4929 295</a></li>
                    </ul>
                    <p>Copyright © 2017 Apolo. Designed by Ezwa Studio.</p>
                </section>
                <!-- End Widget-->
                <!-- Widget-->
                <section class="apo-widget apo-widget-size-0_65x">
                    <h2 class="apo-widget-title">Navigation</h2>
                    <ul>
                        <li><a href="#">Home</a></li>
                        <li><a href="#">Pages</a></li>
                        <li><a href="#">Portfolio</a></li>
                        <li><a href="#">Blog</a></li>
                        <li><a href="#">Contact</a></li>
                    </ul>
                </section>
                <!-- End Widget-->
                <!-- Widget-->
                <section class="apo-widget apo-widget-size-0_65x">
                    <h2 class="apo-widget-title">Information</h2>
                    <ul>
                        <li><a href="#">Privacy Policy</a></li>
                        <li><a href="#">Terms of Use</a></li>
                        <li><a href="#">Legal</a></li>
                        <li><a href="#">Sitemap</a></li>
                    </ul>
                </section>
                <!-- End Widget-->
                <!-- Widget-->
                <section class="apo-widget">
                    <h2 class="apo-widget-title">Subscribe Newsletter</h2>
                    <form class="apo-oneline-form apo-newsletter-form">
                        <input type="email" name="email" placeholder="Email Address"/>
                        <button type="submit"><i class="icon icon-arrow-right"></i></button>
                    </form>
                    <ul class="apo-hr-dotted-list">
                        <li><a href="#">Facebook</a></li>
                        <li><a href="#">Twitter</a></li>
                        <li><a href="#">Instagram</a></li>
                    </ul>
                </section>
                <!-- End Widget-->
            </div>
        </div>
    </footer>
    <!-- End Footer-->
    <script src="https://amityapartment.com.bd/frontend/assets/js/core.min.js"></script>
    <script src="https://amityapartment.com.bd/frontend/assets/js/script.js"></script>

    <style type="text/css">
        .lead {
            font-size: 18px !important;
            font-family: ariel !important;
            line-height: 30px;
        }

        .objective-list li {
            padding: 10px !important;
            font-size: 18px !important;
            font-family: ariel !important;
        }

        /*.section-title {*/
        /*    font-family: Tw cen mt !important;*/
        /*}*/


        .apo-services .apo-service{
            padding-top: 10px;
        }

        .apo-service p{
            margin-bottom: 0;
        }

        .white-bullet-list li:before{
            content: '\2022 ';
            color: white;
            margin-right: 10px;
        }

        .section-title{
            font-family: 'Abril Fatface', sans-serif;
        }

        .section-title::before{
            background: none;
        }
        .counter-flex .counter-box .counter-icon:after{
            background-color: white;
        }

        .clearfix .btn:hover{
            background-color: #FFF!important;
            color: red;
        }

    </style>

@endsection

