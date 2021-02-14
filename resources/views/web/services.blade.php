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
        <!--? Hero Start -->
        <div class="slider-area2">
            <div class="slider-height2 hero-overly2 d-flex align-items-center">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="hero-cap hero-cap2 text-center">
                                <h2>Our Services</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Hero End -->
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
                </div>
            </div>
        </div>
        <!-- Services Area End -->
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
        <div class="footer-area section-bg" data-background="{{ url('web/assets/img/gallery/footer_bg.jpg') }}">
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
                                        <form target="_blank" action="https://spondonit.us12.list-manage.com/subscribe/post?u=1462626880ade1ac87bd9c93a&amp;id=92a4423d01" method="get" class="subscribe_form relative mail_part" novalidate="true">
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
  Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4">
                            <!-- Footer Social -->
                            <div class="footer-social f-right">
                                <a href="#"><i class="fab fa-twitter"></i></a>
                                <a href="https://www.facebook.com/sai4ull"><i class="fab fa-facebook-f"></i></a>
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