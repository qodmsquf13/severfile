<?php
include '../db/db.php';
$email = trim($_POST['email1'])."@".trim($_POST['email2']);

//  echo $email;

 function GenerateString($length)  
{  
    $characters  = "0123456789";  
    $characters .= "abcdefghijklmnopqrstuvwxyz";  
    $characters .= "ABCDEFGHIJKLMNOPQRSTUVWXYZ";  
    $characters .= "_";  
      
    $values = "";  
      
    $nmr_loops = $length;  
    while ($nmr_loops--)  
    {  
        $values .= $characters[mt_rand(0, strlen($characters) - 1)];  
    }  
      
    return $values;
} 

$val = GenerateString(4);
echo $val;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require "./src/PHPMailer.php";
require "./src/SMTP.php";
require "./src/Exception.php";

$mail = new PHPMailer(true);

try {

    // 서버세팅    
    $mail -> SMTPDebug = 0;    // 디버깅 설정
    $mail -> isSMTP();               // SMTP 사용 설정

    $mail -> Host = "smtp.naver.com";                      // email 보낼때 사용할 서버를 지정
    $mail -> SMTPAuth = true;                                // SMTP 인증을 사용함
    $mail -> Username = "qodmsquf13@naver.com";  // 메일 계정
    $mail -> Password = "eunbyeol13@";                   // 메일 비밀번호
    $mail -> SMTPSecure = "ssl";                             // SSL을 사용함
    $mail -> Port = 465;                                        // email 보낼때 사용할 포트를 지정
    $mail -> CharSet = "utf-8";                                // 문자셋 인코딩

    // 보내는 메일
    $mail -> setFrom("qodmsquf13@naver.com", "regame");

    // 받는 메일
    $mail -> addAddress($email, "receive01");
    $mail -> addAddress($email, "receive02");
    
    // 첨부파일
   // $mail -> addAttachment("./test.zip");
    //$mail -> addAttachment("./anjihyn.jpg");

    // 메일 내용
    $mail -> isHTML(true);                        // HTML 태그 사용 여부
    $mode = $_POST['mode'];
    switch($mode){
        case "insert":
            $title = "regame 회원가입 인증메일입니다.";
        break;
        case "update":
            $title = "regame 이메일 인증메일 입니다.";
        break;
        case "id":
            $title = "regame 아이디 찾기 인증메일 입니다";
        break;
        case "pw":
            $title = "regame 비밀번호 찾기 인증메일 입니다.";
        break;
    }
    $mail -> Subject = $title;                  // 메일 제목
    if($mode == "insert" || $mode == "update"){
        $text =  "인증번호는 <span style='font-size: 30px;'>".$val."</span> 입니다.";
    }else{
        if($mode == "id"){
            $sql = "select * from member where email='$email'";
            $result = $db -> query($sql);
            $row = mysqli_fetch_array($result);
            $id = $row['id'];
            $text =  "회원님의 아이디는 <span style='font-size: 30px;'>".$id."</span> 입니다.";    
        }else{
            $sql = "select * from member where email='$email'";
            $result = $db -> query($sql);
            $row = mysqli_fetch_array($result);
            $pw = $row['pw'];
            $id = $row['id'];
            $tmp_pw =  GenerateString(7);
            $sql = "update member set pw = '$tmp_pw' where id = '$id' and email = '$email'";
            $db->query($sql);



            $text =  "회원님의 임시 비밀번호는 <span style='font-size: 30px;'>".$tmp_pw."</span> 입니다.";    
     
        }
    }
    $mail -> Body = $text;   // 메일 내용
    
    // 메일 전송
    $mail -> send();
    
//    echo "Message has been sent";
//    echo $pwd;

} catch (Exception $e) {
 //   echo "Message could not be sent. Mailer Error : ", $mail -> ErrorInfo;
}
?>