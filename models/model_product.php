<?php

class model_product extends Model
{


    function __construct()
    {
        parent::__construct();
        require ('public/jdf.php');

    }


    function getProduct($id)
    {
        $sql = 'select product_table.*,gallery_table.id as galleryid,gallery_table.title as gallerytitle,gallery_table.main
from product_table
JOIN gallery_table ON product_table.id = gallery_table.product
where product_table.id=?';
        $params = [$id];
        $result = $this->doSelect($sql, $params, 1);
        $color = explode(',',$result['color']);
        $productColor=[];
        foreach ($color as $row){
            $sql1 = 'select * from color_table where id = ?';
            $params = [$row];
            $colorItem = $this->doSelect($sql1, $params,1);
            array_push($productColor,$colorItem);
        }

        return [$result,$productColor];
    }


    function addToBasket($idproduct,$idcolor)
    {
        $cookie = Model::getBasketCookie();
        $sql1 = 'select * from basket_table where id_product = ? and cookie = ? and color = ?';
        $params = [$idproduct, $cookie, $idcolor];
        $basketItem = $this->doSelect($sql1, $params);

        if (isset($basketItem[0])) {

            $sql = 'update basket_table set number_product=number_product+1 where cookie = ? and id_product = ? and color = ?';

        } else {

            $sql = 'insert into basket_table (cookie,id_product,number_product,color) VALUES (?,?,1,?)';

        }

        $stmt = self::$connect->prepare($sql);
        $stmt->bindValue(1, $cookie);
        $stmt->bindValue(2, $idproduct);
        $stmt->bindValue(3, $idcolor);
        $stmt->execute();

    }


    function getGallery($idproduct){
        $sql = 'select * from gallery_table where product = ? order by main DESC';
        $params = [$idproduct];
        $gallery = $this->doSelect($sql, $params);
        return $gallery;



    }

    function filterGallery($gallery)
    {
        $endGallery = [];
        foreach ($gallery as $row) {
            /// medium size always is main image not large size

            if (strpos($row['title'], '600-') === 0) {
                $row['title'] =  str_replace('600-','',$row['title']);
                if ($row['main'] == 1) {
                    array_unshift($endGallery, $row);
                } else {
                    array_push($endGallery, $row);
                }
            }
        }
        return $endGallery;
    }

    function getAttr($idproduct){
        $sql = 'select product_attr_table.*,attr_table.title from product_attr_table INNER JOIN attr_table ON product_attr_table.attr=attr_table.id where product = ?';
        $params = [$idproduct];
        $result = $this->doSelect($sql, $params);
        return $result;



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


    function addComment($data,$idProduct){
        $title = $data['title'];
        $family = $data['family'];
        $rating = $data['rating'];
        $description = $data['description'];
        $time = jdate('j F Y');
        $sql = 'insert into comment_table (title,family,rating,description,product,date_publish) VALUES (?,?,?,?,?,?)';
        $stmt = self::$connect->prepare($sql);
        $stmt->bindValue(1,$title);
        $stmt->bindValue(2,$family);
        $stmt->bindValue(3,$rating);
        $stmt->bindValue(4,$description);
        $stmt->bindValue(5,$idProduct);
        $stmt->bindValue(6,$time);
        $stmt->execute();

    }


    function getComment($idProduct){

        $sql = 'select * from comment_table WHERE showhide = ? and product=?';
        $params = [1,$idProduct];
        $result = $this->doSelect($sql, $params);
        return $result;

    }

    function getProducts(){

        $sql = 'select * from product_table ORDER BY id DESC limit 4';
        $params = [];
        $result = $this->doSelect($sql, $params);
        return $result;

    }




}

?>