@extends('frontend.home_layout')

@section('content')
    <!-- Page Content-->
    <div class="apo-page">
        <div class="container">
            <main class="apo-section apo-section-thin">
                <div class="apo-section apo-medium">
                    <!-- Article-->
                    <article class="apo-entry apo-single">
                        <!-- Article Media-->
                        <div class="apo-entry-media"><img src="{{asset(''.$news->news_image)}}" alt=""/></div>
                        <!-- End of Article Media-->
                        <!-- Article Content-->
                        <div class="apo-entry-content-wrap">
                            <header class="apo-entry-header">
                                <h2 class="apo-entry-title">{{$news->news_title}}</h2>
                                <ul class="apo-entry-meta">
                                    <li>Author: <p>Self Correspondant</p></li>
                                    <li>Published in: <p href="#">
                                            @if($news->updated_at)
                                                {{ Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $news->updated_at)->format('dS M, Y')}}
                                            @else
                                                20th June, 2022
                                            @endif
                                        </p></li>
                                    <li>Categories:<p><a style="color: #a9aaae; text-transform: capitalize" href="#">{{$news->category_name}}</a></p></li>
                                    <li>News Url: <p> <a style="color: #a9aaae" href="{{$news->news_url}}">Go to news</a> </p></li>
                                </ul>
                            </header>
                            <div class="apo-entry-content">
                                <p>
                                    <?php
                                    $description = $news->news_description;
                                    $description = preg_replace("/\r\n|\r|\n/", '<br/>', $description);
                                    echo $description;
                                    ?>
                                </p>
                                <div class="wp-caption"><img src="{{asset(''.$news->news_image)}}" alt=""/></div>
                                <p>
                                    <?php
                                    $description = $news->news_description;
                                    $description = preg_replace("/\r\n|\r|\n/", '<br/>', $description);
                                    echo $description;
                                    ?>
                                </p>
                            </div>
                            <footer class="apo-entry-footer">
                                <div class="row apo-table-row-md">
                                    <div class="col-md-6">
{{--                                        <div class="apo-inline-block">--}}
{{--                                            <div class="apo-named-element"><span--}}
{{--                                                    class="apo-named-element-caption">Tags: </span>--}}
{{--                                                <div class="apo-named-element-container">--}}
{{--                                                    <ul class="apo-entry-tags">--}}
{{--                                                        <li><a href="#">Travel</a></li>--}}
{{--                                                        <li><a href="#">Autumn</a></li>--}}
{{--                                                        <li><a href="#">Leaf</a></li>--}}
{{--                                                    </ul>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
                                    </div>
                                    <div class="offset-md-6 col-md-6">
                                        <div class="apo-inline-block">
                                            <div class="apo-named-element"><span class="apo-named-element-caption">Share On:</span>
                                                <div class="apo-named-element-container">
                                                    <!-- Social Networks-->
                                                    <ul class="apo-social-networks">
                                                        <li><a style="color:white" href="#"><i class="fa fa-facebook"></i></a></li>
                                                        <li><a style="color:white" href="#"><i class="fa fa-linkedin"></i></a></li>
                                                        <li><a style="color:white" href="#"><i class="fa fa-instagram"></i></a></li>
                                                    </ul>
                                                    <!-- End Social Networks-->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </footer>
                        </div>
                        <!-- End of Article Content-->
                    </article>
                    <!-- End Article-->
                </div>
                <hr/>
            </main>
        </div>
    </div>
    <!-- End Page Content-->
    <!-- Footer-->
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
@endsection

<style type="text/css">
    .apo-entry-content p {
        color: white;
    }
</style>


