<?php

class admincomment extends Controller
{

    function __construct()
    {
        parent::__construct();
    }


    function index()
    {
        if (isset($_POST['ids'])) {
            $ids = $_POST['ids'];
            if ($_POST['action-form']=='delete') {
                $this->modelobject->deleteComment($ids);
            }
            if ($_POST['action-form']=='ok') {
                $this->modelobject->okComment($ids);
            }
            if ($_POST['action-form']=='notok') {
                $this->modelobject->notOkComment($ids);
            }
        }
        $comment = $this->modelobject->getComment();
        $result = ['comment' => $comment];
        $this->view('admin/comment/index', $result, 1);
    }


}


?>