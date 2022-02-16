<?php

class showcart extends Controller {
    function __construct()
    {


    }

    function index(){

        $basket = $this->modelobject->getBasket()[0];
        $result = ['basket'=>$basket,'title'=>'سبد خرید','canonical'=>URL.'showcart'];
        $this->view('showcart/index',$result);
    }


    function deleteBasket($idproduct){
        $this->modelobject->deleteBasket($idproduct);
        $basket = $this->modelobject->getBasket()[0];
        echo json_encode($basket);

    }

    function updateBasket($idproduct,$numberproduct){
        $this->modelobject->updateBasket($idproduct,$numberproduct);
        $basket = $this->modelobject->getBasket()[0];
        echo json_encode($basket);

    }

}

?>