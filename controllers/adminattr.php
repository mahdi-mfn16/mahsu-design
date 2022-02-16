<?php

class adminattr extends Controller
{

    function __construct()
    {
        parent::__construct();
    }


    function index()
    {
        if (isset($_POST['ids'])) {
            $ids = $_POST['ids'];
            $this->modelobject->deleteAttr($ids);
        }
        $attr = $this->modelobject->getAttr();
        $result = ['attr' => $attr];
        $this->view('admin/attr/index', $result, 1);
    }

//
//
    function addAttr($idattr='')
    {
        if (isset($_POST['title'])) {
            $params = ['title'=>$_POST['title']];
            $this->modelobject->addAttr($params,$idattr);
            header('location:'.URL.'/adminattr/index');

        }

        $result=[];
        if ($idattr!='') {
            $attr = $this->modelobject->attrInfo($idattr);
            $result = ['attr'=>$attr];
        }
        $this->view('admin/attr/addattr', $result, 1);

    }
}


?>