<?php

class model_showcart extends Model
{


    function __construct()
    {
        parent::__construct();


    }





    function deleteBasket($idproduct){
        $sql = 'delete from basket_table WHERE id=?';
        $stmt = self::$connect->prepare($sql);
        $stmt->bindValue(1,$idproduct);
        $stmt->execute();
    }


    function updateBasket($idproduct,$numberproduct){
        $sql = 'update basket_table set number_product=? WHERE id=?';
        $stmt = self::$connect->prepare($sql);
        $stmt->bindValue(1,$numberproduct);
        $stmt->bindValue(2,$idproduct);
        $stmt->execute();
    }





}

?>