<?php


class App
{
    public $controller = 'index';
    public $method = 'index';
    public $parameters = [];

    function __construct()
    {
        if(isset($_GET['url'])) {
            $url = $_GET['url'];
            $url = $this->extractUrl($url);
            $this->controller = $url[0];
            unset($url[0]);
            if(isset($url[1])) {
                $this->method = $url[1];
                unset($url[1]);
            }

            $this->parameters = array_values($url);
        }
        $rootUrl = 'controllers/' . $this->controller . '.php' ;
        if (file_exists($rootUrl)) {
            require($rootUrl);
            $object = new $this->controller;
            $object->model($this->controller);
            if(method_exists($object,$this->method)) {
                call_user_func_array([$object, $this->method], $this->parameters);
            }
        }


    }


    function extractUrl($url)
    {
        filter_var($url,FILTER_SANITIZE_URL);
        $url = rtrim($url,'/');
        $url = explode('/', $url);

        return $url;

    }


}


?>
