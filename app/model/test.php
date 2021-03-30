<?php include 'php/db/db.php';
        $keyword = "%테스트%";
        $no =1;
        try{
            $query = "SELECT number,id,pw FROM consumer WHERE id LIKE ? AND num > ?";
            
            $stmt = $db->preapare($query);
            $stmt->execute(array($keyword,$no));
            $result = $stmt->fetchAll(PDO::FETCH_NUM);
        }catch(PDOException $e){
            echo $e->getMessage();
        }

?>
     <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>
    <body>
     <?php print_r($result);?>
    <form action="https://nid.naver.com/oauth2.0/authorize?response_type=code&client_id=_4KG64mD3hhqLhlInPAe&state=STATE_STRING&redirect_uri=http://houzz.kro.kr" method="get"></form>
    </body>
    </html>