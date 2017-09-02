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
{{--    <link id="menuzord-menu-skins" href="{{ url('css/menuzord-skins/menuzord-boxed.css') }}" rel="stylesheet"/>--}}
    <link id="menuzord-menu-skins" href="{{ url('css/menuzord-skins/menuzord-rounded-boxed.css') }}" rel="stylesheet"/>
    <link id="menuzord-animations" href="{{ url('css/menuzord-animations.css') }}" rel="stylesheet"/>
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
    <link href="{{ url('css/colors/theme-skin-green.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ url('css/style.css') }}" rel="stylesheet" type="text/css">

    <script src="{{ url('js/jquery-2.2.4.min.js') }}"></script>
    <script src="{{ url('js/jquery-ui.min.js') }}"></script>
    <script src="{{ url('js/bootstrap.min.js') }}"></script>
    <!-- JS | jquery plugin collection for this theme -->
    <script src="{{ url('js/jquery-plugin-collection.js') }}"></script>

    <!-- Revolution Slider 5.x SCRIPTS -->
    <script src="{{ url('js/revolution-slider/js/jquery.themepunch.tools.min.js') }}"></script>
    <script src="{{ url('js/revolution-slider/js/jquery.themepunch.revolution.min.js') }}"></script>
    <script charset="UTF-8" src="//cdn.sendpulse.com/28edd3380a1c17cf65b137fe96516659/js/push/032cdb76ad646524fe81acb93629f244_1.js" async></script>


</head>
<body class="boxed-layout pb-40 pt-sm-0" data-bg-img="{{ url('images/pattern/p5.png') }}">
    {{--{!! $main->asUl() !!}--}}
    {{--{!! $crumbs->asUl() !!}--}}
    <div id="wrapper" class="clearfix">
        <!-- preloader -->
        @if (!isset($_GET['no_preloader']))
            <div id="preloader">
                <div id="spinner">
                    <img class="floating ml-5" src="{{ url('/images/preloaders/13.png') }}" alt="">
                    <h5 class="line-height-50 font-18">Бхакти-лата растёт...</h5>
                </div>
            </div>
        @endif

        <!-- Header -->

        <header id="header" class="header">
            <div class="header-top bg-deep xs-text-center">
                <div class="container">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="widget no-border m-0">
                                <ul class="list-inline xs-text-center mt-5">
                                    <li class="m-0 pl-10 pr-10"> <a class="text-gray" href="#footer">Подпишитесь на новости</a> </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-9">
                            <div class="widget no-border m-0">
                                <ul class="styled-icons icon-dark icon-circled icon-theme-colored icon-sm text-right">
                                    <li style="vertical-align: middle;"><span style="line-height: 30px;">Присоединяйтесь:</span></li>
                                    <li style="vertical-align: middle;"><a target="_blank" href="https://vk.com/bhaktilata"><i class="fa fa-vk"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="header-nav">
                <div class="header-nav-wrapper navbar-scrolltofixed bg-lightest" style="z-index: 1000;">
                    <div class="container">
                        <nav id="menuzord" class="menuzord default bg-lightest menuzord-responsive">
                            <a class="menuzord-brand pull-left flip xs-pull-center mt-10" href="/">
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
        <footer id="footer" class="footer pb-0 bg-black-111">
            <div class="container pt-70 pb-40">
                <div class="row multi-row-clearfix" style="text-align:center;">
                    <div class="col-sm-6 col-md-3">
                        <div class="widget dark"> <img alt="" src="{{ url('images/logo-wide2.png') }}">
                            <ul class="styled-icons icon-dark mt-20" style="display:inline-block">
                                <li><a href="https://vk.com/bhaktilata" data-bg-color="#3B5998" style="background: rgb(59, 89, 152) none repeat scroll 0% 0% !important;"><i class="fa fa-vk"></i></a></li>
                                <li><a href="https://www.youtube.com/channel/UCJqCv7PHvvKTBEYSy9_Rveg?spfreload=10" data-bg-color="#C22E2A" style="background: rgb(194, 46, 42) none repeat scroll 0% 0% !important;"><i class="fa fa-youtube"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="widget dark">
                            <div class="form-outer sp-force-hide"><style class="" id="subscribe-form-style" >.sp-force-hide { display: none;
                                    }
                                    .sp-form[sp-id="80531"] { display: block; background: #111111; padding: 15px; width: 500px; max-width: 100%; border-radius: 8px; -moz-border-radius: 8px; -webkit-border-radius: 8px; border-color: #111111; border-style: solid; border-width: 1px; font-family: Arial, "Helvetica Neue", sans-serif;
                                    }
                                    .sp-form[sp-id="80531"] .sp-form-control { background: #ffffff; border-color: #cccccc; border-style: solid; border-width: 1px; font-size: 15px; padding-left: 8.75px; padding-right: 8.75px; border-radius: 4px; -moz-border-radius: 4px; -webkit-border-radius: 4px; height: 35px; width: 100%;
                                    }
                                    .sp-form[sp-id="80531"] .sp-field label { color: #ffffff; font-size: 13px; font-style: normal; font-weight: bold;
                                    }
                                    .sp-form[sp-id="80531"] .sp-button { border-radius: 4px; -moz-border-radius: 4px; -webkit-border-radius: 4px; background-color: #63a93a; color: #ffffff; width: auto; font-weight: 700; font-style: normal; font-family: Arial,sans-serif; box-shadow: none; -moz-box-shadow: none; -webkit-box-shadow: none;
                                    }
                                    .sp-form[sp-id="80531"] .sp-button-container { text-align: center;
                                    }
                                </style> <div class="sp-form sp-form-regular sp-form-embed" id="sp-form-80531" sp-show-options="%7B%22amd%22%3Afalse%2C%22condition%22%3A%22onEnter%22%2C%22delay%22%3A10%2C%22repeat%22%3A3%2C%22background%22%3A%22dark%22%2C%22position%22%3A%22bottom-right%22%7D" sp-lang="ru" sp-hash="dfffbe5e7019df8a5c4e831fa848fdba24a1304188175fb54f52c0788c4789b4" sp-id="80531"> <div class="sp-message"> <div></div> </div> <div class="sp-element-container ui-sortable ui-droppable" id="droppableArea" ><div class="sp-field " sp-id="sp-27f995f7-a6fd-42be-a6b8-f642eeb618f9" > <div class=" " style="line-height: 1.2; font-family: inherit;" ><p style="text-align: center;"><span style="color: #ffffff; font-size: 24px;">Подпишитесь на нашу рассылку</span></p>
                                                <p><span style="color: #ffffff;">Отправляя данную форму, даю согласие на обработку моих персональных данных в соответствии с <a href="/docs/policy.pdf" target="_blank" rel="noopener">политикой в отношении обработки персональных данных</a> и <a href="/docs/terms.pdf" target="_blank" rel="noopener">пользовательским соглашением</a>.</span></p></div> </div><div class="sp-field " sp-id="sp-040cd649-37b5-45a3-92cb-31659113bb45" > <label class="sp-control-label "> <span class="">Email</span> <strong class="" >*</strong> </label> <input name="sform[email]" class="sp-form-control " required="required" type="email" placeholder="Ваш e-mail" sp-tips="%7B%22required%22%3A%22%D0%9E%D0%B1%D1%8F%D0%B7%D0%B0%D1%82%D0%B5%D0%BB%D1%8C%D0%BD%D0%BE%D0%B5%20%D0%BF%D0%BE%D0%BB%D0%B5%22%2C%22wrong%22%3A%22%D0%9D%D0%B5%D0%B2%D0%B5%D1%80%D0%BD%D1%8B%D0%B9%20email-%D0%B0%D0%B4%D1%80%D0%B5%D1%81%22%7D" sp-type="email"> </div></div> <div class="sp-field sp-button-container " sp-id="sp-0c20a21b-5cfd-4493-9dd0-ceca6c0fdd2f" > <button class="sp-button " id="sp-0c20a21b-5cfd-4493-9dd0-ceca6c0fdd2f"> Подписаться </button> </div> <div class="sp-link-wrapper sp-brandname__center " > </div> </div> <script src="//login.sendpulse.com/apps/fc3/build/default-handler.js" type="text/javascript"></script></div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                        <div class="widget dark">
                            <h5 class="widget-title line-bottom">Новые фото</h5>
                            <div id="flickr-feed" class="clearfix">
                                <script type="text/javascript" src="https://www.flickr.com/badge_code_v2.gne?count=9&amp;display=latest&amp;size=s&amp;layout=x&amp;source=user&amp;user=157921558@N08">
                                </script>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-nav bg-black-222 p-20">
                <div class="row text-center">
                    <div class="col-md-12">
                        <p class="text-white font-11 m-0">© 2017, Бхакти-лата. Все права защищены.</p>
                    </div>
                </div>
            </div>
        </footer>

        <a class="scrollToTop" href="#"><i class="fa fa-angle-up"></i></a>
    </div>
    <!-- end wrapper -->

    <!-- Footer Scripts -->
    <script type="text/javascript" src="//vk.com/js/api/share.js?93"></script>
    <!-- JS | Custom script for all pages -->
    <script src="{{ url('js/custom.js') }}"></script>
</body>
</html>
