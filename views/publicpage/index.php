<link href="views/publicpage/publicpage.css" rel="stylesheet">
<?php
$content = $data['content'];
?>

<div id="main" class="iranyekan">
    <div class="container">
        <div class="right">
            <div class="right-cart">
                <div class="contain">
                    <img class="head-img" src="public/images/posts/<?= $content['id'] ?>/main/<?= $content['image'] ?>">
                    <h1><?= $content['seoh1'] ?></h1>
                    <div class="line right-line"></div>


                    <?php if ($content['slug']!='contact-us'){echo $content['details'];}else {echo @$content['details']; ?>

                        <h2 class="h2-form">با همکاران ما در مهسو تماس بگیرید</h2>
                        <p class="p-form">هر گونه انتقاد، پیشنهاد و سوالی دارید از طریق فرم برایمان ارسال نموده تا در
                            اسرع وقت همکاران ما با شما تماس حاصل نمایند
                        </p>
                        <div style="" class="send-comment">
                            <form id="comment-form" method="post">

                                <label>نام و نام خانوادگی</label>
                                <input name="family" type="text">
                                <label>ایمیل</label>
                                <input name="email" type="text">
                                <label>شماره تماس</label>
                                <input name="mobile" type="text">
                                <label>متن پیام</label>
                                <textarea name="description"></textarea>
                            </form>
                            <button class="black-btn " onclick="submitComment()">ثبت نظر</button>
                        </div>
                        <?php
                    }
                    ?>

                    <script>
                        function submitComment(productId) {
                            var url = 'product/addComment/'+productId;
                            var data = $('#comment-form').serializeArray();
                            $.post(url,data,function (msg) {
                                alert(msg);
                            })
                        }
                    </script>



                    
                </div>



            </div>


        </div>

    </div>


</div>

<script src="views/publicpage/publicpage.js"></script>