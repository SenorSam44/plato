@extends('frontend.home_layout')

@section('content')
    <main>
        <div>
            <section>
                <div class='media-background'>
                    <video class="" playsinline autoplay="autoplay" muted="muted" loop="loop"
                           poster="https://www.normli.ca/wp-content/uploads/crown.jpg">
                        <source src="./uploaded_videos/banners/1.mp4" type="video/mp4">
                    </video>
                </div>
                <div class='media-background-heading container-fluid'>
                    <div class='row bottom-xs'>
                        <div class='col-xs-12'>
                            <h1 class='hero-h1'>Visual content for<br/>
                                Real Estate Development,<br/>
                                Architecture and Design</h1><!--  -->
{{--                            <button class='down-arrow-button'>↓</button>--}}
                        </div>
                    </div>
                </div>
            </section>


            <section class='all-offerings-section' id=''>
                <div class="back-video" style="top: 0; left: 0; width: 100%; height: 100%"></div>
                <div class='container-fluid' style="position:relative;">
                    <div class='row'>
                        <div class='col-xs-offset-0 col-xs-12 col-sm-offset-0 col-sm-6 col-lg-offset-6 col-lg-6'>
                            <div class='content-wrapper'>
                                <div id='all-offerings-pre-heading' class='pre-heading'>What we do</div>
                                <ul class='all-offerings-section-list'>

                                    @foreach($visualizations as  $visualization)
                                    <li>
                                        <a href='{{url('visualization', $visualization->id)}}'
                                           data-show='#exampleRenderings'>
                                            <h1 class='hero-h1'>{{$visualization->visualization_title}}</h1>
                                        </a>
                                    </li>
                                    @endforeach
                                    <!-- <li><a id='showRenderings' href='#' data-show='#exampleRenderings'><h1 class='hero-h1'>Renderings</h1></a></li>
                                    <li><a id='showAnimations' href='#' data-show='#exampleAnimations'><h1 class='hero-h1'>Animations</h1></a></li>
                                    <li><a id='showInteractive' href='#' data-show='#exampleInteractive'><h1 class='hero-h1'>Interactive</h1></a></li>
                                    <li><a id='showPhotography' href='#' data-show='#examplePhotography'><h1 class='hero-h1'>Photography</h1></a></li>
                                    <li><a id='showVideo' href='#' data-show='#exampleVideo'><h1 class='hero-h1'>Video</h1></a></li>
                                    <li><a id='showVirtualReality' href='#' data-show='#exampleVirtualReality'><h1 class='hero-h1'>Virtual Reality</h1></a></li> -->
                                </ul>
                                <p id='all-offerings-paragraph' class=''>We help communicate your ideas through a
                                    mixture of visual disciplines</p>                                    <a
                                    id='all-offerings-link' class='arrow-link' href='https://normli.ca/solutions/'>Learn
                                    more about our Solutions</a></div>
                        </div>
                    </div>
                </div>
{{--                <div class='media-background'>--}}

{{--                    <img class='media-item' id='exampleRenderings'--}}
{{--                         src='https://www.normli.ca/wp-content/uploads/1_NORM-LI_200911_V10_INT_Oculus_VF_01-1.jpg'/>--}}
{{--                    <video muted autoplay playsinline loop class='media-item' id='exampleAnimations' poster=''>--}}
{{--                        <source src='https://www.normli.ca/wp-content/uploads/animation.mp4'>--}}
{{--                    </video>--}}
{{--                    <video muted autoplay playsinline loop class='media-item' id='exampleInteractive' poster=''>--}}
{{--                        <source src='https://www.normli.ca/wp-content/uploads/interactive.mp4'>--}}
{{--                    </video>--}}
{{--                    <img class='media-item' id='examplePhotography'--}}
{{--                         src='https://www.normli.ca/wp-content/uploads/photography.jpg'/>--}}
{{--                    <video muted autoplay playsinline loop class='media-item' id='exampleVideo' poster=''>--}}
{{--                        <source src='https://www.normli.ca/wp-content/uploads/video.mp4'>--}}
{{--                    </video>--}}
{{--                    <!-- <img id='exampleRenderings' src='/images/renderings.jpg' />--}}
{{--                    <img id='exampleAnimations' src='/images/renderings.jpg' />--}}
{{--                    <img id='exampleInteractive' src='/images/renderings.jpg' />--}}
{{--                    <img id='examplePhotography' src='/images/renderings.jpg' />--}}
{{--                    <img id='exampleVideo' src='/images/renderings.jpg' />--}}
{{--                    <img id='exampleVirtualReality' src='/images/renderings.jpg' /> -->--}}
{{--                    <!-- <img id='exampleDefault' src='https://via.placeholder.com/1440x900' /> -->--}}
{{--                    <!-- <video>--}}
{{--                        <source></source>--}}
{{--                    </video> -->--}}
{{--                    <!-- <canvas></canvas> -->--}}
{{--                    <!-- <iframe></iframe> -->--}}
{{--                </div>--}}
            </section>
        </div>
    </main>

    @include('frontend.includes.footer')
    <style>

        .media-background{
            height: 100vh;
            width: 100vw;
        }

        .media-background video{
            position: absolute;
            object-fit: cover;
            height: 100%;
            width: 100vw;
        }

        .media-background-heading{
           position: absolute;
            top: 50%;
        }

        .all-offerings-section{
            position: relative;
            z-index: 10;
            background: black;
        }

        .all-offerings-section .container-fluid{
            background: black;
            height: 80vh;
        }

        .media-item{
            position: absolute;
            min-height: 100%;
            min-width: 100%;
            bottom: -50%;
            right: 0;
            z-index: -1;
        }
        .all-offerings-section .container-fluid .row{
            margin-top: 10vh;
        }

        .hero-h1{
            width: fit-content;
        }
        @media (max-width: 728px) {
            .media-background-heading.container-fluid{
                padding: 0;
            }

            .media-background-heading.container-fluid .row{
                margin-left: 0;
                margin-right: 0;
            }
            .hero-h1{
                font-size: 40px;
            }

            .media-background{
                position: relative;
            }
            .media-background video{
                position: absolute;
                width: auto;
                height: 100vh;
                overflow: hidden;
                left: -100%;
                z-index: -10;
            }

            .container-fluid{
                padding-left: 0;
                padding-right: 0;
            }

            .container-fluid .row{
                margin: 10vw;
            }
        }

        @media screen and (min-width: 767px){
            section.all-offerings-section .container-fluid .row .col-xs-12 ul.all-offerings-section-list li a:before {
                margin-left: -50px;
                margin-top: 12px;
                font-size: 48px;
                line-height: 1em;
            }
        }
        section.all-offerings-section .container-fluid .row .col-xs-12 ul.all-offerings-section-list li a:hover:before{
            content: '➔'
        }
        section.all-offerings-section .container-fluid .row .col-xs-12 ul.all-offerings-section-list li a:before {
            content: '';
            position: absolute;
            margin-left: -30px;
            margin-top: 10px;
            color: white;
            font-size: 40px;
            line-height: 1em;
            font-style: normal;
            transform: translateX(0px);
            animation: leftright 1s ease-out normal infinite;
        }
        .back-video{
            position: absolute;
        }
        .back-video video{
            position: absolute;
            overflow: hidden;
            width: 100vw;
            height: 80vh;
            object-fit: cover;
            visibility: hidden;
        }
    </style>

    <script src="https://code.createjs.com/1.0.0/preloadjs.min.js"></script>

    <script>
        let i = 0;
        let preload = new createjs.LoadQueue();

        redirectOnClick();
        loadImage();
        // playVideo();
        shwoBackgroundVideo();

        function loadImage() {
            preload.addEventListener("fileload", handleFileComplete);
            @foreach($visualizations as $visualization)
            preload.loadFile("{{$visualization->visualization_video}}");
            @endforeach
        }

        function handleFileComplete(event) {
            let ele = event.result;
            ele.autoplay = true;
            ele.muted = true;
            ele.loop = true;

            document.querySelector('.back-video').appendChild(ele);
            ele.play();
            i++;
        }

        function redirectOnClick() {
            document.querySelectorAll('.redirect-bg').forEach((ele) => {
                ele.addEventListener('click', () => {
                    window.location.href = ele.getAttribute('data-redirect-link');
                });
            })
        }

        // function playVideo() {
        //     window.setInterval(()=>{
        //         document.querySelector('.fp-section.active video').play();
        //     }, 1000);
        //
        // }
        function shwoBackgroundVideo(){
            document.querySelectorAll('.all-offerings-section-list h1').forEach((list_item, index)=> {
                list_item.addEventListener('mouseover', ()=> {
                    document.querySelector('.all-offerings-section .container-fluid').style.background= 'none'
                    // console.log(list_item.parentElement)
                    console.log(index)
                    let back_video = document.querySelectorAll('.back-video video')[index]
                    console.log(back_video)
                    back_video.style.visibility = "visible"
                    //
                })
                list_item.addEventListener('mouseleave', ()=> {
                    document.querySelector('.all-offerings-section .container-fluid').style.background= 'black';

                    let back_video = document.querySelectorAll('.back-video video')[index]
                    console.log(back_video)
                    back_video.style.visibility = "hidden"
                })

            })
        }

    </script>
@endsection

