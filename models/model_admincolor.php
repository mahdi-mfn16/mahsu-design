<?php

class model_admincolor extends Model
{


    function __construct()
    {
        parent::__construct();

    }


    function getColor()
    {
        $sql = 'select * from color_table';
        $result = $this->doSelect($sql);
        return $result;

    }

    function colorInfo($idcolor)
    {

        $sql = 'select * from color_table where id=?';
        $params = [$idcolor];
        $result = $this->doSelect($sql, $params,1);
        return $result;

    }
//
//
    function addColor($params,$idcolor)
    {
        if ($idcolor=='') {
            $sql = 'insert into color_table (title,hex) VALUES (?,?)';
            $stmt = self::$connect->prepare($sql);
            $stmt->bindValue(1, $params['title']);
            $stmt->bindValue(2, $params['hex']);
            $stmt->execute();
        } else {
            $sql = 'update color_table set title=?,hex=? where id=?';
            $stmt = self::$connect->prepare($sql);
            $stmt->bindValue(1, $params['title']);
            $stmt->bindValue(2, $params['hex']);
            $stmt->bindValue(3, $idcolor);
            $stmt->execute();
        }
//
    }
//
    function deleteColor($ids)
    {
        $ids = join(',', $ids);
        $sql = 'delete from color_table where id IN (' . $ids . ')';
        $stmt = self::$connect->prepare($sql);
        $stmt->execute();
    }


}

?>