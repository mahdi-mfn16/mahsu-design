<?php

class model_profile extends Model {
    function __construct()
    {
        parent::__construct();
    }

    function index(){

    }


    function getUserInfo($userId){

        $sql = 'select * from user_table where id = ?';
        $result = $this->doSelect($sql,[$userId],1);
        return $result;

    }


    function editProfileItem($data) {
        $text = $data['text'];
        $name = $data['name'];
        @self::sessionInit();
        $userId = self::getSession('userId');
        $sql = 'update user_table set '.$name.'=? where id = ?';
        $stmt = self::$connect->prepare($sql);
        $stmt->bindValue(1,$text);
        $stmt->bindValue(2,$userId);
        $stmt->execute();

    }


    function getUserOrder($userId){

        $sql = 'select * from order_table where user_id = ?';
        $result = $this->doSelect($sql,[$userId]);

        foreach ($result as $key=>$row){

            $basket = unserialize($row['basket']);
            $address = unserialize($row['address']);
            $post = unserialize($row['post_type']);
            $itemNumber = sizeof($basket);
            $result[$key]['itemNumber']=$itemNumber;
            $result[$key]['name']=$address['first_name'];
            $result[$key]['family']=$address['family'];
            $result[$key]['mobile']=$address['mobile'];
            $result[$key]['city']=$address['city'];
            $result[$key]['address']=$address['address'];
            $result[$key]['post_price']=$post['price'];
            $result[$key]['basket_price']=$row['total_price']-$post['price'];

        }
        return $result;



    }


    function getUserAddress($userId)
    {

        $sql = 'select * from address_table where user_id = ?';
        $params = [$userId];
        $result = $this->doSelect($sql, $params);
        return $result;

    }


    function deleteAddress($addressId)
    {

        $sql = 'delete from address_table WHERE id = ?';
        $stmt = self::$connect->prepare($sql);
        $stmt->bindValue(1, $addressId);
        $stmt->execute();


    }

    function getAddressInfo($addressId)
    {

        $sql = 'select * from address_table where id = ?';
        $params = [$addressId];
        $result = $this->doSelect($sql, $params, 1);
        return $result;

    }

    function editAddress($addressId, $data)
    {
        $first_name = $data['name2'];
        $family = $data['family2'];
        $mobile = $data['mobile2'];
        $postal_code = $data['postal_code2'];
        $province = $data['province2'];
        $city = $data['city2'];
        $address = $data['address2'];
        $sql = 'update address_table set first_name=?,family=?,mobile=?,postal_code=?,province=?,city=?,address=? WHERE id = ?';
        $stmt = self::$connect->prepare($sql);
        $stmt->bindValue(1, $first_name);
        $stmt->bindValue(2, $family);
        $stmt->bindValue(3, $mobile);
        $stmt->bindValue(4, $postal_code);
        $stmt->bindValue(5, $province);
        $stmt->bindValue(6, $city);
        $stmt->bindValue(7, $address);
        $stmt->bindValue(8, $addressId);
        $stmt->execute();




    }


    function addAddress($data)
    {
        @self::sessionInit();
        $userId = self::getSession('userId');
        $first_name = $data['name'];
        $family = $data['family'];
        $mobile = $data['mobile'];
        $postal_code = $data['postal_code'];
        $province = $data['province'];
        $city = $data['city'];
        $address = $data['address'];
        $sql = 'insert into address_table (first_name,family,mobile,postal_code,province,city,address,user_id) VALUES (?,?,?,?,?,?,?,?)';
        $stmt = self::$connect->prepare($sql);
        $stmt->bindValue(1, $first_name);
        $stmt->bindValue(2, $family);
        $stmt->bindValue(3, $mobile);
        $stmt->bindValue(4, $postal_code);
        $stmt->bindValue(5, $province);
        $stmt->bindValue(6, $city);
        $stmt->bindValue(7, $address);
        $stmt->bindValue(8, $userId);
        $stmt->execute();


    }


    function logout(){

        self::sessionInit();
        unset($_SESSION['userId']);
    }



}

?>