
    <h1 class="h2">Notifications</h1>
    <p class="pt-1 mb-4">Get real-time updates on your favorite homes, neighborhoods, and more.</p>
    <!-- Nav tabs-->
    <ul class="nav nav-tabs flex-column flex-sm-row align-items-stretch align-items-sm-start border-bottom mb-4" role="tablist">
        <li class="nav-item me-sm-3 mb-3"><a class="nav-link text-center active" href="#notifications-rent" data-bs-toggle="tab" role="tab" aria-controls="notifications-rent" aria-selected="true">Rent notifications</a></li>
        <li class="nav-item mb-3"><a class="nav-link text-center" href="#notifications-sale" data-bs-toggle="tab" role="tab" aria-controls="notifications-sale" aria-selected="false">Sale notifications</a></li>
    </ul>
    <!-- Tabs content-->
    <div class="tab-content py-2" id="notification-settings">
        <!-- Rent notifications tab-->
        <div class="tab-pane fade show active" id="notifications-rent" role="tabpanel">
            <div class="d-flex justify-content-between mb-4">
                <div class="me-2">
                    <h6 class="mb-1">New rental alerts</h6>
                    <p class="fs-sm mb-0">New rentals that match your <a href='real-estate-account-wishlist.html'>Wishlist</a></p>
                </div>
                <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" id="new-rental" checked>
                    <label class="form-check-label" for="new-rental"></label>
                </div>
            </div>
            <div class="d-flex justify-content-between mb-4">
                <div class="me-2">
                    <h6 class="mb-1">Rental status updates</h6>
                    <p class="fs-sm mb-0">Updates like price changes and off-market status on your <a href='real-estate-account-wishlist.html'>Wishlist</a></p>
                </div>
                <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" id="rental-update" checked>
                    <label class="form-check-label" for="rental-update"></label>
                </div>
            </div>
            <div class="d-flex justify-content-between mb-4">
                <div class="me-2">
                    <h6 class="mb-1">Finder recommendations</h6>
                    <p class="fs-sm mb-0">Rentals we think you'll like. These recommendations may be slightly outside your search criteria</p>
                </div>
                <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" id="rental-recomendation">
                    <label class="form-check-label" for="rental-recomendation"></label>
                </div>
            </div>
        </div>
        <!-- Sale notifications tab-->
        <div class="tab-pane fade" id="notifications-sale" role="tabpanel">
            <div class="d-flex justify-content-between mb-4">
                <div class="me-2">
                    <h6 class="mb-1">New sale alerts</h6>
                    <p class="fs-sm mb-0">New sales that match your <a href='real-estate-account-wishlist.html'>Wishlist</a></p>
                </div>
                <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" id="new-sale" checked>
                    <label class="form-check-label" for="new-sale"></label>
                </div>
            </div>
            <div class="d-flex justify-content-between mb-4">
                <div class="me-2">
                    <h6 class="mb-1">Sale status updates</h6>
                    <p class="fs-sm mb-0">Updates like price changes and off-market status on your <a href='real-estate-account-wishlist.html'>Wishlist</a></p>
                </div>
                <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" id="sale-update">
                    <label class="form-check-label" for="sale-update"></label>
                </div>
            </div>
            <div class="d-flex justify-content-between mb-4">
                <div class="me-2">
                    <h6 class="mb-1">Finder recommendations</h6>
                    <p class="fs-sm mb-0">Sales we think you'll like. These recommendations may be slightly outside your search criteria</p>
                </div>
                <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" id="sale-recomendation">
                    <label class="form-check-label" for="sale-recomendation"></label>
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-between mb-4">
            <div class="me-2">
                <h6 class="mb-1">Featured news</h6>
                <p class="fs-sm mb-0">News and tips you may be interested in</p>
            </div>
            <div class="form-check form-switch">
                <input class="form-check-input" type="checkbox" id="featured-news" checked>
                <label class="form-check-label" for="featured-news"></label>
            </div>
        </div>
        <div class="d-flex justify-content-between mb-4">
            <div class="me-2">
                <h6 class="mb-1">Finder extras</h6>
                <p class="fs-sm mb-0">Occasional notifications about new features to make finding the perfect rental easy</p>
            </div>
            <div class="form-check form-switch">
                <input class="form-check-input" type="checkbox" id="extras">
                <label class="form-check-label" for="extras"></label>
            </div>
        </div>
    </div>
    <div class="border-top pt-4">
        <div class="form-check form-switch">
            <input class="form-check-input" type="checkbox" id="all-notifications" data-master-checkbox-for="#notification-settings" checked>
            <label class="form-check-label" for="all-notifications">Enable / disable all notifications</label>
        </div>
    </div>
