<?php
  session_start();
  //세션스타트함수를 써서 세션작업을 할수있게 되는거예요
  $_SESSION["onamae"] = $_POST["onamae"];
  //폼에서 분명 포스트방식을 데이터를 전달했고
  //포스트변수를 써서 onamae의 키와 연결된 값을 호출하죠
  //그 값을 좌측에 있는 세션변수에 있는 onamae로 연결해주는 거예요
  //예를 들면 공항가기전에 택시나 버스타는 것처럼
  //포스트변수로 넘어온 값을 일시적으로 담는데
  //공항가서 비행기타듯이
  //포스트변수로 넘어온값을 세션변수로 넘기는 거예요
  //포스트변수의 역할은 서밋버튼눌러서 변수를 처리해줄수있는
  //페이지로 이동시키는것까지인데. 세션변수는 파일간의 이동시에도
  //변수값을 유실하지않는다는 것이 강력한 장점이자 특징이다
  //데이터입출력할때 변수갈아타기 작업을 할때도 있다
  $_SESSION["honbun"] = $_POST["honbun"];
  //혼분도 변수갈아타기를 함
  if(isset($_POST["user_id"])){
    //숨김으로 넘어왔던 userid가 살아있다면
    //중괄호안에 있는 것을 실행하는데
    //이것또한 포스트변수의 내용을 세션변수로 갈아타는 형태임
    $_SESSION["user_id"] = $_POST["user_id"];
  }
?>
<HTML>
<HEAD>
  <TITLE>PHP 테스트</TITLE>
</HEAD>
<BODY>
확인화면
<FORM name="form1" method="post" action="view.php">
  <?php
    print "이름:";
    print $_POST["onamae"];
    //포스트변수에 저장된 onamae출력
    print "<BR><BR>";
    print "본문 :<BR>";
    print nl2br($_POST["honbun"]);
    //포스트변수로 받은 honbun출력하는데
    //그것을 nl2br함수가 br태그를 추가해줌
    //폼에서 넘겨받은 포스트변수의내용을
    //유실없이 잘 받았는지 출력해서 테스트하는것임
    //그런데 상단에 있는 PHP블럭에서는
    //넘겨받은 포스트변수를 세션작업을 하기위해서
    //세션변수로 변환하는 갈아타기작업을 했음
  ?>
  <BR>
  <INPUT type="submit" value="확인" name="confirm">　
  <!--폼처럼 여기서도 view.php로 데이터를 전달해준다-->
  <INPUT type="submit" value="되돌아가기" name="back">
</FORM>
</BODY>
</HTML>