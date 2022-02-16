
var verifysection = $('.verify-section');
var registersection = $('#register-button');
var registerbutton = $('#register-button button');
var registerfinal = $('#verify-button button');
var registershowbutton =$('#register-show');
var register = $('.register');
var login = $('.login');
var checkregister = '';
if ($(window).width() > 850) {
    registershowbutton.click(function () {
        registershowbutton.hide();
        login.css('float', 'right');
        login.css('margin', '0.5%');
        login.css('opacity', '0.5');
        login.css('pointer-events','none');
        register.fadeIn(100);
    })
}

if ($(window).width() < 850) {
    registershowbutton.click(function () {
        registershowbutton.hide();
        login.hide();
        register.css('float','none');
        register.css('margin','0.5% auto');
        register.show();
    })
}
registerbutton.click(function () {

    registerUser();


});

function registerUser() {

    var url = 'login/registeruser';
    var data = $('#register-user').serializeArray();
    // console.log(data);
    $.post(url,data,function (msg) {

        if (msg=='ok') {

            registersection.hide();
            verifysection.show();
            $('#register-user').css('pointer-events','none');
        }
    })



}
registerfinal.click(function () {

    verifyRegister();

});

function verifyRegister() {

    var url = 'login/saveuser';
    var data = $('#register-user').serializeArray();
    var code = $('#verify-user input[name=code]').val();
    data.push({'name':'code','value':code});

    $.post(url,data,function (msg) {

        if (msg=='ok'){
            window.location.href = "index";
        }


    })

}


////////////////////////////////////////////////////


var containLogin = $('.contain-login');
function forgetPassword() {

    containLogin.html('');
    var forgetTag = '<form id="forget-pass" method="post"><label>شماره موبایل*</label><input type="tel" placeholder="09301235678" name="tel-mobile"><label>رمز عبور جدید خود را وارد نمایید*</label><input type="password" placeholder="حداقل 8 کاراکتر" name="passwordnew"><label>رمز عبور جدید خود را تکرار نمایید*</label><input type="password" placeholder="********" name="passwordnew2"></form><a class="confirm-button forget"><button class="iranyekan">تایید کلمه عبور</button></a><div class="verify-section-login"><form id="verify-user-login" method="post"><p>کد ارسال شده به شماره موبایل خود را وارد نمایید</p><input name="code-login" class="verify-code" type="text" placeholder="123456"></form><a class="confirm-button" id="verify-button-login"><button class="iranyekan">ورود</button></a></div>';
    containLogin.append(forgetTag);
    var verifyforgetsection = $('.verify-section-login');
    var forgetpasswordbutton = $('.confirm-button.forget');
    var forgetbutton = $('.confirm-button.forget button');
    var changefinal = $('#verify-button-login button');
    forgetbutton.click(function () {

        controlUser();


    });

    function controlUser() {

        var url = 'login/controluser';
        var data = $('#forget-pass').serializeArray();
        //
        $.post(url,data,function (msg) {
            // console.log(msg);
            if (msg=='ok') {

                forgetpasswordbutton.hide();
                verifyforgetsection.show();
                $('#forget-pass').css('pointer-events','none');
                login.css('height','550px');
                login.find('> div').css('top','10%');
            }
        })



    }


    changefinal.click(function () {

        changePassword();

    });

    function changePassword() {

        var url = 'login/changepassword';
        var data = $('#forget-pass').serializeArray();
        var codelogin = $('#verify-user-login input[name=code-login]').val();
        data.push({'name':'code-login','value':codelogin});

        $.post(url,data,function (msg) {
            console.log(msg);
            if (msg=='ok'){
                window.location.href = "index";
            }


        })

    }


}