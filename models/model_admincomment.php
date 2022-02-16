<?php

class model_admincomment extends Model
{


    function __construct()
    {
        parent::__construct();

    }


    function getComment()
    {
        $sql = 'select * from comment_table';
        $result = $this->doSelect($sql);
        return $result;

    }


    function deleteComment($ids)
    {
        $ids = join(',', $ids);
        $sql = 'delete from comment_table where id IN (' . $ids . ')';
        $stmt = self::$connect->prepare($sql);
        $stmt->execute();
    }

    function okComment($ids)
    {
        $ids = join(',', $ids);
        $sql = 'update comment_table set showhide=? where id IN (' . $ids . ')';
        $stmt = self::$connect->prepare($sql);
        $stmt->bindValue(1,1);
        $stmt->execute();
    }

    function notOkComment($ids)
    {
        $ids = join(',', $ids);
        $sql = 'update comment_table set showhide=? where id IN (' . $ids . ')';
        $stmt = self::$connect->prepare($sql);
        $stmt->bindValue(1,-1);
        $stmt->execute();
    }


}

?>