<?php
require('views/admin/layout.php');
$edit = 0;
if (isset($data['productinfo'])) {
    $productinfo = $data['productinfo'];
    $idcolor = explode(',', $productinfo['color']);
    $edit = 1;
}
$category = $data['category'];
$color = $data['color'];
$material = $data['material'];


?>
<script src="public/ckeditor/ckeditor.js"></script>
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

    .row ul {
        margin-top: 0;
    }
    .row ul li {
        float: right;
        margin-left: 15px;
    }

    .row ul li input {
        width: 16px;
        height: 16px;
    }

    .image-item{
        width: 60px;
        height: 60px;
        box-shadow: 0 0 3px #000;
        border-radius: 6px;
        position: relative;
        display: block;
        background: url(public/images/33.jpg);
        background-size: cover;
    }
    .image-input{
        position: absolute;
        right: 50%;
        bottom: -20px;
        margin-right: -8px;
    }

</style>
<div class="content" style="overflow-y: auto;overflow-x: hidden;height: 600px">
    <h2>
        <?php
        if ($edit == 0) {
            ?>
            افزودن محصول
            <?php
        } else {
            ?>
            ویرایش محصول
            <?php
        }
        ?>
    </h2>

    <form action="adminproduct/addproduct/<?php if ($edit == 1) {
        echo $productinfo['id'];
    } ?>" method="post">


        <div class="row">
            <label>عنوان محصول</label>
            <input value="<?php if ($edit == 1) {
                echo $productinfo['title'];
            } ?>" name="title" type="text">
        </div>
        <div class="row">
            <label>کد محصول</label>
            <input value="<?php if ($edit == 1) {
                echo $productinfo['code'];
            } ?>" name="code" type="text">
        </div>
        <div class="row">
            <label>قیمت محصول</label>
            <input value="<?php if ($edit == 1) {
                echo $productinfo['price'];
            } ?>" name="price" type="text">
        </div>
        <div class="row">
            <label>تعداد موجود</label>
            <input value="<?php if ($edit == 1) {
                echo $productinfo['available'];
            } ?>" name="available" type="text">
        </div>
        <div class="row">
            <label>توصیف کوتاه</label>
            <textarea name="short_description" id="short_description"><?php if ($edit == 1) {
                    echo $productinfo['short_description'];
                } ?></textarea>
        </div>
        <div class="row">
            <label>توضیحات تکمیلی</label>
            <textarea name="long_description" id="long_description"><?php if ($edit == 1) {
                    echo $productinfo['long_description'];
                } ?></textarea>
        </div>
        <div class="row">
            <label>روش نگهداری</label>
            <textarea name="care_method" id="care_method"><?php if ($edit == 1) {
                    echo $productinfo['care_method'];
                } ?></textarea>
        </div>
        <script>
            CKEDITOR.replace('short_description', {
                language: 'fa'
            });
            CKEDITOR.replace('long_description', {
                language: 'fa'
            });
            CKEDITOR.replace('care_method', {
                language: 'fa'
            });
        </script>
        <div class="row">
            <label>انتخاب دسته محصول</label>
            <select name="category">
                <option value="" selected>انتخاب کنید</option>
                <?php
                foreach ($category as $row) {
                    if ($row['parent'] != 0) {
                        if ($edit == 1) {
                            $select = '';
                            if ($productinfo['category'] == $row['id']) {
                                $select = 'selected';
                            }
                            ?>
                            <option <?= $select ?> value="<?= $row['id'] ?>"><?= $row['title'] ?></option>
                            <?php
                        }else{
                            ?>
                            <option value="<?= $row['id'] ?>"><?= $row['title'] ?></option>
                <?php
                        }
                    }
                }
                ?>
            </select>
        </div>
        <div class="row">
            <label>انتخاب جنس</label>
            <select name="material">
                <option value="" selected>انتخاب کنید</option>
                <?php
                foreach ($material as $row) {
                    if ($edit==1){
                        $select='';
                        if ($productinfo['material']==$row['id']){
                            $select='selected';
                        }

                    ?>
                    <option <?= $select ?> value="<?= $row['id'] ?>"><?= $row['title'] ?></option>

                    <?php
                    }else{
                        ?>
                        <option value="<?= $row['id'] ?>"><?= $row['title'] ?></option>
                <?php

                    }

                }
                ?>

            </select>
        </div>
        <div class="row">
            <label>انتخاب رنگ</label>
            <ul>
                <?php

                foreach ($color as $row) {
                    if ($edit == 0) {
                        ?>
                        <li style=""><input value="<?= $row['id'] ?>" name="color[]" type="checkbox"><?= $row['title'] ?></li>

                        <?php
                    } else {
                        $check = '';
                        foreach ($idcolor as $id) {
                            if ($row['id'] == $id) {
                                $check = 'checked';
                            }
                        }
                        ?>
                        <li><input <?= $check ?> value="<?= $row['id'] ?>" name="color[]" type="checkbox"><?= $row['title'] ?></li>

                        <?php

                    }
                }

                ?>

            </ul>

        </div>


        <div class="row">
            <a style="float: right;margin-right: 190px" class="add-btn" onclick="submitform()">
                <?php
                if ($edit == 0) {
                    ?>
                    افزودن محصول
                    <?php
                } else {
                    ?>
                    ویرایش محصول
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