<?php

class model_admincategory extends Model
{


    function __construct()
    {
        parent::__construct();

    }


    function getCategory($idparent = '')
    {
        if ($idparent == '') {
            $sql = 'select * from category_table';
            $result = $this->doSelect($sql);
        } else {
            $sql = 'select * from category_table where parent=?';
            $params = [$idparent];
            $result = $this->doSelect($sql, $params);
        }

        return $result;

    }

    function categoryInfo($idcategory=1)
    {

        $sql = 'select * from category_table where id=?';
        $params = [$idcategory];
        $result = $this->doSelect($sql, $params);


        return $result;

    }

    function getParents($parent)
    {
        $parents = [];
        while ($parent > 0) {
            $sql = 'select * from category_table where id=?';
            $params = [$parent];
            $result = $this->doSelect($sql, $params, 1);
            array_push($parents, $result);
            $parent = $result['parent'];
        }
        $parents = array_reverse($parents);
        return $parents;

    }

    function getChilderen($idcategory)
    {
        $sql = 'select * from category_table where parent=?';
        $params = [$idcategory];
        $result = $this->doSelect($sql, $params);
        return $result;

    }

    function addCategory($params)
    {
        if ($params['edit'] != 'edit') {
            $sql = 'insert into category_table (title,slug,parent) VALUES (?,?,?)';
            $stmt = self::$connect->prepare($sql);
            $stmt->bindValue(1, $params['title']);
            $stmt->bindValue(2, $params['slug']);
            $stmt->bindValue(3, $params['parent']);
            $stmt->execute();
        } else {
            $sql = 'update category_table set title=?,slug=?,parent=? where id=?';
            $stmt = self::$connect->prepare($sql);
            $stmt->bindValue(1, $params['title']);
            $stmt->bindValue(2, $params['slug']);
            $stmt->bindValue(3, $params['parent']);
            $stmt->bindValue(4, $params['idcategory']);
            $stmt->execute();
        }

    }

    function deleteCategory($idcategory=[]){
        $allchilderen = $idcategory;


        while(sizeof($idcategory)>0){
            foreach ($idcategory as $id) {
                $ids = [];
                $result = $this->getChilderen($id);
                foreach ($result as $row) {
                    array_push($ids,$row['id']);
                }
                $idcategory=$ids;
                $allchilderen = array_merge($allchilderen, $idcategory);
            }
        }
        $allchilderen= join(',',$allchilderen);
        $sql = 'delete from category_table where id IN ('.$allchilderen.')';
        $stmt = self::$connect->prepare($sql);
        $stmt->execute();
    }


}

?>