<HTML>
<HEAD>
  <TITLE>PHP 테스트</TITLE>
</HEAD>
<BODY>
<?php
  if(isset($_POST["hobby"]))
  //hobby키하고 연결된 배열데이터들이 존재하는가라는뜻
  {
    $hobby = implode('와 ',$_POST["hobby"]);
    //배열을 문자열로 바꾸는 함수
    //implode인데
    //hobby배열의 인덱스 개별 요소사이에
    //와라는 단어를 넣고 implode함수계산을 하고
    //$hobby변수에 저장을 한다

    print "저의 취미는 "; //출력
    print $hobby; //문자열화된 배열내용이 담긴 $hobby변수값을 출력한다
    print "입니다.";
  }else{ //이에 해당되지않으면 else의 내용을 출력한다
    print "저의 취미는 없습니다.";
  }
?>
</BODY>
</HTML>