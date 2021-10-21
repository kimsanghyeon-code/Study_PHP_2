<HTML>
<HEAD>
  <TITLE>Trait 테스트</TITLE>
  <META http-equiv="Content-Type" content="text/html; charset=utf-8">
</HEAD>
<BODY bgcolor="#FFFFFF" text="#000000">
<FONT size="4">Trait 테스트</FONT>
<BR><BR>
<?php
//수직상속은 자신의 부모클래스가 
//가지고 있는 멤버와 클래스를 사용하기위해서 만든 개념
//상속은 1개만 상속받을수있다
//다른 클래스에서 멤버와 메서드를 활용하는 것에서 
//제한이 있을수있다 그래서
//수평상속을 함 2개의 클래스가 서로 에게 멤버와 클래스를 
//사용할 수있도록 함

  trait SayMorning{
    public function print_morning(){
      print $this->name;
      //디스자신의 객체가 가지고 있는 name필드를 출력한다
      print "님, 안녕하세요!<BR>";
    }
  }
  class User{
    private $name = null;
    public function print_hello(){
      print $this->name;
      print "님, 반갑습니다!!<BR>";
    }
  }
  class Guset extends User{
    //extends상속또는 확장을 의미함
    //User클래스가 Guest클래스에게 멤버변수와 메서드에 대한 사용권을 지원함
    use SayMorning;
    //new키워드를 사용해서 객체를 만드는데
    //이것을 수직상속이라함 php는 수평상속도 가능
    private $name = "게스트";
    public function print_hello(){
      print $this->name;
      print "님, 처음 뵙겠습니다!<BR>";
    }
  }
  $newuser = new Guset();//게스트객체를 뉴유저객체변수에 저장
  $newuser->print_hello();
  //뉴유저라는 객체에 print_hello를 출력
  $newuser->print_morning();
  //뉴유저객체변화와 관련된 수평상속 트레이트안에 있던 메서드를 호출해서 사용했다
?>
</BODY>
</HTML>