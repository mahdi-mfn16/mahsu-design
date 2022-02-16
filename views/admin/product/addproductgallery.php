<?php
require('views/admin/layout.php');
$idproduct = $data['idproduct'];

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
        افزودن تصویر
    </h2>

    <form action="adminproduct/addproductgallery/<?= $idproduct ?>" method="post" enctype="multipart/form-data">

        <div class="row">
            <label>انتخاب تصویر کوچک(600*600)</label>
            <input value="" name="imagefile0" type="file">
        </div>
        <div class="row">
            <label> انتخاب تصویر بزرگ(1000*1000)</label>
            <input value="" name="imagefile1" type="file">
        </div>

        <div class="row">
            <a style="float: right;margin-right: 190px" class="add-btn" onclick="submitform()">افزودن تصاویر</a>
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