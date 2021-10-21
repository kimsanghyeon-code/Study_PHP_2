<?php
  class Test{ 
    //클래스테스트에는 3개의 메서드가 선언됐다
    public function TestPublic(){
      print "공개<BR>";
    }
    function TestNothing(){
      print "선언없음<BR>";
    }
    private function TestPrivate(){
      print "비밀<BR>";
    }
  }
  $test = new Test();
  //테스트클래스의 객체를 생성해서 테스트변수에 저장
  $test->TestPublic();//$테스트에서 테스트퍼블릭을 실행
  $test->TestNothing();//테스트객체변수가 작동함
  $test->TestPrivate();// 이 부분만 오류가 됩니다.
  //프라이베이트는 클래스내부에서 진행된다
?>