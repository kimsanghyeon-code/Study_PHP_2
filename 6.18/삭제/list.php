<HTML>
<HEAD>
  <TITLE>PHP 테스트</TITLE>
</HEAD>
<BODY>
<?php
  require_once("MYDB.php");
  //데이터베이스연결작업을 위한 라이브러리를 연동한다
  $pdo = db_connect();
  //디비연결함수를 작동시키고 연결정보객체를 $pdo변수에 저장한다
  if(isset($_GET['action']) && 
  // get변수 겟변수 키가 action 이 데이터를 가지고 있다면 true
  $_GET['action'] == 'delete' && 
  //겟변수에있는 action키의 값이 delete랑 더블이퀄이냐
  //다시말해서 값이 같으냐 같으면 true 
  $_GET['id'] > 0)
  
  //겟변수의 id키와 연결된값이 0보다 크냐? 크면 true
  //3개의 값이 모두 true면 아래의 중괄호를 실행한다
  // 모든 조건사이에 && 가 있으니까 모든조건에 true가 나와야 실행된다 중괄호가
  //이렇게 검증용 데이터들이 존재한다
  {


    try{
      $pdo->beginTransaction();
      //트랜잭션시작
      $id = $_GET['id'];
      //겟변수로 넘어온 id가 $id지역변수로 값을 저장한다
      $sql = "DELETE FROM member WHERE id = :id";
      //$sql변수에 삭제명령sql을 넣는다
      $stmh = $pdo->prepare($sql);
      //$pdo접속정보에 프리페어메서드의$sql변수내용을
      //$stmh변수에 저장한다
      $stmh->bindValue(':id',$id,PDO::PARAM_INT);
      //바인딩변수에 $id변수의 값을 연결한다


//get변수로 데이터가 넘어와서 지역변수 $id로
//값을 넘겨주고 
//sql작업을 위해서 $id를 다시 :id 바인딩변수에
//값을 붙여줌 
//변수3개가 작동하여 값을 넘겨주고 넘겨줘서
//최종적으로 sql작업이 작동되도록 만들었음


      $stmh->execute();
      //익스큐트메서드로 실행한다
      $pdo->commit();
      //확정짓는 커밋메서드를 실행한다
print "데이터를".$stmh->rowCount().
//결과값이 들어있는 stmh의 행갯수를 세어서 출력함
"건 삭제하였습니다.<br>";
    }catch(PDOException $Exception){
      //오류가 있으면 catch절을 작동시키고
      $pdo->rollBack();
      //롤백처리를 한다 
      //롤백은 이전작업으로 이동하는 것
      print "오류:".$Exception->getMessage();
      //오류메시지띄워줌
    }
  }
  try{
    $sql = "SELECT * FROM member ";
    //테이블의 레코드데이터를 전부출력
    $stmh = $pdo->query($sql);
    //쿼리를 실행하고
    $count = $stmh->rowCount();
    //행들의 갯수를 세고
    print "검색결과는".$count."건입니다.<BR>";
    //몇건이었는지 출력
  }catch(PDOException $Exception){
    //오류메시지나오고
    print "오류:".$Exception->getMessage();
  }
  if($count < 1){
    //만약 카운트가 1보다 작다면 결과가 없다니까
    //아래의 내용을 출력한다
    print "검색결과가 없습니다.<BR>";
  }else{
    ?>
    <TABLE width="450" border="1" cellspacing="0" cellpadding="8">
      <TBODY>
        <!-- 그것이 아니면 
      삭제된 이후에 어떤 데이터가 남아있는지 결과값을 표로서 출력해주는 코드를 
      구현한다
      -->
      <TR>
        <TH>번호</TH>
        <TH>성</TH>
        <TH>이름</TH>
        <TH>연령</TH>
      </TR>
      <?php
while($row = $stmh->fetch(PDO::FETCH_ASSOC)){
  //$row에 $stmh의 값을 한개씩 뽑아서 넘겨주는 fetch메서드가 작동된다
  //while문이기 때문에 데이터가 나오지않을만큼 되면 fetch메서드가 false로 넘겨줘서
  //while문이 종료되게 된다 
          ?>
          <TR>
<TD align="center">
  <?=htmlspecialchars($row['id'])?></TD>
  <!-- row변수의 id키값이 출력되고 중앙정렬된다 -->
  <TD><?=htmlspecialchars($row['last_name'])?></TD>
  <TD><?=htmlspecialchars($row['first_name'])?></TD>
<TD align="center"><?=htmlspecialchars($row['age'])?></TD>
<!-- 레코드데이터구성하는 칼럼들 각각을 테이블의 셀들로서
td태그마다 하나씩 꽂아줘서 출력이 되게 해준다

삭제이후에 남은 데이터들을 테이블로서 출력하는 코드가 완성되게 됨
-->

          </TR>
          <?php
        }
      ?>
      </TBODY>
    </TABLE>
    <?php
  }
?>
</BODY>
</HTML>