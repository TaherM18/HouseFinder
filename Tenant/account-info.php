<?php
require_once("../Class/SessionManager.php");
require_once("../Database/Connect.php");
$sessionManager = new SessionManager();
$sessionManager->set("userId", 1);

$userId = $sessionManager->get("userId");
// $sessionManager->unset("userId");
if (!$userId) {
    header("Location: ./home.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Finder | Account Personal Info</title>
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
    <link rel="stylesheet" media="screen" href="vendor/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.min.css" />
    <link rel="stylesheet" media="screen" href="vendor/filepond/dist/filepond.min.css" />
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

    <!-- Navbar-->
    <?php include_once("./components/header.php"); ?>

    <main class="page-wrapper">

        <!-- Page content-->
        <div class="container pt-5 pb-lg-4 mt-5 mb-sm-2">
            <!-- Breadcrumb-->
            <nav class="mb-4 pt-md-3" aria-label="Breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="home-v1.html">Home</a></li>
                    <li class="breadcrumb-item"><a href="account-info.html">Account</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Personal Info</li>
                </ol>
            </nav>
            <!-- Page content-->
            <div class="row">
                <!-- Sidebar-->
                <aside class="col-lg-4 col-md-5 pe-xl-4 mb-5">
                    <!-- Account nav-->
                    <div class="card card-body border-0 shadow-sm pb-1 me-lg-1">
                        <div class="d-flex d-md-block d-lg-flex align-items-start pt-lg-2 mb-4">
                            <img class="rounded-circle" src="img/avatars/03.jpg" width="48" alt="Full name">
                            <div class="pt-md-2 pt-lg-0 ps-3 ps-md-0 ps-lg-3">
                                <h2 class="fs-lg mb-0">Annette Black</h2>
                                <span class="star-rating">
                                    <i class="star-rating-icon fi-star-filled active"></i>
                                    <i class="star-rating-icon fi-star-filled active"></i>
                                    <i class="star-rating-icon fi-star-filled active"></i>
                                    <i class="star-rating-icon fi-star-filled active"></i>
                                    <i class="star-rating-icon fi-star-filled active"></i>
                                </span>
                                <ul class="list-unstyled fs-sm mt-3 mb-0">
                                    <li>
                                        <a class="nav-link fw-normal p-0" href="tel:+913025550107">
                                            <i class="fi-phone opacity-60 me-2"></i>(302) 555-0107
                                        </a>
                                    </li>
                                    <li>
                                        <a class="nav-link fw-normal p-0" href="mailto:annette_black@email.com">
                                            <i class="fi-mail opacity-60 me-2"></i>annette_black@email.com
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!-- <a class="btn btn-primary btn-lg w-100 mb-3" href="add-property.html"><i class="fi-plus me-2"></i>Add property</a><a class="btn btn-outline-secondary d-block d-md-none w-100 mb-3" href="#account-nav" data-bs-toggle="collapse"><i class="fi-align-justify me-2"></i>Menu</a> -->
                        <div class="collapse d-md-block mt-3" id="account-nav">
                            <div class="card-nav">
                                <a id="personalInfoLink" class="card-nav-link active" href="account-info.html">
                                    <i class="fi-user opacity-60 me-2"></i>Personal Info
                                </a>

                                <a id="passAndSecLink" class="card-nav-link" href="account-security.html">
                                    <i class="fi-lock opacity-60 me-2"></i>Password &amp; Security
                                </a>
                                
                                <a id="myPropertiesLink" class="card-nav-link" href="account-properties.html">
                                    <i class="fi-home opacity-60 me-2"></i>My Properties
                                </a>
                                
                                <a id="wishlistLink" class="card-nav-link" href="account-wishlist.html">
                                    <i class="fi-heart opacity-60 me-2"></i>Wishlist
                                </a>
                                
                                <a id="reviewsLink" class="card-nav-link" href="account-reviews.html">
                                    <i class="fi-star opacity-60 me-2"></i>Reviews
                                </a>
                                
                                <a id="notificationsLink" class="card-nav-link" href="account-notifications.html">
                                    <i class="fi-bell opacity-60 me-2"></i>Notifications
                                </a>
                                
                                <a id="helpLink" class="card-nav-link" href="help-center.html">
                                    <i class="fi-help opacity-60 me-2"></i>Help
                                </a>
                                
                                <a id="signoutLink" class="card-nav-link" href="signin-light.html">
                                    <i class="fi-logout opacity-60 me-2"></i>Sign Out
                                </a>
                            </div>
                        </div>
                    </div>
                </aside>

                <!-- ID -->
                <input type="hidden" id="txtUserId" value="<?= $userId ?>">

                <!-- Content-->
                <div id="content" class="col-lg-8 col-md-7 mb-5"></div>


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
    <!-- Footer-->
    <?php include_once("./components/footer.php"); ?>

    <!-- Back to top button--><a class="btn-scroll-top" href="#top" data-scroll><span class="btn-scroll-top-tooltip text-muted fs-sm me-2">Top</span><i class="btn-scroll-top-icon fi-chevron-up"> </i></a>
    <!-- Vendor scrits: js libraries and plugins-->
    <script src="vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="vendor/simplebar/dist/simplebar.min.js"></script>
    <script src="vendor/smooth-scroll/dist/smooth-scroll.polyfills.min.js"></script>
    <script src="vendor/filepond-plugin-file-validate-type/dist/filepond-plugin-file-validate-type.min.js"></script>
    <script src="vendor/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.min.js"></script>
    <script src="vendor/filepond-plugin-image-crop/dist/filepond-plugin-image-crop.min.js"></script>
    <script src="vendor/filepond-plugin-image-resize/dist/filepond-plugin-image-resize.min.js"></script>
    <script src="vendor/filepond-plugin-image-transform/dist/filepond-plugin-image-transform.min.js"></script>
    <script src="vendor/filepond/dist/filepond.min.js"></script>
    <!-- Main theme script-->
    <script src="js/theme.min.js"></script>
    <!-- Custom JS -->
    <script type="module" src="./scripts/account.js"></script>
</body>

</html>