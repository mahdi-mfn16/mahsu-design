<link href="views/profile/profile.css" rel="stylesheet">
<script src="public/js/iranaddressjs1.js"></script>
<meta name="robots" content="noindex, nofollow">

<?php
$userInfo = $data['userInfo'];
?>

<div data-addresstab="<?= $data['x'] ?>" id="main" class="iranyekan">
    <div class="main-content">
        <div class="profile-tab">
            <ul>
                <li>
                    <div class="profile-logo">
                        <span></span>
                    </div>
                    <div class="profile-name">
                        <p><?= $userInfo['first_name'] ?> <?= $userInfo['family'] ?></p>
                        <p><?= $userInfo['mobile'] ?></p>
                    </div>
                    <div class="profile-logout" onclick="window.location.href='profile/logout';">
                        <span></span>
                        <a>خروج</a>
                    </div>
                </li>
                <li id="tab-1">اطلاعات من</li>
                <li id="tab-2">سفارش های من</li>
                <li id="tab-t">نشانی های من</li>
            </ul>
            <div class="contain-content">
                <div id="tab-one" class="tab-details">
                    <ul>
                        <li>
                            <label>نام</label>
                            <p><?= $userInfo['first_name'] ?></p>
                            <button class="edit-text iranyekan">ویرایش</button>
                            <input name="first_name" class="iranyekan" type="text" value="<?= $userInfo['first_name'] ?>">
                            <button class="verify-text iranyekan" onclick="editProfileItem(this)">ثبت</button>
                        </li>
                        <li>
                            <label>نام خانوادگی</label>
                            <p><?= $userInfo['family'] ?></p>
                            <button class="edit-text iranyekan">ویرایش</button>
                            <input name="family" class="iranyekan" type="text" value="<?= $userInfo['family'] ?>">
                            <button class="verify-text iranyekan" onclick="editProfileItem(this)">ثبت</button>
                        </li>
                        <li>
                            <label>کد ملی</label>
                            <p><?= $userInfo['national_code'] ?></p>
                            <button class="edit-text iranyekan">ویرایش</button>
                            <input name="national_code" class="iranyekan" type="text" value="<?= $userInfo['national_code'] ?>">
                            <button class="verify-text iranyekan" onclick="editProfileItem(this)">ثبت</button>
                        </li>
                        <li>
                            <label>تاریخ تولد</label>
                            <p><?= $userInfo['birthday'] ?></p>
                            <button class="edit-text iranyekan">ویرایش</button>
                            <input name="birthday" class="iranyekan" type="text" value="<?= $userInfo['birthday'] ?>">
                            <button class="verify-text iranyekan" onclick="editProfileItem(this)">ثبت</button>
                        </li>
                        <li>
                            <label>شماره موبایل</label>
                            <p><?= $userInfo['mobile'] ?></p>
                            <button class="edit-text iranyekan">ویرایش</button>
                            <input name="mobile" class="iranyekan" type="text" value="<?= $userInfo['mobile'] ?>">
                            <button class="verify-text iranyekan" onclick="editProfileItem(this)">ثبت</button>
                        </li>
                        <li>
                            <label>ایمیل</label>
                            <p><?= $userInfo['email'] ?></p>
                            <button class="edit-text iranyekan">ویرایش</button>
                            <input name="email" class="iranyekan" type="text" value="<?= $userInfo['email'] ?>" >
                            <button class="verify-text iranyekan" onclick="editProfileItem(this)">ثبت</button>
                        </li>
                        <li>
                            <label>رمز عبور</label>
                            <p>********</p>
                            <button class="edit-text iranyekan">ویرایش</button>
                            <input name="password" class="iranyekan" type="text" value="<?= $userInfo['password'] ?>">
                            <button class="verify-text iranyekan" onclick="editProfileItem(this)">ثبت</button>
                        </li>

                    </ul>

                    <script>


                    </script>
                </div>



                <div id="tab-two" class="tab-details">
                    <div class="cart">
                        <?php
                       $userOrder = $data['userOrder'];
                        foreach ($userOrder as $row){
                        ?>
                        <div class="item-cart">
                            <table cellspacing="0">
                                <tr class="row1">
                                    <td class="col1">کد سفارش</td>
                                    <td class="col2">تاریخ سفارش</td>
                                    <td class="col3">اقلام</td>
                                    <td class="col4">مبلغ کل</td>
                                    <td class="col5">وضعیت</td>
                                    <td class="col6">شرح</td>
                                </tr>
                                <tr class="row2">
                                    <td class="col1">MS-123456</td>
                                    <td class="col2"><?= $row['date_order'] ?></td>
                                    <td class="col3"><?= $row['itemNumber'] ?></td>
                                    <td class="col4"><?= $row['total_price'] ?> تومان</td>
                                    <td class="col5"><?= $row['status'] ?></td>
                                    <td class="col6">
                                        <button class="cart-detail-btn iranyekan">جزییات سفارش</button>
                                        <button class="cart-abstract-btn iranyekan">بستن جزییات</button>
                                    </td>
                                </tr>
                            </table>
                            <div class="cart-detail">
                                <h3>مشخصات کامل سفارش</h3>
                                <ul>
                                    <li>
                                        <label>نام</label>
                                        <p><?= $row['name'] ?></p>
                                    </li>
                                    <li>
                                        <label>نام خانوادگی</label>
                                        <p><?= $row['family'] ?></p>
                                    </li>
                                    <li>
                                        <label>شماره موبایل</label>
                                        <p><?= $row['mobile'] ?></p>
                                    </li>
                                    <li>
                                        <label>شهر</label>
                                        <p><?= $row['city'] ?></p>
                                    </li>
                                    <li>
                                        <label>آدرس</label>
                                        <p><?= $row['address'] ?></p>
                                    </li>
                                    <li>
                                        <label>مبلغ سفارش</label>
                                        <p><?= $row['basket_price'] ?> تومان</p>
                                    </li>
                                    <li>
                                        <label>هزینه ارسال</label>
                                        <p><?= $row['post_price'] ?> تومان</p>
                                    </li>
                                    <li>
                                        <label>مبلغ کل پرداخت شده</label>
                                        <p><?= $row['total_price'] ?> تومان</p>
                                    </li>
                                    <li>
                                        <label>شماره تراکنش</label>
                                        <p><?= $row['after_pay_code'] ?></p>
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

                                    foreach (unserialize($row['basket']) as $row2) {
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
                        <?php
                        }
                        ?>

                    </div>


                </div>


                <div id="tab-three" class="tab-details">
                    <div class="old-address">
                        <?php
                        $userAddress = $data['userAddress'];
                        foreach ($userAddress as $row){

                        ?>

                        <div data-addressId="<?= $row['id'] ?>" class="address-item">
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
                            <form method="post" id="add-address" action="profile/index/addresstab">
                            <div>
                                <label>نام*</label>
                                <input name="name" type="text" placeholder="مهدی">
                                <label>شماره موبایل*</label>
                                <input name="mobile" type="tel" placeholder="09301235678">
                                <label>انتخاب استان*</label>
                                <select class="province" name="province">

                                </select>

                            </div>
                            <div>
                                <label>نام خانوادگی*</label>
                                <input name="family" type="text" placeholder="فیروزی">
                                <label>کد پستی*</label>
                                <input name="postal_code" type="text" placeholder="4416748739">
                                <label>انتخاب شهر*</label>
                                <select class="city" name="city">

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
        </div>
    </div>
</div>
</div>


</div>



<div class="dark-window"></div>
<div class="pop-up-edit-address">
    <div class="newaddress">
        <div>
            <form method="post" id="edit-address" action="profile/index/addresstab">
            <div>
                <label>نام*</label>
                <input name="name2" type="text" placeholder="مهدی">
                <label>شماره موبایل*</label>
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






<script src="views/profile/profile.js"></script>