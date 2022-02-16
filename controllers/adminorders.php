<?php

class adminorders extends Controller
{

    function __construct()
    {
        parent::__construct();
    }


    function index()
    {
        if (isset($_POST['ids'])) {
            $ids = $_POST['ids'];
            $this->modelobject->deleteOrders($ids);
        }
        $order = $this->modelobject->getOrder();
        $result = ['order'=>$order];
        $this->view('admin/orders/index', $result, 1);
    }


}


?>