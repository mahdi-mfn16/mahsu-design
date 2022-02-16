<link href="views/index/index.css" rel="stylesheet">
<?php
$slider1 = $data['slider'][0];
$slider2 = $data['slider'][1];
$slider3 = $data['slider'][2];
$carousel1 = $data['women'];
$carousel2 = $data['man'];
$content = $data['content'];
?>
<div id="main">
    <div id="slider-top">
        <div id="slider-image">
            <?php
            foreach ($slider1 as $row){
            ?>
                <a href="<?= $row['link'] ?>" class="items"><img src="public/images/slider/<?= $row['image'] ?>" width="1100" height="490"></a>
            <?php }
            ?>

        </div>
        <span class="next"></span>
        <span class="prev"></span>
        <ul id="navigation-slider">
            <li></li>
            <li></li>
            <li></li>
        </ul>

    </div>

    <div class="iranyekan">
        <div id="cta-homepage">
            <h3>محصول خود را به دلخواه خودتان سفارش دهید</h3>
            <ul>
                <a href="/">
                    <li>
                        <button class="iranyekan">محصولات چرم</button>
                    </li>
                </a>
                <a href="/">
                    <li>
                        <button class="iranyekan">اکسسوری</button>
                    </li>
                </a>
            </ul>


        </div>


    </div>
    <div class="category iranyekan">
        <h2>انواع محصولات مهسو</h2>
        <div class="row">
            <a class="column1">
                <div class="category-image">
                    <img src="public/images/slider/<?= $slider2[0]['image'] ?>">
                </div>
                <div class="category-label">
                    <p><?= $slider2[0]['title'] ?></p>
                </div>
            </a>
            <a class="column2">
                <div class="category-image">
                    <img src="public/images/slider/<?= $slider3[0]['image'] ?>">
                </div>
                <div class="category-label">
                    <p><?= $slider3[0]['title'] ?></p>
                </div>
            </a>
        </div>
        <div class="row">

            <a class="column2">
                <div class="category-image">
                    <img src="public/images/slider/<?= $slider3[1]['image'] ?>">
                </div>
                <div class="category-label">
                    <p><?= $slider3[1]['title'] ?></p>
                </div>
            </a>
            <a class="column1">
                <div class="category-image">
                    <img src="public/images/slider/<?= $slider2[1]['image'] ?>">
                </div>
                <div class="category-label">
                    <p><?= $slider2[1]['title'] ?></p>
                </div>
            </a>

        </div>
    </div>

    <div id="wemen-slider"  class="carousel-slider iranyekan">
        <h2>جدیدترین محصولات زنانه</h2>
        <div class="slider-content" caruasel-number="2">
            <span class="prev" onclick="prevslidecaruasel(this)"></span>
            <div class="main-items">
                <ul>
                    <?php
                    foreach ($carousel1 as $row) {

                        ?>

                        <li class="items">
                            <a href="product/index/<?= $row['id']?>">
                                <img width="93%" height="auto" src="public/images/products/<?= $row['id']?>/<?= $row['image']?>">
                                <h5><?= $row['title']?></h5>
                                <p><?= number_format($row['price'])?> تومان</p>
                                <button class="iranyekan">مشاهده محصول</button>
                            </a>

                        </li>
                        <?php
                    }
                    ?>
                </ul>
            </div>
            <span class="next" onclick="nextslidecaruasel(this)"></span>
        </div>
        <a href="category/index/women">
            <button class="iranyekan">تمامی محصولات زنانه</button>
        </a>
    </div>


    <div id="men-slider"  class="carousel-slider iranyekan">
        <h2>جدیدترین محصولات مردانه</h2>
        <div class="slider-content" caruasel-number = "1">
            <span class="prev" onclick="prevslidecaruasel(this)"></span>
            <div class="main-items">
                <ul>
                    <?php
                    foreach ($carousel2 as $row) {

                        ?>

                        <li class="items">
                            <a href="product/index/<?= $row['id']?>">
                                <img width="93%" height="auto" src="public/images/products/<?= $row['id']?>/<?= $row['image']?>">
                                <h5><?= $row['title']?></h5>
                                <p><?= number_format($row['price'])?> تومان</p>
                                <button class="iranyekan">مشاهده محصول</button>
                            </a>

                        </li>
                        <?php
                    }
                    ?>
                </ul>
            </div>
            <span class="next" onclick="nextslidecaruasel(this)"></span>
        </div>
        <a href="category/index/man">
            <button class="iranyekan">تمامی محصولات مردانه</button>
        </a>
    </div>




    <div id="content-blog" class="iranyekan">
        <h2>بیشتر بخوانید</h2>
        <ul>
            <?php
            foreach ($content as $row) {
                ?>
                <li>
                    <a>

                        <img  src="public/images/posts/<?= $row['id'] ?>/main/<?= $row['image'] ?>">
                        <p><?= $row['title'] ?></p>
                    </a>

                </li>
                <?php
            }
            ?>



        </ul>
        <a>
            <button class="iranyekan">آرشیو تمامی مقالات</button>
        </a>
    </div>




</div>

<script src="views/index/index.js"></script>






