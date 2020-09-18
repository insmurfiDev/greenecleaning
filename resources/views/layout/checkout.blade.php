<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Shades of Greene</title>
    <meta name="description" content="Shades of Greene">
    <meta name="author" content="webandad">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="description" content="Shades of Greene">
    <meta name="robots" content="noodp">
    <link rel="canonical" href="/">
    <meta property="og:locale" content="en_US">
    <meta property="og:type" content="website">
    <meta property="og:title" content="Shades of Greene">
    <meta property="og:description" content="Shades of Greene">
    <meta property="og:url" content="{{asset('/img/company.jpg')}}">
    <meta property="og:site_name" content="Shades of Greene">
    <meta property="og:image" content="{{asset('/img/company.jpg')}}">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">
    <meta name="twitter:card" content="summary">
    <meta name="twitter:description" content="Shades of Greene">
    <meta name="twitter:title" content="Shades of Greene">
    <meta name="twitter:image" content="../img/company.jpg">
    <link rel="apple-touch-icon" sizes="180x180" href="{{asset('favicon/apple-touch-icon.png')}}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{asset('favicon/favicon-32x32.png')}}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('favicon/favicon-16x16.png')}}">
    <link rel="manifest" href="{{asset('favicon/site.webmanifest')}}">
    <link rel="mask-icon" href="{{asset('favicon/safari-pinned-tab.svg')}}" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">
    <link rel="stylesheet" href="{{asset('css/reset.css')}}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.css">
    <link rel="stylesheet" href="{{asset('css/custom.css')}}">
    <link rel="stylesheet" href="{{asset('css/media.css')}}">
    <link rel="stylesheet" href="{{asset('css/animate.css')}}">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link rel="stylesheet" href="{{asset('/css/paymentInfo.css')}}">
    <link href="https://fonts.googleapis.com/css2?family=PT+Serif+Caption:ital@0;1&amp;family=Quicksand:wght@300;400;500;600;700&amp;display=swap">
    <script async defer src="{{asset('js/wow.min.js')}}"></script>
    <script>
        wow = new WOW({
            boxClass: 'wow',
            animateClass: 'animated',
            offset: 0,
            mobile: false,
            live: false
        })
        wow.init();
    </script>
</head>

<body class="page">
<div class="d-none" id="preloader"></div>
<div class="wrapper">
    @yield('content')
</div>
<div class="c-footer">
    <div class="container-fluid">
        <div class="c-menu">
            <div class="c-logo mr-auto"><img src="{{asset('svg/logos/logo-f.svg')}}" alt=""></div>
            <div class="c-nav mx-auto"><a class="mx-3" href="{{route('home')}}">Home</a>
                <a class="mx-3" href="{{route('products')}}">Products</a>
                <a class="mx-3" href="{{route('contact')}}">Contact Us</a>
            </div>
            <div class="c-nav"><span class="e-white mx-auto">Copyright © 2020 by Shades of greene</span></div>
            <div class="c-nav mx-auto">
                <a class="mx-3" href="">
                    <img class="vis" src="{{asset('svg/icons/facebook.svg')}}" alt="facebook">
                    <img class="hid" src="{{asset('svg/icons/facebook-hr.svg')}}" alt="facebook">
                </a>
                <a class="mx-3" href="">
                    <img class="vis" src="{{asset('svg/icons/twitter.svg')}}" alt="twitter">
                    <img class="hid" src="{{asset('svg/icons/twitter-hr.svg')}}" alt="twitter">
                </a>
            </div>
            <div class="c-wa ml-auto"><a class="e-white e-up" href="https://webandad.com"> Powered by Web<span>&amp;</span>Ad</a></div>
        </div>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/smooth-scroll/16.1.0/smooth-scroll.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/smooth-scroll/16.1.0/smooth-scroll.polyfills.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.min.js"></script>
<script src="{{asset('js/site.js')}}"></script>
<script src="https://unpkg.com/feather-icons"></script>
<script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/places.js@1.19.0"></script>

<script src="{{asset('js/app.js')}}"></script>
<script>
    feather.replace()
</script>
@yield('page_js')
</body>

</html>