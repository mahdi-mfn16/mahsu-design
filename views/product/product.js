
var productimagesul = $('.images .product-images');
var imageitem = productimagesul.find('li');
var imageitemnumber = imageitem.length;
var image = imageitem.find('img');
var navimages = $('.navigation-img');
var navitem = navimages.find('li');
var itemnumber = 1;
slider();

function slider() {
    if (itemnumber > imageitemnumber){
        itemnumber =1;
    }
    if (itemnumber < 1){
        itemnumber =imageitemnumber;
    }
    imageitem.fadeOut(0);
    navitem.css('background','#fff');
    imageitem.eq(itemnumber - 1).fadeIn(50);
    navitem.eq(itemnumber - 1).css('background','rgba(0,0,0,0.8)');
    itemnumber++;
}

$('.next-img').click(function () {
    slider();
});
$('.prev-img').click(function () {
    itemnumber =itemnumber-2;
    slider();
});

navitem.click(function () {
    var index = $(this).index();
    itemnumber = index+1;
    slider()

})

$('.long').click(function () {
    $(this).css('display','none');
    $('.short').css('display','block');
    $('.pro-description > p').css('height','auto');
})
$('.short').click(function () {
    $(this).css('display','none');
    $('.long').css('display','block');
    $('.pro-description > p').css('height','150px');
})

var tabitem = $('.product-tab ul li');
var contenttab = $('.contain-content');
var contentitem = contenttab.find('.tab-box');

showtab(0);

function showtab(index) {
    contentitem.hide();
    tabitem.removeClass('activetab');
    contentitem.eq(index).show();
    tabitem.eq(index).addClass('activetab');

}
tabitem.click(function () {
    var index = $(this).index();
    showtab(index);
});


function carausel(direction,spantag) {
    var carauselcontent =spantag.parents('.slider-content');
    // var carauselcontent = $('.slider-content');
    var carauselcontentul = carauselcontent.find('ul');
    var carauselitems = carauselcontentul.find('li');
    var nexticon = carauselcontent.find('.next');
    var previcon = carauselcontent.find('.prev');
    var marginrightnew;
    var marginrightold = parseFloat(carauselcontentul.css('margin-right'));
    var itemeswidth = parseFloat(carauselitems.css('width'));



    if (direction == 'next') {
        marginrightnew = marginrightold - itemeswidth;
    }
    if (direction == 'prev') {
        marginrightnew = marginrightold + itemeswidth;

    }

    carauselcontentul.animate({marginRight: marginrightnew}, '500');
    if(movenumber[caruaselnum] == maxmovenumber[caruaselnum]) {
        nexticon.animate({opacity: '0.3'}, '700');
    }
    if(movenumber[caruaselnum] != maxmovenumber[caruaselnum]) {
        nexticon.animate({opacity: '1'}, '700');
    }
    if(movenumber[caruaselnum] == 1) {
        previcon.animate({opacity: '0.3'}, '700');
    }
    if(movenumber[caruaselnum] != 1) {
        previcon.animate({opacity: '1'}, '700');
    }



}
var movenumber = {};
var maxmovenumber = {};
var caruaselnum;
movenumber[1]=1;
movenumber[2]=1;
maxmovenumber[1] = $('#men-slider').find('li').length-2;
maxmovenumber[2] = $('#wemen-slider').find('li').length-2;
// alert(movenumber[2])
function nextslidecaruasel(tag) {
    var spantag =$(tag);
    caruaselnum = spantag.parents('div').attr('caruasel-number');

    if (movenumber[caruaselnum] < maxmovenumber[caruaselnum]) {

        movenumber[caruaselnum]++;
        carausel('next',spantag);
    }
}


function prevslidecaruasel(tag) {
    var spantag =$(tag);
    caruaselnum = spantag.parents('div').attr('caruasel-number');
    if (movenumber[caruaselnum] > 1) {
        movenumber[caruaselnum]--;
        carausel('prev',spantag);
    }
}


function selectColor(tag) {
    $('.color-item').removeClass('active');
    $(tag).toggleClass('active');
}
