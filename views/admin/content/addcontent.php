<?php
require('views/admin/layout.php');
$edit = 0;
if (isset($data['content'])) {
    $content = $data['content'];
    $edit = 1;
}

?>
<script src="public/ckeditor/ckeditor.js"></script>
<link type="text/css" rel="stylesheet" href="public/JalaliDatePicker-main/JalaliDatePicker-main/dist/jalaliDatepicker.css" />
<script type="text/javascript" src="public/JalaliDatePicker-main/JalaliDatePicker-main/dist/jalaliDatepicker.js"></script>

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
<!--<input style="margin:0 200px" data-jdp data-jdp-min-date="today" placeholder="تاریخ را انتخاب کنید"/>-->
<div class="content" style="overflow-y: auto;overflow-x: hidden;height: 600px">
    <h2>
        <?php
        if ($edit == 0) {
            ?>
            افزودن رنگ
            <?php
        } else {
            ?>
            ویرایش رنگ
            <?php
        }
        ?>
    </h2>

    <form action="admincontent/addcontent/<?php if ($edit == 1) {
        echo $content['id'];
    } ?>" method="post" enctype="multipart/form-data">


        <div class="row">
            <label>عنوان محتوا</label>
            <input value="<?php if ($edit == 1) {
                echo $content['title'];
            } ?>" name="title" type="text">
        </div>
        <div class="row">
            <label>نوع محتوا</label>
            <select name="post_type">
                <option value="blog">محتوای مجله</option>
                <option <?php if ($edit == 1) {
                    if ($content['post_type']=='public'){echo 'selected';}
                } ?> value="public">محتوای عمومی</option>
            </select>
        </div>
        <div class="row">
            <label>slug</label>
            <input value="<?php if ($edit == 1) {
                echo $content['slug'];
            } ?>" name="slug" type="text">
        </div>
<!--        <div class="row">-->
<!--            <label>تاریخ انتشار</label>-->
<!--            <input id="date-time" data-jdp data-jdp-min-date="today" placeholder="تاریخ را انتخاب کنید" value="--><?php //if ($edit == 1) {
//                echo $content['date_publish'];
//            } ?><!--" name="date_publish" type="text">-->
<!--        </div>-->
        <div class="row">
            <label>h1</label>
            <input value="<?php if ($edit == 1) {
                echo $content['seoh1'];
            } ?>" name="seoh1" type="text">
        </div>
        <div class="row">
            <label>دسکریپشن</label>
            <input value="<?php if ($edit == 1) {
                echo $content['description'];
            } ?>" name="description" type="text">

        </div>
        <div class="row">
            <label>متن محتوا</label>
            <textarea name="details" id="details"><?php if ($edit == 1) {
                    echo $content['details'];
                } ?></textarea>
        </div>
        <div class="row">
            <label>انتخاب تصویر(1280*720)</label>
            <input name="image-file" type="file">
            <input value="<?php if ($edit == 1) {
                echo $content['image'];
            } ?>" name="image-file-name" type="hidden">

        </div>
        <div class="row">
            <a style="float: right;margin-right: 190px" class="add-btn" onclick="submitform();">
                <?php
                if ($edit == 0) {
                    ?>
                    ذخیره محتوا
                    <?php
                } else {
                    ?>
                    ویرایش محتوا
                    <?php
                }
                ?>
            </a>
        </div>
    </form>
    <script>
        CKEDITOR.replace('details', {
            language: 'fa'
        });
        function submitform() {
            $('form').submit();
        }


        jalaliDatepicker.startWatch({
            separatorChar: "/",
            minDate: "attr",
            maxDate: "attr",
            changeMonthRotateYear: true,
            showTodayBtn: true,
            showEmptyBtn: true
        });


    </script>

</div>

</div>


</body>
</html>