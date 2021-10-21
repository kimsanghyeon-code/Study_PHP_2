<HTML>
<HEAD>
  <TITLE>PHP 테스트</TITLE>
</HEAD>
<BODY>
<?php
  if(isset($_POST["gender"])
  //gender키와 연결된 데이터가 세팅이 되어있는가
  && 
  ($_POST["gender"] == "남" || 
  $_POST["gender"] == "여"))
  //그럼 포스트변수에 gender의 값이 남과 같거나
 //혹은 값이 여와 같다면 중괄호안의 내용을 실행

  {

    print "성별:<BR>";
    //성별출력
    print $_POST["gender"];
    //출력 gender포스트변수안에있는 값을 
  }else{ //그게 아닐때는else로 출력
    print "성별을 선택하세요.<BR>";
  }
?>
</BODY>
</HTML>