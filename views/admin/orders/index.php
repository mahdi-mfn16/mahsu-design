<?php
require('views/admin/layout.php');
$order = $data['order'];


?>

<style>
    .content table {
        width: 96%;
        background: #fff;
        margin: 20px auto;
        box-shadow: 0 0 2px #aaa;
        border-radius: 4px;
    }

    .content table tr:first-child {
        background: #eee;
    }

    .content table td {
        border-bottom: 1px solid #aaa;
        padding: 10px;
        box-shadow: -1px 0 1px #bbb;
    }

    h2 {
        font-size: 11pt;
        background: #479a7b;
        padding: 2%;
        width: 98%;
        margin: auto;
        color: #eee;

    }

    .content .add-btn {
        width: 90px;
        height: 32px;
        color: #fff;
        background: #34802a;
        box-shadow: 0 0 2px #aaa;
        border-radius: 4px;
        display: block;
        float: left;
        text-align: center;
        line-height: 30px;
        margin: 10px 0 5px 2%;
    }

    .content .remove-btn {
        width: 90px;
        height: 32px;
        color: #fff;
        background: red;
        box-shadow: 0 0 2px #aaa;
        border-radius: 4px;
        display: block;
        float: left;
        text-align: center;
        line-height: 30px;
        margin: 10px 0 5px 1%;
    }
    .color-theme{
        width: 30px;
        height: 30px;
        border-radius: 50%;
        display: block;
        box-shadow: 0 0 2px #ccc;
    }

</style>
<div class="content">
    <h2>مدیریت سفارشات



    </h2>

        <form action="adminusers/index" method="post">
            <a class="remove-btn" onclick="submitform()">حذف سفارش</a>
            <table cellspacing="0">
                <tr>
                    <td>ردیف</td>
                    <td>تاریخ ثبت</td>
                    <td>مبلغ کل</td>
                    <td>نوع پرداخت</td>
                    <td>کد قبل پرداخت</td>
                    <td>شماره تراکنش</td>
                    <td>تعداد اقلام</td>
                    <td>وضعیت پرداخت</td>
                    <td>جزییات سفارش</td>
                    <td>انتخاب</td>
                </tr>
                <?php
                foreach ($order as $row) {
                    ?>
                    <tr>
                        <td><?= $row['id'] ?></td>
                        <td><?= $row['date_order'] ?></td>
                        <td><?= number_format($row['total_price']) ?></td>
                        <td><?= $row['payment_type_id'] ?></td>
                        <td><?= $row['before_pay_code'] ?></td>
                        <td><?= $row['after_pay_code'] ?></td>
                        <td><?= sizeof($row['basket']) ?></td>
                        <td><?= $row['pay_status'] ?></td>
                        <td class="details" onclick="viewDetails(<?= $row['id'] ?>)" style="cursor: pointer;color: blue" >مشاهده جزییات</td>
                        <td><input name="ids[]" value="<?= $row['id'] ?>" type="checkbox" style="cursor:pointer;width: 20px;height: 20px"></td>
                    </tr>
                    <tr style="display: none" class="detail-div<?= $row['id'] ?>"><td colspan="10">
                        <table cellspacing="0">
                            <tr style="background: rgba(0,0,0,0.68);color: #fff">
                                <td>ردیف</td>
                                <td>نام محصول</td>
                                <td>کد</td>
                                <td>تصویر</td>
                                <td>رنگ</td>
                                <td>قیمت</td>
                                <td>تعداد</td>
                                <td>قیمت کل</td>
                            </tr>
                            <?php
                            $basket = $row['basket'];
                            foreach ($basket as $row2) {
                                ?>
                                <tr style="background: #eee">
                                    <td><?= $row2['id'] ?></td>
                                    <td><?= $row2['title'] ?></td>
                                    <td><?= $row2['code'] ?></td>
                                    <td><span style="width: 55px;height: 55px;box-shadow: 0 0 2px #a1a1a1;border-radius: 50%;background: url(public/images/<?= $row2['id'] ?>/<?= @$row2['image'] ?>) center no-repeat;background-size:cover;display: block"></span></td>
                                    <td><?= $row2['colorTitle'] ?><span style="width: 15px;height: 15px;box-shadow: 0 0 2px #a1a1a1;border-radius: 50%;background: <?= $row2['hex'] ?>;display: block"></span></td>
                                    <td><?= number_format($row2['price']) ?></td>
                                    <td><?= $row2['number_product'] ?></td>
                                    <td><?= number_format($row2['price']*$row2['number_product']) ?></td>
                                </tr>
                                <?php
                            }
                            ?>
                        </table>

                            <table cellspacing="0">
                                <tr style="background: rgba(0,0,0,0.68);color: #fff">
                                    <td>نوع پست</td>
                                    <td>هزینه ارسال</td>
                                    <td>نام گیرنده</td>
                                    <td>خانوادگی گیرنده</td>
                                    <td>موبایل</td>
                                    <td>کد پستی</td>
                                    <td>استان</td>
                                    <td>شهر</td>
                                    <td>آدرس</td>
                                </tr>
                                    <tr style="background: #eee">
                                        <td><?= $row['post_type']['title'] ?></td>
                                        <td><?= number_format($row['post_type']['price']) ?></td>
                                        <td><?= $row['address']['first_name'] ?></td>
                                        <td><?= $row['address']['family'] ?></td>
                                        <td><?= $row['address']['mobile'] ?></td>
                                        <td><?= $row['address']['postal_code'] ?></td>
                                        <td><?= $row['address']['province'] ?></td>
                                        <td><?= $row['address']['city'] ?></td>
                                        <td><?= $row['address']['address'] ?></td>
                                    </tr>

                            </table>
                        </td>
                    </tr>
                    <?php
                }
                ?>
            </table>

        </form>
        <script>
            function submitform() {
                $('form').submit();
            }
            function viewDetails(orderId) {
                var detail = $('.detail-div'+orderId);
                detail.toggleClass('open');
                if (detail.hasClass('open')){
                    detail.show();
                }else {
                    detail.hide();
                }
            }

        </script>

</div>

</div>

</body>
</html>