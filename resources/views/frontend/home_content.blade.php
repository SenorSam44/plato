@extends('frontend.home_layout')

@section('content')
<!-- Page Content-->
<div class="apo-page">
  <ul class="apo-photo-stream-actions">
    <li>
      <!-- Like-->
      <button type="button" class="apo-hover-btn"><span class="apo-hover-btn-tooltip">220</span><i class="icon icon-heart"></i></button>
      <!-- End Like-->
    </li>
    <li>
      <!-- Info-->
      <button type="button" data-arctic-modal="modals/modal_photo_info.html" data-arctic-modal-type="ajax" data-photo-title="The Deer" data-photo-meta="A Photo by Christian Carter" data-photo-info="[{&quot;name&quot;: &quot;Made In&quot;, &quot;value&quot;: &quot;August 2015&quot;}, {&quot;name&quot;: &quot;Model&quot;, &quot;value&quot;: &quot;Canon EOS 6D&quot;}, {&quot;name&quot;: &quot;ISO&quot;, &quot;value&quot;: &quot;400&quot;}, {&quot;name&quot;: &quot;Focal Length&quot;, &quot;value&quot;: &quot;14mm&quot;}, {&quot;name&quot;: &quot;Category&quot;, &quot;value&quot;: &quot;Nature, Landscape&quot;}, {&quot;name&quot;: &quot;Aperture&quot;, &quot;value&quot;: &quot;f/4&quot;}, {&quot;name&quot;: &quot;Exposure Time&quot;, &quot;value&quot;: &quot;1/40&quot;}]" class="apo-hover-btn apo-photo-info-invoker"><i class="icon icon-menu-circle"></i></button>
      <!-- End Info-->
    </li>
  </ul>
  <div id="apo-full-page" class="apo-full-page-container apo-photo-stream">
    <?php $banners = DB::table('banners')
       ->where('publication_status',1)
          ->get();
    ?>
    @foreach($banners as $banner)
    <div data-bg-img-src="{{$banner->banner_image}}" class="fp-section"><img src="{{$banner->banner_image}}" alt="" data-photo-title="The Deer" data-photo-meta="Photo For Discovery Channel" data-photo-info="[{&quot;name&quot;: &quot;Made In&quot;, &quot;value&quot;: &quot;August 2015&quot;}, {&quot;name&quot;: &quot;Model&quot;, &quot;value&quot;: &quot;Canon EOS 6D&quot;}, {&quot;name&quot;: &quot;ISO&quot;, &quot;value&quot;: &quot;400&quot;}, {&quot;name&quot;: &quot;Focal Length&quot;, &quot;value&quot;: &quot;14mm&quot;}, {&quot;name&quot;: &quot;Category&quot;, &quot;value&quot;: &quot;Nature, Landscape&quot;}, {&quot;name&quot;: &quot;Aperture&quot;, &quot;value&quot;: &quot;f/4&quot;}, {&quot;name&quot;: &quot;Exposure Time&quot;, &quot;value&quot;: &quot;1/40&quot;}]" class="apo-photo-stream-hidden-img"/>
      <!-- Content Section-->
      <section class="apo-section apo-fp-layer">
        <h2 class="apo-section-title">{{$banner->banner_title}}</h2><em class="apo-photo-stream-category">{{$banner->banner_subtitle}}</em><small class="apo-photo-stream-date">{{$banner->banner_description}}</small>
      </section>
      <!-- End Content Section-->
      <div class="apo-scroll-down-icon"></div>
    </div>
    @endforeach
  </div>
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
              <li><a href="/">Main With Left White Header</a></li>
              <li><a href="home_striped.html">Striped Page With Top Transparent Header</a></li>
              <li><a href="home_slider_with_left_dark_header.html">Slider With Left Dark Header</a></li>
              <li><a href="home_slider_with_bottom_dark_header.html">Slider With Bottom Dark Header</a></li>
              <li class="apo-active"><a href="home_full_page_scroll_with_top_transparent_header.html">Full Page Scroll With Top Transparent Header</a></li>
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

<style type="text/css">
  .apo-full-page-container{
    margin-top: 0px;
  }
</style>

