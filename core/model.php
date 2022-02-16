<?php

class Model
{

    public static $connect;

    function __construct()
    {
        $servername = 'localhost';
        $usermame = 'root';
        $password = '';
        $db_name = 'mahsu-project';

        self::$connect = new PDO('mysql:host=' . $servername . ';dbname=' . $db_name, $usermame, $password);
        self::$connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        @self::sessionInit();
    }


    public static function getGeneral()
    {
        $sql = 'select * from general_table';
        $stmt = self::$connect->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;

    }

    function doSelect($sql, $params = [], $fetch = '')
    {
        $stmt = self::$connect->prepare($sql);
        foreach ($params as $key => $val) {
            $stmt->bindValue($key + 1, $val);
        }
        $stmt->execute();
        if ($fetch == '') {
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        } else {
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
        }

        return $result;
    }


    public static function sessionInit()
    {
        session_start();
    }

    public static function setSession($name, $val)
    {

        $_SESSION[$name] = $val;

    }

    public static function getSession($name)
    {

        if (isset($_SESSION[$name])) {

            return $_SESSION[$name];

        } else {

            return false;

        }
    }


    public static function getBasketCookie()
    {

        if (isset($_COOKIE['basket'])) {

            $cookie = $_COOKIE['basket'];

        } else {
            $val = time();
            @setcookie('basket', $val, time() + 24 * 3600, '/');
            $cookie = $val;

        }
        return $cookie;
    }

    public static function delTree($dir)
    {
        $files = array_diff(scandir($dir), array('.', '..'));

        foreach ($files as $file) {
            (is_dir("$dir/$file")) ? self::delTree("$dir/$file") : unlink("$dir/$file");
        }

        return rmdir($dir);
    }



    function getBasket()
    {
        $sql = 'select p.*,b.id as basket_row,b.number_product,c.title as colorTitle,c.hex
 from basket_table b 
 JOIN product_table p on b.id_product = p.id
 JOIN color_table c on b.color = c.id
 where cookie = ?';
        $cookie = self::getBasketCookie();
        $params= [$cookie];
        $result = $this->doSelect($sql,$params);
        $basketPriceTotal = 0;
        foreach ($result as $row){
            $ProductPrice = $row['price']*$row['number_product'];
            $basketPriceTotal = $basketPriceTotal + $ProductPrice;
        }
        return [$result,$basketPriceTotal];

    }


    function showMenu($menu_type){

        $result = [];
        $sql = 'select * from menu_table WHERE menu=? and parent = ? ORDER BY priority ASC';
        $params=[$menu_type,0];
        $parents = $this->doSelect($sql,$params);
        foreach ($parents as $key=>$row){
            $result[$key][0] = $row;
            $sql = 'select * from menu_table WHERE menu=? and parent = ? ORDER BY priority ASC';
            $params2=[$menu_type,$row['id']];
            $childs = $this->doSelect($sql,$params2);
            foreach ($childs as $row2){
                $result[$key][$row2['priority']] = $row2;
            }
        }

        return $result;

    }






}

?>