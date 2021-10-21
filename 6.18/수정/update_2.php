<?php
  session_start(); //세션 시작
?>
<HTML>
<HEAD>
  <TITLE>PHP 테스트</TITLE>
</HEAD>
<BODY>
<?php
  require_once("MYDB.php");
  //MYDB.php에서 이미 선언되었던 db데이터를 가져옴 
  $pdo = db_connect();
  //우측의 객체가 좌측에 저장
  $id = $_SESSION['id'];
  //세션변수id의 값이 $id에 저장
  try{
    $pdo->beginTransaction();
    //데이터베이스연산을 시작
    $sql = "UPDATE  member --멤버테이블을 수정
            SET 
              last_name  = :last_name, --데이터 베이스 값과 바인딩된 변수값이 같도록 함
              first_name = :first_name,--데이터 베이스 값과 바인딩된 변수값이 같도록 함
              age        = :age --데이터 베이스 값과 바인딩된 변수값이 같도록 함
            WHERE id = :id";  //조건을 지정, 데이터베이스의 id값과 바인딩된 값의 id값이 같은 값만 해당
    $stmh = $pdo->prepare($sql);
    //프리페어메서드에 위의 수정작업이 담긴 $sql변수를 적용하여 stmh변수에 저장
    $stmh->bindValue(':last_name',$_POST['last_name'],PDO::PARAM_STR);
    //~~를 string형으로 저장하겠다~~ 라는 문구 (결과가 아님)
    $stmh->bindValue(':first_name',$_POST['first_name'],PDO::PARAM_STR);
    $stmh->bindValue(':age',$_POST['age'],PDO::PARAM_INT);
    $stmh->bindValue(':id',$id,PDO::PARAM_INT);
    $stmh->execute();
    //익스큐트메서드를 실행해야 결과로 이어짐
    $pdo->commit();
    //승인작업. 확인사살느낌. 이전으로 돌릴 수 없도록 함.
    print "데이터를 ".$stmh->rowCount()."건 수정하였습니다.<br>";
    //stmh의 결과로 저장된 행들의 갯수를 rowCount함수로 실행
  }catch(PDOException $Exception){
    $pdo->rollBack();
    //catch 이하는 오류 발생 시 발동
    //rollback이 작동            6/18 여기까지 했다 
    print "오류:".$Exception->getMessage();
    //오류하고 Exception객체변수가 가지고 있는 겟메시지메서드를 출력한다
  }
  // 세션 변수를 전부 삭제합니다.
  $_SESSION = array();
  //세션변수에 여러값이 저장이 되있는데
  //비어있는 array함수를 세션변수에 저장한다
  //그러면 여러값이 저장된 세션변수는 내용이 오버라이팅된다
  //덮어쓰기효과가 생김
  // 마지막으로 세션을 파기합니다.
  session_destroy();
  //세션디스트로이 세션과 관련 설정들을 완전삭제한다
?>
</BODY>
</HTML>