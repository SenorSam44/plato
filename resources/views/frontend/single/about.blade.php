@extends('frontend.home_layout')

@section('content')
    <!-- Page Content-->
    <div class="apo-page">
      <!-- Content Section-->
      <div data-bg-img-src="frontend/images/page-bg-img-2.png" class="apo-section apo-huge apo-section-lightly">
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-7"><img src="frontend/images/img-75.jpg" alt=""/></div>
            <div class="col-lg-3 col-lg-offset-0-5 col-md-10 col-md-offset-1">
              <h2>Creative Studio</h2>
              <h4 class="apo-section-sub-title">We are Apolo, an innovative studio that love creating design, art and photography products. </h4>
              <hr class="apo-divider-small apo-divider-large-offset"/>
              <div class="apo-services">
                <div class="apo-service">
                  <p> <strong>Art Direction: </strong>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                </div>
                <div class="apo-service">
                  <p> <strong>Digital Retouching: </strong>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                </div>
                <div class="apo-service">
                  <p> <strong>Photography: </strong>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- End Content Section-->
      <!-- Content Section-->
      <div class="apo-section">
        <div class="container"><img src="frontend/images/img-76.jpg" alt="" class="aligncenter"/>
          <div class="row"> 
            <div class="col-md-4 col-md-offset-1 col-sm-6">
              <h4 class="apo-section-sub-title">We combine years of retouching know-how with the latest technologies to get the best.</h4>
              <p>We’re dedicated to meeting your requirements and working alongside you to engineer the finest end product. We actively seek the very best people for each element of each job.s</p>
            </div>
            <div class="col-md-4 col-md-offset-2 col-sm-6">
              <p>Our experience is built on a solid understanding of traditional photographic and darkroom techniques, together with the latest digital technology. Our meticulous attention to detail and expertise in colour allow us to achieve exceptional results and we back this up with the friendliest, most attentive service around.</p>
            </div>
          </div>
        </div>
      </div>
      <!-- End Content Section-->
      <!-- Content Section-->
      <div class="apo-section">
        <div class="container">
          <div class="apo-cta">
            <p>We are currently taking on new projects. Would you like to discuss yours?</p>
            <footer><a href="pages_contact.html" class="apo-btn apo-btn-small apo-btn-white">Contact Us</a></footer>
          </div>
        </div>
      </div>
      <!-- End Content Section-->
    </div>
    <!-- End Page Content-->
    <!-- Footer-->
    <footer id="footer" data-bg-img-src="frontend/images/footer_bg.png" class="apo-footer">
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
  .apo-page{
    
  }
</style>

