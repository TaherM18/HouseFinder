import sendAsyncRequest from "../../Helper/xhr.js";

export function load_account_wishlist(container) {
    sendAsyncRequest(
        "GET",
        "http://localhost/housefinder/Tenant/components/account-wishlist.php",
        ""
    )
        .then((res) => {
            content.innerHTML = res;
        })
        .catch((error) => {
            // Handle errors, such as 404 Not Found or others
            console.error("Error: " + error);
        });
}