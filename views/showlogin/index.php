<link href="views/showlogin/showlogin.css" rel="stylesheet">
<meta name="robots" content="noindex, nofollow">
<div class="nav-buy iranyekan">
    <div class="progress-nav">
        <ul>
            <li>
                <span class="line"></span>
                <div class="contain-circle">
                    <span class="circle active"></span>
                </div>
                <span class="line"></span>
            </li>
            <li>
                <span class="line"></span>
                <div class="contain-circle">
                    <span class="circle ready"></span></div>
                <span class="line"></span>
            </li>
            <li>
                <span class="line"></span>
                <div class="contain-circle">
                    <span class="circle"></span></div>
                <span class="line"></span>
            </li>
            <li>
                <span class="line"></span>
                <div class="contain-circle">
                    <span class="circle"></span></div>
                <span class="line"></span>
            </li>

        </ul>
        <ul>
            <li>
                <p class="active">تایید سبد خرید</p>
            </li>
            <li>
                <p class="ready">ورود به حساب کاربری</p>
            </li>
            <li>
                <p>ثبت اطلاعات ارسال</p>
            </li>
            <li>
                <p>ثبت نهایی و پرداخت</p>
            </li>
        </ul>
    </div>

</div>


<div id="main" class="iranyekan">
    <h1>ورود / ثبت نام</h1>
    <div class="login">
        <div class="contain-login">
            <form method="post" action="login/checkuser">
                <label>شماره موبایل*</label>
                <input type="tel" placeholder="09301235678" name="mobile">
                <label>رمز عبور*</label>
                <input type="password" placeholder="********" name="password">
                <input type="hidden" name="buy" value="1">
                <a onclick="forgetPassword()">رمز عبور خود را فراموش کرده اید؟</a>
                <a class="confirm-button">
                    <button class="iranyekan">ورود</button>
                </a>
            </form>
            <button id="register-show" class="iranyekan">ثبت نام در مهسو</button>

        </div>
    </div>
    <div class="register">
        <div>

            <form id="register-user" method="post">
                <div>
                    <label>نام*</label>
                    <input name="first_name" type="text" placeholder="مهدی">
                    <label>شماره موبایل*</label>
                    <input name="mobile" type="tel" placeholder="09301235678">
                    <label>رمز عبور*</label>
                    <input name="password" type="password" placeholder="حداقل 8 کاراکتر">
                </div>
                <div>
                    <label>نام خانوادگی*</label>
                    <input name="family" type="text" placeholder="فیروزی">
                    <label>ایمیل(اختیاری)</label>
                    <input name="gmail" type="email" placeholder="mehdimfn162@gmail.com">
                    <label>تکرار رمز عبور*</label>
                    <input name="password2" type="password" placeholder="رمز عبور را مجددا وارد نمایید">
                </div>
                <input name="rules" class="checkbox-register" type="checkbox" value="yes">
                <p class="roles">قوانین و شرایط خرید از وب سایت مهسو را مطالعه نمودم و با آن موافقم </p>
            </form>
            <a id="register-button" class="confirm-button">
                <button class="iranyekan">ثبت نام</button>
            </a>

            <div class="verify-section">
                <form id="verify-user" method="post">
                    <p>کد ارسال شده به شماره موبایل خود را وارد نمایید</p>
                    <input name="code" class="verify-code" type="text" placeholder="123456">
                </form>
                <a class="confirm-button" id="verify-button">
                    <button class="iranyekan">تایید</button>
                </a>
            </div>

        </div>
    </div>


</div>

<script src="views/showlogin/showlogin.js"></script>