<?php

class model_adminslider extends Model
{


    function __construct()
    {
        parent::__construct();

    }


    function getSlider()
    {
        $sql = 'select * from slider_table';
        $result = $this->doSelect($sql);
        return $result;

    }



    function SliderInfo($idSlider)
    {

        $sql = 'select * from slider_table where id=?';
        $params = [$idSlider];
        $result = $this->doSelect($sql, $params,1);
        return $result;

    }
//
//
    function addSlider($files,$params,$idslider)

    {

        $file = $files['image-file'];
        $tmp_name = $file['tmp_name'];
        $file_size = $file['size'];
        $file_type = $file['type'];
        $file_name = $file['name'];
        $ok_send = 1;



        if ($file_size > 1012000){
            $ok_send = 0;
        }
        if ($file_type != 'image/jpeg' and $file_type != 'image/png' and $file_type != 'image/gif'){
            $ok_send = 0;
        }




        if ($idslider=='') {
            if ($ok_send == 1) {

                $sql = 'insert into slider_table (title,link,slider_type,image) VALUES (?,?,?,?)';
                $stmt = self::$connect->prepare($sql);
                $stmt->bindValue(1, $params['title']);
                $stmt->bindValue(2, $params['link']);
                $stmt->bindValue(3, $params['type']);
                $stmt->bindValue(4, $file_name);
                $stmt->execute();
                $idpost = self::$connect->lastInsertId();
                mkdir('public/images/posts/' . $idpost);
                mkdir('public/images/posts/' . $idpost . '/main');
                $destination = 'public/images/slider/' . $file_name;
                move_uploaded_file($tmp_name, $destination);
            }


        } else {
            if ($file_name==''){
                $file_name=$params['image-file-name'];
            }else {
                if ($ok_send == 1) {
                    unlink('public/images/slider/' . $params['image-file-name']);
                    $destination = 'public/images/slider/' . $file_name;
                    move_uploaded_file($tmp_name, $destination);
                }else{
                    $file_name=$params['image-file-name'];
                }
            }


            $sql = 'update slider_table set title=?,link=?,slider_type=?,image=? where id=?';
            $stmt = self::$connect->prepare($sql);
            $stmt->bindValue(1, $params['title']);
            $stmt->bindValue(2, $params['link']);
            $stmt->bindValue(3, $params['type']);
            $stmt->bindValue(4, $file_name);
            $stmt->bindValue(5, $idslider);
            $stmt->execute();
        }

    }
//
    function deleteSlider($ids)
    {
        $images = [];
        foreach ($ids as $row){
            $sql = 'select image from slider_table where id=?';
            $image = $this->doSelect($sql,[$row]);
            array_push($images,$image[0]['image']);
        }

        $ids = join(',', $ids);
        $sql = 'delete from slider_table where id IN (' . $ids . ')';
        $stmt = self::$connect->prepare($sql);
        $stmt->execute();
        foreach ($images as $row){
            unlink('public/images/slider/' . $row);
        }

    }


}

?>