<!DOCTYPE html>
<html lang="en">
<head>
    <base href="http://127.0.0.1/mahsu/">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= @$data['title'] ?></title>
    <meta itemprop="name" content="مهسو">
    <meta property="og:title" content="<?= @$data['title'] ?>" />
    <meta property="og:description" content="<?= @$data['description'] ?>" />
    <meta property="og:type" content="document" />
    <meta property="og:url" content="<?= @$data['canonical'] ?>" />
    <meta property="og:image" content="<?= @$data['image'] ?>" />
    <meta property="og:site_name" content="مد و پوشاک مهسو" />
    <link href="<?= @$data['canonical'] ?>" rel="canonical" />
    <meta itemprop="description" name="description" content="<?= @$data['description'] ?>"/>
    <script src="public/js/jquery-3.5.1.min.js"></script>

</head>

<body style="margin: 0;background: rgba(0,0,0,0.01) ">

<style>
    @font-face {
        font-family: IRANYekan;
        src: url(public/fonts/IRANSansWeb_FaNum_UltraLight.ttf) format("truetype"),
        url(public/fonts/IRANSansWeb_FaNum_Light.eot) format("embedded-opentype");
    }

    span, p, div, a {
        direction: rtl;
    }

    a {
        text-decoration: none;
    }

    li {
        list-style: none
    }

    .iranyekan {
        font-family: IRANYekan;
        font-size: small;
        font-weight: bold;
    }

    #header {
        max-width: 1100px;
        height: 110px;
        background: #fff;
        margin: 0 auto;
        box-shadow: 0 0 3px #aaa;

    }

    #header-right {
        width: 30%;
        height: 65%;
        float: right;
    }

    #basket {
        width: 140px;
        height: 35px;
        border: 2px solid #000;
        border-radius: 4px;
        display: block;
        margin-top: 20px;
        margin-right: 8px;
        position: relative;
    }

    #basket span {
        background: url(public/images/shopping-bag.png) no-repeat center;
        display: block;
        float: right;
        width: 24px;
        height: 24px;
        padding: 5px 6px
    }

    #p-basket {
        margin: 0;
        line-height: 33px;
    }

    #num-basket {
        margin: 0;
        line-height: 30px;
        background-color: black;
        border-radius: 50%;
        width: 27px;
        height: 27px;
        position: absolute;
        top: 4px;
        right: 110px;
        color: #fff;
        text-align: center;
    }
    header a{
        color: #000;
    }

    #header-mid {
        width: 40%;
        height: 65%;
        float: right
    }

    #header-mid img {
        margin-left: auto;
        margin-right: auto;
        display: block;
        cursor: pointer;

    }

    #header-left {
        width: 30%;
        height: 70%;
        float: left;
    }

    #login{
        width: 140px;
        height: 35px;
        border: 2px solid #000;
        border-radius: 4px;
        display: block;
        margin-top: 20px;
        position: relative;
        left: 8px;
        float: left;


    }

    #header-left span {
        background: url(public/images/user.png) no-repeat center;
        display: block;
        float: right;
        width: 24px;
        height: 24px;
        padding: 5px 6px
    }

    #header-left p {
        margin: 0;
        line-height: 33px;

    }

    #header-bottom {
        width: 100%;
        height: 35%;
        float: right;
    }

    #header-bottom input {
        width: 100%;
        height: 100%;
        padding-right: 7px;
        border: 4px solid #bbb;
        border-radius: 4px;
        overflow: hidden;
        margin-left: auto;
        margin-right: auto;
        display: block;
        margin-top: -8px;

    }

    #header-bottom a {
        background: url(public/images/search-icon.png);
        background-size: cover;
        display: inline-block;
        width: 24px;
        height: 24px;
        position: absolute;
        top: 7px;
        left: -8px;
    }

    #search-box {
        width: 30%;
        height: 75%;
        margin-left: auto;
        margin-right: auto;
        display: block;
        position: relative;

    }
    #search-box form{
        width: 100%;
        height: 100%;
        margin-left: auto;
        margin-right: auto;
        display: block;
        margin-top: -8px;
    }

    #menu-bar-icon {
        display: none;
        width: 40px;
        height: 40px;
        float: right;
        border-radius: 50%;
        margin-top: 20px;
        margin-right: 10px;

    }

    .active-menu {
        background: #fff url(public/images/menu.png) center no-repeat;
        box-shadow: 0 0 5px rgba(0, 0, 0, 0.5);
    }

    .cancel-menu {
        background: #fff url(public/images/cancel.png) no-repeat center;
        box-shadow: 0 0 7px rgba(0, 0, 0, 0.7);
        transition: box-shadow 200ms;
    }

    @media screen and (max-width: 850px ) {


        #search-box {
            width: 40%;
        }
        #header-left  a > p {
            font-size: 9pt;

        }

        #p-basket {
            display: none;
        }

        #basket {
            width: 80px;
            padding-right: 63px;
            border: none;
            position: relative;
        }




        #num-basket {
            position: absolute;
            right: 58px;
            width: 15px;
            height: 15px;
            top: 0;
            line-height: 18px;
            background-color: #fff;
            border-radius: 50%;
            border: 1px solid #000;
            color: #000;
            box-shadow: 2px 2px 3px #eee;

        }

        #basket > a > span {

            float: left;
            width: 24px;
            height: 24px;
            padding: 5px 6px
        }

        #menu-bar-icon {
            display: block;
            float: right;
            position: relative;
            top: -120px;
            right: 0;
            z-index: 6;
        }

    }

    @media screen and (max-width: 668px ) {
        #search-box {
            width: 50%;
        }
        #login {
            width: 30px;
            padding-left: 8px;
            border: none;
            position: relative;
        }
        #header-left > a > p {
            display: none;

        }

        #header-left > a > span {

        }
        #basket {
            padding-right: 56px;
        }

        #num-basket {
            right: 51px;
        }


    }

    @media screen and (max-width: 550px ) {
        #search-box {
            width: 55%;
        }
    }

    @media screen and (max-width: 480px ) {
        #search-box {
            width: 58%;
        }

        #header-mid img {
            width: 190px;
            height: 63px;
            padding-top: 5px;

        }

        #basket {
            margin-top: 20px;
            margin-right: 3px;
        }
    }

    @media screen and (max-width: 450px ) {
        #search-box input {
            font-size: 8.5pt;
        }

    }

    @media screen and (max-width: 410px ) {
        #search-box {
            width: 65%;
        }

        #header-mid img {
            width: 170px;
            height: 56px;
            padding-top: 5px;

        }

        #menu-bar-icon {
            right: -5px;

        }

    }

    @media screen and (max-width: 375px ) {
        #search-box {
            width: 67%;
        }

        #header-mid img {
            width: 160px;
            height: 53px;
            padding-top: 6px;

        }


    }

    @media screen and (max-width: 345px ) {
        #search-box {
            width: 70%;
        }

        #header-mid img {
            width: 150px;
            height: 50px;
            padding-top: 8px;

        }

        #header-left > a > span {
            margin: 0 1px;
        }

        #basket {
            padding-right: 50px;
        }

        #num-basket {
            right: 45px;
        }

        #menu-bar-icon {
            width: 37px;
            height: 37px;
            margin-top: 23px;

        }

    }


</style>

<header>
    <?php
    $modelheader = new Model();
    $userId = Model::getSession('userId');
    $basket = $modelheader->getBasket()[0];
    $numberItem = sizeof($basket);
    $headerMenu = $modelheader->showMenu('header');

    ?>
    <div id="header">
        <div id="header-right" class="iranyekan">

            <a href="showcart" id="basket">
                <span></span>
                <p id="p-basket">سبد خرید</p>
                <p id="num-basket"><?= $numberItem ?></p>
            </a>

        </div>
        <div id="header-mid">
            <img onclick="window.location.href='index';" src="public/images/logo.PNG">
        </div>
        <div id="header-left" class="iranyekan">

            <a href="<?php if ($userId==false){echo 'login';}else{echo 'profile';} ?>" id="login">
                <span></span>
                <p id="p-login"><?php if ($userId==false){echo 'ورود/ثبت نام';}else{echo 'مشاهده پروفایل';} ?></p>
            </a>


        </div>

        <div id="header-bottom">
            <div id="search-box">
                <form id="seaching" method="get" action="category/index">
                <input name="keyword" class="iranyekan" type="text" placeholder="محصول مورد نظر خود را جستجو نمایید...">
                </form>
                <a onclick="searchKeyword();"></a>
            </div>
        </div>
        <script>
            function searchKeyword() {
                $('#seaching').submit();
                var searchInput = $('input[name=keyword]');
                searchInput.val('');

            }
        </script>

    </div>


    </div>

</header>
<div id="menu-bar-icon" class="active-menu"></div>
<style>

    nav {
        max-width: 1100px;
        height: 46px;
        margin: 0 auto;
        position: relative;
        z-index: 3;

    }

    #menu-top {
        max-width: 1100px;
        height: 46px;
        background: rgba(0, 0, 0, .65);
        border-radius: 4px;
        margin: 8px auto;

    }

    .level1menu-active {
        background-color: #fff;
        box-shadow: 0 0 5px #aaa;
        border-radius: 4px;
    }
    .level1menu-a-active {
        color: #000 !important;
    }

    #menu-top > ul {
        height: 100%;
        margin: 0;
        padding: 0
    }

    #menu-top > ul > li {
        float: right;
        height: 100%;
        width: 140px;

    }

    #menu-top > ul > li > a {
        display: block;
        height: 30px;
        text-align: center;
        font-size: 11pt;
        line-height: 30px;
        border-left: 1px solid #fff;
        margin-top: 8px;
        color: #fff;
        cursor: pointer;
    }


    .menu2 {
        width: 99.5%;
        height: 200px;
        background: #fff;
        margin-top: 10px;
        border-radius: 4px;
        box-shadow: 0 3px 10px #aaa;
        position: absolute;
        border: 3px solid #000;
        top: 38px;
        right: 0;
        display: none;
    }

    .menu2 > ul {
        margin-top: 15px;
        padding: 0
    }

    .menu2 > ul > li {
        padding: 10px 35px 0 0;
        height: 30px;
        width: 140px;
        margin-right: 5px;
    }

    .menu2 > ul > li > a {
        color: rgba(0,0,0,0.8);
        cursor: pointer;
    }



    .level2menu-active {
        background-color: rgba(0, 0, 0, .7);
        border-radius: 4px;
        box-shadow: 0 0 3px #eee;
    }
    .level2menu-a-active {
        color: #fff !important;

    }

    .menu2 img {
        width: 200px;
        height: 200px;
        position: absolute;
        top: 0;
        left: 0;

    }

    @media screen and (max-width: 1100px) {
        #menu-top {
            width: 98%;
        }

        .menu2 {
            width: 99%;
        }
    }

    @media screen and (max-width: 850px) {
        nav {
            height: 0;

        }

        #menu-top {
            display: none;
            width: 98%;
            height: 1100px;
            background: #fff;
            border-radius: 6px;
            box-shadow: 0 0 5px #aaa;
            margin: 8px auto;
            top: -110px;
            position: relative;
            z-index: 4;
        }

        #menu-top > ul {
            height: 100%;
            width: 100%;
            padding-top: 50px;
        }

        #menu-top > ul > li {

            height: 5%;
            width: 98%;
            border-radius: 6px;
            box-shadow: 0 0 5px #aaa;
            float: none;
            position: relative;

        }


        .level1menu-active {
            margin: 10px auto 220px auto !important;
            background-color: #000;
            box-shadow: none;
        }

        .level1menu-a-active {
            color: #fff !important;
        }

        .level1menu-deactive {
            margin: 10px auto;

        }

        #menu-top > ul > li > a {
            color: #000 ;
            display: block;
            height: 100%;
            text-align: center;
            font-size: 11pt;
            line-height: 52px;


        }

        .menu2 {
            width: 99%;
            height: 200px;
            background: #fff;
            margin-top: 10px;
            box-shadow: 0 0 10px #aaa;
            position: absolute;
            border: 3px solid #000;
            top: 50px;
            right: 0;
            z-index: 3;
        }

        .menu2 img {
            width: 130px;
            height: 130px;
            position: absolute;
            top: 50%;
            margin-top: -65px;
            left: 0;

        }

    }

    @media screen and (max-width: 345px ) {
        .menu2 img {
            width: 180px;
            height: 180px;
        }
    }


</style>
<nav>
    <div id="menu-top">
        <ul>
            <?php
            foreach ($headerMenu as $key=>$row) {
                ?>
                <li class="iranyekan level1menu-deactive" data-timernum="<?= $row[0]['priority'] ?>">
                    <a ><?= $row[0]['title'] ?></a>
                    <div class="menu2">
                        <ul>
                            <?php
                            for($i=1 ; $i < sizeof($row) ; $i++ ) {
                            ?>
                            <li><a href="<?= $row[$i]['link'] ?>"><?= $row[$i]['title'] ?></a></li>
                                <?php
                            }
                            ?>

                        </ul>
                        <img src="public/images/backpack1.jpg">

                    </div>
                </li>
                <?php
            }
            ?>

        </ul>

    </div>
</nav>

<script>
    var timer = {};

    if ($(window).width() > 850) {

        $('#menu-top > ul > li').hover(function () {
            var tag = $(this);
            var timerattr = tag.attr('data-timernum');
            clearTimeout(timer[timerattr]);
            timer[timerattr] = setTimeout(function () {
                tag.addClass('level1menu-active');
                $(' > a', tag).addClass('level1menu-a-active');
                $(' > div', tag).fadeIn(10);

            }, 200);

        }, function () {
            var tag = $(this);
            var timerattr = tag.attr('data-timernum');
            clearTimeout(timer[timerattr]);
            timer[timerattr] = setTimeout(function () {
                tag.removeClass('level1menu-active');
                $(' > a', tag).removeClass('level1menu-a-active');
                $(' > div', tag).fadeOut(10);
            }, 200);

        });
        $('.menu2 > ul > li').hover(function () {
            var tag = $(this);
            tag.addClass('level2menu-active');
            $(' > a', tag).addClass('level2menu-a-active');
        }, function () {
            var tag = $(this);
            tag.removeClass('level2menu-active');
            $(' > a', tag).removeClass('level2menu-a-active');
        });
    }


    if ($(window).width() < 850) {


        $('#menu-top > ul > li').click(function () {

            var tag = $(this);

            var havediv = $('div', tag).index();

            if (havediv == 1) {
                $(' > div', tag).fadeToggle(100);
                tag.toggleClass('level1menu-active');
                $(' > a', tag).toggleClass('level1menu-a-active');
            }

            if (havediv == -1) {
                tag.css('margin-bottom', '0 !important');
                tag.toggleClass('level1menu-active');
                $(' > a', tag).toggleClass('level1menu-a-active');

            }

        });


        $('.menu2 > ul > li').click(function () {
            var tag = $(this);
            tag.addClass('level2menu-active');
            $(' > a', tag).addClass('level2menu-a-active');
            $('#menu-top').fadeOut(1000);
            $('#menu-bar-icon').toggleClass('cancel-menu');
        });


    }


    $('#menu-bar-icon').click(function () {
        var tag = $(this);
        $('#menu-top > ul > li > div').fadeOut(0);
        $('#menu-top > ul > li').removeClass('level1menu-active');
        $('#menu-top > ul > li > a').removeClass('level1menu-a-active');
        $('.menu2 > ul > li').removeClass('level2menu-active');
        $('.menu2 > ul > li > a').removeClass('level2menu-a-active');
        $('#menu-top').fadeToggle(0);
        tag.toggleClass('cancel-menu');

    });
</script>