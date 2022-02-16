<?php

class blogCategory extends Controller
{
    function __construct()
    {

    }

    function index()
    {
        $blogs = $this->modelobject->getBlog();
        $result = ['blogs'=>$blogs,'title'=>'مجله مهسو','description'=>'وبلاگ و مجله مهسو دارای مقالات معتبر در زمینه مد و پوشاک است','canonical'=>URL.'blogcategory'];
        $this->view('blogcategory/index', $result);


    }

}

?>