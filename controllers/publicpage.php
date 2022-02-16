<?php

class publicpage extends Controller {
    function __construct()
    {

    }

    function index($slug){
        $content = $this->modelobject->getPage($slug);
        $id= $content['id'];
        $title = $content['title'];
        $description = $content['description'];
        $image = $content['image'];
        $result = ['content'=>$content,'title'=>$title,'description'=>$description,'canonical'=>URL.'publicpage/index/'.$slug,'image'=>URL.'public/images/posts/'.$id.'/main/'.$image];
        $this->view('publicpage/index',$result);


    }


}

?>