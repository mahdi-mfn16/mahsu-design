var payoptions =$('.right-cart.pay .pay-options');
var payoptionselect = $('.right-cart.pay .pay-options .right-pay-options span');



payoptionselect.click(function () {
    payoptions.removeClass('active');
    $(this).parents('.pay-options').toggleClass('active');
    $(this).parents('.pay-options').find('input[name=pay-type]').attr('checked','checked');

});




function submitOrder(){
    $('#order-form').submit();
}