<link href="views/showaddress/showaddress.css" rel="stylesheet">
<script src="public/js/iranaddressjs1.js"></script>
<meta name="robots" content="noindex, nofollow">
<?php
$address = $data['address'];
?>

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
                    <span class="circle ready"></span></div>
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
                <p class="active">تایید سبد خرید</p>
            </li>
            <li>
                <p class="active">ورود به حساب کاربری</p>
            </li>
            <li>
                <p class="ready">ثبت اطلاعات ارسال</p>
            </li>
            <li>
                <p>ثبت نهایی و پرداخت</p>
            </li>
        </ul>
    </div>

</div>

<div id="main" class="iranyekan">
    <h1>تکمیل اطلاعات دریافت کننده سفارش</h1>
    <div class="container">

        <div class="right">
            <div class="right-cart">
                <div class="old-address">
                    <?php
                    foreach ($address as $key=>$row) {
                        if ($key==sizeof($address)-1) {
                            $active = 'active';
                        }else{
                            $active = '';
                        }
                        ?>
                        <div data-addressId="<?= $row['id'] ?>" class="address-item <?= $active ?> ">
                            <div class="item-select">
                                <span></span>
                            </div>
                            <div class="detail-address">
                                <table>
                                    <tr class="row1">
                                        <td class="label">نام:</td>
                                        <td class="value"><?= $row['first_name'] ?></td>
                                        <td class="label">نام خانوادگی:</td>
                                        <td class="value"><?= $row['family'] ?></td>
                                        <td class="label">شماره تماس:</td>
                                        <td class="value"><?= $row['mobile'] ?></td>
                                    </tr>
                                    <tr class="row2">
                                        <td class="label">کد پستی:</td>
                                        <td class="value"><?= $row['postal_code'] ?></td>
                                        <td class="label">استان:</td>
                                        <td class="value"><?= $row['province'] ?></td>
                                        <td class="label">شهر:</td>
                                        <td class="value"><?= $row['city'] ?></td>
                                    </tr>
                                    <tr class="row3">
                                        <td class="label">آدرس پستی:</td>
                                        <td class="value" colspan="5"><?= $row['address'] ?></td>
                                    </tr>
                                </table>
                            </div>
                            <div onclick="removeoneaddress(this)" class="action remove">
                                <span></span>
                            </div>
                            <div onclick="editoneaddress(this)" class="action edit">
                                <span></span>
                            </div>
                        </div>
                        <?php
                    }
                    ?>

                </div>
                <button class="iranyekan black-btn">افزودن اطلاعات ارسال +</button>
                <div class="newaddress">
                    <div>
                        <form method="post" id="add-address">
                        <div>

                            <label>نام*</label>
                            <input name="name" type="text" placeholder="مهدی">
                            <label>شماره موبایل دریافت کننده*</label>
                            <input name="mobile" type="tel" placeholder="09301235678">
                            <label>انتخاب استان*</label>
                            <select name="province" class="province">
<!--                                https://7learn.com/stack-topic/topic-%D9%84%DB%8C%D8%B3%D8%AA-%D8%A7%D8%B3%D8%AA%D8%A7%D9%86-%D9%87%D8%A7-%D9%88-%D8%B4%D9%87%D8%B1%D9%87%D8%A7%DB%8C-->

                            </select>

                        </div>
                        <div>
                            <label>نام خانوادگی*</label>
                            <input name="family" type="text" placeholder="فیروزی">
                            <label>کد پستی*</label>
                            <input name="postal_code" type="text" placeholder="4416748739">
                            <label>انتخاب شهر*</label>
                            <select name="city" class="city">
<!--                                https://7learn.com/stack-topic/topic-%D9%84%DB%8C%D8%B3%D8%AA-%D8%A7%D8%B3%D8%AA%D8%A7%D9%86-%D9%87%D8%A7-%D9%88-%D8%B4%D9%87%D8%B1%D9%87%D8%A7%DB%8C-->
                            </select>

                        </div>
                        <label class="address">آدرس پستی*</label>
                        <textarea name="address"></textarea>
                        <button class="iranyekan black-btn" onclick="addAddress()">ثبت آدرس</button>
                        </form>
                    </div>
                </div>



            </div>
        </div>

        <div class="left-cart">
            <p>انتخاب نحوه ارسال</p>

            <?php
            $postType = $data['postType'];
            foreach ($postType as $key=>$row){
                if ($key==sizeof($postType)-1) {
                    $active = 'active';
                }else{
                    $active = '';
                }
            ?>
            <div data-postType="<?= $row['id'] ?>" class="options <?= $active ?>">
                <div class="right">
                    <span></span>
                </div>
                <div class="left">
                    <p class="title"><?= $row['title'] ?></p>
                    <p><?= $row['description'] ?></p>
                    <p class="title"><?= $row['price'] ?> تومان</p>
                </div>

            </div>
            <?php
            }
            ?>

            <button onclick="window.location.href='showfinal'" class="iranyekan black-btn">ثبت و نهایی کردن خرید</button>
            <button onclick="window.location.href='showcart'" class="iranyekan prev-step">بازگشت به سبد خرید</button>
        </div>
    </div>


</div>

<div class="dark-window"></div>
<div class="pop-up-edit-address">
    <div class="newaddress">

        <div>
            <form method="post" id="edit-address">
            <div>
                <label>نام*</label>
                <input name="name2" type="text" placeholder="مهدی">
                <label>شماره موبایل دریافت کننده*</label>
                <input name="mobile2" type="tel" placeholder="09301235678">
                <label>انتخاب استان*</label>
                <select class="province" name="province2">

                </select>

            </div>
            <div>
                <label>نام خانوادگی*</label>
                <input name="family2" type="text" placeholder="فیروزی">
                <label>کد پستی*</label>
                <input name="postal_code2" type="text" placeholder="4416748739">
                <label>انتخاب شهر*</label>
                <select class="city" name="city2">

                </select>

            </div>
            <label class="address">آدرس پستی*</label>
            <textarea name="address2"></textarea>
            <button class="iranyekan black-btn">ثبت آدرس</button>
            </form>
        </div>

        <span></span>
    </div>
</div>
<div class="pop-up-remove-address iranyekan">
    <p>آیا مایل به پاک کردن این آدرس هستید؟</p>
    <span class="yes" style="background-color: rgba(0,0,91,0.8)">بله</span>
    <span class="no" style="background-color: #c30419">خیر</span>
</div>

<script src="views/showaddress/showaddress.js"></script>