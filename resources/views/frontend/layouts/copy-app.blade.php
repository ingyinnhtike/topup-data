<!doctype html>
<html class="no-js" lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Payment Portal')</title>
    <link rel="shortcut icon" href="" type="image/vnd.microsoft.icon" />
    <link href='https://fonts.googleapis.com/css?family=Raleway:400,300,500,700,900' rel='stylesheet' type='text/css'>

    <!-- Meta -->
    <meta name="description" content="@yield('meta_description', 'Default Description')">
    <meta name="author" content="@yield('meta_author', '')">
    @yield('meta')

    <!-- Styles -->
    @yield('before-styles')

    <!-- Check if the language is set to RTL, so apply the RTL layouts -->
    <!-- Otherwise apply the normal LTR layouts -->

    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />

    @yield('after-styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">

    <!-- Html5 Shim and Respond.js IE8 support of Html5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    {{ Html::script('https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js') }}
    {{ Html::script('https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js') }}
    <![endif]-->

    <link rel="manifest" href="/js/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="/2C2PFrontEnd/RedirectV3/images/icons/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">

    <title>2C2P Secure Payment</title>

    <link href="/css/bootstrap.css" rel="stylesheet">
    <link href="/css/polyglot-language-switcher.css" rel="stylesheet" type="text/css">

    <link href="/css/base.css" rel="stylesheet" type="text/css">
    <link href="/css/2c2p.css" rel="stylesheet" type="text/css">
    <link href="/css/samsunghelp.css" rel="stylesheet" type="text/css">
    <style type="text/css">
        @font-face {
            font-family: 'MON3 Anonta 1';
            src: local('MON3 Anonta 1'), url('Content/mon3.woff') format('woff'), url('Content/mon3.ttf') format('ttf'), url('Content/mon3.eot') format('eot');
        }

        #my, .my {
            font-family: "MON3 Anonta 1", Helvetica, Arial;
        }
    </style>

    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>


</head>
<body style="">

<!-- Header Begin-->
<div class="navbar">
    <div class="navbar-inner">
        <div class="container">

            <a id="brand-link" href="http://www.2c2p.com" target="_blank" class="brand">
                <div id="logo"><img src="/images/logo-light-text.png" alt="Blue Planet" style="height: 50px;"></div>
            </a>

            <a id="brand-nolink" href="#" class="brand">
                <div id="logo"></div>
            </a>

            <div style="clear: both;"></div>
        </div>
    </div>
</div>
<!-- Header End -->
@yield('content')

<div class="footer">
    <div class="container">
        <a href="#" target="_blank" style="float:left">© 2018 Blue Planet. Ltd. All Rights Reserved</a>
        <div class="logo-wrapper clearfix">
            <div class="client_logo visalogo"></div>
            <div class="client_logo masterlogo"></div>
            <div class="client_logo jcblogo"></div>
            <div class="client_logo amerexlogo"></div>
        </div>

    </div>
</div>
<!-- Footer End -->
<!-- Loading -->
<div class="modal hide" id="loadingModal">
    <div class="modal-body box-loading">
        <div class="progress progress-striped active">
            <div class="bar" style="width: 100%;"></div>
        </div>
        <h2>Please wait a while...</h2>
        <p>We are processing your payment.</p>
    </div>
</div>


<!-- About Us -->
<div class="modal hide" id="aboutModal">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <div class="modal-body box-modal">
        <h2>Feedback</h2>
        <div class="box-aboutus">


            <div>
                <div> <div style="float:left;"><h2>Send us your feedback</h2></div><div style="float:left;margin:10px 0px 0px 30px;"><label id="lblAboutUsMsg"></label></div></div>
                <div style="clear:both;"></div>
                <form action="/2C2PFrontEnd/RedirectV3/" autocomplete="off" defaultbutton="btnAboutUsSubmit" id="about_us_form" method="post" name="about_us_form" novalidate="novalidate"><input name="__RequestVerificationToken" type="hidden" value="MbJIRiWScjRcDIYFeLr-hCguv-ZM0Q6ivA8RcTRj6oDLef1bQzodaf_0xpoGTg2ThrziyultNpDKKVGyYx-Fm_8isSfT7Oeb1a3wY5ehab41">              <div class="row-fluid">
                        <div class="span6">
                            <p>

                                <input autocomplete="off" class="span10 required" id="about_us_name" maxlength="50" name="about_us_name" placeholder="Your name" tabindex="1" type="text" value="">
                                <label id="err_about_us_name" class="text-error"></label>
                            </p>
                            <p>
                                <input autocomplete="off" class="span10 required" id="about_us_email" maxlength="50" name="about_us_email" placeholder="Your email address" tabindex="2" type="text" value="">
                                <label id="err_about_us_email" class="text-error"></label>
                            </p>

                        </div>
                        <div class="span6">
                            <textarea autocomplete="off" class="span10 required" cols="20" id="about_us_message" maxlength="1000" name="about_us_message" placeholder="Your feedback message" rows="2" style="overflow:auto;height:160px;width:300px;margin-bottom:5px;resize: none;" tabindex="3"></textarea>
                            <label class="text-error"></label>
                        </div>

                    </div>
                    <div class="form-actions">
                        <br>
                        <input class="inputbtn btn-primary" id="btnAboutUsSubmit" type="button" tabindex="4" value="Send Message">
                        <img id="loadingimg" src="/2C2PFrontEnd/RedirectV3/images/processing.gif" alt="" style="position: relative; display: none;">


                    </div>
                </form>
                <div style="display:none;" id="divlanguages">
                    <span id="aboutus_name">Your name</span>
                    <span id="aboutus_email">Your email address</span>
                    <span id="aboutus_message">Your feedback message</span>

                    <span id="aboutus_msg_email_sent">Email is sent successfully</span>
                    <span id="aboutus_msg_email_failed">System is unable to send email. You may try again later</span>

                    <span id="aboutus_msg_name_required">Please enter your name</span>
                    <span id="aboutus_msg_name_invalid">Name allows characters and -_,'. &amp; only.</span>
                    <span id="aboutus_msg_email_required">Please enter your email</span>
                    <span id="aboutus_msg_email_invalid">Please enter valid email</span>
                    <span id="aboutus_msg_message_required">Please enter message</span>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Help Topics -->
<div class="modal hide" id="helpModal">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <div class="modal-body box-modal">
        <h2>Help Topics</h2>
        <div class="box-help-topics">
            <iframe src=""></iframe>


        </div>
    </div>
</div>


<script src="/js/jquery-1.10.2.min.js" type="text/javascript"></script>
<script src="/js/bootstrap.js" type="text/javascript"></script>
<script src="/js/jquery.flexText.min.js" type="text/javascript"></script>

<script src="/js/jquery.mousewheel.js" type="text/javascript"></script>
<script src="/js/jquery.jscrollpane.min.js" type="text/javascript"></script>



<script src="/js/jquery.validate.1.11.1.js" type="text/javascript"></script>
<script src="/js/messages_en.js" type="text/javascript"></script>

<script src="/js/jquery.polyglot.language.switcher.js" type="text/javascript"></script>




<script src="/js/jquery.watermark.js" type="text/javascript"></script>
<script src="/js/aboutus.js" type="text/javascript"></script>

<script src="/js/jquery.signalR-2.2.0.min.js" type="text/javascript"></script>

<script src="/js/kaelQrcode.js" type="text/javascript"></script>
<script src="/js/qrcode.js" type="text/javascript"></script>

{{--<div id="pjax" class="wrapper">--}}


{{--<!-- Content Wrapper. Contains page content -->--}}
    {{--<div class="content-wrapper">--}}
        {{--<!-- Content Header (Page header) -->--}}
        {{--<section class="content-header">--}}
            {{--@yield('page-header')--}}

            {{-- Change to Breadcrumbs::render() if you want it to error to remind you to create the breadcrumbs for the given route --}}
            {{--{!! Breadcrumbs::renderIfExists() !!}--}}
        {{--</section>--}}

        {{--<!-- Main content -->--}}
        {{--<section class="content">--}}
            {{--@yield('content')--}}
        {{--</section><!-- /.content -->--}}
    {{--</div><!-- /.content-wrapper -->--}}

{{--</div><!-- ./wrapper -->--}}

<!-- JavaScripts -->
@yield('before-scripts')

<script src="https://cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>

@yield('after-scripts')

<script>
    $(function () {
        $('.select').select2();
        $(document).pjax('a', '#pjax')
    });
</script>

</body>
</html>