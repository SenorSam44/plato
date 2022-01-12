@extends('frontend.home_layout')

@section('content')
    <!-- Inne Page Banner Area Start Here -->
        <section class="pagehead bg-1">
            <div class="container">
                <nav aria-label="breadcrumb" class="pagehead-breadcrumb">
                    <ol class="breadcrumb justify-content-center">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">News</li>
                    </ol>
                </nav>
            </div>
        </section>
        <!-- Inne Page Banner Area End Here -->

<!-- Blog Grid Area Start Here -->
        <section class="blog-wrap-layout2 bg-light-primary100">
            <div class="container news-start">
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-12">
                        <div class="row">
                            @foreach($news as $data)
                            <div class="single-item col-md-4 col-sm-12 col-12">
                                <div class="blog-box-layout4">
                                    <div class="item-img">
                                        <a href="{{url('/news/'.$data->id)}}">
                                            <img src="{{$data->news_image}}" class="img-fluid" alt="blog">
                                        </a>
                                        <div class="post-date">
                                            @if($data->created_at){{
                                                Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $data->created_at)->format('d')}}<span>{{Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $data->created_at)->format('F')}}</span>
                                            @else
                                                20<span>June</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="item-content">
                                        <h3 class="item-title">
                                            <a href="{{url('/news/'.$data->id)}}">{{$data->news_title}}</a>
                                        </h3>
                                        <p class="line-of-3-texts">{{$data->news_description}}.
                                        </p>
                                        <div class="post-actions-wrapper">
                                            <ul>
                                                <li>
                                                    <a href="#">
                                                        <i class="flaticon-people"></i>by
                                                        <span>admin</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="{{$data->news_url}}">
                                                        <i class="flaticon-interface"></i>News URL</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>

                         <div class="pagination">
                            <center>{{ $news->render() }}  </center>
                        </div>

                    </div>
                    
                </div>
            </div>
        </section>
        <!-- Blog Grid Area End Here -->

@endsection


<style type="text/css">
    .line-of-3-texts {
       overflow: hidden !important;
       text-overflow: ellipsis !important;
       display: -webkit-box;
       -webkit-line-clamp: 2; /* number of lines to show */
       -webkit-box-orient: vertical;
    }


    .template-main-menu a{
        color: black !important;
    }

    .pagination {
        float: right;
    }

    .news-start{
        margin-top: -50px;
    }

    .item-img img{
        height: 250px;
    }

    .post-date{
        background-color: #f5b316 !important;
    }





        
</style>







============================



<section class="blog-detail-wrap bg-light-primary100 news-start">
        <div class="container">
            @foreach($news as $data)
            @endforeach
            <div class="row">
                <div class="col-xl-9 col-lg-8 col-12">
                    <div class="blog-detail-box">
                        <div class="blog-detail-title">
                            <div class="item-img">
                                <img src="{{asset(''.$data->news_image)}}" class="img-fluid" alt="blog">
                                <div class="post-date">
                                @if($data->created_at){{ Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $data->created_at)->format('d')}}<span>{{Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $data->created_at)->format('F')}}</span>
                                @else
                                    20<span>June</span>
                                @endif
                                </div>
                            </div>
                            <div class="item-content">
                                <h2 class="item-title">
                                    {{$data->news_title}}
                                </h2>
                                <div class="post-actions-wrapper">
                                    <ul>
                                        <li>
                                            <a href="#"><i class="flaticon-people"></i>by <span>{{$data->news_url}}</span></a>
                                        </li>
                                        <li>
                                            <a href="#"><i class="flaticon-tag"></i>from <span>{{$data->news_url}}</span></a>
                                        </li>
                                        <li>
                                            <a href="#"><i class="flaticon-interface"></i>15</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="blog-content">
                            <p> 
                                <?php 
                                    $description=$data->news_description;
                                    $description = preg_replace ("/\r\n|\r|\n/",'<br/>',$description);
                                    echo $description; 
                                ?>  
                            </p>
                        </div>
                        <div class="blog-social">
                            <h3>Share This Post:</h3>
                            <ul>
                                <li class="facebook">
                                    <a href="#"><i class="fab fa-facebook-square"></i>facebook</a>
                                </li>
                                <li class="twitter">
                                    <a href="#"><i class="fab fa-twitter-square"></i>twitter</a>
                                </li>
                                <li class="google">
                                    <a href="#"><i class="fab fa-google-plus-square"></i>google plus</a>
                                </li>
                            </ul>
                        </div>
                        
                    </div>
                </div>
                <div class="sidebar-widget-area sidebar-break-md col-xl-3 col-lg-4 col-12">
                    <div class="widget widget-recent">
                            <h3 class="section-title title-bar-primary">Related Posts</h3>
                            <?php $random_news = DB::table('news')
                                    ->where('publication_status',1)
                                    ->inRandomOrder()
                                    ->limit(10)
                                    ->get();
                            ?>
                            @foreach($random_news as $data)
                            <div class="media">
                                <a href="{{url('/news/'.$data->id)}}">
                                    <img src="{{asset(''.$data->news_image)}}" alt="news" class="img-fluid">
                                </a>
                                <div class="media-body space-sm">
                                    <div class="post-date-short">
                                        @if($data->created_at){{
                                            Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $data->created_at)->format('d')}}<span>{{Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $data->created_at)->format(' F, Y')}}</span>
                                        @else
                                            20<span>June, 2018</span>
                                        @endif
                                    </div>
                                    <h4 class="post-title">
                                        <a href="{{url('/news/'.$data->id)}}">Achieving Better Health Cancer treatment for Achieving Better Health Achieving Better Health .</a>
                                    </h4>
                                </div>
                            </div>
                            @endforeach
                        </div>
                </div>
            </div>
        </div>
    </section>
    <!-- All Doctors End Here -->

    <style type="text/css">
        .template-main-menu a{
                color: black !important;
        }

        .blog-detail-wrap{
            margin: 0;
            padding: 20px;
        }


        .media{

        }
        .media img{
           width: 120px; 
           height: 89px;
           padding-bottom: 20px;
           padding-right: 5px;
        }

        .post-title {
           overflow: hidden !important;
           text-overflow: ellipsis !important;
           display: -webkit-box;
           -webkit-line-clamp: 2; /* number of lines to show */
           -webkit-box-orient: vertical;
           font-size: 15px;
        }

        .post-date{
            background-color: #f5b316 !important;
        }



    </style>

                         
    
