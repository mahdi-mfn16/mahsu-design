<?php

class model_adminmenu extends Model
{


    function __construct()
    {
        parent::__construct();

    }


    function getMenu()
    {
        $sql = 'select * from menu_table ORDER BY menu DESC ';
        $result = $this->doSelect($sql);
        return $result;

    }

    function deleteMenu($ids)
    {
        $ids = $this->getChildId($ids);
        $ids = join(',', $ids);
        $sql = 'delete from menu_table where id IN (' . $ids . ')';
        $stmt = self::$connect->prepare($sql);
        $stmt->execute();
    }

    function getChildId($ids){

        $totalIds = $ids;

        foreach ($ids as $row){
            $sql = 'select * from menu_table where parent=?';
            $params = [$row];
            $result = $this->doSelect($sql,$params);
            foreach ($result as $row2){
                array_push($totalIds,$row2['id']);

            }

        }

        return $totalIds;
    }


    function MenuInfo($idMenu)
    {

        $sql = 'select * from menu_table where id=?';
        $params = [$idMenu];
        $result = $this->doSelect($sql, $params,1);
        return $result;

    }


    function mainMenu()
    {

        $sql = 'select * from menu_table where parent=?';
        $params = [0];
        $result = $this->doSelect($sql, $params);
        return $result;

    }


    function addMenu($params,$idMenu)
    {
        if ($idMenu=='') {
            $sql = 'insert into menu_table (title,link,parent,menu,priority) VALUES (?,?,?,?,?)';
            $stmt = self::$connect->prepare($sql);
            $stmt->bindValue(1, $params['title']);
            $stmt->bindValue(2, $params['link']);
            $stmt->bindValue(3, $params['parent']);
            $stmt->bindValue(4, $params['menu']);
            $stmt->bindValue(5, $params['priority']);
            $stmt->execute();
        } else {
            $sql = 'update menu_table set title=?,link=?,parent=?,menu=?,priority=? where id=?';
            $stmt = self::$connect->prepare($sql);
            $stmt->bindValue(1, $params['title']);
            $stmt->bindValue(2, $params['link']);
            $stmt->bindValue(3, $params['parent']);
            $stmt->bindValue(4, $params['menu']);
            $stmt->bindValue(5, $params['priority']);
            $stmt->bindValue(6, $idMenu);
            $stmt->execute();
        }

    }




}

?>