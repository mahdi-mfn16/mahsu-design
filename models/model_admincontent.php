<?php

class model_admincontent extends Model
{


    function __construct()
    {
        parent::__construct();
        require ('public/jdf.php');

    }


    function getContent()
    {
        $sql = 'select * from post_table';
        $result = $this->doSelect($sql);
        return $result;

    }

    function contentInfo($idcontent)
    {

        $sql = 'select * from post_table where id=?';
        $params = [$idcontent];
        $result = $this->doSelect($sql, $params,1);
        return $result;

    }

    function addContent($files,$params,$idcontent)

    {
        $time = jdate('j F Y');

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




        if ($idcontent=='') {
            if ($ok_send == 1) {

                $sql = 'insert into post_table (title,seoh1,description,date_publish,slug,details,image,post_type) VALUES (?,?,?,?,?,?,?,?)';
                $stmt = self::$connect->prepare($sql);
                $stmt->bindValue(1, $params['title']);
                $stmt->bindValue(2, $params['seoh1']);
                $stmt->bindValue(3, $params['description']);
                $stmt->bindValue(4, $time);
                $stmt->bindValue(5, $params['slug']);
                $stmt->bindValue(6, $params['details']);
                $stmt->bindValue(7, $file_name);
                $stmt->bindValue(8, $params['post_type']);
                $stmt->execute();
                $idpost = self::$connect->lastInsertId();
                mkdir('public/images/posts/' . $idpost);
                mkdir('public/images/posts/' . $idpost . '/main');
                $destination = 'public/images/posts/' . $idpost . '/main/' . $file_name;
                move_uploaded_file($tmp_name, $destination);
            }


        } else {
            if ($file_name==''){
                $file_name=$params['image-file-name'];
            }else {
                if ($ok_send == 1) {
                    $allFiles = glob('public/images/posts/' . $idcontent . '/main/*');
                    foreach ($allFiles as $row) {
                        if (is_file($row)) {
                            unlink($row);
                        }
                    }

                    $destination = 'public/images/posts/' . $idcontent . '/main/' . $file_name;
                    move_uploaded_file($tmp_name, $destination);
                }else{
                    $file_name=$params['image-file-name'];
                }
            }


            $sql = 'update post_table set title=?,seoh1=?,description=?,date_publish=?,slug=?,details=?,image=?,post_type=? where id=?';
            $stmt = self::$connect->prepare($sql);
            $stmt->bindValue(1, $params['title']);
            $stmt->bindValue(2, $params['seoh1']);
            $stmt->bindValue(3, $params['description']);
            $stmt->bindValue(4, $params['date_publish']);
            $stmt->bindValue(5, $params['slug']);
            $stmt->bindValue(6, $params['details']);
            $stmt->bindValue(7, $file_name);
            $stmt->bindValue(8, $params['post_type']);
            $stmt->bindValue(9, $idcontent);
            $stmt->execute();
        }

    }



    function actionContent($forms)
    {
        $ids = $forms['ids'];
        $ids = join(',', $ids);
        $action = $forms['action-form'];
        if ($action=='delete'){

            foreach ($forms['ids'] as $row) {
                self::delTree('public/images/posts/'.$row);
            }
            $sql = 'delete from post_table where id IN (' . $ids . ')';
            $stmt = self::$connect->prepare($sql);
        }
        if ($action=='publish'){
            $time = jdate('j F Y');
            $sql = 'update post_table set publish=?,date_publish=? where id IN (' . $ids . ')';
            $stmt = self::$connect->prepare($sql);
            $stmt->bindValue(1,1);
            $stmt->bindValue(2,$time);
        }
        if ($action=='notpublish'){
            $sql = 'update post_table set publish=? where id IN (' . $ids . ')';
            $stmt = self::$connect->prepare($sql);
            $stmt->bindValue(1,0);
        }
        $stmt->execute();
    }


}

?>