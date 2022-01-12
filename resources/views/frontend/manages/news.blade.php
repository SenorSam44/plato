@extends('frontend.home_layout')

@section('content')
    <!-- Page Content-->
    <div class="apo-page">
      <div class="container">
        <div class="apo-section">
          <!-- Isotope-->
          <div data-isotope-layout="grid" class="apo-isotope apo-cols-2 apo-entries-container apo-style-4 apo-same-height-container">
            <div class="grid-sizer"></div>
            @foreach($news as $data)
            <div class="apo-item apo-motivation">
              <!-- Article-->
              <article class="apo-entry">
                <div data-bg-img-src="{{$data->news_image}}" class="apo-entry-media"></div>
                <div class="apo-entry-content-wrap">
                  <div class="apo-aligner-outer">
                    <div class="apo-aligner-inner apo-same-height">
                      <header class="apo-entry-header">
                        <ul class="apo-entry-categories">
                          <li><a href="#">{{$data->category_name}}</a></li>
                        </ul>
                        <h2 class="apo-entry-title"><a href="{{url('/news/'.$data->id)}}">{{$data->news_title}}</a></h2>
                      </header>
                      <footer class="apo-entry-footer">
                        <time datetime="{{$data->news_title}}" class="apo-entry-publish-date">{{$data->created_at}}</time>
                      </footer>
                    </div>
                  </div>
                </div>
              </article>
              <!-- End Article-->
            </div>
            @endforeach
          </div>
          <!-- End Isotope-->
        </div>

      </div>
            <center>{{ $news->render() }}  </center>
    </div>
    <!-- End Page Content-->


    <!-- Footer-->
    <footer id="footer" data-bg-img-src="{{asset('frontend')}}/images/footer_bg.png" class="apo-footer">
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

@endsection

<style type="text/css">

  .apo-header{
    background-color: #000;
  }

  .apo-page{
    margin-top: 80px;
    background-color: white;
  }

  .apo-entry-title a{
    color: black;
  }

  .apo-entry-title a: hover{
    color: white;
  }

  .pagination{
    background-color: black;

  }


  .pagination ul{
    display: block;
    border: red 1px solid !important;
  }

  .pagination ul li{
    margin: 0 auto;
    border: red 1px solid !important;
  }

  .pagination ul li a{
    border: red 1px solid !important;
  }








</style>
