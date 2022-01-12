<!doctype html>
<html lang="en">
  <head>
    <!-- Basic page needs-->
    <title>Home | Plato</title>
    <meta charset="UTF-8"/>
    <meta name="author" content=""/>
    <meta name="description" content=""/>
    <meta name="keywords" content=""/>
    <!-- Mobile specific metas-->
    <meta name="viewport" content="width=device-width,initial-scale=1.0"/>
    <!-- Favicon-->
    <link rel="shortcut icon" href="frontend/images/favicon.ico"/>
    <!-- Google Web Fonts-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700"/>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Abril+Fatface"/>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Unna"/>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=PT+Serif"/>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Muli"/>
    <!-- Vendor CSS-->
    <link rel="stylesheet" media="all" href="frontend/css/bootstrap.min.css"/>
    <link rel="stylesheet" media="all" href="frontend/css/font-awesome.min.css"/>
    <link rel="stylesheet" media="all" href="frontend/css/linearicons.css"/>
    <link rel="stylesheet" media="all" href="frontend/css/apolo-icons.css"/>
    <link rel="stylesheet" media="all" href="frontend/css/hamburgers.min.css"/>
    <link rel="stylesheet" media="all" href="frontend/css/animate.css"/>
    <link rel="stylesheet" media="all" href="frontend/vendors/fancybox/jquery.fancybox.min.css"/>
    <link rel="stylesheet" media="all" href="frontend/vendors/owl-carousel/assets/owl.carousel.min.css"/>
    <link rel="stylesheet" media="all" href="frontend/vendors/mCustomScrollbar/jquery.mCustomScrollbar.min.css"/>
    <link rel="stylesheet" media="all" href="frontend/vendors/arcticmodal/jquery.arcticmodal-0.3.css"/>
    <!-- Theme CSS-->
    <link rel="stylesheet" media="all" href="frontend/css/style.css"/>
    <!-- Vendor JS-->
    <script src="frontend/vendors/modernizr.js"></script>
  </head>
  <body>
    <div id="app">
      <!-- Header Area Start Here -->
        @include('frontend.includes.header')
      <!-- Header Area End Here -->

        @yield('content')

      <!-- Footer-->
      <!-- End Footer-->
    </div>
    <!-- Vendor JS-->
    <script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
    <script src="frontend/vendors/handlebars-v4.0.5.js"></script>
    
    <script src="frontend/vendors/wt.validator.min.js"></script>
    <script src="frontend/vendors/jquery.easing.1.3.min.js"></script>
    <script src="frontend/vendors/mad.accordion.js"></script>
    <script src="frontend/vendors/mad.customselect.js"></script>
    <script src="frontend/vendors/mad.tabs.js"></script>
    <script src="frontend/vendors/wat.counters.js"></script>
    <script src="frontend/vendors/wt.jquery.nav.1.0.js"></script>
    <script src="frontend/vendors/isotope.pkgd.min.js"></script>
    <script src="frontend/vendors/imagesloaded.pkgd.min.js"></script>
    <script src="frontend/vendors/fancybox/jquery.fancybox.min.js"></script>
    <script src="frontend/vendors/appear.min.js"></script>
    <script src="frontend/vendors/owl-carousel/owl.carousel.min.js"></script>
    <script src="frontend/vendors/mCustomScrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="frontend/vendors/arcticmodal/jquery.arcticmodal-0.3.min.js"></script>
    <!-- Theme JS-->
    <script src="frontend/js/apolo.core.js"></script>
    <script src="frontend/js/modules/apolo.newsletter.js"></script>
    <script src="frontend/js/modules/apolo.sameheight.js"></script>
    <script src="frontend/js/modules/apolo.appear.js"></script>
    <script src="frontend/js/modules/apolo.isotope.js"></script>
    <script src="frontend/js/apolo.init.js"></script>
  </body>
</html>