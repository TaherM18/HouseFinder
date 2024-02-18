<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Finder | Sign Up</title>
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

        /* The message box is shown when the user clicks on the password field */
        #message {
            display: none;
            background: #f1f1f1;
            color: #000;
            position: relative;
            padding: 10px;
            margin-top: 10px;
        }

        #message p {
            padding-left: 35px;
        }

        /* Add a green text color and a checkmark when the requirements are right */
        .valid {
            color: green;
        }

        .valid:before {
            position: relative;
            left: -25px;
            content: "✔";
        }

        /* Add a red text color and an "x" icon when the requirements are wrong */
        .invalid {
            color: red;
        }

        .invalid:before {
            position: relative;
            left: -25px;
            content: "✖";
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
                <!-- <div class="row mx-0 align-items-center"> -->
                <form id="registerForm" action="" class="row mx-0 align-items-center" novalidate>

                    <!-- left-side section -->
                    <div class="col-md-6 border-end-md p-2 p-sm-5">
                        <div class="mb-4 mt-4">
                            <label class="form-label" for="txtFname">First name</label>
                            <input class="form-control" type="text" id="txtFname" placeholder="Enter your first name" required>
                            <div id="msgFname"></div>
                        </div>
                        <div class="mb-4">
                            <label class="form-label" for="txtLname">Last name</label>
                            <input class="form-control" type="text" id="txtLname" placeholder="Enter your last name" required>
                            <div id="msgLname"></div>
                        </div>
                        <div class="mb-4">
                            <label class="form-label" for="txtContact">Phone number</label>
                            <input class="form-control" type="text" id="txtContact" placeholder="Enter your phone number" required>
                            <div id="msgContact"></div>
                        </div>
                        <div class="mb-4">
                            <input type="hidden" id="selCity" value="">
                            <div class="input-group">
                                <button class="btn btn-outline-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Select City
                                </button>
                                <ul class="dropdown-menu">
                                    <input type="text" id="txtCity" class="form-control border-0 border-bottom shadow-none mb-2" 
                                    placeholder="Search...">
                                </ul>
                                <input type="text" class="form-control" id="lblCity" value="" disabled>
                            </div>
                            <div id="msgCity"></div>
                        </div>
                        <div class="mb-4">
                            <label class="form-label" for="txtAddress">Street address</label>
                            <textarea class="form-control" id="txtAddress" placeholder="Enter your address" required></textarea>
                            <div id="msgAddress"></div>
                        </div>

                        <div class="mt-sm-4 pt-md-3">Already have an account? <a href="signin-light.php">Sign in</a></div>
                    </div>

                    <!-- right-side section -->
                    <div class="col-md-6 px-2 pt-2 pb-4 px-sm-5 pb-sm-5 pt-md-5">
                        <!-- <a class="btn btn-outline-info w-100 mb-3" href="#"><i class="fi-google fs-lg me-1"></i>Sign in with Google</a>
                        <a class="btn btn-outline-info w-100 mb-3" href="#"><i class="fi-facebook fs-lg me-1"></i>Sign in with Facebook</a>
                        <div class="d-flex align-items-center py-3 mb-3">
                            <hr class="w-100">
                            <div class="px-3">Or</div>
                            <hr class="w-100">
                        </div> -->


                        <div class="mb-4">
                            <label class="form-label small mb-1" for="selUser">User type</label>
                            <select class="form-select" id="selUser" name="selType" aria-label="select city">
                                <option value="T">Tenant</option>
                                <option value="L">Landlord</option>
                            </select>
                            <div id="msgUser"></div>
                        </div>
                        <div class="mb-4">
                            <label class="form-label" for="txtEmail">Email address</label>
                            <input class="form-control" type="email" id="txtEmail" placeholder="Enter your email" required>
                            <div id="msgEmail"></div>
                        </div>
                        <div class="mb-4">
                            <label class="form-label" for="txtPass">Password <span class='fs-sm text-muted'>min. 8 char</span></label>
                            <div class="password-toggle">
                                <input class="form-control" type="password" id="txtPass" minlength="8" placeholder="Enter your password" required>
                                <label class="password-toggle-btn" aria-label="Show/hide password">
                                    <input class="password-toggle-check" type="checkbox"><span class="password-toggle-indicator"></span>
                                </label>
                            </div>
                            <div id="message">
                                    <p><b>Password must contain the following:</b></p>
                                    <p id="letter" class="invalid">A <b>lowercase</b> letter</p>
                                    <p id="capital" class="invalid">An <b>uppercase</b> letter</p>
                                    <p id="number" class="invalid">A <b>number</b></p>
                                    <p id="special" class="invalid">A <b>special character</b></p>
                                    <p id="length" class="invalid">Minimum <b>8 characters</b></p>
                                </div>
                            <div id="msgPass"></div>
                        </div>
                        <!-- <div class="mb-4">
                            <label class="form-label" for="txtConfirm">Confirm password</label>
                            <div class="password-toggle">
                                <input class="form-control" type="password" id="txtConfirm" minlength="8" placeholder="Confirm your password" required>
                                <label class="password-toggle-btn" aria-label="Show/hide password">
                                    <input class="password-toggle-check" type="checkbox"><span class="password-toggle-indicator"></span>
                                </label>
                            </div>
                            <div id="msgConfirm"></div>
                        </div> -->
                        <div class="form-check mb-4">
                            <input class="form-check-input" type="checkbox" id="chkTerms" required>
                            <label class="form-check-label" for="chkTerms">By joining, I agree to the <a href='#'>Terms of use</a> and <a href='#'>Privacy policy</a></label>
                        </div>
                        <button id="btnSubmit" class="btn btn-primary btn-lg w-100" type="submit">
                            <span id="spinner" class="spinner-border spinner-border-sm mx-2 visually-hidden" aria-hidden="true"></span>
                            <span id="status" role="status">Sign Up</span>
                        </button>

                    </div>
                </form>
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
    <script src="./scripts/register.js" type="module"></script>
</body>

</html>