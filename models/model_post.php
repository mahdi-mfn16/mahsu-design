<?php

class model_post extends Model
{


    function __construct()
    {
        parent::__construct();


    }



    function getPost($slug){
        $sql = 'select * from post_table where post_type=? and slug = ?';
        $result = $this->doSelect($sql,['blog',$slug],1);
        return $result;
    }

    function getBlog(){
        $sql = 'select * from post_table where post_type=? ORDER BY id DESC limit 3 ';
        $result = $this->doSelect($sql,['blog']);
        return $result;
    }

    function getProduct(){
        $sql = 'select * from product_table ORDER BY id DESC limit 3';
        $result = $this->doSelect($sql);
        return $result;
    }







}

?>