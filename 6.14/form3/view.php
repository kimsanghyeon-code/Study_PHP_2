<HTML>
<HEAD>
  <TITLE>PHP 테스트</TITLE>
</HEAD>
<BODY>
<?php
  if($_POST["prefecture"] != "")
  //만약에 prefecture포스터변수가 공백과 같지않다
  //라는 상태가 되면if문은 true가 된다
  {
    print "행정구역:<BR>";
    print $_POST["prefecture"];
    //포스트변수에 담긴 prefecture요소를 출력
  }else{
    print "행정구역을 선택하여 주세요.<BR>";
    //그게 아니면 오류메시지를 출력해줌
  }
?>
</BODY>
</HTML>