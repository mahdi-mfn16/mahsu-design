<?php

class adminslider extends Controller
{

    function __construct()
    {
        parent::__construct();
    }


    function index()
    {
        if (isset($_POST['ids'])) {
            $ids = $_POST['ids'];
            $this->modelobject->deleteSlider($ids);
        }
        $slider = $this->modelobject->getSlider();
        $result = ['slider' => $slider];
        $this->view('admin/slider/index', $result, 1);
    }

//
//
    function addSlider($idSlider='')
    {
        if (isset($_POST['title']) and isset($_FILES['image-file'])) {
            $this->modelobject->addSlider($_FILES,$_POST,$idSlider);
            header('location:'.URL.'adminslider/index');

        }

        $result=[];
        if ($idSlider!='') {
            $slider = $this->modelobject->SliderInfo($idSlider);
            $result = ['slider'=>$slider];
        }
        $this->view('admin/slider/addslider', $result, 1);

    }
}


?>