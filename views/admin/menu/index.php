<?php
require('views/admin/layout.php');
$menu = $data['menu'];

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
    <h2>مدیریت رنگ ها



    </h2>

        <form action="adminmenu/index" method="post">

            <a href="adminmenu/addmenu" class="add-btn">افزودن به منو</a>
            <a class="remove-btn" onclick="submitform()">حذف از منو</a>
            <table cellspacing="0">
                <tr>
                    <td>ردیف</td>
                    <td>عنوان</td>
                    <td>لینک</td>
                    <td>والد</td>
                    <td>متعلق</td>
                    <td>اولویت</td>
                    <td>ویرایش</td>
                    <td>انتخاب</td>
                </tr>
                <?php
                foreach ($menu as $row) {
                    ?>
                    <tr>
                        <td><?= $row['id'] ?></td>
                        <td><?= $row['title'] ?></td>
                        <td><?= $row['link'] ?></td>
                        <td><?= $row['parent'] ?></td>
                        <td><?= $row['menu'] ?></td>
                        <td><?= $row['priority'] ?></td>
                        <td>
                            <a href="adminmenu/addmenu/<?= $row['id'] ?>"><span style="cursor:pointer;background: url(<?= URL ?>/public/images/editicon.png) no-repeat center;width: 25px;height: 25px;display: block"></span></a>
                        </td>
                        <td><input name="ids[]" value="<?= $row['id'] ?>" type="checkbox" style="cursor:pointer;width: 20px;height: 20px"></td>
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
        </script>

</div>

</div>

</body>
</html>