<link href="views/showfinal/showfinal.css" rel="stylesheet">
<meta name="robots" content="noindex, nofollow">
<div class="nav-buy iranyekan">
    <div class="progress-nav">
        <ul>
            <li>
                <span class="line"></span>
                <div class="contain-circle">
                    <span class="circle active"></span></div>
                <span class="line"></span>
            </li>
            <li>
                <span class="line"></span>
                <div class="contain-circle">
                    <span class="circle active"></span></div>
                <span class="line"></span>
            </li>
            <li>
                <span class="line"></span>
                <div class="contain-circle">
                    <span class="circle active"></span></div>
                <span class="line"></span>
            </li>
            <li>
                <span class="line"></span><div class="contain-circle">
                    <span class="circle ready"></span></div>
                <span class="line"></span>
            </li>

        </ul>
        <ul>
            <li>
                <p class="active">تایید سبد خرید</p>
            </li>
            <li>
                <p class="active">ورود به حساب کاربری</p>
            </li>
            <li>
                <p class="active">ثبت اطلاعات ارسال</p>
            </li>
            <li>
                <p class="ready">ثبت نهایی و پرداخت</p>
            </li>
        </ul>
    </div>

</div>

<div id="main" class="iranyekan">
    <h1>بررسی نهایی سفارش</h1>
    <form action="showfinal/saveorder" method="post" id="order-form">
    <div class="container">
        <div class="right">
            <div class="right-cart">
                <h2>سبد خرید شما</h2>
                <?php
                $basket = $data['basket'][0];
                $basketPriceTotal = $data['basket'][1];

                foreach ($basket as $row){
                ?>

                <div class="item-cart">
                    <!--<div class="item-image">-->
                    <!--<img src="public/images/44.jpg">-->
                    <!--</div>-->
                    <!--<div class="detail-cart">-->
                    <table>
                        <tr class="row1">
                            <td rowspan="3" class="col0"><img src="public/images/products/<?= $row['id']?>/<?= $row['image']?>"></td>
                            <td class="col1">کد محصول: <?= $row['code'] ?></td>
                            <td class="col2">قیمت:</td>
                            <td class="col3"><?= $row['price'] ?> تومان</td>
                        </tr>
                        <tr class="row2">
                            <td class="col1"><a><?= $row['title'] ?></a></td>
                            <td class="col2">تعداد</td>
                            <td class="col3"><?= $row['number_product'] ?></td>
                        </tr>
                        <tr class="row3">
                            <td class="col1"><span class="color" style="background: <?= $row['hex'] ?>;"></span><p class="color-text"><?= $row['colorTitle'] ?></p></td>
                            <td class="col2">پرداختی شما:</td>
                            <td class="col3"><?= $row['price']*$row['number_product'] ?> تومان</td>
                        </tr>
                    </table>
                    <!--</div>-->

                </div>

                <?php
                }
                ?>



            </div>
            <div class="right-cart send-box">
                <h2>اطلاعات ارسال</h2>
                <p> این سفارش به <a><?= $data['addressInfo']['first_name'] ?></a> <a><?= $data['addressInfo']['family'] ?></a> به آدرس <a><?= $data['addressInfo']['city'] ?></a> <a><?= $data['addressInfo']['address'] ?></a> و شماره تماس <a><?= $data['addressInfo']['mobile'] ?></a> تحویل می‌گردد</p>
            </div>
            <div class="right-cart pay">
                <h2>انتخاب شیوه پرداخت</h2>
                <?php
                $paymentType = $data['paymentType'];
                foreach ($paymentType as $key=>$row){
                    if ($key==0) {
                        $active = 'active';
                        $checked = 'checked';
                    }else{
                        $active = '';
                        $checked = '';
                    }
                ?>
                <div data-payType="<?= $row['id'] ?>" class="pay-options <?= $active ?>">
                    <div class="right-pay-options" >
                        <span></span>
                    </div>
                    <input style="display: none" type="radio" name="pay-type" value="<?= $row['id'] ?>" <?= $checked ?>>
                    <div class="left-pay-options">
                        <span style="background: url(public/images/<?= $row['logo'] ?>) no-repeat center"></span>
                        <p class="title"><?= $row['title'] ?></p>
                        <p><?= $row['description'] ?></p>
                    </div>

                </div>
                <?php
                }
                ?>

            </div>

        </div>
        <style>



        </style>
        <div class="iranyekan left-cart">
            <span>مبلغ کل خرید:</span>
            <span class="totalprice"><?= $basketPriceTotal ?> تومان</span>
            <div class="line"></div>
            <span>هزینه بسته بندی و ارسال:</span>
            <span class="totalprice"><?= $data['postInfo']['price'] ?> تومان</span>
            <div class="line"></div>
            <span>مبلغ کل پرداختی شما:</span>
            <span class="totalprice"><?= $data['postInfo']['price']+$basketPriceTotal ?> تومان</span>
            <div class="line"></div>
            <textarea class="iranyekan" placeholder="اگر توضیحاتی درباره سفارش دارید در این قسمت بنویسید"></textarea>
            <div>
                <button onclick="submitOrder()" class="iranyekan black-btn">پرداخت و تکمیل خرید</button>
                <button onclick="window.location.href='showaddress'" class="iranyekan prev-step">بازگشت به مرحله قبل</button>
            </div>
        </div>
    </div>
    </form>


</div>

<script src="views/showfinal/showfinal.js"></script>