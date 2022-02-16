<?php

class model_adminattr extends Model
{


    function __construct()
    {
        parent::__construct();

    }


    function getAttr()
    {
        $sql = 'select * from attr_table';
        $result = $this->doSelect($sql);
        return $result;

    }

    function attrInfo($idattr)
    {

        $sql = 'select * from attr_table where id=?';
        $params = [$idattr];
        $result = $this->doSelect($sql, $params,1);
        return $result;

    }
//
//
    function addAttr($params,$idattr)
    {
        if ($idattr=='') {
            $sql = 'insert into attr_table (title) VALUES (?)';
            $stmt = self::$connect->prepare($sql);
            $stmt->bindValue(1, $params['title']);
            $stmt->execute();
        } else {
            $sql = 'update attr_table set title=? where id=?';
            $stmt = self::$connect->prepare($sql);
            $stmt->bindValue(1, $params['title']);
            $stmt->bindValue(2, $idattr);
            $stmt->execute();
        }
//
    }
//
    function deleteAttr($ids)
    {
        $ids = join(',', $ids);
        $sql = 'delete from attr_table where id IN (' . $ids . ')';
        $stmt = self::$connect->prepare($sql);
        $stmt->execute();
    }


}

?>