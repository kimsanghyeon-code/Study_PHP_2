<?php
  session_start();
?>
<HTML>
<HEAD>
  <TITLE>PHP 테스트</TITLE>
</HEAD>
<BODY>
<?php
  require_once("MYDB.php");
  //디비연결 작업중에는 언제나 되어야하기때문에
  //맨먼저 선언이 되는거예요
  $pdo = db_connect();
  //리턴pdo객체가 왼쪽에 있는 $pdo에 저장된다
  // 세션 변수를 받습니다.
  $id = $_SESSION['id'];
  //updateform.php에서 생성된 세션변수id의 값이 
  //$id에 저장된다
  try{
    $pdo->beginTransaction();
    //트랜잭션 다시말해서 데이터베이스연산을 시작하겠다는뜻
    //$sql에 update관련 sql구문이 저장된다
    $sql = "UPDATE  member --멤버테이블을 수정하겠음
            SET --어떻게 수정할것인가
              last_name  = :last_name, --데이터베이스에 저장된 라스트네임칼럼값과 바인딩변수값이 같도록 한다
              first_name = :first_name,
              age        = :age
            WHERE id = :id";  //조건은 데이터베이스의 id칼럼과 바인딩변수id가 같은것들에대해서 적용한다
    $stmh = $pdo->prepare($sql);
    //프리페어메서드에 수정작업이 담긴 $sql변수를 적용한다
    //그결과를 stmh변수에 저장한다
    $stmh->bindValue(':last_name',$_POST['last_name'],PDO::PARAM_STR);
    //위의 sql은 식이지 결과가 아니다
    //그래서 바인드밸류를 통해서 값을 연결하고 익스큐트메서드까지 돌려야 실행이 완성이 되는것이다
    //문장이 길어져서 맥락과 호흡을 놓치면 디비코드 망해요 그러니까 그러니까 끝까지 집중할것
    $stmh->bindValue(':first_name',$_POST['first_name'],PDO::PARAM_STR);
    $stmh->bindValue(':age',$_POST['age'],PDO::PARAM_INT);
    $stmh->bindValue(':id',$id,PDO::PARAM_INT);
    $stmh->execute();
    //익스큐트메서드를실행하고
    $pdo->commit();
    //승인 commit 커밋메서드를 실행해서 이전으로 돌릴수없도록한다
    print "데이터를 ".$stmh->rowCount()."건 수정하였습니다.<br>";
    //stmh의 결과로 저장된 행들의 갯수를 rowcount함수로 실행한다
  }catch(PDOException $Exception){
    $pdo->rollBack();
    //오류가 발생하면 catch가 발동해서
    //rollback롤백메서드가 작동되게한다
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