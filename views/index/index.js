
var slidertag = $('#slider-top');
var slideritems = slidertag.find('.items');
var itemnumber = 1;
var slidernumber = slideritems.length;
var navigationslider = slidertag.find('#navigation-slider li');

function slider() {
    if (itemnumber > slidernumber) {
        itemnumber = 1;
    }

    if (itemnumber < 1) {
        itemnumber = slidernumber;
    }

    slideritems.hide();
    slideritems.eq(itemnumber - 1).fadeIn(500);
    navigationslider.css('background-color', '#fff');
    navigationslider.eq(itemnumber - 1).css('background-color', '#000');
    itemnumber++;

}

function nexttoslide(index) {
    itemnumber = index + 1;
    slider();

}

slider();
var autoslide = setInterval(slider, 3000);

$('#slider-top .next').click(function () {
    clearInterval(autoslide);
    slider();
    autoslide = setInterval(slider, 3000);
});

$('#slider-top .prev').click(function () {
    itemnumber = itemnumber - 2;
    clearInterval(autoslide);
    slider();
    autoslide = setInterval(slider, 3000);
});

$('#slider-top #navigation-slider li').click(function () {
    var index = $(this).index();
    clearInterval(autoslide);
    nexttoslide(index);
    autoslide = setInterval(slider, 3000);


})






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
