<!-- Preloader-->
<div class="apo-preloader">
  <div class="apo-preloader-outer">
    <div class="apo-preloader-inner">
      <div class="apo-loader">
        <img src="{{ asset('frontend') }}/images/logo.png" alt="" style="padding-top: 30px;">
      </div>
    </div>
  </div>
</div>
<!-- End Preloader-->
<!-- Site Header-->
<!-- Site Header-->
<header id="header" class="apo-header apo-header-transparent" >
  <div class="apo-header-section" >
    <div class="apo-header-component-first" >
      <div class="apo-header-items">
        <div class="apo-header-item">
          <!-- Navigation Button-->
          <div type="button" data-arctic-modal="#modal-nav" class="apo-header-button hamburger hamburger--emphatic apo-hamburger-clickable"><span class="hamburger-box"><span class="hamburger-inner"></span></span></div>
          <!-- End Navigation Button-->
        </div>
        <div class="apo-header-item">
          <!-- Logo-->
            <a href="/" title="Home">
                <img class="dynamic-logo" src="{{ asset('frontend') }}/images/logo.png" alt="Logo"/>
            </a>
          <!-- End Logo-->
        </div>
      </div>
    </div>
    <div class="apo-header-component-middle">
      <div class="apo-header-items">
        <div class="apo-header-item">
          <!-- Navigation-->
          <nav class="apo-navigation-container">
            <ul class="apo-navigation">
              <li class="apo-has-children"><a href="/">Home</a>
              </li>
              <li class="apo-has-children"><a href="/about">About</a>
              </li>
              <li class="apo-has-children"><a href="/projects">Projects</a>
                <!-- Sub Menu (level 2)-->
                <?php $categories = DB::table('categories')
                    ->where('publication_status',1)
                    ->get();
                ?>
                <ul class="apo-sub-menu">
                  <li><a href="{{url('/projects')}}">All Projects</a></li>
                  @foreach($categories as $category)
                  <li><a href="{{url('/project-category/'.$category->category_name)}}">{{$category->category_name}}</a></li>
                  @endforeach
                </ul>
                <!-- End of SubMenu-->
              </li>
              <li class="apo-has-children"><a href="/projects2">Anima</a>
                <!-- Sub Menu (level 2)-->
                <?php $categories = DB::table('categories')
                    ->where('publication_status',1)
                    ->get();
                ?>
                <ul class="apo-sub-menu">
                  <li><a href="{{url('/projects')}}">All Projects</a></li>
                  @foreach($categories as $category)
                  <li><a href="{{url('/project-category/'.$category->category_name)}}">{{$category->category_name}}</a></li>
                  @endforeach
                </ul>
                <!-- End of SubMenu-->
              </li>
              <li class="apo-has-children"><a href="/services">Services</a>
              </li>
              <li class="apo-has-children"><a href="/news">News</a>
              </li>
              <li><a href="/contacts">Contact</a></li>
            </ul>
          </nav>
          <!-- End Navigation-->
        </div>
      </div>
    </div>
    <div class="apo-header-component-last">
      <div class="apo-header-items">
        <div class="apo-header-item">
          <!-- Social Networks-->
          <ul class="apo-social-networks">
            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
            <li><a href="#"><i class="fa fa-instagram"></i></a></li>
          </ul>
          <!-- End Social Networks-->
        </div>
      </div>
    </div>
  </div>
</header>
<!-- End Site Header-->

<style type="text/css">

  .apo-header{
    background-color: transparent;
  }

  @media all and (min-width: 1020px) {
    .apo-header-section{
      height: 60px;
    }

  }

  @media (min-width: 320px) {
    .apo-header{
      height: 80px;
      display: block;
    }
  }

  .apo-header-section .apo-header-component-first{

  }

  .dynamic-logo{
      width: 100px;
      transform: scale(1);
      transition: transform 0.5s ease-out;
  }
  .dynamic-logo:hover{
      transform: scale(1.5);
      transition: transform 0.5s ease;
  }


</style>

<script>
    let logo = document.querySelector('.dynamic-logo');
    logo.addEventListener('mouseover', ()=> {
        logo.src = '{{ asset('frontend') }}/images/logo_color.png';
    });
    logo.addEventListener('mouseout', ()=> {
        setTimeout(()=>{
            logo.src = '{{ asset('frontend') }}/images/logo.png';
        }, 500 );
    });

</script>
