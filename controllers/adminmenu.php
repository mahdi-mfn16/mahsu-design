<?php

class adminmenu extends Controller
{

    function __construct()
    {
        parent::__construct();
    }


    function index()
    {
        if (isset($_POST['ids'])) {
            $ids = $_POST['ids'];
            $this->modelobject->deleteMenu($ids);
        }
        $menu = $this->modelobject->getMenu();
        $result = ['menu' => $menu];
        $this->view('admin/menu/index', $result, 1);
    }

//
//
    function addMenu($idMenu='')
    {
        if (isset($_POST['title'])) {
            $this->modelobject->addMenu($_POST,$idMenu);
            header('location:'.URL.'adminmenu/index');

        }
        $mainMenu = $this->modelobject->mainMenu();
        $result=['mainMenu'=>$mainMenu];
        if ($idMenu!='') {
            $menu = $this->modelobject->MenuInfo($idMenu);
            $result = ['menu'=>$menu,'mainMenu'=>$mainMenu];
        }
        $this->view('admin/menu/addtomenu', $result, 1);

    }
}


?>