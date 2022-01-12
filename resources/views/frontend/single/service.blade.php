@extends('frontend.home_layout')

@section('content')
 <!-- Inne Page Banner Area Start Here -->
        <section class="inner-page-banner bg-common inner-page-top-margin" data-bg-image="{{asset('frontend')}}/img/figure/figure2.jpg">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="breadcrumbs-area">
                            <h1>Services</h1>
                            <ul>
                                <li>
                                    <a href="/">Home</a>
                                </li>
                                <li>
                                    <a href="#">Services</a>
                                </li>
                                <li>Service Details</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Inne Page Banner Area End Here -->
        <!-- Single Department Start Here -->
        <section class="single-department-wrap-layout1 bg-light-primary100">
            <div class="container">
                <div class="row">
                    <div class="sidebar-widget-area sidebar-break-md col-xl-3 col-lg-4 col-12 no-equal-item">
                        <div class="widget widget-department-info">
                            <h3 class="section-title title-bar-primary">All Services</h3>
                            <ul class="nav nav-tabs tab-nav-list">

                            	@foreach($services as $d)
                                @endforeach
                                
                                <?php 

                                    $all_services = DB::table('services')
                                    ->where('publication_status',1)
                                    ->where('services.id','!=',$d->id)
                                    ->get();

	                            ?>
                                @foreach($services as $data1)
                                <li class="nav-item">
                                    <a class="active" href="#service{{$data1->id}}" data-toggle="tab" aria-expanded="false">{{$data1->service_name}}</a>
                                </li>
                                @endforeach

	                            @foreach($all_services as $data)
                                <li class="nav-item">
                                    <a href="#service{{$data->id}}" data-toggle="tab" aria-expanded="false">{{$data->service_name}}</a>
                                </li>
                                @endforeach

                                
                            </ul>
                        </div>
                    </div>
                    <div class="col-xl-9 col-lg-8 col-12 no-equal-item">
                        <div class="tab-content">
                            @foreach($services as $data1)
                            <div role="tabpanel" class="tab-pane fade active show" id="service{{$data1->id}}">
                                <div class="single-departments-box-layout1">
                                    <div class="single-departments-img">
                                        <img alt="singleS" src="{{asset(''.$data1->service_image)}}">
                                    </div>
                                    <div class="item-content">
                                        <div class="item-content-wrap">
                                            <h3 class="item-title title-bar-primary5">{{$data1->service_name}}</h3>
                                            <span class="sub-title">{{$data1->service_name}}.</span>
                                            <p>{{$data1->service_description}}</p>
                                            
                                            <ul class="department-info">
                                                <li>Keep Patients First Nulla lobortis.</li>
                                                <li>Keep Everyone Safe.</li>
                                                <li>Work Together Quisque pretium quam.</li>
                                                <li>Curabitur semper enim id accumsan.</li>
                                            </ul>
                                            <p>Quisque. Maecenas. Eros mus. Hymenaeos eros. Nisi mauris et adipisc
                                                iquam class bibendum non mattis fusceut perspiciatis undeuisque.
                                                Maecenas. Eros mus. Hymenaeos eros. Nisi mauris et adipiscing. Aliquam
                                                class
                                                bibendum mattis fusceut persecenas. Quisque. Maecenas. Eros mus.
                                                Hymenaeos eros. Nisi mauris et adipisc.Aliquam class bibendum mattis
                                                fusceut persecenas. Quisque. Maecenas. Eros mus. Hymenaeos eros. Nisi
                                                mauris et adipisc.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach


                            @foreach($all_services as $data)
                            <div role="tabpanel" class="tab-pane fade" id="service{{$data->id}}">
                                <div class="single-departments-box-layout1">
                                    <div class="single-departments-img">
                                        <img alt="single" src="{{asset(''.$data->service_image)}}">
                                    </div>
                                    <div class="item-content">
                                        <div class="item-content-wrap">
                                            <h3 class="item-title title-bar-primary5">{{$data->service_name}}</h3>
                                            <span class="sub-title">{{$data->service_name}}</span>
                                            <p>{{$data->service_description}}</p>
                                            
                                            <ul class="department-info">
                                                <li>Keep Patients First Nulla lobortis.</li>
                                                <li>Keep Everyone Safe.</li>
                                                <li>Work Together Quisque pretium quam.</li>
                                                <li>Curabitur semper enim id accumsan.</li>
                                            </ul>
                                            <p>Quisque. Maecenas. Eros mus. Hymenaeos eros. Nisi mauris et adipisc
                                                iquam class bibendum non mattis fusceut perspiciatis undeuisque.
                                                Maecenas. Eros mus. Hymenaeos eros. Nisi mauris et adipiscing. Aliquam
                                                class
                                                bibendum mattis fusceut persecenas. Quisque. Maecenas. Eros mus.
                                                Hymenaeos eros. Nisi mauris et adipisc.Aliquam class bibendum mattis
                                                fusceut persecenas. Quisque. Maecenas. Eros mus. Hymenaeos eros. Nisi
                                                mauris et adipisc.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>

                </div>
            </div>
        </section>
        <!-- Single Department End Here -->
        <style type="text/css">
            .template-main-menu a{
                color: black !important;
            }
        </style>
@endsection