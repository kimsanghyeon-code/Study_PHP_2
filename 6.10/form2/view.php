<HTML>
<HEAD>
  <TITLE>PHP 테스트</TITLE>
</HEAD>
<BODY>
<?php
  print $_POST["onamae"]." 님 안녕하세요!";
  //print명령
  //$_POST는 post방식으로 전달되는 
  //데이터를 다룰수있게 해주는 시스템배열
  //form.html에서 인풋태그의 텍스트박스에 
  //name속성이 바로 onamae인데, 
  //네임속성하고 연결된 사용자가 텍스트박스에
  //입력한 글씨가 name속성과 연결되어있다
  //연관배열에서 키와 값이 연결되어있는 것처럼
  //이것도 키인 name속성을 써주면
  //입력했던 텍스트값이 출력이 된다. 
  //.도트연산자로 뒤에있는 메시지들과 연결이 됐다. 
?>
</BODY>
</HTML>