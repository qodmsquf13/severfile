<?php 
    class controller{
        static function call_ctr($str){
            echo "$str";
            if($str === "signup"){
                Header("Location:../view/signup.html");
                return true;
            }else if($str === "main"){
                Header("Location:../view/main.html#pagetrue");
                return true;
            }else if($str === "login"){
                Header("Location:../view/login.html");
                return true;
            }else if($str === "signup=0"){
                Header("Location:../view/signup_form.html");
                return true;
            }else if($str === "signup_form=0"){
                include("/xampp/htdocs/severfile/houzz/app/model/lib/create_consumer.php");
            }
        }
    }
?>