const getHTMLSelectByKey = (key) => {
    return $(`[data-html-select][data-key="${key}"]`);
};

const getCustomSelectByKey = (key) => {
    return $(`[data-custom-select][data-key="${key}"]`);
};

const getCustomSelectedByKey = (key) => {
    const value = getHTMLSelectByKey(key).val()
    const selected = getCustomSelectByKey(key).find(`.gr-select__options-option[data-value="${value}"]`)
    return selected
}

const renderSelect = (key) => {
    const html = getHTMLSelectByKey(key);
    const custom = getCustomSelectByKey(key);

    const value = html.val();
    const name = html.find(`option[value="${value}"]`).text();

    const customSelected = custom.find(".gr-select__selected");
    customSelected.text(name);
};

$(".gr-select__selected").on("click", function () {
    $(this).parent().toggleClass("gr-select-opened");
});

$(".gr-select__options-option").on("click", function () {
    const key = $(this).attr("data-key");
    const value = $(this).attr("data-value");
    const htmlSelect = getHTMLSelectByKey(key);
    const customSelect = getCustomSelectByKey(key);
    htmlSelect.val(value);
    htmlSelect.trigger("change");
    renderSelect(key);
    customSelect.removeClass("gr-select-opened");
});

$("body").on("click", function (e) {
    const target = $(e.target);
    if (
        !(
            target.hasClass("gr-select") ||
            target.hasClass("gr-select__selected") ||
            target.hasClass("gr-select__options") ||
            target.hasClass("gr-select__options-option")
        )
    ) {
			$('.gr-select').removeClass('gr-select-opened')
    }
});

const selects = $('.gr-select')

for(select of selects){
	renderSelect($(select).attr('data-key'))
}