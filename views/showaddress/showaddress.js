var addaddress = $('.right-cart > .black-btn');
var newaddress = $('.right-cart .newaddress');
var confirmaddress = $('.right-cart .newaddress .black-btn');
var removeaddress = $('.right-cart .old-address .address-item .action.remove');
var editaddress = $('.right-cart .old-address .address-item .action.edit');
var addressitem = $('.right-cart .old-address .address-item');
var addressitemselect = $('.right-cart .old-address .address-item .item-select span');
var sendoptions = $('.left-cart .options');
var sendoptionselect = $('.left-cart .options .right span');
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
setAddressSession();
setPostTypeSession();
addressitemselect.click(function () {
    addressitem.removeClass('active');
    $(this).parents('.address-item').toggleClass('active');
    setAddressSession();

});
sendoptionselect.click(function () {
    sendoptions.removeClass('active');
    $(this).parents('.options').toggleClass('active');
    setPostTypeSession();

});

function setAddressSession(){
    var addressId = $('.address-item.active').attr('data-addressid');
    var url = 'showaddress/setaddresssession/'+addressId;
    var data = {};
    $.post(url,data,function (msg) {

    })
}


function setPostTypeSession(){

    var postTypesId = $('.left-cart .options.active').attr('data-postType');
    var url = 'showaddress/setposttypesession/'+postTypesId;
    var data = {};
    $.post(url,data,function (msg) {

    })
}


function addAddress() {
    var url = 'showaddress/addaddress/';
    var data = $('#add-address').serializeArray();

    $.post(url, data, function (msg) {

        reloadAddress(msg)

    }, 'json');

}


function deleteaddress(addressId) {
    var url = 'showaddress/deleteaddress/' + addressId;
    var data = {};
    $.post(url, data, function (msg) {

        reloadAddress(msg)

    }, 'json');

}


function viewEditAddress(addressId) {


    var url = 'showaddress/viewaddress/' + addressId;
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


    var url2 = 'showaddress/editaddress/' + addressId;
    var data2 = $('#edit-address').serializeArray();

    $.post(url2, data2, function (msg) {

        // reloadAddress(msg);

    },'json');
    window.location = 'showaddress';


}



function reloadAddress(msg) {
    $('.old-address .address-item').remove();
    $.each(msg, function (index, value) {
        if (index == msg.length - 1) {
            var active = 'active';
        } else {
            var active = '';
        }

        var divAddressTag = '<div data-addressId="' + value['id'] + '" class="address-item ' + active + '"><div class="item-select"><span></span></div><div class="detail-address"><table><tr class="row1"><td class="label">نام:</td><td class="value">' + value['first_name'] + '</td><td class="label">نام خانوادگی:</td><td class="value">' + value['family'] + '</td><td class="label">شماره تماس:</td><td class="value">' + value['mobile'] + '</td></tr><tr class="row2"><td class="label">کد پستی:</td><td class="value">' + value['postal_code'] + '</td><td class="label">استان:</td><td class="value">' + value['province'] + '</td><td class="label">شهر:</td><td class="value">' + value['city'] + '</td></tr><tr class="row3"><td class="label">آدرس پستی:</td><td class="value" colspan="5">' + value['address'] + '</td></tr></table></div><div onclick="removeoneaddress(this)" class="action remove"><span></span></div><div onclick="editoneaddress(this)" class="action edit"><span></span></div></div>';
        $('.old-address').append(divAddressTag);

    })

}