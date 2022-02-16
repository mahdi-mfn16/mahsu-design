<?php

class model_verifypay extends Model
{


    function __construct()
    {
        parent::__construct();


    }


    function zarinPalVerifyPay($data){

//        $Status = $data['Status'];
        $Authority = $data['Authority'];
        $sql = 'select * from order_table where before_pay_code = ?';
        $result = $this->doSelect($sql,[$Authority],1);
        $Amount = $result['total_price'];

        $payment = new Payment;
        $pay_result = $payment->paymentVerification($Amount,$Authority);
        $RefID = $pay_result[0];
        $Status2 = $pay_result[1];

        if ($Status2==100){

        $sql1 = 'update order_table set after_pay_code=? WHERE before_pay_code=?';
        $stmt = self::$connect->prepare($sql1);
        $stmt->bindValue(1,$RefID);
        $stmt->bindValue(2,$Authority);
        $stmt->execute();

        $sql = 'select * from order_table where after_pay_code = ?';
        $order_result = $this->doSelect($sql,[$RefID],1);

        return $order_result;


        }else{
            return 'Error';
        }



    }






}

?>