<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Stylesheet -->
    <link href="{{ url('css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ url('css/jquery-ui.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ url('css/animate.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ url('css/css-plugin-collections.css') }}" rel="stylesheet"/>
    <!-- CSS | menuzord megamenu skins -->
    <link id="menuzord-menu-skins" href="{{ url('css/menuzord-skins/menuzord-boxed.css') }}" rel="stylesheet"/>
    <link id="menuzord-menu-skins" href="{{ url('css/menuzord-animations.css') }}" rel="stylesheet"/>
    <!-- CSS | Main style file -->
    <link href="{{ url('css/style-main.css') }}" rel="stylesheet" type="text/css">
    <!-- CSS | Preloader Styles -->
    <link href="{{ url('css/preloader.css') }}" rel="stylesheet" type="text/css">
    <!-- CSS | Custom Margin Padding Collection -->
    <link href="{{ url('css/custom-bootstrap-margin-padding.css') }}" rel="stylesheet" type="text/css">
    <!-- CSS | Responsive media queries -->
    <link href="{{ url('css/responsive.css') }}" rel="stylesheet" type="text/css">
    <!-- CSS | Style css. This is the file where you can place your own custom css code. Just uncomment it and use it. -->
    <!-- <link href="css/style.css" rel="stylesheet" type="text/css"> -->

    <!-- Revolution Slider 5.x CSS settings -->
    <link  href="{{ url('js/revolution-slider/css/settings.css') }}" rel="stylesheet" type="text/css"/>
    <link  href="{{ url('js/revolution-slider/css/layers.css') }}" rel="stylesheet" type="text/css"/>
    <link  href="{{ url('js/revolution-slider/css/navigation.css') }}" rel="stylesheet" type="text/css"/>

    <!-- CSS | Theme Color -->
    <link href="{{ url('css/colors/theme-skin-blue.css') }}" rel="stylesheet" type="text/css">

    <script src="{{ url('js/jquery-2.2.4.min.js') }}"></script>
    <script src="{{ url('js/jquery-ui.min.js') }}"></script>
    <script src="{{ url('js/bootstrap.min.js') }}"></script>
    <!-- JS | jquery plugin collection for this theme -->
    <script src="{{ url('js/jquery-plugin-collection.js') }}"></script>

    <!-- Revolution Slider 5.x SCRIPTS -->
    <script src="{{ url('js/revolution-slider/js/jquery.themepunch.tools.min.js') }}"></script>
    <script src="{{ url('js/revolution-slider/js/jquery.themepunch.revolution.min.js') }}"></script>


</head>
<body class="boxed-layout pt-40 pb-40 pt-sm-0" data-bg-img="{{ url('images/pattern/p5.png') }}">
    {{--{!! $main->asUl() !!}--}}
    {{--{!! $crumbs->asUl() !!}--}}
    <div id="wrapper" class="clearfix">
        <!-- preloader -->
        @if (!isset($_GET['no_preloader']))
            <div id="preloader">
                <div id="spinner">
                    <img class="floating ml-5" src="{{ url('/images/preloaders/13.png') }}" alt="">
                    <h5 class="line-height-50 font-18">Загрузка...</h5>
                </div>
            </div>
        @endif

        <!-- Header -->
        <header id="header" class="header">
            <div class="header-top bg-black-333 sm-text-center border-top-theme-color-3px p-0">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="widget no-border m-0">
                                <ul class="list-inline xs-text-center text-white mt-5">
                                    <li class="m-0 pl-10 pr-10"> <a href="#" class="text-white"><i class="fa fa-phone text-theme-colored"></i> 123-456-789</a> </li>
                                    <li class="m-0 pl-10 pr-10">
                                        <a href="#" class="text-white"><i class="fa fa-envelope-o text-theme-colored"></i> contact@yourdomain.com</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-4 pr-0">
                            <div class="widget no-border m-0">
                                <ul class="styled-icons icon-dark icon-flat icon-sm pull-right flip sm-pull-none sm-text-center mt-sm-15">
                                    <li><a href="#"><i class="fa fa-facebook text-white"></i></a></li>
                                    <li><a href="#"><i class="fa fa-twitter text-white"></i></a></li>
                                    <li><a href="#"><i class="fa fa-google-plus text-white"></i></a></li>
                                    <li><a href="#"><i class="fa fa-instagram text-white"></i></a></li>
                                    <li><a href="#"><i class="fa fa-linkedin text-white"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <a class="btn btn-colored btn-flat btn-theme-colored pb-10 ajaxload-popup" href="ajax-load/reservation-form.html">Get A Quote Now</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="header-nav">
                <div class="header-nav-wrapper navbar-scrolltofixed bg-white">
                    <div class="container">
                        <nav id="menuzord" class="menuzord default">
                            <a class="menuzord-brand pull-left flip xs-pull-center mt-20" href="/">
                                <img src="{{ url('images/logo-wide.png') }}" alt="">
                            </a>
                            @include('public.navigation.menuzord-menu')
                        </nav>
                    </div>
                </div>
            </div>
        </header>

        <!-- Start main-content -->
        <div class="main-content">
            @yield('content')
        </div>
        <!-- end main-content -->

        <!-- Footer -->
        <footer id="footer" class="footer" data-bg-img="{{ url('images/footer-bg.png') }}" data-bg-color="#25272e">
            <div class="container pt-70 pb-40">
                <div class="row border-bottom-black">
                    <div class="col-sm-6 col-md-3">
                        <div class="widget dark">
                            <img class="mt-10 mb-20" alt="" src="{{ url('images/logo-wide-white-footer.png') }}">
                            <p>203, Envato Labs, Behind Alis Steet, Melbourne, Australia.</p>
                            <ul class="list-inline mt-5">
                                <li class="m-0 pl-10 pr-10"> <i class="fa fa-phone text-theme-colored mr-5"></i> <a class="text-gray" href="#">123-456-789</a> </li>
                                <li class="m-0 pl-10 pr-10"> <i class="fa fa-envelope-o text-theme-colored mr-5"></i> <a class="text-gray" href="#">contact@yourdomain.com</a> </li>
                                <li class="m-0 pl-10 pr-10"> <i class="fa fa-globe text-theme-colored mr-5"></i> <a class="text-gray" href="#">www.yourdomain.com</a> </li>
                            </ul>
                            <ul class="social-icons icon-dark icon-theme-colored icon-circled icon-sm mt-15">
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-skype"></i></a></li>
                                <li><a href="#"><i class="fa fa-youtube"></i></a></li>
                                <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                                <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                        <div class="widget dark">
                            <h5 class="widget-title line-bottom">Latest News</h5>
                            <div class="latest-posts">
                                <article class="post media-post clearfix pb-0 mb-10">
                                    <a href="#" class="post-thumb"><img alt="" src="http://placehold.it/80x55"></a>
                                    <div class="post-right">
                                        <h5 class="post-title mt-0 mb-5"><a href="#">Sustainable Construction</a></h5>
                                        <p class="post-date mb-0 font-12">Mar 08, 2015</p>
                                    </div>
                                </article>
                                <article class="post media-post clearfix pb-0 mb-10">
                                    <a href="#" class="post-thumb"><img alt="" src="http://placehold.it/80x55"></a>
                                    <div class="post-right">
                                        <h5 class="post-title mt-0 mb-5"><a href="#">Industrial Coatings</a></h5>
                                        <p class="post-date mb-0 font-12">Mar 08, 2015</p>
                                    </div>
                                </article>
                                <article class="post media-post clearfix pb-0 mb-10">
                                    <a href="#" class="post-thumb"><img alt="" src="http://placehold.it/80x55"></a>
                                    <div class="post-right">
                                        <h5 class="post-title mt-0 mb-5"><a href="#">Storefront Installations</a></h5>
                                        <p class="post-date mb-0 font-12">Mar 08, 2015</p>
                                    </div>
                                </article>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                        <div class="widget dark">
                            <h5 class="widget-title line-bottom">Useful Links</h5>
                            <ul class="list angle-double-right list-border">
                                <li><a href="#">Home</a></li>
                                <li><a href="#">About</a></li>
                                <li><a href="#">Campaign</a></li>
                                <li><a href="#">Latest News</a></li>
                                <li><a href="#">Gallery</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                        <div class="widget dark">
                            <h5 class="widget-title line-bottom">Photos from Flickr</h5>
                            <div id="flickr-feed" class="clearfix">
                                <script type="text/javascript" src="http://www.flickr.com/badge_code_v2.gne?count=9&amp;display=latest&amp;size=s&amp;layout=x&amp;source=user&amp;user=52617155@N08">
                                </script>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-bottom bg-black-333">
                <div class="container pt-15 pb-10">
                    <div class="row">
                        <div class="col-md-6">
                            <p class="font-11 text-black-777 m-0 sm-text-center">Copyright &copy;2016 ThemeMascot. All Rights Reserved</p>
                        </div>
                        <div class="col-md-6 text-right">
                            <div class="widget no-border m-0">
                                <ul class="list-inline sm-text-center mt-5 font-12">
                                    <li>
                                        <a href="#">FAQ</a>
                                    </li>
                                    <li>|</li>
                                    <li>
                                        <a href="#">Help Desk</a>
                                    </li>
                                    <li>|</li>
                                    <li>
                                        <a href="#">Support</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <a class="scrollToTop" href="#"><i class="fa fa-angle-up"></i></a>
    </div>
    <!-- end wrapper -->

    <!-- Footer Scripts -->
    <!-- JS | Custom script for all pages -->
    <script src="{{ url('js/custom.js') }}"></script>
</body>
</html>