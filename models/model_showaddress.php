<?php

class model_showaddress extends Model
{


    function __construct()
    {
        parent::__construct();

    }

    function addAddress($data)
    {
        @Model::sessionInit();
        $userId = Model::getSession('userId');
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

    function deleteAddress($addressId)
    {

        $sql = 'delete from address_table WHERE id = ?';
        $stmt = self::$connect->prepare($sql);
        $stmt->bindValue(1, $addressId);
        $stmt->execute();


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
        $result = $this->getAddress();
        return $result;



    }

    function getAddress()
    {
        @Model::sessionInit();
        $userId = Model::getSession('userId');
        $sql = 'select * from address_table where user_id = ?';
        $params = [$userId];
        $result = $this->doSelect($sql, $params);
        return $result;

    }

    function getAddressInfo($addressId)
    {

        $sql = 'select * from address_table where id = ?';
        $params = [$addressId];
        $result = $this->doSelect($sql, $params, 1);
        return $result;

    }

    function getPostInfo($postTypeId)
    {

        $sql = 'select * from post_type_table where id = ?';
        $params = [$postTypeId];
        $result = $this->doSelect($sql, $params, 1);
        return $result;

    }


    function getPostType()
    {

        $sql = 'select * from post_type_table';
        $params = [];
        $result = $this->doSelect($sql, $params);
        return $result;

    }


    function setAddressSession($addressId){

        $addressInfo = $this->getAddressInfo($addressId);
        $addressInfo = serialize($addressInfo);
        @self::sessionInit();
        self::setSession('addressId',$addressInfo);

    }
    function setPostTypeSession($postTypeId){
        $postTypeInfo = $this->getPostInfo($postTypeId);
        $postTypeInfo = serialize($postTypeInfo);
        @self::sessionInit();
        self::setSession('postTypeId',$postTypeInfo);

    }


}

?>