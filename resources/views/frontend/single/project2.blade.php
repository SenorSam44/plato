@extends('frontend.home_layout')

@section('content')
    <!-- =======================* Section Start *======================= -->
    <br><br><br>

    <!-- =======================* Section Start *===================== -->
    	@foreach($single_project as $project)
      @endforeach
        <section class="works text-center section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="section-title">{{ $project->project_title }}</h1>
                    </div>
                </div>
            </div>

            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <h3 class="section-title2">Project Information</h3>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
               <p class="section-subtitle"><b>Address <span>:</span> </b></p>
               <p class="section-paragraph">{{ $project->address }}</p>
            </div>

            <div class="container project-details">
                <div class="row">
                    <div class="col-lg-6">
                        <p class="section-subtitle"><b>Address <span>:</span> </b></p>
                        <p class="section-paragraph">{{ $project->address }}</p>
                    </div>
                    <div class="col-lg-6">
                        <p class="section-subtitle"><b>Land Area <span>:</span> </b></p>
                        <p class="section-paragraph">{{ $project->land_area }}</p>
                    </div>

                    <div class="col-lg-6">
                        <p class="section-subtitle"><b>Occuapation Type <span>:</span> </b></p>
                        <p class="section-paragraph">{{ $project->occupation_type }}</p>
                    </div>
                    <div class="col-lg-6">
                        <p class="section-subtitle"><b>Classification <span>:</span> </b></p>
                        <p class="section-paragraph">{{ $project->classification }}</p>
                    </div>

                    <div class="col-lg-6">
                        <p class="section-subtitle"><b>No. of Stories <span>:</span> </b></p>
                        <p class="section-paragraph">{{ $project->no_of_stories }}</p>
                    </div>
                    <div class="col-lg-6">
                        <p class="section-subtitle"><b>No. of Car Parking <span>:</span> </b></p>
                        <p class="section-paragraph">{{ $project->no_of_car_parking }}</p>
                    </div>

                    <div class="col-lg-6">
                        <p class="section-subtitle"><b>Apartment Size <span>:</span> </b></p>
                        <p class="section-paragraph">{{ $project->apartment_size }}</p>
                    </div>
                    <div class="col-lg-6">
                        <p class="section-subtitle"><b>No. of Apartment <span>:</span> </b></p>
                        <p class="section-paragraph">{{ $project->no_of_apartment }}</p>
                    </div>

                    <div class="col-lg-6">
                        <p class="section-subtitle"><b>No. of Lifts <span>:</span> </b></p>
                        <p class="section-paragraph">{{ $project->no_of_lifts }}</p>
                    </div>
                    <div class="col-lg-6">
                        <p class="section-subtitle"><b>No. of Stairs <span>:</span> </b></p>
                        <p class="section-paragraph">{{ $project->no_of_stairs }}</p>
                    </div>

                    <div class="col-lg-6">
                        <p class="section-subtitle"><b>No. of Generator <span>:</span> </b></p>
                        <p class="section-paragraph">{{ $project->no_of_generator }}</p>
                    </div>
                    <div class="col-lg-6">
                        <p class="section-subtitle"><b>Water Reservoir <span>:</span> </b></p>
                        <p class="section-paragraph">{{ $project->water_reserve }}</p>
                    </div>
                </div>
            </div>

            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <h3 class="section-title2">Project Image</h3>
                    </div>
                </div>
            </div>


            <div class="container-fluid">
                <div class="container">
                    <div class="row our-works">
                    	@if($project->project_image1)
                        <article data-bg-img-src="{{asset(''.$project->project_image1)}}" class="apo-striped-photo ">
                            <div class="apo-striped-photo-description">
                              <div class="apo-aligner-outer">
                                <div class="apo-aligner-inner">
                                  <ul class="apo-striped-photo-categories">
                                    <li><a>{{$project->category_name}}</a></li>
                                  </ul>
                                  <h2 class="apo-striped-photo-title">
                                    <a>{{$project->project_title}}</a>
                                  </h2>
                                  <div class="apo-striped-photo-meta">
                                    <small>Made in {{$project->created_at}}</small>
                                  </div>
                                </div>
                              </div>
                            </div>
                        </article><br>
                        @endif 
                        
                        @if($project->project_image2)
                        <article data-bg-img-src="{{asset(''.$project->project_image2)}}" class="apo-striped-photo ">
                            <div class="apo-striped-photo-description">
                              <div class="apo-aligner-outer">
                                <div class="apo-aligner-inner">
                                  <ul class="apo-striped-photo-categories">
                                    <li><a href="{{url('/projects/'.$project->id)}}">{{$project->category_name}}</a></li>
                                  </ul>
                                  <h2 class="apo-striped-photo-title">
                                    <a href="{{url('/projects/'.$project->id)}}">{{$project->project_title}}</a>
                                  </h2>
                                  <div class="apo-striped-photo-meta">
                                    <small>Made in {{$project->created_at}}</small>
                                  </div>
                                </div>
                              </div>
                            </div>
                        </article><br>
                        @endif

                        @if($project->project_image3)
                        <article data-bg-img-src="{{asset(''.$project->project_image3)}}" class="apo-striped-photo ">
                            <div class="apo-striped-photo-description">
                              <div class="apo-aligner-outer">
                                <div class="apo-aligner-inner">
                                  <ul class="apo-striped-photo-categories">
                                    <li><a href="{{url('/projects/'.$project->id)}}">{{$project->category_name}}</a></li>
                                  </ul>
                                  <h2 class="apo-striped-photo-title">
                                    <a href="{{url('/projects/'.$project->id)}}">{{$project->project_title}}</a>
                                  </h2>
                                  <div class="apo-striped-photo-meta">
                                    <small>Made in {{$project->created_at}}</small>
                                  </div>
                                </div>
                              </div>
                            </div>
                        </article><br>
                        @endif

                        @if($project->project_image4)
                        <article data-bg-img-src="{{asset(''.$project->project_image5)}}" class="apo-striped-photo ">
                            <div class="apo-striped-photo-description">
                              <div class="apo-aligner-outer">
                                <div class="apo-aligner-inner">
                                  <ul class="apo-striped-photo-categories">
                                    <li><a href="{{url('/projects/'.$project->id)}}">{{$project->category_name}}</a></li>
                                  </ul>
                                  <h2 class="apo-striped-photo-title">
                                    <a href="{{url('/projects/'.$project->id)}}">{{$project->project_title}}</a>
                                  </h2>
                                  <div class="apo-striped-photo-meta">
                                    <small>Made in {{$project->created_at}}</small>
                                  </div>
                                </div>
                              </div>
                            </div>
                        </article><br>
                        @endif

                        @if($project->project_image5)
                        <article data-bg-img-src="{{asset(''.$project->project_image5)}}" class="apo-striped-photo ">
                            <div class="apo-striped-photo-description">
                              <div class="apo-aligner-outer">
                                <div class="apo-aligner-inner">
                                  <ul class="apo-striped-photo-categories">
                                    <li><a href="{{url('/projects/'.$project->id)}}">{{$project->category_name}}</a></li>
                                  </ul>
                                  <h2 class="apo-striped-photo-title">
                                    <a href="{{url('/projects/'.$project->id)}}">{{$project->project_title}}</a>
                                  </h2>
                                  <div class="apo-striped-photo-meta">
                                    <small>Made in {{$project->created_at}}</small>
                                  </div>
                                </div>
                              </div>
                            </div>
                        </article><br>
                        @endif

                        @if($project->project_image7)
                        <article data-bg-img-src="{{asset(''.$project->project_image7)}}" class="apo-striped-photo ">
                            <div class="apo-striped-photo-description">
                              <div class="apo-aligner-outer">
                                <div class="apo-aligner-inner">
                                  <ul class="apo-striped-photo-categories">
                                    <li><a href="{{url('/projects/'.$project->id)}}">{{$project->category_name}}</a></li>
                                  </ul>
                                  <h2 class="apo-striped-photo-title">
                                    <a href="{{url('/projects/'.$project->id)}}">{{$project->project_title}}</a>
                                  </h2>
                                  <div class="apo-striped-photo-meta">
                                    <small>Made in {{$project->created_at}}</small>
                                  </div>
                                </div>
                              </div>
                            </div>
                        </article><br>
                        @endif

                        @if($project->project_image7)
                        <article data-bg-img-src="{{asset(''.$project->project_image7)}}" class="apo-striped-photo ">
                            <div class="apo-striped-photo-description">
                              <div class="apo-aligner-outer">
                                <div class="apo-aligner-inner">
                                  <ul class="apo-striped-photo-categories">
                                    <li><a href="{{url('/projects/'.$project->id)}}">{{$project->category_name}}</a></li>
                                  </ul>
                                  <h2 class="apo-striped-photo-title">
                                    <a href="{{url('/projects/'.$project->id)}}">{{$project->project_title}}</a>
                                  </h2>
                                  <div class="apo-striped-photo-meta">
                                    <small>Made in {{$project->created_at}}</small>
                                  </div>
                                </div>
                              </div>
                            </div>
                        </article><br>
                        @endif

                        @if($project->project_image8)
                        <article data-bg-img-src="{{asset(''.$project->project_image8)}}" class="apo-striped-photo ">
                            <div class="apo-striped-photo-description">
                              <div class="apo-aligner-outer">
                                <div class="apo-aligner-inner">
                                  <ul class="apo-striped-photo-categories">
                                    <li><a href="{{url('/projects/'.$project->id)}}">{{$project->category_name}}</a></li>
                                  </ul>
                                  <h2 class="apo-striped-photo-title">
                                    <a href="{{url('/projects/'.$project->id)}}">{{$project->project_title}}</a>
                                  </h2>
                                  <div class="apo-striped-photo-meta">
                                    <small>Made in {{$project->created_at}}</small>
                                  </div>
                                </div>
                              </div>
                            </div>
                        </article><br>
                        @endif

                        @if($project->project_image9)
                        <article data-bg-img-src="{{asset(''.$project->project_image9)}}" class="apo-striped-photo ">
                            <div class="apo-striped-photo-description">
                              <div class="apo-aligner-outer">
                                <div class="apo-aligner-inner">
                                  <ul class="apo-striped-photo-categories">
                                    <li><a href="{{url('/projects/'.$project->id)}}">{{$project->category_name}}</a></li>
                                  </ul>
                                  <h2 class="apo-striped-photo-title">
                                    <a href="{{url('/projects/'.$project->id)}}">{{$project->project_title}}</a>
                                  </h2>
                                  <div class="apo-striped-photo-meta">
                                    <small>Made in {{$project->created_at}}</small>
                                  </div>
                                </div>
                              </div>
                            </div>
                        </article><br>
                        @endif

                        @if($project->project_image10)
                        <article data-bg-img-src="{{asset(''.$project->project_image10)}}" class="apo-striped-photo ">
                            <div class="apo-striped-photo-description">
                              <div class="apo-aligner-outer">
                                <div class="apo-aligner-inner">
                                  <ul class="apo-striped-photo-categories">
                                    <li><a href="{{url('/projects/'.$project->id)}}">{{$project->category_name}}</a></li>
                                  </ul>
                                  <h2 class="apo-striped-photo-title">
                                    <a href="{{url('/projects/'.$project->id)}}">{{$project->project_title}}</a>
                                  </h2>
                                  <div class="apo-striped-photo-meta">
                                    <small>Made in {{$project->created_at}}</small>
                                  </div>
                                </div>
                              </div>
                            </div>
                        </article><br>
                        @endif

                        @if($project->project_image11)
                        <article data-bg-img-src="{{asset(''.$project->project_image11)}}" class="apo-striped-photo ">
                            <div class="apo-striped-photo-description">
                              <div class="apo-aligner-outer">
                                <div class="apo-aligner-inner">
                                  <ul class="apo-striped-photo-categories">
                                    <li><a href="{{url('/projects/'.$project->id)}}">{{$project->category_name}}</a></li>
                                  </ul>
                                  <h2 class="apo-striped-photo-title">
                                    <a href="{{url('/projects/'.$project->id)}}">{{$project->project_title}}</a>
                                  </h2>
                                  <div class="apo-striped-photo-meta">
                                    <small>Made in {{$project->created_at}}</small>
                                  </div>
                                </div>
                              </div>
                            </div>
                        </article><br>
                        @endif


                        @if($project->project_image12)
                        <article data-bg-img-src="{{asset(''.$project->project_image12)}}" class="apo-striped-photo ">
                            <div class="apo-striped-photo-description">
                              <div class="apo-aligner-outer">
                                <div class="apo-aligner-inner">
                                  <ul class="apo-striped-photo-categories">
                                    <li><a href="{{url('/projects/'.$project->id)}}">{{$project->category_name}}</a></li>
                                  </ul>
                                  <h2 class="apo-striped-photo-title">
                                    <a href="{{url('/projects/'.$project->id)}}">{{$project->project_title}}</a>
                                  </h2>
                                  <div class="apo-striped-photo-meta">
                                    <small>Made in {{$project->created_at}}</small>
                                  </div>
                                </div>
                              </div>
                            </div>
                        </article><br>
                        @endif

                        @if($project->project_image1)
                        <article data-bg-img-src="{{asset(''.$project->project_image1)}}" class="apo-striped-photo ">
                            <div class="apo-striped-photo-description">
                              <div class="apo-aligner-outer">
                                <div class="apo-aligner-inner">
                                  <ul class="apo-striped-photo-categories">
                                    <li><a href="{{url('/projects/'.$project->id)}}">{{$project->category_name}}</a></li>
                                  </ul>
                                  <h2 class="apo-striped-photo-title">
                                    <a href="{{url('/projects/'.$project->id)}}">{{$project->project_title}}</a>
                                  </h2>
                                  <div class="apo-striped-photo-meta">
                                    <small>Made in {{$project->created_at}}</small>
                                  </div>
                                </div>
                              </div>
                            </div>
                        </article><br>
                        @endif


                    </div> <!-- row our-works End-->
                </div>
            </div>

        </section>
        <!-- =======================* Section End *======================= -->

           
              

@endsection


<style type="text/css">

  .works{
    background: white !important;
  }

    .project-details{
        padding-top: 30px;
        padding-bottom: 30px;
    }

    .project-details h3{
        padding-top: 0px;
        padding-bottom: 0px;
        padding-right: 15px; 
    }

    .project-details p{
        padding-top: 0px;
        padding-bottom: 0px;
        margin: 0; 
    }

    .section-title{
        font-size: 22px;
        border: red 0px solid;
        width: 100%;
    }

    

    .section-title2{
        font-size: 18px;
        border: red 0px solid;
        float: left;
        padding-top: 20px;
        padding-bottom: 20px;
    }

    .section-subtitle{
        min-height: 50px;
        font-size: 14px;
        border: red 0px solid;
        float: left;
        margin: 0;
        padding-right: 30px;
        width: 30%;
        text-align: left;
    } .section-subtitle span{float: right;}
    .section-paragraph{
        text-align: left;
        padding-top: 0; 
        font-size: 14px;
        border: red 0px solid;
        padding-bottom: 10px; 
        margin: 0;
        width: 70%;
        float: left;
    }.section-paragraph p{
        padding-top: 0; 
        padding-left: 20px; 

    }

    @media (max-width: 767.98px) {
        .section-subtitle {width: 50%;}
        .section-paragraph{width: 50%;}

    }


    .zoom-icon{
        height: 50px;
        width: 50px;
    }


</style>