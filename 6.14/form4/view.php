<HTML>
<HEAD>
  <TITLE>PHP 테스트</TITLE>
</HEAD>
<BODY>
<?php
  if(isset($_POST["hobby"])){
    //만약에 $Post포스트변수 hobby가 내용이 존재한다면
    print "저의 취미는 아래와 같습니다.<BR><BR>";
    //중괄호의 내용을 실행한다
    foreach($_POST["hobby"] as $hobby){
      //중괄호안의 중괄호가 시작됨
      //foreach는 hobby포스트변수값이 전부소진될때까지 반복한다
      //포스트변수 hobby에서 한개씩 데이터를 $hobby로 옮긴다
      print $hobby;
      //$hobby넘겨받은데이터를 출력함
      print "<BR>";
    }
  }else{//여기해당안되면 else문을 실행한다는 것
    print "취미가 없습니다.";
  }
?>
</BODY>
</HTML>