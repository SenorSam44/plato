@extends('frontend.home_layout')

@section('content')
 <!-- Inne Page Banner Area Start Here -->
        <section class="inner-page-banner bg-common inner-page-top-margin" data-bg-image="{{asset('frontend')}}/img/figure/figure2.jpg">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="breadcrumbs-area">
                            <h1>Department</h1>
                            <ul>
                                <li>
                                    <a href="/">Home</a>
                                </li>
                                <li>
                                    <a href="#">Department</a>
                                </li>
                                <li>Department Details</li>
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
                            <h3 class="section-title title-bar-primary">All Departments</h3>
                            <ul class="nav nav-tabs tab-nav-list">

                                @foreach($departments as $d)
                                @endforeach

                                <?php 
                                    $departs = DB::table('departments')
                                    ->where('publication_status',1)
                                    ->where('departments.id','!=',$d->id)
                                    ->get();

	                            ?>
                                @foreach($departments as $data1)
                                <li class="nav-item">
                                    <a class="active" href="#department{{$data1->id}}" data-toggle="tab" aria-expanded="false">{{$data1->department_name}}</a>
                                </li>
                                @endforeach

	                            @foreach($departs as $data)
                                <li class="nav-item">
                                    <a href="#department{{$data->id}}" data-toggle="tab" aria-expanded="false">{{$data->department_name}}</a>
                                </li>
                                @endforeach

                                
                            </ul>
                        </div>
                    </div>
                    <div class="col-xl-9 col-lg-8 col-12 no-equal-item">
                        <div class="tab-content">
                            @foreach($departments as $data1)
                            <div role="tabpanel" class="tab-pane fade active show" id="department{{$data1->id}}">
                                <div class="single-departments-box-layout1">
                                    <div class="single-departments-img">
                                        <img src="{{asset(''.$data1->department_image)}}" alt="department" class="img-fluid">
                                    </div>
                                    <div class="item-content">
                                        <div class="item-content-wrap">
                                            <h3 class="item-title title-bar-primary5">{{$data1->department_name}}</h3>
                                            <span class="sub-title">{{$data1->department_name}}.</span>
                                            <p>{{$data1->department_description}}</p>
                                            
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


                            @foreach($departs as $data)
                            <div role="tabpanel" class="tab-pane fade" id="department{{$data->id}}">
                                <div class="single-departments-box-layout1">
                                    <div class="single-departments-img">
                                        <img alt="single" src="{{asset(''.$data->department_image)}}">
                                    </div>
                                    <div class="item-content">
                                        <div class="item-content-wrap">
                                            <h3 class="item-title title-bar-primary5">{{$data->department_name}}</h3>
                                            <span class="sub-title">{{$data->department_name}}</span>
                                            <p>{{$data->department_description}}</p>
                                            
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