<?php

class adminmaterial extends Controller
{

    function __construct()
    {
        parent::__construct();
    }


    function index()
    {
        if (isset($_POST['ids'])) {
            $ids = $_POST['ids'];
            $this->modelobject->deleteMaterial($ids);
        }
        $material = $this->modelobject->getMaterial();
        $result = ['material' => $material];
        $this->view('admin/material/index', $result, 1);
    }

//
//
    function addMaterial($idmaterial='')
    {
        if (isset($_POST['title'])) {
            $params = ['title'=>$_POST['title']];
            $this->modelobject->addMaterial($params,$idmaterial);
            header('location:'.URL.'/adminmaterial/index');

        }

        $result=[];
        if ($idmaterial!='') {
            $material = $this->modelobject->materialInfo($idmaterial);
            $result = ['material'=>$material];
        }
        $this->view('admin/material/addmaterial', $result, 1);

    }
}


?>