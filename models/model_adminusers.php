<?php

class model_adminusers extends Model
{


    function __construct()
    {
        parent::__construct();

    }


    function getUsers()
    {
        $sql = 'select * from user_table';
        $result = $this->doSelect($sql);
        return $result;

    }

    function deleteUsers($ids)
    {
        $ids = join(',', $ids);
        $sql = 'delete from user_table where id IN (' . $ids . ')';
        $stmt = self::$connect->prepare($sql);
        $stmt->execute();
    }


    function getAddress($idUser)
    {
        $sql = 'select * from address_table WHERE user_id=?';
        $result = $this->doSelect($sql,[$idUser]);
        return $result;

    }

    function deleteAddress($ids)
    {
        $ids = join(',', $ids);
        $sql = 'delete from address_table where id IN (' . $ids . ')';
        $stmt = self::$connect->prepare($sql);
        $stmt->execute();
    }


    function getOrder($idUser)
    {
        $sql = 'select * from order_table WHERE user_id=?';
        $result = $this->doSelect($sql,[$idUser]);
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



}

?>