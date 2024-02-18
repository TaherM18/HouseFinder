<?php
require_once("../Class/SessionManager.php");
require_once("../Database/Connect.php");
$sessionManager = new SessionManager();
// $sessionManager->set("userId", 1);
$sessionManager->unset("userId");
if (isset($_GET["i"])) {
    $houseId = base64_decode($_GET["i"]);
} else {
    $houseId = 1;
}

$fetchHouseDetails = 
    "SELECT house_name, description, main_img, bedroom_count, bathroom_count, parking_count, area, rent, houses.address, city_name, 
        state_name, country_name, category_name, level_name, houses.created_at, CONCAT(first_name, ' ', last_name) AS full_name, contact
    FROM houses
    INNER JOIN users ON houses.landlord_id = users.user_id
    INNER JOIN cities ON houses.city_id = cities.id
    INNER JOIN states ON cities.state_id = states.id
    INNER JOIN countries ON states.country_id = countries.id
    INNER JOIN house_category ON houses.category_id = house_category.category_id
    INNER JOIN furnishing_level ON houses.level_id = furnishing_level.level_id
    WHERE house_id = ?";
$stmt = $conn->prepare($fetchHouseDetails);
$stmt->bind_param("i", $houseId);
if ($stmt->execute()) {
    $rs = $stmt->get_result();
    if ($rs->num_rows == 1) {
        // house data found
        $row = $rs->fetch_assoc();
        $date = date_create($row["created_at"]);
        $createdAt = date_format($date,"M d, Y");
    }
    else {
        // house data not found
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Finder | Single Property</title>
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
    <link rel="stylesheet" media="screen" href="vendor/lightgallery.js/dist/css/lightgallery.min.css" />
    <link rel="stylesheet" media="screen" href="vendor/tiny-slider/dist/tiny-slider.css" />
    <link rel="stylesheet" media="screen" href="vendor/flatpickr/dist/flatpickr.min.css" />
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

    <?php include_once("./components/header.php"); ?>

    <main class="page-wrapper">

        <!-- Page content-->
        <!-- Page content-->
        <section class="container mt-5 mb-lg-5 mb-4 pt-5 pb-lg-5">
            <!-- Breadcrumb-->
            <nav class="mb-3 pt-md-3" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="real-estate-home-v1.html">Home</a></li>
                    <li class="breadcrumb-item"><a href="real-estate-catalog-rent.html">Property for rent</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><?= $row["house_name"] ?></li>
                </ol>
            </nav>
            <div class="row gy-5 pt-lg-2">
                <div class="col-lg-7">
                    <div class="d-flex flex-column">
                        <!-- Carousel with slides count-->
                        <div class="order-lg-1 order-2">
                            <div class="tns-carousel-wrapper">
                                <div class="tns-slides-count text-light"><i class="fi-image fs-lg me-2"></i>
                                    <div class="ps-1"><span class="tns-current-slide fs-5 fw-bold"></span><span class="fs-5 fw-bold">/</span><span class="tns-total-slides fs-5 fw-bold"></span></div>
                                </div>
                                <div class="tns-carousel-inner" data-carousel-options="{&quot;navAsThumbnails&quot;: true, &quot;navContainer&quot;: &quot;#thumbnails&quot;, &quot;gutter&quot;: 12, &quot;responsive&quot;: {&quot;0&quot;:{&quot;controls&quot;: false},&quot;500&quot;:{&quot;controls&quot;: true}}}">
                                    <div><img class="rounded-3" src="img/real-estate/single/09.jpg" alt="Image"></div>
                                    <div><img class="rounded-3" src="img/real-estate/single/10.jpg" alt="Image"></div>
                                    <div><img class="rounded-3" src="img/real-estate/single/11.jpg" alt="Image"></div>
                                    <div><img class="rounded-3" src="img/real-estate/single/12.jpg" alt="Image"></div>
                                    <div>
                                        <div class="ratio ratio-16x9">
                                            <iframe class="rounded-3" src="https://www.youtube.com/embed/dofyR9p8e7w" title="YouTube video player" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Thumbnails nav-->
                            <ul class="tns-thumbnails mb-4" id="thumbnails">
                                <li class="tns-thumbnail"><img src="img/real-estate/single/th09.jpg" alt="Thumbnail"></li>
                                <li class="tns-thumbnail"><img src="img/real-estate/single/th10.jpg" alt="Thumbnail"></li>
                                <li class="tns-thumbnail"><img src="img/real-estate/single/th11.jpg" alt="Thumbnail"></li>
                                <li class="tns-thumbnail"><img src="img/real-estate/single/th12.jpg" alt="Thumbnail"></li>
                                <li class="tns-thumbnail">
                                    <div class="d-flex flex-column align-items-center justify-content-center h-100"><i class="fi-play-circle fs-4 mb-1"></i><span>Play video</span></div>
                                </li>
                            </ul>
                        </div>
                        <!-- Page title + Features-->
                        <div class="order-lg-2 order-1">
                            <h1 class="h2 mb-2"><?= $row["house_name"] ?></h1>
                            <p class="mb-2 pb-1 fs-lg"><?= $row["address"] . ", " . $row["city_name"] . ", " . $row["state_name"] . ", " . $row["country_name"] ?></p>
                            <ul class="d-flex mb-4 pb-lg-2 list-unstyled">
                                <li class="me-3 pe-3 border-end"><b class="me-1"><?= $row["bedroom_count"] ?></b><i class="fi-bed mt-n1 lead align-middle text-muted"></i></li>
                                <li class="me-3 pe-3 border-end"><b class="me-1"><?= $row["bathroom_count"] ?></b><i class="fi-bath mt-n1 lead align-middle text-muted"></i></li>
                                <li class="me-3 pe-3 border-end"><b class="me-1"><?= $row["parking_count"] ?></b><i class="fi-car mt-n1 lead align-middle text-muted"></i></li>
                                <li><b><?= $row["area"] ?> </b>sq.ft</li>
                            </ul>
                        </div>
                    </div>
                    <!-- Overview-->
                    <h2 class="h5">Overview</h2>
                    <p class="mb-4 pb-2"><?= $row["description"] ?></p>
                    <!-- Rental agent-->
                    <h2 class="h5">Landord</h2>
                    <div class="card card-horizontal">
                        <div class="card-img-top bg-position-center-x" style="background-image: url(img/real-estate/agents/01.jpg);"></div>
                        <blockquote class="blockquote card-body p-4">
                            <!-- <p class="mb-4">Amet libero morbi venenatis ut est. Iaculis leo ultricies nunc id ante adipiscing. Vel metus odio at faucibus ac. Neque id placerat et id ut.</p> -->
                            <footer class="d-flex justify-content-between">
                                <div class="pe-3">
                                    <h6 class="mb-2"><?= $row["full_name"] ?></h6>
                                    <a class="d-block mb-4" href="tel:+91<?= $row["contact"] ?>">Make Call</a>
                                    <!-- <div class="text-muted fw-normal fs-sm mb-3">Imperial Property Group Agent</div> -->
                                    <a class="btn btn-icon btn-light-primary btn-xs shadow-sm rounded-circle me-2 mb-2" href="#">
                                        <i class="fi-facebook"></i>
                                    </a>
                                    <a class="btn btn-icon btn-light-primary btn-xs shadow-sm rounded-circle me-2 mb-2" href="#">
                                        <i class="fi-twitter"></i>
                                    </a>
                                    <a class="btn btn-icon btn-light-primary btn-xs shadow-sm rounded-circle me-2 mb-2" href="#">
                                        <i class="fi-instagram"></i>
                                    </a>
                                </div>
                                <!-- <div>
                                    <span class="star-rating">
                                        <i class="star-rating-icon fi-star-filled active"></i>
                                        <i class="star-rating-icon fi-star-filled active"></i>
                                        <i class="star-rating-icon fi-star-filled active"></i>
                                        <i class="star-rating-icon fi-star-filled active"></i>
                                        <i class="star-rating-icon fi-star-filled active"></i>
                                    </span>
                                    <div class="text-muted fs-sm mt-1">24 reviews</div>
                                </div> -->
                            </footer>
                        </blockquote>
                    </div>
                </div>
                <!-- Sidebar with details-->
                <aside class="col-lg-5">
                    <div class="ps-lg-5">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <div><span class="badge bg-success me-2 mb-2">Verified</span><span class="badge bg-info me-2 mb-2">New</span></div>
                            <div class="text-nowrap">
                                <button class="btn btn-icon btn-light-primary btn-xs shadow-sm rounded-circle ms-2 mb-2" type="button" data-bs-toggle="tooltip" title="Add to Wishlist"><i class="fi-heart"></i></button>
                                <div class="dropdown d-inline-block" data-bs-toggle="tooltip" title="Share">
                                    <button class="btn btn-icon btn-light-primary btn-xs shadow-sm rounded-circle ms-2 mb-2" type="button" data-bs-toggle="dropdown"><i class="fi-share"></i></button>
                                    <div class="dropdown-menu dropdown-menu-end my-1">
                                        <button class="dropdown-item" type="button"><i class="fi-facebook fs-base opacity-75 me-2"></i>Facebook</button>
                                        <button class="dropdown-item" type="button"><i class="fi-twitter fs-base opacity-75 me-2"></i>Twitter</button>
                                        <button class="dropdown-item" type="button"><i class="fi-instagram fs-base opacity-75 me-2"></i>Instagram</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <h3 class="h5 mb-2">Monthly rent:</h3>
                        <h2 class="h3 mb-4 pb-2">&#8377; <?= $row["rent"] ?><span class="d-inline-block ms-1 fs-base fw-normal text-body">/month</span></h2>
                        <!-- Property details-->
                        <div class="card border-0 bg-secondary mb-4">
                            <div class="card-body">
                                <h5 class="mb-0 pb-3">Property Details</h5>
                                <ul class="list-unstyled mt-n2 mb-0">
                                    <li class="mt-2 mb-0"><b>Type: </b><?= $row["category_name"] ?></li>
                                    <li class="mt-2 mb-0"><b>Apartment area: </b><?= $row["area"] ?> sq.ft</li>
                                    <li class="mt-2 mb-0"><b>Built: </b>2015</li>
                                    <li class="mt-2 mb-0"><b>Bedrooms: </b><?= $row["bedroom_count"] ?></li>
                                    <li class="mt-2 mb-0"><b>Bathrooms: </b><?= $row["bathroom_count"] ?></li>
                                    <li class="mt-2 mb-0"><b>Parking places: </b><?= $row["parking_count"] ?></li>
                                    <!-- <li class="mt-2 mb-0"><b>Pets allowed: </b>cats only</li> -->
                                </ul>
                            </div>
                        </div><a class="btn btn-lg btn-primary w-100 mb-3" href="#">Book a viewing</a><a class="d-inline-block mb-4 pb-2 text-decoration-none" href="#"><i class="fi-help me-2 mt-n1 align-middle"></i>Frequently asked questions</a>
                        <!-- Amenities-->
                        <div class="card border-0 bg-secondary mb-4">
                            <div class="card-body">
                                <h5>Amenities</h5>
                                <ul class="list-unstyled row row-cols-md-2 row-cols-1 gy-2 mb-0 text-nowrap">
                                    <li class="col"><i class="fi-wifi mt-n1 me-2 fs-lg align-middle"></i>WiFi</li>
                                    <li class="col"><i class="fi-thermometer mt-n1 me-2 fs-lg align-middle"></i>Heating</li>
                                    <li class="col"><i class="fi-dish mt-n1 me-2 fs-lg align-middle"></i>Dishwasher</li>
                                    <li class="col"><i class="fi-parking mt-n1 me-2 fs-lg align-middle"></i>Parking place</li>
                                    <li class="col"><i class="fi-snowflake mt-n1 me-2 fs-lg align-middle"></i>Air conditioning</li>
                                    <li class="col"><i class="fi-iron mt-n1 me-2 fs-lg align-middle"></i>Iron</li>
                                    <li class="col"><i class="fi-tv mt-n1 me-2 fs-lg align-middle"></i>TV</li>
                                    <li class="col"><i class="fi-laundry mt-n1 me-2 fs-lg align-middle"></i>Laundry</li>
                                    <li class="col"><i class="fi-cctv mt-n1 me-2 fs-lg align-middle"></i>Security cameras</li>
                                    <li class="col"><i class="fi-no-smoke mt-n1 me-2 fs-lg align-middle"></i>No smoking</li>
                                </ul>
                                <div class="collapse" id="seeMoreAmenities">
                                    <ul class="list-unstyled row row-cols-md-2 row-cols-1 gy-2 pt-2 mb-0 text-nowrap">
                                        <li class="col"><i class="fi-double-bed mt-n1 me-2 fs-lg align-middle"></i>Double bed</li>
                                        <li class="col"><i class="fi-bed mt-n1 me-2 fs-lg align-middle"></i>Single bed</li>
                                    </ul>
                                </div><a class="collapse-label collapsed d-inline-block mt-3" href="#seeMoreAmenities" data-bs-toggle="collapse" data-bs-label-collapsed="Show more" data-bs-label-expanded="Show less" role="button" aria-expanded="false" aria-controls="seeMoreAmenities"></a>
                            </div>
                        </div>
                        <!-- Not included in rent-->
                        <div class="card border-0 bg-secondary mb-4">
                            <div class="card-body">
                                <h5>Not included in rent</h5>
                                <ul class="list-unstyled row row-cols-md-2 row-cols-1 gy-2 mb-0 text-nowrap">
                                    <li class="col"><i class="fi-swimming-pool mt-n1 me-2 fs-lg align-middle"></i>Swimming pool</li>
                                    <li class="col"><i class="fi-cafe mt-n1 me-2 fs-lg align-middle"></i>Restaurant</li>
                                    <li class="col"><i class="fi-spa mt-n1 me-2 fs-lg align-middle"></i>Spa lounge</li>
                                    <li class="col"><i class="fi-cocktail mt-n1 me-2 fs-lg align-middle"></i>Bar</li>
                                </ul>
                            </div>
                        </div>
                        <!-- Post meta-->
                        <ul class="d-flex mb-4 list-unstyled fs-sm">
                            <li class="me-3 pe-3 border-end">Published: <b><?= $createdAt ?></b></li>
                            <!-- <li class="me-3 pe-3 border-end">Ad number: <b>681013232</b></li> -->
                            <li class="me-3 pe-3">Views: <b>48</b></li>
                        </ul>
                    </div>
                </aside>
            </div>
        </section>
        <!-- Recently viewed-->
        <section class="container mb-5 pb-2 pb-lg-4">
            <div class="d-flex align-items-center justify-content-between mb-3">
                <h2 class="h3 mb-0">Recently viewed</h2><a class="btn btn-link fw-normal p-0" href="real-estate-catalog-rent.html">View all<i class="fi-arrow-long-right ms-2"></i></a>
            </div>
            <div class="tns-carousel-wrapper tns-controls-outside-xxl tns-nav-outside tns-nav-outside-flush mx-n2">
                <div class="tns-carousel-inner row gx-4 mx-0 pt-3 pb-4" data-carousel-options="{&quot;items&quot;: 4, &quot;responsive&quot;: {&quot;0&quot;:{&quot;items&quot;:1},&quot;500&quot;:{&quot;items&quot;:2},&quot;768&quot;:{&quot;items&quot;:3},&quot;992&quot;:{&quot;items&quot;:4}}}">
                    <!-- Item-->
                    <div class="col">
                        <div class="card shadow-sm card-hover border-0 h-100">
                            <div class="card-img-top card-img-hover"><a class="img-overlay" href="real-estate-single-v1.html"></a>
                                <div class="content-overlay end-0 top-0 pt-3 pe-3">
                                    <button class="btn btn-icon btn-light btn-xs text-primary rounded-circle" type="button" data-bs-toggle="tooltip" data-bs-placement="left" title="Add to Wishlist"><i class="fi-heart"></i></button>
                                </div><img src="img/real-estate/catalog/39.jpg" alt="Image">
                            </div>
                            <div class="card-body position-relative pb-3">
                                <h4 class="mb-1 fs-xs fw-normal text-uppercase text-primary">For Sale</h4>
                                <h3 class="h6 mb-2 fs-base"><a class="nav-link stretched-link" href="real-estate-single-v1.html">Modern House | 90 sq.m</a></h3>
                                <p class="mb-2 fs-sm text-muted">67-04 Myrtle Ave Glendale, NY 11385</p>
                                <div class="fw-bold"><i class="fi-cash mt-n1 me-2 lead align-middle opacity-70"></i>$84,000</div>
                            </div>
                            <div class="card-footer d-flex align-items-center justify-content-center mx-3 pt-3 text-nowrap"><span class="d-inline-block mx-1 px-2 fs-sm">4<i class="fi-bed ms-1 mt-n1 fs-lg text-muted"></i></span><span class="d-inline-block mx-1 px-2 fs-sm">2<i class="fi-bath ms-1 mt-n1 fs-lg text-muted"></i></span><span class="d-inline-block mx-1 px-2 fs-sm">2<i class="fi-car ms-1 mt-n1 fs-lg text-muted"></i></span></div>
                        </div>
                    </div>
                    <!-- Item-->
                    <div class="col">
                        <div class="card shadow-sm card-hover border-0 h-100">
                            <div class="card-img-top card-img-hover"><a class="img-overlay" href="real-estate-single-v1.html"></a>
                                <div class="content-overlay end-0 top-0 pt-3 pe-3">
                                    <button class="btn btn-icon btn-light btn-xs text-primary rounded-circle" type="button" data-bs-toggle="tooltip" data-bs-placement="left" title="Add to Wishlist"><i class="fi-heart"></i></button>
                                </div><img src="img/real-estate/catalog/40.jpg" alt="Image">
                            </div>
                            <div class="card-body position-relative pb-3">
                                <h4 class="mb-1 fs-xs fw-normal text-uppercase text-primary">For rent</h4>
                                <h3 class="h6 mb-2 fs-base"><a class="nav-link stretched-link" href="real-estate-single-v1.html">Country House | 120 sq.m</a></h3>
                                <p class="mb-2 fs-sm text-muted">3811 Ditmars Blvd Astoria, NY 11105</p>
                                <div class="fw-bold"><i class="fi-cash mt-n1 me-2 lead align-middle opacity-70"></i>$1,629 </div>
                            </div>
                            <div class="card-footer d-flex align-items-center justify-content-center mx-3 pt-3 text-nowrap"><span class="d-inline-block mx-1 px-2 fs-sm">3<i class="fi-bed ms-1 mt-n1 fs-lg text-muted"></i></span><span class="d-inline-block mx-1 px-2 fs-sm">2<i class="fi-bath ms-1 mt-n1 fs-lg text-muted"></i></span><span class="d-inline-block mx-1 px-2 fs-sm">2<i class="fi-car ms-1 mt-n1 fs-lg text-muted"></i></span></div>
                        </div>
                    </div>
                    <!-- Item-->
                    <div class="col">
                        <div class="card shadow-sm card-hover border-0 h-100">
                            <div class="card-img-top card-img-hover"><a class="img-overlay" href="real-estate-single-v1.html"></a>
                                <div class="content-overlay end-0 top-0 pt-3 pe-3">
                                    <button class="btn btn-icon btn-light btn-xs text-primary rounded-circle" type="button" data-bs-toggle="tooltip" data-bs-placement="left" title="Add to Wishlist"><i class="fi-heart"></i></button>
                                </div><img src="img/real-estate/catalog/41.jpg" alt="Image">
                            </div>
                            <div class="card-body position-relative pb-3">
                                <h4 class="mb-1 fs-xs fw-normal text-uppercase text-primary">For rent</h4>
                                <h3 class="h6 mb-2 fs-base"><a class="nav-link stretched-link" href="real-estate-single-v1.html">Luxury Rental Villa | 180 sq.m</a></h3>
                                <p class="mb-2 fs-sm text-muted">1510 Castle Hill Ave Bronx, NY 10462</p>
                                <div class="fw-bold"><i class="fi-cash mt-n1 me-2 lead align-middle opacity-70"></i>$1,330</div>
                            </div>
                            <div class="card-footer d-flex align-items-center justify-content-center mx-3 pt-3 text-nowrap"><span class="d-inline-block mx-1 px-2 fs-sm">1<i class="fi-bed ms-1 mt-n1 fs-lg text-muted"></i></span><span class="d-inline-block mx-1 px-2 fs-sm">1<i class="fi-bath ms-1 mt-n1 fs-lg text-muted"></i></span><span class="d-inline-block mx-1 px-2 fs-sm">1<i class="fi-car ms-1 mt-n1 fs-lg text-muted"></i></span></div>
                        </div>
                    </div>
                    <!-- Item-->
                    <div class="col">
                        <div class="card shadow-sm card-hover border-0 h-100">
                            <div class="card-img-top card-img-hover"><a class="img-overlay" href="real-estate-single-v1.html"></a>
                                <div class="content-overlay end-0 top-0 pt-3 pe-3">
                                    <button class="btn btn-icon btn-light btn-xs text-primary rounded-circle" type="button" data-bs-toggle="tooltip" data-bs-placement="left" title="Add to Wishlist"><i class="fi-heart"></i></button>
                                </div><img src="img/real-estate/catalog/42.jpg" alt="Image">
                            </div>
                            <div class="card-body position-relative pb-3">
                                <h4 class="mb-1 fs-xs fw-normal text-uppercase text-primary">For sale</h4>
                                <h3 class="h6 mb-2 fs-base"><a class="nav-link stretched-link" href="real-estate-single-v1.html">Duplex with Garage | 200 sq.m</a></h3>
                                <p class="mb-2 fs-sm text-muted">140-60 Beech Ave Flushing, NY 11355</p>
                                <div class="fw-bold"><i class="fi-cash mt-n1 me-2 lead align-middle opacity-70"></i>$65,000</div>
                            </div>
                            <div class="card-footer d-flex align-items-center justify-content-center mx-3 pt-3 text-nowrap"><span class="d-inline-block mx-1 px-2 fs-sm">1<i class="fi-bed ms-1 mt-n1 fs-lg text-muted"></i></span><span class="d-inline-block mx-1 px-2 fs-sm">1<i class="fi-bath ms-1 mt-n1 fs-lg text-muted"></i></span><span class="d-inline-block mx-1 px-2 fs-sm">2<i class="fi-car ms-1 mt-n1 fs-lg text-muted"></i></span></div>
                        </div>
                    </div>
                    <!-- Item-->
                    <div class="col">
                        <div class="card shadow-sm card-hover border-0 h-100">
                            <div class="card-img-top card-img-hover"><a class="img-overlay" href="real-estate-single-v1.html"></a>
                                <div class="content-overlay end-0 top-0 pt-3 pe-3">
                                    <button class="btn btn-icon btn-light btn-xs text-primary rounded-circle" type="button" data-bs-toggle="tooltip" data-bs-placement="left" title="Add to Wishlist"><i class="fi-heart"></i></button>
                                </div><img src="img/real-estate/catalog/43.jpg" alt="Image">
                            </div>
                            <div class="card-body position-relative pb-3">
                                <h4 class="mb-1 fs-xs fw-normal text-uppercase text-primary">For sale</h4>
                                <h3 class="h6 mb-2 fs-base"><a class="nav-link stretched-link" href="real-estate-single-v1.html">Merry House | 98 sq.m</a></h3>
                                <p class="mb-2 fs-sm text-muted">123-12 Jamaica Ave Queens, NY 11418</p>
                                <div class="fw-bold"><i class="fi-cash mt-n1 me-2 lead align-middle opacity-70"></i>$351,900</div>
                            </div>
                            <div class="card-footer d-flex align-items-center justify-content-center mx-3 pt-3 text-nowrap"><span class="d-inline-block mx-1 px-2 fs-sm">1<i class="fi-bed ms-1 mt-n1 fs-lg text-muted"></i></span><span class="d-inline-block mx-1 px-2 fs-sm">1<i class="fi-bath ms-1 mt-n1 fs-lg text-muted"></i></span><span class="d-inline-block mx-1 px-2 fs-sm">2<i class="fi-car ms-1 mt-n1 fs-lg text-muted"></i></span></div>
                        </div>
                    </div>
                </div>
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
    <script src="vendor/lightgallery.js/dist/js/lightgallery.min.js"></script>
    <script src="vendor/lg-fullscreen.js/dist/lg-fullscreen.min.js"></script>
    <script src="vendor/lg-zoom.js/dist/lg-zoom.min.js"></script>
    <script src="vendor/lg-thumbnail.js/dist/lg-thumbnail.min.js"></script>
    <script src="vendor/flatpickr/dist/flatpickr.min.js"></script>
    <script src="vendor/tiny-slider/dist/min/tiny-slider.js"></script>
    <!-- Main theme script-->
    <script src="js/theme.min.js"></script>
</body>

</html>