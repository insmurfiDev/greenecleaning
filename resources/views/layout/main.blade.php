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
    <meta property="og:url" content="../img/company.jpg">
    <meta property="og:site_name" content="Shades of Greene">
    <meta property="og:image" content="../img/company.jpg">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">
    <meta name="twitter:card" content="summary">
    <meta name="twitter:description" content="Shades of Greene">
    <meta name="twitter:title" content="Shades of Greene">
    <meta name="twitter:image" content="../img/company.jpg">
    <link rel="apple-touch-icon" sizes="180x180" href="favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="favicon/favicon-16x16.png">
    <link rel="manifest" href="favicon/site.webmanifest">
    <link rel="mask-icon" href="favicon/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.css">
    <link rel="stylesheet" href="css/custom.css">
    <link rel="stylesheet" href="css/media.css">
    <link rel="stylesheet" href="css/animate.css">
    <link href="https://fonts.googleapis.com/css2?family=PT+Serif+Caption:ital@0;1&amp;family=Quicksand:wght@300;400;500;600;700&amp;display=swap">
    <script src="js/wow.min.js"></script>
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
<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content pt-4"><button class="close" data-dismiss="modal" aria-label="Close"><span data-feather="x"> </span></button>
            <h5 class="e-sub e-new text-center">Welcome Back!</h5>
            <p class="text-center mb-0"><span class="e-dark">Kindly fill in your login details to proceed</span></p>
            <div class="modal-body">
                <div class="c-form mx-2 mx-lg-5">
                    <form class="form" action="" method="post"><input class="w-100" type="text" placeholder="Email"><input class="w-100" type="text" placeholder="Password">
                        <div class="text-right mb-3"><a class="e-decor ml-auto" href="">I forgot my password?</a></div><input class="mb-0 e-bold" type="submit" value="LOGIN">
                    </form>
                </div>
            </div>
            <div class="modal-footer text-center border-0 mb-4"><span class="mx-auto"><span class="e-dark">Don’t have an account yet? </span><a class="e-bold e-decor" data-toggle="modal" data-target="#registerModal" data-dismiss="modal">Sign Up</a></span></div>
        </div>
    </div>
</div>
<div class="modal fade" id="registerModal" tabindex="-1" aria-labelledby="registerModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content pt-4"><button class="close" data-dismiss="modal" aria-label="Close"><span data-feather="x"> </span></button>
            <h5 class="e-sub e-new text-center">Sign up</h5>
            <p class="text-center mb-0"><span class="e-dark">There’s no charge upon registration</span></p>
            <div class="modal-body">
                <div class="c-form mx-2 mx-lg-5">
                    <form class="form" action="" method="post"><input class="w-100" type="text" placeholder="Full Name"><input class="w-100" type="text" placeholder="Email"><input class="w-100" type="text" placeholder="Password"><input class="w-100" type="text" placeholder="Confirm Password"><input class="mb-0 e-bold" type="submit" value="REGISTER"></form>
                </div>
            </div>
            <div class="modal-footer text-center border-0 mb-4"><span class="mx-auto"><span class="e-dark">Already a member?  </span><a class="e-bold e-decor" data-toggle="modal" data-target="#loginModal" data-dismiss="modal">Login</a></span></div>
        </div>
    </div>
</div>
<div class="c-header">
    <div class="container-fluid">
        <div class="c-menu">
            <div class="c-logo"><a href="/"><img src="svg/logos/logo.svg" alt=""></a></div>
            <div class="c-nav mhide"><a class="mx-3 active" href="index.html">Home</a><a class="mx-3" href="products.html">Products</a><a class="mx-3" href="contact.html">Contact Us</a></div>
            <div class="c-nav"><a class="mx-3" id="mBtn" href="#"><img src="svg/icons/mob.svg"></a><a class="mx-3" id="lBtn" href="#" data-toggle="modal" data-target="#loginModal"><img src="svg/icons/login.svg"></a><a class="ml-3" id="cartBtn" href="#"><span class="cart-counter">3</span><img src="svg/icons/cart.svg"></a></div>
        </div>
    </div>
</div>
<div class="c-mobmenu">
    <div class="p-3 w-100 text-right pr-3"><a id="closeMob"><span data-feather="x"></span></a></div>
    <div class="menu-prod-mob"><a class="d-mob-link one border-top border-bottom" href="product.html">
            <div class="e-black p-3">Home</div>
        </a><a class="d-mob-link two border-bottom" href="product.html">
            <div class="e-black p-3">Products</div>
        </a><a class="d-mob-link three border-bottom" href="product.html">
            <div class="e-black p-3">Contact Us</div>
        </a><a class="d-mob-link border-bottom" id="mobLoginBtn" href="#" data-toggle="modal" data-target="#loginModal">
            <div class="e-black p-3">Login</div>
        </a></div>
</div>
<div class="c-cart bg-white"><a id="closeCart" href="#"><span data-feather="x"></span></a>
    <div class="bg-grey text-center py-4">
        <h3 class="e-sub">Shopping bag (2)</h3>
    </div>
    <div class="mx-4">
        <div class="row no-gutters border-bottom py-3">
            <div class="col-3"><a href="product.html"></a><img src="img/product/pr01.png"></div>
            <div class="col-9 text-right">
                <div class="d-flex">
                    <h3 class="e-mini w-50 text-right my-0"> <a href="product.html">Name bottle 1</a></h3><a class="rem_prod w-50 text-right" href=""><img src="svg/icons/trash.svg"></a>
                </div>
                <p class="mb-0 w-50 e-new">$4.95</p><br>
                <p class="mb-0 w-50 e-middle">size: 1.0</p>
                <div class="d-flex align-items-center">
                    <p class="mb-0 w-50 e-middle">quantity:</p>
                    <div class="c-cart__info w-50 d-flex justify-content-end"><a class="cart-block" href=""><img src="svg/icons/plus.svg"></a><span class="cart-block"><input class="w-100" type="number" value="1"></span><a class="cart-block" href=""><img src="svg/icons/minus.svg"></a></div>
                </div>
            </div>
        </div>
        <div class="row no-gutters border-bottom py-3">
            <div class="col-3"><a href="product.html"><img src="img/product/pr04.png"></a></div>
            <div class="col-9 text-right">
                <div class="d-flex">
                    <h3 class="e-mini w-50 text-right my-0"> <a href="product.html">Name bottle 2</a></h3><a class="rem_prod w-50 text-right" href=""><img src="svg/icons/trash.svg"></a>
                </div>
                <p class="mb-0 w-50 e-new">$2.75</p><br>
                <p class="mb-0 w-50 e-middle">size: 0.5</p>
                <div class="d-flex align-items-center">
                    <p class="mb-0 w-50 e-middle">quantity:</p>
                    <div class="c-cart__info w-50 d-flex justify-content-end"><a class="cart-block" href=""><img src="svg/icons/plus.svg"></a><span class="cart-block"><input class="w-100" type="number" value="2"></span><a class="cart-block" href=""><img src="svg/icons/minus.svg"></a></div>
                </div>
            </div>
        </div>
        <div class="row no-gutters border-bottom py-3">
            <div class="col-3"><a href="product.html"><img src="img/product/pr07.png"></a></div>
            <div class="col-9 text-right">
                <div class="d-flex">
                    <h3 class="e-mini w-50 text-right my-0"> <a href="product.html">Name bottle 3</a></h3><a class="rem_prod w-50 text-right" href=""><img src="svg/icons/trash.svg"></a>
                </div>
                <p class="mb-0 w-50 e-new">$3.05</p><br>
                <p class="mb-0 w-50 e-middle">size: 2</p>
                <div class="d-flex align-items-center">
                    <p class="mb-0 w-50 e-middle">quantity:</p>
                    <div class="c-cart__info w-50 d-flex justify-content-end"><a class="cart-block" href=""><img src="svg/icons/plus.svg"></a><span class="cart-block"><input class="w-100" type="number" value="1"></span><a class="cart-block" href=""><img src="svg/icons/minus.svg"></a></div>
                </div>
            </div>
        </div>
        <div class="m-3">
            <div class="row border-bottom">
                <div class="col-6">
                    <p class="e-middle">Estimated Total: </p>
                </div>
                <div class="col-6 text-right">
                    <p class="e-bold">$10.75</p>
                </div>
            </div>
        </div><a class="btn wide" href="checkout.html">Checkout</a>
    </div>
</div>
<div class="wrapper">
    @yield('content')
</div>
<div class="c-footer">
    <div class="container-fluid">
        <div class="c-menu">
            <div class="c-logo mr-auto"><img src="svg/logos/logo-f.svg" alt=""></div>
            <div class="c-nav mx-auto"><a class="mx-3" href="index.html">Home</a><a class="mx-3" href="products.html">Products</a><a class="mx-3" href="contact.html">Contact Us</a></div>
            <div class="c-nav"><span class="e-white mx-auto">Copyright © 2020 by Shades of greene</span></div>
            <div class="c-nav mx-auto"><a class="mx-3" href=""><img class="vis" src="svg/icons/facebook.svg" alt="facebook"><img class="hid" src="svg/icons/facebook-hr.svg" alt="facebook"></a><a class="mx-3" href=""><img class="vis" src="svg/icons/twitter.svg" alt="twitter"><img class="hid" src="svg/icons/twitter-hr.svg" alt="twitter"></a></div>
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
<script src="js/site.js"></script>
<script src="https://unpkg.com/feather-icons"></script>
<script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>
<script>
    feather.replace()
</script>
@yield('page_js')
</body>

</html>