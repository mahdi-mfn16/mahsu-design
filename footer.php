<?php
$result = Model::getGeneral();
$telegram_link = $result[0];
$instagram_link = $result[1];
$footerMenu = $modelheader->showMenu('footer');


?>

<style>
    footer{
        display: inline-block;
        width: 100%;
        height: 210px;
        margin-top: 60px;
    }
    .social-icon{

        height: 110px;
        width: 100%;
        padding-top: 20px;
        background: rgba(0,0,0,0.001);
        box-shadow: 0 -1px #eee;
        text-align: center;
    }
    .social-icon h2{
        height: 40px;
        width: 100%;
        display: block;
        padding: 0;
        margin: 0 auto;
        font-size: 14pt;
        text-align: center;

    }
    .social-icon ul{
        padding: 0;
        height: 70px;
        margin: 0 auto;
        display: block;
        max-width: 250px;
    }
    .social-icon ul >li{
        width:25%;
        height: 100%;
        float: right;
    }
    .social-icon > ul >li > a{
        width: 100%;
        display: block;
        height: 100%;


    }
    .social-icon > ul >li > a > span{
        width: 100%;
        height: 100%;
        display: block;
    }
    .content-footer{
        width: 100%;
        height: 100px;
        background: rgba(0,0,0,0.92);
    }
    .content-footer ul{
        width: 90%;
        height: 60%;
        margin: 0 auto;
        padding: 0;
        display:block;
        border-bottom: 1px solid #fff;
    }
    .content-footer ul > li{
        width: 20%;
        height: 100%;
        float: right;
        color: #fff;
        font-size: 12pt;
        line-height: 60px;
        text-align: center;
    }
    .content-footer ul > li a{
        color: #fff;
        cursor: pointer;
    }
    .content-footer p{
        width: 100%;
        height: 30%;
        float: right;
        color: #eee;
        margin: 0 auto;
        text-align: center;
        padding: 0;
        line-height: 40px;
        font-size: 9pt;
    }

    @media screen and (max-width: 680px) {
        .content-footer ul > li{
            font-size: 11pt;

        }
    }
    @media screen and (max-width: 580px) {
        .content-footer ul > li{
            font-size: 10pt;
        }
    }

    @media screen and (max-width: 510px) {

        .content-footer{
            width: 100%;
            height: 280px;
            background: rgba(0,0,0,0.92);
        }

        .content-footer ul{
            height: 80%;
            padding-bottom: 10px;
        }
        .content-footer p{
            height: 20%;
            line-height: 50px;
        }

        .content-footer ul > li{
            font-size: 10pt;
            width: 100%;
            height: 20%;
        }
    }
</style>

<footer class="iranyekan">
    <div class="social-icon">
        <h2>با ما در ارتباط باشید</h2>
        <ul>
            <li>
                <a href="<?= $telegram_link['link']; ?>">
                    <span style="background: url(public/images/telegram.png) center no-repeat"></span>
                </a>
            </li>
            <li>
                <a href="<?= $instagram_link['link']; ?>">
                    <span style="background: url(public/images/instagram.png) center no-repeat"></span>
                </a>
            </li>
            <li>
                <a>
                    <span style="background: url(public/images/youtube.png) center no-repeat"></span>
                </a>
            </li>
            <li>
                <a>
                    <span style="background: url(public/images/facebook.png) center no-repeat"></span>
                </a>
            </li>
        </ul>
    </div>
    <div class="content-footer">
        <ul>
            <?php
            foreach ($footerMenu as $row) {
                ?>
                <li>
                    <a href="<?= $row[0]['link'] ?>"><?= $row[0]['title'] ?></a>
                </li>
                <?php
            }
            ?>

<!--            <li>-->
<!--                <a>قوانین و مقررات</a>-->
<!--            </li>-->
<!--            <li>-->
<!--                <a>همکاری با ما</a>-->
<!--            </li>-->
<!--            <li>-->
<!--                <a>وبلاگ مقالات</a>-->
<!--            </li>-->
        </ul>
        <p>کلیه حقوق این وب سایت متعلق به برند مهسو است</p>
    </div>


</footer>
</body>
</html>