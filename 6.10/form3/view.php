<HTML>
<HEAD>
  <TITLE>PHP 테스트</TITLE>
</HEAD>
<BODY>

<?php
  print $_POST["onamae"]."님으로부터의 메시지";
  print "<BR><BR>";
  print "본문 :<BR>";
  //여기에서는 앞에 있던 view.php랑 비슷함
  //다만 여기에서 히든속성의 데이터를 사용하는 코드가 있었다면 여기에서 활용할수있음
  print nl2br($_POST["honbun"]);
?>

</BODY>
</HTML>