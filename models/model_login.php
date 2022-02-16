<?php

class model_login extends Model
{
    function __construct()
    {
        parent::__construct();
    }

    function index()
    {

    }

    function checkUser($loginform)
    {
        $mobile = $loginform['mobile'];
        $password = $loginform['password'];
        $sql = 'select * from user_table where mobile=? and password=?';
        $params = [$mobile, $password];
        $result = $this->doSelect($sql, $params);
        if (sizeof($result) > 0 and !empty($mobile) and !empty($password)) {
            Model::sessionInit();
            Model::setSession('userId', $result[0]['id']);

        } else {
            echo 'password or mobile wrong';
        }


    }

    function registerUser($data)
    {

        $name = $data['first_name'];
        $family = $data['family'];
        $mobile = $data['mobile'];
        $password = $data['password'];
        $password2 = $data['password2'];
        $gmail = $data['gmail'];
        if (!empty($name) and !empty($family) and !empty($mobile) and !empty($password) and !empty($password2) and strlen($password)>=8 and preg_match("#[a-z]+#",$password) and preg_match("#[0-9]+#",$password)) {
            $sql = 'select * from user_table where mobile = ?';
            $checkUser = $this->doSelect($sql, [$mobile]);
            if (sizeof($checkUser) == 0) {
                if ($password == $password2) {

                    echo 'ok';
//                    require '/vendor/autoload.php';
//                    $sender = "1000596446";
//                    $receptor = "09365342296";
//                    $message = "123456";
//                    $api = new \Kavenegar \KavenegarApi("376533356D596656474B4F585A5477627348366D364647595456595835416A58675430764F3873505365493D");
//                    $api -> Send ( $sender,$receptor,$message);



                    //////   send code message

                } else {
                    echo 'verify password is not the same';
                }
            } else {
                echo 'this mobile registered already';
            }

        } else {
            echo 'one of fields is empty';
        }
    }


    function saveUser($data)
    {
        $code = $data['code'];

        if ($code == '123456') {                  ///////sms code
            $name = $data['first_name'];
            $family = $data['family'];
            $mobile = $data['mobile'];
            $password = $data['password'];
            $gmail = $data['gmail'];
            $sql1 = 'insert into user_table (first_name,family,password,mobile,email) VALUES (?,?,?,?,?)';
            $stmt = self::$connect->prepare($sql1);
            $stmt->bindValue(1, $name);
            $stmt->bindValue(2, $family);
            $stmt->bindValue(3, $password);
            $stmt->bindValue(4, $mobile);
            $stmt->bindValue(5, $gmail);
            $stmt->execute();

            $sql2 = 'select * from user_table where mobile=?';
            $newuser = $this->doSelect($sql2, [$mobile], 1);
            $userId = $newuser['id'];
            @self::sessionInit();
            self::setSession('userId', $userId);

            return 'ok';

        } else {
            return 'code is not valid';
        }


    }


    function controlUser($data)
    {


        $mobile = $data['tel-mobile'];
        $password = $data['passwordnew'];
        $password2 = $data['passwordnew2'];
        $sql = 'select * from user_table where mobile = ?';
        $checkUser = $this->doSelect($sql, [$mobile]);
        if (sizeof($checkUser) > 0) {
            if ($password == $password2) {
                echo 'ok';

                //////   send code message

            } else {
                echo 'verify password is not the same';
            }
        } else {
            echo 'this mobile is not registered already';
        }

    }


    function changePassword($data)
    {
        $code = $data['code-login'];

        if ($code == '123456') {                  ///////sms code
            $mobile = $data['tel-mobile'];
            $password = $data['passwordnew'];
            $sql1 = 'update user_table set password=? where mobile=?';
            $stmt = self::$connect->prepare($sql1);
            $stmt->bindValue(1, $password);
            $stmt->bindValue(2, $mobile);
            $stmt->execute();

            $sql2 = 'select * from user_table where mobile=?';
            $newuser = $this->doSelect($sql2, [$mobile], 1);
            $userId = $newuser['id'];
            @self::sessionInit();
            self::setSession('userId', $userId);

            return 'ok';

        } else {
            return 'code is not valid';
        }


    }
}

?>