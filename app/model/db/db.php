<?php 
try{
    $host = "localhost";
    $user = "root";
    $password = "1234";
    $dbname = "houzz";

    $db = new mysqli($host,$user,$password,$dbname);
    $result = $db->query("SELECT * FROM consumer");
    if($result){
        echo "연결잘됨";
    }
}catch(PDOException $e){
        echo $e->getMessage();
}

?>