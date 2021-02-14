<!doctype html>
<html class="no-js" lang="zxx">
<head>
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<title>Administración de condominio</title>
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="manifest" href="site.webmanifest">
	<link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">

	<!-- CSS here -->
	<link rel="stylesheet" href="{{ asset('web/assets/css/bootstrap.min.css') }}">
	<link rel="stylesheet" href="{{ asset('web/assets/css/owl.carousel.min.css') }}">
	<link rel="stylesheet" href="{{ asset('web/assets/css/slicknav.css') }}">
	<link rel="stylesheet" href="{{ asset('web/assets/css/flaticon.css') }}">
	<link rel="stylesheet" href="{{ asset('web/assets/css/animate.min.css') }}">
	<link rel="stylesheet" href="{{ asset('web/assets/css/magnific-popup.css') }}">
	<link rel="stylesheet" href="{{ asset('web/assets/css/fontawesome-all.min.css') }}">
	<link rel="stylesheet" href="{{ asset('web/assets/css/themify-icons.css') }}">
	<link rel="stylesheet" href="{{ asset('web/assets/css/slick.css') }}">
	<link rel="stylesheet" href="{{ asset('web/assets/css/nice-select.css') }}">
	<link rel="stylesheet" href="{{ asset('web/assets/css/style.css') }}">
</head>

<body class="body-bg">
<!--? Preloader Start -->
<div id="preloader-active">
    <div class="preloader d-flex align-items-center justify-content-center">
        <div class="preloader-inner position-relative">
            <div class="preloader-circle"></div>
            <div class="preloader-img pere-text">
                <img src="{{ url('web/assets/img/logo/logo_rg.png') }}" alt="">
            </div>
        </div>
    </div>
</div>
<header>
    <!-- Header Start -->
    <div class="header-area">
        <div class="main-header ">
            <div class="header-top d-none d-lg-block">
                <div class="container">
                    <div class="col-xl-12">
                        <div class="row d-flex justify-content-between align-items-center">
                            <div class="header-info-left">
                                <ul>     
                                    <li><i class="far fa-clock"></i> Lun - Vie: 8.00 am - 5.00 pm</li>
                                </ul>
                            </div>
                            <div class="header-info-right">
                                <ul class="header-social">    
                                    <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                                    <li> <a href="#"><i class="fab fa-google-plus-g"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="header-bottom  header-sticky">
                <div class="container">
                    <div class="row align-items-center">
                        <!-- Logo -->
                        <div class="col-xl-2 col-lg-2">
                            <div class="logo">
                                <a href="index.html"><img src="{{ url('web/assets/img/logo/logo_rg.png') }}" alt=""></a>
                            </div>
                        </div>
                        <div class="col-xl-10 col-lg-10">
                            <div class="menu-wrapper  d-flex align-items-center justify-content-end">
                                <!-- Main-menu -->
                                <div class="main-menu d-none d-lg-block">
                                    <nav> 
                                        <ul id="navigation">                                                                                          
                                            <li class="nav-item {{ ! Route::is('web.index') ?: 'active' }}"><a href="{{ route('web.index') }}">Inicio</a></li>
                                            <li class="nav-item {{ ! Route::is('web.nosotros') ?: 'active' }}"><a href="{{ route('web.nosotros') }}">Nosotros</a></li>
                                            <li class="nav-item {{ ! Route::is('web.servicios') ?: 'active' }}" ><a href="{{ route('web.servicios') }}">Servicios</a></li>
                                            <li><a href="blog.html">Clientes</a>
                                                {{-- <ul class="submenu">
                                                    <li><a href="blog.html">Blog</a></li>
                                                    <li><a href="blog_details.html">Blog Details</a></li>
                                                    <li><a href="elements.html">Element</a></li>
                                                </ul> --}}
                                            </li>
                                            {{-- <li><a href="contact.html">Contáctanos</a></li> --}}
                                            <li><a href="{{ route('login') }}">Ingresa</a></li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                        </div> 
                        <!-- Mobile Menu -->
                        <div class="col-12">
                            <div class="mobile_menu d-block d-lg-none"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->
</header>
<main>
    <!-- slider Area Start-->
    <div class="slider-area ">
        <div class="slider-active">
            <!-- Single Slider -->
            <div class="single-slider slider-height d-flex align-items-center">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-8 col-lg-7 col-md-8">
                            <div class="hero__caption">
                                <span data-animation="fadeInLeft" data-delay=".1s">Unete a nosotros</span>
                                <h1 data-animation="fadeInLeft" data-delay=".5s" >Te ayudaremos</h1>
                                <p data-animation="fadeInLeft" data-delay=".9s">Somos un equipo  de profesionales, espeialistas en el manejo<br> y administración de conjuntos residenciales</p>
                                <!-- Hero-btn -->
                                <div class="hero__btn" data-animation="fadeInLeft" data-delay="1.1s">
                                    <a href="industries.html" class="btn hero-btn">Our Services</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>          
            </div>
            <!-- Single Slider -->
            <div class="single-slider slider-height d-flex align-items-center">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-8 col-lg-7 col-md-8">
                            <div class="hero__caption">
                                <span data-animation="fadeInLeft" data-delay=".1s">Unete a nosotros</span>
                                <h1 data-animation="fadeInLeft" data-delay=".5s" >Te ayudaremos</h1>
                                <p data-animation="fadeInLeft" data-delay=".9s">Somos un equipo  de profesionales, espeialistas en el manejo<br> y administración de conjuntos residenciales</p>
                                <!-- Hero-btn -->
                                <div class="hero__btn" data-animation="fadeInLeft" data-delay="1.1s">
                                    <a href="industries.html" class="btn hero-btn">Our Services</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>          
            </div>
        </div>
    </div>
    <!-- slider Area End-->
    <!--? Categories Area Start -->
    <div class="categories-area section-padding30">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <!-- Section Tittle -->
                    <div class="section-tittle mb-70">
                        <span>Our Top Services</span>
                        <h2>Our Best Services</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="single-cat text-center mb-50">
                        <div class="cat-icon">
                            <span class="flaticon-development"></span>
                        </div>
                        <div class="cat-cap">
                            <h5><a href="services.html">Strategy Planning </a></h5>
                            <p>There are many variations of passages of lorem Ipsum available but the new majority have suffered.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="single-cat text-center mb-50">
                        <div class="cat-icon">
                            <span class="flaticon-result"></span>
                        </div>
                        <div class="cat-cap">
                            <h5><a href="services.html">Insurance Service</a></h5>
                            <p>There are many variations of passages of lorem Ipsum available but the new majority have suffered.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="single-cat text-center mb-50">
                        <div class="cat-icon">
                            <span class="flaticon-team"></span>
                        </div>
                        <div class="cat-cap">
                            <h5><a href="services.html">Audit & Evaluation</a></h5>
                            <p>There are many variations of passages of lorem Ipsum available but the new majority have suffered.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Services Area End -->
    <!--? About Area Start-->
    <div class="support-company-area pt-100 pb-100 section-bg fix" data-background="{{ url('web/assets/img/gallery/section_bg02.jpg') }}">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-6 col-lg-6">
                    <div class="support-location-img">
                        <img src="{{ url('web/assets/img/gallery/about.png') }}" alt="">
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6">
                    <div class="right-caption">
                        <!-- Section Tittle -->
                        <div class="section-tittle section-tittle2 mb-50">
                            <span>Our Top Services</span>
                            <h2>Our Best Services</h2>
                        </div>
                        <div class="support-caption">
                            <p class="pera-top">Mollit anim laborum duis adseu dolor iuyn voluptcate velit ess cillum dolore egru lofrre dsu quality mollit anim laborumuis au dolor in voluptate velit cillu.</p>
                            <p class="mb-65">Mollit anim laborum.Dvcuis aute serunt  iruxvfg dhjkolohr indd re voluptate velit esscillumlore eu quife nrulla parihatur. Excghcepteur sfwsignjnt occa cupidatat non aute iruxvfg dhjinulpadeserunt moll.</p>
                            <a href="about.html" class="btn post-btn">More About Us</a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- About Area End-->
    <!--? Services Ara Start -->
    <div class="services-area section-padding3">
        <div class="container">
            <div class="row">
                <div class="cl-xl-7 col-lg-8 col-md-10">
                    <!-- Section Tittle -->
                    <div class="section-tittle mb-70">
                        <span>Our Portfolios of cases</span>
                        <h2>Featured Case Study</h2>
                    </div> 
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-10">
                    <div class="single-services mb-100">
                        <div class="services-img">
                            <img src="{{ asset('web/assets/img/gallery/services1.png') }}" alt="">
                            </div>
                            <div class="services-caption">
                            <span>Strategy planing</span>
                            <p><a href="#">Within the construction industry as their overdraft</a></p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-10">
                    <div class="single-services mb-100">
                        <div class="services-img">
                            <img src="{{ asset('web/assets/img/gallery/services2.png') }}" alt="">
                            </div>
                            <div class="services-caption">
                            <span>Strategy planing</span>
                            <p><a href="#">Within the construction industry as their overdraft</a></p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-10">
                    <div class="single-services mb-100">
                        <div class="services-img">
                            <img src="{{ url('web/assets/img/gallery/services3.png') }}" alt="">
                            </div>
                            <div class="services-caption">
                            <span>Strategy planing</span>
                            <p><a href="#">Within the construction industry as their overdraft</a></p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-10">
                    <div class="single-services mb-100">
                        <div class="services-img">
                            <img src="{{ url('web/assets/img/gallery/services4.png') }}" alt="">
                            </div>
                            <div class="services-caption">
                            <span>Strategy planing</span>
                            <p><a href="#">Within the construction industry as their overdraft</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Services Ara End -->
    <!--? Testimonial Start -->
    <div class="testimonial-area testimonial-padding" data-background="assets/img/gallery/section_bg04.jpg">
        <div class="container ">
            <div class="row d-flex justify-content-center">
                <div class="col-xl-10 col-lg-10 col-md-9">
                    <div class="h1-testimonial-active">
                        <!-- Single Testimonial -->
                        <div class="single-testimonial text-center">
                            <!-- Testimonial Content -->
                            <div class="testimonial-caption ">
                                <div class="testimonial-top-cap">
                                    <svg xmlns=""
                                    xmlns:xlink=""
                                    width="67px" height="49px">
                                    <path fill-rule="evenodd"  fill="rgb(240, 78, 60)"
                                    d="M57.053,48.209 L42.790,48.209 L52.299,29.242 L38.036,29.242 L38.036,0.790 L66.562,0.790 L66.562,29.242 L57.053,48.209 ZM4.755,48.209 L14.263,29.242 L0.000,29.242 L0.000,0.790 L28.527,0.790 L28.527,29.242 L19.018,48.209 L4.755,48.209 Z"/>
                                    </svg>
                                    <p>Consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel facilisis por incididunt ut labore et dolore mas. </p>
                                </div>
                                <!-- founder -->
                                <div class="testimonial-founder d-flex align-items-center justify-content-center">
                                    <div class="founder-img">
                                        <img src="{{ url('web/assets/img/gallery/Homepage_testi.png') }}" alt="">
                                    </div>
                                    <div class="founder-text">
                                        <span>Jessya Inn</span>
                                        <p>Chif Photographer</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Single Testimonial -->
                        <div class="single-testimonial text-center">
                            <!-- Testimonial Content -->
                            <div class="testimonial-caption ">
                                <div class="testimonial-top-cap">
                                    <svg xmlns=""
                                    xmlns:xlink=""
                                    width="67px" height="49px">
                                    <path fill-rule="evenodd"  fill="rgb(240, 78, 60)"
                                    d="M57.053,48.209 L42.790,48.209 L52.299,29.242 L38.036,29.242 L38.036,0.790 L66.562,0.790 L66.562,29.242 L57.053,48.209 ZM4.755,48.209 L14.263,29.242 L0.000,29.242 L0.000,0.790 L28.527,0.790 L28.527,29.242 L19.018,48.209 L4.755,48.209 Z"/>
                                    </svg>
                                    <p>Consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel facilisis por incididunt ut labore et dolore mas. </p>
                                </div>
                                <!-- founder -->
                                <div class="testimonial-founder d-flex align-items-center justify-content-center">
                                    <div class="founder-img">
                                        <img src="{{ url('web/assets/img/gallery/Homepage_testi.png') }}" alt="">
                                    </div>
                                    <div class="founder-text">
                                        <span>Jessya Inn</span>
                                        <p>Chif Photographer</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Testimonial End -->
    <!-- Coun Down Start -->
    <div class="count-down-area pb-120">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <!-- Counter Up -->
                    <div class="single-counter text-center">
                        <span class="counter">8705</span>
                        <p>Projects Completed</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <!-- Counter Up -->
                    <div class="single-counter active text-center">
                        <span class="counter">480</span>
                        <p> Active Clients</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <!-- Counter Up -->
                    <div class="single-counter text-center">
                        <span class="counter">626</span>
                        <p>Cups of Coffee</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <!-- Counter Up -->
                    <div class="single-counter text-center">
                        <span class="counter">9774</span>
                        <p>Happy Clients</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Coun Down End -->
    <!-- Team Start -->
    <div class="team-area section-padding30">
        <div class="container">
            <div class="row">
                <div class="cl-xl-7 col-lg-8 col-md-10">
                    <!-- Section Tittle -->
                    <div class="section-tittle mb-70">
                        <span>Our Professional members </span>
                        <h2>Our Team Mambers</h2>
                    </div> 
                </div>
            </div>
            <div class="row">
                <!-- single Tem -->
                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-">
                    <div class="single-team mb-30">
                        <div class="team-img">
                            <img src="{{ url('web/assets/img/gallery/team2.png') }}" alt="">
                        </div>
                        <div class="team-caption">
                            <h3><a href="#">Ethan Welch</a></h3>
                            <span>UX Designer</span>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-">
                    <div class="single-team mb-30">
                        <div class="team-img">
                            <img src="{{ url('web/assets/img/gallery/team3.png') }}" alt="">
                        </div>
                        <div class="team-caption">
                            <h3><a href="#">Ethan Welch</a></h3>
                            <span>UX Designer</span>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-">
                    <div class="single-team mb-30">
                        <div class="team-img">
                            <img src="{{ url('web/assets/img/gallery/team1.png') }}" alt="">
                        </div>
                        <div class="team-caption">
                            <h3><a href="#">Ethan Welch</a></h3>
                            <span>UX Designer</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Team End -->
    <!-- Want To work -->
    <section class="wantToWork-area w-padding2 section-bg" data-background="{{ url('web/assets/img/gallery/section_bg03.jpg') }}">
        <div class="container">
            <div class="row align-items-center justify-content-between">
                <div class="col-xl-7 col-lg-9 col-md-8">
                    <div class="wantToWork-caption wantToWork-caption2">
                        <h2>Are you Searching<br> For a First-Class Consultant?</h2>
                    </div>
                </div>
                <div class="col-xl-2 col-lg-3 col-md-4">
                    <a href="#" class="btn btn-black f-right">More About Us</a>
                </div>
            </div>
        </div>
    </section>
    <!-- Want To work End -->
    <!-- Blog Area Start -->
    <div class="home-blog-area section-padding30">
        <div class="container">
            <!-- Section Tittle -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-tittle mb-100">
                        <span>Recent News of us</span>
                        <h2>Our Recent Blog</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-6 col-lg-6 col-md-6">
                    <div class="home-blog-single mb-30">
                        <div class="blog-img-cap">
                            <div class="blog-img">
                                <img src="{{ url('web/assets/img/gallery/home_blog1.png') }}" alt="">
                                <ul>
                                    <li>By Admin   -   October 27, 2020</li>
                                </ul>
                            </div>
                            <div class="blog-cap">
                                <h3><a href="blog_details.html">16 Easy Ideas to Use in  Everyday</a></h3>
                                <p>Amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magnua Quis ipsum suspendisse ultrices gra.</p>
                                <a href="blog_details.html" class="more-btn">Read more</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6">
                    <div class="home-blog-single mb-30">
                        <div class="blog-img-cap">
                            <div class="blog-img">
                                <img src="{{ url('web/assets/img/gallery/home_blog2.png') }}" alt="">
                                <ul>
                                    <li>By Admin   -   October 27, 2020</li>
                                </ul>
                            </div>
                            <div class="blog-cap">
                                <h3><a href="blog_details.html">16 Easy Ideas to Use in  Everyday</a></h3>
                                <p>Amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magnua Quis ipsum suspendisse ultrices gra.</p>
                                <a href="blog_details.html" class="more-btn">Read more</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Blog Area End -->
    <!-- Brand Area Start -->
    <div class="brand-area pb-140">
        <div class="container">
            <div class="brand-active brand-border pb-40">
                <div class="single-brand">
                    <img src="{{ url('web/assets/img/gallery/brand1.png') }}" alt="">
                </div>
                <div class="single-brand">
                    <img src="{{ url('web/assets/img/gallery/brand2.png') }}" alt="">
                </div>
                <div class="single-brand">
                    <img src="{{ url('web/assets/img/gallery/brand3.png') }}" alt="">
                </div>
                <div class="single-brand">
                    <img src="{{ url('web/assets/img/gallery/brand4.png') }}" alt="">
                </div>
                <div class="single-brand">
                    <img src="{{ url('web/assets/img/gallery/brand2.png') }}" alt="">
                </div>
                <div class="single-brand">
                    <img src="{{ url('web/assets/img/gallery/brand5.png') }}" alt="">
                </div>
            </div>
        </div>
    </div>
    <!-- Brand Area End -->
</main>
<footer>
    <!--? Footer Start-->
    <div class="footer-area section-bg" data-background="assets/img/gallery/footer_bg.jpg">
        <div class="container">
            <div class="footer-top footer-padding">
                <div class="row d-flex justify-content-between">
                    <div class="col-xl-3 col-lg-4 col-md-5 col-sm-8">
                        <div class="single-footer-caption mb-50">
                            <!-- logo -->
                            <div class="footer-logo">
                                <a href="index.html"><img src="{{ url('web/assets/img/logo/logo2_footer.png') }}" alt=""></a>
                            </div>
                            <div class="footer-tittle">
                                <div class="footer-pera">
                                    <p class="info1">Receive updates and latest news direct from Simply enter.</p>
                                </div>
                            </div>
                            <div class="footer-number">
                                <h4><span>+564 </span>7885 3222</h4>
                                <p>youremail@gmail.com</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-2 col-lg-2 col-md-3 col-sm-5">
                        <div class="single-footer-caption mb-50">
                            <div class="footer-tittle">
                                <h4>Location </h4>
                                <ul>
                                    <li><a href="#">Advanced</a></li>
                                    <li><a href="#"> Management</a></li>
                                    <li><a href="#">Corporate</a></li>
                                    <li><a href="#">Customer</a></li>
                                    <li><a href="#">Information</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-2 col-lg-2 col-md-3 col-sm-5">
                        <div class="single-footer-caption mb-50">
                            <div class="footer-tittle">
                                <h4>Explore</h4>
                                <ul>
                                    <li><a href="#">Cookies</a></li>
                                    <li><a href="#">About</a></li>
                                    <li><a href="#">Privacy Policy</a></li>
                                    <li><a href="#">Proparties</a></li>
                                    <li><a href="#">Licenses</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-8">
                        <div class="single-footer-caption mb-50">
                            <div class="footer-tittle">
                                <h4>Location</h4>
                                <div class="footer-pera">
                                    <p class="info1">Subscribe now to get daily updates</p>
                                </div>
                            </div>
                            <!-- Form -->
                            <div class="footer-form">
                                <div id="mc_embed_signup">
                                    <form target="_blank" action="" method="get" class="subscribe_form relative mail_part" novalidate="true">
                                        <input type="email" name="EMAIL" id="newsletter-form-email" placeholder=" Email Address " class="placeholder hide-on-focus" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Your email address'">
                                        <div class="form-icon">
                                            <button type="submit" name="submit" id="newsletter-submit" class="email_icon newsletter-submit button-contactForm">
                                                SIGN UP
                                            </button>
                                        </div>
                                        <div class="mt-10 info"></div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-bottom">
                <div class="row d-flex justify-content-between align-items-center">
                    <div class="col-xl-9 col-lg-8">
                        <div class="footer-copy-right">
                            <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
  Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart" aria-hidden="true"></i> by <a href="" target="_blank">Colorlib</a>
  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4">
                        <!-- Footer Social -->
                        <div class="footer-social f-right">
                            <a href="#"><i class="fab fa-twitter"></i></a>
                            <a href=""><i class="fab fa-facebook-f"></i></a>
                            <a href="#"><i class="fas fa-globe"></i></a>
                            <a href="#"><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End-->
</footer>
<!-- Scroll Up -->
<div id="back-top" >
    <a title="Go to Top" href="#"> <i class="fas fa-level-up-alt"></i></a>
</div>

    <!-- JS here -->

    <script src="{{ asset('web/assets/js/vendor/modernizr-3.5.0.min.js') }}"></script>
    <!-- Jquery, Popper, Bootstrap -->
    <script src="{{ asset('web/assets/js/vendor/jquery-1.12.4.min.js') }}"></script>
    <script src="{{ asset('web/assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('web/assets/js/bootstrap.min.js') }}"></script>
    <!-- Jquery Mobile Menu -->
    <script src="{{ asset('web/assets/js/jquery.slicknav.min.js') }}"></script>

    <!-- Jquery Slick , Owl-Carousel Plugins -->
    <script src="{{ asset('web/assets/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('web/assets/js/slick.min.js') }}"></script>
    <!-- One Page, Animated-HeadLin -->
    <script src="{{ asset('web/assets/js/wow.min.js') }}"></script>
    <script src="{{ asset('web/assets/js/animated.headline.js') }}"></script>
    <script src="{{ asset('web/assets/js/jquery.magnific-popup.js') }}"></script>

    <!-- Nice-select, sticky -->
    <script src="{{ asset('web/assets/js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('web/assets/js/jquery.sticky.js') }}"></script>

    <!-- counter , waypoint -->
    <script src="{{ asset('web/assets/js/waypoint.min.js') }}"></script>
    <script src="{{ asset('web/assets/js/jquery.counterup.min.js') }}"></script>
    
    <!-- contact js -->
    <script src="{{ asset('web/assets/js/contact.js') }}"></script>
    <script src="{{ asset('web/assets/js/jquery.form.js') }}"></script>
    <script src="{{ asset('web/assets/js/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('web/assets/js/mail-script.js') }}"></script>
    <script src="{{ asset('web/assets/js/jquery.ajaxchimp.min.js') }}"></script>
    
    <!-- Jquery Plugins, main Jquery -->	
    <script src="{{ asset('web/assets/js/plugins.js') }}"></script>
    <script src="{{ asset('web/assets/js/main.js') }}"></script>
        
    </body>
</html>