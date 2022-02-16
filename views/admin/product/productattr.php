<?php
require('views/admin/layout.php');
$attr = $data['attr'];
$idproduct=$data['idproduct'];

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
</style>
<div class="content">
    <h2>
        ویژگی های
        <a style="color: #fff" href="adminproduct/index">
        ( محصول
        <?= $idproduct ?>
        )
        </a>
    </h2>

        <form action="adminproduct/showattr/<?= $idproduct ?>" method="post">

            <a href="adminproduct/addproductattr/<?= $idproduct ?>" class="add-btn">افزودن ویژگی</a>
            <a class="remove-btn" onclick="submitform()">حذف ویژگی</a>
            <table cellspacing="0">
                <tr>
                    <td>ردیف</td>
                    <td>عنوان ویژگی</td>
                    <td>مقدار</td>
                    <td>ویرایش</td>
                    <td>انتخاب</td>
                </tr>
                <?php
                foreach ($attr as $row) {
                    ?>
                    <tr>
                        <td><?= $row['id'] ?></td>
                        <td><?= $row['title'] ?></td>
                        <td><?= $row['val'] ?></td>
                        <td>
                            <a href="adminproduct/addproductattr/<?= $idproduct ?>/<?= $row['id'] ?>/"><span style="cursor:pointer;background: url(<?= URL ?>/public/images/editicon.png) no-repeat center;width: 25px;height: 25px;display: block"></span></a>
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