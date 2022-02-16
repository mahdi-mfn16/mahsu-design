<?php
require('views/admin/layout.php');
$comment = $data['comment'];

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

    .content .ok-btn {
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

    .content .ok-btn.remove-btn {
        background: red;

    }
    .content .ok-btn.notok-btn {
        background: #be750d;

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
    <h2>مدیریت رنگ ها



    </h2>

        <form action="admincomment/index" method="post">

            <a class="ok-btn" onclick="submitform('ok')">تایید نظر</a>
            <input name="action-form" type="hidden">
            <a class="notok-btn ok-btn " onclick="submitform('notok')">عدم تایید نظر</a>
            <a class="ok-btn remove-btn" onclick="submitform('delete')">حذف نظر</a>
            <table cellspacing="0">
                <tr>
                    <td>ردیف</td>
                    <td>عنوان</td>
                    <td>تاریخ</td>
                    <td>محصول</td>
                    <td>نام</td>
                    <td>نمره</td>
                    <td>توضیحات</td>
                    <td>وضعیت</td>
                    <td>انتخاب</td>
                </tr>
                <?php
                foreach ($comment as $row) {
                    ?>
                    <tr>
                        <td><?= $row['id'] ?></td>
                        <td><?= $row['title'] ?></td>
                        <td><?= $row['date_publish'] ?></td>
                        <td><?= $row['product'] ?></td>
                        <td><?= $row['family'] ?></td>
                        <td><?= $row['rating'] ?></td>
                        <td><?= $row['description'] ?></td>
                        <td><?php if ($row['showhide']==1){echo 'تایید شده';}if ($row['showhide']==-1){echo 'رد شده';}if ($row['showhide']==0){echo 'در حال بررسی';} ?></td>

                        <td><input name="ids[]" value="<?= $row['id'] ?>" type="checkbox" style="cursor:pointer;width: 20px;height: 20px"></td>
                    </tr>
                    <?php
                }
                ?>
            </table>

        </form>
        <script>
            function submitform(value) {
                if (value=='delete'){
                    $('input[name=action-form]').val('delete')
                }
                if (value=='ok'){
                    $('input[name=action-form]').val('ok')
                }
                if (value=='notok'){
                    $('input[name=action-form]').val('notok')
                }
                $('form').submit();
            }
        </script>

</div>

</div>

</body>
</html>