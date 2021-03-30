<?php 
    require_once("/xampp/htdocs/severfile/houzz/app/model/db/db.php");
    class consumer{
        private $id,$pw,$db;
        function create_consumer($id,$pw,$db){
            $this->$id=$id;
            $this->$pw=$pw;
            $query = "INSERT INTO consumer(id,pw) VALUE('$id','$pw')";
            $result = $db->query($query);
            if($result){
                return true;
            }else{

                return false;
            }
        }
    }
    $consumer = new consumer();
    echo $id = $_POST["id"];
    echo $pw = $_POST["pw"];
    $result = $consumer->create_consumer($id,$pw,$db);
    if($result){
        ?><script>location.href="../controller/route.php?login"; alert("회원가입이 되셨습니다.");</script><?php
        
        return true;
    }else{
        ?><script>history.back(1); alert("회원가입 실패");</script><?php
        return false;
    }
?>