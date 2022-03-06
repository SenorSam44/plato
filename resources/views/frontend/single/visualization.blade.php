<!doctype html>
<html lang="en">
<head>
    <!-- Basic page needs-->
    <title>Home | Apolo</title>
    <meta charset="UTF-8"/>
    <meta name="author" content=""/>
    <meta name="description" content=""/>
    <meta name="keywords" content=""/>
    <!-- Mobile specific metas-->
    <meta name="viewport" content="width=device-width,initial-scale=1.0"/>
    <!-- Favicon-->
    <link rel="shortcut icon" href="images/favicon.ico"/>
    <!-- Google Web Fonts-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700"/>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Abril+Fatface"/>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Unna"/>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=PT+Serif"/>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Muli"/>
    <!-- Vendor CSS-->
    <link rel="stylesheet" media="all" href="{{ asset('frontend') }}/css/bootstrap.min.css"/>
    <link rel="stylesheet" media="all" href="{{ asset('frontend') }}/css/font-awesome.min.css"/>
    <link rel="stylesheet" media="all" href="{{ asset('frontend') }}/css/linearicons.css"/>
    <link rel="stylesheet" media="all" href="{{ asset('frontend') }}/css/apolo-icons.css"/>
    <link rel="stylesheet" media="all" href="{{ asset('frontend') }}/css/hamburgers.min.css"/>
    <link rel="stylesheet" media="all" href="{{ asset('frontend') }}/css/animate.css"/>
    <link rel="stylesheet" media="all" href="{{ asset('frontend') }}/vendors/fancybox/jquery.fancybox.min.css"/>
    <link rel="stylesheet" media="all" href="https://velikorodnov.com/html/apolo/vendors/revolution/css/settings.css"/>
    <link rel="stylesheet" media="all" href="https://velikorodnov.com/html/apolo/vendors/revolution/css/layers.css"/>
    {{--    <link rel="stylesheet" media="all"--}}
    {{--          href="https://velikorodnov.com/html/apolo/vendors/revolution/css/navigation.css"/>--}}

    <link rel="stylesheet" media="all" href="{{ asset('frontend') }}/vendors/swiper/swiper.min.css"/>

    <link rel="stylesheet" media="all" href="{{ asset('frontend') }}/vendors/owl-carousel/assets/owl.carousel.min.css"/>
    <link rel="stylesheet" media="all"
          href="{{ asset('frontend') }}/vendors/mCustomScrollbar/jquery.mCustomScrollbar.min.css"/>
    <link rel="stylesheet" media="all" href="{{ asset('frontend') }}/vendors/arcticmodal/jquery.arcticmodal-0.3.css"/>
    <!-- Theme CSS-->
    <link rel="stylesheet" media="all" href="{{ asset('frontend') }}/css/style.css"/>
    <!-- Vendor JS-->
    <script src="{{ asset('frontend') }}/vendors/modernizr.js"></script>

    <style>
        @media (min-width: 728px) {
            .apo-header-component-first {
                padding-left: 50px;
            }
        }

        .dynamic-logo {
            width: 100px;
        }

        @media (max-width: 728px) {
            .apo-header-section, .apo-hr-controls {
                display: flex !important;
                justify-content: space-between;
            }

            .apo-hr-controls {
                display: inline;
                flex-direction: column-reverse;
            }


            .apo-fullscreen-control {
                display: inline-block;
            }

            .apo-header-component-first, .apo-header-component-middle, .apo-header-component-last, .apo-header-component-first .apo-header-items, .apo-header-component-middle .apo-header-items, .apo-header-component-last .apo-header-items .apo-header-item:not(:first-child) {
                display: inline-block !important;
                margin: auto;
            }

            .apo-header-component-last .apo-header-items .apo-header-item:first-child, .apo-hr-controls-component-first {
                display: none;
            }

            .apo-header-component-last .apo-header-items .apo-header-item:not(:first-child) {
                margin: 0 10px;
            }

            .apo-header-component-first .apo-header-items .apo-header-item {
                margin-right: 0;
            }

            .apo-header-component-last, .apo-header-component-first {
                max-width: max(33vw, 200px);
            }

            .apo-header-component-first .apo-header-items, .apo-header-component-last .apo-header-items {
                margin: 0 !important;
            }

        }
    </style>
</head>
<body>
<!-- Preloader-->
<div class="apo-preloader">
    <div class="apo-preloader-outer">
        <div class="apo-preloader-inner">
            <div class="apo-loader">
                <img src="{{ asset('frontend') }}/images/logo_color.png" alt="" style="padding-top: 30px;">
            </div>
        </div>
    </div>
</div>
<!-- End Preloader-->
<!-- Site Header-->
<header id="header" class="apo-header apo-header-dark apo-header-bottom">
    <div class="apo-header-section">
        <div class="apo-header-component-first dynamic-logo-wrapper">
            <div class="apo-header-items">
                <div class="apo-header-item">
                    <!-- Logo-->
                    <a href="/" title="Home" class="apo-logo"><img
                            class="dynamic-logo"
                            src="{{ asset('frontend') }}/images/logo.png"
                            alt="Logo"/>
                    </a>
                    <!-- End Logo-->
                </div>
            </div>
        </div>
        <div class="apo-header-component-middle">
            <div class="apo-header-items">
                <div class="apo-header-item">
                    <!-- Slider Thumbnails-->
                    <nav class="apo-slider-thumbs apo-slider-thumbs-hr swiper-container">
                        <button class="swiper-button-prev"><i class="icon icon-chevron-left"></i></button>
                        <div class="swiper-wrapper">
                            @foreach($gallery_files as $gallery_file)
                                <div class="swiper-slide">
                                    @if(strpos($gallery_file, '.mkv') || strpos($gallery_file, '.mp4') || strpos($gallery_file, '.web'))
                                        <video data-bg-img-src="{{asset($gallery_file)}}"
                                               class="apo-slider-thumb">
                                        </video>
                                    @else
                                        <div data-bg-img-src="{{asset($gallery_file)}}"
                                             class="apo-slider-thumb">
                                        </div>
                                    @endif
                                </div>
                            @endforeach
                        </div>
                        <button class="swiper-button-next"><i class="icon icon-chevron-right"></i></button>
                    </nav>
                    <!-- End Slider Thumbnails-->
                </div>
            </div>
        </div>
        <div class="apo-header-component-last d-md-flex" style="justify-content: end; margin: auto 0;">
            <div class="apo-header-items">
                <div class="apo-header-item">
                    <!-- Like-->
                {{--                    <button type="button" class="apo-hover-btn"><span class="apo-hover-btn-tooltip">220</span><i--}}
                {{--                            class="icon icon-heart"></i></button>--}}
                <!-- End Like-->
                </div>
                <div class="apo-header-item">
                    <!-- FullScreen-->
                    <button type="button" class="apo-hover-btn apo-fullscreen-control"><i class="icon icon-expand"></i>
                    </button>
                    <!-- End FullScreen-->
                </div>
                <div class="apo-header-item">
                    <!-- Info-->
                    <button type="button"
                            data-arctic-modal="/projects/{{$visualization->id}}/modal"
                            data-arctic-modal-type="ajax"
                            data-photo-title="The Deer"
                            data-photo-meta="A Photo by Christian Carter"
                            data-photo-info="[{&quot;name&quot;: &quot;Made In&quot;, &quot;value&quot;: &quot;August 2015&quot;}, {&quot;name&quot;: &quot;Model&quot;, &quot;value&quot;: &quot;Canon EOS 6D&quot;}, {&quot;name&quot;: &quot;ISO&quot;, &quot;value&quot;: &quot;400&quot;}, {&quot;name&quot;: &quot;Focal Length&quot;, &quot;value&quot;: &quot;14mm&quot;}, {&quot;name&quot;: &quot;Category&quot;, &quot;value&quot;: &quot;Nature, Landscape&quot;}, {&quot;name&quot;: &quot;Aperture&quot;, &quot;value&quot;: &quot;f/4&quot;}, {&quot;name&quot;: &quot;Exposure Time&quot;, &quot;value&quot;: &quot;1/40&quot;}]"
                            class="apo-hover-btn">
                        <i class="icon icon-menu-circle"></i>
                    </button>
                    <!-- End Info-->

                </div>
            </div>
        </div>
    </div>
</header>
<!-- End Site Header-->
<!-- Page Content-->
<div class="apo-page">
    <div class="rev_slider_wrapper fullscreen-container">
        <div id="rev-slider-1" class="rev_slider fullscreenbanner apo-revslider-theme">
            <ul>
                @foreach($gallery_files as $galley_file)
                    <li data-transition="fade" data-speed="500">
                        {{str_contains($gallery_file, '.mp4')}}
                        @if(in_array(substr($gallery_file, -4), ['.mp4', '.webm', '.mkv'] ))
                            <video src="{{asset($galley_file)}}" autoplay loop muted></video>
                        @else
                            <img src="{{asset($galley_file)}}" alt=""/>
                        @endif
                    </li>
                @endforeach
            </ul>
            <!-- Slider Actions -->
            <div class="apo-revslider-controls apo-right">
                <div class="apo-revslider-controls-item">
                    <div class="apo-revslider-theme-nav-prev">
                        <div class="apo-revslider-control-title">Prev</div>
                        <i class="apo-icon-prev"></i>
                    </div>
                </div>
                <div class="apo-revslider-controls-item apo-playing">
                    <div class="apo-revslider-control-pause">
                        <div class="apo-revslider-control-title">Pause</div>
                        <i class="apo-icon-pause"></i>
                    </div>
                    <div class="apo-revslider-control-play">
                        <div class="apo-revslider-control-title">Play</div>
                        <i class="apo-icon-play"></i>
                    </div>
                </div>
                <div class="apo-revslider-controls-item">
                    <div class="apo-revslider-theme-nav-next">
                        <div class="apo-revslider-control-title">Next</div>
                        <i class="apo-icon-next"></i>
                    </div>
                </div>
            </div>
            <!-- End Slider Actions -->
        </div>
        <div class="apo-slider-fullscreen-controls">
            <div class="container">
                <div class="apo-hr-controls">
                    <div class="apo-hr-controls-component-first">
                        <div class="apo-hr-controls-items">
                            <div class="apo-hr-controls-item">
                                <!-- Like-->
                                <button type="button" class="apo-hover-btn"><span
                                        class="apo-hover-btn-tooltip">220</span><i class="icon icon-heart"></i></button>
                            </div>
                            <!-- End Like-->
                        </div>
                    </div>
                    <div class="apo-hr-controls-component-middle">
                        <div class="apo-hr-controls-items">
                            <div class="apo-hr-controls-item">
                                <button type="button" class="apo-fullscreen-control-close"><i
                                        class="icon icon-cross"></i>Close
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="apo-hr-controls-component-last">
                        <div class="apo-hr-controls-items">
                            <div class="apo-hr-controls-item">
                                <!-- Slider Actions -->
                                <div class="apo-revslider-controls apo-right">
                                    <div class="apo-revslider-controls-item">
                                        <div class="apo-revslider-theme-nav-prev">
                                            <div class="apo-revslider-control-title">Prev</div>
                                            <i class="apo-icon-prev"></i>
                                        </div>
                                    </div>
                                    <div class="apo-revslider-controls-item apo-playing">
                                        <div class="apo-revslider-control-pause">
                                            <div class="apo-revslider-control-title">Pause</div>
                                            <i class="apo-icon-pause"></i>
                                        </div>
                                        <div class="apo-revslider-control-play">
                                            <div class="apo-revslider-control-title">Play</div>
                                            <i class="apo-icon-play"></i>
                                        </div>
                                    </div>
                                    <div class="apo-revslider-controls-item">
                                        <div class="apo-revslider-theme-nav-next">
                                            <div class="apo-revslider-control-title">Next</div>
                                            <i class="apo-icon-next"></i>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Slider Actions -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    let logo = document.querySelector('.dynamic-logo');
    let logo_wrapper = document.querySelector('.dynamic-logo-wrapper');
    console.log("f")
    logo_wrapper.addEventListener('mouseover', () => {
        console.log("f")
        logo.src = '{{ asset('frontend') }}/images/logo_color.png';
    });
    logo_wrapper.addEventListener('mouseout', () => {
        logo.src = '{{ asset('frontend') }}/images/logo.png';
    });

</script>

<script src="https://code.jquery.com/jquery-3.1.1.min.js"
        integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
<script src="{{ asset('frontend') }}/vendors/handlebars-v4.0.5.js"></script>

<script src="{{ asset('frontend') }}/vendors/wt.validator.min.js"></script>
<script src="{{ asset('frontend') }}/vendors/jquery.easing.1.3.min.js"></script>
<script src="{{ asset('frontend') }}/vendors/mad.accordion.js"></script>
<script src="{{ asset('frontend') }}/vendors/mad.customselect.js"></script>
<script src="{{ asset('frontend') }}/vendors/mad.tabs.js"></script>
<script src="{{ asset('frontend') }}/vendors/wat.counters.js"></script>
<script src="{{ asset('frontend') }}/vendors/wt.jquery.nav.1.0.js"></script>
<script src="{{ asset('frontend') }}/vendors/isotope.pkgd.min.js"></script>
<script src="{{ asset('frontend') }}/vendors/imagesloaded.pkgd.min.js"></script>
<script src="{{ asset('frontend') }}/vendors/fancybox/jquery.fancybox.min.js"></script>
<script src="{{ asset('frontend') }}/vendors/appear.min.js"></script>
<script src="{{ asset('frontend') }}/vendors/owl-carousel/owl.carousel.min.js"></script>
<script src="{{ asset('frontend') }}/vendors/mCustomScrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
<script src="{{ asset('frontend') }}/vendors/arcticmodal/jquery.arcticmodal-0.3.min.js"></script>

<script src="{{ asset('frontend') }}/vendors/themepunch/jquery.themepunch.tools.min.js"></script>
<script src="{{ asset('frontend') }}/vendors/themepunch/jquery.themepunch.revolution.min.js"></script>
<script src="{{ asset('frontend') }}/vendors/swiper/swiper.min.js"></script>
<script src="{{ asset('frontend') }}/vendors/fullpage/jquery.fullpage.min.js"></script>
<!-- Theme JS-->
<script src="{{ asset('frontend') }}/js/apolo.core.js"></script>
<script src="{{ asset('frontend') }}/js/modules/apolo.newsletter.js"></script>
<script src="{{ asset('frontend') }}/js/modules/apolo.sameheight.js"></script>
<script src="{{ asset('frontend') }}/js/modules/apolo.appear.js"></script>
<script src="{{ asset('frontend') }}/js/modules/apolo.isotope.js"></script>
<script src="{{ asset('frontend') }}/js/modules/apolo.fullpage.js"></script>
<script src="{{ asset('frontend') }}/js/apolo.init.js"></script>
</body>
</html>
