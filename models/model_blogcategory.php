<?php

class model_blogcategory extends Model
{


    function __construct()
    {
        parent::__construct();


    }

    function getBlog(){
        $sql = 'select * from post_table where post_type=?';
        $result = $this->doSelect($sql,['blog']);
        return $result;
    }








}

?>