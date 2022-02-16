<?php

class admincolor extends Controller
{

    function __construct()
    {
        parent::__construct();
    }


    function index()
    {
        if (isset($_POST['ids'])) {
            $ids = $_POST['ids'];
            $this->modelobject->deleteColor($ids);
        }
        $color = $this->modelobject->getColor();
        $result = ['color' => $color];
        $this->view('admin/color/index', $result, 1);
    }

//
//
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