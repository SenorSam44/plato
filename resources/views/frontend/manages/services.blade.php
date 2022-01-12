@extends('frontend.home_layout')

@section('content')
    
<!-- Page Content-->
      <div class="apo-page">
        <!-- Full Page Carousel-->
        <div class="apo-striped-photos apo-full-height owl-carousel" style="max-height: 100vh !important;">
          <?php $services = DB::table('services')
             ->where('publication_status',1)
                ->get();
          ?>
          @foreach($services as $service)
          <article data-bg-img-src="{{asset(''.$service->service_image)}}" class="apo-striped-photo ">
            <div class="apo-striped-photo-description">
              <div class="apo-aligner-outer">
                <div class="apo-aligner-inner">
                  <ul class="apo-striped-photo-categories">
                    <li><a href="#">Landscape</a></li>
                  </ul>
                  <h2 class="apo-striped-photo-title">
                    <a href="#">Before The Storm</a>
                  </h2>
                  <div class="apo-striped-photo-meta">
                    <small>Made in 2016</small>
                  </div>
                </div>
              </div>
            </div>
          </article>
          @endforeach
          <article data-bg-img-src="uploaded_images/banners/2.jpg" class="apo-striped-photo ">
            <div class="apo-striped-photo-description">
              <div class="apo-aligner-outer">
                <div class="apo-aligner-inner">
                  <ul class="apo-striped-photo-categories">
                    <li><a href="#">Animal</a></li>
                  </ul>
                  <h2 class="apo-striped-photo-title"><a href="#">Hidden Cow</a></h2>
                  <div class="apo-striped-photo-meta"><small>Made in 2016</small>
                  </div>
                </div>
              </div>
            </div>
          </article>
          <article data-bg-img-src="uploaded_images/banners/3.jpg" class="apo-striped-photo ">
            <div class="apo-striped-photo-description">
              <div class="apo-aligner-outer">
                <div class="apo-aligner-inner">
                  <ul class="apo-striped-photo-categories">
                    <li><a href="#">FlyCam</a></li>
                  </ul>
                  <h2 class="apo-striped-photo-title"><a href="#">The Wild Parachute</a></h2>
                  <div class="apo-striped-photo-meta"><small>Made in 2016</small>
                  </div>
                </div>
              </div>
            </div>
          </article>
          <article data-bg-img-src="uploaded_images/banners/4.jpg" class="apo-striped-photo ">
            <div class="apo-striped-photo-description">
              <div class="apo-aligner-outer">
                <div class="apo-aligner-inner">
                  <ul class="apo-striped-photo-categories">
                    <li><a href="#">Travel</a></li>
                  </ul>
                  <h2 class="apo-striped-photo-title"><a href="#">The Journey Of Life</a></h2>
                  <div class="apo-striped-photo-meta"><small>Made in 2016</small>
                  </div>
                </div>
              </div>
            </div>
          </article>
          <article data-bg-img-src="uploaded_images/banners/5.jpg" class="apo-striped-photo ">
            <div class="apo-striped-photo-description">
              <div class="apo-aligner-outer">
                <div class="apo-aligner-inner">
                  <ul class="apo-striped-photo-categories">
                    <li><a href="#">Nature</a></li>
                  </ul>
                  <h2 class="apo-striped-photo-title"><a href="#">Wooden Flower</a></h2>
                  <div class="apo-striped-photo-meta"><small>Made in 2016</small>
                  </div>
                </div>
              </div>
            </div>
          </article>
          <article data-bg-img-src="frontend/images/img-165.jpg" class="apo-striped-photo ">
            <div class="apo-striped-photo-description">
              <div class="apo-aligner-outer">
                <div class="apo-aligner-inner">
                  <ul class="apo-striped-photo-categories">
                    <li><a href="#">Landscape</a></li>
                  </ul>
                  <h2 class="apo-striped-photo-title"><a href="#">Before The Storm</a></h2>
                  <div class="apo-striped-photo-meta"><small>Made in 2016</small>
                  </div>
                </div>
              </div>
            </div>
          </article>
          <article data-bg-img-src="frontend/images/img-166.jpg" class="apo-striped-photo ">
            <div class="apo-striped-photo-description">
              <div class="apo-aligner-outer">
                <div class="apo-aligner-inner">
                  <ul class="apo-striped-photo-categories">
                    <li><a href="#">Animal</a></li>
                  </ul>
                  <h2 class="apo-striped-photo-title"><a href="#">Hidden Cow</a></h2>
                  <div class="apo-striped-photo-meta"><small>Made in 2016</small>
                  </div>
                </div>
              </div>
            </div>
          </article>
          <article data-bg-img-src="frontend/images/img-167.jpg" class="apo-striped-photo ">
            <div class="apo-striped-photo-description">
              <div class="apo-aligner-outer">
                <div class="apo-aligner-inner">
                  <ul class="apo-striped-photo-categories">
                    <li><a href="#">FlyCam</a></li>
                  </ul>
                  <h2 class="apo-striped-photo-title"><a href="#">The Wild Parachute</a></h2>
                  <div class="apo-striped-photo-meta"><small>Made in 2016</small>
                  </div>
                </div>
              </div>
            </div>
          </article>
          <article data-bg-img-src="frontend/images/img-168.jpg" class="apo-striped-photo ">
            <div class="apo-striped-photo-description">
              <div class="apo-aligner-outer">
                <div class="apo-aligner-inner">
                  <ul class="apo-striped-photo-categories">
                    <li><a href="#">Travel</a></li>
                  </ul>
                  <h2 class="apo-striped-photo-title"><a href="#">The Journey Of Life</a></h2>
                  <div class="apo-striped-photo-meta"><small>Made in 2016</small>
                  </div>
                </div>
              </div>
            </div>
          </article>
          <article data-bg-img-src="frontend/images/img-169.jpg" class="apo-striped-photo ">
            <div class="apo-striped-photo-description">
              <div class="apo-aligner-outer">
                <div class="apo-aligner-inner">
                  <ul class="apo-striped-photo-categories">
                    <li><a href="#">Nature</a></li>
                  </ul>
                  <h2 class="apo-striped-photo-title"><a href="#">Wooden Flower</a></h2>
                  <div class="apo-striped-photo-meta"><small>Made in 2016</small>
                  </div>
                </div>
              </div>
            </div>
          </article>
        </div>
        <!-- End of Full Page Carousel-->
      </div>
      <!-- End Page Content-->

      <!-- Footer-->
      <!-- End Footer-->

      <!-- Modal Window-->
      <div class="apo-d-none">
        <div id="modal-nav" class="apo-modal apo-modal-fullscreen-nav">
          <div class="container">
            <div class="apo-section">
              <div class="apo-grid apo-cols-4">
                <section class="apo-grid-col">
                  <h5 class="apo-fullscreen-nav-title">Home</h5>
                  <ul class="apo-fullscreen-nav-pages">
                    <li><a href="index.html">Main With Left White Header</a></li>
                    <li class="apo-active"><a href="home_striped.html">Striped Page With Top Transparent Header</a></li>
                    <li><a href="home_slider_with_left_dark_header.html">Slider With Left Dark Header</a></li>
                    <li><a href="home_slider_with_bottom_dark_header.html">Slider With Bottom Dark Header</a></li>
                    <li><a href="home_full_page_scroll_with_top_transparent_header.html">Full Page Scroll With Top Transparent Header</a></li>
                    <li><a href="home_personal.html">Personal With Left White Header</a></li>
                    <li><a href="portfolio_grid_with_top_white_header.html">Grid Portfolio With Top White Header</a></li>
                    <li><a href="portfolio_masonry_with_top_dark_header.html">Masonry Portfolio With Top Dark Header</a></li>
                  </ul>
                </section>
                <section class="apo-grid-col">
                  <h5 class="apo-fullscreen-nav-title">Pages</h5>
                  <ul class="apo-fullscreen-nav-pages">
                    <li><a href="pages_about_us.html">About Us</a></li>
                    <li><a href="pages_about_me.html">About Me</a></li>
                    <li><a href="pages_contact.html">Contact</a></li>
                    <li><a href="extra_elements.html">Elements</a></li>
                    <li><a href="typography.html">Typography</a></li>
                    <li><a href="RTL/index.html">RTL Version</a></li>
                  </ul>
                </section>
                <section class="apo-grid-col">
                  <h5 class="apo-fullscreen-nav-title">Portfolio</h5>
                  <ul class="apo-fullscreen-nav-pages">
                    <li><a href="portfolio_masonry_fit_width_4_columns.html">Masonry Fit Width 4 Columns</a></li>
                    <li><a href="portfolio_masonry_fit_width_3_columns.html">Masonry Fit Width 3 Columns</a></li>
                    <li><a href="portfolio_classic_sortable_4_columns.html">Classic Sortable 4 Columns</a></li>
                    <li><a href="portfolio_single_post.html">Single Portfolio Post</a></li>
                  </ul>
                </section>
                <section class="apo-grid-col">
                  <h5 class="apo-fullscreen-nav-title">Blog</h5>
                  <ul class="apo-fullscreen-nav-pages">
                    <li><a href="blog_classic_sortable_3_columns.html">Classic Sortable 3 Columns</a></li>
                    <li><a href="blog_classic_2_columns_with_sidebar.html">Classic 2 Columns With Sidebar</a></li>
                    <li><a href="blog_grid_2_columns.html">Grid 2 Columns</a></li>
                    <li><a href="blog_element_sizing_4_columns.html">Element Sizing 4 Columns</a></li>
                    <li><a href="blog_fit_width_4_columns.html">Fit Width 4 Columns</a></li>
                    <li><a href="blog_single_post.html">Single Blog Post</a></li>
                    <li><a href="blog_single_post_with_sidebar.html">Single Blog Post With Sidebar</a></li>
                  </ul>
                </section>
              </div>

              <form class="apo-oneline-form">
                      <input type="search" name="s" placeholder="Search this website"/>
                      <button type="submit"><i class="icon icon-magnifier"></i></button>
                    </form>
            </div>
          </div>
            <div class="arctic-modal-close-container"><button type="button" class="apo-close-btn arcticmodal-close"><i class="icon icon-cross"></i> Close</button></div>
        </div>
      </div>
      <!-- End Modal Window--> 
@endsection

