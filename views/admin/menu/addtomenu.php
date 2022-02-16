<?php
require('views/admin/layout.php');
$edit = 0;
if (isset($data['menu'])) {
    $menu = $data['menu'];
    $edit = 1;
}

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
        <?php
        if ($edit == 0) {
            ?>
            افزودن به منو
            <?php
        } else {
            ?>
            ویرایش منو
            <?php
        }
        ?>
    </h2>

    <form action="adminmenu/addmenu/<?php if ($edit == 1) {
        echo $menu['id'];
    } ?>" method="post">


        <div class="row">
            <label>عنوان قسمت</label>
            <input value="<?php if ($edit == 1) {
                echo $menu['title'];
            } ?>" name="title" type="text">
        </div>
        <div class="row">
            <label>لینک</label>
            <input value="<?php if ($edit == 1) {
                echo $menu['link'];
            } ?>" name="link" type="text">
        </div>
        <div class="row">
            <label>انتخاب والد</label>
            <select name="parent">
                <option selected value="0">اصلی</option>
                <?php
                $mainMenu = $data['mainMenu'];
                foreach ($mainMenu as $row) {
                    ?>
                    <option <?php if ($edit == 1) {
                        if ($menu['parent'] == $row['id']) {
                            echo 'selected';
                        }
                    } ?> value="<?= $row['id'] ?>"><?= $row['title'] ?>
                    </option>
                    <?php
                }
                ?>
            </select>
        </div>
        <div class="row">
            <label>اولویت</label>
            <select name="priority">
                <?php
                for ($i=1;$i<11;$i++) {
                    ?>
                    <option <?php if ($edit == 1) {
                        if ($menu['priority'] == $i) {
                            echo 'selected';
                        }
                    } ?> value="<?= $i ?>"><?= $i ?></option>
                    <?php
                }
                ?>
            </select>
        </div>
        <div class="row">
            <label>انتخاب منو</label>
            <select name="menu">

                <option selected value="header">هدر</option>
                <option <?php if ($edit == 1) {
                    if ($menu['menu'] == 'footer') {
                        echo 'selected';
                    }
                } ?> value="footer">فوتر</option>
            </select>
        </div>
        <div class="row">
            <a style="float: right;margin-right: 190px" class="add-btn" onclick="submitform()">
                <?php
                if ($edit == 0) {
                    ?>
                    افزودن به منو
                    <?php
                } else {
                    ?>
                    ویرایش منو
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