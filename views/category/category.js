priceSlides();
function priceSlides() {
    $(function () {
        $("#slider-range").slider({
            range: true,
            min: 0,
            max: 500000,
            values: [0, 500000],
            step: 50000,
            slide: function (event, ui) {
                $("#amount").val(ui.values[0] + "  تومان  تا  " + ui.values[1] + "  تومان");
            }
        });
        $("#amount").val($("#slider-range").slider("values", 0) + "  تومان  تا  " +
            $("#slider-range").slider("values", 1) + "  تومان");
    });
}

var filterdetails = $('.filter-container');
var filteroption = $('.filter-option');
var buttonfilter = $('.button-filter.add-filter');
var buttonCanclefilter = $('.button-filter.cancle-filter');

filteroption.click(function () {
    filterdetails.fadeToggle(100);

});
buttonfilter.click(function () {
    filterdetails.fadeOut(100);
    doFilter();
});

buttonCanclefilter.click(function () {
    filterdetails.fadeOut(100);
    cancleFilter();






});

function doFilter() {
    var data = $('#filter-form').serializeArray();
    reloadProducts(data);


}


function cancleFilter() {

    priceSlides();
    $("input:checkbox").each(function () {
        var checking = $(this).is(':checked');
        if (checking){
            $(this).prop('checked',false);
        }
    });
    $("#filter-form")[0].reset();
    var data = $('#filter-form').serializeArray();
    reloadProducts(data);




}

function reloadProducts(data){
    var slug = $('h1').attr('data-slug');

    var url = 'category/dofilter/'+slug;

    $.post(url,data,function (msg) {
        $('.products').empty();
        $.each(msg,function (index,value) {


            var productTag = '<div class="one-product"><div class="contain-product"><a href="product/index/'+value['id']+'"><div class="photo"><img src="public/images/products/'+value['id']+'/'+value['image']+'"></div><div class="pro-details"><label class="pro-title">'+value['title']+'</label><label class="pro-price">'+parseInt(value['price']).toLocaleString()+' تومان</label></div><button class="iranyekan">مشاهده محصول</button></a></div></div>';

            $('.products').append(productTag);

        })

        //for convert msg object into array for show length of msg always
        var msgArray = $.map(msg, function(value, index) {
            return [value];
        });

        $('.category-nav > p').text('('+ msgArray.length +' محصول)');

    },'json')

}