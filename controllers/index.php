<?php

class Index extends Controller {
    function __construct()
    {

    }

    function index(){

        $slider = $this->modelobject->getSlider();
        $post = $this->modelobject->getPost();
        $carousel1 = $this->modelobject->getCatProduct('زنانه','women');
        $carousel2 = $this->modelobject->getCatProduct('مردانه','man');
        $result = ['slider'=>$slider,'women'=>$carousel1,'man'=>$carousel2,'content'=>$post,'title'=>' مهسو ، فروشگاه مد و پوشاک','description'=>'ارائه محصولات دست دوز و اصل با بهترین کیفیت.که می تجربه یک استایل خاص با مهسو','canonical'=>URL,'image'=>URL.'public/images/logo.png'];
        $this->view('index/index',$result);


    }
}

?>