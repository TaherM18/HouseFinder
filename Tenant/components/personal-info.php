
    <h1 class="h2">Personal Info</h1>
    <div class="mb-2 pt-1">Your personal info is 50% completed</div>
    <div class="progress mb-4" style="height: .25rem;">
        <div class="progress-bar bg-warning" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
    </div>
    <label class="form-label pt-2" for="account-bio">Short bio</label>
    <div class="row pb-2">
        <div class="col-lg-9 col-sm-8 mb-4">
            <textarea class="form-control" id="account-bio" rows="6" placeholder="Write your bio here. It will be displayed on your public profile."></textarea>
        </div>
        <div class="col-lg-3 col-sm-4 mb-4">
            <input class="file-uploader bg-secondary" type="file" accept="image/png, image/jpeg" data-label-idle="&lt;i class=&quot;d-inline-block fi-camera-plus fs-2 text-muted mb-2&quot;&gt;&lt;/i&gt;&lt;br&gt;&lt;span class=&quot;fw-bold&quot;&gt;Change picture&lt;/span&gt;" data-style-panel-layout="compact" data-image-preview-height="160" data-image-crop-aspect-ratio="1:1" data-image-resize-target-width="200" data-image-resize-target-height="200">
        </div>
    </div>
    <div class="border rounded-3 p-3 mb-4" id="personal-info">
        
        <!-- Name-->
        <div class="border-bottom pb-3 mb-3">
            <div class="d-flex align-items-center justify-content-between">
                <div class="pe-2">
                    <label class="form-label fw-bold">Full name</label>
                    <div id="lblFullname">Annette Black</div>
                </div>
                <div data-bs-toggle="tooltip" title="Edit"><a class="nav-link py-0" href="#name-collapse" data-bs-toggle="collapse"><i class="fi-edit"></i></a></div>
            </div>
            <div class="collapse" id="name-collapse" data-bs-parent="#personal-info">
                <div class="input-group mt-3">
                    <input id="txtFname" type="text" class="form-control" placeholder="Firstname" aria-label="Firstname" aria-describedby="btnFullname">
                    <input id="txtLname" type="text" class="form-control" placeholder="Lastname" aria-label="Lastname" aria-describedby="btnFullname">
                    <button class="btn btn-outline-primary" type="button" id="btnFullname">
                        <span id="spinner" class="spinner-border spinner-border-sm mx-2 visually-hidden" aria-hidden="true"></span>
                        <span id="status" role="status">Update</span>
                    </button>
                </div>
                <div id="msgFname"></div>
            </div>
        </div>
        <!-- Email-->
        <div class="border-bottom pb-3 mb-3">
            <div class="d-flex align-items-center justify-content-between">
                <div class="pe-2">
                    <label class="form-label fw-bold">Email</label>
                    <div id="lblEmail">annette_black@email.com</div>
                </div>
                <div data-bs-toggle="tooltip" title="Edit"><a class="nav-link py-0" href="#email-collapse" data-bs-toggle="collapse"><i class="fi-edit"></i></a></div>
            </div>
            <div class="collapse" id="email-collapse" data-bs-parent="#personal-info">
                <div class="input-group mt-3">
                    <input id="txtEmail" class="form-control" type="email" data-bs-binded-element="#txtEmail" data-bs-unset-value="Not specified" value="annette_black@email.com" aria-describedby="btnEmail">
                    <button class="btn btn-outline-primary" type="button" id="btnEmail">
                        <span id="spinner" class="spinner-border spinner-border-sm mx-2 visually-hidden" aria-hidden="true"></span>
                        <span id="status" role="status">Update</span>
                    </button>
                </div>
                <div id="msgEmail"></div>
            </div>
        </div>
        <!-- Phone number-->
        <div class="border-bottom pb-3 mb-3">
            <div class="d-flex align-items-center justify-content-between">
                <div class="pe-2">
                    <label class="form-label fw-bold">Phone number</label>
                    <div id="lblContact">(302) 555-0107</div>
                </div>
                <div data-bs-toggle="tooltip" title="Edit"><a class="nav-link py-0" href="#phone-collapse" data-bs-toggle="collapse"><i class="fi-edit"></i></a></div>
            </div>
            <div class="collapse" id="phone-collapse" data-bs-parent="#personal-info">
                <div class="input-group mt-3">
                    <input id="txtContact" class="form-control" type="text" data-bs-binded-element="#txtContact" data-bs-unset-value="Not specified" value="(302) 555-0107">
                    <button class="btn btn-outline-primary" type="button" id="btnContact">
                        <span id="spinner" class="spinner-border spinner-border-sm mx-2 visually-hidden" aria-hidden="true"></span>
                        <span id="status" role="status">Update</span>
                    </button>
                </div>
                <div id="msgContact"></div>
            </div>
        </div>
        <!-- Address-->
        <div>
            <div class="d-flex align-items-center justify-content-between">
                <div class="pe-2">
                    <label class="form-label fw-bold">Address</label>
                    <div id="lblAddress">Not specified</div>
                </div>
                <div data-bs-toggle="tooltip" title="Edit"><a class="nav-link py-0" href="#address-collapse" data-bs-toggle="collapse"><i class="fi-edit"></i></a></div>
            </div>
            <div class="collapse" id="address-collapse" data-bs-parent="#personal-info">
                <div class="input-group mt-3">
                    <input id="txtAddress" class="form-control" type="text" data-bs-binded-element="#txtAddress" data-bs-unset-value="Not specified" placeholder="Enter address">
                    <button class="btn btn-outline-primary" type="button" id="btnAddress">
                        <span id="spinner" class="spinner-border spinner-border-sm mx-2 visually-hidden" aria-hidden="true"></span>
                        <span id="status" role="status">Update</span>
                    </button>
                </div>
                <div id="msgAddress"></div>
            </div>
        </div>
    </div>
    <!-- Socials-->
    <div class="pt-2">
        <label class="form-label fw-bold mb-3">Socials</label>
    </div>
    <div class="d-flex align-items-center mb-3">
        <div class="btn btn-icon btn-light btn-xs shadow-sm rounded-circle pe-none flex-shrink-0 me-3"><i class="fi-facebook text-body"></i></div>
        <input class="form-control" type="text" placeholder="Your Facebook account">
    </div>
    <div class="d-flex align-items-center mb-3">
        <div class="btn btn-icon btn-light btn-xs shadow-sm rounded-circle pe-none flex-shrink-0 me-3"><i class="fi-linkedin text-body"></i></div>
        <input class="form-control" type="text" placeholder="Your LinkedIn account">
    </div>
    <div class="d-flex align-items-center mb-3">
        <div class="btn btn-icon btn-light btn-xs shadow-sm rounded-circle pe-none flex-shrink-0 me-3"><i class="fi-twitter text-body"></i></div>
        <input class="form-control" type="text" placeholder="Your Twitter account">
    </div>
    <div class="collapse" id="showMoreSocials">
        <div class="d-flex align-items-center mb-3">
            <div class="btn btn-icon btn-light btn-xs shadow-sm rounded-circle pe-none flex-shrink-0 me-3"><i class="fi-instagram text-body"></i></div>
            <input class="form-control" type="text" placeholder="Your Instagram account">
        </div>
        <div class="d-flex align-items-center mb-3">
            <div class="btn btn-icon btn-light btn-xs shadow-sm rounded-circle pe-none flex-shrink-0 me-3"><i class="fi-pinterest text-body"></i></div>
            <input class="form-control" type="text" placeholder="Your Pinterest account">
        </div>
    </div><a class="collapse-label collapsed d-inline-block fs-sm fw-bold text-decoration-none pt-2 pb-3" href="#showMoreSocials" data-bs-toggle="collapse" data-bs-label-collapsed="Show more" data-bs-label-expanded="Show less" role="button" aria-expanded="false" aria-controls="showMoreSocials"><i class="fi-arrow-down me-2"></i></a>
    <div class="d-flex align-items-center justify-content-between border-top mt-4 pt-4 pb-1">
        <button class="btn btn-primary px-3 px-sm-4" type="button">Save changes</button>
        <button class="btn btn-link btn-sm px-0" type="button"><i class="fi-trash me-2"></i>Delete account</button>
    </div>
