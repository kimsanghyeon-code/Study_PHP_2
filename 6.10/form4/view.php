<HTML>
<HEAD>
  <TITLE>PHP 테스트</TITLE>
</HEAD>
<BODY>
<?php
  if(isset($_POST["confirm"])){
    //만약에 포스트변수의 키 confirm이 내용이
    //들어있는지 세팅이 되어있는지 확인하는 isset함수가 
//작동을 함. 내용이 존재하면 true가 되서 
//중괄호를 실행함
    ?>
    <?php
    // 확인 버튼을 누른 경우
    print $_POST["onamae"]."님으로부터의 메시지";
    print "<BR><BR>";
    print "본문 :<BR>";
    print nl2br($_POST["honbun"]);
    //이름과 본문을 출력해줌
    ?>
    <?php
  }elseif(isset($_POST["back"])){
    //포스트변수에서 back키가 세팅이 되어있다
    //되로 가기가 체크되어있다면
    //아래의 것을 실행함
    // 되돌아가기 버튼을 누른 경우
    ?>
    <FONT size="4">텍스트 발송 테스트</FONT>
    <FORM name="form1" method="post" action="confirm.php">
      <!--폼이 하나나타남
    이 폼은 confirm.php로 돌아가게됨
    
    -->
      이름:<BR>
      <INPUT type="text" name="onamae" value="<?=$_POST["onamae"]?>">
      <!-- 현재 포스트시스템변수에 들어있는 값을 텍스트박스에 나타나게 한다
      그래서 수정작업을 하고 다시 confirm.php로 돌아가도록 함
    -->
      <BR>
      본문 :<BR>
        <TEXTAREA name="honbun" cols="30"
                  rows="5"><?=$_POST["honbun"]?></TEXTAREA>
      <BR>
      <INPUT type="submit" value="발송">
      <INPUT type="hidden" name="user_id" value="<?=$_POST["user_id"]?>">
    </FORM>
    <?php
  }else{
    //상기 이외의 경우
    ?>
    오류입니다.<BR>
    <a href="form.html">form.html</a>로 돌아갑니다.
    <!--오류일때는 이전페이지로 돌아가게 되는 하이퍼링크태그가 나타나게 됨-->
    
    <?php
  }
?>
</BODY>
</HTML>