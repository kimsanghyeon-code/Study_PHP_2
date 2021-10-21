<HTML>
<HEAD>
  <TITLE>PHP 테스트</TITLE>
</HEAD>
<BODY>
<?php
  $mysqli = new mysqli('localhost','sample','password','sampledb');
  //데이터베이스의 연결정보와 연결작업을 형상화한 객체를 만들어내는함수
  //간단히말하면 mysqli함수가 디비하고 PHP하고 연결해준다 이렇게 보면 되요
  //함수안을 보면 첫번째인수는 서버주소
  //두번째인수는 사용자계정
  //세번째인수는 데이터베이스의 비밀번호
  //네번째인수는 우리가 활용한 데이터베이스의 이름이죠
  //4가지 정보를 함수에 넣고 new키워드를 앞에 붙여주면
  //디비연결객체가 생성이 된다
  //가장 왼쪽에 $mysqli는 디비연결객체(=연결객체)를 저장해주는 객체변수임
  //이제부터 mysqli는 디비연결객체변수인거예요
  //아래의 코드에서는 mysqli가 연결객체변수로 중요한 역할을 맡는다
  if($mysqli->connect_error)
  //$mysqli의 connect_error가 참이면
  //이말은 연결객체변수가 에러가 있다는 말이예요
  {
    die('Connect Error:('.$mysqli->connect_errno.') '.$mysqli->connect_error);
    //Connect Error:(라는 단어를 띄우고 뒤에 이어서 도트연산자로 연결해주고 .$mysqli->connect_errno.을 출력해주고
    //에러넘버를 출력하고 ') '을 출력하고 뒤이어서.$mysqli->connect_error을 출력해달라
    //간단히 말하면 에러번호찍고 에러메시지를 찍어달라는 거예요
    
  } //바로 위에있는 에러의 경우에 해당하지않으면 아래의 성공메시지를 찍는다
  print 'mysqli 클래스를 통해 접속이 성공하였습니다.';
  //PHP가 미리 준비된 텍스트를 출력한게아니고 애러가 없을 출력하라고 여러분이 print문을 작성했기 때문에 나타났다
  // 여기에서 데이터베이스 관련 처리를 합니다.
  $mysqli->close();
  //모든 연결은 연결하고 작업다하고 끝나면 close메서드를 써야된다
?>
</BODY>
</HTML>