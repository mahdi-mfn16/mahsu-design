<?php

class adminproduct extends Controller
{

    function __construct()
    {
        parent::__construct();
    }


    function index()
    {
        if (isset($_POST['ids'])) {
            $ids = $_POST['ids'];
            $this->modelobject->deleteProduct($ids);
        }
        $product = $this->modelobject->getProduct();
        $result = ['product' => $product];
        $this->view('admin/product/index', $result, 1);
    }

//
//
    function addProduct($idproduct = '')
    {
        if (isset($_POST['title'])) {
            $params = ['title' => $_POST['title'], 'code' => $_POST['code'], 'price' => $_POST['price'], 'available' => $_POST['available'], 'short_description' => $_POST['short_description'], 'long_description' => $_POST['long_description'], 'category' => $_POST['category'], 'color' => $_POST['color'], 'material' => $_POST['material'], 'care_method' => $_POST['care_method']];
            $this->modelobject->addProduct($params, $idproduct);
            header('location:' . URL . '/adminproduct/index');

        }
        $color = $this->modelobject->getColor();
        $material = $this->modelobject->getMaterial();
        $category = $this->modelobject->getCategory();
        $gallery = $this->modelobject->getGallery($idproduct);
        $result = ['color' => $color, 'material' => $material, 'category' => $category,'gallery'=>$gallery];
        if ($idproduct != '') {
            $product = $this->modelobject->productInfo($idproduct);
            $result = ['color' => $color, 'material' => $material, 'category' => $category, 'productinfo' => $product,'gallery'=>$gallery];
        }
        $this->view('admin/product/addproduct', $result, 1);

    }


    function showAttr($idproduct)
    {
        if (isset($_POST['ids'])) {
            $ids = $_POST['ids'];
            $this->modelobject->deleteProductAttr($ids);
        }
        $attr = $this->modelobject->getAttr($idproduct);
        $result = ['attr' => $attr, 'idproduct' => $idproduct];
        $this->view('admin/product/productattr', $result, 1);

    }

    function addProductAttr($idproduct, $idproductattr = '')
    {
        if (isset($_POST['attrid'])) {
            $params = ['attrid' => $_POST['attrid'], 'val' => $_POST['val']];
            $this->modelobject->addProductAttr($params, $idproduct, $idproductattr);
            header('location:' . URL . '/adminproduct/showattr/' . $idproduct . '');

        }
        $attrs = $this->modelobject->getAttrs();
        $result = ['idproduct' => $idproduct, 'attrs' => $attrs];
        $productattrinfo = $this->modelobject->productAttrInfo($idproductattr);
        if ($idproductattr != '') {
            $result = ['idproduct' => $idproduct, 'attrs' => $attrs, 'productattrinfo' => $productattrinfo];
        }
        $this->view('admin/product/addproductattr', $result, 1);

    }

    function showGallery($idproduct)
    {
        if (isset($_POST['ids'])) {
            $ids = $_POST['ids'];
            $this->modelobject->deleteProductGallery($ids);
        }
        if (isset($_POST['main-image'])) {
            $mainimage = $_POST['main-image'];
            $this->modelobject->selectMainImage($mainimage,$idproduct);
        }
        $gallery = $this->modelobject->getGallery($idproduct);
        $result = ['gallery' => $gallery, 'idproduct' => $idproduct];
        $this->view('admin/product/productgallery', $result, 1);

    }


    function addProductGallery($idproduct)
    {
        if (isset($_FILES['imagefile0']) and isset($_FILES['imagefile1'])) {
            $this->modelobject->addProductGallery($_FILES, $idproduct);
            header('location:' . URL . '/adminproduct/showgallery/' . $idproduct . '');

        }
        $result = ['idproduct' => $idproduct];
        $this->view('admin/product/addproductgallery', $result, 1);

    }
}


?>