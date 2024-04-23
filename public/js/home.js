const cleaningPrice = Number($('#cleaningPrice').val())
const bookPrice = $("[data-book-price]");
const bookLink = $(".home-page__first-block__pay-btn");

const flatSizesJson = $("#flatSizesJson").val();
const bathroomSizesJson = $("#bathroomSizesJson").val();
const locationsJson = $('#locations').val()

const flatSizes = JSON.parse(flatSizesJson);
const bathroomSizes = JSON.parse(bathroomSizesJson);
const locations = JSON.parse(locationsJson)

let flatIndex = 0;
let bathroomIndex = 0;
let locationId = 0

const flat = $("[data-position-flat]");
const bathroom = $("[data-position-bathroom]");

const prevFlat = flat.find(
    ".home-page__first-block__book-positions__position__left"
);
const nextFlat = flat.find(
    ".home-page__first-block__book-positions__position__right"
);
const prevBathroom = bathroom.find(
    ".home-page__first-block__book-positions__position__left"
);
const nextBathroom = bathroom.find(
    ".home-page__first-block__book-positions__position__right"
);

prevFlat.on("click", function () {
    if (flatIndex !== 0) flatIndex -= 1;
    renderBook();
});
nextFlat.on("click", function () {
    if (flatIndex !== flat.length + 1) flatIndex += 1;
    renderBook();
});

prevBathroom.on("click", function () {
    if (bathroomIndex !== 0) bathroomIndex -= 1;
    renderBook();
});
nextBathroom.on("click", function () {
    if (bathroomIndex !== bathroom.length + 1) bathroomIndex += 1;
    renderBook();
});


const renderBook = () => {
    const selectedLocation = getCustomSelectedByKey('locations')
    const selectedLocationId = Number(selectedLocation.attr('data-value'))
    const locationPercent = locations.find(location => location.id === selectedLocationId).additional_price_percent

    flat.find(".home-page__first-block__book-positions__position-title").text(
        flatSizes[flatIndex].size
    );

    bathroom
        .find(".home-page__first-block__book-positions__position-title")
        .text(bathroomSizes[bathroomIndex].size);

    prevFlat.css("opacity", 1);
    nextFlat.css("opacity", 1);
    prevBathroom.css("opacity", 1);
    nextBathroom.css("opacity", 1);

    if (flatIndex === 0) prevFlat.css("opacity", 0.4);
    if (flatIndex === flat.length + 1) nextFlat.css("opacity", 0.4);
    if (bathroomIndex === 0) prevBathroom.css("opacity", 0.4);
    if (bathroomIndex === bathroom.length + 1) nextBathroom.css("opacity", 0.4);
    
    const flatPrice = Number(flatSizes[flatIndex].price);

    const bathroomPrice = Number(bathroomSizes[bathroomIndex].additional_price);
    let endPrice = cleaningPrice + cleaningPrice / 100 * locationPercent
    endPrice += flatPrice + bathroomPrice;
    bookPrice.text(`$${endPrice}`);

    const bathroomId = Number(bathroomSizes[bathroomIndex].id);
    const flatId = Number(flatSizes[flatIndex].id);
    const startHref = bookLink.attr("data-href");
    const endHref = `${startHref}?flat=${flatId}&bathroom=${bathroomId}&location=${selectedLocationId}`;
    bookLink.attr("href", endHref);
};

getHTMLSelectByKey('locations').on('change', renderBook)

renderBook();
