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
    <title>Finder | Real Estate | Property for Rent</title>
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
    <link rel="stylesheet" media="screen" href="vendor/leaflet/dist/leaflet.css" />
    <link rel="stylesheet" media="screen" href="vendor/tiny-slider/dist/tiny-slider.css" />
    <link rel="stylesheet" media="screen" href="vendor/nouislider/dist/nouislider.min.css" />
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

<body class="fixed-bottom-btn">
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
    <?php include_once("./components/header.php") ?>

    <main class="page-wrapper">

        <!-- Page content-->
        <!-- Page container-->
        <div class="container-fluid mt-5 pt-5 p-0">
            <div class="row g-0 mt-n3">

                <!-- Filters sidebar (Offcanvas on mobile)-->
                <aside class="col-lg-4 col-xl-3 border-top-lg border-end-lg shadow-sm px-3 px-xl-4 px-xxl-5 pt-lg-2">
                    <div class="offcanvas-lg offcanvas-start" id="filters-sidebar">
                        <div class="offcanvas-header d-flex d-lg-none align-items-center">
                            <h2 class="h5 mb-0">Filters</h2>
                            <button class="btn-close" type="button" data-bs-dismiss="offcanvas" data-bs-target="#filters-sidebar"></button>
                        </div>
                        <div class="offcanvas-header d-block border-bottom pt-0 pt-lg-4 px-lg-0">
                            <ul class="nav nav-tabs mb-0">
                                <li class="nav-item"><a class="nav-link active" href="real-estate-catalog-rent.html"><i class="fi-rent fs-base me-2"></i>For rent</a></li>
                                <li class="nav-item"><a class="nav-link" href="real-estate-catalog-sale.html"><i class="fi-home fs-base me-2"></i>For sale</a></li>
                            </ul>
                        </div>
                        <div class="offcanvas-body py-lg-4">
                            <div class="pb-4 mb-2">
                                <h3 class="h6">Location</h3>
                                <select class="form-select mb-2">
                                    <option value="" disabled>Choose city</option>
                                    <option value="Chicago">Chicago</option>
                                    <option value="Dallas">Dallas</option>
                                    <option value="Los Angeles">Los Angeles</option>
                                    <option value="New York" selected>New York</option>
                                    <option value="San Diego">San Diego</option>
                                </select>
                                <select class="form-select">
                                    <option value="" selected disabled>Choose district</option>
                                    <option value="Brooklyn">Brooklyn</option>
                                    <option value="Manhattan">Manhattan</option>
                                    <option value="Staten Island">Staten Island</option>
                                    <option value="The Bronx">The Bronx</option>
                                    <option value="Queens">Queens</option>
                                </select>
                            </div>
                            <div class="pb-4 mb-2">
                                <h3 class="h6">Property type</h3>
                                <div class="overflow-auto" data-simplebar data-simplebar-auto-hide="false" style="height: 11rem;">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="house">
                                        <label class="form-check-label fs-sm" for="house">House</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="apartment" checked>
                                        <label class="form-check-label fs-sm" for="apartment">Apartment</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="room">
                                        <label class="form-check-label fs-sm" for="room">Room</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="office">
                                        <label class="form-check-label fs-sm" for="office">Office</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="commercial">
                                        <label class="form-check-label fs-sm" for="commercial">Commercial</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="land">
                                        <label class="form-check-label fs-sm" for="land">Land</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="daily">
                                        <label class="form-check-label fs-sm" for="daily">Daily rental</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="new-building">
                                        <label class="form-check-label fs-sm" for="new-building">New building</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="parking-lot">
                                        <label class="form-check-label fs-sm" for="parking-lot">Parking lot</label>
                                    </div>
                                </div>
                            </div>
                            <div class="pb-4 mb-2">
                                <h3 class="h6">Price per month</h3>
                                <div class="range-slider" data-start-min="1100" data-start-max="3000" data-min="200" data-max="5000" data-step="100">
                                    <div class="range-slider-ui"></div>
                                    <div class="d-flex align-items-center">
                                        <div class="w-50 pe-2">
                                            <div class="input-group"><span class="input-group-text fs-base">$</span>
                                                <input class="form-control range-slider-value-min" type="text" />
                                            </div>
                                        </div>
                                        <div class="text-muted">&mdash;</div>
                                        <div class="w-50 ps-2">
                                            <div class="input-group"><span class="input-group-text fs-base">$</span>
                                                <input class="form-control range-slider-value-max" type="text" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="pb-4 mb-2">
                                <h3 class="h6 pt-1">Beds &amp; baths</h3>
                                <label class="d-block fs-sm mb-1">Bedrooms</label>
                                <div class="btn-group btn-group-sm" role="group" aria-label="Choose number of bedrooms">
                                    <input class="btn-check" type="radio" id="studio" name="bedrooms">
                                    <label class="btn btn-outline-secondary fw-normal" for="studio">Studio</label>
                                    <input class="btn-check" type="radio" id="bedrooms-1" name="bedrooms" checked>
                                    <label class="btn btn-outline-secondary fw-normal" for="bedrooms-1">1</label>
                                    <input class="btn-check" type="radio" id="bedrooms-2" name="bedrooms">
                                    <label class="btn btn-outline-secondary fw-normal" for="bedrooms-2">2</label>
                                    <input class="btn-check" type="radio" id="bedrooms-3" name="bedrooms">
                                    <label class="btn btn-outline-secondary fw-normal" for="bedrooms-3">3</label>
                                    <input class="btn-check" type="radio" id="bedrooms-4" name="bedrooms">
                                    <label class="btn btn-outline-secondary fw-normal" for="bedrooms-4">4+</label>
                                </div>
                                <label class="d-block fs-sm pt-2 my-1">Bathrooms</label>
                                <div class="btn-group btn-group-sm" role="group" aria-label="Choose number of bathrooms">
                                    <input class="btn-check" type="radio" id="bathrooms-1" name="bathrooms">
                                    <label class="btn btn-outline-secondary fw-normal" for="bathrooms-1">1</label>
                                    <input class="btn-check" type="radio" id="bathrooms-2" name="bathrooms">
                                    <label class="btn btn-outline-secondary fw-normal" for="bathrooms-2">2</label>
                                    <input class="btn-check" type="radio" id="bathrooms-3" name="bathrooms">
                                    <label class="btn btn-outline-secondary fw-normal" for="bathrooms-3">3</label>
                                    <input class="btn-check" type="radio" id="bathrooms-4" name="bathrooms">
                                    <label class="btn btn-outline-secondary fw-normal" for="bathrooms-4">4</label>
                                </div>
                            </div>
                            <div class="pb-4 mb-2">
                                <h3 class="h6 pt-1">Square Feet</h3>
                                <div class="d-flex align-items-center">
                                    <input id="txtMinArea" class="form-control w-100" type="number" min="20"  step="10" value="100" placeholder="Min">
                                    <div class="mx-2">&mdash;</div>
                                    <input id="txtMaxArea" class="form-control w-100" type="number" min="100"  step="10" value="1000" placeholder="Max">
                                </div>
                            </div>
                            <div class="pb-4 mb-2">
                                <h3 class="h6">Amenities</h3>
                                <div class="overflow-auto" data-simplebar data-simplebar-auto-hide="false" style="height: 11rem;">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="air-condition" checked>
                                        <label class="form-check-label fs-sm" for="air-condition">Air conditioning</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="balcony">
                                        <label class="form-check-label fs-sm" for="balcony">Balcony</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="garage" checked>
                                        <label class="form-check-label fs-sm" for="garage">Garage</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="gym">
                                        <label class="form-check-label fs-sm" for="gym">Gym</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="parking">
                                        <label class="form-check-label fs-sm" for="parking">Parking</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="pool">
                                        <label class="form-check-label fs-sm" for="pool">Pool</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="camera">
                                        <label class="form-check-label fs-sm" for="camera">Security cameras</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="wifi" checked>
                                        <label class="form-check-label fs-sm" for="wifi">WiFi</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="laundry">
                                        <label class="form-check-label fs-sm" for="laundry">Laundry</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="dishwasher">
                                        <label class="form-check-label fs-sm" for="dishwasher">Dishwasher</label>
                                    </div>
                                </div>
                            </div>
                            <div class="pb-4 mb-2">
                                <h3 class="h6">Pets</h3>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="allow-cats">
                                    <label class="form-check-label fs-sm" for="allow-cats">Cats allowed</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="allow-dogs">
                                    <label class="form-check-label fs-sm" for="allow-dogs">Dogs allowed</label>
                                </div>
                            </div>
                            <div class="pb-4 mb-2">
                                <h3 class="h6">Additional options</h3>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="verified">
                                    <label class="form-check-label fs-sm" for="verified">Verified</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="featured">
                                    <label class="form-check-label fs-sm" for="featured">Featured</label>
                                </div>
                            </div>
                            <div class="border-top py-4">
                                <button class="btn btn-outline-primary" type="button"><i class="fi-rotate-right me-2"></i>Reset filters</button>
                            </div>
                        </div>
                    </div>
                </aside>


                <!-- Page content-->
                <div class="col-lg-8 col-xl-9 position-relative overflow-hidden pb-5 pt-4 px-3 px-xl-4 px-xxl-5">
                    <!-- Map popup-->
                    <div class="map-popup invisible" id="map">
                        <button class="btn btn-icon btn-light btn-sm shadow-sm rounded-circle" type="button" data-bs-toggle-class="invisible" data-bs-target="#map"><i class="fi-x fs-xs"></i></button>
                        <div class="interactive-map" data-map-options-json="json/map-options-real-estate-rent.json"></div>
                    </div>
                    <!-- Breadcrumb-->
                    <nav class="mb-3 pt-md-2" aria-label="Breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="real-estate-home-v1.html">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Property for rent</li>
                        </ol>
                    </nav>
                    <!-- Title-->
                    <div class="d-sm-flex align-items-center justify-content-between pb-3 pb-sm-4">
                        <h1 class="h2 mb-sm-0">Property for rent</h1><a class="d-inline-block fw-bold text-decoration-none py-1" href="#" data-bs-toggle-class="invisible" data-bs-target="#map"><i class="fi-map me-2"></i>Map view</a>
                    </div>

                    <!-- Sorting-->
                    <div class="d-flex flex-sm-row flex-column align-items-sm-center align-items-stretch my-2">
                        <div class="d-flex align-items-center flex-shrink-0">
                            <label class="fs-sm me-2 pe-1 text-nowrap" for="selSortby"><i class="fi-arrows-sort text-muted mt-n1 me-2"></i>Sort by:</label>
                            <select class="form-select form-select-sm" id="selSortBy">
                                <option value="" selected disabled>- Select -</option>
                                <option value="created_at">Newest</option>
                                <option value="">Popularity</option>
                                <option value="price_low">Low - High Price</option>
                                <option value="price_high">High - Low Price</option>
                                <option value="rating_high">Rating</option>
                                <!-- <option>Average Rating</option> -->
                            </select>
                        </div>
                        <hr class="d-none d-sm-block w-100 mx-4">
                        <div class="d-none d-sm-flex align-items-center flex-shrink-0 text-muted"><i class="fi-check-circle me-2"></i><span class="fs-sm mt-n1">148 results</span></div>
                    </div>

                    <!-- Catalog grid-->
                    <div id="container" class="row g-4 py-4">

                        <!-- Item start -->
                        <div class="col-sm-6 col-xl-4">
                            <div class="card shadow-sm card-hover border-0 h-100">
                                <div class="tns-carousel-wrapper card-img-top card-img-hover">
                                    <a class="img-overlay" href="real-estate-single-v1.html"></a>
                                    <div class="content-overlay end-0 top-0 pt-3 pe-3">
                                        <button class="btn btn-icon btn-light btn-xs text-primary rounded-circle" type="button" data-bs-toggle="tooltip" data-bs-placement="left" title="Add to Wishlist"><i class="fi-heart"></i></button>
                                    </div>
                                    <div class="tns-carousel-inner">
                                        <img src="img/real-estate/catalog/17.jpg" alt="Image">
                                        <img src="img/real-estate/catalog/17.jpg" alt="Image">
                                    </div>
                                </div>
                                <div class="card-body position-relative pb-3">
                                    <h4 class="mb-1 fs-xs fw-normal text-uppercase text-primary">For rent</h4>
                                    <h3 class="h6 mb-2 fs-base">
                                        <a class="nav-link stretched-link" href="real-estate-single-v1.html">Tiffany Studio | 35 sq.m</a>
                                    </h3>
                                    <p class="mb-2 fs-sm text-muted">3979 Albany Post Road Hyde Park, NY 12538</p>
                                    <div class="fw-bold">
                                        <i class="fi-cash mt-n1 me-2 lead align-middle opacity-70"></i>$700
                                    </div>
                                </div>
                                <div class="card-footer d-flex align-items-center justify-content-center mx-3 pt-3 text-nowrap">
                                    <span class="d-inline-block mx-1 px-2 fs-sm">1<i class="fi-bed ms-1 mt-n1 fs-lg text-muted"></i></span>
                                    <span class="d-inline-block mx-1 px-2 fs-sm">1<i class="fi-bath ms-1 mt-n1 fs-lg text-muted"></i></span>
                                    <span class="d-inline-block mx-1 px-2 fs-sm">1<i class="fi-car ms-1 mt-n1 fs-lg text-muted"></i></span>
                                </div>
                            </div>
                        </div>
                        <!-- Item end -->

                    </div>
                    <!-- Pagination-->
                    <nav class="border-top pb-md-4 pt-4 mt-2" aria-label="Pagination">
                        <ul class="pagination mb-1">
                            <li class="page-item d-sm-none"><span class="page-link page-link-static">1 / 5</span></li>
                            <li class="page-item active d-none d-sm-block" aria-current="page"><span class="page-link">1<span class="visually-hidden">(current)</span></span></li>
                            <li class="page-item d-none d-sm-block"><a class="page-link" href="#">2</a></li>
                            <li class="page-item d-none d-sm-block"><a class="page-link" href="#">3</a></li>
                            <li class="page-item d-none d-sm-block">...</li>
                            <li class="page-item d-none d-sm-block"><a class="page-link" href="#">8</a></li>
                            <li class="page-item"><a class="page-link" href="#" aria-label="Next"><i class="fi-chevron-right"></i></a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </main>

    <!-- Footer-->
    <?php include_once("./components/footer.php"); ?>

    <!-- Filters sidebar toggle button (mobile)-->
    <button class="btn btn-primary btn-sm w-100 rounded-0 fixed-bottom d-lg-none" type="button" data-bs-toggle="offcanvas" data-bs-target="#filters-sidebar"><i class="fi-filter me-2"></i>Filters</button>
    <!-- Back to top button--><a class="btn-scroll-top" href="#top" data-scroll><span class="btn-scroll-top-tooltip text-muted fs-sm me-2">Top</span><i class="btn-scroll-top-icon fi-chevron-up"> </i></a>
    <!-- Vendor scrits: js libraries and plugins-->
    <script src="vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="vendor/simplebar/dist/simplebar.min.js"></script>
    <script src="vendor/smooth-scroll/dist/smooth-scroll.polyfills.min.js"></script>
    <script src="vendor/leaflet/dist/leaflet.js"></script>
    <script src="vendor/tiny-slider/dist/min/tiny-slider.js"></script>
    <script src="vendor/nouislider/dist/nouislider.min.js"></script>
    <!-- Main theme script-->
    <script src="js/theme.min.js"></script>
    <!-- Custom JS -->
    <script type="module" src="./scripts/catalog.js"></script>
</body>

</html>