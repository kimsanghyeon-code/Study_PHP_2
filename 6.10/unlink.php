<?php
    $filename = "test.txt";
    if(is_file($filename) && unlink($filename)){
        print $filename."를 삭제하였습니다.";
    }else{
        print $filename."는 삭제할 수 없습니다.";
    }
?>


<?php
  /*$filename = "test.txt";
  //변수에 파일명을 넣음
  if(is_file($filename) && unlink($filename)){
    //만약에 isfile함수는 filename변수안에 있는 파일이 존재하는지 확인해요
    //앞의 조건이 true가 되면 뒤에 있는 조건을 보는데
    //unlink함수에 의해서 삭제처리됨 filename변수안에 있는 파일명을 가진 파일이
    //2개 조건이 동시에 참이되면 중괄안에 내용을 실행을 해요
    print $filename."를 삭제하였습니다.";
  }else{
    //그게 아니면 else문을 실행해요
    print $filename."는 삭제할 수 없습니다.";
  }*/
?>