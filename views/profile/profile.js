var tabitem = $('.profile-tab > ul li');
var contenttab = $('.contain-content');
var contentitem = $('.tab-details');
var tabaddress = $('#main').attr('data-addresstab');
if (tabaddress==''){
    showtab(1);
}else if (tabaddress=='order') {
    showtab(2);
}else {
    showtab(3);
}

var editprofileitem = $('.tab-details ul li .edit-text');
var verifyprofileitem = $('.tab-details ul li .verify-text');
function editProfileItem(tag) {
    var tagbtn = $(tag);
    var txtitem = tagbtn.parent('li').find('input').val();
    var nameitem = tagbtn.parent('li').find('input').attr('name');

    var url= 'profile/editprofileitem';
    var data={'text':txtitem,'name':nameitem};

    $.post(url,data,function (msg) {
        if (nameitem!='password'){
            tagbtn.parent('li').find('p').text(tagbtn.parent('li').find('input').val());
        }else {
            tagbtn.parent('li').find('p').text('********');
        }


    });
    tagbtn.parents('.tab-details ul li').find('input').hide();
    verifyprofileitem.hide();
    tagbtn.parents('.tab-details ul li').find('p').show();
    editprofileitem.show();
}




editprofileitem.click(function () {
    $(this).parents('.tab-details ul li').find('p').hide();
    editprofileitem.hide();
    $(this).parents('.tab-details ul li').find('input').show();
    $(this).parents('.tab-details ul li').find('.verify-text').show();

})









function showtab(index) {
    contentitem.hide();
    tabitem.removeClass('activetab');
    contentitem.eq(index - 1).show();
    tabitem.eq(index).addClass('activetab');

}

tabitem.click(function () {
    var index = $(this).index();
    if (index > 0) {
        showtab(index);
    }
});


var addaddress = $('.tab-details > .black-btn');
var newaddress = $('.tab-details .newaddress');
var confirmaddress = $('.tab-details .newaddress .black-btn');
var removeaddress = $('.tab-details .old-address .address-item .remove');
var editaddress = $('.tab-details .old-address .address-item .remove.edit');
var darkwindow = $('.dark-window');
var editaddresspopup = $('.pop-up-edit-address');
var removeaddresspopup = $('.pop-up-remove-address');
var yesremoveaddress = $('.pop-up-remove-address .yes');
var noremoveaddress = $('.pop-up-remove-address .no');


addaddress.click(function () {
    newaddress.slideDown(100);
    addaddress.fadeOut(0);
});
confirmaddress.click(function () {
    newaddress.slideUp(100);
    addaddress.fadeIn(100);
});







var detailcartbtn = $('.tab-details .cart .item-cart .cart-detail-btn');
var abstractcartbtn = $('.tab-details .cart .item-cart .cart-abstract-btn');
detailcartbtn.click(function () {
    $(this).hide();
    $(this).parents('.tab-details .cart .item-cart').find('.cart-detail').slideDown(100);
    $(this).parents('.tab-details .cart .item-cart').find('.cart-abstract-btn').show();

})
abstractcartbtn.click(function () {
    $(this).hide();
    $(this).parents('.tab-details .cart .item-cart').find('.cart-detail').slideUp(100);
    $(this).parents('.tab-details .cart .item-cart').find('.cart-detail-btn').show();

});


function editoneaddress(tag) {
    thistag = $(tag);
    var addressId = thistag.parent('.address-item').attr('data-addressId');
    darkwindow.fadeIn(100);
    editaddresspopup.fadeIn(100);
    viewEditAddress(addressId);

    editaddresspopup.find('button').click(function () {
        darkwindow.fadeOut(100);
        editaddresspopup.fadeOut(100);
        editAddress(addressId);


    });

    editaddresspopup.find('span').click(function () {
        darkwindow.fadeOut(100);
        editaddresspopup.fadeOut(100);
    });

};

function viewEditAddress(addressId) {


    var url = 'profile/viewaddress/' + addressId;
    var data = {};
    $.post(url, data, function (msg) {
        $('input[name=name2]').val(msg['first_name']);
        $('input[name=family2]').val(msg['family']);
        $('input[name=mobile2]').val(msg['mobile']);
        $('input[name=postal_code2]').val(msg['postal_code']);
        $('textarea[name=address2]').val(msg['address']);

        $('.pop-up-edit-address .province option').each(function () {
            var txt = $(this).text();
            if (txt == msg['province']) {

                $('select[name=province2]').val(msg['province']);



                loadprovince();
                $(".pop-up-edit-address .province").closest('.pop-up-edit-address').find('.city').addClass("temp09120217432class");
                loadCity(msg['province']);
                $(".pop-up-edit-address .province").change(function () {
                    $(this).closest('.pop-up-edit-address').find('.city').addClass("temp09120217432class");
                    loadCity($(this).val());
                });

            }


        })

    }, 'json');

}

function editAddress(addressId) {


    var url = 'profile/editaddress/' + addressId;
    var data = $('#edit-address').serializeArray();

    $.post(url, data, function (msg) {

        // reloadAddress(msg);
        // window.location = 'profile/index';



    });




}




function removeoneaddress(tag) {
    thistag = $(tag);
    var addressId = thistag.parent('.address-item').attr('data-addressId');
    darkwindow.fadeIn(100);
    removeaddresspopup.fadeIn(100);
    yesremoveaddress.click(function () {
        darkwindow.fadeOut(100);
        removeaddresspopup.fadeOut(100);
        deleteaddress(addressId);
    });
    noremoveaddress.click(function () {
        darkwindow.fadeOut(100);
        removeaddresspopup.fadeOut(100);
    });

}

function deleteaddress(addressId) {
    var url = 'profile/deleteaddress/' + addressId;
    var data = {};
    $.post(url, data, function (msg) {

        reloadAddress(msg)

    }, 'json');

}


function addAddress() {
    var url = 'profile/addaddress/';
    var data = $('#add-address').serializeArray();

    $.post(url, data, function (msg) {

        reloadAddress(msg)

    }, 'json');

}


function reloadAddress(msg) {
    $('.old-address .address-item').remove();
    $.each(msg, function (index, value) {

        var divAddressTag = '<div data-addressId="' + value['id'] + '" class="address-item"><div class="detail-address"><table><tr class="row1"><td class="label">نام:</td><td class="value">' + value['first_name'] + '</td><td class="label">نام خانوادگی:</td><td class="value">' + value['family'] + '</td><td class="label">شماره تماس:</td><td class="value">' + value['mobile'] + '</td></tr><tr class="row2"><td class="label">کد پستی:</td><td class="value">' + value['postal_code'] + '</td><td class="label">استان:</td><td class="value">' + value['province'] + '</td><td class="label">شهر:</td><td class="value">' + value['city'] + '</td></tr><tr class="row3"><td class="label">آدرس پستی:</td><td class="value" colspan="5">' + value['address'] + '</td></tr></table></div><div onclick="removeoneaddress(this)" class="action remove"><span></span></div><div onclick="editoneaddress(this)" class="action edit"><span></span></div></div>';
        $('.old-address').append(divAddressTag);

    })

}