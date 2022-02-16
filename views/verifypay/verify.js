$(function () {
    $("#slider-range").slider({
        range: true,
        min: 0,
        max: 500000,
        values: [150000, 350000],
        step: 50000,
        slide: function (event, ui) {
            $("#amount").val(ui.values[0] + "  تومان  تا  " + ui.values[1] + "  تومان");
        }
    });
    $("#amount").val($("#slider-range").slider("values", 0) + "  تومان  تا  " +
        $("#slider-range").slider("values", 1) + "  تومان");
});

var filterdetails = $('.filter-container');
var filteroption = $('.filter-option');
var buttonfilter = $('.button-filter');

filteroption.click(function () {
    filterdetails.fadeToggle(100);
});
buttonfilter.click(function () {
    filterdetails.fadeOut(100);
})