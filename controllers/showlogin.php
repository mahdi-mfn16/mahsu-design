<?php

class showlogin extends Controller {
    function __construct()
    {

        Model::sessionInit();
        $check = Model::getSession('userId');
        if ($check!=false){
            header('location:'.URL.'showaddress');
        }

    }

    function index(){
        $result = ['title'=>'ورود / ثبت نام در مهسو','canonical'=>URL.'showlogin'];
        $this->view('showlogin/index',$result);


    }
}

?>