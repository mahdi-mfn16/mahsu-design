<?php

class model_category extends Model
{


    function __construct()
    {
        parent::__construct();


    }

    function getPtoducts($categorySlug,$price='',$colorIds='',$materialIds='',$keyword=''){

        $priceStr = '';
        $keywordStr = '';

        if ($price!=''){
            $priceStr = 'and price >= '.$price[0].' and price <= '.$price[1].'';
        }

        if ($keyword!=''){
            $keywordStr = 'and title like "%'.$keyword.'%" ';

        }


        if ($categorySlug==''){
            $sql1 = 'select * from product_table where 1=1 '.$priceStr.$keywordStr;

            $result = $this->doSelect($sql1);
            $category='';



        }else{
            $sql = 'select * from category_table where slug = ?';
            $category = $this->doSelect($sql,[$categorySlug],1);
            $categoryId = $category['id'];
            $childerenIds = $this->getChilderen($categoryId);
            $ids = [$categoryId];
            if (sizeof($childerenIds)>0){
                foreach ($childerenIds as $row){
                    array_push($ids,$row['id']);
                }
            }

            $ids = join(',', $ids);
            $sql1 = 'select * from product_table where category IN ('.$ids.')'.$priceStr;
            $result = $this->doSelect($sql1);

        }

        if ($colorIds!=''){


            foreach ($result as $key=>$row){
                $colors = explode(',',$row['color']);
                $existColor = array_intersect($colorIds,$colors);
                if (sizeof($existColor)== 0 ){

                    unset($result[$key]);

                }
            }

        }

        if ($materialIds!=''){

            foreach ($result as $key=>$row){
                $materials = explode(',',$row['material']);
                $existMaterial = array_intersect($materialIds,$materials);
                if (sizeof($existMaterial)== 0 ){

                    unset($result[$key]);

                }
            }


        }
        $result = array_filter($result);


        return [$result,$category];



    }


    function getChilderen($categoryId=''){

        if ($categoryId!='') {

            $sql = 'select * from category_table where parent = ?';
            $result = $this->doSelect($sql, [$categoryId]);
        }else{
            $sql = 'select * from category_table where parent = ?';
            $result = $this->doSelect($sql, [0]);
        }
        return $result;

    }


    function getColors(){
        $sql = 'select * from color_table';
        $result = $this->doSelect($sql);
        return $result;
    }

    function getMaterials(){
        $sql = 'select * from material_table';
        $result = $this->doSelect($sql);
        return $result;
    }


    function doFilter($data,$categorySlug){
        if($data['price']!='') {
            $price = explode(' ', $data['price']);
            $minPrice = $price[0];
            $maxPrice = $price[6];
            $price = [$minPrice, $maxPrice];
        }else{
            $price='';
        }
       if (isset($data['color'])){
           $colorIds =$data['color'];
       }else{
           $colorIds ='';
       }

        if (isset($data['material'])){
            $materialIds =$data['material'];
        }else{
            $materialIds ='';
        }

        $products = $this->getPtoducts($categorySlug,$price,$colorIds,$materialIds)[0];
       return $products;

    }


    function getParent($parentId){

        $parents = [];
        while ($parentId > 0) {
            $sql = 'select * from category_table where id=?';
            $params = [$parentId];
            $result = $this->doSelect($sql, $params, 1);
            array_push($parents, $result);
            $parentId = $result['parent'];
        }
        $parents = array_reverse($parents);

        return $parents;

    }


//    function keywordSearch($keyword){
//        $products = $this->getPtoducts('','','','',$keyword)[0];
//
//    }








}

?>