<?php

class Profile extends Controller {


    function __construct()
    {
        parent::__construct();

        if ($this->userId==false){
            header('location:'.URL.'login/index');
        }

    }

    function index($addresstab=''){

        if ($addresstab=='addresstab'){
            $x= 'address';
        }else if (($addresstab=='ordertab')){
            $x='order';
        }else if ($addresstab==''){
            $x='';
        }

        $userInfo =$this->modelobject->getUserInfo($this->userId);
        $userOrder =$this->modelobject->getUserOrder($this->userId);
        $userAddress =$this->modelobject->getUserAddress($this->userId);
        $result = ['userInfo'=>$userInfo,'userOrder'=>$userOrder,'userAddress'=>$userAddress,'x'=>$x,'title'=>'اطلاعات حساب کاربری','canonical'=>URL.'profile'];
        $this->view('profile/index',$result);
    }


    function editProfileItem() {
        $this->modelobject->editProfileItem($_POST);


    }


    function deleteAddress($addressId)
    {

        $this->modelobject->deleteAddress($addressId);
        $address = $this->modelobject->getUserAddress($this->userId);
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
        $this->modelobject->editAddress($addressId, $data);
//        echo json_encode($address);
    }


    function addAddress()
    {
        if (!empty($_POST['family'])) {
            $data = $_POST;
        }

        $this->modelobject->addAddress($data);
        $address = $this->modelobject->getUserAddress($this->userId);
        echo json_encode($address);


    }


    function logout(){
        $this->modelobject->logout();
        header('location:'.URL.'index');
    }






}

?>