<?php

class Controller{
    public $userId;
    function __construct()
    {
        @Model::sessionInit();
        $check = Model::getSession('userId');
        $this->userId=$check;

    }

    function view($viewUrl,$data=[],$headerfooterjoin=''){

        if($headerfooterjoin==''){
            require ('header.php');
            require ('views/'.$viewUrl.'.php');
            require ('footer.php');
        }else{
            require ('views/'.$viewUrl.'.php');
        }




    }

    function model($modelname){

        require ('models/model_'.$modelname.'.php');
        $modelclassname = 'model_'.$modelname;
        $this->modelobject = new $modelclassname;


    }
}

?>