import sendAsyncRequest from "../../Helper/xhr.js";

export function load_account_notifications(container) {
    sendAsyncRequest(
        "GET",
        "http://localhost/housefinder/Tenant/components/account-notifications.php",
        ""
    )
        .then((res) => {
            container.innerHTML = res;
        })
        .catch((error) => {
            // Handle errors, such as 404 Not Found or others
            console.error("Error: " + error);
        });
}