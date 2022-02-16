<?php

class model_publicpage extends Model
{


    function __construct()
    {
        parent::__construct();


    }


    function getPage($slug){
        $sql = 'select * from post_table where post_type=? and slug = ?';
        $result = $this->doSelect($sql,['public',$slug],1);
        return $result;
    }






}

?>