export default function sendAsyncRequest(method, url, data) {
    return new Promise((resolve, reject) => {
        const xhr = new XMLHttpRequest();

        xhr.open(method, url, true);

        method == "POST" && xhr.setRequestHeader(
            "Content-Type",
            "application/x-www-form-urlencoded"
        );

        xhr.onprogress = () => {};

        xhr.onload = () => {
            if (xhr.status === 200) {
                // Successful response, resolve the promise with the parsed JSON
                // const response = JSON.parse(xhr.responseText);

                // Successful response, resolve the promise with the response text
                resolve(xhr.responseText);
            } else {
                // Reject the promise with an error message
                reject( JSON.stringify({status: xhr.status, message: "error"}) );
            }
        };

        xhr.onerror = () => {
            // Reject the promise with a network error message
            reject( JSON.stringify({status: xhr.status, message: "Network error"}) );
        };

        xhr.send(data);
    });
}
