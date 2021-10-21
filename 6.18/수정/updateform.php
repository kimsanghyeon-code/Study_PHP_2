<?php
  session_start();//세션시작
?>
<HTML>
<HEAD>
  <TITLE>PHP 테스트</TITLE>
</HEAD>
<BODY>
<?php
  require_once("MYDB.php");//한번로딩함
  //return $pdo가 MYDB.php의 결과로 
  //나오는 것이기때문에 바로 아래에서 
  //$pdo에 쓸수있는것이다. 
  $pdo = db_connect();
  //$pdo = $pdo 왼쪽것은 updateform에서 만든거
  //오른쪽 $pdo는 함수의 연산결과

  // 여기를 변경하면 수정대상이 바뀝니다.
  $id = 1;//아이디1번이 대상
  $_SESSION['id'] = $id;//초기화된아이디
  //이것을 세션변수의 아이디로 전달해줌
  try{
    $sql = "SELECT * FROM member WHERE id = :id ";
    //sql변수에 sql문장을 저장한다
    $stmh = $pdo->prepare($sql);
    //프리페어메서드에 완성된 sql변수값을 집어넣어서 
    //프리페어문장이 되도록 하고 그것을stmh변수에 저장함
    $stmh->bindValue(':id',$id,PDO::PARAM_INT);
    //stmh에 바인드벨류메서드로 값을 붙이도록 한다 
    //바인딩변수이 :id에 $id가 달라붙는다 이것은 들어가는값이 정수임을 알려준다
    $stmh->execute();
    //실행메서드가 작동
    $count = $stmh->rowCount();
    //로우카운트 결과행들의 갯수를 세어서 count변수에 저장한다
  }catch(PDOException $Exception){//예외처리 오류메시지출력
    print "오류:".$Exception->getMessage();
  }
  if($count < 1){//만약에 카운트가 1보다 작다면
    print "수정 데이터가 없습니다.<BR>";//해당 텍스트 출력
  }else{//그게 아니면 관련 데이터를 fetch메서드로 뽑아낸다
    //그것을 $row변수에 저장한다
    $row = $stmh->fetch(PDO::FETCH_ASSOC);
    ?>
    <FORM name="form1" method="post" action="update.php">
      <!--여기는 수정폼이기 때문에 여기의 결과는 update.php로 전달된다-->
      번호：<?=htmlspecialchars($row['id'])?><BR>
      성：<INPUT type="text" name="last_name"
               value="<?=htmlspecialchars($row['last_name'])?>"><BR>
               <!-- $row에 들어있는 연관배열들이 표기가 되고 htmlspecialchars함수에 의해서 
               저장된 내용이 출력된다-->
      이름：<INPUT type="text" name="first_name"
                value="<?=htmlspecialchars($row['first_name'])?>"><BR>
      연령：<INPUT type="text" name="age"
                value="<?=htmlspecialchars($row['age'])?>"><BR>
      <INPUT type="submit" value="수정">
    </FORM>
    <?php
  }
?>
</BODY>
</HTML>