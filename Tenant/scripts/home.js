import sendAsyncRequest from "../../Helper/xhr.js";

// Event Listeners

window.addEventListener("load", () => {
    // console.log("request sent");

    // const parentContainer = document.getElementById("parentContainer");

    // sendAsyncRequest(
    //     "GET",
    //     "http://localhost/housefinder/Tenant/api/house_carousal.php",
    //     ""
    // )
    //     .then((res) => {
    //         console.log(res);

    //         handleData(res.data, parentContainer);
    //     })
    //     .catch((error) => {
    //         alert(error);
    //     });
});

// Functions
function handleData(houseDataList, parentElement) {
    // remove all child elements of parent element
    parentElement.innerHTML = "";

    // Create the parent div with id, class, and data-carousel-options attributes
    const parentDiv = document.createElement('div');
    parentDiv.id = ''; // Add your desired id here
    parentDiv.classList.add('tns-carousel-inner', 'row', 'gx-4', 'mx-0', 'pt-3', 'pb-4');
    parentDiv.setAttribute('data-carousel-options', '{"items": 4, "responsive": {"0":{"items":1},"500":{"items":2},"768":{"items":3},"992":{"items":4}}}');


    houseDataList.forEach((row) => {
        let address = row["address"] + row["city_name"] + row["state_name"];
        const item = createItemComponent(row["house_name"], row["category_name"], row["area"], address, row["rent"], row["bedroom_count"], row["bathroom_count"], row["parking_count"])
        parentDiv.appendChild(item);
    });

    parentElement.appendChild(parentDiv);
}



function createItemComponent(houseName, houseCategory, area, address, price, bedroomCount, bathroomCount, parkingCount) {

    // Create the main container div with class "col"
    var colDiv = document.createElement("div");
    colDiv.classList.add("col");

    // Create the card div with classes "card", "shadow-sm", "card-hover", and "border-0"
    var cardDiv = document.createElement("div");
    cardDiv.classList.add(
        "card",
        "shadow-sm",
        "card-hover",
        "border-0",
        "h-100"
    );

    // Create the card-img-top div with classes "card-img-top", "card-img-hover"
    var cardImgTopDiv = document.createElement("div");
    cardImgTopDiv.classList.add("card-img-top", "card-img-hover");

    // Create the img element with src, alt attributes
    var imgElement = document.createElement("img");
    imgElement.src = "img/real-estate/catalog/05.jpg";
    imgElement.alt = "Image";

    // Append the img element to card-img-top div
    cardImgTopDiv.appendChild(imgElement);

    // Create the a element with class "img-overlay" and href attribute
    var aElement = document.createElement("a");
    aElement.classList.add("img-overlay");
    aElement.href = "single-v1.html";

    // Append the a element to card-img-top div
    cardImgTopDiv.appendChild(aElement);

    // Create the position-absolute div with classes "position-absolute", "start-0", "top-0", "pt-3", "ps-3"
    var positionAbsoluteDiv = document.createElement("div");
    positionAbsoluteDiv.classList.add(
        "position-absolute",
        "start-0",
        "top-0",
        "pt-3",
        "ps-3"
    );

    // Create the badge element with classes "d-table", "badge", "bg-success", "mb-1" and text content
    var badgeElement = document.createElement("span");
    badgeElement.classList.add("d-table", "badge", "bg-success", "mb-1");
    badgeElement.textContent = "Verified";

    // Append the badge element to position-absolute div
    positionAbsoluteDiv.appendChild(badgeElement);

    // Append the position-absolute div to card-img-top div
    cardImgTopDiv.appendChild(positionAbsoluteDiv);

    // Create the content-overlay div with classes "content-overlay", "end-0", "top-0", "pt-3", "pe-3"
    var contentOverlayDiv = document.createElement("div");
    contentOverlayDiv.classList.add(
        "content-overlay",
        "end-0",
        "top-0",
        "pt-3",
        "pe-3"
    );

    // Create the button element with classes "btn", "btn-icon", "btn-light", "btn-xs", "text-primary", "rounded-circle" and type attribute
    var buttonElement = document.createElement("button");
    buttonElement.classList.add(
        "btn",
        "btn-icon",
        "btn-light",
        "btn-xs",
        "text-primary",
        "rounded-circle"
    );
    buttonElement.type = "button";
    buttonElement.dataset.bsToggle = "tooltip";
    buttonElement.dataset.bsPlacement = "left";
    buttonElement.title = "Add to Wishlist";

    // Create the heart icon element with class "fi-heart"
    var heartIcon = document.createElement("i");
    heartIcon.classList.add("fi-heart");

    // Append the heart icon element to button element
    buttonElement.appendChild(heartIcon);

    // Append the button element to content-overlay div
    contentOverlayDiv.appendChild(buttonElement);

    // Append the content-overlay div to card-img-top div
    cardImgTopDiv.appendChild(contentOverlayDiv);

    // Append the card-img-top div to card div
    cardDiv.appendChild(cardImgTopDiv);

    // ... (Continue creating and appending the rest of the elements)
    // Create the card-body div with classes "card-body", "position-relative", "pb-3"
    var cardBodyDiv = document.createElement("div");
    cardBodyDiv.classList.add("card-body", "position-relative", "pb-3");

    // Create the h4 element with classes "mb-1", "fs-xs", "fw-normal", "text-uppercase", "text-primary" and text content
    var h4Element = document.createElement("h4");
    h4Element.classList.add(
        "mb-1",
        "fs-xs",
        "fw-normal",
        "text-uppercase",
        "text-primary"
    );
    h4Element.textContent = "For sale";

    // Append the h4 element to card-body div
    cardBodyDiv.appendChild(h4Element);

    // Create the h3 element with classes "h6", "mb-2", "fs-base"
    var h3Element = document.createElement("h3");
    h3Element.classList.add("h6", "mb-2", "fs-base");

    // Create the a element with classes "nav-link", "stretched-link" and href attribute
    var aElementInsideH3 = document.createElement("a");
    aElementInsideH3.classList.add("nav-link", "stretched-link");
    aElementInsideH3.href = "single-v1.html";
    aElementInsideH3.textContent = houseCategory + " | " + area + " sq.ft";

    // Append the a element to h3 element
    h3Element.appendChild(aElementInsideH3);

    // Append the h3 element to card-body div
    cardBodyDiv.appendChild(h3Element);

    // Create the p element with classes "mb-2", "fs-sm", "text-muted" and text content
    var pElement = document.createElement("p");
    pElement.classList.add("mb-2", "fs-sm", "text-muted");
    pElement.textContent = address;

    // Append the p element to card-body div
    cardBodyDiv.appendChild(pElement);

    // Create the div element with class "fw-bold"
    var divElementInsideCardBody = document.createElement("div");
    divElementInsideCardBody.classList.add("fw-bold");

    // Create the i element with classes "fi-cash", "mt-n1", "me-2", "lead", "align-middle", "opacity-70"
    var iElement = document.createElement("i");
    iElement.classList.add(
        "fi-cash",
        "mt-n1",
        "me-2",
        "lead",
        "align-middle",
        "opacity-70"
    );

    // Append the i element to div element
    divElementInsideCardBody.appendChild(iElement);

    // Create the text node with the content "$184,000"
    var priceTextNode = document.createTextNode(price);

    // Append the text node to div element
    divElementInsideCardBody.appendChild(priceTextNode);

    // Append the div element to card-body div
    cardBodyDiv.appendChild(divElementInsideCardBody);

    // Append the card-body div to card div
    cardDiv.appendChild(cardBodyDiv);

    // Create the card-footer div with classes "card-footer", "d-flex", "align-items-center", "justify-content-center", "mx-3", "pt-3", "text-nowrap"
    var cardFooterDiv = document.createElement("div");
    cardFooterDiv.classList.add(
        "card-footer",
        "d-flex",
        "align-items-center",
        "justify-content-center",
        "mx-3",
        "pt-3",
        "text-nowrap"
    );

    // Create and append the span elements with classes for bedroom, bathroom, and parking details
    var spanBedroom = createDetailsSpan(bedroomCount, "fi-bed");
    var spanBathroom = createDetailsSpan(bathroomCount, "fi-bath");
    var spanParking = createDetailsSpan(parkingCount, "fi-car");

    // Append the span elements to card-footer div
    cardFooterDiv.appendChild(spanBedroom);
    cardFooterDiv.appendChild(spanBathroom);
    cardFooterDiv.appendChild(spanParking);

    // Append the card-footer div to card div
    cardDiv.appendChild(cardFooterDiv);

    // Append the card div to the main container div
    colDiv.appendChild(cardDiv);

    // return the element
    return colDiv;
}


// Helper function to create details span element
function createDetailsSpan(textContent, iconClass) {
    var spanElement = document.createElement("span");
    spanElement.classList.add("d-inline-block", "mx-1", "px-2", "fs-sm");
    spanElement.textContent = textContent;

    var iconElement = document.createElement("i");
    iconElement.classList.add(
        iconClass,
        "ms-1",
        "mt-n1",
        "fs-lg",
        "text-muted"
    );

    spanElement.appendChild(iconElement);
    return spanElement;
}
