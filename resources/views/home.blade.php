@extends('layout.main')

@section('content')
    <div class="c-intro">
        <div class="c-chat py-3 bg-brand">
            <div class="text-center"><span class="e-white">Need to chat? </span><a class="e-white e-decor" href="contact.html">Click Here</a></div>
        </div>
        <div class="carousel carousel-fade" id="sliderHome" data-ride="carousel">
            <ol class="carousel-indicators">
                <li class="active" data-target="#sliderHome" data-slide-to="0"></li>
                <li class="second" data-target="#sliderHome" data-slide-to="1"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active"><img class="wow zoomIn" data-wow-duration="2s" src="img/intro/intro1.jpg" alt="">
                    <div class="carousel-caption">
                        <h1 class="e-title--intro wow slideInUp" data-wow-duration=".75s" data-wow-delay="1s">Glass Cleaner</h1>
                        <p class="e-subtitle--intro wow slideInUp" data-wow-duration=".75s" data-wow-delay="1.25s">Praesent commodo cursus magna, vel scelerisque nisl consectetur adipiscing elit.</p><a class="btn mt-3 wow slideInUp" data-wow-duration=".75s" data-wow-delay="1.5s" href="products.html">Shop Now</a>
                    </div>
                    <div class="img-up third wow slideInUp d-none d-lg-block" data-wow-duration=".75s" data-wow-delay="2.5s"><img src="img/intro/gr.png"></div>
                </div>
                <div class="carousel-item first"><img class="wow zoomIn" data-wow-duration="2s" src="img/intro/intro2.jpg" alt="">
                    <div class="carousel-caption">
                        <h1 class="e-title--intro wow slideInUp" data-wow-duration=".75s" data-wow-delay="1s">Glass Cleaner</h1>
                        <p class="e-subtitle--intro wow slideInUp" data-wow-duration=".75s" data-wow-delay="1.25s">Praesent commodo cursus magna, vel scelerisque nisl consectetur.</p><a class="btn mt-3 wow slideInUp" data-wow-duration=".75s" data-wow-delay="1.5s" href="products.html">Shop Now</a>
                    </div>
                    <div class="img-up third wow slideInUp d-none d-lg-block" data-wow-duration=".75s" data-wow-delay="2.5s"><img src="img/about.png"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="c-about py-5">
        <div class="container-fluid">
            <div class="row">
                <div class="col-11 col-lg-6 mx-auto">
                    <div class="c-about__image wow zoomOut" data-wow-duration="2s"><img src="img/about.png"></div>
                </div>
                <div class="col-11 col-lg-6 mx-auto pt-lg-4">
                    <h1 class="e-title e-title--part wow fadeInUp" data-wow-duration=".75s">What is a Natural Cleaner? </h1>
                    <p class="wow fadeInUp" data-wow-duration=".75s">A natural cleaner is formulated from ingredients that are renewable, such as natural products extracted from plants. Many excellent cleaning agents are available in plants and they are renewed every year.</p>
                    <p class="wow fadeInUp" data-wow-duration=".75s">A natural cleaner should also be non-toxic and not harmful to life. Because of the natural source of these ingredients, they are 100% biodegradable.</p>
                    <h1 class="e-title e-title--part wow fadeInUp" data-wow-duration=".75s">What are the benefits of Natural Cleaners?</h1>
                    <p class="wow slideInUp" data-wow-duration=".75s">The benefits of Natural Cleaners are many. A few beneflts are:</p>
                    <ul class="wow slideInUp" data-wow-duration=".75s">
                        <li><span class="e-color">r.</span><span class="ml-2">Minimizing the use of natural resources that are not renewable, such as crude oil and natural gas.</span></li>
                        <li><span class="e-color">z.</span><span class="ml-2">Natural Cleaners do not liberate "greenhouse" gases.</span></li>
                        <li><span class="e-color">s.</span><span class="ml-2">The health of our family and pets are protected by eliminating harmful chemicals and toxic fumes.</span></li>
                        <li><span class="e-color">+.</span><span class="ml-2">Protecting the environment by using readily biodeg radable products.</span></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="c-products pb-5">
        <div class="container-fluid">
            <div class="c-products__header py-4 py-lg-0">
                <h2 class="e-sub e-white ml-3 ml-lg-0">Newest Products</h2><a class="btn small yellow" href="products.html">View all</a>
            </div>
            <div class="c-products__items">
                <div class="c-product__item"><a class="card" href="product.html"><img src="img/product/pr01.png" alt=""></a>
                    <div class="pr-footer">
                        <div class="pr-footer__info">
                            <h3 class="e-mini"> <a href="product.html">name example</a></h3>
                            <p class="pr-price"><span>$4.95</span></p>
                        </div><a class="btn small" href="product.html">ADD to CART</a>
                    </div>
                </div>
                <div class="c-product__item"><a class="card" href="product.html"><img src="img/product/pr02.png" alt=""></a>
                    <div class="pr-footer">
                        <div class="pr-footer__info">
                            <h3 class="e-mini"> <a href="product.html">name example</a></h3>
                            <p class="pr-price"><span>$6.95</span></p>
                        </div><a class="btn small" href="product.html">ADD to CART</a>
                    </div>
                </div>
                <div class="c-product__item"><a class="card" href="product.html"><img src="img/product/pr03.png" alt=""></a>
                    <div class="pr-footer">
                        <div class="pr-footer__info">
                            <h3 class="e-mini"> <a href="product.html">name example</a></h3>
                            <p class="pr-price"><span class="e-stroke">$7.95</span><span class="e-theme">$5.00</span></p>
                        </div><a class="btn small" href="product.html">ADD to CART</a>
                    </div>
                </div>
                <div class="c-product__item"><a class="card" href="product.html"><img src="img/product/pr04.png" alt=""></a>
                    <div class="pr-footer">
                        <div class="pr-footer__info">
                            <h3 class="e-mini"> <a href="product.html">name example</a></h3>
                            <p class="pr-price"><span>$5.45 </span></p>
                        </div>
                    </div>
                </div>
                <div class="c-product__item"><a class="card" href="product.html"><img src="img/product/pr05.png" alt=""></a>
                    <div class="pr-footer">
                        <div class="pr-footer__info">
                            <h3 class="e-mini"> <a href="product.html">name example</a></h3>
                            <p class="pr-price"><span>$4.00 </span></p>
                        </div><a class="btn small" href="product.html">ADD to CART</a>
                    </div>
                </div>
                <div class="c-product__item"><a class="card" href="product.html"><img src="img/product/pr06.png" alt=""></a>
                    <div class="pr-footer">
                        <div class="pr-footer__info">
                            <h3 class="e-mini"> <a href="product.html">name example</a></h3>
                            <p class="pr-price"><span class="e-stroke">$7.25</span><span class="e-theme">$6.20</span></p>
                        </div><a class="btn small" href="product.html">ADD to CART</a>
                    </div>
                </div>
                <div class="c-product__item"><a class="card" href="product.html"><img src="img/product/pr07.png" alt=""></a>
                    <div class="pr-footer">
                        <div class="pr-footer__info">
                            <h3 class="e-mini"> <a href="product.html">name example</a></h3>
                            <p class="pr-price"><span>$6.25</span></p>
                        </div><a class="btn small" href="product.html">ADD to CART</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="c-why py-5">
        <div class="container-fluid">
            <h2 class="e-title e-title--part m-5 wow fadeInUp" data-wow-duration=".75s">Why Creen Living Important?</h2>
            <div class="row">
                <div class="col-11 col-lg-4 mx-auto">
                    <div class="mx-lg-5">
                        <h4 class="e-mini top e-new">01</h4><img class="wow fadeInUp" data-wow-delay=".25s" src="img/about/a1.png" alt="">
                        <p class="wow fadeInUp mt-4" data-wow-delay=".5s">Green Living is extremely impoftant to the health and safety of all of us. Natural resources that we enjoy are being used up. For ourselves and future"generations, we need to be good stewards of our planet. Recycling these natural resources will assure a supply for many years to come, It is also impoftant to guard the health of ourselvbs, our fellow man, our pets and wildlife whenever possible. </p>
                    </div>
                </div>
                <div class="col-11 col-lg-4 mx-auto col-middle">
                    <div class="mx-lg-5">
                        <h4 class="e-mini top e-yellow">02</h4><img class="wow fadeInUp" data-wow-delay=".5s" src="img/about/a2.png" alt="">
                        <p class="wow fadeInUp mt-4" data-wow-delay=".75s">Using "natural" and renewable products to meet our needs assures us that we will not be exposed to toxic and harmful chemicals and fumes. </p>
                    </div>
                </div>
                <div class="col-11 col-lg-4 mx-auto">
                    <div class="mx-lg-5">
                        <h4 class="e-mini top e-new">03</h4><img class="wow fadeInUp" data-wow-delay=".75s" src="img/about/a3.png" alt="">
                        <p class="wow fadeInUp mt-4" data-wow-delay="1s">Using natural cleaners that are non-toxic, biodegradable and 100% sustainable is a great way to contribute to everyone's good health and the health of our planet.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="c-faq bg-white py-5">
        <div class="container">
            <div class="text-center">
                <h4 class="e-mini e-color">Clean help</h4>
                <h3 class="e-title e-color">Frequently asked questions</h3>
            </div>
            <div class="row">
                <div class="col-11 col-lg-10 mx-auto">
                    <div class="accordion my-5" id="faq">
                        <div class="card">
                            <div class="card-header" id="headingOne">
                                <div class="d-flex align-items-center" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne"><img class="vis" src="svg/chevron-down.svg"><img class="hid" src="svg/chevron-up.svg"><span class="mx-3">Reque insolens in vel?</span></div>
                            </div>
                            <div class="collapse show" id="collapseOne" aria-labelledby="headingOne" data-parent="#faq">
                                <div class="card-body">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </p>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="headingTwo">
                                <div class="d-flex align-items-center collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo"><img class="vis" src="svg/chevron-down.svg"><img class="hid" src="svg/chevron-up.svg"><span class="mx-3">Vis rebum error graecis ea, id sit postea accusamus?</span></div>
                            </div>
                            <div class="collapse" id="collapseTwo" aria-labelledby="headingTwo" data-parent="#faq">
                                <div class="card-body">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </p>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="headingThree">
                                <div class="d-flex align-items-center collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree"> <img class="vis" src="svg/chevron-down.svg"><img class="hid" src="svg/chevron-up.svg"><span class="mx-3">Lorem repudiandae ne nec?</span></div>
                            </div>
                            <div class="collapse" id="collapseThree" aria-labelledby="headingThree" data-parent="#faq">
                                <div class="card-body">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </p>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="headingFourth">
                                <div class="d-flex align-items-center collapsed" data-toggle="collapse" data-target="#collapseFourth" aria-expanded="false" aria-controls="collapseFourth"><img class="vis" src="svg/chevron-down.svg"><img class="hid" src="svg/chevron-up.svg"><span class="mx-3">Ad dicit numquam vel. Et eos iudico feugait percipitur?</span></div>
                            </div>
                            <div class="collapse" id="collapseFourth" aria-labelledby="headingFourth" data-parent="#faq">
                                <div class="card-body">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </p>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="headingFifth">
                                <div class="d-flex align-items-center collapsed" data-toggle="collapse" data-target="#collapseFifth" aria-expanded="false" aria-controls="collapseFifth"><img class="vis" src="svg/chevron-down.svg"><img class="hid" src="svg/chevron-up.svg"><span class="mx-3">Sea no dico percipitur. Fierent constituam definitiones id eum?</span></div>
                            </div>
                            <div class="collapse" id="collapseFifth" aria-labelledby="headingFifth" data-parent="#faq">
                                <div class="card-body">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('page_js')
@endsection