<?php 
    class controller{
        static function call_ctr($str){
            echo "$str";
            if($str === "signup"){
                Header("Location:../view/signup.html");
                return;
            }else if($str === "main"){
                Header("Location:../view/main.html");
                return;
            }else if($str === "login"){
                Header("Location:../view/login.html");
                return;
            }
        }
    }
?>