export function showToast(liveToast, className, message) {
    // reset
    resetToast(liveToast);
    // set
    setToast(liveToast, className, message);
    // show
    const toastBootstrap = bootstrap.Toast.getOrCreateInstance(liveToast);
    toastBootstrap.show();
}

export function setToast(liveToast, className, message) {
    liveToast.classList.add(className);
    const toastBody = liveToast.querySelector(".toast-body");
    toastBody.textContent = message;
}

export function resetToast(liveToast) {
    liveToast.classList.remove("text-bg-primary");
    liveToast.classList.remove("text-bg-success");
    liveToast.classList.remove("text-bg-danger");
    const toastBody = liveToast.querySelector(".toast-body");
    toastBody.textContent = "";
}