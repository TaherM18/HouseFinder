export function resetAlert(target) {
    target.classList.remove("alert-success");
    target.classList.remove("alert-danger");
    target.textContent = "";
    target.classList.add("visually-hidden");
}

export function showAlert(target, className, message) {
    target.classList.add(className);
    target.textContent = message;
    target.classList.remove("visually-hidden");
}