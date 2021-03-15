<?php 
    $DBhost = "localhost";
    $DBusername = "root";
    $DBpass = "";
    $DBname = "mysql";
    $dbcon = new mysqli($DBhost, $DBusername, $DBpass, $DBname);
    mysqli_set_charset($dbcon,"UTF8");
    $result = $dbcon->query("create database houzz DEFAULT CHARACTER SET utf8");
    if($result){
        echo "houzz 생성 완료";
    }else{
        echo "이미 존재하거나 실패했습니다.";
    }
    if(mysqli_close($dbcon)){
        echo "종료";
    }
?>