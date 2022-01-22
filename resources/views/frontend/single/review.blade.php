@extends('frontend.home_layout')

@section('content')

    <!-- Page Content-->
    <div class="apo-page">
        <!-- Content Section-->
        <div data-bg-img-src="frontend/images/page-bg-img-2.png" class="apo-section apo-huge apo-section-lightly">
            <div class="apo-section-blur-bg">
                <div data-bg-img-src="frontend/images/page-bg-img-3.jpg" class="apo-section-blur-bg-element"></div>
            </div>
            <div class="container">
                <div class="row apo-same-height-container">
                    <div class="col-sm-6 apo-same-height">
                        <div class="apo-contact-info-section">
                            <p>We are currently taking on new projects.<br/>Would you like to discuss yours?</p>
                            <ul class="apo-contact-info">
                                <li><a href="mailto:#">contact@yourwebsite.com</a></li>
                                <li><a href="tel:#">+533 4929 295</a></li>
                            </ul>
                            <footer class="apo-contact-footer">
                                <h5 class="apo-social-networks-title">Follow Us On</h5>
                                <!-- Social Networks-->
                                <ul class="apo-social-networks apo-style-2">
                                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                                    <li><a href="#"><i class="fa fa-behance"></i></a></li>
                                    <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                                </ul>
                                <!-- End Social Networks-->
                            </footer>
                        </div>
                    </div>
                    <div class="col-sm-6 apo-same-height">
                        <h2>Drop Us a Line</h2>
                        <h3 class="apo-section-sub-title">We'd love to hear from you. So feel free to use the online form and we'll get back to you soon.</h3>
                        <!-- Contact Form-->
                        {{ Session::get('msg') }}
                        <form novalidate="true" class="apo-contact-form" method="post" action="{{URL::to('/reviews')}}" method="post" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <ul>
                                <li>
                                    <div class="apo-moved-label">
                                        <input type="text" id="name" name="user_name"/>
                                        <label for="name">Name</label><span class="apo-moved-label-border"></span>
                                    </div>
                                </li>
                                <li>
                                    <div class="apo-moved-label">
                                        <input id="designation" type="text" name="user_designation"/>
                                        <label for="designation">Designation</label><span class="apo-moved-label-border"></span>
                                    </div>
                                </li>
                                <li>
                                    <div class="apo-moved-label">
                                        <input id="rating" class="form-control" type="number" name="rating"/>
                                        <label for="rating">Rating (Out of 10)</label><span class="apo-moved-label-border"></span>
                                    </div>
                                </li>
                                <li>
                                    <div class="apo-moved-label">
                                        <textarea id="description" name="review_description" rows="1"></textarea>
                                        <label for="description">Description</label><span class="apo-moved-label-border"></span>
                                    </div>
                                </li>
                                <li>
                                    <div class="apo-moved-label">
                                        <input id="user_image" class="form-control" type="file" name="user_image"/>
                                        <label for="user_image">Image</label><span class="apo-moved-label-border"></span>
                                    </div>
                                </li>
                                <li>
                                    <button type="submit" class="apo-btn apo-btn-small apo-btn-white">Send Message</button>
                                </li>
                            </ul>
                        </form>
                        <!-- End Contact Form -->
                    </div>
                </div>
            </div>
        </div>
        <!-- End Content Section-->
    </div>
    <!-- End Page Content-->
    <footer id="footer" data-bg-img-src="images/footer_bg.png" class="apo-footer">
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
                        <li> <a href="#">Home</a></li>
                        <li> <a href="#">Pages</a></li>
                        <li> <a href="#">Portfolio</a></li>
                        <li> <a href="#">Blog</a></li>
                        <li> <a href="#">Contact</a></li>
                    </ul>
                </section>
                <!-- End Widget-->
                <!-- Widget-->
                <section class="apo-widget apo-widget-size-0_65x">
                    <h2 class="apo-widget-title">Information</h2>
                    <ul>
                        <li> <a href="#">Privacy Policy</a></li>
                        <li> <a href="#">Terms of Use</a></li>
                        <li> <a href="#">Legal</a></li>
                        <li> <a href="#">Sitemap</a></li>
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


@endsection

<style type="text/css">

</style>
