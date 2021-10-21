<HTML>
<HEAD>
  <TITLE>클래스 테스트 </TITLE>
  <META http-equiv="Content-Type" content="text/html; charset=utf-8">
</HEAD>
<BODY bgcolor="#FFFFFF" text="#000000">
<FONT size="4">클래스 테스트</FONT>
<BR><BR>
<?php
  $newuser = new User();
  //뉴키워드로 유저클래스객체를 생성해서
  //newuser변수에 저장을 함

  $newuser->print_hello();
  //$newuser객체변수에 화살표 함수메서드이름을 쓰니까 작동된다
  
  class User{ //유저클래스를 선언
    public $name = '철수';//네임멤버선언
    public function print_hello(){
      //프린트헬로라는 메서드선언
      print $this->name; //현재객체의 name멤버속성을
      //출력하라는 것
      //디스는 자기자신 객체를 지칭한다
      print " 님 안녕하세요!<BR>";
    }
  }
?>
</BODY>
</HTML>