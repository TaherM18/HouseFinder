import sendAsyncRequest from "../../Helper/xhr.js";
import {
    validateAddress,
    validateEmail,
    validateFirstname,
    validateLastname,
    validatePassword,
    validatePhone,
} from "../../Helper/validation.js";
import { showToast } from "../../Helper/toast.js";
import { setLoadingButton, setTextButton } from "../../Helper/submit_button.js";

import { load_personal_info } from "./personal_info.js";
import { load_account_security } from "./account_security.js";
import { load_account_properties } from "./account_properties.js";
import { load_account_wishlist } from "./account_wishlist.js";
import { load_account_reviews } from "./account_reviews.js";
import { load_account_notifications } from "./account_notifications.js";

// Elements

const txtUserId = document.getElementById("txtUserId");

const personalInfoLink = document.getElementById("personalInfoLink");
const passAndSecLink = document.getElementById("passAndSecLink");
const myPropertiesLink = document.getElementById("myPropertiesLink");
const wishlistLink = document.getElementById("wishlistLink");
const reviewsLink = document.getElementById("reviewsLink");
const notificationsLink = document.getElementById("notificationsLink");

const content = document.getElementById("content");

// Event Listeners

window.addEventListener("load", () => {
    load_personal_info(content);
});

personalInfoLink.addEventListener("click", (e) => {
    e.preventDefault();

    resetActiveLink();
    e.target.classList.add("active");
    load_personal_info(content);
});

passAndSecLink.addEventListener("click", (e) => {
    e.preventDefault();

    resetActiveLink();
    e.target.classList.add("active");
    load_account_security(content);
});

myPropertiesLink.addEventListener("click", (e) => {
    e.preventDefault();

    resetActiveLink();
    e.target.classList.add("active");
    load_account_properties(content);
});

wishlistLink.addEventListener("click", (e) => {
    e.preventDefault();

    resetActiveLink();
    e.target.classList.add("active");
    load_account_wishlist(content);
});

reviewsLink.addEventListener("click", (e) => {
    e.preventDefault();

    resetActiveLink();
    e.target.classList.add("active");
    load_account_reviews(content);
});

notificationsLink.addEventListener("click", (e) => {
    e.preventDefault();

    resetActiveLink();
    e.target.classList.add("active");
    load_account_notifications(content);
});


function resetActiveLink() {
    personalInfoLink.classList.remove("active");
    passAndSecLink.classList.remove("active");
    myPropertiesLink.classList.remove("active");
    wishlistLink.classList.remove("active");
    reviewsLink.classList.remove("active");
    notificationsLink.classList.remove("active");
}