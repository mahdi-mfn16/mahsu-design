<link href="views/verifypay/verify.css" rel="stylesheet">
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<meta name="robots" content="noindex, nofollow">


<div id="main" class="iranyekan">

    <div class="nav-buy iranyekan">
        <div class="progress-nav">
            <div class="order-icon">
                <span></span>
            </div>
            <div class="order-text">
                <p>عملیات خرید با موفقیت انجام شد!</p>
            </div>
        </div>

    </div>

    <?php
    $orderInfo = $data['orderInfo'];
    print_r($orderInfo);

    ?>

    <div class="cart-detail">
        <h3>مشخصات کامل سفارش</h3>
        <ul>
            <li>
                <label>نام</label>
                <p><?= $orderInfo['name'] ?></p>
            </li>
            <li>
                <label>نام خانوادگی</label>
                <p><?= $orderInfo['family'] ?></p>
            </li>
            <li>
                <label>شماره موبایل</label>
                <p><?= $orderInfo['mobile'] ?></p>
            </li>
            <li>
                <label>شهر</label>
                <p><?= $orderInfo['city'] ?></p>
            </li>
            <li>
                <label>آدرس</label>
                <p><?= $orderInfo['address'] ?></p>
            </li>
            <li>
                <label>مبلغ سفارش</label>
                <p><?= $orderInfo['basket_price'] ?> تومان</p>
            </li>
            <li>
                <label>هزینه ارسال</label>
                <p><?= $orderInfo['post_price'] ?> تومان</p>
            </li>
            <li>
                <label>مبلغ کل پرداخت شده</label>
                <p><?= $orderInfo['total_price'] ?> تومان</p>
            </li>
            <li>
                <label>شماره تراکنش</label>
                <p><?= $orderInfo['after_pay_code'] ?></p>
            </li>

        </ul>
        <table cellspacing="0">

            <tr class="row1">
                <td class="col1">تصویر</td>
                <td class="col2">کد محصول</td>
                <td class="col3">نام محصول</td>
                <td class="col4">رنگ</td>
                <td class="col5">تعداد</td>
                <td class="col6">مبلغ خرید</td>
            </tr>
            <?php

            foreach (unserialize($orderInfo['basket']) as $row2) {
                ?>
                <tr class="row2">
                    <td class="col1"><img src="public/images/products/<?= $row2['id'] ?>/<?= $row2['image'] ?>"></td>
                    <td class="col2"><?= $row2['code'] ?></td>
                    <td class="col3"><?= $row2['title'] ?></td>
                    <td class="col4"><?= $row2['colorTitle'] ?></td>
                    <td class="col5"><?= $row2['number_product'] ?></td>
                    <td class="col6"><?= $row2['price']*$row2['number_product'] ?> تومان</td>
                </tr>
                <?php
            }
            ?>

        </table>

    </div>
</div>

<script src="views/verifypay/verify.js"></script>