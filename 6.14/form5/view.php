<?php
  session_start();//세션스타트를 
  //해야 세션변수를 사용할수있다
?>
<HTML>
<HEAD>
  <TITLE>PHP 테스트</TITLE>
</HEAD>
<BODY>

<?php
  if(isset($_POST["confirm"])){
    //confirm.php에서 보내준 데이터인
    //포스트변수 confirm키가 세팅되어있다면
    //중괄호의 내용을 실행하라는 뜻
    ?>

    <?php
    // 확인 버튼을 누른 경우
    print $_SESSION["onamae"]."님으로부터의 메시지";
    //세션변수에 있는 onamae의 값을 출력한다
    print "<BR><BR>";
    print "본문 :<BR>";
    print nl2br($_SESSION["honbun"]);
    //세션변수 honbun키의 값을 출력해준다
    //이번출력은 confirm과는 다르다
    //컴펌때는 포스트변수가 가지고 출력하는데
    //여기서는 모든것을 세션변수로 다 처리한다
    ?>
    <BR>
    <BR>
    <a href="form.html">한번 더 시험해 보려면 여기를 클릭</a>
    <!--한번 더 작업하려면 form.html로 이동하라는 차원에서 하이퍼링크삽입됨-->

    <HR>
    <PRE>
<?php print_r($_SESSION); ?>
<!--세션변수에 변수내용을 출력해줌-->
</PRE>
    <HR>

    <?php
  }elseif(isset($_POST["back"])){
    //위에는 컴펌을 눌렀을때고 지금은 back을 눌렀을때의 상황
    // 되돌아가기 버튼을 누른 경우
    //되돌아가기는 일종의 수정작업페이지를 필요로 한다
    ?>
<!-- 수정화면은 기존에 입력했던 내용을
가지고 있죠. 기존내용에 텍스트를 추가하거나 
내용을 변경하거나 함 -->
    <FONT size="4">텍스트 발송 테스트</FONT>
    <FORM name="form1" method="post" action="confirm.php">
      <!--내용을 수정하고 그내용을 다시 confirm.php로 보내는 상황-->
      이름:<BR>
      <INPUT type="text" name="onamae" value="<?=$_SESSION["onamae"]?>">
      <!--<?=$_SESSION["onamae"]?>
    onamae의 내용에 나타나는 것은 세션변수에 onamae와 연결된 값을 표시한다    
    -->
      <BR>
      본문 :<BR>
        <TEXTAREA name="honbun" cols="30"
                  rows="5"><?=$_SESSION["honbun"]?></TEXTAREA>
                  <!-- 
본문도 세션변수 honbun하고 연결된 값을 가져왔다
                  -->
      <BR>
      <INPUT type="submit" value="발송">
      <!--내용수정할것 다하면 submit버튼눌러서 confirm.php로 보내줌-->
    </FORM>

    <?php
  }else{
    //상기 이외의 경우
    ?>
<!-- confirm도 back버튼도 아닌 형태로 
현재파일에 접속하려면 else뒤의 문장을 실행해라 -->
    오류입니다.<BR>
    <a href="form.html">form.html</a>로 돌아갑니다.
    <!-- form.html로 돌아가서 입력작업부터 다시하도록 연결해주는 
    예외처리작업이다. 오류에 대한 뒷처리작업-->

    <?php
  }
?>

</BODY>
</HTML>