<?php
  function db_connect(){
    //db 연결정보가 하나의 함수로 정리됨
    $db_user = "sample";    // 사용자명
    $db_pass = "password";    // 패스워드
    $db_host = "localhost";    // 호스트명
    $db_name = "sampledb";    // 데이터베이스명
    $db_type = "mysql";    // 데이터베이스 종류
    $dsn = "$db_type:host=$db_host;dbname=$db_name;charset=utf8";
    try{
      $pdo = new PDO($dsn,$db_user,$db_pass);
      //pdo변수에 새로운 PDO db연결객체가 생성되어 저장
      $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
      //pdo에서 오류코드와 오류 정보를 반영하도록 설정
      $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
      //프리페어드 스테이트먼트를 이용가능하도록 에뮬레이터기능을 false값으로 지정
    }catch(PDOException $Exception){
      //errmode_exception에서 에러를 처리하도록 할 때 catch를 사용하여 처리
      //PDOException $Exception 변수선언함으로써 PDOException클래스자료형을 $Exception변수에 적용
       die('오류:'.$Exception->getMessage());
      //오류 시, Exception변수에 담긴 getMessage 메시지를 출력
    }
    return $pdo; //오류가 뜬것이 아니면 pdo변수를 돌려준다
    //연결정보를 가지고 있는 pdo변수를 사용가능하도록 찾아서 돌려줌
  }
?>