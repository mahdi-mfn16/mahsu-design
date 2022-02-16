<?php

class Login extends Controller
{
    function __construct()
    {
        parent::__construct();

        if ($this->userId!=false){
            header('location:'.URL.'index');
        }
    }

    function index()
    {

        $result = ['title'=>'ورود / ثبت نام در مهسو','canonical'=>URL.'login'];
        $this->view('login/index', $result);
    }

    function checkUser()
    {

        $loginform = $_POST;
        $this->modelobject->checkUser($loginform);
        @Model::sessionInit();
        $check = Model::getSession('userId');
        if (!isset($_POST['buy'])) {
            if ($check == false) {
                header('location:' . URL . 'login/index');
            } else {
                header('location:' . URL . 'index');
            }
        }else {
                header('location:' . URL . 'showlogin/index');

        }
    }


    function registerUser()
    {

        if (isset($_POST['rules'])) {
            $data = $_POST;
            $check = $this->modelobject->registerUser($data);
            return $check;
        }else{
            echo 'check rules';
        }


    }


    function saveUser()
    {

        if (!empty($_POST['code'])) {
            $data = $_POST;
            $check = $this->modelobject->saveUser($data);
            echo $check;

        }else{
            echo 'Enter code';
        }

    }


    function controlUser()
    {
        if (!empty($_POST['passwordnew']) and !empty($_POST['tel-mobile']) and !empty($_POST['passwordnew2']) and strlen($_POST['passwordnew'])>=8 and preg_match("#[a-z]+#",$_POST['passwordnew']) and preg_match("#[0-9]+#",$_POST['passwordnew'])) {

            $data = $_POST;
            $check = $this->modelobject->controlUser($data);
            return $check;
        }else{
            echo 'one of fields is Empty';
        }


    }


    function changePassword()
    {

        if (!empty($_POST['code-login'])) {
            $data = $_POST;
            $check = $this->modelobject->changePassword($data);
            echo $check;

        }else{
            echo 'Enter code';
        }

    }
}

?>