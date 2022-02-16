<?php

class Verifypay extends Controller
{
    function __construct()
    {
        parent::__construct();

    }

    function index()
    {

        if (!isset($_GET['Authority'])) {
            $zarinverifyPay = $this->modelobject->zarinPalVerifyPay($_GET);
            $result = ['orderInfo' => $zarinverifyPay,'title'=>'نتیجه پرداخت سفارش'];
            $this->view('verifypay/index', $result=[]);
        }
    }


}

?>