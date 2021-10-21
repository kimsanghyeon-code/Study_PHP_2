<?php
  function db_connect(){
    //이전에는 코드에서 상단에 들어갔던 디비연결정보가
    //하나의 함수로 되서 정리가 된것임
    $db_user = "sample";    // 사용자명
    $db_pass = "password";    // 패스워드
    $db_host = "localhost";    // 호스트명
    $db_name = "sampledb";    // 데이터베이스명
    $db_type = "mysql";    // 데이터베이스 종류
    $dsn = "$db_type:host=$db_host;dbname=$db_name;charset=utf8";
    //dsn변수도 함수안에 들어감
    try{
      $pdo = new PDO($dsn,$db_user,$db_pass);
      //new키워드로 PDO디비연결객체가 생성되고
      //pdo변수에 객체정보가 저장된다
      $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
      //pdo에서 에러모드하고 에러메시지를 띄우도록 설정해둠
      $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
      //pdo로 프리페어드스테이트먼트를 만들려고 할때 자동모드가 작동되지않도록 한다
    }catch(PDOException $Exception){
      //에러가 터졌으때 작동된다
      //PDOException클래스자료형을 $Exception변수에 적용한다
      //PDOException $Exception 변수선언
      // int abc  자료형 변수명
      //PDOException 자료형이다. 클래스는 사용자정의자료형임
      //구조체가 사용자정의자료형인데, 구조체의 업그레이드버전이 바로 클래스임
      //클래스명 변수명 이렇게 쓰면 객체지향프로그래밍에서의 변수선언방법이라고 보면 되요


      die('오류:'.$Exception->getMessage());
      //Exception변수에 담긴 getMessage 오류메시지를 출력한다
    }
    return $pdo; //오류가 뜬것이 아니면 return pdo변수를 돌려준다
    //연결정보를 가지고 있는 pdo객체변수를 본문에서
    //사용할수있도록 돌려준다
  }
?>