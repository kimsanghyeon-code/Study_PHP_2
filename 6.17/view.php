<HTML>
<HEAD>
  <TITLE>PHP 테스트</TITLE>
</HEAD>
<BODY>
<?php
  $db_user = "sample";    // 사용자명
  $db_pass = "password";    // 패스워드
  $db_host = "localhost";    // 호스트명
  $db_name = "sampledb2";    // 데이터베이스명
  $db_type = "mysql";    // 데이터베이스 종류
  $dsn = "$db_type:host=$db_host;dbname=$db_name;charset=utf8";
  //변수가 접속정보에 위치할수도있음.
  //변수를 넣으면 내부의 값을 변경할때 변수만 바꾸면 되니까
  //db_type변수에 mysql이나 oracle을 넣으면 각각 인식된다
  //하드코딩이라고 불러요 변경되지않고 그대로 값을 유지하고 우리가 하나씩 입력해주는 것
  // $dsn은데이터소스네임의 약어예요
  try{ //객체지향언어의 많이 나오는 형태
    //try는 반드시 실행해야할 코드들 그러니까 일반적인 실행코드
    //catch는 try에서 오류나 이상값작동될때 대응하는 코드블럭이다
    //try나 catch 모두 중괄호로 감싸여있다
    $pdo = new PDO($dsn,$db_user,$db_pass);
    //PDO객체를 만듭니다 그리고 pdo객체변수에 저장을 해요
    $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
    print "접속하였습니다.<br>";
  }catch(PDOException $Exception){
    die('오류:'.$Exception->getMessage());
    //여기까지 PHP코드가 디비서버에 접속하는 장면임
    //이제 아래부터는 SQL코드 작업을 함
  }
  try{
    $pdo->beginTransaction();
    //트랜잭션은 데이터베이스가 연산하는 하나의 단위이다
    //비긴트랜잭션메서드는 이제부터 디비작업을 하겠다는 뜻이고
    //저걸해야 디비연산을 할 수 있다
    $sql = "INSERT  INTO member (last_name, first_name, age) VALUES ( :last_name, :first_name, :age )";
    //데이터를 추가하는 insert into 문장을 변수에 저장한다
    //콜론형태의 바인딩변수체계를 갖는다
    $stmh = $pdo->prepare($sql);
    //프리페어메서드는 sql명령이 담긴 변수를 가지고 프리페어연산을한다
    //그래서 sql문장을 실행할수있는 준비를 마무리한다
    //그내용이 stmh변수에 저장된다
    $stmh->bindValue(':last_name',$_POST['last_name'],PDO::PARAM_STR);
    //stmh변수에 바인드밸류메서드로 외부에서 들어온 
    //포스트변수 lastname과 연결된 값을 바인딩변수인 :lastname 콜론라스트네임에
    //붙인다 값을 연결한다(사상한다 매핑한다 바른다)
    $stmh->bindValue(':first_name',$_POST['first_name'],PDO::PARAM_STR);
    $stmh->bindValue(':age',$_POST['age'],PDO::PARAM_INT);
    $stmh->execute();
    //값연결작업이 끝나면 익스큐트메서드로 sql을 실행한다
    //이로서 PHP코드가 mysql DBMS에 작성했던 SQL문장을 실행시켜버린다

    $pdo->commit();
    //commit 커밋은 실행시킨 sql문장을 확정짓고 실행취소를 하지못하게 만든다
    //업무를 마치는 명령
    print "데이터를 ".$stmh->rowCount()."건 입력하였습니다.<br>";
    //stmh에는 sql연산결과와 정보가 담겨있다
    //rowcount메서드를 작동시키면 stmh에 담긴 sql연산결과에 대한 갯수를 세어줄수있다
  }catch(PDOException $Exception){
    //입력sql에서 연산작업중 오류가 났을때 
    //catch문장을 실행한다
    $pdo->rollBack();
    //롤백메서드로 지금까지 했던 작업을 전부 초기화시킴
    //그래서 새로 작업을 할수 있도록 명령을 내리기전의 상태로 돌려버린다
    print "오류:".$Exception->getMessage();
    //오류메시지를 띄워주고
  }
?>
</BODY>
</HTML>