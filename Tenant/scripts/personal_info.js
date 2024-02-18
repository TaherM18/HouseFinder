import sendAsyncRequest from "../../Helper/xhr.js";
import { showToast } from "../../Helper/toast.js";
import { setLoadingButton, setTextButton } from "../../Helper/submit_button.js";
import {
    validateAddress,
    validateEmail,
    validateFirstname,
    validateLastname,
    validatePassword,
    validatePhone,
} from "../../Helper/validation.js";


export function load_personal_info(container) {
    sendAsyncRequest(
        "GET",
        "http://localhost/housefinder/Tenant/components/personal-info.php",
        ""
    )
        .then((res) => {
            container.innerHTML = res;

            init_personal_info();
        })
        .catch((error) => {
            // Handle errors, such as 404 Not Found or others
            console.error("Error: " + error);
        });
}

export function init_personal_info() {
    // Elements

    const txtUserId = document.getElementById("txtUserId");
    const txtFname = document.getElementById("txtFname");
    const txtLname = document.getElementById("txtLname");
    const txtEmail = document.getElementById("txtEmail");
    const txtContact = document.getElementById("txtContact");
    const txtAddress = document.getElementById("txtAddress");

    const lblFullname = document.getElementById("lblFullname");
    const lblEmail = document.getElementById("lblEmail");
    const lblContact = document.getElementById("lblContact");
    const lblAddress = document.getElementById("lblAddress");

    const msgFname = document.getElementById("msgFname");
    const msgEmail = document.getElementById("msgEmail");
    const msgContact = document.getElementById("msgContact");
    const msgAddress = document.getElementById("msgAddress");

    const btnFullName = document.getElementById("btnFullname");
    const btnEmail = document.getElementById("btnEmail");
    const btnContact = document.getElementById("btnContact");
    const btnAddress = document.getElementById("btnAddress");

    const toastLive = document.getElementById("liveToast");

    // Event Listeners

    ( () => {
        const data = "userId=" + encodeURI(txtUserId.value);

        console.log(data);

        sendAsyncRequest(
            "POST",
            "http://localhost/housefinder/Tenant/api/user_data.php",
            data
        )
            .then((res) => {
                res = JSON.parse(res);

                if (res.status == 200) {
                    // console.log("Data Fetch Success");
                    lblFullname.textContent =
                        res.data.first_name + " " + res.data.last_name;
                    txtFname.value = res.data.first_name;
                    txtLname.value = res.data.last_name;

                    lblEmail.textContent = res.data.email;
                    txtEmail.value = res.data.email;

                    lblContact.textContent = res.data.contact;
                    txtContact.value = res.data.contact;

                    lblAddress.textContent = res.data.address;
                    txtAddress.value = res.data.address;
                } else {
                    console.error(res);
                }
            })
            .catch((error) => {
                // Handle errors, such as 404 Not Found or others
                console.error("Error: " + error);
            });
    }
    )();

    txtFname.addEventListener("input", (e) => {
        validateFirstname(e.target, msgFname);
    });

    txtLname.addEventListener("input", (e) => {
        validateLastname(e.target, msgFname);
    });

    txtEmail.addEventListener("input", (e) => {
        validateEmail(e.target, msgEmail);
    });

    txtContact.addEventListener("input", (e) => {
        validatePhone(e.target, msgContact);
    });

    txtAddress.addEventListener("input", (e) => {
        validateAddress(e.target, msgAddress);
    });

    btnFullName.addEventListener("click", (e) => {
        if (
            validateFirstname(txtFname, msgFname) &&
            validateLastname(txtLname, msgFname)
        ) {
            const data =
                "userId=" +
                txtUserId.value +
                "&field=full_name" +
                "&value=" +
                encodeURI(txtFname.value) +
                " " +
                encodeURI(txtLname.value);

            console.log(data); // For Debugging
            setLoadingButton(btnFullName);

            sendAsyncRequest(
                "POST",
                "http://localhost/housefinder/Tenant/api/update_user.php",
                data
            )
                .then((res) => {
                    res = JSON.parse(res);
                    console.log(res);
                    setTextButton(btnFullName, "Update");

                    if (res.status == 200) {
                        showToast(toastLive, "text-bg-success", res.message);
                        lblFullname.textContent =
                            txtFname.value + " " + txtLname.value;
                    } else {
                        showToast(toastLive, "text-bg-danger", res.message);
                    }
                })
                .catch((error) => {
                    // Handle errors, such as 404 Not Found or others
                    console.error("Error: " + error);
                    showToast(toastLive, "text-bg-danger", error);
                });
        }
    });

    btnEmail.addEventListener("click", (e) => {
        if (validateEmail(txtEmail, msgEmail)) {
            const data =
                "userId=" +
                txtUserId.value +
                "&field=email" +
                "&value=" +
                encodeURI(txtEmail.value);

            console.log(data);
            setLoadingButton(btnEmail);

            sendAsyncRequest(
                "POST",
                "http://localhost/housefinder/Tenant/api/update_user.php",
                data
            )
                .then((res) => {
                    res = JSON.parse(res);
                    console.log(res);
                    setTextButton(btnEmail, "Update");

                    if (res.status == 200) {
                        showToast(toastLive, "text-bg-success", res.message);
                        lblEmail.textContent = txtEmail.value;
                    } else {
                        showToast(toastLive, "text-bg-danger", res.message);
                    }
                })
                .catch((error) => {
                    // Handle errors, such as 404 Not Found or others
                    console.error("Error: " + error);
                    showToast(toastLive, "text-bg-danger", error);
                });
        }
    });

    btnContact.addEventListener("click", (e) => {
        if (validateEmail(txtContact, msgContact)) {
            const data =
                "userId=" +
                txtUserId.value +
                "&field=contact" +
                "&value=" +
                encodeURI(txtContact.value);

            console.log(data);
            setLoadingButton(btnContact);

            sendAsyncRequest(
                "POST",
                "http://localhost/housefinder/Tenant/api/update_user.php",
                data
            )
                .then((res) => {
                    res = JSON.parse(res);
                    console.log(res);
                    setTextButton(btnContact, "Update");

                    if (res.status == 200) {
                        showToast(toastLive, "text-bg-success", res.message);
                        lblContact.textContent = txtContact.value;
                    } else {
                        showToast(toastLive, "text-bg-danger", res.message);
                    }
                })
                .catch((error) => {
                    // Handle errors, such as 404 Not Found or others
                    console.error("Error: " + error);
                    showToast(toastLive, "text-bg-danger", error);
                });
        }
    });

    btnAddress.addEventListener("click", (e) => {
        if (validateAddress(txtAddress, msgAddress)) {
            const data =
                "userId=" +
                txtUserId.value +
                "&field=address" +
                "&value=" +
                encodeURI(txtAddress.value);

            console.log(data);
            setLoadingButton(btnAddress);

            sendAsyncRequest(
                "POST",
                "http://localhost/housefinder/Tenant/api/update_user.php",
                data
            )
                .then((res) => {
                    res = JSON.parse(res);
                    console.log(res);
                    setTextButton(btnAddress, "Update");

                    if (res.status == 200) {
                        showToast(toastLive, "text-bg-success", res.message);
                        lblAddress.textContent = txtAddress.value;
                    } else {
                        showToast(toastLive, "text-bg-danger", res.message);
                    }
                })
                .catch((error) => {
                    // Handle errors, such as 404 Not Found or others
                    console.error("Error: " + error);
                    showToast(toastLive, "text-bg-danger", error);
                });
        }
    });
}
