<?php
require('views/admin/layout.php');
$gallery = $data['gallery'];
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
    .image-view{
        width: 100px;
        height: 100px;
        box-shadow: 0 0 2px #000;
        border-radius: 50%;
        display: block;
    }
</style>
<div class="content">
    <h2>
        تصاویر
        <a style="color: #fff" href="adminproduct/index">
        ( محصول
        <?= $idproduct ?>
        )
        </a>
    </h2>

        <form action="adminproduct/showgallery/<?= $idproduct ?>" method="post">

            <a href="adminproduct/addproductgallery/<?= $idproduct ?>" class="add-btn">افزودن تصویر</a>
            <a class="remove-btn" onclick="submitform()">حذف تصویر</a>
            <a class="remove-btn" style="background: #802553;width: 110px" onclick="submitform()">ثبت تصویر اصلی</a>
            <table cellspacing="0">
                <tr>
                    <td>ردیف</td>
                    <td>تصویر</td>
                    <td>عنوان تصویر</td>
                    <td>انتخاب تصویر اصلی</td>
                    <td>انتخاب</td>
                </tr>
                <?php
                foreach ($gallery as $row) {
                    $checked= '';
                    if ($row['main']==1){
                        $checked= 'checked';
                    }
                    ?>
                    <tr>
                        <td><?= $row['id'] ?></td>
                        <td><span class="image-view" style="background: url(public/images/products/<?= $idproduct ?>/<?= $row['title'] ?>) ;background-size: cover"></span></td>
                        <td><?= $row['title'] ?></td>
                        <td><input <?= $checked ?> name="main-image" value="<?= $row['id'] ?>" type="radio" style="cursor:pointer;width: 20px;height: 20px"></td>
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