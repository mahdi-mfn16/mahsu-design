<?php

class Category extends Controller
{
    function __construct()
    {

    }

    function index($categorySlug = '')
    {
        $keyword = '';
        if (isset($_GET['keyword'])){
            $keyword = $_GET['keyword'];
        }

        $products = $this->modelobject->getPtoducts($categorySlug,'','','',$keyword)[0];
        $colors = $this->modelobject->getColors();
        $materials = $this->modelobject->getMaterials();
        if ($categorySlug != '') {

            $categoryInfo = $this->modelobject->getPtoducts($categorySlug)[1];
            $categoryTitle = $categoryInfo['title'];
            $parentId = $categoryInfo['parent'];
            $categoryId = $categoryInfo['id'];
            $parentInfo = $this->modelobject->getParent($parentId);
            if (sizeof($parentInfo) > 0) {
                $childerenInfo = $this->modelobject->getChilderen($parentId);
            } else {
                $childerenInfo = $this->modelobject->getChilderen($categoryId);
            }

            $data = ['products' => $products, 'colors' => $colors, 'materials' => $materials, 'categorySlug' => $categorySlug, 'categoryTitle' => $categoryTitle, 'parentInfo' => $parentInfo, 'childerenInfo' => $childerenInfo,'title'=>$categoryTitle,'canonical'=>URL.'category/index/'.$categorySlug];

        }else{
            $childerenInfo = $this->modelobject->getChilderen();
            $data = ['products' => $products, 'colors' => $colors, 'materials' => $materials, 'categorySlug' => $categorySlug, 'categoryTitle' => '', 'parentInfo' => '', 'childerenInfo' => $childerenInfo,'title'=>'فروشگاه محصولات مهسو','canonical'=>URL.'category'];
        }



        $this->view('category/index', $data);


    }


    function doFilter($slug = '')
    {

        $result = $this->modelobject->doFilter($_POST, $slug);
        echo json_encode($result);

    }
}

?>