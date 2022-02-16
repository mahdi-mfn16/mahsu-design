


function removeItem(productid) {
    var url = 'showcart/deletebasket/' + productid;
    var data = {};
    $.post(url, data, function (msg) {

        refreshBasket(msg)

    }, 'json');

}


function updateBasket(itembasket, valuemain) {
    var url = 'showcart/updatebasket/' + itembasket + '/' + valuemain;
    var data = {};

    $.post(url, data, function (msg) {

        refreshBasket(msg)

    }, 'json');

}



function refreshBasket(msg) {

    $('.right-cart .item-cart').remove();
    // $('.container .left-cart').remove();
    var sumPrice = 0;
    var address= 'showaddress';
    var arg = 'value';
    $.each(msg, function (index, value) {
        var optionTag='';
        var i;
        var selected='';
        for (i = 1; i < 11; i++) {
            if (i==value['number_product']){
                selected='selected';
            }else {
                selected='';
            }
            optionTag = optionTag +'<option value="'+i+'" '+selected+' >'+i+'</option>';
        }


        var itemTag = '<div class="item-cart"><table cellspacing="0"><tr class="row1"><td rowspan="3" class="col0"><img src="public/images/products/' + value['id'] + '/'+ value['image'] +'"></td><td class="col1">کد محصول: ' + value['code'] + '</td><td class="col2">قیمت:</td><td class="col3">' + value['price'] + ' تومان</td><td rowspan="3" class="col4"><div class="remove"><span onclick="removeItem(' + value['basket_row'] + ')"></span></div></td></tr><tr class="row2"><td class="col1"><a>' + value['title'] + '</a></td><td class="col2">تعداد</td><td class="col3"><select onchange="updateBasket(' + value['basket_row'] + ',' + arg + ')">'+optionTag+'</select></td></tr><tr class="row3"><td class="col1"><span class="color" style="background: '+value['hex']+';"></span><p class="color-text">'+value['colorTitle']+'</p></td><td class="col2">پرداختی شما:</td><td class="col3">' + value['price'] * value['number_product'] + ' تومان</td></tr></table></div>';


        $('.right-cart').append(itemTag);
        sumPrice = sumPrice + (parseInt(value['price']) * parseInt(value['number_product']));


    });
    var price_total_text = sumPrice+' تومان';
    $('.container .left-cart .totalprice').text(price_total_text);

    // var priceTag =   '<div class="left-cart"><span>مبلغ کل پرداختی شما:</span><span class="totalprice">'+sumPrice+' تومان</span><div class="line"></div><p>* هزینه بیمه و عوارض ، بسته بندی و ارسال نیز ممکن است به مبلغ کل پرداختی شما اضافه شود.</p><button class="iranyekan" onclick="window.location.href='+address+'">ثبت سبد و تکمیل سفارش</button></div>'
    //
    // $('.container').append(priceTag);

}