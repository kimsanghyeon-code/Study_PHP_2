<!-- 클라이언트식별을 위해 사용되는 세션-->
<?php
  session_start();
  //세션스타트라는 함수를 사용해야해요
  //그래야 세션작업이 시작하게 된다
  $count = 1;
  //카운트변수에 1을 저장함
  if(isset($_SESSION["count"])){
    //만약에 $_SESSION세션변수를 사용하겠다는 뜻이고
    //세션변수에 count키가 존재한다면 중괄호안의 내용을  실행하라
    $count = $_SESSION["count"];
    //세션변수에 count키하고 연결된 데이터를
    //$count변수에 저장한다
    //세션.php파일안에서 사용하는 지역적인 변수
    //count변수에 세션변수에 있는 값을 옮겨준다
    $count ++;
    //카운트변수 후위증감한다
  }
  $_SESSION["count"] = $count;
  //증감을하고 중괄호를 빠져나와서 마지막 카운트변수값을
  //세션변수 count키의 값에 저장한다
  //만약인데 세션변수의카운트키의 값이 세팅이안되면
  //카운트변수의 값을 세션변수 카운트키값에 세팅해준다
?>
<HTML>
<HEAD>
  <TITLE>세션 변수 테스트</TITLE>
  <META http-equiv="Content-Type" content="text/html; charset=utf-8">
</HEAD>
<BODY>
세션 변수 테스트<BR>
<BR>
<?php
  if($count == 1){//만약에 카운트변수1이면
    ?>
    처음 방문입니다.<BR><!--처음방문입니다-->
    <BR>
    세션 변수에 데이터가 없습니다.<BR>
    페이지를 새로고침 하세요.<BR>
    <?php
  }else{
    ?><!-- 그게아니면 else문을 실행한다-->
    당신의 방문은 <?=$count?>회째입니다.<BR>
    <!-- <?=$count?> php에서 값을 호출하고 
  $count변수의 값을 호출한다
  -->
    <?php
  }
?>
</BODY>
</HTML>