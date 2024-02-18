<header class="navbar navbar-expand-lg navbar-light bg-light fixed-top" data-scroll-header>
    <div class="container"><a class="navbar-brand me-3 me-xl-4" href="home-v1.html"><img class="d-block" src="img/logo/logo-dark.svg" width="116" alt="Finder"></a>
        <button class="navbar-toggler ms-auto" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <?php
        if ($sessionManager->get("userId") != null) {
            $userId = $sessionManager->get("userId");
            $fetchUserData = "SELECT CONCAT(first_name, ' ', last_name) AS full_name, email, contact FROM users WHERE user_id = ?";
            $stmt = $conn->prepare($fetchUserData);
            $stmt->bind_param("i", $userId);
            if ($stmt->execute()) {
                $rs = $stmt->get_result();
                $row = $rs->fetch_assoc();
                ?>
                <div class="dropdown d-none d-lg-block order-lg-3 my-n2 me-3"><a class="d-block py-2" href="account-info.php"><img class="rounded-circle" src="img/avatars/30.jpg" width="40" alt="Annette Black"></a>
                    <div class="dropdown-menu dropdown-menu-end">
                        <div class="d-flex align-items-start border-bottom px-3 py-1 mb-2" style="width: 16rem;"><img class="rounded-circle" src="img/avatars/03.jpg" width="48" alt="Annette Black">
                            <div class="ps-2">
                                <h6 class="fs-base mb-0"><?= $row["full_name"] ?></h6>
                                <!-- <span class="star-rating star-rating-sm"><i class="star-rating-icon fi-star-filled active"></i><i class="star-rating-icon fi-star-filled active"></i><i class="star-rating-icon fi-star-filled active"></i><i class="star-rating-icon fi-star-filled active"></i><i class="star-rating-icon fi-star-filled active"></i></span> -->
                                <div class="fs-xs py-2"><?= $row["contact"] ?><br><?= $row["email"] ?></div>
                            </div>
                        </div>
                        <a class="dropdown-item" href="account-info.php"><i class="fi-user opacity-60 me-2"></i>Personal Info</a>
                        <!-- 
                        <a class="dropdown-item" href="account-security.html"><i class="fi-lock opacity-60 me-2"></i>Password &amp; Security</a>
                        <a class="dropdown-item" href="account-properties.html"><i class="fi-home opacity-60 me-2"></i>My Properties</a>
                        <a class="dropdown-item" href="account-wishlist.html"><i class="fi-heart opacity-60 me-2"></i>Wishlist</a>
                        <a class="dropdown-item" href="account-reviews.html"><i class="fi-star opacity-60 me-2"></i>Reviews</a>
                        <a class="dropdown-item" href="account-notifications.html"><i class="fi-bell opacity-60 me-2"></i>Notifications</a> 
                        -->
                        <div class="dropdown-divider"></div><a class="dropdown-item" href="help-center.html">Help</a><a class="dropdown-item" href="signin-light.html">Sign Out</a>
                    </div>
                </div>
                <?php
            }
        } else {
        ?>
            <!-- Sign In button -->
            <a class="btn btn-sm text-primary d-none d-lg-block order-lg-3" href="./signin-light.php" data-bs-toggle="modal">
                <i class="fi-user me-2"></i>Sign in
            </a>
        <?php
        }
        ?>
        <!-- <a class="btn btn-primary btn-sm ms-2 order-lg-3" href="add-property.html"><i class="fi-plus me-2"></i>Add<span class='d-none d-sm-inline'> property</span></a> -->
        <div class="collapse navbar-collapse order-lg-2" id="navbarNav">
            <ul class="navbar-nav navbar-nav-scroll" style="max-height: 35rem;">
                <!-- Menu items-->
                <li class="nav-item active">
                    <a class="nav-link" href="./home.php" role="button" aria-expanded="false">Home</a>
                </li>
                <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Catalog</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="catalog-rent.php">Property for Rent</a></li>
                        <li><a class="dropdown-item" href="catalog-sale.html">Property for Sale</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Pages</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="about.html">About</a></li>
                        <li class="dropdown"><a class="dropdown-item dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Blog</a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="blog.html">Blog Grid</a></li>
                                <li><a class="dropdown-item" href="blog-single.html">Single Post</a></li>
                            </ul>
                        </li>
                        <li><a class="dropdown-item" href="contacts.html">Contact us</a></li>
                        <li><a class="dropdown-item" href="help-center.html">Help Center</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</header>