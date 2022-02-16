<link href="views/category/category.css" rel="stylesheet">
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<?php
$products = $data['products'];
$colors = $data['colors'];
$materials = $data['materials'];
$categorySlug = $data['categorySlug'];
$parentInfo = $data['parentInfo'];
$childerenInfo = $data['childerenInfo'];
$categoryTitle = $data['categoryTitle'];

?>
<!--<title>--><?php //if ($categorySlug==''){echo 'فروشگاه محصولات';}else{echo $categoryTitle;}  ?><!--</title>-->

<div class="filter iranyekan">
    <div class="category-nav">
        <ul>
            <li>
                <a href="category/index">محصولات</a>
            </li>
            <?php
            if ($parentInfo!='') {
                if (sizeof($parentInfo) > 0) {
                    ?>
                    <li>
                        <span></span>
                        <a href="category/index/<?= $parentInfo[0]['slug'] ?>"><?= $parentInfo[0]['title'] ?></a>
                    </li>
                    <?php
                }

                ?>
                <li>
                    <span></span>
                    <a href="category/index/<?= $categorySlug ?>"><?= $categoryTitle ?></a>
                </li>
                <?php
            }
            ?>
        </ul>
        <p>(<?= sizeof($products) ?> محصول)</p>
    </div>
    <div class="filter-option">
        <div>
            <p>فیلتر محصولات</p>
            <span></span>
        </div>

    </div>
    <!--    <iframe name="frame" style="display: none"></iframe>-->

    <div class="filter-container">
        <form id="filter-form" method="post">
            <div class="filter-details">
                <div class="options category-option">
                    <ul>
                        <?php
                        if ($categorySlug!='') {
                            ?>
                            <li class="title-category"><a href="category/index/<?php if (sizeof($parentInfo) > 0) {
                                    echo $parentInfo[0]['slug'];
                                } else {
                                    echo $categorySlug;
                                } ?>">
                                    <!--<span></span>-->
                                    <?php if (sizeof($parentInfo) > 0) {
                                        echo $parentInfo[0]['title'];
                                    } else {
                                        echo $categoryTitle;
                                    } ?></a></li>
                            <?php
                            foreach ($childerenInfo as $child) {
                                ?>
                                <li><a href="category/index/<?= $child['slug'] ?>">
                                        <span></span>
                                        <?= $child['title'] ?></a></li>
                                <?php
                            }
                        }else{
                            ?>
                            <li class="title-category"><a href="category/index">
                                    <!--<span></span>-->
                                تمامی محصولات
                                </a></li>
                        <?php

                        foreach ($childerenInfo as $child) {
                            ?>
                            <li><a href="category/index/<?= $child['slug'] ?>">
                                    <span></span>
                                    <?= $child['title'] ?></a></li>
                            <?php
                        }}
                        ?>
                    </ul>
                </div>
                <div class="options price-option">


                    <p for="amount">قیمت محصولات</p>
                    <div id="slider-range"></div>
                    <input name="price" type="text" id="amount" readonly>

                </div>
                <div class="material-option options">
                    <p>جنس</p>
                    <ul>
                        <?php
                        foreach ($materials as $row) {
                            ?>
                            <li>
                                <input name="material[]" type="checkbox" value="<?= $row['id'] ?>">
                                <p><?= $row['title'] ?></p>
                            </li>
                            <?php
                        }
                        ?>

                    </ul>
                </div>
                <div class="color-option options">
                    <p>رنگ</p>
                    <ul>

                        <?php
                        foreach ($colors as $row) {
                            ?>
                            <li>
                                <input name="color[]" type="checkbox" value="<?= $row['id'] ?>">
                                <div style="background: <?= $row['hex'] ?>"></div>
                                <p><?= $row['title'] ?></p>
                            </li>
                            <?php
                        }
                        ?>
                    </ul>
                </div>

            </div>
        </form>
        <div class="verify-reset-filter">
            <button class="button-filter add-filter iranyekan">اعمال فیلتر</button>
            <button class="button-filter cancle-filter iranyekan">لغو فیلترها</button>
        </div>
    </div>


</div>

<div id="main" class="iranyekan">


    <h1 data-slug="<?= $categorySlug ?>"><?php if ($categorySlug!=''){echo $categoryTitle;}else{echo 'تمامی محصولات';}  ?></h1>
    <div class="products">
        <?php
        foreach ($products as $row) {
            ?>
            <div class="one-product">
                <div class="contain-product">
                    <a href="product/index/<?= $row['id'] ?>">
                        <div class="photo">
                            <img src="public/images/products/<?= $row['id'] ?>/<?= $row['image'] ?>">
                        </div>
                        <div class="pro-details">
                            <label class="pro-title"><?= $row['title'] ?></label>
                            <label class="pro-price"><?= number_format($row['price']) ?> تومان</label>
                        </div>
                        <button class="iranyekan">مشاهده محصول</button>
                    </a>
                </div>
            </div>
            <?php
        }
        ?>


    </div>


</div>

<script src="views/category/category.js"></script>