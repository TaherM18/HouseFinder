import sendAsyncRequest from "../../Helper/xhr.js";
import {validateEmail, validatePassword} from "../../Helper/validation.js";
import { showToast } from "../../Helper/toast.js";

// Elements
const loginForm = document.getElementById("loginForm");
const txtEmail = document.getElementById("txtEmail");
const txtPass = document.getElementById("txtPass");
const chkRemember = document.getElementById("chkRemember");
const btnSubmit = document.getElementById("btnSubmit");
const emailMsg = document.getElementById("emailMsg");
const passMsg = document.getElementById("passMsg");
const toastLive = document.getElementById('liveToast');


// Email Event Listener
txtEmail.addEventListener("input", (e) => {
    validateEmail(e.target, emailMsg);
});

// Password Event Listener
txtPass.addEventListener("input", (e) => {
    validatePassword(e.target, passMsg)
});

// Form Event Listener
loginForm.addEventListener("submit", (e) => {
    e.preventDefault();
    console.log("form submitted");

    if ( validateEmail(txtEmail, emailMsg) && validatePassword(txtPass, passMsg) ) {
        // collect data
        const data = "txtEmail=" + encodeURIComponent(txtEmail.value) +
                 "&txtPass=" + encodeURIComponent(txtPass.value) +
                 "&chkRemember=" + encodeURIComponent(chkRemember.value);

        // disable button and show loading 
        btnSubmit.disabled = true;
        btnSubmit.querySelector("#spinner").classList.remove("visually-hidden");
        btnSubmit.querySelector("#status").textContent = "Loading...";

        // send request
        sendAsyncRequest(
            "POST",
            "http://localhost/housefinder/Tenant/api/check_login.php",
            data
        )
        .then((res) => {
            res = JSON.parse(res);
            console.log(res);
            
            btnSubmit.disabled = false;
            btnSubmit.querySelector("#spinner").classList.add("visually-hidden");
            btnSubmit.querySelector("#status").textContent = "Sign In";

            if (res.status == 200) {
                console.log("Login Successfull");
                showToast(toastLive, "text-bg-success", res.message);
            }
            else {
                console.log(res);

                txtEmail.style = "border: 1px solid red";
                txtPass.style = "border: 1px solid red";
                emailMsg.innerHTML = "";
                passMsg.innerHTML = "";

                showToast(toastLive, "text-bg-danger", res.message);
            }
        })
        .catch((error) => {
            // Handle errors, such as 404 Not Found or others
            console.error("Error: " + error);
        });
    }
});

