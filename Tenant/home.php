<?php
require_once("../Class/SessionManager.php");
require_once("../Database/Connect.php");
$sessionManager = new SessionManager();
$sessionManager->set("userId", 1);
// $sessionManager->unset("userId");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Finder | Home</title>
    <!-- SEO Meta Tags-->
    <meta name="description" content="Finder - Directory &amp; Listings Bootstrap Template">
    <meta name="keywords" content="bootstrap, business, directory, listings, e-commerce, car dealer, city guide, real estate, job board, user account, multipurpose, ui kit, html5, css3, javascript, gallery, slider, touch">
    <meta name="author" content="Createx Studio">
    <!-- Viewport-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon and Touch Icons-->
    <link rel="apple-touch-icon" sizes="180x180" href="apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="favicon-16x16.png">
    <link rel="manifest" href="site.webmanifest">
    <link rel="mask-icon" color="#5bbad5" href="safari-pinned-tab.svg">
    <meta name="msapplication-TileColor" content="#766df4">
    <meta name="theme-color" content="#ffffff">

    <!-- Page loading styles-->
    <style>
        .page-loading {
            position: fixed;
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 100%;
            -webkit-transition: all .4s .2s ease-in-out;
            transition: all .4s .2s ease-in-out;
            background-color: #fff;
            opacity: 0;
            visibility: hidden;
            z-index: 9999;
        }

        .page-loading.active {
            opacity: 1;
            visibility: visible;
        }

        .page-loading-inner {
            position: absolute;
            top: 50%;
            left: 0;
            width: 100%;
            text-align: center;
            -webkit-transform: translateY(-50%);
            transform: translateY(-50%);
            -webkit-transition: opacity .2s ease-in-out;
            transition: opacity .2s ease-in-out;
            opacity: 0;
        }

        .page-loading.active>.page-loading-inner {
            opacity: 1;
        }

        .page-loading-inner>span {
            display: block;
            font-size: 1rem;
            font-weight: normal;
            color: #666276;
            ;
        }

        .page-spinner {
            display: inline-block;
            width: 2.75rem;
            height: 2.75rem;
            margin-bottom: .75rem;
            vertical-align: text-bottom;
            border: .15em solid #bbb7c5;
            border-right-color: transparent;
            border-radius: 50%;
            -webkit-animation: spinner .75s linear infinite;
            animation: spinner .75s linear infinite;
        }

        @-webkit-keyframes spinner {
            100% {
                -webkit-transform: rotate(360deg);
                transform: rotate(360deg);
            }
        }

        @keyframes spinner {
            100% {
                -webkit-transform: rotate(360deg);
                transform: rotate(360deg);
            }
        }
    </style>

    <!-- Page loading scripts-->
    <script>
        (function() {
            window.onload = function() {
                var preloader = document.querySelector('.page-loading');
                preloader.classList.remove('active');
                setTimeout(function() {
                    preloader.remove();
                }, 2000);
            };
        })();
    </script>

    <!-- Vendor Styles-->
    <link rel="stylesheet" media="screen" href="vendor/simplebar/dist/simplebar.min.css" />
    <link rel="stylesheet" media="screen" href="vendor/nouislider/dist/nouislider.min.css" />
    <link rel="stylesheet" media="screen" href="vendor/tiny-slider/dist/tiny-slider.css" />

    <!-- Main Theme Styles + Bootstrap-->
    <link rel="stylesheet" media="screen" href="css/theme.min.css">

    <!-- Google Tag Manager-->
    <script>
        (function(w, d, s, l, i) {
            w[l] = w[l] || [];
            w[l].push({
                'gtm.start': new Date().getTime(),
                event: 'gtm.js'
            });
            var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s),
                dl = l != 'dataLayer' ? '&l=' + l : '';
            j.async = true;
            j.src =
                'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
            f.parentNode.insertBefore(j, f);
        })(window, document, 'script', 'dataLayer', 'GTM-WKV3GT5');
    </script>
</head>

<!-- Body-->

<body>

    <!-- Google Tag Manager (noscript)-->
    <noscript>
        <iframe src="//www.googletagmanager.com/ns.html?id=GTM-WKV3GT5" height="0" width="0" style="display: none; visibility: hidden;"></iframe>
    </noscript>

    <!-- Page loading spinner-->
    <div class="page-loading active">
        <div class="page-loading-inner">
            <div class="page-spinner"></div><span>Loading...</span>
        </div>
    </div>

    <!-- Navbar -->
    <?php include_once("./components/header.php"); ?>

    <main class="page-wrapper">

        <!-- Sign In Modal-->
        <div class="modal fade" id="signin-modal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered p-2 my-0 mx-auto" style="max-width: 950px;">
                <div class="modal-content">
                    <div class="modal-body px-0 py-2 py-sm-0">
                        <button class="btn-close position-absolute top-0 end-0 mt-3 me-3" type="button" data-bs-dismiss="modal"></button>
                        <div class="row mx-0 align-items-center">
                            <div class="col-md-6 border-end-md p-4 p-sm-5">
                                <h2 class="h3 mb-4 mb-sm-5">Hey there!<br>Welcome back.</h2><img class="d-block mx-auto" src="img/signin-modal/signin.svg" width="344" alt="Illustartion">
                                <div class="mt-4 mt-sm-5">Don't have an account? <a href="#signup-modal" data-bs-toggle="modal" data-bs-dismiss="modal">Sign up here</a></div>
                            </div>
                            <div class="col-md-6 px-4 pt-2 pb-4 px-sm-5 pb-sm-5 pt-md-5"><a class="btn btn-outline-info w-100 mb-3" href="#"><i class="fi-google fs-lg me-1"></i>Sign in with Google</a><a class="btn btn-outline-info w-100 mb-3" href="#"><i class="fi-facebook fs-lg me-1"></i>Sign in with Facebook</a>
                                <div class="d-flex align-items-center py-3 mb-3">
                                    <hr class="w-100">
                                    <div class="px-3">Or</div>
                                    <hr class="w-100">
                                </div>
                                <form class="needs-validation" novalidate>
                                    <div class="mb-4">
                                        <label class="form-label mb-2" for="signin-email">Email address</label>
                                        <input class="form-control" type="email" id="signin-email" placeholder="Enter your email" required>
                                    </div>
                                    <div class="mb-4">
                                        <div class="d-flex align-items-center justify-content-between mb-2">
                                            <label class="form-label mb-0" for="signin-password">Password</label><a class="fs-sm" href="#">Forgot password?</a>
                                        </div>
                                        <div class="password-toggle">
                                            <input class="form-control" type="password" id="signin-password" placeholder="Enter password" required>
                                            <label class="password-toggle-btn" aria-label="Show/hide password">
                                                <input class="password-toggle-check" type="checkbox"><span class="password-toggle-indicator"></span>
                                            </label>
                                        </div>
                                    </div>
                                    <button class="btn btn-primary btn-lg w-100" type="submit">Sign in </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Sign Up Modal-->
        <div class="modal fade" id="signup-modal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered p-2 my-0 mx-auto" style="max-width: 950px;">
                <div class="modal-content">
                    <div class="modal-body px-0 py-2 py-sm-0">
                        <button class="btn-close position-absolute top-0 end-0 mt-3 me-3" type="button" data-bs-dismiss="modal"></button>
                        <div class="row mx-0 align-items-center">
                            <div class="col-md-6 border-end-md p-4 p-sm-5">
                                <h2 class="h3 mb-4 mb-sm-5">Join Finder.<br>Get premium benefits:</h2>
                                <ul class="list-unstyled mb-4 mb-sm-5">
                                    <li class="d-flex mb-2"><i class="fi-check-circle text-primary mt-1 me-2"></i><span>Add and promote your listings</span></li>
                                    <li class="d-flex mb-2"><i class="fi-check-circle text-primary mt-1 me-2"></i><span>Easily manage your wishlist</span></li>
                                    <li class="d-flex mb-0"><i class="fi-check-circle text-primary mt-1 me-2"></i><span>Leave reviews</span></li>
                                </ul><img class="d-block mx-auto" src="img/signin-modal/signup.svg" width="344" alt="Illustartion">
                                <div class="mt-sm-4 pt-md-3">Already have an account? <a href="#signin-modal" data-bs-toggle="modal" data-bs-dismiss="modal">Sign in</a></div>
                            </div>
                            <div class="col-md-6 px-4 pt-2 pb-4 px-sm-5 pb-sm-5 pt-md-5"><a class="btn btn-outline-info w-100 mb-3" href="#"><i class="fi-google fs-lg me-1"></i>Sign in with Google</a><a class="btn btn-outline-info w-100 mb-3" href="#"><i class="fi-facebook fs-lg me-1"></i>Sign in with Facebook</a>
                                <div class="d-flex align-items-center py-3 mb-3">
                                    <hr class="w-100">
                                    <div class="px-3">Or</div>
                                    <hr class="w-100">
                                </div>
                                <form class="needs-validation" novalidate>
                                    <div class="mb-4">
                                        <label class="form-label" for="signup-name">Full name</label>
                                        <input class="form-control" type="text" id="signup-name" placeholder="Enter your full name" required>
                                    </div>
                                    <div class="mb-4">
                                        <label class="form-label" for="signup-email">Email address</label>
                                        <input class="form-control" type="email" id="signup-email" placeholder="Enter your email" required>
                                    </div>
                                    <div class="mb-4">
                                        <label class="form-label" for="signup-password">Password <span class='fs-sm text-muted'>min. 8 char</span></label>
                                        <div class="password-toggle">
                                            <input class="form-control" type="password" id="signup-password" minlength="8" required>
                                            <label class="password-toggle-btn" aria-label="Show/hide password">
                                                <input class="password-toggle-check" type="checkbox"><span class="password-toggle-indicator"></span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="mb-4">
                                        <label class="form-label" for="signup-password-confirm">Confirm password</label>
                                        <div class="password-toggle">
                                            <input class="form-control" type="password" id="signup-password-confirm" minlength="8" required>
                                            <label class="password-toggle-btn" aria-label="Show/hide password">
                                                <input class="password-toggle-check" type="checkbox"><span class="password-toggle-indicator"></span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="form-check mb-4">
                                        <input class="form-check-input" type="checkbox" id="agree-to-terms" required>
                                        <label class="form-check-label" for="agree-to-terms">By joining, I agree to the <a href='#'>Terms of use</a> and <a href='#'>Privacy policy</a></label>
                                    </div>
                                    <button class="btn btn-primary btn-lg w-100" type="submit">Sign up </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Navbar-->

        <!-- Page content-->
        <!-- Property cost calculator modal-->
        <div class="modal fade" id="cost-calculator" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header d-block position-relative border-0 px-sm-5 px-4">
                        <h3 class="h4 modal-title mt-4 text-center">Explore your property’s value</h3>
                        <button class="btn-close position-absolute top-0 end-0 mt-3 me-3" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body px-sm-5 px-4">

                        <!-- Search Property Form Start -->
                        <form class="needs-validation" novalidate>
                            <div class="mb-3">
                                <label class="form-label fw-bold mb-2" for="property-city">Property location</label>
                                <select class="form-control form-select" id="property-city" required>
                                    <option value="" selected disabled hidden>Choose city</option>
                                    <option value="Chicago">Chicago</option>
                                    <option value="Dallas">Dallas</option>
                                    <option value="Los Angeles">Los Angeles</option>
                                    <option value="New York">New York</option>
                                    <option value="San Diego">San Diego</option>
                                </select>
                                <div class="invalid-feedback">Please choose the city.</div>
                            </div>
                            <div class="mb-3">
                                <select class="form-control form-select" id="property-district" required>
                                    <option value="" selected disabled hidden>Choose district</option>
                                    <option value="Brooklyn">Brooklyn</option>
                                    <option value="Manhattan">Manhattan</option>
                                    <option value="Staten Island">Staten Island</option>
                                    <option value="The Bronx">The Bronx</option>
                                    <option value="Queens">Queens</option>
                                </select>
                                <div class="invalid-feedback">Please choose the district.</div>
                            </div>
                            <div class="pt-2 mb-3">
                                <label class="form-label fw-bold mb-2" for="property-address">Address</label>
                                <input class="form-control" type="text" id="property-address" placeholder="Enter your address" required>
                                <div class="invalid-feedback">Please enter your property's address.</div>
                            </div>
                            <div class="pt-2 mb-3">
                                <label class="form-label fw-bold mb-2">Number of rooms</label>
                                <div class="btn-group" role="group" aria-label="Choose number of rooms">
                                    <input class="btn-check" type="radio" id="rooms-1" name="rooms">
                                    <label class="btn btn-outline-secondary" for="rooms-1">1</label>
                                    <input class="btn-check" type="radio" id="rooms-2" name="rooms">
                                    <label class="btn btn-outline-secondary" for="rooms-2">2</label>
                                    <input class="btn-check" type="radio" id="rooms-3" name="rooms">
                                    <label class="btn btn-outline-secondary" for="rooms-3">3</label>
                                    <input class="btn-check" type="radio" id="rooms-4" name="rooms">
                                    <label class="btn btn-outline-secondary" for="rooms-4">4</label>
                                    <input class="btn-check" type="radio" id="rooms-5" name="rooms">
                                    <label class="btn btn-outline-secondary" for="rooms-5">5+</label>
                                </div>
                            </div>
                            <div class="pt-2 mb-4">
                                <label class="form-label fw-bold mb-2" for="property-area">Total area, sq.m.</label>
                                <input class="form-control" type="text" id="property-area" placeholder="Enter your area" required>
                                <div class="invalid-feedback">Please enter your property's area.</div>
                            </div>
                            <button class="btn btn-primary d-block w-100 mb-4" type="submit"><i class="fi-calculator me-2"></i>Calculate</button>
                        </form>
                        <!-- Search Property Form End -->

                    </div>
                </div>
            </div>
        </div>

        <!-- Hero-->
        <section class="container pt-5 my-5 pb-lg-4">
            <div class="row pt-0 pt-md-2 pt-lg-0">
                <div class="col-xl-7 col-lg-6 col-md-5 order-md-2 mb-4 mb-lg-3"><img src="img/real-estate/hero-image.jpg" alt="Hero image"></div>
                <div class="col-xl-5 col-lg-6 col-md-7 order-md-1 pt-xl-5 pe-lg-0 mb-3 text-md-start text-center">
                    <h1 class="display-4 mt-lg-5 mb-md-4 mb-3 pt-md-4 pb-lg-2">Easy way to find <br> a perfect property</h1>
                    <p class="position-relative lead me-lg-n5">We provide a complete service for the sale, purchase or rental of real estate. We have been operating more than 10 years. Search millions of apartments and houses on Finder.</p>
                </div>
                <!-- Search property form group-->
                <div class="col-xl-8 col-lg-10 order-3 mt-lg-n5">
                    <form class="form-group d-block">
                        <div class="row g-0 ms-sm-n2">
                            <div class="col-md-8 d-sm-flex align-items-center">
                                <div class="dropdown w-sm-50 border-end-sm" data-bs-toggle="select">
                                    <button class="btn btn-link dropdown-toggle ps-2 ps-sm-3" type="button" data-bs-toggle="dropdown"><i class="fi-home me-2"></i><span class="dropdown-toggle-label">For rent</span></button>
                                    <input type="hidden">
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="#"><span class="dropdown-item-label">For rent</span></a></li>
                                        <li><a class="dropdown-item" href="#"><span class="dropdown-item-label">For sale</span></a></li>
                                    </ul>
                                </div>
                                <hr class="d-sm-none my-2">
                                <div class="dropdown w-sm-50 border-end-sm" data-bs-toggle="select">
                                    <button class="btn btn-link dropdown-toggle ps-2 ps-sm-3" type="button" data-bs-toggle="dropdown"><i class="fi-map-pin me-2"></i><span class="dropdown-toggle-label">Location</span></button>
                                    <input type="hidden">
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="#"><span class="dropdown-item-label">New York</span></a></li>
                                        <li><a class="dropdown-item" href="#"><span class="dropdown-item-label">Chicago</span></a></li>
                                        <li><a class="dropdown-item" href="#"><span class="dropdown-item-label">Los Angeles</span></a></li>
                                        <li><a class="dropdown-item" href="#"><span class="dropdown-item-label">San Diego</span></a></li>
                                    </ul>
                                </div>
                                <hr class="d-sm-none my-2">
                                <div class="dropdown w-sm-50 border-end-md" data-bs-toggle="select">
                                    <button class="btn btn-link dropdown-toggle ps-2 ps-sm-3" type="button" data-bs-toggle="dropdown"><i class="fi-list me-2"></i><span class="dropdown-toggle-label">Property type</span></button>
                                    <input type="hidden">
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="#"><span class="dropdown-item-label">Houses</span></a></li>
                                        <li><a class="dropdown-item" href="#"><span class="dropdown-item-label">Apartments</span></a></li>
                                        <li><a class="dropdown-item" href="#"><span class="dropdown-item-label">Commercial</span></a></li>
                                        <li><a class="dropdown-item" href="#"><span class="dropdown-item-label">Daily rental</span></a></li>
                                        <li><a class="dropdown-item" href="#"><span class="dropdown-item-label">New buildings</span></a></li>
                                    </ul>
                                </div>
                            </div>
                            <hr class="d-md-none mt-2">
                            <div class="col-md-4 d-sm-flex align-items-center pt-4 pt-md-0">
                                <div class="d-flex align-items-center w-100 pt-2 pb-4 py-sm-0 ps-2 ps-sm-3"><i class="fi-cash fs-lg text-muted me-2"></i><span class="text-muted">Price</span>
                                    <div class="range-slider pe-0 pe-sm-3" data-start-min="450" data-min="0" data-max="1000" data-step="1">
                                        <div class="range-slider-ui"></div>
                                        <input class="form-control range-slider-value-min" type="hidden">
                                    </div>
                                </div>
                                <button class="btn btn-icon btn-primary px-3 w-100 w-sm-auto flex-shrink-0" type="button"><i class="fi-search"></i><span class="d-sm-none d-inline-block ms-2">Search</span></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>

        <!-- Property categories-->
        <section class="container mb-5">
            <div class="row row-cols-lg-6 row-cols-sm-3 row-cols-2 g-3 g-xl-4">
                <div class="col"><a class="icon-box card card-body h-100 border-0 shadow-sm card-hover h-100 text-center" href="catalog-rent.html">
                        <div class="icon-box-media bg-faded-primary text-primary rounded-circle mb-3 mx-auto">
                            <i class="fi-house"></i>
                        </div>
                        <h3 class="icon-box-title fs-base mb-0">Houses</h3>
                    </a></div>
                <div class="col"><a class="icon-box card card-body h-100 border-0 shadow-sm card-hover h-100 text-center" href="catalog-sale.html">
                        <div class="icon-box-media bg-faded-primary text-primary rounded-circle mb-3 mx-auto"><i class="fi-apartment"></i></div>
                        <h3 class="icon-box-title fs-base mb-0">Apartments</h3>
                    </a></div>
                <div class="col"><a class="icon-box card card-body h-100 border-0 shadow-sm card-hover h-100 text-center" href="catalog-rent.html">
                        <div class="icon-box-media bg-faded-primary text-primary rounded-circle mb-3 mx-auto"><i class="fi-shop"></i></div>
                        <h3 class="icon-box-title fs-base mb-0">Commercial</h3>
                    </a></div>
                <div class="col"><a class="icon-box card card-body h-100 border-0 shadow-sm card-hover h-100 text-center" href="catalog-sale.html">
                        <div class="icon-box-media bg-faded-primary text-primary rounded-circle mb-3 mx-auto"><i class="fi-rent"></i></div>
                        <h3 class="icon-box-title fs-base mb-0">Daily rental</h3>
                    </a></div>
                <div class="col"><a class="icon-box card card-body h-100 border-0 shadow-sm card-hover h-100 text-center" href="catalog-rent.html">
                        <div class="icon-box-media bg-faded-primary text-primary rounded-circle mb-3 mx-auto"><i class="fi-house-chosen"></i></div>
                        <h3 class="icon-box-title fs-base mb-0">New buildings</h3>
                    </a></div>
                <div class="col">
                    <div class="dropdown h-100"><a class="icon-box card card-body h-100 border-0 shadow-sm card-hover text-center" href="#" data-bs-toggle="dropdown">
                            <div class="icon-box-media bg-faded-primary text-primary rounded-circle mb-3 mx-auto"><i class="fi-dots-horisontal"></i></div>
                            <h3 class="icon-box-title fs-base mb-0">More</h3>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end my-1"><a class="dropdown-item fw-bold" href="catalog-sale.html"><i class="fi-single-bed fs-base opacity-60 me-2"></i>Room</a><a class="dropdown-item fw-bold" href="catalog-rent.html"><i class="fi-computer fs-base opacity-60 me-2"></i>Office</a><a class="dropdown-item fw-bold" href="catalog-sale.html"><i class="fi-buy fs-base opacity-60 me-2"></i>Land</a><a class="dropdown-item fw-bold" href="catalog-rent.html"><i class="fi-parking fs-base opacity-60 me-2"></i>Parking lot</a></div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Services-->
        <section class="container mb-5 mt-n3 mt-lg-0">
            <div class="tns-carousel-wrapper tns-nav-outside tns-nav-outside-flush mx-n2">
                <div class="tns-carousel-inner row gx-4 mx-0 py-3" data-carousel-options="{&quot;items&quot;: 3, &quot;controls&quot;: false, &quot;responsive&quot;: {&quot;0&quot;:{&quot;items&quot;:1},&quot;500&quot;:{&quot;items&quot;:2},&quot;768&quot;:{&quot;items&quot;:3}}}">
                    <div class="col">
                        <div class="card card-hover border-0 h-100 pb-2 pb-sm-3 px-sm-3 text-center"><img class="d-block mx-auto my-3" src="img/real-estate/illustrations/buy.svg" width="256" alt="Illustration">
                            <div class="card-body">
                                <h2 class="h4 card-title">Buy a property</h2>
                                <p class="card-text fs-sm">Blandit lorem dictum in velit. Et nisi at faucibus mauris pretium enim. Risus sapien nisi aliquam egestas leo dignissim.</p>
                            </div>
                            <div class="card-footer pt-0 border-0"><a class="btn btn-outline-primary stretched-link" href="catalog-sale.html">Find a home</a></div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card card-hover border-0 h-100 pb-2 pb-sm-3 px-sm-3 text-center"><img class="d-block mx-auto my-3" src="img/real-estate/illustrations/sell.svg" width="256" alt="Illustration">
                            <div class="card-body">
                                <h2 class="h4 card-title">Sell a property</h2>
                                <p class="card-text fs-sm">Amet, cras orci justo, tortor nisl aliquet. Enim tincidunt tellus nunc, nulla arcu posuere quis. Velit turpis orci venenatis.</p>
                            </div>
                            <div class="card-footer pt-0 border-0"><a class="btn btn-outline-primary stretched-link" href="#">Place an ad</a></div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card card-hover border-0 h-100 pb-2 pb-sm-3 px-sm-3 text-center"><img class="d-block mx-auto my-3" src="img/real-estate/illustrations/rent.svg" width="256" alt="Illustration">
                            <div class="card-body">
                                <h2 class="h4 card-title">Rent a property</h2>
                                <p class="card-text fs-sm">Sed sed aliquet sed id purus malesuada congue viverra. Habitant quis lacus, volutpat natoque ipsum iaculis cursus.</p>
                            </div>
                            <div class="card-footer pt-0 border-0"><a class="btn btn-outline-primary stretched-link" href="catalog-rent.html">Find a rental</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <hr class="mt-n1 mb-5 d-md-none">

        <!-- Top offers (carousel)-->
        <section class="container mb-5 pb-md-4">
            <div class="d-flex align-items-center justify-content-between mb-3">
                <h2 class="h3 mb-0">Top offers</h2><a class="btn btn-link fw-normal p-0" href="catalog-rent.html">View all<i class="fi-arrow-long-right ms-2"></i></a>
            </div>
            <div id="" class="tns-carousel-wrapper tns-controls-outside-xxl tns-nav-outside tns-nav-outside-flush mx-n2">
                <div class="tns-carousel-inner row gx-4 mx-0 pt-3 pb-4" data-carousel-options="{&quot;items&quot;: 4, &quot;responsive&quot;: {&quot;0&quot;:{&quot;items&quot;:1},&quot;500&quot;:{&quot;items&quot;:2},&quot;768&quot;:{&quot;items&quot;:3},&quot;992&quot;:{&quot;items&quot;:4}}}">
                    <!-- Loader Item-->
                    <div class="col">
                        <div class="card shadow-sm card-hover border-0 h-100">
                            <div class="card-img-top card-img-hover">
                                <a class="img-overlay" href="single-v1.html"></a>
                                <div class="position-absolute start-0 top-0 pt-3 ps-3">
                                    <span class="d-table badge bg-success mb-1">Verified</span>
                                    <span class="d-table badge bg-info">New</span>
                                </div>
                                <div class="content-overlay end-0 top-0 pt-3 pe-3">
                                    <button class="btn btn-icon btn-light btn-xs text-primary rounded-circle" type="button" data-bs-toggle="tooltip" data-bs-placement="left" title="Add to Wishlist"><i class="fi-heart"></i></button>
                                </div><img src="img/real-estate/catalog/01.jpg" alt="Image">
                            </div>
                            <div class="card-body position-relative pb-3">
                                <h5 class="card-title placeholder-glow">
                                    <span class="placeholder col-6"></span>
                                </h5>
                                <p class="card-text placeholder-glow">
                                    <span class="placeholder col-7"></span>
                                    <span class="placeholder col-4"></span>
                                    <span class="placeholder col-4"></span>
                                    <span class="placeholder col-6"></span>
                                    <span class="placeholder col-8"></span>
                                </p>
                            </div>
                            <div class="card-footer d-flex align-items-center justify-content-center mx-3 pt-3 text-nowrap placeholder-glow">
                                <span class="d-inline-block mx-1 px-2 mx-3 fs-sm"><span class="placeholder col-12"></span><i class="fi-bed ms-1 mt-n1 fs-lg text-muted"></i></span>
                                <span class="d-inline-block mx-1 px-2 mx-3 fs-sm"><span class="placeholder col-12"></span><i class="fi-bath ms-1 mt-n1 fs-lg text-muted"></i></span>
                                <span class="d-inline-block mx-1 px-2 mx-3 fs-sm"><span class="placeholder col-12"></span><i class="fi-car ms-1 mt-n1 fs-lg text-muted"></i></span>
                            </div>
                        </div>
                    </div>

                    <?php
                    $fetchHouses = "SELECT house_id, main_img, bedroom_count, bathroom_count, parking_count, area, rent, address, city_name, 
                    state_name, country_name, category_name, level_name
                    FROM houses
                    INNER JOIN cities ON houses.city_id = cities.id
                    INNER JOIN states ON cities.state_id = states.id
                    INNER JOIN countries ON states.country_id = countries.id
                    INNER JOIN house_category ON houses.category_id = house_category.category_id
                    INNER JOIN furnishing_level ON houses.level_id = furnishing_level.level_id";

                    $rs = $conn->query($fetchHouses);
                    if ($rs->num_rows > 0) {
                        $data = [];
                        // Houses found
                        while ($row = $rs->fetch_assoc()) {
                            ?>
                            <div class="col">

                                <div class="card shadow-sm card-hover border-0 h-100">

                                    <div class="card-img-top card-img-hover">
                                        <a class="img-overlay" href="./single.php?i=<?= base64_encode($row['house_id']) ?>"></a>
                                        <div class="position-absolute start-0 top-0 pt-3 ps-3">
                                            <span class="d-table badge bg-success mb-1">Verified</span>
                                        </div>
                                        <div class="content-overlay end-0 top-0 pt-3 pe-3">
                                            <button class="btn btn-icon btn-light btn-xs text-primary rounded-circle" type="button" data-bs-toggle="tooltip" data-bs-placement="left" title="Add to Wishlist">
                                                <i class="fi-heart"></i>
                                            </button>
                                        </div><img src="img/real-estate/catalog/05.jpg" alt="Image">
                                    </div>

                                    <div class="card-body position-relative pb-3">
                                        <h4 class="mb-1 fs-xs fw-normal text-uppercase text-primary">For rent</h4>
                                        <h3 class="h6 mb-2 fs-base"><a class="nav-link stretched-link" href="./single.php?i=<?= base64_encode($row['house_id']) ?>"><?= $row["category_name"] ?> | <?= $row["area"] ?> sq.ft</a></h3>
                                        <p class="mb-2 fs-sm text-muted"><?= $row["address"] . ", " . $row["city_name"] . ", " . $row["state_name"] ?></p>
                                        <div class="fw-bold"><i class="fi-cash mt-n1 me-2 lead align-middle opacity-70"></i> &#8377; <?= $row["rent"] ?></div>
                                    </div>

                                    <div class="card-footer d-flex align-items-center justify-content-center mx-3 pt-3 text-nowrap">
                                        <span class="d-inline-block mx-1 px-2 fs-sm"><?= $row["bedroom_count"] ?><i class="fi-bed ms-1 mt-n1 fs-lg text-muted"></i></span>
                                        <span class="d-inline-block mx-1 px-2 fs-sm"><?= $row["bathroom_count"] ?><i class="fi-bath ms-1 mt-n1 fs-lg text-muted"></i></span>
                                        <span class="d-inline-block mx-1 px-2 fs-sm"><?= $row["parking_count"] ?><i class="fi-car ms-1 mt-n1 fs-lg text-muted"></i></span>
                                    </div>

                                </div>
                            </div>
                            <?php
                        }
                    } else {
                        // No House not found

                    }
                    ?>

                    <!-- Item-->
                    <!-- <div class="col">

                        <div class="card shadow-sm card-hover border-0 h-100">

                            <div class="card-img-top card-img-hover">
                                <a class="img-overlay" href="./single.php?i=<?= base64_encode($row['house_id']) ?>"></a>
                                <div class="position-absolute start-0 top-0 pt-3 ps-3">
                                    <span class="d-table badge bg-success mb-1">Verified</span>
                                </div>
                                <div class="content-overlay end-0 top-0 pt-3 pe-3">
                                    <button class="btn btn-icon btn-light btn-xs text-primary rounded-circle" type="button" data-bs-toggle="tooltip" data-bs-placement="left" title="Add to Wishlist">
                                        <i class="fi-heart"></i>
                                    </button>
                                </div><img src="img/real-estate/catalog/05.jpg" alt="Image">
                            </div>

                            <div class="card-body position-relative pb-3">
                                <h4 class="mb-1 fs-xs fw-normal text-uppercase text-primary">For sale</h4>
                                <h3 class="h6 mb-2 fs-base"><a class="nav-link stretched-link" href="single-v1.html">Cottage | 120 sq.m</a></h3>
                                <p class="mb-2 fs-sm text-muted">42 Broadway New York, NY 10004</p>
                                <div class="fw-bold"><i class="fi-cash mt-n1 me-2 lead align-middle opacity-70"></i>$184,000</div>
                            </div>

                            <div class="card-footer d-flex align-items-center justify-content-center mx-3 pt-3 text-nowrap">
                                <span class="d-inline-block mx-1 px-2 fs-sm">4<i class="fi-bed ms-1 mt-n1 fs-lg text-muted"></i></span>
                                <span class="d-inline-block mx-1 px-2 fs-sm">2<i class="fi-bath ms-1 mt-n1 fs-lg text-muted"></i></span>
                                <span class="d-inline-block mx-1 px-2 fs-sm">1<i class="fi-car ms-1 mt-n1 fs-lg text-muted"></i></span>
                            </div>

                        </div>
                    </div> -->
                </div>
            </div>
        </section>
        <!-- Recently added-->
        <section class="container pb-4 pt-1 mb-5">
            <div class="d-flex align-items-end align-items-lg-center justify-content-between mb-4 pb-md-2">
                <div class="d-flex w-100 align-items-center justify-content-between justify-content-lg-start">
                    <h2 class="h3 mb-0 me-md-4">Added Recently</h2>
                    <div class="dropdown d-md-none" data-bs-toggle="select">
                        <button class="btn btn-outline-secondary btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown"><span class="dropdown-toggle-label">Houses</span></button>
                        <input type="hidden">
                        <div class="dropdown-menu"><a class="dropdown-item" href="#"><span class="dropdown-item-label">Apartments</span></a><a class="dropdown-item" href="#"><span class="dropdown-item-label">Houses</span></a><a class="dropdown-item" href="#"><span class="dropdown-item-label">Rooms</span></a><a class="dropdown-item" href="#"><span class="dropdown-item-label">Commercial</span></a></div>
                    </div>
                    <ul class="nav nav-tabs d-none d-md-flex ps-lg-2 mb-0">
                        <li class="nav-item"><a class="nav-link fs-sm mb-2 mb-md-0" href="#">Apartments</a></li>
                        <li class="nav-item"><a class="nav-link fs-sm active mb-2 mb-md-0" href="#">Houses</a></li>
                        <li class="nav-item"><a class="nav-link fs-sm mb-2 mb-md-0" href="#">Rooms</a></li>
                        <li class="nav-item"><a class="nav-link fs-sm mb-2 mb-md-0" href="#">Commercial</a></li>
                    </ul>
                </div><a class="btn btn-link fw-normal d-none d-lg-block p-0" href="catalog-rent.html">View all<i class="fi-arrow-long-right ms-2"></i></a>
            </div>
            <div class="row g-4">
                <div class="col-md-6">
                    <div class="card bg-size-cover bg-position-center border-0 overflow-hidden h-100" style="background-image: url(img/real-estate/recent/01.jpg);"><span class="img-gradient-overlay"></span>
                        <div class="card-body content-overlay pb-0">
                            <div class="d-flex"><span class="badge bg-success fs-sm me-2">Verified</span><span class="badge bg-info fs-sm">New</span></div>
                        </div>
                        <div class="card-footer content-overlay border-0 pt-0 pb-4">
                            <div class="d-sm-flex justify-content-between align-items-end pt-5 mt-2 mt-sm-5"><a class="text-decoration-none text-light pe-2" href="single-v1.html">
                                    <div class="fs-sm text-uppercase pt-2 mb-1">For rental</div>
                                    <h3 class="h5 text-light mb-1">Luxury Rental Villa</h3>
                                    <div class="fs-sm opacity-70"><i class="fi-map-pin me-1"></i>118-11 Sutphin Blvd Jamaica, NY 11434</div>
                                </a>
                                <div class="btn-group ms-n2 ms-sm-0 mt-3"><a class="btn btn-primary px-3" href="single-v1.html" style="height: 2.75rem;">From $3,850</a>
                                    <button class="btn btn-primary btn-icon border-end-0 border-top-0 border-bottom-0 border-light fs-sm" type="button"><i class="fi-heart"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card bg-size-cover bg-position-center border-0 overflow-hidden mb-4" style="background-image: url(img/real-estate/recent/02.jpg);"><span class="img-gradient-overlay"></span>
                        <div class="card-body content-overlay pb-0"><span class="badge bg-info fs-sm">New</span></div>
                        <div class="card-footer content-overlay border-0 pt-0 pb-4">
                            <div class="d-sm-flex justify-content-between align-items-end pt-5 mt-2 mt-sm-5"><a class="text-decoration-none text-light pe-2" href="single-v1.html">
                                    <div class="fs-sm text-uppercase pt-2 mb-1">For sale</div>
                                    <h3 class="h5 text-light mb-1">Duplex with Garage</h3>
                                    <div class="fs-sm opacity-70"><i class="fi-map-pin me-1"></i>21 Pulaski Road Kings Park, NY 11754</div>
                                </a>
                                <div class="btn-group ms-n2 ms-sm-0 mt-3"><a class="btn btn-primary px-3" href="single-v1.html" style="height: 2.75rem;">$200,410</a>
                                    <button class="btn btn-primary btn-icon border-end-0 border-top-0 border-bottom-0 border-light fs-sm" type="button"><i class="fi-heart"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card bg-size-cover bg-position-center border-0 overflow-hidden" style="background-image: url(img/real-estate/recent/03.jpg);"><span class="img-gradient-overlay"></span>
                        <div class="card-body content-overlay pb-0"><span class="badge bg-info fs-sm">New</span></div>
                        <div class="card-footer content-overlay border-0 pt-0 pb-4">
                            <div class="d-sm-flex justify-content-between align-items-end pt-5 mt-2 mt-sm-5"><a class="text-decoration-none text-light pe-2" href="single-v1.html">
                                    <div class="fs-sm text-uppercase pt-2 mb-1">For sale</div>
                                    <h3 class="h5 text-light mb-1">Country House</h3>
                                    <div class="fs-sm opacity-70"><i class="fi-map-pin me-1"></i>6954 Grand AveMaspeth, NY 11378</div>
                                </a>
                                <div class="btn-group ms-n2 ms-sm-0 mt-3"><a class="btn btn-primary px-3" href="single-v1.html" style="height: 2.75rem;">$162,000</a>
                                    <button class="btn btn-primary btn-icon border-end-0 border-top-0 border-bottom-0 border-light fs-sm" type="button"><i class="fi-heart"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Property cost calculator-->
        <section class="container mb-5 pb-2 pb-lg-4">
            <div class="row align-items-center">
                <div class="col-md-5"><img class="d-block mx-md-0 mx-auto mb-md-0 mb-4" src="img/real-estate/illustrations/calculator.svg" width="416" alt="Illustration"></div>
                <div class="col-xxl-6 col-md-7 text-md-start text-center">
                    <h2>Сalculate the cost of your property</h2>
                    <p class="pb-3 fs-lg">Real estate appraisal is a procedure that allows you to determine the average market value of real estate (apartment, house, land, etc.). Сalculate the cost of your property with our new Calculation Service.</p><a class="btn btn-lg btn-primary" href="#cost-calculator" data-bs-toggle="modal"><i class="fi-calculator me-2"></i>Calculate</a>
                </div>
            </div>
        </section>
        <!-- Cities (carousel)-->
        <section class="container mb-5 pb-2">
            <div class="d-flex align-items-center justify-content-between mb-3">
                <h2 class="h3 mb-0">Search property by city</h2><a class="btn btn-link fw-normal ms-md-3 pb-0" href="catalog-rent.html">View all<i class="fi-arrow-long-right ms-2"></i></a>
            </div>
            <div class="tns-carousel-wrapper tns-controls-outside-xxl tns-nav-outside tns-nav-outside-flush mx-n2">
                <div class="tns-carousel-inner row gx-4 mx-0 py-md-4 py-3" data-carousel-options="{&quot;items&quot;: 4, &quot;responsive&quot;: {&quot;0&quot;:{&quot;items&quot;:1},&quot;500&quot;:{&quot;items&quot;:2},&quot;768&quot;:{&quot;items&quot;:3},&quot;992&quot;:{&quot;items&quot;:4}}}">
                    <!-- Item-->
                    <div class="col"><a class="card shadow-sm card-hover border-0" href="catalog-sale.html">
                            <div class="card-img-top card-img-hover"><span class="img-overlay opacity-65"></span><img src="img/real-estate/city/new-york.jpg" alt="New York">
                                <div class="content-overlay start-0 top-0 d-flex align-items-center justify-content-center w-100 h-100 p-3">
                                    <div class="w-100 p-1">
                                        <div class="mb-2">
                                            <h4 class="mb-2 fs-xs fw-normal text-light"><i class="fi-wallet mt-n1 me-2 fs-sm align-middle"></i>Property for sale</h4>
                                            <div class="d-flex align-items-center">
                                                <div class="progress progress-light w-100">
                                                    <div class="progress-bar bg-danger" role="progressbar" style="width: 30%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div><span class="text-light fs-sm ps-1 ms-2">893</span>
                                            </div>
                                        </div>
                                        <div class="pt-1">
                                            <h4 class="mb-2 fs-xs fw-normal text-light"><i class="fi-home mt-n1 me-2 fs-sm align-middle"></i>Property for rent</h4>
                                            <div class="d-flex align-items-center">
                                                <div class="progress progress-light w-100">
                                                    <div class="progress-bar bg-success" role="progressbar" style="width: 85%" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div><span class="text-light fs-sm ps-1 ms-2">3756</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body text-center">
                                <h3 class="mb-0 fs-base text-nav">New York</h3>
                            </div>
                        </a></div>
                    <!-- Item-->
                    <div class="col"><a class="card shadow-sm card-hover border-0" href="catalog-rent.html">
                            <div class="card-img-top card-img-hover"><span class="img-overlay opacity-65"></span><img src="img/real-estate/city/chicago.jpg" alt="Chicago">
                                <div class="content-overlay start-0 top-0 d-flex align-items-center justify-content-center w-100 h-100 p-3">
                                    <div class="w-100 p-1">
                                        <div class="mb-2">
                                            <h4 class="mb-2 fs-xs fw-normal text-light"><i class="fi-wallet mt-n1 me-2 fs-sm align-middle"></i>Property for sale</h4>
                                            <div class="d-flex align-items-center">
                                                <div class="progress progress-light w-100">
                                                    <div class="progress-bar bg-danger" role="progressbar" style="width: 37%" aria-valuenow="37" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div><span class="text-light fs-sm ps-1 ms-2">268</span>
                                            </div>
                                        </div>
                                        <div class="pt-1">
                                            <h4 class="mb-2 fs-xs fw-normal text-light"><i class="fi-home mt-n1 me-2 fs-sm align-middle"></i>Property for rent</h4>
                                            <div class="d-flex align-items-center">
                                                <div class="progress progress-light w-100">
                                                    <div class="progress-bar bg-success" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div><span class="text-light fs-sm ps-1 ms-2">1540</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body text-center">
                                <h3 class="mb-0 fs-base text-nav">Chicago</h3>
                            </div>
                        </a></div>
                    <!-- Item-->
                    <div class="col"><a class="card shadow-sm card-hover border-0" href="catalog-sale.html">
                            <div class="card-img-top card-img-hover"><span class="img-overlay opacity-65"></span><img src="img/real-estate/city/los-angeles.jpg" alt="Los Angeles">
                                <div class="content-overlay start-0 top-0 d-flex align-items-center justify-content-center w-100 h-100 p-3">
                                    <div class="w-100 p-1">
                                        <div class="mb-2">
                                            <h4 class="mb-2 fs-xs fw-normal text-light"><i class="fi-wallet mt-n1 me-2 fs-sm align-middle"></i>Property for sale</h4>
                                            <div class="d-flex align-items-center">
                                                <div class="progress progress-light w-100">
                                                    <div class="progress-bar bg-danger" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div><span class="text-light fs-sm ps-1 ms-2">2750</span>
                                            </div>
                                        </div>
                                        <div class="pt-1">
                                            <h4 class="mb-2 fs-xs fw-normal text-light"><i class="fi-home mt-n1 me-2 fs-sm align-middle"></i>Property for rent</h4>
                                            <div class="d-flex align-items-center">
                                                <div class="progress progress-light w-100">
                                                    <div class="progress-bar bg-success" role="progressbar" style="width: 40%" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div><span class="text-light fs-sm ps-1 ms-2">692</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body text-center">
                                <h3 class="mb-0 fs-base text-nav">Los Angeles</h3>
                            </div>
                        </a></div>
                    <!-- Item-->
                    <div class="col"><a class="card shadow-sm card-hover border-0" href="catalog-rent.html">
                            <div class="card-img-top card-img-hover"><span class="img-overlay opacity-65"></span><img src="img/real-estate/city/san-diego.jpg" alt="San Diego">
                                <div class="content-overlay start-0 top-0 d-flex align-items-center justify-content-center w-100 h-100 p-3">
                                    <div class="w-100 p-1">
                                        <div class="mb-2">
                                            <h4 class="mb-2 fs-xs fw-normal text-light"><i class="fi-wallet mt-n1 me-2 fs-sm align-middle"></i>Property for sale</h4>
                                            <div class="d-flex align-items-center">
                                                <div class="progress progress-light w-100">
                                                    <div class="progress-bar bg-danger" role="progressbar" style="width: 55%" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div><span class="text-light fs-sm ps-1 ms-2">1739</span>
                                            </div>
                                        </div>
                                        <div class="pt-1">
                                            <h4 class="mb-2 fs-xs fw-normal text-light"><i class="fi-home mt-n1 me-2 fs-sm align-middle"></i>Property for rent</h4>
                                            <div class="d-flex align-items-center">
                                                <div class="progress progress-light w-100">
                                                    <div class="progress-bar bg-success" role="progressbar" style="width: 60%" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div><span class="text-light fs-sm ps-1 ms-2">1854</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body text-center">
                                <h3 class="mb-0 fs-base text-nav">San Diego</h3>
                            </div>
                        </a></div>
                    <!-- Item-->
                    <div class="col"><a class="card shadow-sm card-hover border-0" href="catalog-sale.html">
                            <div class="card-img-top card-img-hover"><span class="img-overlay opacity-65"></span><img src="img/real-estate/city/dallas.jpg" alt="Dallas">
                                <div class="content-overlay start-0 top-0 d-flex align-items-center justify-content-center w-100 h-100 p-3">
                                    <div class="w-100 p-1">
                                        <div class="mb-2">
                                            <h4 class="mb-2 fs-xs fw-normal text-light"><i class="fi-wallet mt-n1 me-2 fs-sm align-middle"></i>Property for sale</h4>
                                            <div class="d-flex align-items-center">
                                                <div class="progress progress-light w-100">
                                                    <div class="progress-bar bg-danger" role="progressbar" style="width: 90%" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div><span class="text-light fs-sm ps-1 ms-2">2567</span>
                                            </div>
                                        </div>
                                        <div class="pt-1">
                                            <h4 class="mb-2 fs-xs fw-normal text-light"><i class="fi-home mt-n1 me-2 fs-sm align-middle"></i>Property for rent</h4>
                                            <div class="d-flex align-items-center">
                                                <div class="progress progress-light w-100">
                                                    <div class="progress-bar bg-success" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div><span class="text-light fs-sm ps-1 ms-2">1204</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body text-center">
                                <h3 class="mb-0 fs-base text-nav">Dallas</h3>
                            </div>
                        </a></div>
                </div>
            </div>
        </section>
        <!-- Partners (carousel)-->
        <section class="container mb-5 pb-2 pb-lg-4">
            <h2 class="h3 mb-4 text-center text-md-start">Our partners</h2>
            <div class="tns-carousel-wrapper tns-nav-outside tns-nav-outside-flush">
                <div class="tns-carousel-inner" data-carousel-options="{&quot;items&quot;: 6, &quot;controls&quot;: false, &quot;responsive&quot;: {&quot;0&quot;:{&quot;items&quot;:2}, &quot;500&quot;:{&quot;items&quot;:4}, &quot;992&quot;:{&quot;items&quot;:5, &quot;gutter&quot;: 16}, &quot;1200&quot;:{&quot;items&quot;:6, &quot;gutter&quot;: 24}}}">
                    <div><a class="swap-image" href="#"><img class="swap-to" src="img/real-estate/brands/01_color.svg" alt="Logo" width="196"><img class="swap-from" src="img/real-estate/brands/01_gray.svg" alt="Logo" width="196"></a></div>
                    <div><a class="swap-image" href="#"><img class="swap-to" src="img/real-estate/brands/02_color.svg" alt="Logo" width="196"><img class="swap-from" src="img/real-estate/brands/02_gray.svg" alt="Logo" width="196"></a></div>
                    <div><a class="swap-image" href="#"><img class="swap-to" src="img/real-estate/brands/03_color.svg" alt="Logo" width="196"><img class="swap-from" src="img/real-estate/brands/03_gray.svg" alt="Logo" width="196"></a></div>
                    <div><a class="swap-image" href="#"><img class="swap-to" src="img/real-estate/brands/04_color.svg" alt="Logo" width="196"><img class="swap-from" src="img/real-estate/brands/04_gray.svg" alt="Logo" width="196"></a></div>
                    <div><a class="swap-image" href="#"><img class="swap-to" src="img/real-estate/brands/05_color.svg" alt="Logo" width="196"><img class="swap-from" src="img/real-estate/brands/05_gray.svg" alt="Logo" width="196"></a></div>
                    <div><a class="swap-image" href="#"><img class="swap-to" src="img/real-estate/brands/06_color.svg" alt="Logo" width="196"><img class="swap-from" src="img/real-estate/brands/06_gray.svg" alt="Logo" width="196"></a></div>
                </div>
            </div>
        </section>
        <!-- Top agents (lnked carousel)-->
        <section class="container mb-5 pb-2 pb-lg-4">
            <h2 class="h3 mb-4 pb-3 text-center text-md-start">Top real estate agents</h2>
            <div class="tns-carousel-wrapper">
                <div class="tns-carousel-inner" data-carousel-options="{&quot;items&quot;: 1, &quot;mode&quot;: &quot;gallery&quot;, &quot;controlsContainer&quot;: &quot;#agents-carousel-controls&quot;, &quot;nav&quot;: false}">
                    <div>
                        <div class="row align-items-center">
                            <div class="col-xl-4 d-none d-xl-block"><img class="rounded-3" src="img/real-estate/agents/01.jpg" alt="Agent picture"></div>
                            <div class="col-xl-4 col-md-5 col-sm-4"><img class="rounded-3" src="img/real-estate/agents/02.jpg" alt="Agent picture"></div>
                            <div class="col-xl-4 col-md-7 col-sm-8 px-4 px-sm-3 px-md-0 ms-md-n4 mt-n5 mt-sm-0 py-3">
                                <div class="card border-0 shadow-sm ms-sm-n5">
                                    <blockquote class="blockquote card-body">
                                        <h4 style="max-width: 22rem;">&quot;I will select the best accommodation for you&quot;</h4>
                                        <p class="d-sm-none d-lg-block">Amet libero morbi venenatis ut est. Iaculis leo ultricies nunc id ante adipiscing. Vel metus odio at faucibus ac. Neque id placerat et id ut. Scelerisque eu mi ullamcorper sit urna. Est volutpat dignissim nec.</p>
                                        <footer class="d-flex justify-content-between">
                                            <div class="pe-3"><a class="text-decoration-none" href="vendor-properties.html">
                                                    <h6 class="mb-0">Floyd Miles</h6>
                                                    <div class="text-muted fw-normal fs-sm mb-3">Imperial Property Group Agent</div>
                                                </a><a class="btn btn-icon btn-light-primary btn-xs shadow-sm rounded-circle me-2 mb-2" href="#"><i class="fi-facebook"></i></a><a class="btn btn-icon btn-light-primary btn-xs shadow-sm rounded-circle me-2 mb-2" href="#"><i class="fi-twitter"></i></a><a class="btn btn-icon btn-light-primary btn-xs shadow-sm rounded-circle me-2 mb-2" href="#"><i class="fi-linkedin"></i></a></div>
                                            <div><span class="star-rating"><i class="star-rating-icon fi-star-filled active"></i><i class="star-rating-icon fi-star-filled active"></i><i class="star-rating-icon fi-star-filled active"></i><i class="star-rating-icon fi-star-filled active"></i><i class="star-rating-icon fi-star-filled active"></i></span>
                                                <div class="text-muted fs-sm mt-1">45 reviews</div>
                                            </div>
                                        </footer>
                                    </blockquote>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="row align-items-center">
                            <div class="col-xl-4 d-none d-xl-block"><img class="rounded-3" src="img/real-estate/agents/02.jpg" alt="Agent picture"></div>
                            <div class="col-xl-4 col-md-5 col-sm-4"><img class="rounded-3" src="img/real-estate/agents/03.jpg" alt="Agent picture"></div>
                            <div class="col-xl-4 col-md-7 col-sm-8 px-4 px-sm-3 px-md-0 ms-md-n4 mt-n5 mt-sm-0 py-3">
                                <div class="card border-0 shadow-sm ms-sm-n5">
                                    <blockquote class="blockquote card-body">
                                        <h4 style="max-width: 22rem;">&quot;I don't say no, I just figure out a way to make it work&quot;</h4>
                                        <p class="d-sm-none d-lg-block">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip.</p>
                                        <footer class="d-flex justify-content-between">
                                            <div class="pe-3"><a class="text-decoration-none" href="vendor-properties.html">
                                                    <h6 class="mb-0">Guy Hawkins</h6>
                                                    <div class="text-muted fw-normal fs-sm mb-3">Imperial Property Group Agent</div>
                                                </a><a class="btn btn-icon btn-light-primary btn-xs shadow-sm rounded-circle me-2 mb-2" href="#"><i class="fi-facebook"></i></a><a class="btn btn-icon btn-light-primary btn-xs shadow-sm rounded-circle me-2 mb-2" href="#"><i class="fi-twitter"></i></a><a class="btn btn-icon btn-light-primary btn-xs shadow-sm rounded-circle me-2 mb-2" href="#"><i class="fi-linkedin"></i></a></div>
                                            <div><span class="star-rating"><i class="star-rating-icon fi-star-filled active"></i><i class="star-rating-icon fi-star-filled active"></i><i class="star-rating-icon fi-star-filled active"></i><i class="star-rating-icon fi-star-filled active"></i><i class="star-rating-icon fi-star-filled active"></i></span>
                                                <div class="text-muted fs-sm mt-1">16 reviews</div>
                                            </div>
                                        </footer>
                                    </blockquote>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="row align-items-center">
                            <div class="col-xl-4 d-none d-xl-block"><img class="rounded-3" src="img/real-estate/agents/03.jpg" alt="Agent picture"></div>
                            <div class="col-xl-4 col-md-5 col-sm-4"><img class="rounded-3" src="img/real-estate/agents/01.jpg" alt="Agent picture"></div>
                            <div class="col-xl-4 col-md-7 col-sm-8 px-4 px-sm-3 px-md-0 ms-md-n4 mt-n5 mt-sm-0 py-3">
                                <div class="card border-0 shadow-sm ms-sm-n5">
                                    <blockquote class="blockquote card-body">
                                        <h4 style="max-width: 22rem;">&quot;Over 10 years of experience as a real estate agent&quot;</h4>
                                        <p class="d-sm-none d-lg-block">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae.</p>
                                        <footer class="d-flex justify-content-between">
                                            <div class="pe-3"><a class="text-decoration-none" href="vendor-properties.html">
                                                    <h6 class="mb-0">Kristin Watson</h6>
                                                    <div class="text-muted fw-normal fs-sm mb-3">Imperial Property Group Agent</div>
                                                </a><a class="btn btn-icon btn-light-primary btn-xs shadow-sm rounded-circle me-2 mb-2" href="#"><i class="fi-facebook"></i></a><a class="btn btn-icon btn-light-primary btn-xs shadow-sm rounded-circle me-2 mb-2" href="#"><i class="fi-twitter"></i></a><a class="btn btn-icon btn-light-primary btn-xs shadow-sm rounded-circle me-2 mb-2" href="#"><i class="fi-linkedin"></i></a></div>
                                            <div><span class="star-rating"><i class="star-rating-icon fi-star-filled active"></i><i class="star-rating-icon fi-star-filled active"></i><i class="star-rating-icon fi-star-filled active"></i><i class="star-rating-icon fi-star-filled active"></i><i class="star-rating-icon fi-star-filled active"></i></span>
                                                <div class="text-muted fs-sm mt-1">24 reviews</div>
                                            </div>
                                        </footer>
                                    </blockquote>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tns-carousel-controls justify-content-center justify-content-md-start my-2 mt-md-4" id="agents-carousel-controls">
                <button class="mx-2" type="button"><i class="fi-chevron-left"></i></button>
                <button class="mx-2" type="button"><i class="fi-chevron-right"></i></button>
            </div>
        </section>
    </main>
    <!-- Footer-->
    <?php include_once("./components/footer.php"); ?>

    <!-- Back to top button--><a class="btn-scroll-top" href="#top" data-scroll><span class="btn-scroll-top-tooltip text-muted fs-sm me-2">Top</span><i class="btn-scroll-top-icon fi-chevron-up"> </i></a>
    <!-- Vendor scrits: js libraries and plugins-->
    <script src="vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="vendor/simplebar/dist/simplebar.min.js"></script>
    <script src="vendor/smooth-scroll/dist/smooth-scroll.polyfills.min.js"></script>
    <script src="vendor/nouislider/dist/nouislider.min.js"></script>
    <script src="vendor/tiny-slider/dist/min/tiny-slider.js"></script>
    <!-- Main theme script-->
    <script src="js/theme.min.js"></script>
    <!-- Custom JS -->
    <script src="./scripts/home.js" type="module"></script>
</body>

</html>