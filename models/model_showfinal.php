<?php

class model_showfinal extends Model
{


    function __construct()
    {
        parent::__construct();
        require ('public/jdf.php');

    }


    function allSessionGet(){
        @self::sessionInit();
        $addressInfo = self::getSession('addressId');
        $addressInfo = unserialize($addressInfo);
        $postTypeInfo = self::getSession('postTypeId');
        $postTypeInfo = unserialize($postTypeInfo);
        return [$addressInfo,$postTypeInfo];
    }


    function getPaymentType(){
        $sql = 'select * from payment_type_table';
        $result = $this->doSelect($sql);
        return $result;
    }


    function saveOrder($payType){
        @self::sessionInit();
        $addressInfo = self::getSession('addressId');
        $postTypeInfo = self::getSession('postTypeId');
        $postInfo = unserialize($postTypeInfo);
        $userId = self::getSession('userId');
        $payTypeId = $payType['pay-type'];
        $basket = $this->getBasket()[0];
        $basket = serialize($basket);
        $basketPrice = $this->getBasket()[1];
        $totalPrice = $basketPrice + $postInfo['price'];
        $time = jdate('j F Y');
        date_default_timezone_set('Asia/Tehran');
        $clock = date('H:i:s');
        $time = $time.' '.$clock;



        if ($payTypeId==1){ //zarinpal//

            $payment = new Payment;
            $result = $payment->paymentReq($totalPrice,$Email='',$Mobile='',$Description='');
//            echo $result['Status'];

//            $Authority = $result[0];
//            $Status = $result[1];
//            if ($Status==100){
//                $sql = 'insert into order_table (user_id,basket,address,post_type,payment_type_id,total_price,before_pay_code,date_order) VALUES (?,?,?,?,?,?,?,?)';
//                $stmt = self::$connect->prepare($sql);
//                $stmt->bindValue(1,$userId);
//                $stmt->bindValue(2,$basket);
//                $stmt->bindValue(3,$addressInfo);
//                $stmt->bindValue(4,$postTypeInfo);
//                $stmt->bindValue(5,$payTypeId);
//                $stmt->bindValue(6,$totalPrice);
//                $stmt->bindValue(7,'100');
//                $stmt->bindValue(8,$time);
//                $stmt->execute();
//
//                echo'<script type="text/javascript" src="https://cdn.zarinpal.com/zarinak/v1/checkout.js"></script><script>Zarinak.setAuthority(' .$Authority. ');Zarinak.open();</script>';
//
//            }else{
//            echo $Status;
//            }

        }












    }







}

?>