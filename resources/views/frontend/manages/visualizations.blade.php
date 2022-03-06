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
                        </ul>
                        <p id='all-offerings-paragraph' class=''>We help communicate your ideas through a
                            mixture of visual disciplines</p>                                    <a
                            id='all-offerings-link' class='arrow-link' href='https://normli.ca/solutions/'>Learn
                            more about our Solutions</a></div>
                </div>
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
            width: 100%;
        }

        ul.all-offerings-section-list .hero-h1{
            padding-top: 1vh;
            padding-bottom: 1vh;
            padding-left: 50%;
        }

        .pre-heading, #all-offerings-paragraph, #all-offerings-link{
            margin-left: 50%;
            margin-top: 20px;
            margin-bottom: 20px;
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
            section.all-offerings-section ul.all-offerings-section-list li a:before {
                margin-left: -50px;
                margin-top: 12px;
                font-size: 48px;
                line-height: 1em;
            }
        }
        section.all-offerings-section ul.all-offerings-section-list li a:hover:before{
            content: '➔'
        }
        section.all-offerings-section ul.all-offerings-section-list li a:before {
            content: '';
            position: absolute;
            margin-left: calc( 44% - 50px);
            margin-top: 30px;
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
            height: 100%;
            margin-bottom: 2vh ;
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

