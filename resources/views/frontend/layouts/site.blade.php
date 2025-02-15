<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="x-pjax-version" content="v123">
    <meta name="google-site-verification" content="9ZUxphxZ-0d53GHWNe8IGbzrXx2L_SR-hnGuBd0fJ6o" />
    <title>@yield('title', app_name())</title>

    <!-- Meta -->
    <meta name="description" content="@yield('meta_description', 'Blue Planet')">
    <meta name="author" content="@yield('meta_author', 'Nyi Nyi Lwin')">
    <meta name="keywords" content="sms gateway , myanmar , blast sms">

    <link rel="shortcut icon" href="{{ url('uploads/general') .'/' .  Settings::get('favicon') }}" type="image/vnd.microsoft.icon" />

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <style>
        .tt-nav.sticky .logo-brand img, .tt-nav.sticky .logo-brand img.retina {
            height: 45px !important;
        }

        a,a:focus,a:hover,a>*{outline:0;text-decoration:none}body,h1,h2,h3,h4,h5,h6,html{font-family:Raleway,sans-serif!important}.hero-clouds,.overlay:before{left:0;top:0;position:absolute}.error-info h1,.error-wrapper-alt h1{text-shadow:5px 5px 0 #dadada,-1px -1px 0 #dadada,1px -1px 0 #dadada,-1px 1px 0 #dadada,1px 1px 0 #dadada}.mfp-iframe-holder .mfp-close:hover,.mfp-image-holder .mfp-close:hover,a,a>*{cursor:pointer}.overlay:before,.progress-dot::before{content:""}body{font-size:14px;line-height:29px;font-weight:500;color:#999;background-color:#fff;overflow-x:hidden;-webkit-text-size-adjust:100%;-webkit-overflow-scrolling:touch;-webkit-font-smoothing:antialiased!important}.active-search,.btn-download span,.contact-info .address,.contact-info .mail,.contact-info .phone,.overflow-hidden,.profile .author-meta,.tt-animate i{overflow:hidden}body,html{width:100%;height:100%}a{color:#ed145b}a:focus,a:hover{color:#03a9f4}.form-control,.navbar a,a{-webkit-transition:all .3s ease;-moz-transition:all .3s ease;-ms-transition:all .3s ease;-o-transition:all .3s ease;transition:all .3s ease}h1,h2,h3,h4,h5,h6{font-weight:400;color:#202020;margin:0 0 15px}h1{font-size:40px}h2{font-size:20px}h3{font-size:18px}h4{font-size:16px}h5{font-size:14px}h6{font-size:12px}hr,p img{margin:0}p{margin:0 0 30px;line-height:30px}.btn{height:50px!important;padding:12px 20px!important;font-size:16px!important;line-height:26px!important;border-radius:2px!important;background-color:#03a9f4!important;border:0!important}.border-tb,.border-top{border-top:1px solid #eee}.btn-lg{padding:12px 38px}@media screen and (max-width:767px){.btn-lg{height:auto;font-size:14px;padding:8px 25px}}.btn:hover{background-color:#03a9f4}.btn.active,.btn:active{box-shadow:0 5px 11px 0 rgba(0,0,0,.18),0 4px 15px 0 rgba(0,0,0,.15)}.btn.white,.btn.white:focus,.btn.white:hover{color:#03a9f4}.btn i.material-icons{font-size:20px}.btn.focus,.btn:focus,.btn:hover{color:#fff}.btn:focus,button:focus{outline:0!important}.search-trigger .search-btn:active,.search-trigger .search-btn:focus,.search-trigger:focus{outline:0}.btn-download{padding:16px 38px;text-align:left;line-height:22px;height:75px}.btn-download i{font-size:30px;line-height:48px}.btn-download span{display:block!important}.btn-download strong{display:block;font-size:20px;font-weight:900;text-transform:uppercase}address{margin:30px 0 0;font-style:normal;line-height:25px}.food-menu-label,.food-menu-price{font-style:italic}address hr{margin-top:20px;margin-bottom:20px}thead{color:#272829;background-color:#f5f5f5;border-bottom:1px solid #eee}.contact-form-bg,.contact-form-wrapper{background:url(assets/img/vactor-map.png) center center no-repeat}.table>thead>tr>th{padding:12px 8px;border-bottom:0}.table>tbody>tr>td,.table>tbody>tr>th{color:#666;padding:15px 8px;border-top:1px solid #eee}.contact-info i{font-size:30px;line-height:38px;float:left;margin-right:18px;padding-left:2px}.contact-info .mail a{color:#999}.contact-info .mail a:hover{color:#03a9f4}#mapcontent p{margin:0}.contact-form-bg{background-size:contain}@media (min-width:992px){#contactForm .submit-button{float:right}}.form-control{border-radius:0}.input-field{margin-top:45px}.input-field label{color:#999;top:0;left:0;font-size:14px;line-height:16px;font-weight:400;margin:0}.input-field label.active{font-size:12px}.alert{padding:12px 15px}.no-margin{margin:0!important}.no-gutter>[class*=col-]{padding-right:0;padding-left:0}.no-padding{padding:0!important}.section-padding{padding:110px 0}.mt-10{margin-top:10px}.mt-15{margin-top:15px}.mt-20{margin-top:20px}.mt-30{margin-top:30px}.mt-40{margin-top:40px}.mt-50{margin-top:50px}.mt-80{margin-top:80px}.mt-100{margin-top:100px}.mb-10{margin-bottom:10px!important}.mb-15{margin-bottom:15px!important}.mb-20{margin-bottom:20px!important}.mb-30{margin-bottom:30px!important}.mb-40{margin-bottom:40px!important}.mb-50{margin-bottom:50px!important}.mb-80{margin-bottom:80px!important}.mb-100{margin-bottom:100px!important}.mtb-50{margin:50px 0!important}.mr-10{margin-right:10px}.mr-20{margin-right:20px}.ml-10{margin-left:10px}.ml-20{margin-left:20px}.padding-top-50{padding-top:50px}.padding-top-70{padding-top:70px}.padding-top-90{padding-top:90px}.padding-top-100{padding-top:100px}.padding-top-110{padding-top:110px}.padding-top-120{padding-top:120px}.padding-top-160{padding-top:160px}.padding-top-220{padding-top:220px}@media screen and (max-width:768px){.padding-top-220{padding-top:170px}}.padding-bottom-20{padding-bottom:20px}.padding-bottom-30{padding-bottom:30px}.padding-bottom-50{padding-bottom:50px}.padding-bottom-70{padding-bottom:70px}.padding-bottom-80{padding-bottom:80px}.padding-bottom-90{padding-bottom:90px}.padding-bottom-100{padding-bottom:100px}.padding-bottom-110{padding-bottom:110px}.padding-bottom-120{padding-bottom:120px}.padding-bottom-190{padding-bottom:190px}@media screen and (min-width:992px){.pl-100{padding-left:100px}}.ptb-30{padding:30px 0}.ptb-50{padding:50px 0}.ptb-70{padding:70px 0}.ptb-90{padding-top:90px;padding-bottom:90px}.ptb-110{padding-top:110px;padding-bottom:110px}.ptb-120{padding-top:120px;padding-bottom:120px}.ptb-150{padding:150px 0}.ptb-190{padding:190px 0}@media screen and (max-width:991px){.mt-sm-30{margin-top:30px}.mt-sm-50{margin-top:50px}.mb-sm-30{margin-bottom:30px}.mb-sm-50{margin-bottom:50px}}@media screen and (max-width:768px){.mt-xs-30{margin-top:30px}.mt-xs-46{margin-top:46px}}.radius-2{border-radius:2px}.radius-3{border-radius:3px}.radius-4{border-radius:4px}.font-roboto{font-family:Roboto,sans-serif!important}.font-greatvibes{font-family:'Great Vibes',cursive!important}.font-20{font-size:20px}.font-25{font-size:25px}.font-30{font-size:30px}.font-35{font-size:35px}.font-40{font-size:40px}@media screen and (max-width:767px){.font-30{font-size:25px}.font-35,.font-40,h1{font-size:30px}}.line-height-40{line-height:40px}.line-height-50{line-height:50px}.text-light{font-weight:300!important}.text-regular{font-weight:400!important}.text-medium{font-weight:500!important}.text-bold{font-weight:700!important}.text-extrabold{font-weight:900!important}.dark-text{color:#202020!important}.light-grey-text{color:#dedede!important}.list-icon li{font-size:17px;line-height:40px}.list-icon li .material-icons{position:relative;top:5px}.height-200{height:200px!important}.height-350{height:350px!important}.height-450{height:450px!important}.height-650{height:650px!important}.brand-color{color:#03a9f4!important}.brand-color.darken-2{color:#0288d1!important}.brand-bg{background-color:#03a9f4!important}.brand-bg.darken-2{background-color:#0288d1!important}.brand-hover:hover{background-color:#03a9f4!important}.green-bg{background-color:#71c44c!important}.green-color{color:#71c44c!important}.pink{background-color:#ed145b!important}.white-bg{background-color:#fff!important}.gray-bg{background-color:#f5f5f5!important}.light-gray-bg{background-color:#f3f3f3!important}.light-pink-bg{background:#fff8f1!important}.dark-bg.darken-1{background:#101010!important}.dark-bg{background:#202020!important}.dark-bg.lighten-1{background-color:#1e262a!important}.dark-bg.lighten-2{background-color:#303b41!important}.dark-bg.lighten-3{background-color:#2c2c2c!important}.dark-bg.lighten-4{background-color:#373a3d!important}.border-tb{border-bottom:1px solid #eee}.overlay,.overlay .container{position:relative}.overlay:before{width:100%;height:100%;background:rgba(0,0,0,.2)}.overlay.dark-0:before{background-color:rgba(0,0,0,0)}.overlay.dark-1:before{background-color:rgba(0,0,0,.1)}.overlay.dark-2:before{background-color:rgba(0,0,0,.2)}.overlay.dark-3:before{background-color:rgba(0,0,0,.3)}.overlay.dark-4:before{background-color:rgba(0,0,0,.4)}.overlay.dark-5:before{background-color:rgba(0,0,0,.5)}.overlay.dark-6:before{background-color:rgba(0,0,0,.6)}.overlay.dark-7:before{background-color:rgba(0,0,0,.7)}.overlay.dark-8:before{background-color:rgba(0,0,0,.8)}.overlay.dark-9:before{background-color:rgba(0,0,0,.9)}.overlay.dark-10:before{background-color:rgba(0,0,0,1)}.overlay.light-0:before{background-color:rgba(255,255,255,0)}.overlay.light-1:before{background-color:rgba(255,255,255,.1)}.overlay.light-2:before{background-color:rgba(255,255,255,.2)}.overlay.light-3:before{background-color:rgba(255,255,255,.3)}.overlay.light-4:before{background-color:rgba(255,255,255,.4)}.overlay.light-5:before{background-color:rgba(255,255,255,.5)}.overlay.light-6:before{background-color:rgba(255,255,255,.6)}.overlay.light-7:before{background-color:rgba(255,255,255,.7)}.overlay.light-8:before{background-color:rgba(255,255,255,.8)}.overlay.light-9:before{background-color:rgba(255,255,255,.9)}.overlay.light-10:before{background-color:rgba(255,255,255,1)}.full-height{height:100vh;width:100%}.half-height{height:78vh!important;width:100%}.valign-wrapper{display:table;width:100%}.valign-cell{display:table-cell;vertical-align:middle}.equal-wrapper img{width:100%}.equal-wrapper-content{padding:0 120px}.equal-wrapper-content .featured-item .icon{float:left;margin-right:35px;color:#60e3f8}.intro-title{font-size:60px;font-weight:900}.sub-intro{display:block;margin:0 auto 30px}@media (min-width:768px){.sub-intro{width:60%}}.section-title{font-size:40px;margin-bottom:20px}.section-sub,.width-60{margin:0 auto}@media (min-width:992px){.section-sub{width:60%}}.width-60{width:60%}@media screen and (max-width:767px){.intro-title{font-size:35px}.section-title{font-size:30px}.section-title p,.width-60{width:100%}}.hero-clouds{width:250.625em;height:100vh;background:url(assets/img/banner/clouds.png) 0 100% repeat-x;-webkit-animation:cloudLoop 80s linear infinite;animation:cloudLoop 80s linear infinite}@-webkit-keyframes cloudLoop{0%{-webkit-transform:translate3d(0,0,0);transform:translate3d(0,0,0)}100%{-webkit-transform:translate3d(-50%,0,0);transform:translate3d(-50%,0,0)}}@keyframes cloudLoop{0%{-webkit-transform:translate3d(0,0,0);transform:translate3d(0,0,0)}100%{-webkit-transform:translate3d(-50%,0,0);transform:translate3d(-50%,0,0)}}.mouse-icon{position:absolute;left:50%;bottom:40px;border:2px solid #fff;border-radius:16px;height:40px;width:24px;margin-left:-15px;display:block;z-index:10}.mouse-icon .wheel{-webkit-animation-name:drop;-webkit-animation-duration:1s;-webkit-animation-timing-function:linear;-webkit-animation-delay:0s;-webkit-animation-iteration-count:infinite;-webkit-animation-play-state:running;animation-name:drop;animation-duration:1s;animation-timing-function:linear;animation-delay:0s;animation-iteration-count:infinite;animation-play-state:running;position:relative;border-radius:10px;background:#fff;width:2px;height:6px;top:4px;margin-left:auto;margin-right:auto}@-webkit-keyframes drop{0%{top:5px;opacity:0}30%{top:10px;opacity:1}100%{top:25px;opacity:0}}@keyframes drop{0%{top:5px;opacity:0}30%{top:10px;opacity:1}100%{top:25px;opacity:0}}.video-intro{position:relative}.video-intro .external-link{position:absolute;top:50%;left:50%;margin-top:-30px;margin-left:-30px}.mocup-wrapper,.profile .author-cover,.video-trigger i.material-icons{position:relative}.video-intro .external-link .material-icons{font-size:60px;color:rgba(255,255,255,.4);-webkit-transition:color .3s ease;-moz-transition:color .3s ease;-ms-transition:color .3s ease;transition:color .3s ease}.video-intro:hover .external-link .material-icons{color:rgba(255,255,255,.9)}.video-trigger i.material-icons{font-size:68px;color:#fff;margin:0 20px;top:24px}.mocup-wrapper img{max-width:100%}@media screen and (max-width:991px){.equal-wrapper-content{padding:50px 30px}.mocup-wrapper-sm img{width:100%}}.bg-cover,[class*=banner-]{background-size:cover!important}.banner-1{background-image:url(assets/img/banner/banner-1.jpg)}.banner-2{background-image:url(assets/img/banner/banner-2.jpg)}.banner-3{background-image:url(assets/img/banner/banner-3.jpg)}.banner-4{background-image:url(assets/img/banner/banner-4.jpg)}.banner-5{background-image:url(assets/img/banner/banner-5.jpg)}.banner-6{background-image:url(assets/img/banner/banner-6.jpg)}.banner-7{background-image:url(assets/img/banner/banner-7.jpg)}.banner-8{background-image:url(assets/img/banner/banner-8.jpg)}.banner-9{background-image:url(assets/img/banner/banner-9.jpg)}.banner-10{background-image:url(assets/img/banner/banner-10.jpg)}.banner-11{background-image:url(assets/img/banner/banner-11.jpg)}.banner-12{background-image:url(assets/img/banner/banner-12.jpg)}.banner-13{background-image:url(assets/img/banner/banner-13.jpg)}.banner-14{background-image:url(assets/img/banner/banner-14.jpg)}.banner-14.overlay::before{background-color:rgba(246,72,63,.9)}.banner-15{background-image:url(assets/img/banner/banner-15.jpg)}.banner-16{background-image:url(assets/img/banner/banner-16.jpg)}.banner-17{background-image:url(assets/img/banner/banner-17.jpg)}.banner-18{background-image:url(assets/img/banner/banner-18.jpg)}.banner-19{background-image:url(assets/img/banner/banner-19.jpg)}.banner-20{background-image:url(assets/img/banner/banner-20.jpg)}.error-wrapper{padding:50px 0}.error-wrapper i{font-size:130px;line-height:170px;text-align:center;display:block;color:#dadada}.error-info{padding-left:60px;border-left:1px solid #eee}.error-info h1{color:#fff;font-size:130px;line-height:100px;font-weight:700}.ie9 .error-info h1,.ie9 .error-wrapper-alt h1{color:#999}.error-sub{display:block;font-size:30px;line-height:45px;font-weight:700;text-transform:uppercase}@media screen and (max-width:767px){.banner-wrapper{margin-top:45px}.error-info{padding-left:0;border-left:0;text-align:center}}@media (min-width:992px){.bg-fixed{background-attachment:fixed}.error-wrapper{padding:200px 0}}.error-wrapper-alt h1{color:#fff;font-size:130px;line-height:130px;font-weight:700}.mfp-iframe-holder .mfp-close,.mfp-image-holder .mfp-close{right:-10px;padding-right:0;width:40px;text-align:center}button.mfp-arrow,button.mfp-close:focus{background-color:transparent}.mfp-bg{z-index:1055}.mfp-wrap{z-index:1056}.mfp-zoom-out-cur{cursor:default}.box-padding{padding:60px 40px}.profile .author-cover img{width:100%}.author-wrapper.profile .author-avatar{position:relative;padding:15px 20px 30px 130px}.author-wrapper.profile .author-avatar img{width:100px;height:100px;border-radius:50%;background:#fff;padding:5px;position:absolute;top:-30px;left:15px;z-index:20}.profile .author-meta{padding:0 40px}.profile .author-meta li{margin:10px 0;font-weight:500}.profile .author-meta li .title{display:inline-block;width:135px;color:#202020}.profile .author-meta li .address{float:right;width:50%}.profile .available{display:block;padding:10px;text-align:center}.profile .available a{display:inline-block;color:#999}.profile .available a:hover{color:#03a9f4}@media screen and (max-width:991px){.author-wrapper.profile{margin-top:30px}}@media screen and (max-width:479px){.box-padding .cta-button .btn{display:block;margin-top:10px}.profile .author-meta li .title{width:80px}.profile .author-meta li .address{width:60%}}.progress-section{position:relative}.progress-title{display:block;margin-bottom:8px}.progress{box-shadow:none;background-color:#eee;height:5px;overflow:visible;border-radius:0;margin-bottom:30px}.progress-bar{box-shadow:none;text-align:right}.clients-grid .border-box:hover,.screenshot-carousel-wrapper .carousel-control{box-shadow:0 2px 5px 0 rgba(0,0,0,.16),0 2px 10px 0 rgba(0,0,0,.12)}.progress-bar span{position:absolute;top:-32px;color:#999;font-size:14px;display:inline-block}.ie10 .progress-bar span,.ie11 .progress-bar span,.ie9 .progress-bar span{top:-25px;right:0}.progress .progress-bar.six-sec-ease-in-out{-webkit-transition:width 2s ease-in-out;-moz-transition:width 2s ease-in-out;-o-transition:width 2s ease-in-out;transition:width 2s ease-in-out}.progress-dot{position:relative}.progress-dot::before{width:20px;height:20px;background-color:#03a9f4;border-radius:50%;position:absolute;top:0;margin-top:-8px;right:-1px}.clients-grid .border-box{border:1px solid #eee;margin-left:-1px;margin-bottom:-1px;-webkit-transition:box-shadow .3s;-moz-transition:box-shadow .3s;-ms-transition:box-shadow .3s;transition:box-shadow .3s}.clients-grid .border-box a,.clients-grid .border-box img{display:block;margin-left:auto;margin-right:auto}.clients-grid .border-box img{padding:30px 50px;width:100%;-webkit-filter:grayscale(100%);filter:grayscale(100%);-webkit-transition:all .3s;-moz-transition:all .3s;-ms-transition:all .3s;transition:all .3s}.clients-grid .border-box img:hover{-webkit-filter:grayscale(0);filter:grayscale(0)}.clients-grid.grid-gutter .border-box{margin-bottom:30px}@media (max-width:991px){.clients-grid.gutter .border-box{margin-bottom:30px}}.gallery-thumb .flex-viewport li img{width:100%}.gallery-thumb .flex-control-thumbs{margin:-35px 0 0}.gallery-thumb .flex-control-thumbs li{width:70px;float:none;margin:0 5px}.gallery-thumb .flex-control-thumbs img{width:70px;height:70px!important;border-radius:50%;background:#fff;padding:5px;opacity:1;z-index:100;position:relative}.gallery-thumb .flex-direction-nav a{opacity:1;top:auto;bottom:45px;text-align:center}.gallery-thumb .flex-direction-nav .flex-prev{left:15px}.gallery-thumb .flex-direction-nav .flex-next{right:15px}.gallery-thumb .flex-direction-nav a.flex-next::before,.gallery-thumb .flex-direction-nav a.flex-prev::before{font-family:'Material Icons';font-size:20px;color:#fff}.gallery-thumb .flex-direction-nav a.flex-prev::before{content:'arrow_back'}.gallery-thumb .flex-direction-nav a.flex-next::before{content:'arrow_forward'}@media screen and (max-width:370px){.gallery-thumb .flex-control-thumbs li{width:50px}.gallery-thumb .flex-control-thumbs img{width:50px;height:50px!important}}.food-menu-category{padding-bottom:35px}.food-menu-category .food-menu-wrapper{-webkit-transition:box-shadow .3s ease-out;-moz-transition:box-shadow .3s ease-out;-o-transition:box-shadow .3s ease-out;-ms-transition:box-shadow .3s ease-out;transition:box-shadow .3s ease-out}.food-menu-category:hover .food-menu-wrapper{box-shadow:0 8px 17px 0 rgba(0,0,0,.2),0 6px 20px 0 rgba(0,0,0,.19)}.food-menu-intro{padding:24px}.food-menu-intro .material-icons{font-size:40px}.food-menu-list{padding:30px}.food-menu{border-bottom:1px dotted rgba(255,255,255,.5);padding:0 0 15px;margin:0 0 15px}.food-menu-title{margin-bottom:5px}.food-menu-detail{line-height:20px}.food-menu-price-detail{position:relative;text-align:right}.food-menu-label{background:#fff8f1;color:#03a9f4;display:inline-block;padding:0 10px;font-size:13px;float:right;position:relative}i[class^=flaticon-]{line-height:50px;display:inline-block}i[class^=flaticon-]:before{font-size:45px;margin-left:0}nav,nav ul li.active,nav ul li:hover{background-color:transparent}nav ul,nav ul li{float:none}nav ul a{font-size:inherit}@media only screen and (min-width:1200px){.container{width:1170px}}@media only screen and (max-width:749px){.container{width:100%}}@media only screen and (max-width:601px){.container{width:90%}}.container .row,.container-fluid .row{margin-bottom:0}.container .row{margin-right:-15px;margin-left:-15px}.row .col{padding-right:15px;padding-left:15px}.carousel{height:auto}#owl-demo .section img{display:block;width:100%;height:auto}.button-style .btn,.button-style .btn-large{margin-right:30px;margin-bottom:30px}.button-style .btn-floating i{height:auto!important}@media (max-width:767px){.equal-height-column{height:auto!important}}.tt-animate i{text-align:center;-webkit-transition:all .5s;-moz-transition:all .5s;transition:all .5s}.tt-animate i::before{speak:none;display:block;-webkit-font-smoothing:subpixel-antialiased!important;-webkit-backface-visibility:hidden;-moz-backface-visibility:hidden;-ms-backface-visibility:hidden}.tt-animate.ltr i:hover::before{-webkit-animation:LeftToRight .3s forwards;-moz-animation:LeftToRight .3s forwards;animation:LeftToRight .3s forwards}.tt-animate.ltr i:before{-webkit-animation:RightToLeft .3s forwards;-moz-animation:RightToLeft .3s forwards;animation:RightToLeft .3s forwards}.tt-animate.btt i:hover::before{-webkit-animation:BottomToTop .3s forwards;-moz-animation:BottomToTop .3s forwards;animation:BottomToTop .3s forwards}.tt-animate.btt i:before{-webkit-animation:TopToBottom .3s forwards;-moz-animation:TopToBottom .3s forwards;animation:TopToBottom .3s forwards}@-webkit-keyframes LeftToRight{49%{-webkit-transform:translate(100%)}50%{opacity:0;-webkit-transform:translate(-100%)}51%{opacity:1}}@-moz-keyframes LeftToRight{49%{-moz-transform:translate(100%)}50%{opacity:0;-moz-transform:translate(-100%)}51%{opacity:1}}@keyframes LeftToRight{49%{transform:translate(100%)}50%{opacity:0;transform:translate(-100%)}51%{opacity:1}}@-webkit-keyframes RightToLeft{49%{-webkit-transform:translate(100%)}50%{opacity:0;-webkit-transform:translate(-100%)}51%{opacity:1}}@-moz-keyframes RightToLeft{49%{-webkit-transform:translate(-100%)}50%{opacity:0;-webkit-transform:translate(100%)}51%{opacity:1}}@keyframes RightToLeft{49%{-webkit-transform:translate(100%)}50%{opacity:0;-webkit-transform:translate(-100%)}51%{opacity:1}}@-webkit-keyframes BottomToTop{49%{-webkit-transform:translateY(-100%)}50%{opacity:0;-webkit-transform:translateY(100%)}51%{opacity:1}}@-moz-keyframes BottomToTop{49%{-moz-transform:translateY(-100%)}50%{opacity:0;-moz-transform:translateY(100%)}51%{opacity:1}}@keyframes BottomToTop{49%{transform:translateY(-100%)}50%{opacity:0;transform:translateY(100%)}51%{opacity:1}}@-webkit-keyframes TopToBottom{49%{-webkit-transform:translateY(-100%)}50%{opacity:0;-webkit-transform:translateY(100%)}51%{opacity:1}}@-moz-keyframes TopToBottom{49%{-moz-transform:translateY(-100%)}50%{opacity:0;-moz-transform:translateY(100%)}51%{opacity:1}}@keyframes TopToBottom{49%{transform:translateY(-100%)}50%{opacity:0;transform:translateY(100%)}51%{opacity:1}}.device-mockup{position:relative;width:100%;padding-bottom:61.775701%}.device-mockup>.device{position:absolute;top:0;bottom:0;left:0;right:0;width:100%;height:100%;background-repeat:no-repeat;-webkit-background-size:contain;-moz-background-size:contain;background-size:contain;background-image:url(assets/img/device-mockups/macbook.png)}.device-mockup>.device>.screen{background-color:#000;-webkit-transform:translateZ(0);-moz-transform:translateZ(0);-o-transform:translateZ(0);-ms-transform:translateZ(0);transform:translateZ(0);position:absolute;top:11.0438729%;bottom:14.6747352%;left:13.364486%;right:13.364486%;overflow:hidden}.device-mockup[data-device=ipad],.device-mockup[data-device=ipad][data-orientation=portrait]{padding-bottom:128.406276%}.device-mockup[data-device=ipad][data-orientation=landscape]{padding-bottom:79.9086758%}.device-mockup[data-device=ipad]>.device,.device-mockup[data-device=ipad][data-color=black]>.device,.device-mockup[data-device=ipad][data-orientation=portrait][data-color=black]>.device{background-image:url(assets/img/device-mockups/ipad_port_black.png)}.device-mockup[data-device=ipad][data-color=white]>.device,.device-mockup[data-device=ipad][data-orientation=portrait][data-color=white]>.device{background-image:url(assets/img/device-mockups/ipad_port_white.png)}.device-mockup[data-device=ipad][data-orientation=landscape][data-color=black]>.device,.device-mockup[data-device=ipad][data-orientation=landscape]>.device{background-image:url(assets/img/device-mockups/ipad_land_black.png)}.device-mockup[data-device=ipad][data-orientation=landscape][data-color=white]>.device{background-image:url(assets/img/device-mockups/ipad_land_white.png)}.device-mockup[data-device=ipad]>.device>.screen,.device-mockup[data-device=ipad][data-orientation=portrait]>.device>.screen{top:12.025723%;bottom:12.154341%;left:13.45995%;right:13.45995%}.device-mockup[data-device=ipad][data-orientation=landscape]>.device>.screen{top:13.87755102%;bottom:13.87755102%;left:11.5459883%;right:11.5459883%}.screenshot-carousel-wrapper .carousel-control{top:50%;margin-top:-35px;text-shadow:none;filter:alpha(opacity=100);opacity:1;width:70px;height:70px;font-size:40px;line-height:70px;background:#fff;background-image:none!important;border-radius:50%;-webkit-transition:all .3s ease;-moz-transition:all .3s ease;-ms-transition:all .3s ease;transition:all .3s ease}.screenshot-carousel-wrapper .carousel-control:hover{color:#fff;background:#81c784;box-shadow:0 8px 17px 0 rgba(0,0,0,.2),0 6px 20px 0 rgba(0,0,0,.19)}@media screen and (min-width:850px){.screenshot-carousel-wrapper .carousel-control.left{left:-70px}.screenshot-carousel-wrapper .carousel-control.right{right:-70px}}@media screen and (max-width:767px){.screenshot-carousel-wrapper .carousel-control{margin-top:-20px;width:40px;height:40px;font-size:24px;line-height:40px}}.subscription-success{color:#fff;line-height:24px;margin-top:20px}.has-header-search .menuzord-menu{margin-right:30px}.search-trigger{position:absolute;right:10px;top:0;cursor:pointer;z-index:200}.search-trigger i{font-size:18px;line-height:102px;color:#202020;position:absolute;top:0;left:0;right:0;text-align:center;margin:0 auto;-webkit-transition:all .3s ease;-moz-transition:all .3s ease;transition:all .3s ease}@media (min-width:769px){.search-trigger.light i{color:#fff}.search-trigger.dark i{color:#202020}.sticky .search-trigger.light i{color:#999}.sticky .search-trigger.light.semidark i{color:#fff}}.search-trigger i:hover{color:#03a9f4}.tt-nav.sticky .search-trigger i.material-icons{line-height:62px}.search-trigger .search-btn{padding:0;outline:0;width:40px;height:40px;margin-top:30px;border-radius:50%;box-sizing:border-box;transform-origin:50%;-webkit-transition:all .7s cubic-bezier(.4,0,.2,1);-moz-transition:all .7s cubic-bezier(.4,0,.2,1);-ms-transition:all .7s cubic-bezier(.4,0,.2,1);-o-transition:all .7s cubic-bezier(.4,0,.2,1);transition:all .7s cubic-bezier(.4,0,.2,1)}.search-trigger .icon-search,.search-trigger .search-close{-webkit-transition:.2s ease-in-out;-moz-transition:.2s ease-in-out;-o-transition:.2s ease-in-out;transition:.2s ease-in-out}.icon-search{position:absolute;top:18px;left:20px;font-size:28px}.search-close{position:fixed;top:35px;right:35px;color:rgba(255,255,255,.9);font-size:30px;visibility:hidden;-webkit-transform:translate(10px,0) rotate(90deg);-moz-transform:translate(10px,0) rotate(90deg);-ms-transform:translate(10px,0) rotate(90deg);-o-transform:translate(10px,0) rotate(90deg);transform:translate(10px,0) rotate(90deg);-webkit-transition:all .3s ease-in-out;-moz-transition:all .3s ease-in-out;-ms-transition:all .3s ease-in-out;-o-transition:all .3s ease-in-out;transition:all .3s ease-in-out;z-index:1001;cursor:pointer}.search-close:hover{color:#fff}.search-form-wrapper{position:relative}.search-form-wrapper .search-button{position:absolute;top:30px;right:0;-webkit-border-radius:50%;-moz-border-radius:50%;-o-border-radius:50%;border-radius:50%;width:40px;height:40px;font-size:14px;text-align:center;line-height:40px;padding:0}.search-form-wrapper .input-field input[type=text],.search-form-wrapper .input-field label{color:#fff;font-size:17px}.search-form-wrapper .input-field label.active{font-size:12px}.search-form-wrapper form{position:absolute;top:150px;left:0;right:0;bottom:0;display:block;pointer-events:none;-moz-opacity:0;-webkit-opacity:0;opacity:0;visibility:hidden;-webkit-transform:translate(40px,0);-moz-transform:translate(40px,0);-ms-transform:translate(40px,0);-o-transform:translate(40px,0);transform:translate(40px,0);-webkit-transition:all .3s ease-in-out;-moz-transition:all .3s ease-in-out;-ms-transition:all .3s ease-in-out;-o-transition:all .3s ease-in-out;transition:all .3s ease-in-out;z-index:1000}.active-search .search-close,.active-search .search-form-wrapper form{-moz-opacity:1;-webkit-opacity:1;opacity:1;visibility:visible;pointer-events:all;-webkit-transform:none;-moz-transform:none;-ms-transform:none;-o-transform:none;transform:none}.active-search .search-trigger .icon-search{-moz-opacity:0;-webkit-opacity:0;opacity:0;visibility:hidden}.active-search .search-trigger .search-btn{position:relative;cursor:default;z-index:300;background-color:rgba(3,169,244,.9);-webkit-transform:scale(90);-moz-transform:scale(90);-ms-transform:scale(90);-o-transform:scale(90);transform:scale(90)}@media screen and (max-width:768px){.search-trigger i{line-height:48px}.search-trigger .search-btn{margin-top:6px}}#preloader{position:fixed;top:0;left:0;height:100%;width:100%;background:#fff;z-index:999999;text-align:center}#preloader .preloader-position{width:100%;margin:0 auto;left:50%;position:absolute;top:50%;-webkit-transform:translate(-50%,-50%);-moz-transform:translate(-50%,-50%);-ms-transform:translate(-50%,-50%);transform:translate(-50%,-50%)}#preloader .progress{height:2px;margin:35px 0}#preloader .progress .indeterminate{background:#03a9f4}
    </style>

    <noscript id="deferred-styles">
        <style>
            @import url(assets/fonts/flaticon/flaticon.css);@import url(https://fonts.googleapis.com/css?family=Roboto:400,300,500,700,900);@import url(https://fonts.googleapis.com/css?family=Great+Vibes);
        </style>

        <link href='https://fonts.googleapis.com/css?family=Raleway:400,300,500,700,900' rel='stylesheet' type='text/css'>
        <link href="{{ url('assets/fonts/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
        <link href="{{ url('assets/fonts/iconfont/material-icons.css') }}" rel="stylesheet">
        <link href="{{ url('assets/magnific-popup/magnific-popup.css') }}" rel="stylesheet">
        <link href="{{ url('assets/owl.carousel//assets/owl.carousel.css') }}" rel="stylesheet">
        <link href="{{ url('assets/owl.carousel//assets/owl.theme.default.min.css') }}" rel="stylesheet">
        <link href="{{ url('assets/flexSlider/flexslider.css') }}" rel="stylesheet">
        <link href="{{ url('assets/materialize/css/materialize.min.css') }}" rel="stylesheet">
        <link href="{{ url('assets/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
        <link href="{{ url('assets/css/shortcodes/shortcodes.css') }}" rel="stylesheet">
        <link href="{{ url('assets/css/shortcodes/login.css') }}" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="{{ url('assets/revolution/css/settings.css') }}">
        <link rel="stylesheet" type="text/css" href="/assets/revolution/css/layers.css">
        <link rel="stylesheet" type="text/css" href="/assets/revolution/css/navigation.css">

    </noscript>
    <script>
        var loadDeferredStyles = function() {
            var addStylesNode = document.getElementById("deferred-styles");
            var replacement = document.createElement("div");
            replacement.innerHTML = addStylesNode.textContent;
            document.body.appendChild(replacement)
            addStylesNode.parentElement.removeChild(addStylesNode);
        };
        var raf = requestAnimationFrame || mozRequestAnimationFrame ||
            webkitRequestAnimationFrame || msRequestAnimationFrame;
        if (raf) raf(function() { window.setTimeout(loadDeferredStyles, 0); });
        else window.addEventListener('load', loadDeferredStyles);
    </script>

    @yield('after-styles')

    @if (! $logged_in_user)
        <style>
            @media screen and (min-width: 1400px) {
                .menuzord-menu {
                    margin-right: -90px !important;
                }
            }
        </style>
    @else
        <style>
            @media screen and (min-width: 1400px) {
                .menuzord-menu {
                    margin-right: -140px !important;
                }
            }
        </style>
    @endif

    <style>
        /*.tt-nav .logo-brand img {
            height: 95px !important;
        }*/

        @media screen and (min-width: 1400px) {

            .tt-nav .logo-brand {
                margin: 30px 30px 0px -80px;
            }

            .tt-nav.sticky .logo-brand {
                margin: 15px 30px 0px -150px;
                line-height: 60px;
            }

            .dropdown {
                right: -150px !important;
            }
        }

        .package-price .currency-symbol, .package-price .price {
            font-size: 25px !important;
        }

        .package-price {
            border-radius: 0% !important;
        }
    </style>

    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>

<body id="top" class="has-header-search">

@include('includes.partials.messages')

<!--header start-->
@include('frontend.includes.app.header')
<!--header end-->

@yield('content')

<!-- Footer Start -->
@include('frontend.includes.app.footer')
<!-- End Footer -->


<!-- Preloader -->
<div id="preloader">
    <div class="preloader-position">
{{--        <img src="{{ url('uploads/general') .'/' .  Settings::get('logo') }}" alt="logo" >--}}
        <div class="progress">
            <div class="indeterminate"></div>
        </div>
    </div>
</div>
<!-- End Preloader -->

<script>
//    document.addEventListener('contextmenu', event => event.preventDefault());
</script>

<script src="{{ url('assets/js/jquery-2.2.4.min.js') }}"></script>
<script src="{{ url('assets/bootstrap/js/bootstrap.min.js') }}"></script>
{{ Html::script('js/jquery.pjax.js') }}
<script src="{{ url('assets/materialize/js/materialize.min.js') }}"></script>
<script src="{{ url('assets/js/jquery.bootstrap.js') }}" type="text/javascript"></script>
<script src="{{ url('assets/js/material-bootstrap-wizard.js') }}"></script>
<script src="{{ url('assets/js/jquery.validate.min.js') }}"></script>
<script src="{{ url('assets/js/jquery.easing.min.js') }}"></script>
<script src="{{ url('assets/js/jquery.sticky.min.js') }}"></script>
<script src="{{ url('assets/js/smoothscroll.min.js') }}"></script>
<script src="{{ url('assets/js/imagesloaded.js') }}"></script>
<script src="{{ url('assets/js/jquery.stellar.min.js') }}"></script>
<script src="{{ url('assets/js/jquery.inview.min.js') }}"></script>
<script src="{{ url('assets/js/jquery.shuffle.min.js') }}"></script>
<script src="{{ url('assets/js/menuzord.js') }}"></script>
<script src="{{ url('assets/js/bootstrap-tabcollapse.min.js') }}"></script>
<script src="{{ url('assets/owl.carousel/owl.carousel.min.js') }}"></script>
<script src="{{ url('assets/flexSlider/jquery.flexslider-min.js') }}"></script>
<script src="{{ url('assets/magnific-popup/jquery.magnific-popup.min.js') }}"></script>
<script src="{{ url('assets/js/scripts.js') }}"></script>

<script src="https://cdn.onesignal.com/sdks/OneSignalSDK.js" async='async'></script>
<script>
    var OneSignal = window.OneSignal || [];
    OneSignal.push(["init", {
        appId: "e72fcdfc-b5d3-42c1-8ef7-69c147dca4c2",
        autoRegister: false, /* Set to true to automatically prompt visitors */
        httpPermissionRequest: {
            enable: true
        },
        notifyButton: {
            enable: true /* Set to false to hide */
        }
    }]);
</script>

@yield('after-scripts')

@include('includes.partials.ga')

<script>
    $(function(){
        $(document).pjax('a', '#top')
    })
</script>

</body>

</html>