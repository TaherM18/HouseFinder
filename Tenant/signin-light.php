<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Finder | Sign In</title>
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

<body class="bg-secondary">
    <!-- Google Tag Manager (noscript)-->
    <noscript>
        <iframe src="//www.googletagmanager.com/ns.html?id=GTM-WKV3GT5" height="0" width="0" style="display: none; visibility: hidden;"></iframe>
    </noscript>
    <!-- Demo switcher (offcanvas)-->
    <button class="btn btn-icon btn-light rounded-circle shadow position-fixed top-50 end-0 translate-middle-y me-3" type="button" data-bs-toggle="tooltip" data-bs-placement="left" title="Choose Demo" style="z-index: 1035;"><span class="d-flex align-items-center justify-content-center position-absolute top-0 start-0 w-100 h-100 rounded-circle" data-bs-toggle="offcanvas" data-bs-target="#demo-switcher"><i class="fi-layers"></i></span></button>
    <div class="offcanvas offcanvas-end" id="demo-switcher">
        <div class="offcanvas-header d-block border-bottom">
            <div class="d-flex align-items-center justify-content-between mb-4">
                <h2 class="h5 mb-0">Choose Demo</h2>
                <button class="btn-close" type="button" data-bs-dismiss="offcanvas"></button>
            </div>
            <div class="d-flex"><a class="btn btn-outline-secondary btn-sm w-100 me-2" href="index.html"><i class="fi-home me-2"></i>Main Page</a><a class="btn btn-outline-secondary btn-sm w-100" href="components/typography.html"><i class="fi-file me-2"></i>Docs / UI Kit</a></div>
        </div>
        <div class="offcanvas-body">
            <div class="card card-hover shadow-sm mb-4"><img class="card-img-top" src="img/intro/demos/offcanvas/car-finder.jpg" alt="Car Finder Demo">
                <div class="card-body p-3">
                    <h3 class="fs-base card-title text-center"><a class="nav-link stretched-link" href="car-finder-home.html">Car Finder Demo</a></h3>
                </div>
            </div>
            <div class="card card-hover shadow-sm mb-4"><img class="card-img-top" src="img/intro/demos/offcanvas/real-estate.jpg" alt="Real Estate Demo">
                <div class="card-body p-3">
                    <h3 class="fs-base card-title text-center"><a class="nav-link stretched-link" href="real-estate-home-v1.html">Real Estate Demo</a></h3>
                </div>
            </div>
            <div class="card card-hover shadow-sm mb-4"><img class="card-img-top" src="img/intro/demos/offcanvas/job-board.jpg" alt="Job Board Demo">
                <div class="card-body p-3">
                    <h3 class="fs-base card-title text-center"><a class="nav-link stretched-link" href="job-board-home-v1.html">Job Board Demo</a></h3>
                </div>
            </div>
            <div class="card card-hover shadow-sm mb-4"><img class="card-img-top" src="img/intro/demos/offcanvas/city-guide.jpg" alt="City Guide Demo">
                <div class="card-body p-3">
                    <h3 class="fs-base card-title text-center"><a class="nav-link stretched-link" href="city-guide-home-v1.html">City Guide Demo</a></h3>
                </div>
            </div>
        </div>
        <div class="offcanvas-header border-top"><a class="btn btn-primary btn-lg w-100" href="https://themes.getbootstrap.com/product/finder-directory-listings-template-ui-kit/" target="_blank" rel="noopener"><i class="fi-cart fs-lg me-2"></i>Buy Finder</a></div>
    </div>
    <!-- Page loading spinner-->
    <div class="page-loading active">
        <div class="page-loading-inner">
            <div class="page-spinner"></div><span>Loading...</span>
        </div>
    </div>
    <main class="page-wrapper">
        
        <!-- Page content-->
        <div class="container-fluid d-flex h-100 align-items-center justify-content-center py-4 py-sm-5">
            <div class="card card-body" style="max-width: 940px"><a class="position-absolute top-0 end-0 nav-link fs-sm py-1 px-2 mt-3 me-3" href="#" onclick="window.history.go(-1); return false;"><i class="fi-arrow-long-left fs-base me-2"></i>Go back</a>
                <div class="row mx-0 align-items-center">
                    <div class="col-md-6 border-end-md p-2 p-sm-5">
                        <h2 class="h3 mb-4 mb-sm-5">Hey there!<br>Welcome back.</h2><img class="d-block mx-auto" src="img/signin-modal/signin.svg" width="344" alt="Illustartion">
                        <div class="mt-4 mt-sm-5">Don't have an account? <a href="./signup-light.php">Sign up here</a></div>
                    </div>
                    <div class="col-md-6 px-2 pt-2 pb-4 px-sm-5 pb-sm-5 pt-md-5"><a class="btn btn-outline-info w-100 mb-3" href="#"><i class="fi-google fs-lg me-1"></i>Sign in with Google</a><a class="btn btn-outline-info w-100 mb-3" href="#"><i class="fi-facebook fs-lg me-1"></i>Sign in with Facebook</a>
                        <div class="d-flex align-items-center py-3 mb-3">
                            <hr class="w-100">
                            <div class="px-3">Or</div>
                            <hr class="w-100">
                        </div>
                        <form id="loginForm" >
                            <div class="mb-4">
                                <label class="form-label mb-2" for="txtEmail">Email address</label>
                                <input class="form-control" type="email" id="txtEmail" placeholder="Enter your email" required>
                                <div id="emailMsg"></div>
                            </div>
                            <div class="mb-4">
                                <div class="d-flex align-items-center justify-content-between mb-2">
                                    <label class="form-label mb-0" for="txtPass">Password</label><a class="fs-sm" href="#">Forgot password?</a>
                                </div>
                                <div class="password-toggle">
                                    <input class="form-control" type="password" id="txtPass" placeholder="Enter password" required>
                                    <label class="password-toggle-btn" aria-label="Show/hide password">
                                        <input class="password-toggle-check" type="checkbox"><span class="password-toggle-indicator"></span>
                                    </label>
                                    <div id="passMsg"></div>
                                </div>
                            </div>
                            <div class="form-check text-start my-3">
                                <input class="form-check-input" type="checkbox" value="remember-me" id="chkRemember">
                                <label class="form-check-label" for="chkRemember">
                                    Remember me
                                </label>
                            </div>
                            <button id="btnSubmit" class="btn btn-primary btn-lg w-100" type="submit">
                                <span id="spinner" class="spinner-border spinner-border-sm mx-2 visually-hidden" aria-hidden="true"></span>
                                <span id="status" role="status">Sign In</span>
                            </button>
                        </form>
                    </div>
                </div>
            </div>

        </div>

        <!-- Toast start -->
        <div id="liveToast" class="toast align-items-center text-bg-danger shadow-sm border-0 position-fixed bottom-0 end-0 m-3" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="d-flex">
                <div class="toast-body">
                    Hello, world! This is a toast message.
                </div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
        </div>
        <!-- Toast end -->
    </main>
    <!-- Back to top button--><a class="btn-scroll-top" href="#top" data-scroll><span class="btn-scroll-top-tooltip text-muted fs-sm me-2">Top</span><i class="btn-scroll-top-icon fi-chevron-up"> </i></a>
    <!-- Vendor scrits: js libraries and plugins-->
    <script src="vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="vendor/simplebar/dist/simplebar.min.js"></script>
    <script src="vendor/smooth-scroll/dist/smooth-scroll.polyfills.min.js"></script>
    <!-- Main theme script-->
    <script src="js/theme.min.js"></script>
    <!-- Custom JS -->
    <script src="./scripts/login.js" type="module"></script>
</body>

</html>