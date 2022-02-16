<?php

class post extends Controller {
    function __construct()
    {

    }

    function index($slug){
        $content = $this->modelobject->getPost($slug);
        $id= $content['id'];
        $title = $content['title'];
        $description = $content['description'];
        $image = $content['image'];
        $blogs = $this->modelobject->getBlog();
        $products = $this->modelobject->getProduct();
        $result = ['content'=>$content,'blogs'=>$blogs,'products'=>$products,'title'=>$title,'description'=>$description,'canonical'=>URL.'post/index/'.$slug,'image'=>URL.'public/images/posts/'.$id.'/main/'.$image];
        $this->view('post/index',$result);


    }



}

?>