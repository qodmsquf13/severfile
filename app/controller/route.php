<?php
    require_once("controller.php");
    
    $http_host = $_SERVER['HTTP_HOST'];
    $request_uri = $_SERVER['REQUEST_URI'];
    $request_uri = explode("?",$request_uri);

    if(controller::call_ctr($request_uri[1])){
        echo"실행";
    }






?>