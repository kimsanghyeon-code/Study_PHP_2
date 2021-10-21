<HTML>
<HEAD>
  <TITLE>PHP 테스트</TITLE>
</HEAD>
<BODY>
<?php //PDO클래스에 접속정보를 넣음
//mysql:host=localhost; DBMS의종류:host=서버의 종류
//dbname=sampledb2; db의 이름을 쓰는 곳
//charset=utf8','sample','password' 문자세트설정, 아이디계정정보, 그것의 비밀번호입력
//PDO클래스는 ;세미콜론으로 접속정보를 나누어놨다
//앞의 dbtest2는 전통적인 함수를 활용한 접속이고
//지금은 pdo클래스를 사용해서 씀
//dbtest2는 mysql에서만 쓰는데 pdo클래스는 dbms종류옵션만 바꾸면 어디에서든 쓸수있음
  $pdo  = new PDO('mysql:host=localhost;dbname=sampledb;charset=utf8','sample','password');
  //new키워드로pdo객체를 만들고 가장왼쪽에 있는 $pdo변수에 객체를 저장시킴
  //$pdo는 디비연결정보객체가 들어간 변수임
  print 'PDO 클래스를 통해 접속이 성공하였습니다.';
  //성공시 출력할 텍스트
  // 여기에서 데이터베이스 관련 처리를 합니다.
  $pdo = null;
  //디비연결종료시에는 pdo에 널값을 넣어버림
  //그러면 덮어쓰기가 되서 연결정보가 날라간다
  //그럼 연결이 자동으로 끊어진다
?>
</BODY>
</HTML>