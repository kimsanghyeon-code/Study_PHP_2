<?php

  class Member{
    private $id;
    private $lastname;
    private $firstname;
    private $email;
    private $password;
    //중요한 데이터를 보관해주는 멤버변수
    //프라베이트애들은 전부 중요한 데이터관련됨
    
    //getxx 메서드의 앞에 get이 있으면
    //데이터를 가져오는 메서드라고 보면 되요
    //이것을 우리는 게터메서드라고 불러요
    //getter메서드
    //get+멤버명

    //setxx 메서드의 앞에 set이 있으면
    //데이터를 입력하고 세팅하는 메서드라고 보면 되요
    //이것을 우리는 세터메서드라고 불러요
    //setter메서드
    //set+멤버명

    public function getId(){
      //값을 가져오기만 하니까 괄호안에 인자가없다
      return $this->id;
      //return 돌아올때 this 현재객체의 id멤버를 돌려줘라
      //$this->id
    }
    public function setId($id){
      //외부에서 값이 오면 메서드내에서만 존재하는 지역변수에 
      //외부값이 저장이 되고
      //$this->id = $id;오른쪽의 값을 왼쪽에 객체속성에 저장해준다
      //셋아이디메서드는 괄호안에 변수가 들어간다
      //혹은 데이터값
      $this->id = $id;
      //외부에서 들어온 아이디값을 
      //왼쪽에 있는 현재객체의 this id멤버에 저장한다
    }
    public function getLastname(){
      return $this->lastname;
    }
    public function setLastname($lastname){
      $this->lastname = $lastname;
    }
    public function getFirstname(){
      return $this->firstname;
    }
    public function setFirstname($firstname){
      $this->firstname = $firstname;
    }
    public function getEmail(){
      return $this->email;
    }
    public function setEmail($email){
      $this->email = $email;
    }
    public function getPassword(){
      return $this->password;
    }
    public function setPassword($password){
      $this->password = $password;
    }
    // 회원정보 입력
    public function regist(){
    }
    // 입력완료 메일 발송
    public function registMail(){
    }
    // 회원정보 편집
    public function edit(){
    }
    // 패스워드 재발급
    public function resendPassword(){
    }
    // 탈퇴 처리
    public function delete(){
    }
  }

  $member = new Member;
  //new키워드로 member클래스객체를 만들고
  //member객체변수저장한다
  $member->setID("1");
  //$member객체변수에서 setID메서드를 작동시키는데 이때1을 넣어준다
  //만약에 이것이 private가 아니고 public이었다면
  //$member->id="1";

  //값을설정하는 세터메서드를 활용하는 장면
  $member->setLastname('KIM');
  $member->setFirstname('SUNGON');
  $member->setEmail('sungon@naver.com');
  $member->setPassword('1111');

  //설정된 값을 호출해오는 게터메서드를 활용하는 장면
  print $member->getID()."<BR>";
  //괄호안에는 내용이 없고
  print $member->getLastname()."<BR>";
  print $member->getFirstname()."<BR>";
  print $member->getEmail()."<BR>";
  print $member->getPassword()."<BR>";
?>