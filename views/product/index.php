<link href="views/product/product.css" rel="stylesheet">
<title>کیف چرمی مدل 11</title>
<link href="public/css/magnify.css" rel="stylesheet">
<script src="public/js/jquery.magnify.js"></script>
<?php
$product = $data['product'];
$products = $data['products'];
$color = $data['color'];
$parents = $data['parents'];
$comments = $data['comments'];
$numberComment = sizeof($comments);
?>
<div class="filter iranyekan">
    <div class="category-nav">
        <ul>
            <li>
                <a href="category/index">محصولات</a>
            </li>
            <?php
            foreach ($parents as $row) {
                ?>
                <li>
                    <span></span>
                    <a href="category/index/<?= $row['slug'] ?>"><?= $row['title'] ?></a>
                </li>
                <?php
            }
            ?>

            <li>
                <span></span>
                <p><?= $product['title'] ?></p>
            </li>
        </ul>
    </div>

</div>

<div id="main" class="iranyekan">
    <div class="right-content">
        <div class="images">
            <ul class="product-images">

                <?php
                $gallery = $data['gallery'];
                foreach ($gallery as $row) {


                    ?>
                    <li>
                        <img loading="lazy" class="image1"
                             src="public/images/products/<?= $row['product'] ?>/600-<?= $row['title'] ?>"
                             data-magnify-src="public/images/products/<?= $row['product'] ?>/1000-<?= $row['title'] ?>">
                    </li>
                    <?php
                }
                ?>


            </ul>
            <script>

                // https://www.jqueryscript.net/zoom/Simple-jQuery-Magnifying-Glass-Image-Zoom-Plugin-magnify-js.html


                $(document).ready(function () {
                    $('.image1').magnify();
                });
                var $zoom = $('.image1').magnify();
                // Disable zoom
                $zoom.destroy();

            </script>
            <span class="prev-img"></span>
            <span class="next-img"></span>
            <ul class="navigation-img">
                <?php
                for ($i = 0; $i < sizeof($gallery); $i++) {
                    ?>
                    <li></li>
                    <?php
                }
                ?>

            </ul>
        </div>
    </div>

    <div class="left-content">
        <h1><?= $product['title'] ?></h1>
        <label>کد محصول:</label>
        <p>1100</p>
        <label>رنگ بندی: </label>

        <ul>
            <?php
            foreach ($color as $key => $row) {
                if ($key == 0) {
                    $active = 'active';
                } else {
                    $active = '';
                }
                ?>
                <li data-idcolor="<?= $row['id'] ?>" class="color-item <?= $active ?>"
                    onclick="selectColor(this);"><span class="color"
                                                       style="background: <?= $row['hex'] ?>;"></span>
                    <p class="color-text"><?= $row['title'] ?></p></li>
                <?php
            }
            ?>


        </ul>
        <script>


        </script>

        <label>قیمت: </label>
        <p class="currency">تومان</p>
        <p class="product-price">200000</p>

        <button class="iranyekan buy" onclick="addToBasket(<?= $product['id'] ?>)">افزودن به سبد خرید</button>
        <script>
            function addToBasket(productId) {

                var colorId = $('.color-item.active').attr('data-idcolor');
                var url = '<?= URL?>product/addtobasket/' + productId + '/' + colorId;
                var data = {};
                $.post(url, data, function (msg) {

                })
            };
        </script>
        <button class="iranyekan call-buy">تماس و خرید با مشاوره</button>
        <h4>توضیحات مختصر :</h4>
        <div class="pro-description"><?= $product['short_description'] ?></div>
        <a class="long">مشاهده کامل</a>
        <a class="short">مشاهده کوتاه</a>

    </div>

    <div id="x" class="product-tab">
        <ul>
            <li>درباره محصول</li>
            <li>روش نگهداری</li>
            <li>نظرات کاربران</li>
        </ul>
        <div class="contain-content">
            <div id="tab-one" class="pro-details tab-box">
                <h3>خصوصیات محصول</h3>
                <ul>
                    <?php
                    $attr = $data['Attr'];
                    foreach ($attr as $row) {
                        ?>
                        <li>
                            <label><?= $row['title'] ?></label>
                            <p><?= $row['val'] ?></p>
                        </li>
                        <?php
                    }
                    ?>
                </ul>
                <?= $product['long_description'] ?>
            </div>
            <div id="tab-two" class="pro-details tab-box">
                <?= $product['care_method'] ?>
            </div>

            <style>


                .send-comment{
                    width: 80%;margin-right: 10%;

                }
                .send-comment label {
                    width: 96%;
                    height: 35px;
                    font-size: 10pt;
                    line-height: 36px;
                    text-align: right;
                    display: block;
                    margin-right: 2.5%;


                }
                .comments h3{
                    text-align: center;
                    margin-top:30px;
                    margin-bottom: 30px;
                }

                .send-comment input {
                    width: 94%;
                    height: 40px;
                    border: 1px solid #ccc;
                    margin-right: 2%;
                    border-radius: 4px;
                    overflow: hidden;
                    font-family: IRANYekan;
                    padding-right: 2%;
                    margin-bottom: 10px;
                    display: block;
                    color: #000;
                    background: rgba(0,0,0,0.01);

                }

                .send-comment textarea {
                    width: 94%;
                    display: block;
                    height: 150px;
                    border: 1px solid #ccc;
                    border-radius: 4px;
                    overflow: hidden;
                    font-family: IRANYekan;
                    padding-right: 2%;
                    margin-bottom: 10px;
                    color: #000;
                    margin-right: 2%;
                    background: rgba(0,0,0,0.01);
                }

                .black-btn {
                    width: 30%;
                    height: 40px;
                    font-family: IRANYekan;
                    background-color: rgba(0, 0, 0, 0.8);
                    color: #fff;
                    border-radius: 22px;
                    overflow: hidden;
                    border: none;
                    box-shadow: 0 0 2px #aaa;
                    cursor: pointer;
                    font-size: 9pt;
                    font-weight: bold;
                    float: right;
                    margin-right: 35%;
                    margin-top: 8px;
                    margin-bottom: 20px;
                }

                .comments .line{
                    width: 96%;
                    border-bottom: 1px solid #eee;
                    height: 1px;
                    margin: 35px 2% 20px 2%;
                    display: inline-block;
                }

                .black-btn:hover {
                    border: 1px solid #aaa;
                    background-color: #fff;
                    color: #000;
                    box-shadow: 0 0 2px #aaa;
                }

                .one-comment{
                    width: 96%;
                    border-radius: 5px;
                    overflow: hidden;
                    margin-right: 2%;
                    box-shadow: 0 0 3px #aaa;
                    margin-bottom: 30px;
                    background: rgba(0,0,0,0.007);
                }

                .one-comment .head-comment{
                    background: rgba(0,0,0,0.6);
                    color: #fff;
                    height: 40px;
                    width: 100%;
                }
                .star{
                    width: 90px;
                    height: 16px;
                    position: relative;
                    margin-right: 2%;
                }
                .star span{
                    position: absolute;
                    top: 0;
                    left: 0;
                    height: 100%;
                    display: block;
                }

                .comments .date{
                    float: left;
                    margin-left: 2%;
                    line-height: 14px;
                }


                .comments .user-name{
                    float: right;
                    margin-right: 2%;
                    line-height: 14px;
                }


                .one-comment .detail-comment{
                    color: #000;
                    width: 100%;
                }

                .head-comment span{
                    background: url(public/images/profile.PNG) no-repeat center;
                    display: block;
                    float: right;
                    width: 20px;
                    height: 20px;
                    margin-top: 10px;
                    margin-right: 2%;
                }

                .one-comment .detail-comment p{
                    margin-right: 2%;
                    width: 96%;
                }
                .one-comment .detail-comment .title-comment{
                    font-weight: bolder;
                    font-size: 12pt;
                }
                .one-comment .detail-comment .des-comment{

                    font-size: 10pt;
                    color: rgba(0,0,0,0.8);
                }

                @media screen and (max-width: 1100px){
                    .send-comment{
                        width: 90%;margin-right: 5%
                    }

                }
                @media screen and (max-width: 850px){

                    .black-btn{
                        width: 60%;
                        margin-right: 20%;
                    }
                }



            </style>
            <div id="tab-three" class="comments tab-box">
                <h3>نظر خود را ثبت نمایید</h3>
                <div style="" class="send-comment">
                    <form id="comment-form" method="post">
                        
                        <label>عنوان نظر</label>
                        <input name="title" type="text">
                        <label>نویسنده نظر</label>
                        <input name="family" type="text">
                        <label>میزان رضایت</label>
                        <input name="rating" placeholder="از 0 تا 10 نمره دهید">
                        <label>توضیحات</label>
                        <textarea name="description"></textarea>
                    </form>
                    <button class="black-btn " onclick="submitComment(<?= $product['id'] ?>)">ثبت نظر</button>
                </div>
                <script>
                    function submitComment(productId) {
                        var url = 'product/addComment/'+productId;
                        var data = $('#comment-form').serializeArray();
                        $.post(url,data,function (msg) {
                            alert(msg);
                        })
                    }
                </script>
                <div class="line"></div>
                <h3>نظرات کاربران (<?= $numberComment ?> نظر)</h3>
                <div class="view-comments" style="width: 100%">
                    <?php

                    foreach ($comments as $comment) {
                        $comment_rate = $comment['rating']*10;



                        ?>
                        <div class="one-comment">
                            <div class="head-comment">
                                <span></span>
                                <p class="user-name"><?= $comment['family'] ?></p>
                                <p class="date"><?= $comment['date_publish'] ?></p>
                            </div>
                            <div class="detail-comment">
                                <p class="title-comment"><?= $comment['title'] ?></p>
                                <div class="star">
                                    <span style="width: 100%;background: url(public/images/star22.png) no-repeat 0 0;background-size: cover"></span>
                                    <span style="width: <?= $comment_rate ?>%;background: url(public/images/star.png) no-repeat  0 0;background-size: cover"></span>

                                </div>
                                <p class="des-comment"><?= $comment['description'] ?></p>
                            </div>
                        </div>
                        <?php
                    }
                    ?>

                </div>
            </div>
        </div>
    </div>

    <div id="men-slider" class="carousel-slider iranyekan">
        <h2>شاید محصولات زیر را هم دوست داشته باشید !</h2>
        <div class="slider-content" caruasel-number="1">
            <span class="prev" onclick="prevslidecaruasel(this)"></span>
            <div class="main-items">
                <ul>
                    <?php
                    foreach ($products as $row2) {
                        ?>

                        <li class="items">
                            <a>
                                <img loading="lazy" width="93%" height="auto" src="public/images/products/<?= $row2['id'] ?>/<?= $row2['image'] ?>">
                                <h5><?= $row2['title'] ?></h5>
                                <p><?= number_format($row2['price']); ?> تومان</p>
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
    </div>

</div>


<script src="views/product/product.js"></script>