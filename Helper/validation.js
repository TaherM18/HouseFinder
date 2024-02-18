export function validateFirstname(target, msg) {
    const nameRegex = /^[a-zA-Z]+$/;

    target.value.replace(/[^a-zA-Z]/g, '');

    if (target.value == "") {
        target.style = "border: red solid 1px";
        msg.innerHTML = "<p style='color: red'>Firstname is required</p>";
        target.focus();
        return false;
    }
    else if (target.value.match(nameRegex)) {
        target.style = "border: green solid 1px";
        msg.innerHTML = "<p style='color: green'>Looks good</p>";
        return true;
    }
    else {
        target.style = "border: red solid 1px";
        msg.innerHTML = "<p style='color: red'>Only alphabets allowed</p>";
        target.focus();
        return false;
    }
}

export function validateLastname(target, msg) {
    const nameRegex = /^[a-zA-Z]+$/;

    target.value.replace(/[^a-zA-Z]/g, '');

    if (target.value == "") {
        target.style = "border: red solid 1px";
        msg.innerHTML = "<p style='color: red'>Lastname is required</p>";
        target.focus();
        return false;
    }
    else if (target.value.match(nameRegex)) {
        target.style = "border: green solid 1px";
        msg.innerHTML = "<p color: green>Looks good</p>";
        return true;
    }
    else {
        target.style = "border: red solid 1px";
        msg.innerHTML = "<p style='color: red'>Only alphabets allowed</p>";
        target.focus();
        return false;
    }
}


export function validateEmail(target, msg) {
    const emailRegex = /^[^.][a-zA-Z0-9._!#$%&'*+/=?^_`{|}~-]+@{1}(?:gmail.com|yahoo.com|yahoo.in|utu.ac.in|hotmail.in)$/;
    if (target.value == "") {
        msg.innerHTML = "<p style='color: red'>Email is required</p>";
        target.style = "border: red solid 1px";
        target.focus();
        return false;
    }
    else if (target.value.match(emailRegex)) {
        target.style = "border: green solid 1px";
        msg.innerHTML = "<p style='color: green'>Looks good</p>";
        return true;
    }
    else {
        target.style = "border: red solid 1px";
        msg.innerHTML = "<p style='color: red'>Invalid email format</p>";
        target.focus();
        return false;
    }
}


export function validatePhone(target, msg) {
    const phoneRegex = /^[7-9]{1}[0-9]{9}$/;

    target.value = target.value.replace(/[^\d]/, '');

    if (target.value == "") {
        msg.innerHTML = "<p style='color: red'>Phone is required</p>";
        target.style = "border: red solid 1px";
        target.focus();
        return false;
    }
    else if (!target.value.match(phoneRegex)) {
        target.style = "border: red solid 1px";
        msg.innerHTML = "<p style='color: red'>Phone must start with 7-9 and have 10 digits</p>";
        target.focus();
        return false;
    }
    else {
        target.style = "border: green solid 1px";
        msg.innerHTML = "<p style='color: green'>Looks good</p>";
        return true;
    }
}


export function validatePincode(target, msg) {
    const pinRegex = /^[1-9]{1}[\d]{5}$/;

    target.value = target.value.replace(/[^0-9]/g, '');

    if (target.value == "") {
        msg.innerHTML = "<p style='color: red'>Pincode is required</p>";
        target.style = "border: red solid 1px";
        target.focus();
        return false;
    }
    else if (target.value.match(pinRegex)) {
        target.style = "border: green solid 1px";
        msg.innerHTML = "<p style='color: green'>Looks good</p>";
        return true;
    }
    else {
        target.style = "border: red solid 1px";
        msg.innerHTML = "<p style='color: red'>Invalid pincode format</p>";
        target.focus();
        return false;
    }
}


export function validateCity(target, msg) {
    if (target.value == "") {
        msg.innerHTML = "<p style='color: red'>City is required</p>";
        target.style = "border: red solid 1px";
        target.focus();
        return false;
    }
    else {
        target.style = "border: green solid 1px";
        msg.innerHTML = "<p style='color: green'>Looks good</p>";
        return true;
    }
}

export function validateAddress(target, msg) {
    const addrRegex = /(?=.*[a-zA-Z])[a-zA-Z0-9]{2}/
    if (target.value == "") {
        msg.innerHTML = "<p style='color: red'>Address is required</p>";
        target.style = "border: red solid 1px";
        target.focus();
        return false;
    }
    else if (target.value.match(addrRegex)) {
        target.style = "border: green solid 1px";
        msg.innerHTML = "<p style='color: green'>Looks good</p>";
        return true;
    }
    else {
        target.style = "border: red solid 1px";
        msg.innerHTML = "<p style='color: red'>Invalid address</p>";
        target.focus();
        return false;
    }
}

export function validateHouseBuilding(target, msg) {
    const hbRegex = /[\dA-Za-z]+,\s[a-zA-Z]+/;
    if (target.value == "") {
        msg.innerHTML = "<p style='color: red'>This field is required</p>";
        target.style = "border: red solid 1px";
        target.focus();
        return false;
    }
    else if (target.match(hbRegex)) {
        target.style = "border: green solid 1px";
        msg.innerHTML = "<p style='color: green'>Looks good</p>";
        return true;
    }
    else {
        target.style = "border: red solid 1px";
        msg.innerHTML = "<p style='color: red'>format: <House/Flat>, <Building></p>";
        target.focus();
        return false;
    }
}


export function validateRoadSociety(target, msg) {
    const rsRegex = /^[a-zA-Z]+[a-zA-Z\s]*,\s[a-zA-Z]+[a-zA-Z\s]*$/;
    if (target.value == "") {
        msg.innerHTML = "<p style='color: red'>This field is required</p>";
        target.style = "border: red solid 1px";
        target.focus();
        return false;
    }
    else if (target.match(rsRegex)) {
        target.style = "border: green solid 1px";
        msg.innerHTML = "<p style='color: green'>Looks good</p>";
        return true;
    }
    else {
        target.style = "border: red solid 1px";
        msg.innerHTML = "<p style='color: red'>format: Society/Colony name, Road name</p>";
        target.focus();
        return false;
    }
}


export function validateLocality(target, msg) {
    const localityRegex = /^[a-zA-Z]{1,15}$/;
    if (target.value == "") {
        msg.innerHTML = "<p style='color: red'>Locality is required</p>";
        target.style = "border: red solid 1px";
        target.focus();
        return false;
    }
    else if (target.match(localityRegex)) {
        target.style = "border: green solid 1px";
        msg.innerHTML = "<p style='color: green'>Looks good</p>";
        return true;
    }
    else {
        target.style = "border: red solid 1px";
        msg.innerHTML = "<p style='color: red'>Only alphabets allowed</p>";
        target.focus();
        return false;
    }
}

export function validatePassword(target, msg) {
    if (target.value == "") {
        target.style = "border: red solid 1px";
        msg.innerHTML = "<p style='color: red'>Password is required</p>";
        target.focus();
        return false;
    }
    else if (target.value.length < 8) {
        target.style = "border: red solid 1px";
        msg.innerHTML = "<p style='color: red'>Insufficient length</p>";
        target.focus();
        return false;
    }
    else {
        target.style = "border: green solid 1px";
        msg.innerHTML = "<p style='color: green'>Looks good</p>";
        return true;
    }
}

export function validateConfirm(target, value, msg) {
    if (target.value == "") {
        msg.innerHTML = "<p style='color: red'>Confirmation is required</p>";
        target.style = "border: red solid 1px";
        target.focus();
        return false;
    }
    else if (target.value != value) {
        target.style = "border: red solid 1px";
        msg.innerHTML = "<p style='color: red'>Passwords don't match</p>";
        target.focus();
        return false;
    }
    else {
        target.style = "border: green solid 1px";
        msg.innerHTML = "<p style='color: green'>Looks good</p>";
        return true;
    }
}
