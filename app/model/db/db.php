<?php 
try{
    $host = "localhost";
    $user = "root";
    $password = "1234";
    $dbname = "houzz";

    $db = new mysqli($host,$user,$password,$dbname);

}catch(PDOException $e){
        echo $e->getMessage();
}

?>