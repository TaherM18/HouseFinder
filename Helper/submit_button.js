export function setLoadingButton(btnSubmit) {
    btnSubmit.disabled = true;
    btnSubmit.querySelector("#spinner").classList.remove("visually-hidden");
    btnSubmit.querySelector("#status").textContent = "Loading...";
}

export function setTextButton(btnSubmit, textContent) {
    btnSubmit.disabled = false;
    btnSubmit.querySelector("#spinner").classList.add("visually-hidden");
    btnSubmit.querySelector("#status").textContent = textContent;
}