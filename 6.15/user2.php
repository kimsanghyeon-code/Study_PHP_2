<?php
  //PHP는 크게 2가지로 나뉘어짐
  //과거에 쓰던 레거시php 지금까지 공부한스타일
  //객체의 개념을 넣음 모던php 
  //PHP는 다양한 개발프레임워크가 나타난다
  //마치 자바의 스프링처럼
  //코드이그나이터, 라라벨프레임워크
  
  $user = new User();
//클라스를 사용하고

//클래스를 사용하려고하면 먼저!

// 클래스의 객체가 저장될 변수를 가장왼쪽에 배치함
// 이퀄뒤에 new키워드를 쓰고 클래스명을 씀
//이러면 new키워드때문에 클래스명에 해당하는 
// 클래스객체가 생성된다. new키워드때문에 
// new키워드로 객체가 생성되면 좌측에 있는
// $user객체변수에 저장된다
// 배열을 저장하는 변수는 배열변수
// 객체를 저장하는 변수는 객체변수
// 메서드를 쓰려면 객체변수명 뒤에 화살표를 붙이고 메서드명을 써주면된다

//아래는 클래스를 선언하고
  class User{
    //class 클래스명
    //클래스내부의 변수 다시말해 멤버속성
    // $name이 멤버임 여기에 값을 저장할수있게된다
    public $name = '철수';
    //클래스내부의 함수 다시말해 메서드라고 부름
    public function print_hello(){
      print $this->name;
      //출력해라 $this는 현재의 객체를 지칭하는것임
      //나자신이라는 뜻임
      //이것은 나자신 객체가 가지고 있는 name멤버를 출력하라
      //-> 화살표는 자바나 제이쿼리 이런 다른에서는
      // 도트연산자를 써요 . 쩜을 찍고 뒤에 함수명이나 메서드명을 쓰는데
      //모던PHP에서는 독특하게 도트대신 화살표를 쓰더라
      print "님 안녕하세요!<BR>";
    }
  }
?>