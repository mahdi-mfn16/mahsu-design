<?php

class admincontent extends Controller
{

    function __construct()
    {
        parent::__construct();
    }


    function index()
    {
        if (isset($_POST['ids']) and isset($_POST['action-form'])){
            $this->modelobject->actionContent($_POST);
        }

        $content = $this->modelobject->getContent();
        $result = ['content' => $content];
        $this->view('admin/content/index', $result, 1);
    }

//
//
    function addContent($idcontent='')
    {
        if (isset($_POST['title']) and isset($_FILES['image-file'])) {
            $this->modelobject->addContent($_FILES,$_POST,$idcontent);
            header('location:'.URL.'admincontent/index');

        }

        $result=[];
        if ($idcontent!='') {
            $content = $this->modelobject->ContentInfo($idcontent);
            $result = ['content'=>$content];
        }
        $this->view('admin/content/addcontent', $result, 1);

    }
}


?>