<?php

class adminusers extends Controller
{

    function __construct()
    {
        parent::__construct();
    }


    function index()
    {
        if (isset($_POST['ids'])) {
            $ids = $_POST['ids'];
            $this->modelobject->deleteUsers($ids);
        }
        $users = $this->modelobject->getUsers();
        $result = ['users' => $users];
        $this->view('admin/users/index', $result, 1);
    }

    function address($idUser='')
    {
        if (isset($_POST['ids'])) {
            $ids = $_POST['ids'];
            $this->modelobject->deleteAddress($ids);
        }
        $address = $this->modelobject->getAddress($idUser);
        $result = ['address'=>$address];
        $this->view('admin/users/address', $result, 1);

    }


    function order($idUser='')
    {
        if (isset($_POST['ids'])) {
            $ids = $_POST['ids'];
            $this->modelobject->deleteOrders($ids);
        }
        $order = $this->modelobject->getOrder($idUser);
        $result = ['order'=>$order];
        $this->view('admin/users/order', $result, 1);

    }




    function addColor($idcolor='')
    {
        if (isset($_POST['title'])) {
            $params = ['title'=>$_POST['title'],'hex'=>$_POST['hex']];
            $this->modelobject->addColor($params,$idcolor);
            header('location:'.URL.'/admincolor/index');

        }

        $result=[];
        if ($idcolor!='') {
            $color = $this->modelobject->ColorInfo($idcolor);
            $result = ['color'=>$color];
        }
        $this->view('admin/color/addcolor', $result, 1);

    }


}


?>