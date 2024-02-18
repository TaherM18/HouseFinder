import sendAsyncRequest from "../../Helper/xhr.js";
import { showToast } from "../../Helper/toast.js";

import {
    validateFirstname,
    validateLastname,
    validateEmail,
    validatePhone,
    validateCity,
    validateAddress,
    validateConfirm,
    validatePassword,
} from "../../Helper/validation.js";

// =====================================================================================

// Elements
const registerForm = document.getElementById("registerForm");
const txtFirstname = document.getElementById("txtFname");
const txtLastname = document.getElementById("txtLname");
const txtContact = document.getElementById("txtContact");
const lblCity = document.getElementById("lblCity");
const selCity = document.getElementById("selCity");
const txtCity = document.getElementById("txtCity");
const txtAddress = document.getElementById("txtAddress");
const selUser = document.getElementById("selUser");
const txtEmail = document.getElementById("txtEmail");
const txtPass = document.getElementById("txtPass");
const txtConfirm = document.getElementById("txtConfirm");
const btnSubmit = document.getElementById("btnSubmit");
const toastLive = document.getElementById('liveToast');

const msgFname = document.getElementById("msgFname");
const msgLname = document.getElementById("msgLname");
const msgContact = document.getElementById("msgContact");
const msgCity = document.getElementById("msgCity");
const msgAddress = document.getElementById("msgAddress");
const msgEmail = document.getElementById("msgEmail");
const msgPass = document.getElementById("msgPass");
const msgConfirm = document.getElementById("msgConfirm");

const myInput = document.getElementById("txtPass");
const letter = document.getElementById("letter");
const capital = document.getElementById("capital");
const number = document.getElementById("number");
const special = document.getElementById("special");
const length = document.getElementById("length");

let cityNames = [];

// =====================================================================================

// Event Listeners
(() => {
    if (localStorage.getItem("cityNames") == null) {
        sendAsyncRequest(
            "POST",
            "http://localhost/housefinder/Tenant/api/city_names.php",
            ""
        )
            .then((res) => {
                // res = JSON.parse(res);
                
                if (res.status == 201) {
                    console.log(res.message);
                    cityNames = res.data;
                    localStorage.setItem("cityNames", cityNames);
                    handleInput();
                } else {
                    console.log(res);
                }
            })
            .catch((error) => {
                console.error(error);
            });
    } else {
        cityNames = localStorage.getItem("cityNames").split(",");
        handleInput();
    }
})();

registerForm.addEventListener("submit", (e) => {
    e.preventDefault();

    if (
        validateFirstname(txtFirstname, msgFname) &&
        validateLastname(txtLastname, msgLname) &&
        validatePhone(txtContact, msgContact) &&
        validateCity(lblCity, msgCity) &&
        validateAddress(txtAddress, msgAddress) &&
        validateEmail(txtEmail, msgEmail) &&
        validatePassword(txtPass, msgPass)
    ) {
        console.log("form submitted");

        // collect data
        const data =
            "txtFname=" +
            encodeURIComponent(txtFirstname.value) +
            "&txtLname=" +
            encodeURIComponent(txtLastname.value) +
            "&txtContact=" +
            encodeURIComponent(txtContact.value) +
            "&selCity=" +
            encodeURIComponent(selCity.value) +
            "&txtAddress=" +
            encodeURIComponent(txtAddress.value) +
            "&selUser=" +
            encodeURIComponent(selUser.value) +
            "&txtEmail=" +
            encodeURIComponent(txtEmail.value) +
            "&txtPass=" +
            encodeURIComponent(txtPass.value);

        console.log(data);

        // disable button and show loading
        btnSubmit.disabled = true;
        btnSubmit.querySelector("#spinner").classList.remove("visually-hidden");
        btnSubmit.querySelector("#status").textContent = "Loading...";

        sendAsyncRequest(
            "POST",
            "http://localhost/housefinder/Tenant/api/check_register.php",
            data
        )
            .then((res) => {
                res = JSON.parse(res);
                
                if (res.status == 200) {
                    // enable button
                    btnSubmit.disabled = false;
                    btnSubmit
                        .querySelector("#spinner")
                        .classList.add("visually-hidden");
                    btnSubmit.querySelector("#status").textContent = "Sign Up";

                    showToast(toastLive, "text-bg-success", res.message);
                } else {
                    console.log(res);
                    showToast(toastLive, "text-bg-danger", res.message);
                }
            })
            .catch((error) => {
                console.error(error);
                showToast(toastLive, "text-bg-danger", res.message);
            });
    }
});

txtFirstname.addEventListener("input", (e) => {
    validateFirstname(e.target, msgFname);
});

txtLastname.addEventListener("input", (e) => {
    validateLastname(e.target, msgLname);
});

txtContact.addEventListener("input", (e) => {
    validatePhone(e.target, msgContact);
});

// lblCity.addEventListener("change", (e) => {
//     validateCity(e.target, msgCity);
// });

txtAddress.addEventListener("input", (e) => {
    validateAddress(e.target, msgAddress);
});

txtEmail.addEventListener("input", (e) => {
    validateEmail(e.target, msgEmail);
});

txtPass.addEventListener("input", (e) => {
    e.target.value;
});

// txtConfirm.addEventListener("input", (e) => {
//     validateConfirm(e.target, txtPass.value, msgConfirm);
// });

// =====================================================================================

// When the user clicks on the password field, show the message box
myInput.onfocus = function () {
    document.getElementById("message").style.display = "block";
};

// When the user clicks outside of the password field, hide the message box
myInput.onblur = function () {
    document.getElementById("message").style.display = "none";
};

// When the user starts to type something inside the password field
myInput.onkeyup = function () {
    // Validate lowercase letters
    var lowerCaseLetters = /[a-z]/g;
    if (myInput.value.match(lowerCaseLetters)) {
        letter.classList.remove("invalid");
        letter.classList.add("valid");
    } else {
        letter.classList.remove("valid");
        letter.classList.add("invalid");
    }

    // Validate capital letters
    var upperCaseLetters = /[A-Z]/g;
    if (myInput.value.match(upperCaseLetters)) {
        capital.classList.remove("invalid");
        capital.classList.add("valid");
    } else {
        capital.classList.remove("valid");
        capital.classList.add("invalid");
    }

    // Validate numbers
    var numbers = /[0-9]/g;
    if (myInput.value.match(numbers)) {
        number.classList.remove("invalid");
        number.classList.add("valid");
    } else {
        number.classList.remove("valid");
        number.classList.add("invalid");
    }

    // Validate special characters
    var specials = /[!@#$%^&*()~+-]/g;
    if (myInput.value.match(specials)) {
        special.classList.remove("invalid");
        special.classList.add("valid");
    } else {
        special.classList.remove("valid");
        special.classList.add("invalid");
    }

    // Validate length
    if (myInput.value.length >= 8) {
        length.classList.remove("invalid");
        length.classList.add("valid");
    } else {
        length.classList.remove("valid");
        length.classList.add("invalid");
    }
};

txtCity.addEventListener("input", handleInput);

// =====================================================================================

// Functions
function handleInput() {
    const inputValue = document.querySelector("#txtCity").value;
    let results = cityNames;
    const parentElement = document.querySelector(".dropdown-menu");
    const elementsToRemove = document.querySelectorAll("li");
    elementsToRemove.forEach((element) => {
        element.remove();
    });
    if (inputValue) {
        const matchingWords = results.filter((word) =>
            word.includes(inputValue)
        );
        matchingWords.sort((a, b) => {
            const indexA = a.indexOf(inputValue);
            const indexB = b.indexOf(inputValue);
            return indexA - indexB;
        });
        if (matchingWords.length > 10) {
            // if more than 10 matching words found
            for (let i = 0; i < 10; i++) {
                let word = matchingWords[i];
                const listItem = document.createElement("li");
                listItem.classList.add("dropdown-item");
                listItem.textContent = word;
                listItem.addEventListener("click", (e) => {
                    lblCity.value = e.target.textContent;
                    selCity.value = results.indexOf(word) + 1;
                });
                parentElement.appendChild(listItem);
            }
        } else {
            // if less than 11 matching words found
            for (let i = 0; i < matchingWords.length; i++) {
                let word = matchingWords[i];
                const listItem = document.createElement("li");
                listItem.classList.add("dropdown-item");
                listItem.textContent = word;
                listItem.addEventListener("click", (e) => {
                    lblCity.value = e.target.textContent;
                    selCity.value = results.indexOf(word) + 1;
                });
                parentElement.appendChild(listItem);
            }
        }

        // matchingWords.forEach((word) => {
        //     const listItem = document.createElement("li");
        //     listItem.classList.add("dropdown-item");
        //     listItem.textContent = word;
        //     listItem.addEventListener("click", (e) => {
        //         lblCity.value = e.target.textContent;
        //         selCity.value = results.indexOf(word) + 1;
        //     });
        //     parentElement.appendChild(listItem);
        // });

        if (matchingWords.length == 0) {
            // if no matching words found
            const listItem = document.createElement("li");
            listItem.textContent = "No Item";
            listItem.classList.add("dropdown-item");
            parentElement.appendChild(listItem);
        }
    } else {
        // limit results to 10 words
        for (let i = 0; i < 10; i++) {
            let word = results[i];
            const listItem = document.createElement("li");
            listItem.classList.add("dropdown-item");
            listItem.textContent = word;
            listItem.addEventListener("click", (e) => {
                lblCity.value = e.target.textContent;
                selCity.value = results.indexOf(word) + 1;
            });
            parentElement.appendChild(listItem);
        }
        // results.forEach((word) => {
        //     const listItem = document.createElement("li");
        //     listItem.classList.add("dropdown-item");
        //     listItem.textContent = word;
        //     listItem.addEventListener("click", (e) => {
        //         lblCity.value = e.target.textContent;
        //         selCity.value = results.indexOf(word) + 1;
        //     });
        //     parentElement.appendChild(listItem);
        // });
    }
}
