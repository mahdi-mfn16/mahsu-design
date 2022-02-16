<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>پنل مدیریت</title>
    <base href="http://127.0.0.1/mahsu/">
    <script src="public/js/jquery-3.5.1.min.js"></script>
    <meta name="robots" content="noindex, nofollow">
</head>
<body style="margin: 0;background: rgba(0,0,0,0.002)">

<style>
    @font-face {
        font-family: IRANYekan;
        src: url(public/fonts/IRANSansWeb_FaNum_UltraLight.ttf) format("truetype"),
        url(public/fonts/IRANSansWeb_FaNum_Light.eot) format("embedded-opentype");
    }
    h1{
        font-size: 10pt;
        text-align: center;
        margin-bottom: 25px;
        color: #fff;
    }

    span, p, div, a {
        direction: rtl;
    }

    a {
        text-decoration: none;
        cursor: pointer;
    }

    li {
        list-style: none
    }

    .iranyekan {
        font-family: IRANYekan;
        font-size: small;
        font-weight: bold;
    }

    #main{
        float: right;
        width: 100%;
        /*height: 100%;*/
        background: rgba(0,0,0,0.6);

    }
    .sidebar{
        float: right;
        width: 18.2%;
        /*height: 100%;*/
        height: 600px;
        background: #6a9a6c;
        box-shadow: -1px 0 2px #aaa;
        color: #fff;
    }

    .content{
        float: left;
        width: 81.7%;
        height: 600px;
        background: #e2ffe9;
        overflow-y: auto;


    }
    .sidebar ul{
        width: 100%;
        height: 100%;
        margin: 0;
        padding: 0;
    }
    .sidebar li{
        width: 100%;
        height: 50px;
        padding: 0;
        margin: 0;
        border-bottom: 1px solid #000;
    }
    .sidebar li a{
        width: 90%;
        height: 100%;
        display: block;
        margin-right: 10%;
        line-height: 50px;
        color: #fff;
    }


</style>

<div id="main" class="iranyekan">
    <h1>پنل مدیریت سایت مهسو</h1>
    <div class="sidebar">
        <ul>
            <li>
                <a>داشبورد</a>
            </li>
            <li>
                <a href="admincategory/index">مدیریت دسته ها</a>
            </li>
            <li>
                <a href="adminproduct/index">مدیریت محصولات</a>
            </li>
            <li>
                <a href="adminattr/index">مدیریت ویژگی ها</a>
            </li>
            <li>
                <a href="admincolor/index">مدیریت رنگ ها</a>
            </li>
            <li>
                <a href="adminmaterial/index">مدیریت جنس ها</a>
            </li>
            <li>
                <a href="admincomment/index">مدیریت نظرات</a>
            </li>
            <li>
                <a href="admincontent/index">مدیریت محتوا</a>
            </li>
            <li>
                <a href="adminusers/index">مدیریت کاربران</a>
            </li>
            <li>
                <a href="adminorders/index">مدیریت سفارشات</a>
            </li>
            <li>
                <a href="adminmenu/index">مدیریت منو ها</a>
            </li>
            <li>
                <a href="adminslider/index">مدیریت اسلایدر ها</a>
            </li>



        </ul>

    </div>
