<?php

class model_index extends Model
{


    function __construct()
    {
        parent::__construct();

    }


    function getSlider()
    {
        $slider1 =[];
        $slider2 =[];
        $slider3 =[];
        $sql = 'select * from slider_table';
        $result = $this->doSelect($sql);
        foreach ($result as $row){
            if($row['slider_type']==1){
                array_push($slider1,$row);
            }elseif ($row['slider_type']==2){
                array_push($slider2,$row);
            }elseif ($row['slider_type']==3){
                array_push($slider3,$row);
            }
        }
        return [$slider1,$slider2,$slider3,$result];

    }


    function getCatProduct($title,$slug){
        $sql = 'select product_table.*,category_table.title as category_title,category_table.slug 
from product_table 
JOIN category_table ON product_table.category = category_table.id
WHERE category_table.title like "%'.$title.'%" or category_table.slug like "%'.$slug.'%" 
ORDER BY product_table.id DESC limit 6

';
        $result = $this->doSelect($sql);
        return $result;
    }


    function getPost(){
        $sql = 'select * from post_table  WHERE post_type=? ORDER BY id DESC limit 4';
        $result = $this->doSelect($sql,['blog']);
        return $result;
    }



}

?>