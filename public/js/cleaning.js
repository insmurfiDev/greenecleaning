const airpickerDate = new AirDatepicker(".when_come", {
    minDate: new Date(),
});

$("[data-paypal-pay]").hide();

const cleaningTypeSelect = getHTMLSelectByKey("cleaningType");
const flatSizeSelect = getHTMLSelectByKey("flatSize");
const bathroomSizeTypeSelect = getHTMLSelectByKey("bathroomSizes");
const locationSelect = getHTMLSelectByKey("locations");
let cardNumber = "";
let payNow = true;
let extras = [];

let cleaningTypePercent = 0;
let flatSizePrice = 0;
let bathroomSizePrice = 0;
const cleaningPrice = Number($("#cleaningPrice").val());
const cleaningTax = Number($("#cleaningTax").val());

const getSummaryValueJQ = () => {
    return $("[data-summary-value]");
};

const getSummaryTaxJQ = () => {
    return $("[data-summary-tax]");
};

const getSummaryTotalJQ = () => {
    return $("[data-summary-total]");
};

const getCleaningTypeAdditionalPercent = () => {
    const percent = getCustomSelectedByKey("cleaningType").attr(
        "data-additional-price-percent"
    );
    return percent;
};

const getFlatSizePrice = () => {
    const price = getCustomSelectedByKey("flatSize").attr("data-price");
    return price;
};

const getBathroomSizePrice = () => {
    const price = getCustomSelectedByKey("bathroomSizes").attr(
        "data-additional-price"
    );
    return price;
};

const getLocationPrice = () => {
    const value = Number(locationSelect.val());
    const option = getCustomSelectByKey("locations").find(
        `.gr-select__options-option[data-value="${value}"]`
    );
    return option.attr("data-additional-price-percent");
};

const renderCleaning = () => {

    $('#flatTypeSelected .page-checkout__summary-positions__position-info').text(getCustomSelectedByKey('flatSize').text())
    $('#bathroomTypeSelected .page-checkout__summary-positions__position-info').text(getCustomSelectedByKey('bathroomSizes').text())
    $('#cleaningTypeSelected .page-checkout__summary-positions__position-info').text(getCustomSelectedByKey('cleaningType').text())

    const locationPricePercent = getLocationPrice();
    cleaningTypePercent = Number(getCleaningTypeAdditionalPercent());
    flatSizePrice = Number(getFlatSizePrice());
    bathroomSizePrice = Number(getBathroomSizePrice());
    let endPrice = cleaningPrice;
    endPrice += (endPrice / 100) * locationPricePercent;
    endPrice += (endPrice / 100) * cleaningTypePercent;
    endPrice += flatSizePrice;
    endPrice += bathroomSizePrice;

    for (let extra of extras) {
        endPrice += Number(extra.price);
    }

    taxPrice = (endPrice / 100) * cleaningTax;

    $("#extrasList .page-checkout__summary-positions__position-info").text(
        extras.map((ext) => ext.title).join(", ")
    );

    getSummaryTaxJQ().text(taxPrice);
    getSummaryValueJQ().text(endPrice);
    getSummaryTotalJQ().text(`$${endPrice + taxPrice}`);

    $('[name="time_window_id"]').val(getHTMLSelectByKey("timeWindows").val());
    $('[name="location_id"]').val(getHTMLSelectByKey("locations").val());
    $('[name="flat_size_id"]').val(getHTMLSelectByKey("flatSize").val());
    $('[name="bathroom_size_id"]').val(
        getHTMLSelectByKey("bathroomSizes").val()
    );
    $('[name="cleaning_type_id"]').val(
        getHTMLSelectByKey("cleaningType").val()
    );
    $('[name="extras"]').val(JSON.stringify(extras));
};

$("[data-extra]").on("click", function () {
    const id = $(this).attr("data-id");
    const price = $(this).attr("data-price");
    const title = $(this)
        .find(".page-checkout__form-extras__item-title")
        .text();
    if (extras.some((ext) => ext.id === id)) {
        extras = extras.filter((ext) => ext.id !== id);
        $(this).removeClass("page-checkout__form-extras__item-selected");
    } else {
        extras = [...extras, { id, price, title }];
        $(this).addClass("page-checkout__form-extras__item-selected");
    }
    renderCleaning();
});

cleaningTypeSelect.on("change", renderCleaning);
flatSizeSelect.on("change", renderCleaning);
bathroomSizeTypeSelect.on("change", renderCleaning);
locationSelect.on("change", renderCleaning);

renderCleaning();

$("[data-select-card-pay]").on("click", function () {
    $(this).addClass("page-checkout__form-payment-types__type-selected");
    $("[data-select-paypal-pay]").removeClass(
        "page-checkout__form-payment-types__type-selected"
    );
    $('#paymentType').val('card')
    $("[data-card-pay]").show("fast");
    $("[data-paypal-pay]").hide("fast");
});
$("[data-select-paypal-pay]").on("click", function () {
    $(this).addClass("page-checkout__form-payment-types__type-selected");
    $("[data-select-card-pay]").removeClass(
        "page-checkout__form-payment-types__type-selected"
    );
    $('#paymentType').val('paypal')
    $("[data-card-pay]").hide("fast");
    $("[data-paypal-pay]").show("fast");
});

$('[name="payment"]').on("change", function (e) {
    const value = $(this).val();
    payNow = value === "pay_now";
    if (payNow) {
        $("[data-pay-now]").show("fast");
    } else {
        $("[data-pay-now]").hide("fast");
    }
});

$("form").on("submit", function (e) {

    cc_input = $('input[name="card_number"]');
    cc_input.val(cc_input.data("ccNumber"));

    if ($("#nav-card").hasClass("active")) {
        $("#inputCheckoutType").val("card");
    } else {
        $("#inputCheckoutType").val("pp");
    } //inputCheckoutType
});
