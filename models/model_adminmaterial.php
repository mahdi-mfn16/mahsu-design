<?php

class model_adminmaterial extends Model
{


    function __construct()
    {
        parent::__construct();

    }


    function getMaterial()
    {
        $sql = 'select * from material_table';
        $result = $this->doSelect($sql);
        return $result;

    }

    function materialInfo($idmaterial)
    {

        $sql = 'select * from material_table where id=?';
        $params = [$idmaterial];
        $result = $this->doSelect($sql, $params,1);
        return $result;

    }
//
//
    function addMaterial($params,$idmaterial)
    {
        if ($idmaterial=='') {
            $sql = 'insert into material_table (title) VALUES (?)';
            $stmt = self::$connect->prepare($sql);
            $stmt->bindValue(1, $params['title']);
            $stmt->execute();
        } else {
            $sql = 'update material_table set title=? where id=?';
            $stmt = self::$connect->prepare($sql);
            $stmt->bindValue(1, $params['title']);
            $stmt->bindValue(2, $idmaterial);
            $stmt->execute();
        }
//
    }
//
    function deleteMaterial($ids)
    {
        $ids = join(',', $ids);
        $sql = 'delete from material_table where id IN (' . $ids . ')';
        $stmt = self::$connect->prepare($sql);
        $stmt->execute();
    }


}

?>