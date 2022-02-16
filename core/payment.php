<?php

class Payment
{

private $MerchantID = MerchantID;
private $CallbackURL = CallbackURL;

    function __construct()
    {
        require_once ('public/nusoap/nusoap.php');
    }

    function paymentReq($Amount,$Email,$Mobile,$Description){


//        $client = new SoapClient('https://www.zarinpal.com/pg/services/WebGate/wsdl', ['encoding' => 'UTF-8']);
        $client = new nusoap_client('https://www.zarinpal.com/pg/services/WebGate/wsdl','wsdl');
        $client->soap_defencoding='UTF-8';

        $result = $client->call('PaymentRequest',[
//        $result = $client->PaymentRequest([
            'MerchantID' => $this->MerchantID,
            'Amount' => $Amount,
            'Description' => $Description,
            'Email' => $Email,
            'Mobile' => $Mobile,
            'CallbackURL' => $this->CallbackURL,
        ]);

        return $result;


//        if ($result['Status'] == 100) {
//
//            return [$result['Authority'],$result['Status']];
//
//        } else {
//            echo 'ERR: ' . $result['Status'];
//
//        }

    }



    function paymentVerification($Amount,$Authority){


//        $client = new SoapClient('https://www.zarinpal.com/pg/services/WebGate/wsdl', ['encoding' => 'UTF-8']);
            $client = new nusoap_client('https://www.zarinpal.com/pg/services/WebGate/wsdl','wsdl');
            $client->soap_defencoding='UTF-8';


//        $result = $client->PaymentRequest([
            $result = $client->call('PaymentVerification',
                [
                    'MerchantID' => $this->MerchantID,
                    'Authority' => $Authority,
                    'Amount' => $Amount,
                ]
            );

            if ($result['Status'] == 100) {
                return [$result['RefId'],$result['Status']];
            } else {
                echo 'Transation failed. Status:'.$result['Status'];
            }


    }




}

?>