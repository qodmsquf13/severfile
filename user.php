<?php 
    class signup{
        function Create_consumer($email,$pw,$name,$phone,$db){
            if($db->query("INSERT INTO counsumer() values()")){
                return true;
            }else{
                echo "error query";
            }
        }
        function Create_company($number,$email,$pw,$name,$phone,$category,$db){
            if($db->query("INSERT INTO company() values()")){
                return true;
            }else{
                echo "error query";
            }
        }
        function Create_job($email,$pw,$name,$phone,$category,$career,$db){
            if($db->query("INSERT INTO job() values()")){
                return true;
            }else{
                echo "error query";
            }
        }    
    }

    class login{
        function Login_user($email,$pw,$db){
            $result = $db->query("SELECT * FROM consumer JOIN company JOIN job WHERE email = $email AND pw = $pw");
            if($result){
                $user = mysqli_fetch_array($result);
                session_start();
                $_SESSION['user'] = $user;
            }else{
                echo "error query";
            }
        }
    }

    class logout{
        function Logout(){
            session_destroy();
        }
    }

    class update_user{
        function Update_user($user,$inputData,$db){
            
        }

    }

    class delete_user{
        function Delete_user($user,$db){

        }
    }
    
?>