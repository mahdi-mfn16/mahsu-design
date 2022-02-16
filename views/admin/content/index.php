<?php
require('views/admin/layout.php');
$content = $data['content'];

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

    .image-view{
        width: 60px;
        height: 60px;
        box-shadow: 0 0 2px #000;
        border-radius: 50%;
        display: block;
    }
</style>
<div class="content">
    <h2>مدیریت محتوا ها



    </h2>

        <form action="admincontent/index" method="post">

            <a href="admincontent/addcontent" class="add-btn">افزودن محتوا</a>
            <a style="background: #802553" class="add-btn" onclick="submitform('publish')">انتشار محتوا</a>
            <a style="background: #be7a2f" class="add-btn" onclick="submitform('notpublish')">پنهان محتوا</a>
            <a class="remove-btn" onclick="submitform('delete')">حذف محتوا</a>
            <input type="hidden" name="action-form">
            <table cellspacing="0">
                <tr>
                    <td>ردیف</td>
                    <td>عنوان</td>
                    <td>توضیحات</td>
                    <td>slug</td>
                    <td>تاریخ</td>
                    <td>تصویر</td>
                    <td>وضعیت</td>
                    <td>ویرایش</td>
                    <td>انتخاب</td>
                </tr>
                <?php
                foreach ($content as $row) {
                    ?>
                    <tr>
                        <td><?= $row['id'] ?></td>
                        <td><?= $row['title'] ?></td>
                        <td><?= $row['description'] ?></td>
                        <td><?= $row['slug'] ?></td>
                        <td><?= $row['date_publish'] ?></td>
                        <td><span class="image-view" style="background: url(public/images/posts/<?= $row['id'] ?>/main/<?= $row['image'] ?>) ;background-size: cover"></span></td>
                        <td><?php echo 'منتشر نشده'; ?></td>
                        <td>
                            <a href="admincontent/addcontent/<?= $row['id'] ?>"><span style="cursor:pointer;background: url(<?= URL ?>/public/images/editicon.png) no-repeat center;width: 25px;height: 25px;display: block"></span></a>
                        </td>
                        <td><input name="ids[]" value="<?= $row['id'] ?>" type="checkbox" style="cursor:pointer;width: 20px;height: 20px"></td>
                    </tr>
                    <?php
                }
                ?>
            </table>

        </form>
        <script>
            function submitform(value) {
                $('input[name=action-form]').val(value);
                $('form').submit();
            }

        </script>

</div>

</div>

</body>
</html>