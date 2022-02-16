<?php

class admincategory extends Controller
{

    function __construct()
    {
        parent::__construct();
    }


    function index()
    {
        if (isset($_POST['ids'])) {
            $ids = $_POST['ids'];
            $this->modelobject->deleteCategory($ids);
        }
        $category = $this->modelobject->getCategory(0);
        $result = ['category' => $category, 'parents' => [], 'idcategory' => ''];
        $this->view('admin/category/index', $result, 1);
    }

    function showChilderen($idcategory)
    {
        if (isset($_POST['ids'])) {
            $ids = $_POST['ids'];
            $this->modelobject->deleteCategory($ids);
        }
        $category = $this->modelobject->getChilderen($idcategory);
        $parents = $this->modelobject->getParents($idcategory);
        $result = ['category' => $category, 'parents' => $parents, 'idcategory' => $idcategory];
        $this->view('admin/category/index', $result, 1);
    }

    function addCategory($idcategory = '', $edit = '')
    {
        if (isset($_POST['title'], $_POST['slug'])) {
            $title = $_POST['title'];
            $slug = $_POST['slug'];
            $parent = $_POST['parent'];
            $params = ['title' => $title, 'slug' => $slug, 'parent' => $parent, 'edit' => $edit, 'idcategory' => $idcategory];
            $this->modelobject->addCategory($params);
        }
        $category = $this->modelobject->getCategory();
        $thisCategory = $this->modelobject->categoryInfo($idcategory);

        $result = ['category' => $category, 'edit' => $edit, 'thiscategory' => $thisCategory, 'idcategory' => $idcategory];
        $this->view('admin/category/addcategory', $result, 1);

    }
}


?>