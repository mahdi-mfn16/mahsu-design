<?php

class showaddress extends Controller
{
    function __construct()
    {


        Model::sessionInit();
        $check = Model::getSession('userId');

        $object = new Model();
        $basket = $object->getBasket()[0];
        if (sizeof($basket)<1){
            header('location:'.URL.'showcart');
        }
        elseif ($check==false){
            header('location:'.URL.'showlogin');
        }
    }

    function index()
    {

        $address = $this->modelobject->getAddress();
        $postType = $this->modelobject->getPostType();
        $result = ['address' => $address,'postType' => $postType,'title'=>'تکمیل اطلاعات سفارش و ارسال','canonical'=>URL.'showaddress'];

        $this->view('showaddress/index', $result);


    }

    function addAddress()
    {
        if (!empty($_POST['family'])) {
            $data = $_POST;
        }

        $this->modelobject->addAddress($data);
        $address = $this->modelobject->getAddress();
        echo json_encode($address);


    }

    function deleteAddress($addressId)
    {

        $this->modelobject->deleteAddress($addressId);
        $address = $this->modelobject->getAddress();
        echo json_encode($address);

    }


    function viewAddress($addressId)
    {

        $addressInfo = $this->modelobject->getAddressInfo($addressId);
        echo json_encode($addressInfo);


    }

    function editAddress($addressId)
    {
        $data = $_POST;
        $address = $this->modelobject->editAddress($addressId, $data);
        echo json_encode($address);
    }


    function setAddressSession($addressId){
        $addressSession = $this->modelobject->setAddressSession($addressId);
        return $addressSession;
    }

    function setPostTypeSession($postTypeId){
        $addressSession = $this->modelobject->setPostTypeSession($postTypeId);
        return $addressSession;
    }


}

?>