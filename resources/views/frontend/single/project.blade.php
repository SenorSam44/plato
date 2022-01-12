@extends('frontend.home_layout')

@section('content')
    <!-- =======================* Section Start *======================= -->
    <br><br><br>

    <!-- =======================* Section Start *===================== -->
      @foreach($single_project as $project)
      @endforeach
        <section class="works text-center section-padding">
            <div class="container project-details">
                <div class="row">
                    <div class="col-lg-12 section-title" >
                        <p>{{ $project->project_title }}</p>
                    </div>
                </div>
            </div>
            <div class="container project-details">
                <div class="row">
                    <div class="col-lg-12">
                        <p class="section-title">Project Information</p>
                    </div>
                </div>
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

        </section>
        <!-- =======================* Section End *======================= -->

@endsection


<style type="text/css">

  .works{
    background: white !important;
  }

  .section-title{
    color: black;
    font-size: 26px;
    display: block;
  }
  .section-title p{
    color: black;
    font-size: 26px;
    display: block;
    font-weight: 800;
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