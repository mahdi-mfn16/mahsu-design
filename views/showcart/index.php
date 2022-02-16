<link href="views/showcart/showcart.css" rel="stylesheet">
<meta name="robots" content="noindex, nofollow">
<?php
$basket = $data['basket'];

?>

<div class="nav-buy iranyekan">
    <div class="progress-nav">
        <ul>
            <li>
                <span class="line"></span>
                <div class="contain-circle">
                    <span class="circle ready"></span>
                </div>
                <span class="line"></span>
            </li>
            <li>
                <span class="line"></span>
                <div class="contain-circle">
                    <span class="circle"></span>
                </div>
                <span class="line"></span>
            </li>
            <li>
                <span class="line"></span>
                <div class="contain-circle">
                    <span class="circle"></span>
                </div>
                <span class="line"></span>
            </li>
            <li>
                <span class="line"></span>
                <div class="contain-circle">
                    <span class="circle"></span>
                </div>
                <span class="line"></span>
            </li>

        </ul>
        <ul>
            <li>
                <p class="ready">تایید سبد خرید</p>
            </li>
            <li>
                <p>ورود به حساب کاربری</p>
            </li>
            <li>
                <p>ثبت اطلاعات ارسال</p>
            </li>
            <li>
                <p>ثبت نهایی و پرداخت</p>
            </li>
        </ul>
    </div>

</div>

<div id="main" class="iranyekan">
    <h1>سبد خرید شما</h1>
    <div class="container">
        <div class="right">
            <div class="right-cart">
                <?php
                $sum_price = 0;
                foreach ($basket as $row){
                ?>


                <div class="item-cart">
                    <table cellspacing="0">
                        <tr class="row1">
                            <td rowspan="3" class="col0"><img src="public/images/products/<?= $row['id']?>/<?= $row['image']?>"></td>
                            <td class="col1">کد محصول: <?= $row['code']?></td>
                            <td class="col2">قیمت:</td>
                            <td class="col3"><?= number_format($row['price'])?> تومان</td>
                            <td rowspan="3" class="col4">
                                <div class="remove">
                                    <span onclick="removeItem(<?= $row['basket_row']?>)"></span>
                                </div>
                            </td>
                        </tr>
                        <tr class="row2">
                            <td class="col1"><a><?= $row['title']?></a></td>
                            <td class="col2">تعداد</td>
                            <td class="col3"><select onchange="updateBasket(<?= $row['basket_row']?>,value)">
                                    <?php
                                    $selected='';
                                    for ($i=1;$i<11;$i++) {
                                        if($i==$row['number_product']){
                                            $selected='selected';
                                        }else{
                                            $selected='';
                                        }
                                        ?>
                                        <option value="<?= $i ?>" <?= $selected?> ><?= $i ?></option>
                                        <?php
                                    }
                                    ?>
                                </select></td>
                        </tr>
                        <tr class="row3">
                            <td class="col1"><span class="color" style="background: <?= $row['hex'] ?>;"></span><p class="color-text"><?= $row['colorTitle'] ?></p></td>
                            <td class="col2">پرداختی شما:</td>
                            <td class="col3"><?= number_format($row['price']*$row['number_product']) ?> تومان</td>
                        </tr>
                    </table>
                </div>

                <?php
                    $sum_price= $sum_price + $row['price']*$row['number_product'];

                }
                ?>
            </div>
        </div>

        <div class="left-cart">
            <span>مبلغ کل پرداختی شما:</span>
            <span class="totalprice"><?= number_format($sum_price) ?> تومان</span>
            <div class="line"></div>
            <p>* هزینه بیمه و عوارض ، بسته بندی و ارسال نیز ممکن است به مبلغ کل پرداختی شما اضافه شود.</p>
            <button class="iranyekan" onclick="window.location.href='showlogin';">ثبت سبد و تکمیل سفارش</button>
        </div>
    </div>

</div>

<script src="views/showcart/showcart.js"></script>