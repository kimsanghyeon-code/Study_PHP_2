<HTML>
<HEAD>
  <TITLE>클래스 테스트 </TITLE>
  <META http-equiv="Content-Type" content="text/html; charset=utf-8">
</HEAD>
<BODY bgcolor="#FFFFFF" text="#000000">
<FONT size="4">클래스 테스트</FONT>
<BR><BR>
<?php

//클래스를 볼때 메인이 되는 클래스는
//당연히 new키워드가 붙어서 객체를 생성하는 
//클래스가 주인공이 되는 거예요

  class User{
    private $name = null;
    public function print_hello(){
      print $this->name;
      print " 님, 안녕하세요!<BR>";
    }
  }
  class Guest extends User{
    private $name = "게스트";
    public function print_hello(){
      print $this->name;
      print "님, 반갑습니다!<BR>";
    }
  }
  $newuser = new Guest();
  //new 키워드로 게스트클래스의 객체를 생성해서
  //newuser객체변수에 저장해라
  $newuser->print_hello();
  //newuser객체변수에서 printhello라는 메서드를 실행해라
  //프린트헬로메서드는 extends 다시말해서 
  //User클래스를 부모클래스로 해서 상속을 받고 있어요
  //그러면 user클래스가 가지고 있는 메서드나 멤버변수를
  //가져다 쓸수있다고 했죠
  //이렇게 명령구조를 가져다가와서 
  //본인이 쓰고 싶은 형태로 변형해서 쓰는 것을 
  //클래스의 오버라이딩이라고 불러요

  //클래스에는 오버로딩이 있고
  //오버라이딩있는데 유명한 2가지 기능이예요
  //지금같은 오버라이딩은 부모클래스에서 가지고 있는
  //메서드를 이름가지고 와서 내가 기능을 추가하거나 변경하는경우
  //오버로딩은 같은이름의 메서드를 여러개 만들수있는데
  // 같은이름의 메서드이지만 입력받을수있는 인수,인자의 갯수나
  //자료형을 변경해서 여러개를 만들수있어요
  //이를 통해서 다양한 입력값들을 받아서 사용할수있도록
  //메서드함수의 사용처나 입력받을수있는 데이터의 양과 종류를
  //다양하게 해서 보편적인 사용을 유도한다는 객체지향프로그래밍의 기법
?>
</BODY>
</HTML>