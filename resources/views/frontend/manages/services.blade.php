@extends('frontend.home_layout')

@section('content')

    <style type="text/css">
        .max-lines {
            display: block;
            text-overflow: ellipsis;
            word-wrap: break-word;
            overflow: hidden;
            max-height: 6.0em;
            line-height: 2.0em;
        }

        .service-card .img-block {
            width: 120px !important;
            height: 120px !important;
        }

        .service-card .img-block img {
            width: 120px !important;
            height: 120px !important;
            padding: 10px !important;
        }
        .section-title:before{
            background-color: white;
        }
    </style>

    <link rel="stylesheet" href="https://amityapartment.com.bd/frontend/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://amityapartment.com.bd/frontend/assets/css/style.min.css">

    <!--Dynamic part start here -->
    <!-- =======================* Section Start *======================= -->
    <section class="pagehead bg-1">
        <div class="container">
            <nav aria-label="breadcrumb" class="pagehead-breadcrumb">
                <ol class="breadcrumb justify-content-center">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Services</li>
                </ol>
            </nav>
        </div>
    </section>
    <!-- =======================* Section End *======================= -->
    <!-- =======================* Section Start *===================== -->
    <section class="services section-padding">
        <div class="container">
            <h1 class="section-title">Our Services</h1>
            <div class="row">
                @foreach($services as $service)
                    <div class="col-lg-4 mb-4 wow fadeInUp" data-wow-delay="200ms">
                        <div class="service-card">
                            <div class="img-block with-animation">
                                <img src="{{$service->image}}" alt="Architecture">
                            </div>
                            <h4 class="service-title">{{$service->name}}</h4>
                            <p class="max-lines">{{$service->description}}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section> <!-- services End -->
    <!-- =======================* Section End *======================= -->

    <!-- =======================* Section Start *===================== -->
    <section class="clients section-padding">
        <div class="container">
            <div id="clients" class="owl-carousel owl-theme">
                @foreach($services as $srevice)
                    <div class="item">
                        <img src="./frontend/assets/img/{{$service->image}}" alt="Clients"
                             class="img-fluid border saturate-animate">
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- =======================* Section End *======================= -->


    <!--Dynamic part ends here -->


    <!-- Footer Area Start Here -->
    <!-- @ include('frontend.includes.footer-small') -->
    <!-- Footer Area End Here -->

    <a href="#" id="goTop" class="btn btn-primary btn-sm">↑</a>

    <!-- Add javaScript files here-->
    <script src="https://amityapartment.com.bd/frontend/assets/js/core.min.js"></script>
    <script src="https://amityapartment.com.bd/frontend/assets/js/script.js"></script>

    <style type="text/css">

        .loading-logo {
            height: 300px !important;
            width: 400px !important;
        }
    </style>

@endsection
