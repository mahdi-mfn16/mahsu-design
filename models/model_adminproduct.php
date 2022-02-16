<?php

class model_adminproduct extends Model
{


    function __construct()
    {
        parent::__construct();

    }


    function getProduct()
    {

        $sql = 'select * from product_table';
        $result = $this->doSelect($sql);
        return $result;

    }



    function getCategory()
    {

        $sql = 'select * from category_table';
        $result = $this->doSelect($sql);
        return $result;

    }



    function getColor()
    {

        $sql = 'select * from color_table';
        $result = $this->doSelect($sql);
        return $result;

    }



    function getMaterial()
    {

        $sql = 'select * from material_table';
        $result = $this->doSelect($sql);
        return $result;

    }



    function productInfo($idproduct)
    {

        $sql = 'select * from product_table where id=?';
        $params = [$idproduct];
        $result = $this->doSelect($sql, $params,1);
        return $result;

    }



    function addProduct($params,$idproduct)
    {
        if ($idproduct == '') {
            $sql = 'insert into product_table (title,code,price,available,short_description,long_description,care_method,category,color,material) VALUES (?,?,?,?,?,?,?,?,?,?)';
            $params['color'] = join(',',$params['color']);
            $stmt = self::$connect->prepare($sql);
            $stmt->bindValue(1, $params['title']);
            $stmt->bindValue(2, $params['code']);
            $stmt->bindValue(3, $params['price']);
            $stmt->bindValue(4, $params['available']);
            $stmt->bindValue(5, $params['short_description']);
            $stmt->bindValue(6, $params['long_description']);
            $stmt->bindValue(7, $params['care_method']);
            $stmt->bindValue(8, $params['category']);
            $stmt->bindValue(9, $params['color']);
            $stmt->bindValue(10, $params['material']);
            $stmt->execute();
            $productid = self::$connect->lastInsertId();
            mkdir('public/images/products/'.$productid);
        } else {
            $sql = 'update product_table set title=?,code=?,price=?,available=?,short_description=?,long_description=?,care_method=?,category=?,color=?,material=? where id=?';
            $params['color'] = join(',',$params['color']);
            $stmt = self::$connect->prepare($sql);
            $stmt->bindValue(1, $params['title']);
            $stmt->bindValue(2, $params['code']);
            $stmt->bindValue(3, $params['price']);
            $stmt->bindValue(4, $params['available']);
            $stmt->bindValue(5, $params['short_description']);
            $stmt->bindValue(6, $params['long_description']);
            $stmt->bindValue(7, $params['care_method']);
            $stmt->bindValue(8, $params['category']);
            $stmt->bindValue(9, $params['color']);
            $stmt->bindValue(10, $params['material']);
            $stmt->bindValue(11, $idproduct);
            $stmt->execute();
        }

    }



    function deleteProduct($ids){

        $ids= join(',',$ids);
        $sql = 'delete from product_table where id IN ('.$ids.')';
        $stmt = self::$connect->prepare($sql);
        $stmt->execute();
    }




    function getAttr($idprduct)
    {
        $sql = 'select product_attr_table.id,attr_table.title,product_attr_table.val from product_attr_table INNER JOIN attr_table ON product_attr_table.attr=attr_table.id AND product_attr_table.product=? ';
        $params = [$idprduct];
        $result = $this->doSelect($sql, $params);
        return $result;
    }



    function addProductAttr($params,$idproduct,$idproductattr='')
    {
        if ($idproductattr == '') {
            $sql = 'insert into product_attr_table (product,attr,val) VALUES (?,?,?)';
            $stmt = self::$connect->prepare($sql);
            $stmt->bindValue(1, $idproduct);
            $stmt->bindValue(2, $params['attrid']);
            $stmt->bindValue(3, $params['val']);
            $stmt->execute();

        } else {
            $sql = 'update product_attr_table set attr=?,val=? where id=?';
            $stmt = self::$connect->prepare($sql);
            $stmt->bindValue(1, $params['attrid']);
            $stmt->bindValue(2, $params['val']);
            $stmt->bindValue(3, $idproductattr);
            $stmt->execute();
        }

    }



    function getAttrs()
    {

        $sql = 'select * from attr_table';
        $result = $this->doSelect($sql);
        return $result;

    }



    function productAttrInfo($idproductattr)
    {

        $sql = 'select * from product_attr_table where id=?';
        $params = [$idproductattr];
        $result = $this->doSelect($sql, $params,1);
        return $result;

    }



    function deleteProductAttr($ids){

        $ids= join(',',$ids);
        $sql = 'delete from product_attr_table where id IN ('.$ids.')';
        $stmt = self::$connect->prepare($sql);
        $stmt->execute();
    }



    function getGallery($idprduct)
    {
        $sql = 'select * from gallery_table where product=?';
        $params = [$idprduct];
        $result = $this->doSelect($sql, $params);
        return $result;
    }


    function addProductGallery($files,$idproduct)
    {
        $file = $files['imagefile0'];
        $file1 = $files['imagefile1'];
        $tmp_name0 = $file['tmp_name'];
        $file_size0 = $file['size'];
        $file_type0 = $file['type'];
        $file_name0 = $file['name'];
        $tmp_name1 = $file1['tmp_name'];
        $file_size1 = $file1['size'];
        $file_type1 = $file1['type'];
        $file_name1 = $file1['name'];
        $ok_send = 1;

        if ($file_size0 > 1012000 or $file_size1 > 1012000){
            $ok_send = 0;
        }
        if ($file_type0 != 'image/jpeg' and $file_type0 != 'image/png' and $file_type0 != 'image/gif'){
            $ok_send = 0;
        }
        if ($file_type1 != 'image/jpeg' and $file_type1 != 'image/png' and $file_type1 != 'image/gif'){
            $ok_send = 0;
        }
        if ($ok_send == 1) {
            echo 'yes';
            $destination0 = 'public/images/products/'.$idproduct.'/600-'.$file_name0;
            move_uploaded_file($tmp_name0, $destination0);
            $destination1 = 'public/images/products/'.$idproduct.'/1000-'.$file_name0;
            move_uploaded_file($tmp_name1, $destination1);
        }

        foreach (['600-'.$file_name0,'1000-'.$file_name0] as $row){
            $sql = 'insert into gallery_table (title,product) VALUES (?,?)';
            $stmt = self::$connect->prepare($sql);
            $stmt->bindValue(1, $row);
            $stmt->bindValue(2, $idproduct);
            $stmt->execute();
        }



    }


    function deleteProductGallery($ids){


        foreach ($ids as $row){
            $sql = 'select * from gallery_table where id=?';
            $params = [$row];
            $result = $this->doSelect($sql, $params,1);
            $filename = $result['title'];
            $id_product = $result['product'];
            $directory = 'public/images/products/'.$id_product.'/'.$filename;
            unlink($directory);
        }

        $ids_str= join(',',$ids);
        $sql = 'delete from gallery_table where id IN ('.$ids_str.')';
        $stmt = self::$connect->prepare($sql);
        $stmt->execute();
    }


    function selectMainImage($idimage,$idproduct){

        $sql = 'update gallery_table set main=? where product=?';
        $stmt = self::$connect->prepare($sql);
        $stmt->bindValue(1,0 );
        $stmt->bindValue(2,$idproduct );
        $stmt->execute();
        $sql = 'update gallery_table set main=? where id=?';
        $stmt = self::$connect->prepare($sql);
        $stmt->bindValue(1,1 );
        $stmt->bindValue(2,$idimage );
        $stmt->execute();

        $sql = 'select * from gallery_table where product=? and main=?';
        $params = [$idproduct,1];
        $mainImage = $this->doSelect($sql, $params,1);
        $imageTitle = $mainImage['title'];

        $sql = 'update product_table set image=? where id=?';
        $stmt = self::$connect->prepare($sql);
        $stmt->bindValue(1,$imageTitle );
        $stmt->bindValue(2,$idproduct);
        $stmt->execute();
    }


}

?>