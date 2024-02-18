import sendAsyncRequest from "../../Helper/xhr.js";

// Elements =======================================================

const selSortBy = document.getElementById("selSortBy");
const container = document.getElementById("container");
const rangeSliderMin = document.querySelector(".range-slider-value-min");
const rangeSliderMax = document.querySelector(".range-slider-value-max");
const txtMinArea = document.getElementById("txtMinArea");
const txtMaxArea = document.getElementById("txtMaxArea");

let houses = [];

// Event Listeners =================================================

window.addEventListener("load", () => {
    console.log("request sent");

    // const container = document.getElementById("container");

    sendAsyncRequest(
        "GET",
        "http://localhost/housefinder/Tenant/api/all_houses.php",
        ""
    )
        .then((res) => {
            res = JSON.parse(res);
            houses = res.data;
            handleData(res.data, container);
        })
        .catch((error) => {
            alert(error);
        });
});

selSortBy.addEventListener("change", (e) => {
    console.log("sort by:", e.target.value);
    if (e.target.value == "created_at") {
        const sortedHouses = sortHousesByCreatedAt(houses, "desc");
        handleData(sortedHouses, container);
    } 
    else if (e.target.value == "price_low") {
        const sortedHouses = sortHousesByPrice(houses, "asc");
        handleData(sortedHouses, container);
    } 
    else if (e.target.value == "price_high") {
        const sortedHouses = sortHousesByPrice(houses, "desc");
        handleData(sortedHouses, container);
    }
});

rangeSliderMin.addEventListener("input", (e) => {
    // console.log(e.target.value);

    const minValue = rangeSliderMin.value;
    const maxValue = rangeSliderMax.value;
    const filteredHouses = filterHousesByPriceRange(houses, minValue, maxValue);
    handleData(filteredHouses, container);
});

rangeSliderMax.addEventListener("input", (e) => {
    // console.log(e.target.value);

    const minValue = rangeSliderMin.value;
    const maxValue = rangeSliderMax.value;
    const filteredHouses = filterHousesByPriceRange(houses, minValue, maxValue);
    handleData(filteredHouses, container);
});

txtMinArea.addEventListener("input", (e) => {
    const minValue = txtMinArea.value;
    const maxValue = txtMaxArea.value;
    const filteredHouses = filterHousesByPriceRange(houses, minValue, maxValue);
    handleData(filteredHouses, container);
});

txtMaxArea.addEventListener("input", (e) => {
    const minValue = txtMinArea.value;
    const maxValue = txtMaxArea.value;
    const filteredHouses = filterHousesByPriceRange(houses, minValue, maxValue);
    handleData(filteredHouses, container);
});


// Functions ==========================================================

function handleData(dataList, parentElement) {
    // remove all child elements of parent element
    parentElement.innerHTML = "";

    dataList.forEach((row) => {
        const address =
            row.address + ", " + row.city_name + ", " + row.state_name;
        const item = createItemComponent(
            row.house_id,
            row.house_name,
            row.area,
            address,
            row.rent,
            row.bedroom_count,
            row.bathroom_count,
            row.parking_count
        );
        parentElement.appendChild(item);
    });
}

function createItemComponent(
    house_id,
    house_name,
    area,
    address,
    rent,
    bedroom_count,
    bathroom_count,
    parking_count
) {
    // Create the parent div with classes
    const parentDiv = document.createElement("div");
    parentDiv.classList.add("col-sm-6", "col-xl-4");

    // Create the card div with classes
    const cardDiv = document.createElement("div");
    cardDiv.classList.add(
        "card",
        "shadow-sm",
        "card-hover",
        "border-0",
        "h-100"
    );

    // Create the tns-carousel-wrapper div with classes
    const carouselWrapperDiv = document.createElement("div");
    carouselWrapperDiv.classList.add(
        "tns-carousel-wrapper",
        "card-img-top",
        "card-img-hover"
    );

    // Create the anchor element with class and href
    const anchorElement = document.createElement("a");
    anchorElement.classList.add("img-overlay");
    anchorElement.href = `./single.php?i=${btoa(house_id)}`;

    // Create the content-overlay div with classes
    const contentOverlayDiv = document.createElement("div");
    contentOverlayDiv.classList.add(
        "content-overlay",
        "end-0",
        "top-0",
        "pt-3",
        "pe-3"
    );

    // Create the button and append to content-overlay div
    const buttonElement = document.createElement("button");
    buttonElement.classList.add(
        "btn",
        "btn-icon",
        "btn-light",
        "btn-xs",
        "text-primary",
        "rounded-circle"
    );
    buttonElement.setAttribute("type", "button");
    buttonElement.setAttribute("data-bs-toggle", "tooltip");
    buttonElement.setAttribute("data-bs-placement", "left");
    buttonElement.setAttribute("title", "Add to Wishlist");
    const heartIcon = document.createElement("i");
    heartIcon.classList.add("fi-heart");
    buttonElement.appendChild(heartIcon);
    contentOverlayDiv.appendChild(buttonElement);

    // Create the tns-carousel-inner div
    const carouselInnerDiv = document.createElement("div");
    carouselInnerDiv.classList.add("tns-carousel-inner");

    // Create the img elements and append to tns-carousel-inner div
    // for (let i = 0; i < 2; i++) {
    //     const img = createImage(`./img/real-estate/catalog/06.jpg`, "Image", 'card-img-top');
    //     carouselInnerDiv.appendChild(img);
    // }
    const img = createImage(
        `./img/real-estate/catalog/06.jpg`,
        "Image",
        "card-img-top"
    );

    // Append elements to their respective parent elements
    carouselWrapperDiv.appendChild(anchorElement);
    carouselWrapperDiv.appendChild(contentOverlayDiv);
    // carouselWrapperDiv.appendChild(carouselInnerDiv);
    carouselWrapperDiv.appendChild(img);

    // Create the card-body div with classes
    const cardBodyDiv = document.createElement("div");
    cardBodyDiv.classList.add("card-body", "position-relative", "pb-3");

    // Create elements for card-body and append them
    const heading4 = document.createElement("h4");
    heading4.classList.add(
        "mb-1",
        "fs-xs",
        "fw-normal",
        "text-uppercase",
        "text-primary"
    );
    heading4.textContent = "For rent";

    const heading3 = document.createElement("h3");
    heading3.classList.add("mb-2", "fs-base");
    const anchorLink = document.createElement("a");
    anchorLink.classList.add("nav-link", "stretched-link");
    anchorLink.href = `single.php?i=${btoa(house_id)}`;
    anchorLink.textContent = `${house_name} | ${area} sq.ft`;
    heading3.appendChild(anchorLink);

    const paragraph = document.createElement("p");
    paragraph.classList.add("mb-2", "fs-sm", "text-muted");
    paragraph.textContent = address;

    const boldDiv = document.createElement("div");
    boldDiv.classList.add("fw-bold");
    const cashIcon = document.createElement("i");
    cashIcon.classList.add(
        "fi-cash",
        "mt-n1",
        "me-2",
        "lead",
        "align-middle",
        "opacity-70"
    );
    const priceSpan = document.createElement("span");
    priceSpan.textContent = "$" + rent;
    boldDiv.appendChild(cashIcon);
    boldDiv.appendChild(priceSpan);

    heading3.appendChild(anchorLink);
    cardBodyDiv.appendChild(heading4);
    cardBodyDiv.appendChild(heading3);
    cardBodyDiv.appendChild(paragraph);
    cardBodyDiv.appendChild(boldDiv);

    // Create the card-footer div with classes
    const cardFooterDiv = document.createElement("div");
    cardFooterDiv.classList.add(
        "card-footer",
        "d-flex",
        "align-items-center",
        "justify-content-center",
        "mx-3",
        "pt-3",
        "text-nowrap"
    );

    // Create spans for card-footer and append them
    const spanBedroom = createDetailsSpan(bedroom_count, "fi-bed");
    const spanBathroom = createDetailsSpan(bathroom_count, "fi-bath");
    const spanParking = createDetailsSpan(parking_count, "fi-car");

    cardFooterDiv.appendChild(spanBedroom);
    cardFooterDiv.appendChild(spanBathroom);
    cardFooterDiv.appendChild(spanParking);

    // Append card-body and card-footer to card div
    cardDiv.appendChild(carouselWrapperDiv);
    cardDiv.appendChild(cardBodyDiv);
    cardDiv.appendChild(cardFooterDiv);

    // Append card div to the parent div
    parentDiv.appendChild(cardDiv);

    // return the element
    return parentDiv;
}

// Helper Functions ===================================================

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

// Function to create a badge
function createBadge(...classes) {
    const badge = document.createElement("span");
    badge.classList.add(...classes);
    return badge;
}

// Function to create an image
function createImage(src, alt, ...classes) {
    const img = document.createElement("img");
    img.src = src;
    img.alt = alt;
    img.classList.add(...classes);
    return img;
}

// Function to create a heading element
function createHeading(tag, text, ...classes) {
    const heading = document.createElement(tag);
    heading.textContent = text;
    heading.classList.add(...classes);
    return heading;
}

// Function to create an anchor link
function createAnchorLink(text, ...classes) {
    const anchorLink = document.createElement("a");
    anchorLink.textContent = text;
    anchorLink.classList.add(...classes);
    anchorLink.href = "single.php";
    return anchorLink;
}

// Function to create a paragraph element
function createParagraph(text, ...classes) {
    const paragraph = document.createElement("p");
    paragraph.textContent = text;
    paragraph.classList.add(...classes);
    return paragraph;
}

// Function to create a bold div with icons
function createBoldDiv(text, ...classes) {
    const boldDiv = document.createElement("div");
    boldDiv.textContent = text;
    boldDiv.classList.add(...classes);
    const icon = document.createElement("i");
    icon.classList.add(
        "fi-cash",
        "mt-n1",
        "me-2",
        "lead",
        "align-middle",
        "opacity-70"
    );
    // boldDiv.appendChild(icon);
    // boldDiv.appendChild(document.createTextNode("$1,650"));
    return boldDiv;
}

// Function to create a span element
function createSpan(...classes) {
    const span = document.createElement("span");
    span.classList.add(...classes);
    return span;
}

// Sorting Functions ===================================================

function sortHousesByCreatedAt(houses, order) {
    // Validate the order parameter
    if (order !== "asc" && order !== "desc") {
        throw new Error('Invalid sorting order. Use "asc" or "desc".');
    }

    // Sort the array based on the created_at key
    houses.sort((a, b) => {
        const dateA = new Date(a.created_at);
        const dateB = new Date(b.created_at);

        if (order === "asc") {
            return dateA - dateB;
        } else {
            return dateB - dateA;
        }
    });

    return houses;
}

function sortHousesByPrice(houses, order) {
    // Validate the order parameter
    if (order !== "asc" && order !== "desc") {
        throw new Error('Invalid sorting order. Use "asc" or "desc".');
    }

    // Sort the array based on the created_at key
    houses.sort((a, b) => {
        const priceA = parseFloat(a.rent);
        const priceB = parseFloat(b.rent);

        if (order === "asc") {
            return priceA - priceB;
        } else {
            return priceB - priceA;
        }
    });

    return houses;
}

// Filtering Functions ==============================================================

function filterHousesByPriceRange(houses, minPrice, maxPrice) {
    minPrice = parseInt(minPrice);
    maxPrice = parseInt(maxPrice);
    // Validate input
    if (typeof minPrice !== 'number' || typeof maxPrice !== 'number') {
      throw new Error('minPrice and maxPrice must be numbers.');
    }
  
    // Filter the array based on the rent range
    const filteredHouses = houses.filter((house) => {
      const rent = parseFloat(house.rent);
  
      return rent >= minPrice && rent <= maxPrice;
    });
  
    return filteredHouses;
}

function filterHousesByAreaRange(houses, minArea, maxArea) {
    minArea = parseFloat(minArea);
    maxArea = parseFloat(maxArea);

    // Validate input
    if (typeof minArea !== 'number' || typeof maxArea !== 'number') {
      throw new Error('minPrice and maxPrice must be numbers.');
    }
  
    // Filter the array based on the rent range
    const filteredHouses = houses.filter((house) => {
      const area = parseFloat(house.area);
  
      return area >= minArea && area <= maxArea;
    });
  
    return filteredHouses;
}