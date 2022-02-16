<?php

class showfinal extends Controller {
    function __construct()
    {
        $object = new Model();
        $basket = $object->getBasket()[0];

        Model::sessionInit();
        $check = Model::getSession('userId');
        $addressSession = Model::getSession('addressId');
        if (sizeof($basket)<1){
            header('location:'.URL.'showcart');
        }
        elseif ($addressSession==false){
            header('location:'.URL.'showaddress');
        }
        elseif ($check==false){
            header('location:'.URL.'showlogin');
        }

    }

    function index(){
        $basket = $this->modelobject->getBasket();
        $paymentType = $this->modelobject->getPaymentType();
        $addressInfo = $this->modelobject->allSessionGet()[0];
        $postInfo = $this->modelobject->allSessionGet()[1];
        $result = ['basket'=>$basket,'addressInfo'=>$addressInfo,'postInfo'=>$postInfo,'paymentType'=>$paymentType,'title'=>'بررسی نهایی سفارش و پرداخت','canonical'=>URL.'showfinal'];
        $this->view('showfinal/index',$result);


    }

    function saveOrder(){
        $this->modelobject->saveOrder($_POST);

    }

}

?>