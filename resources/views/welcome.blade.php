<!DOCTYPE html>
<html class="no-js" lang="">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>Instituto Tecnico IGLA</title>
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('client/img/favicon.svg')}}"/>
    <!-- Place favicon.ico in the root directory -->

    <!-- ========================= CSS here ========================= -->
    <link rel="stylesheet" href="{{ asset('client/css/bootstrap-5.0.0-beta2.min.css')}}" />
    <link rel="stylesheet" href="{{ asset('client/css/LineIcons.2.0.css')}}" />
    <link rel="stylesheet" href="{{ asset('client/css/tiny-slider.css')}}" />
    <link rel="stylesheet" href="{{ asset('client/css/animate.css')}}" />
    <link rel="stylesheet" href="{{ asset('client/css/main.css')}}" />
  </head>
  <body>
    <!-- ========================= preloader start ========================= -->
    <div class="preloader">
      <div class="loader">
        <div class="spinner">
          <div class="spinner-container">
            <div class="spinner-rotator">
              <div class="spinner-left">
                <div class="spinner-circle"></div>
              </div>
              <div class="spinner-right">
                <div class="spinner-circle"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
	<!-- preloader end -->
    <!-- ========================= header start ========================= -->
    <header class="header">
      <div class="navbar-area">
        <div class="container">
          <div class="row align-items-center">
            <div class="col-lg-12">
              <nav class="navbar navbar-expand-lg">
                <a class="navbar-brand" href="index.html">
                  <img src="{{ asset('imagenes/IGLA.jpg')}}" alt="Logo" />
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="toggler-icon"></span>
                  <span class="toggler-icon"></span>
                  <span class="toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse sub-menu-bar" id="navbarSupportedContent">
                  <ul id="nav" class="navbar-nav ms-auto">
                    <li class="nav-item">
                      <a class="page-scroll active" href="#home">Inicio</a>
                    </li>
                    <li class="nav-item">
                      <a class="page-scroll" href="#about">Acerda</a>
                    </li>
                    <li class="nav-item">
                      <a class="page-scroll" href="#service">Servicios</a>
                    </li>
                    <li class="nav-item">
                        @guest
                            <a href="{{ route('login') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Iniciar Sesión</a>
                        @else
							@auth
								@if(Auth::user()->hasRole('admin'))
									<a href="{{ route('admin.home') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">
										{{ Auth::user()->name }}
									</a>
								@elseif(Auth::user()->hasRole('chef'))
									<a href="{{ route('chef.home') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">
										{{ Auth::user()->name }}
									</a>
								@elseif(Auth::user()->hasRole('estudiante'))
									<a href="{{ route('estudiante.home') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">
										{{ Auth::user()->name }}
									</a>
								@endif
							@endauth
                        @endguest
                    </li>
                  </ul>
                </div>
                <!-- navbar collapse -->
              </nav>
              <!-- navbar -->
            </div>
          </div>
          <!-- row -->
        </div>
        <!-- container -->
      </div>
      <!-- navbar area -->
    </header>
    <!-- ========================= header end ========================= -->

    <!-- ========================= hero-section start ========================= -->
    <section id="home" class="hero-section">
      <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="hero-content">
                    <span class="wow fadeInLeft" data-wow-delay=".2s">BIENVENIDOS A IGLA</span>
                    <h1 class="wow fadeInUp" data-wow-delay=".4s">You are using free lite version of Bliss.</h1>
                    <p class="wow fadeInUp" data-wow-delay=".6s">
                        Please, purchase full version of the template to get all sections, elements and permission to remove footer credits.
                    </p>
                    <a href="javascript:void(0)" class="main-btn btn-hover wow fadeInUp" data-wow-delay=".6s">Buy Now</a>
                </div>
			</div>
				<div class="col-lg-6">
					<div class="hero-img wow fadeInUp" data-wow-delay=".5s">
						<img src="{{ asset('client/img/hero/hero-img.svg')}}" alt="">
					</div>
				</div>
            </div>
		</div>
    </section>
	<!-- ========================= hero-section end ========================= -->

		<!-- ========================= about-section start ========================= -->
		<section id="about" class="about-section pt-150">
			<div class="container">
				<div class="row">
					<div class="col-lg-6">
						<div class="about-img mb-50">
							<img src="{{ asset('client/img/about/about-img.svg')}}" alt="about">
						</div>
					</div>
					<div class="col-lg-6">
						<div class="about-content mb-50">
							<div class="section-title mb-50">
								<h1 class="mb-25">Read more about our Digital Agency</h1>
								<p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr,sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores.</p>
							</div>
							<div class="accordion pb-15" id="accordionExample">
								<div class="single-faq">
									<button class="w-100 text-start" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
										Which Service We Provide?
									</button>
							
									<div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
										<div class="faq-content">
											Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch.
										</div>
									</div>
								</div>
								<div class="single-faq">
									<button class="w-100 text-start collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
										What I need to start design?
									</button>
									<div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
										<div class="faq-content">
											Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch.
										</div>
									</div>
								</div>
								<div class="single-faq">
									<button class="w-100 text-start collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
										What  is our design process?
									</button>
									<div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
										<div class="faq-content">
											Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch.
										</div>
									</div>
								</div>
							</div>
							<a href="javascript:void(0)" class="main-btn btn-hover">View More</a>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- ========================= about-section end ========================= -->

		<!-- ========================= service-section start ========================= -->
		<section id="service" class="service-section img-bg pt-100 pb-100 mt-150">
			<div class="container">
				<div class="row justify-content-center">
					<div class="col-xxl-5 col-xl-6 col-lg-7 col-md-10">
						<div class="section-title text-center mb-50">
							<h1>Our services</h1>
							<p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt labore.</p>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-xl-3 col-md-6">
						<div class="single-service">
							<div class="icon color-1">
								<i class="lni lni-layers"></i>
							</div>
							<div class="content">
								<h3>UI/UX design</h3>
								<p>Lorem ipsum dolor sitsdw consetsad pscing eliewtr, diam nonumy.</p>
							</div>
						</div>
					</div>
					<div class="col-xl-3 col-md-6">
						<div class="single-service">
							<div class="icon color-2">
								<i class="lni lni-code-alt"></i>
							</div>
							<div class="content">
								<h3>Web design</h3>
								<p>Lorem ipsum dolor sitsdw consetsad pscing eliewtr, diam nonumy.</p>
							</div>
						</div>
					</div>
					<div class="col-xl-3 col-md-6">
						<div class="single-service">
							<div class="icon color-3">
								<i class="lni lni-pallet"></i>
							</div>
							<div class="content">
								<h3>Graphics design</h3>
								<p>Lorem ipsum dolor sitsdw consetsad pscing eliewtr, diam nonumy.</p>
							</div>
						</div>
					</div>
					<div class="col-xl-3 col-md-6">
						<div class="single-service">
							<div class="icon color-4">
								<i class="lni lni-vector"></i>
							</div>
							<div class="content">
								<h3>Brand design</h3>
								<p>Lorem ipsum dolor sitsdw consetsad pscing eliewtr, diam nonumy.</p>
							</div>
						</div>
					</div>
				</div>

				<div class="view-all-btn text-center pt-30">
					<a href="javascript:void(0)" class="main-btn btn-hover">View All Services</a>
				</div>

			</div>
		</section>
		<!-- ========================= service-section end ========================= -->

    <!-- ========================= footer start ========================= -->
		<footer id="contact" class="footer">
			<div class="container">
				<div class="widget-wrapper">
					<div class="row">
						<div class="col-xl-6 col-md-12">
							<div class="footer-widget">
								<div class="logo mb-35">
									<a href="index.html"> <img src="{{ asset('client/img/logo/logo.svg')}}" alt=""> </a>
								</div>
								<p class="desc mb-35">We are expert designer team, There have a lot of designer and developer If you have any project you can hire Create a website.</p>
								<ul class="socials">
									<li>
										<a href="jvascript:void(0)"> <i class="lni lni-facebook-filled"></i> </a>
									</li>
									<li>
										<a href="jvascript:void(0)"> <i class="lni lni-twitter-filled"></i> </a>
									</li>
									<li>
										<a href="jvascript:void(0)"> <i class="lni lni-instagram-filled"></i> </a>
									</li>
									<li>
										<a href="jvascript:void(0)"> <i class="lni lni-linkedin-original"></i> </a>
									</li>
								</ul>
							</div>
						</div>

						<div class="col-xl-6 col-md-12">
							<div class="footer-widget">
								<h3>Contact</h3>
								<ul>
									<li>+003894372632</li>
									<li>helldesigner@gmail.ccom</li>
									<li>United state of America</li>
								</ul>
								<div class="contact_map" style="width: 100%; height: 150px; margin-top: 25px;">
									<div class="gmap_canvas">
										<iframe id="gmap_canvas" src="https://maps.google.com/maps?q=Mission%20District%2C%20San%20Francisco%2C%20CA%2C%20USA&amp;t=&amp;z=13&amp;ie=UTF8&amp;iwloc=&amp;output=embed" style="width: 100%;"></iframe>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</footer>
    <!-- ========================= footer end ========================= -->

    <!-- ========================= scroll-top ========================= -->
    <a href="#" class="scroll-top btn-hover">
      <i class="lni lni-chevron-up"></i>
    </a>

    <!-- ========================= JS here ========================= -->
    <script src="{{ asset('client/js/bootstrap-5.0.0-beta2.min.js')}}"></script>
    <script src="{{ asset('client/js/count-up.min.js')}}"></script>
    <script src="{{ asset('client/js/tiny-slider.js')}}"></script>
    <script src="{{ asset('client/js/wow.min.js')}}"></script>
    <script src="{{ asset('client/js/polifill.js')}}"></script>
    <script src="{{ asset('client/js/main.js')}}"></script>
  </body>
</html>