<?php
    if(copy("test.txt","test.bak")){
        print "복사에 성공하였습니다.";
        print "복사에 성공하였습니다.";
    }else{
        print "복사 할 수 없습니다.";
    }
?>


<?php
/*  if(copy("test.txt","test.bak")){
    //어제만든 test.txt가 있다면
    //만약에 원본이 test.txt이고 복사본이 
    //test.bak을 만들라고 copy함수가 작동을 함
    //제대로 되면 true가 됨. 성공하면 아래의 중괄호안에 있는
    //코드를 실행한다
    print "복사에 성공하였습니다.";
    print "복사에 성공하였습니다.";
  }else{
    print "복사 할 수 없습니다.";
  }*/
?>