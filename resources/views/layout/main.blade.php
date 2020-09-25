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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">

    <link rel="stylesheet" href="{{asset('css/custom.css')}}">
    <link rel="stylesheet" href="{{asset('css/media.css')}}">
    <link rel="stylesheet" href="{{asset('css/animate.css')}}">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
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

<!--
<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content pt-4"><button class="close" data-dismiss="modal" aria-label="Close"><span data-feather="x"> </span></button>
            <h5 class="e-sub e-new text-center">Welcome Back!</h5>
            <p class="text-center mb-0"><span class="e-dark">Kindly fill in your login details to proceed</span></p>
            <div class="modal-body">
                <div class="c-form mx-2 mx-lg-5">
                    <form class="form" action="" method="post">
                        <input class="w-100" type="text" placeholder="Email">
                        <input class="w-100" type="text" placeholder="Password">
                        <div class="text-right mb-3">
                            <a class="e-decor ml-auto" href="">I forgot my password?</a>
                        </div>
                        <input class="mb-0 e-bold" type="submit" value="LOGIN">
                    </form>
                </div>
            </div>
            <div class="modal-footer text-center border-0 mb-4"><span class="mx-auto"><span class="e-dark">Don’t have an account yet? </span><a class="e-bold e-decor" data-toggle="modal" data-target="#registerModal" data-dismiss="modal">Sign Up</a></span></div>
        </div>
    </div>
</div>
-->
<!--
<div class="modal fade" id="registerModal" tabindex="-1" aria-labelledby="registerModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content pt-4"><button class="close" data-dismiss="modal" aria-label="Close"><span data-feather="x"> </span></button>
            <h5 class="e-sub e-new text-center">Sign up</h5>
            <p class="text-center mb-0"><span class="e-dark">There’s no charge upon registration</span></p>
            <div class="modal-body">
                <div class="c-form mx-2 mx-lg-5">
                    <form class="form" action="" method="post">
                        <input class="w-100" type="text" placeholder="Full Name">
                        <input class="w-100" type="text" placeholder="Email">
                        <input class="w-100" type="text" placeholder="Password">
                        <input class="w-100" type="text" placeholder="Confirm Password">
                        <input class="mb-0 e-bold" type="submit" value="REGISTER">
                    </form>
                </div>
            </div>
            <div class="modal-footer text-center border-0 mb-4"><span class="mx-auto"><span class="e-dark">Already a member?  </span><a class="e-bold e-decor" data-toggle="modal" data-target="#loginModal" data-dismiss="modal">Login</a></span></div>
        </div>
    </div>
</div>
-->
<div class="c-header">
    <div class="container-fluid">
        <div class="c-menu">
            <div class="c-logo"><a href="/"><img src="{{asset('svg/logos/logo.svg')}}" alt=""></a></div>
            <div class="c-nav mhide">
                <a class="mx-3 active" href="{{route('home')}}">Home</a>
                <a class="mx-3" href="{{route('products')}}">Products</a>
                <a class="mx-3" href="{{route('contact')}}">Contact Us</a></div>
            <div class="c-nav">
                <a class="mx-3" id="mBtn" href="#"><img src="{{asset('svg/icons/mob.svg')}}"></a>
<!--
                <a class="mx-3" id="lBtn" href="#" data-toggle="modal" data-target="#loginModal"><img src="svg/icons/login.svg"></a>
-->
                <a class="ml-3" id="cartBtn" href="#">
                    @if(isset($cart_count) && $cart_count>0)
                    <span class="cart-counter">{{$cart_count ?? ''}}</span>
                    @else
                        <span class="cart-counter d-none"></span>
                    @endif
                    <img src="{{asset('svg/icons/cart.svg')}}">
                </a>
            </div>
        </div>
    </div>
</div>
<div class="c-mobmenu">
    <div class="p-3 w-100 text-right pr-3"><a id="closeMob"><span data-feather="x"></span></a></div>
    <div class="menu-prod-mob">
        <a class="d-mob-link one border-top border-bottom" href="{{route('home')}}">
            <div class="e-black p-3">Home</div>
        </a>
        <a class="d-mob-link two border-bottom" href="{{route('products')}}">
            <div class="e-black p-3">Products</div>
        </a>
        <a class="d-mob-link three border-bottom" href="{{route('contact')}}">
            <div class="e-black p-3">Contact Us</div>
        </a>
<!--
        <a class="d-mob-link border-bottom" id="mobLoginBtn" href="#" data-toggle="modal" data-target="#loginModal">
            <div class="e-black p-3">Login</div>
        </a>
-->
    </div>
</div>
<div class="c-cart bg-white"><a id="closeCart" href="#"><span data-feather="x"></span></a>
    <div class="bg-grey text-center py-4">
        <h3 class="e-sub" id="">Shopping bag
            @if(isset($cart_count) && $cart_count>0)
                (<span class="cart-counter">{{$cart_count}}</span>)
            @else
                empty
            @endif
        </h3>
    </div>
 @include('partials.cart')
</div>
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
                <a class="mx-3" target="_blank" href="{{\Illuminate\Support\Facades\Config::get('settings.facebook')}}">
                    <img class="vis" src="{{asset('svg/icons/facebook.svg')}}" alt="facebook">
                    <img class="hid" src="{{asset('svg/icons/facebook-hr.svg')}}" alt="facebook">
                </a>
                <a class="mx-3" target="_blank" href="{{\Illuminate\Support\Facades\Config::get('settings.twitter')}}">
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
<!--
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.js"></script>
-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.min.js"></script>
<script src="{{asset('js/site.js')}}"></script>
<script src="https://unpkg.com/feather-icons"></script>
<script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>
<script src="{{asset('js/app.js')}}"></script>
<script>
    feather.replace()
</script>
@yield('page_js')
</body>

</html>