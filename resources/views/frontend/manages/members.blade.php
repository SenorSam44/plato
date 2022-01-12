@extends('frontend.home_layout')

@section('content')
<!-- Inne Page Banner Area Start Here -->
        <section class="inner-page-banner bg-common inner-page-top-margin" data-bg-image="frontend/img/figure/figure2.jpg">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="breadcrumbs-area">
                            <h1>All Members</h1>
                            <ul>
                                <li>
                                    <a href="/">Home</a>
                                </li>
                                <li>Members</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Inne Page Banner Area End Here -->
        <!-- All Doctors Start Here -->
        <section class="team-wrap-layout3 bg-light-accent100">
            <div class="container">
                
                <div class="row">
                	@foreach($doctors as $data)
                    <div class="col-lg-6 col-md-6">
                        <div class="team-box-layout1">
                            <div class="media media-none-lg media-none-md media-none--xs">
                                <div class="item-img">
                                    <img src="{{$data->doctor_image}}" alt="Team1" class="img-fluid rounded-circle media-img-auto" style="height: 170px; width: 170px">
                                </div>
                                <div class="media-body">
                                    <div class="item-content">
                                        <h4 class="item-title">
                                            <a href="{{url('/doctors/'.$data->id)}}">{{$data->doctor_name}}</a>
                                        </h4>
                                        <p class="designation">{{$data->doctor_designation}}</p>
                                        <div class="item-degree">BDS, FCPS (Hons), PhD (Japan)</div>
                                        <ul class="item-btns">
                                            <li>
                                                <a href="{{url('/doctors/'.$data->id)}}" class="item-btn btn-ghost">View Profile</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                
                <div class="pagination">
			        <center>{{ $doctors->render() }}  </center>
			    </div>

            </div>


        </section>
        <!-- All Doctors End Here -->

        <style type="text/css">
		    .template-main-menu a{
		        color: black !important;
		    }

            .pagination {
                float: right;
            }
		    
		    
		</style>

@endsection