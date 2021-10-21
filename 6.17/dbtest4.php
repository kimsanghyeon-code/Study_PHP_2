<html>
<head><title>PHP TEST</title></head>
<body>
<?php
  // 사용자명 sample을 samplee로 입력하여 접속 오류가 발생합니다.
  try{
    $pdo = new PDO('mysql:host=localhost;dbname=sampledb;charset=utf8','samplee','password');
    $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    //setAttrtibute 속성을 설정하는 메서드가 동작을 함
    //PDO클래스에서 설정할수있는 옵션을 작동하려면 PDO:: 피디오더블콜론을 쓴다는것
    //단순히 에러가 나오는게 아니고 에러를 컨트롤할 수 있는 속성을 작동
    // ERRMODE_EXCEPTION 그리고 예외처리도 동작하게 만든다는 것임 
    $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
    //ATTR_EMULATE_PREPARES,false 
    //pdo가 데이터가 연결되는 작업을 자동으로 해주는 데
    //에뮬레이트프리페어즈인데 그것을 수동으로 하기위해서 false설정을 넣음
    print "접속하였습니다.";
  }catch(PDOException $Exception){
    //캐치는 에러는 잡는다는 의미에서 캐치예요
    //PDOException 피디오클래스의 예외처리을 다루는 클래스예요
    // 예외처리는 우리가 기존에 에러라고 불렀던것들을 관리하기 위한 대상으로서
    // 부르는 개념이라고 보면 됨
    //PDOException $Exception 인수가 2개있는게 아니고
    //PDOException클래스의 자료형을 받는 $Exception객체변수를 넣는다
    //에러가 생기면 $Exception객체변수가 다룬다
    die('접속 오류:'.$Exception->getMessage());
    //.$Exception의 getMessage메서드로 에러에 대한 대응책을 마련한다
  }
?>
</body>
</html>