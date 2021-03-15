<?php
    $DBhost = "localhost";
    $DBusername = "root";
    $DBpass = "";
    $DBname = "houzz";
    $dbcon = new mysqli($DBhost, $DBusername, $DBpass, $DBname);
//db연결 

//테이블 생성 함수 정의
function create_table($dbcon,$sql){
    echo "<br>쿼리문 : <br><div>쿼리문 시작<br>$sql</div>";
    $result = $dbcon->query($sql);
    if($result){
        echo "생성 완료<br>";
    }else{
        echo "이미 존재하거나 생성 실패<br>";
    }
    return;
}


// 시작
    if($dbcon != NULL){
        echo "dbcon이 연결되었습니다.";
        //컨슈머 테이블
        $consumer = "create table consumer(
            consumer_number BIGINT auto_increment NOT NULL,
            id varchar(20) NOT NULL,
            pw varchar(20) NOT NULL,
            name varchar(20) NOT NULL,
            email varchar(50) NOT NULL,
            phone char(13) NOT NULL,
            PRIMARY KEY(consumer_number)
        );";
        create_table($dbcon,$consumer);


        //컴퍼니(업체) 테이블
        //company_number 000-00-0000 사업자 번호
        $company = "create table company(
            company_number char(12) NOT NULL,
            id varchar(20) NOT NULL,
            pw varchar(20) NOT NULL,
            name varchar(20) NOT NULL,
            email varchar(50) NOT NULL,
            phone char(13) NOT NULL,
            category varchar(30) NOT NULL ,
            PRIMARY KEY (company_number)
        );";
        create_table($dbcon,$company);


        //잡 테이블(구직자) 테이블
        //category 분야 
        //career 경력 0~0년
        //job_number 구직자 식별 번호 MEDIUMINT는 인트
        $job = "create table job(
            job_number BIGINT auto_increment NOT NULL,
            id varchar(20) NOT NULL,
            pw varchar(20) NOT NULL,
            name varchar(20) NOT NULL,
            email varchar(50) NOT NULL,
            phone char(13) NOT NULL,
            category varchar(30) NOT NULL,
            career varchar(10) NOT NULL,
            PRIMARY KEY(job_number)
        );";
        create_table($dbcon,$job);


        //소비자 문의
        //number 문의 식별 번호
        //process 진행판별 1완료 0미완료 계약 완료
        //imgs 현장 사진, concat함수로 받은후 update set으로 이미지 배열
        //quset_date 문의시간 시간순 insert시 now로 현재시간 설정, update도
        //start_date 원하는 공사날짜 달력으로 
        //estimate_number 견적넘버
        // 소비자 식별변호,업체명 외래키  
        $quset = "create table quset(
        number BIGINT auto_increment NOT NULL,
        consumer_number BIGINT NOT NULL,
        company_number varchar(12) NOT NULL,
        text varchar(50) NOT NULL,
        process int(1) NOT NULL,
        imgs varchar(50),
        quset_date datetime NOT NULL,  
        start_date datetime NOT NULL,
        PRIMARY KEY (number), 

        FOREIGN KEY (consumer_number)
        REFERENCES consumer(consumer_number)
        ON DELETE CASCADE,
        
        FOREIGN KEY (company_number)
        REFERENCES company(company_number) 
        ON DELETE CASCADE,
        );";
        create_table($dbcon,$quset);
        

        //견적
        //number 견적 식별 번호 
        //company_name 업체명
        //quset_number 문의번호
        //process 선택여부
        //price 제시 견적
        //file 견적서
        $estimate = "create table estimate(
        number BIGINT auto_increment NOT NULL, 
        company_name varchar(20) NOT NULL,
        quset_number BIGINT NOT NULL,
        process int(1) NOT NULL,
        price BIGINT NOT NULL,
        file varchar(50),
        PRIMARY KEY (number), 

        FOREIGN KEY (quset_number)
        REFERENCES quset(number)
        ON DELETE CASCADE
        );";
        create_table($dbcon,$estimate);


        //소비자리뷰
        //number 리뷰 식별 번호
        //price 공사대금
        //text 글
        //grade 평점
        //company_name 시공업체
        //consumer_name 작성자
        $review = "create table review(
        number BIGINT auto_increment NOT NULL, 
        price BIGINT NOT NULL,
        text varchar(50) NOT NULL,
        grade float(4,1) NOT NULL,
        consumer_number BIGINT NOT NULL,
        company_number varchar(12) NOT NULL,
        PRIMARY KEY (number), 

        FOREIGN KEY (consumer_number)
        REFERENCES consumer(consumer_number)
        ON DELETE CASCADE,
        
        FOREIGN KEY (company_number)
        REFERENCES company(company_number) 
        ON DELETE CASCADE
        );";
        create_table($dbcon,$review);


        //러브콜 
        $lovecall = " create table lovecall(
        number BIGINT auto_increment NOT NULL, 
        job_number        BIGINT      NOT NULL, 
        company_number varchar(12) NOT NULL,
        price            BIGINT        NOT NULL, 
        company_category  VARCHAR(30)   NOT NULL, 
        connect           INT(1)        NOT NULL default = 0,
        PRIMARY KEY (number), 
        
        FOREIGN KEY (company_number)
        REFERENCES company(company_number) 
        ON DELETE CASCADE,
        );";
        create_table($dbcon,$lovecall);


        //구직자리뷰
        $job_review = "create table job_review(
        number BIGINT AUTO_INCREMENT NOT NULL, 
        lovecall_number BIGINT NOT NULL,
        job_number    BIGINT           NOT NULL, 
        company_number varchar(12) NOT NULL,
        grade         FLOAT(4,2)     NOT NULL, 
        text          varchar(50)   NOT NULL,
        PRIMARY KEY (number),
         
        FOREIGN KEY (lovecall_number)
        REFERENCES lovecall(number) 
        ON DELETE CASCADE,

        FOREIGN KEY (job_number)
        REFERENCES job(job_number) 
        ON DELETE CASCADE,

        FOREIGN KEY (company_number)
        REFERENCES company(company_number) 
        ON DELETE CASCADE
        );";
        create_table($dbcon,$job_review);

    }else{
        echo "연결 실패";
        mysqli_close($dbcon);
    }
//모든 쿼리문 실행 후
    if(mysqli_close($dbcon)){
        echo "<br>종료";
    }
?>