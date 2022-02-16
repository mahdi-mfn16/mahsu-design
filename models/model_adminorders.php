<?php

class model_adminorders extends Model
{


    function __construct()
    {
        parent::__construct();

    }


    function getOrder()
    {
        $sql = 'select * from order_table';
        $result = $this->doSelect($sql);
        foreach ($result as $key=>$row){
            $result[$key]['basket'] = unserialize($row['basket']);
            $result[$key]['address'] = unserialize($row['address']);
            $result[$key]['post_type'] = unserialize($row['post_type']);
        }
        return $result;

    }

    function deleteOrders($ids)
    {
        $ids = join(',', $ids);
        $sql = 'delete from order_table where id IN (' . $ids . ')';
        $stmt = self::$connect->prepare($sql);
        $stmt->execute();
    }

}

?>