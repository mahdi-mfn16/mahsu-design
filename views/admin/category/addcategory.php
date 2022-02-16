<?php
require('views/admin/layout.php');
$category = $data['category'];
$idcategory = $data['idcategory'];
//if($idcategory==''){
//    $idcategory=0;
//}
if (isset($data['thiscategory'][0])) {
    $thiscategory = $data['thiscategory'][0];
}
$edit = $data['edit'];

?>

<style>

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

    label {
        font-size: 10pt;
        width: 150px;
        height: 34px;
        display: inline-block;
        padding: 20px;
        line-height: 34px;
    }

    input {
        width: 250px;
        height: 35px;
        background: #fff;
        border-radius: 4px;
        border: 1px solid #aaa;
        font-family: IRANYekan;
    }

    select {
        width: 250px;
        height: 40px;
        border-radius: 4px;
        background: #fff;
        font-family: IRANYekan;
    }

    .row {
        width: 100%;
        float: right;
    }
</style>
<div class="content">
    <h2>
        <?php
        if ($edit == '') {
            ?>
            افزودن دسته
            <?php
        } else {
            ?>
            ویرایش دسته
            <?php
        }
        ?>
    </h2>
    <?php
    if ($edit == '') {
        ?>
    <form action="admincategory/addcategory/<?= $idcategory ?>" method="post">
        <?php
    } else {
        ?>
        <form action="admincategory/addcategory/<?= $idcategory ?>/edit" method="post">
        <?php
    }
    ?>

        <div class="row">

            <label>عنوان دسته</label>
            <?php
            if ($edit == ''){
            ?>
            <input name="title" type="text">
        </div>
        <div class="row">
            <label>عنوان انگلیسی(Slug)</label>
            <input name="slug" type="text">
            <?php
            } else {
                ?>
            <input value="<?= $thiscategory['title'] ?>" name="title" type="text">
        </div>
        <div class="row">
            <label>عنوان انگلیسی(Slug)</label>
            <input value="<?= $thiscategory['slug'] ?>" name="slug" type="text">
                <?php
            }
            ?>
        </div>
        <div class="row">
            <label>انتخاب دسته والد</label>
            <select name="parent">


                <?php
                if ($idcategory=='') {
                    ?>
                    <option value="0" selected>دسته اصلی</option>
                <?php
                }else{
                    ?>
                    <option value="0">دسته اصلی</option>
                <?php
                }

                foreach ($category as $row) {
                    if ($edit=='') {
                        $parentid=$idcategory;
                    }
                    else{
                        $parentid=$thiscategory['parent'];
                    }

                    if($row['id'] == $parentid) {
                        ?>
                        <option value="<?= $row['id'] ?>" selected><?= $row['title'] ?></option>
                        <?php
                    } else {
                        ?>
                        <option value="<?= $row['id'] ?>"><?= $row['title'] ?></option>
                        <?php
                    }
                }
                ?>


            </select>
        </div>
        <div class="row">
            <a style="float: right;margin-right: 190px" class="add-btn" onclick="submitform()">
                <?php
                if ($edit == '') {
                    ?>
                    افزودن دسته
                    <?php
                } else {
                    ?>
                    ویرایش دسته
                    <?php
                }
                ?>
            </a>
        </div>
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