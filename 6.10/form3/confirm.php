<HTML>
<HEAD>
  <TITLE>PHP 테스트</TITLE>
</HEAD>
<BODY>
확인화면
<FORM name="form1" method="post" action="view.php">
  <!--액션이 view.php로 연결되어있어요-->
  <?php
  //앞의 코드들과 거의 똑같음
    print "이름:";
    print $_POST["onamae"];
    print "<BR><BR>";
    print "본문 :<BR>";
    print nl2br($_POST["honbun"]);
  ?>
  <BR>
  <INPUT type="submit" value="확인">
  <INPUT type="hidden" name="onamae" value="<?=$_POST["onamae"]?>">
  <!--히든속성이 나타남 -->
  <!--$_POST["onamae"] 바로 form.html에서 부터넘어온 데이터들임
현재 속성이 히든속성이 이기때문에 숨김의 형태로 view.php까지 이동시켜준다. 데이터들
-->
<!-- 프린트만 하지 새로운 입력은 없다 -->
<!--

<?=$_POST["honbun"]?>
<?=  표시하려는 데이터변수명  ?>
데이터를 표기(사용)할때 사용함
 -->
  <INPUT type="hidden" name="honbun" value="<?=$_POST["honbun"]?>">
  <INPUT type="hidden" name="user_id" value="<?=$_POST["user_id"]?>">
  <!-- form에서 써밋버튼의 아래에 배치된 숨김정보
value가 존재하더라

 <INPUT type="hidden" name="user_id" value="0001">
-->

<!-- 숨김속성으로 현재 폼태그안에 들어있는 애들은 전부
써밋버튼누르면 숨김코드든 아닌든 전부 view.php로 보내진다는 것임
-->
</FORM>
</BODY>
</HTML>