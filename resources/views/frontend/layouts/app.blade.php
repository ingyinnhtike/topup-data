<!doctype html>
<html class="no-js" lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Blue Planet')</title>
    <link rel="shortcut icon" href="" type="image/vnd.microsoft.icon"/>
    <link href='https://fonts.googleapis.com/css?family=Raleway:400,300,500,700,900' rel='stylesheet' type='text/css'>

    <!-- Meta -->
    <meta name="description" content="@yield('meta_description', 'Default Description')">
    <meta name="author" content="@yield('meta_author', '')">
@yield('meta')

<!-- Styles -->
@yield('before-styles')

<!-- Check if the language is set to RTL, so apply the RTL layouts -->
    <!-- Otherwise apply the normal LTR layouts -->

    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet"/>

    @yield('after-styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">

    <!-- Html5 Shim and Respond.js IE8 support of Html5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    {{ Html::script('https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js') }}
    {{ Html::script('https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js') }}
    <![endif]-->

    <link rel="manifest" href="{{ url('/js/manifest.json') }}">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="/2C2PFrontEnd/RedirectV3/images/icons/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">

    <title>2C2P Secure Payment</title>

    <link href="{{ url('/css/bootstrap.css')}}" rel="stylesheet">

    <link rel="stylesheet" href="{{ url('css/bootstrap-select.css')}}"><!-- bootstrap-select-CSS -->
    <link href="{{ url('css/font-awesome.css')}}" rel="stylesheet" type="text/css" media="all"/><!-- Fontawesome-CSS -->
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script type='text/javascript' src="{{ url('js/jquery-2.2.3.min.js')}}"></script>
    <!-- Custom Theme files -->
    <!--theme-style-->
    <link href="{{ url('css/style.css')}}" rel="stylesheet" type="text/css" media="all"/>
    <!--//theme-style-->
    <!--meta data-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="keywords" content="Blue Planet"/>
    <script type="application/x-javascript"> addEventListener("load", function () {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        } </script>
    <!--//meta data-->
    <!-- online fonts -->
    <link href="//fonts.googleapis.com/css?family=Montserrat:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&amp;subset=latin-ext,vietnamese"
          rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Oxygen:300,400,700&amp;subset=latin-ext" rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i&amp;subset=cyrillic,cyrillic-ext,greek,greek-ext,latin-ext,vietnamese"
          rel="stylesheet">
    <!-- /online fonts -->

    <style type="text/css">

        @font-face {
            font-family: 'MON3 Anonta 1';
            src: local('MON3 Anonta 1'), url('Content/mon3.woff') format('woff'), url('Content/mon3.ttf') format('ttf'), url('Content/mon3.eot') format('eot');
        }

        #my, .my {
            font-family: "MON3 Anonta 1", Helvetica, Arial;
        }
    </style>
    <style>
        .cc-selector input {
            margin: 0;
            padding: 0;
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
        }

        .cash {
            background-image: url(http://www.pcstoragefacility.com/files/QuickSiteImages/cash_logo.jpg)
        }

        .card {
            background-image: url({{asset('images/creditcard.svg')}})
        }

        .visa {
            background-image: url(http://i.imgur.com/lXzJ1eB.png);
        }

        .paypal {
            background-image: url(http://www.iconninja.com/files/35/91/763/online-shopping-paypal-checkout-service-card-payment-method-money-transfer-icon.svg);
        }

        .mastercard {
            background-image: url(http://i.imgur.com/SJbRQF7.png);
        }

        .bank {
            background-image: url(http://www.iconninja.com/files/154/587/709/online-shopping-checkout-card-payment-method-bank-transfer-service-icon.svg);
        }

        .onetwothree {
            background-size: 70px 43px !important;
            background-image: url({{asset('images/123_logo.png')}});
        }

        .cc-selector input:active + .drinkcard-cc {
            opacity: .9;
        }

        .cc-selector input:checked + .drinkcard-cc {
            -webkit-filter: none;
            -moz-filter: none;
            filter: none;
        }

        .drinkcard-cc {
            cursor: pointer;
            background-size: contain;
            background-repeat: no-repeat;
            display: inline-block;
            width: 100px;
            height: 70px;
            -webkit-transition: all 100ms ease-in;
            -moz-transition: all 100ms ease-in;
            transition: all 100ms ease-in;
            -webkit-filter: brightness(1.8) grayscale(1) opacity(.7);
            -moz-filter: brightness(1.8) grayscale(1) opacity(.7);
            filter: brightness(1.8) grayscale(1) opacity(.7);
        }

        .drinkcard-cc:hover {
            -webkit-filter: brightness(1.2) grayscale(.5) opacity(.9);
            -moz-filter: brightness(1.2) grayscale(.5) opa012city(.9);
            filter: brightness(1.2) grayscale(.5) opacity(.9);
        }

        /* Extras */
        a:visited {
            color: #888
        }

        a {
            color: #444;
            text-decoration: none;
        }

        .border-box{
            text-align: center;
        }
    </style>
    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>

</head>
<body>

<!--header-->
<header>
    <div class="container">
        <!--logo-->
        <div class="logo">
            {{--<h1><a href="" style="color: white">Payment Portal</a></h1>--}}
            <h1><a href="" style="color: white;"><img src="{{asset(env('logo'))}}" width="200" height="50"></a></h1>
        </div>

        <div class="clearfix"></div>

    </div>
</header>

<!--//-->
<div class=" header-right">
    <div class="banner">
        <div class="slider">
            <div class="callbacks_container">
                <ul class="rslides" id="slider">
                    <li>
                        <div class="banner1">
                            <div class="caption">
                                <p><img src="{{asset('images/logo.png')}}" width="230"></p><br>
                                <h3><span>Get a</span> coupon voucher on Mobile Recharge</h3>
                                <p><a href="#mobilew3layouts" class="scroll">Recharge now</a></p>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="banner2">
                            <div class="caption">
                                <p><img src="{{asset('images/logo.png')}}" width="230"></p><br>
                                <h3><span>50% off</span> on train Tickets</h3>
                                <p><a href="">Book now</a></p>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="banner3">
                            <div class="caption">
                                <p><img src="{{asset('images/logo.png')}}" width="230"></p><br>
                                <h3><span>Flat Rs.200 Cash back</span> on Movie Tickets</h3>
                                <p><a href="">Book now</a></p>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="banner4">
                            <div class="caption">
                                <p><img src="{{asset('images/logo.png')}}" width="230"></p><br>
                                <h3><span>Upto Rs.125 Discount </span> & Flat 100% Money Back</h3>
                                <p><a href="">Book now</a></p>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>


<!--Vertical Tab-->
@yield('content')
<!--Plug-in Initialisation-->
<script type="text/javascript">
    $(document).ready(function () {

        //Vertical Tab
        $('#parentVerticalTab').easyResponsiveTabs({
            type: 'vertical', //Types: default, vertical, accordion
            width: 'auto', //auto or any width like 600px
            fit: true, // 100% fit in a container
            closed: 'accordion', // Start closed if in accordion view
            tabidentify: 'hor_1', // The tab groups identifier
            activate: function (event) { // Callback function if tab is switched
                var $tab = $(this);
                var $info = $('#nested-tabInfo2');
                var $name = $('span', $info);
                $name.text($tab.text());
                $info.show();
            }
        });
    });
</script>
<!-- //Categories -->



<!-- Support content -->
<div class="w3l-support">
    <div class="container">
        <div class="col-md-5 w3_agile_support_left">
            <img src="images/su.jpg" alt=" " class="img-responsive"/>
        </div>
        <div class="col-md-7 w3_agile_support_right">
            <h5>Blue Planet</h5>
            <h3>Customer Service Support</h3>
            <p>

                Blue Planet is a leading in mobile application company in Myanmar
                specializing on providing Value Added Services (VAS) for various telecom operators,
                enterprises and content providers alike to render exquisite and innovative services in a very
                cost effective way. We believe in providing the highest quality solutions in a very simplified way.

            </p>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
<!-- //Support content -->


<!--offers-->
<div class="w3-offers">
    <div class="container">
        <div class="w3-agile-offers">
            <h3>the best offers</h3>
            <p>
                Payment Gateway Solution is when a customer orders a product from a payment gateway-enabled merchant,
                the payment gateway performs a variety of tasks to process the transaction
            </p>
        </div>
    </div>
</div>
<!--//offers-->

<!--partners-->
<div class="w3layouts-partners">
    <h3>We are accepted at</h3>
    <br><br><br>
    <div class="container">
        <div class="row" style="width: 110%;">
            <div class="col-md-3 col-sm-6">
                <div class="border-box">
                    <a href="#"> <img src="{{ url('images/mpu.png') }}" width="100" alt="clients"> </a>
                </div><!-- /.border-box -->
            </div><!-- /.col-md-3 -->
            <div class="col-md-3 col-sm-6">
                <div class="border-box">
                    <a href="#"> <img src="{{ url('images/kbz.jpeg') }}" width="100" alt="clients"> </a>
                </div><!-- /.border-box -->
            </div><!-- /.col-md-3 -->
            <div class="col-md-3 col-sm-6">
                <div class="border-box">
                    <a href="#"> <img src="{{ url('images/2c2p.png') }}" width="100" alt="clients"> </a>
                </div><!-- /.border-box -->
            </div><!-- /.col-md-3 -->

        </div>
    </div>
    <br><br><br>
    <div class="container">
        <div class="row" style="width: 110%;">
            <div class="col-md-3 col-sm-6">
                <div class="border-box">
                    <a href="#"> <img src="{{ url('images/wavemoneylogo.jpeg') }}" width="100" alt="clients"> </a>
                </div><!-- /.border-box -->
            </div><!-- /.col-md-3 -->
            <div class="col-md-3 col-sm-6">
                <div class="border-box">
                    <a href="#"> <img src="{{ url('images/coda.jpg') }}" width="150" alt="clients"> </a>
                </div><!-- /.border-box -->
            </div><!-- /.col-md-3 -->
            <div class="col-md-3 col-sm-6">
                <div class="border-box">
                    <a href="#"> <img src="{{ url('/images/okdollarlogo.png') }}" width="100" alt="clients"> </a>
                </div><!-- /.border-box -->
            </div><!-- /.col-md-3 -->
            <div class="col-md-3 col-sm-6">
                <div class="border-box">

                </div><!-- /.border-box -->
            </div><!-- /.col-md-3 -->
        </div>
        {{--<ul>--}}
            {{--<li><img class="img-responsive" src="{{ url('images/mpu.png') }}" alt="" width="60"></li>--}}
            {{--<li><img class="img-responsive" src="{{ url('images/kbz.jpeg') }}" alt="" width="60"></li>--}}
            {{--<li><img class="img-responsive" src="{{ url('images/2c2p.png') }}" alt="" width="60"></li>--}}
            {{--<li><img class="img-responsive" src="{{ url('/images/okdollarlogo.png') }}" width="60" alt=""></li>--}}
            {{--<li><img class="img-responsive" src="{{ url('images/wavemoneylogo.jpeg') }}" width="60" alt=""></li>--}}
            {{--<li><img class="img-responsive" src="{{ url('images/coda.jpg') }}" alt=""></li>--}}
        {{--</ul>--}}

    </div>
</div>
<!--//partners-->


<!--footer-->
<footer>
    <div class="container-fluid">

        <div class="clearfix"></div>
    </div>
    </div>
    <div class="w3l-footer-bottom">
        <div class="container-fluid">
            <div class="col-md-4 w3-footer-logo">
                {{--<h2><a href="index.html">PAYMENT PORTAL</a></h2>--}}
            </div>
            <div class="col-md-8 agileits-footer-class">
                <p>© 2019 Blue Planet. All Rights Reserved | Design by <a href="https://blueplanet.com.mm/" target="_blank">Blue Planet</a></p>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</footer>

<!-- for bootstrap working -->
<script src="{{ url('js/bootstrap.js')}}"></script>
<!-- //for bootstrap working --><!-- Responsive-slider -->
<!-- Banner-slider -->
<script src="{{ url('js/responsiveslides.min.js')}}"></script>
<script>
    $(function () {
        $("#slider").responsiveSlides({
            auto: true,
            speed: 500,
            namespace: "callbacks",
            pager: true,
        });
    });
</script>
<!-- //Banner-slider -->
<!-- //Responsive-slider -->
<!-- Bootstrap select option script -->
<script src="{{ url('js/bootstrap-select.js')}}"></script>
<script>
    $(document).ready(function () {
        var mySelect = $('#first-disabled2');

        $('#special').on('click', function () {
            mySelect.find('option:selected').prop('disabled', true);
            mySelect.selectpicker('refresh');
        });

        $('#special2').on('click', function () {
            mySelect.find('option:disabled').prop('disabled', false);
            mySelect.selectpicker('refresh');
        });

        $('#basic2').selectpicker({
            liveSearch: true,
            maxOptions: 1
        });
    });
</script>
<!-- //Bootstrap select option script -->

<!-- easy-responsive-tabs -->
<link rel="stylesheet" type="text/css" href="{{ url('css/easy-responsive-tabs.css')}}"/>
<script src="{{ url('js/easyResponsiveTabs.js')}}"></script>
<!-- //easy-responsive-tabs -->
<!-- here stars scrolling icon -->
<script type="text/javascript">
    $(document).ready(function () {
        /*
            var defaults = {
            containerID: 'toTop', // fading element id
            containerHoverID: 'toTopHover', // fading element hover id
            scrollSpeed: 1200,
            easingType: 'linear'
            };
        */

        $().UItoTop({easingType: 'easeOutQuart'});

    });
</script>
<!-- start-smoth-scrolling -->
<script type="text/javascript" src="{{ url('js/move-top.js') }}"></script>
<script type="text/javascript" src="{{ url('js/easing.js') }}"></script>
<script type="text/javascript">
    jQuery(document).ready(function ($) {
        $(".scroll").click(function (event) {
            event.preventDefault();
            $('html,body').animate({scrollTop: $(this.hash).offset().top}, 1000);
        });
    });
</script>
<!-- start-smoth-scrolling -->
<!-- //here ends scrolling icon -->
@yield('before-scripts')

<script src="https://cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>

@yield('after-scripts')

<script>
    $(function () {
        $('.select').select2();
        $(document).pjax('a', '#pjax')
    });
</script>
{{--<script language="JavaScript">--}}
    {{--/**--}}
     {{--* Disable right-click of mouse, F12 key, and save key combinations on page--}}
     {{--* By Arthur Gareginyan (arthurgareginyan@gmail.com)--}}
     {{--* For full source code, visit https://mycyberuniverse.com--}}
     {{--*/--}}
    {{--window.onload = function() {--}}
        {{--document.addEventListener("contextmenu", function(e){--}}
            {{--e.preventDefault();--}}
        {{--}, false);--}}
        {{--document.addEventListener("keydown", function(e) {--}}
            {{--//document.onkeydown = function(e) {--}}
            {{--// "I" key--}}
            {{--if (e.ctrlKey && e.shiftKey && e.keyCode == 73) {--}}
                {{--disabledEvent(e);--}}
            {{--}--}}
            {{--// "J" key--}}
            {{--if (e.ctrlKey && e.shiftKey && e.keyCode == 74) {--}}
                {{--disabledEvent(e);--}}
            {{--}--}}
            {{--// "S" key + macOS--}}
            {{--if (e.keyCode == 83 && (navigator.platform.match("Mac") ? e.metaKey : e.ctrlKey)) {--}}
                {{--disabledEvent(e);--}}
            {{--}--}}
            {{--// "U" key--}}
            {{--if (e.ctrlKey && e.keyCode == 85) {--}}
                {{--disabledEvent(e);--}}
            {{--}--}}
            {{--// "F12" key--}}
            {{--if (event.keyCode == 123) {--}}
                {{--disabledEvent(e);--}}
            {{--}--}}
        {{--}, false);--}}
        {{--function disabledEvent(e){--}}
            {{--if (e.stopPropagation){--}}
                {{--e.stopPropagation();--}}
            {{--} else if (window.event){--}}
                {{--window.event.cancelBubble = true;--}}
            {{--}--}}
            {{--e.preventDefault();--}}
            {{--return false;--}}
        {{--}--}}
    {{--};--}}
{{--</script>--}}
</body>
</html>