<!DOCTYPE html>
<html>
    <head>
        <title>Pug Ventures, LLC</title>
        <meta charset="utf-8"/>
        <meta name=viewport content="width=device-width, initial-scale=1">
        <script type="text/javascript" src="{{ URL::asset('js/pace.min.js') }}"></script>
        <link href="{{ URL::asset('css/pace-loading-bar.css') }}" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/animate.caliber.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/materialdesignicons.caliber.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/bootstrap.css') }}">
        <script type="text/javascript" src="{{ URL::asset('js/jquery.min.js') }}"></script>
        <script src="{{ URL::asset('js/jquery.viewportchecker.min.js') }}"></script>
        <!--Mixitup -->
        <script type="text/javascript" src="{{ URL::asset('js/jquery.mixitup.min.js') }}"></script>
        <!--Fancybox -->
        <script type="text/javascript" src="{{ URL::asset('js/jquery.fancybox.pack.js') }}"></script>
        <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/jquery.fancybox.css') }}" media="screen" />
        <!-- Main Style -->
        <link rel="stylesheet" id="main-style" type="text/css" href="{{ URL::asset('css/style.css') }}">
        <!-- FontAwesome -->
        <script defer src="https://use.fontawesome.com/releases/v5.0.1/js/all.js"></script>
        <script type="text/javascript" src="{{ URL::asset('js/main.js') }}"></script>
    </head>
    <body class=" angled  yellow">
        <!-- Section Start - Header -->
        <section class="header bg-lightgray header-1" >

            <!-- Header Slide - Start -->
            <div class="header-slide" style="position:relative;">
                <img alt="header-banner-image" src="img/banner-1.jpg" class='header-img' style=''>
                <div class="overlay overlay1">
                    <div class="black inviewport animated delay4" data-effect="fadeInLeftOpacity"></div>
                    <div class="primary inviewport animated delay4" data-effect="fadeInRightOpacity"></div>
                    <!-- Header Text - Start -->
                    <div class="maintext">
                        <div class="primary-text inviewport animated delay4" data-effect="fadeInRightBig">
                            <div class="left-line">
                                <h4><i class="far fa-camera-retro"></i></h4>
                                <h1>Pug</h1>
                            </div>
                        </div>
                        <div class="black-text inviewport animated delay4" data-effect="fadeInLeftBig">
                            <div>
                                <h1>Ventures</h1>
                            </div>
                        </div>
                    </div>
                    <!-- Header Text - End -->
                </div>
            </div>
            <!-- Header Slide - End -->
        </section>
        <!-- Section End - Header -->
        
        <!-- Section Start - Portfolio -->
        <section class=' padding-top-100 padding-bottom-25 ' id='portfolio'>
            <!-- Angled Section - Start -->
            <div class="angled_down_inside white">
                <div class="slope upleft"></div>
                <div class="slope upright"></div>
            </div>
            <!-- Angled Section - End -->
            <div class="container">
                <div class="row gallery-row">
                    <h1 class="heading">Our Projects</h1>
                    <div class="headul"></div>
                    <!-- Portfolio Items - Start -->
                    <div class="filter-items filter-mixitup  inviewport animated " data-effect="fadeIn" id="gallery-mixitup">
                        <!-- Item - Start -->
                        <div class="filter-item development col-lg-3 col-md-4 col-sm-6  col-xs-10 col-xs-offset-1 col-sm-offset-0">
                            <img alt="gallery-image" src="img/gallery-1.jpg" class="img-responsive transition">
                            <div class="info transition">
                                <a class="btn btn-primary fancybox" title="Test Title of this item" data-fancybox-group="gallery" href="https://www.salty-pug.com"><i class="fas fa-paw"></i></a>
                            </div>
                        </div>
                        <!-- Item - End -->
                        
                    </div>
                    <!-- Portfolio Items - End -->
                </div>
            </div>
            <!-- Angled Section - Start -->
            <div class="angled_up_inside white">
                <div class="slope upleft"></div>
                <div class="slope upright"></div>
            </div>
            <!-- Angled Section - End -->
        </section>
        <!-- Section End - Portfolio  -->
        
        <!-- Section Start - Contact Us -->
        <section class="parallax contact" id="contact">
            <div class="bg-overlay opacity-85"></div>
            <div class="container">
                <div class="">
                    <h1 class="heading">Connect With Us</h1>
                    <div class="headul"></div>
                    <div class="col-lg-6 col-md-6 col-xs-12 col-sm-12 inviewport animated delay1" data-effect="fadeInUp">
                        <!-- Contact Form - Start -->
                        <form action='send_email.php' method='post'>
                            <input type='text' placeholder='Name' class='col-xs-12 transition' id='c_name' >
                            <input type='text' placeholder='Email' class='col-xs-12 transition' id='c_email' >
                            <input type='text' placeholder='Phone' class='col-xs-12 transition' id='c_phone' >
                            <textarea class='col-xs-12 transition' placeholder='Message' id='c_message' ></textarea>
                            
                            <div id='response_email'></div>
                            
                            <button type='button' class='btn btn-block btn-primary transition' id='c_send'>Send Message</button>
                        </form>
                        <!-- Contact Form - End -->
                    </div>
                    <div class="col-lg-6 col-md-6 col-xs-12 col-sm-12 contacts inviewport animated delay1" data-effect="fadeInUp">
                        <!-- Contact Person - Start -->
                        <div class='contact-person'>
                            <div class='col-md-6 col-sm-8 col-xs-8 info'>
                                <h4>Donny Hansen</h4>
                                <div class='post'>Owner</div>
                                <div>Email: dhansen@pugventuresllc.com</div>
                                <div>Phone: +1 208 867 8199</div>
                            </div>
                        </div>
                        <!-- Contact Person - End -->
                        
                    </div>
                </div>
            </div>
        </section>
        <!-- Section End - Contact Us -->
        
        <!-- Section Start - Footer -->
        <section class='footer bg-black padding-top-75 padding-bottom-25 '>
            <!-- Angled Section - Start -->
            <div class="angled_down_inside black">
                <div class="slope upleft"></div>
                <div class="slope upright"></div>
            </div>
            <!-- Angled Section - End -->
            <div class="container">
                <div class="row">
                    <!-- Text Widget - Start -->
                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 text-widget inviewport animated delay1" data-effect="fadeInUp">
                        <div class="logo">
                            <span>Pug Ventures, LLC</span>
                        </div>
                    </div>
                    <!-- Text Widget - End -->
                    
                </div>
            </div>
            <!-- Copyright Bar - Start -->
            <div class="copyright">
                <div class="col-md-12">
                    <div class="container">
                        <div class="">
                            <div class="col-lg-6 col-md-6 col-sm-8 col-xs-12 message inviewport animated delay1" data-effect="fadeInUp">
                                <span class=""><small>&copy; {{ date('Y') }} Pug Ventures, LLC</small></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Copyright Bar - End -->
        </section>
        <!-- Section End - Footer -->
    </body>
</html>