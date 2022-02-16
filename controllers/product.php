<?php

class product extends Controller {
    function __construct()
    {

    }

    function index($id){
        $product = $this->modelobject->getProduct($id)[0];
        $title = $product['title'];
        $image = $product['image'];
        $categoryId = $product['category'];
        $parents = $this->modelobject->getParent($categoryId);
        $color = $this->modelobject->getProduct($id)[1];
        $gallery = $this->modelobject->getGallery($id);
        $gallery=$this->modelobject->filterGallery($gallery);
        $Attr = $this->modelobject->getAttr($id);
        $comments = $this->modelobject->getComment($id);
        $products = $this->modelobject->getProducts();
        $result = ['product'=>$product,'color'=>$color,'gallery'=>$gallery,'Attr'=>$Attr,'parents'=>$parents,'comments'=>$comments,'products'=>$products,'title'=>$title,'canonical'=>URL.'product/index/'.$id,'image'=>URL.'public/images/products/'.$id.'/'.$image];
        $this->view('product/index',$result);
    }



    function addToBasket($idproduct,$idcolor){

        $this->modelobject->addToBasket($idproduct,$idcolor);
    }


    function addComment($idProduct){
        if (!empty($_POST['title']) and !empty($_POST['family']) and !empty($_POST['rating']) and !empty($_POST['description'])){
            $this->modelobject->addComment($_POST,$idProduct);
            echo 'your comment has been received!';
        }else{
            echo 'one of fields is empty!';
        }

    }








}

?>