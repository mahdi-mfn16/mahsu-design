<?php
require('views/admin/layout.php');
$edit = 0;
$idproduct = $data['idproduct'];
$attrs = $data['attrs'];
if (isset($data['productattrinfo'])) {
    $productattrinfo = $data['productattrinfo'];
    $edit = 1;
}



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
        margin-left: 5px;
    }

    .row ul li input {
        width: 10px;
        height: 10px;
    }

</style>
<div class="content" style="overflow-y: auto;overflow-x: hidden;height: 600px">
    <h2>
        <?php
        if ($edit == 0) {
            ?>
            افزودن ویژگی
            <?php
        } else {
            ?>
            ویرایش ویژگی
            <?php
        }
        ?>
    </h2>

    <form action="adminproduct/addproductattr/<?= $idproduct
    ?>/<?php if ($edit == 1) {
        echo $productattrinfo['id'];
    } ?>" method="post">


        <div class="row">
            <label>عنوان ویژگی</label>
            <select name="attrid">
                <option value="" selected>انتخاب کنید</option>
                <?php
                foreach ($attrs as $row) {
                    if ($edit==1){
                        $select='';
                        if ($productattrinfo['attr']==$row['id']){
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
            <label>مقدار ویژگی</label>
            <input value="<?php if ($edit == 1) {
                echo $productattrinfo['val'];
            } ?>" name="val" type="text">
        </div>

        <div class="row">
            <a style="float: right;margin-right: 190px" class="add-btn" onclick="submitform()">
                <?php
                if ($edit == 0) {
                    ?>
                    افزودن ویژگی
                    <?php
                } else {
                    ?>
                    ویرایش ویژگی
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