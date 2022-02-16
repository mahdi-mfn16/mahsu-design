<link href="views/blogcategory/blogcategory.css" rel="stylesheet">
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<?php
$blogs = $data['blogs'];
?>


<div id="main" class="iranyekan">


    <h1 >مجله مهسو</h1>
    <div class="products">
        <?php
        foreach ($blogs as $row) {
            ?>
            <div class="one-product">
                <div class="contain-product">
                    <a href="post/index/<?= $row['slug'] ?>">
                        <div class="photo">
                            <img src="public/images/posts/<?= $row['id'] ?>/main/<?= $row['image'] ?>">
                        </div>
                        <div class="pro-details">
                            <label class="pro-title"><?= $row['title'] ?></label>
                            <label class="pro-price"><?= $row['description'] ?></label>
                        </div>
                        <button class="iranyekan">مشاهده بیشتر</button>
                    </a>
                </div>
            </div>
            <?php
        }
        ?>


    </div>


</div>

<script src="views/blogcategory/blogcategory.js"></script>