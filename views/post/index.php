<link href="views/post/post.css" rel="stylesheet">
<?php
$content = $data['content'];
$blogs = $data['blogs'];
$products = $data['products'];
?>



<div id="main" class="iranyekan">
    <div class="container">
        <div class="right">
            <div class="right-cart">
                <div class="contain">
                    <h1><?= $content['seoh1'] ?></h1>
                    <p class="date"><?= $content['date_publish'] ?></p>
                    <div class="line right-line"></div>
                    <img class="head-img" src="public/images/posts/<?= $content['id'] ?>/main/<?= $content['image'] ?>">

                    <?= $content['details'] ?>

                    <div class="line right-line"></div>
                    <p class="share-p">این مقاله را به اشتراک بگذارید</p>
                    <div class="share-buttons">
                        <span style="background: url(public/images/tele.png) center no-repeat"><a href="https://t.me/share/url?url={<?= URL.'post/index/'.$content['slug'] ?>}&text={<?= $content['title'] ?>}"></a></span>
                        <span style="background: url(public/images/what.png) center no-repeat"><a href="whatsapp://send?text=Your message here(<?= URL.'post/index/'.$content['slug'] ?>)"></a></span>
                    </div>
                    
                </div>



            </div>


        </div>
        <div class="iranyekan left-cart">
            <div class="item-box">
                <h3>جدیدترین محصولات مهسو</h3>
                <?php
                foreach ($products as $row) {
                    ?>
                    <div onclick="window.location.href='product/index/<?= $row['id'] ?>'" class="pro-item">
                        <div class="right-item">
                            <img class="image-item" src="public/images/products/<?= $row['id'] ?>/<?= $row['image'] ?>">
                        </div>
                        <div class="left-item">
                            <h6><?= $row['title'] ?></h6>
                            <p><?= number_format($row['price']) ?> تومان</p>
                        </div>
                    </div>
                    <div class="line"></div>
                    <?php
                }
                ?>
                <a href="category/index">مشاهده تمامی محصولات</a>


            </div>
            <div class="item-box">
                <h3>آخرین مقالات</h3>
                <?php
                foreach ($blogs as $row2) {
                ?>
                <div onclick="window.location.href='post/index/<?= $row2['slug'] ?>'" class="pro-item post-item">
                    <div class="right-item">
                        <img class="image-item" style="background-image: url(public/images/posts/<?= $row2['id'] ?>/main/<?= $row2['image'] ?>);" src="">
                    </div>
                    <div class="left-item">
                        <h6><?= $row2['title'] ?></h6>
                        <p class="post"><?= $row2['date_publish'] ?></p>
                    </div>
                </div>
                <div class="line"></div>
                    <?php
                }
                ?>

                <a href="blogcategory/index">مشاهده تمامی مقالات</a>

            </div>

        </div>
    </div>


</div>

<script src="views/post/post.js"></script>