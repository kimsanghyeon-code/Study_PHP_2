<HTML>
<HEAD>
  <TITLE>PHP 테스트</TITLE>
</HEAD>
<BODY>
<?php
  $db_user = "sample";    // 사용자명
  $db_pass = "password";    // 패스워드
  $db_host = "localhost";    // 호스트명
  $db_name = "sampledb2";    // 데이터베이스명
  $db_type = "mysql";    // 데이터베이스 종류
  $dsn = "$db_type:host=$db_host;dbname=$db_name;charset=utf8";
  //디비접속정보
  try{
    $pdo = new PDO($dsn,$db_user,$db_pass);
    //pdo클래스로 연결객체가 되어진다
    //$pdo로 객체변수가 된다
    $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
    print "접속하였습니다.<br>";
  }catch(PDOException $Exception){
    //연결작업에서 오류가 생기면 일어나게 예외처리 작업인데
    //보통은 오류메시지를 띄워주는것
    die('오류:'.$Exception->getMessage());
  }
  // POST 데이터를 받습니다.
  $search_key = 
  '%'.$_POST['search_key'].'%';
  //%가 있는 데 이것은 와일드카드이다
  // 마치 * 별표처럼 %는 글자갯수와 글자종류상관없이
  //검색하고 싶을때 모든 everything을 의미함
  // 포스트변수로 전달된 search_key키와 연결된 데이터
  //search.html에서 입력한 데이터를 가운데 두고
  //양쪽에 어떤 글자가 오던지 간에 
  //서치키에 입력했던 글자가 있다면
  // 검색하라는 의미임
  //이러한 내용을 이퀄으로 왼쪽에 $search_key변수에 저장을 함
  try{
    $sql = "SELECT * FROM member 
    WHERE last_name  
    like :last_name OR first_name  
    LIKE :first_name ";
    //sql변수에 우측에 있는 select문이 입력된다
    //select * 검색하라 모든것을
    //from member 멤버테이블에 있는 것들중에서
    //where 조건의 시작
    // like는 이와 비슷한 것 기호나타내면 == 과 같음
    // 아무것도 왼쪽에 없이 그냥 컬럼명(열이름)만
    //써있다면 이것은 데이터베이스의 열이름을 의미한다
    //그래서 조건식은 왼쪽에 데이터베이스열이름이 배치되고
    //우측에는 입력값조건이 나타난다
    //last_name데이터베이스열이름과  바인딩변수 :last_name가
    //같거나 or 
    //first_name데이터베이열이름과 바인딩변수 :first_name이 같다면
    //해당된 애들은 모두 검색하라
//이 검색sql문이 $sql에 저장이 되었음

    $stmh = $pdo->prepare($sql);
//$pdo객체변수에 프리페어메서드안에 방금 만든 $sql변수를 입력해요
//그결과를 stmh변수에 저장을 함
//변수 stmh에는 sql을 실행할수있게 해주는 준비를 마친 문장들이 저장되어있어요
//이제 이위에 값만 연결해주면 되요
//그래서 아래에 bindvalue메서드가 작동하는거에요
$stmh->bindValue(':last_name',
//bindvalue메서드로 프리페어문장에 값을 연결하는데
//첫번째인수에는 프리페어문장에서 연결될 바인딩변수이름을 넣고
$search_key,PDO::PARAM_STR);
//두번째인수로는 외부에서 들어온 데이터 를 가지고 있는 변수가 위치하고
//세번째인수는 바로 현재 연결되는 데이터유형을 의미함
//param_str 현재들어오는 데이터는(파라메터의 줄임말 param)
//string 문자열 인데, 지금들어오는 데이터는 문자열이다
//그냥 넣어도 되지만 이런 옵션으로 해서 정확하게 처리를 할수있게된다


 $stmh->bindValue(':first_name',$search_key,PDO::PARAM_STR);
//상동, 위와 같음
 $stmh->execute();
 //값도 들어오고 문장도 준비됐으니 익스큐트메서드를 작동시킨다
 //익스큐트메서드를 작동하면 결과가 실행된다

    $count = $stmh->rowCount();
    //stmh에서 rowCount메서드를 작동시켜요
    //stmh에 들어있는 결과값의 행들의 갯수를 세어준다
    //그리고 그결과를 count변수에 저장한다
    print "검색결과는".$count."건입니다.<BR>";
    //print문으로 출력하고 카운트변수의 값도 출력한다
  }catch(PDOException $Exception){
    print "오류:".$Exception->getMessage();
    //검색작업을 실패했을때
  }
  if($count < 1){
    //만약에 카운트변수의 값이 1보다 작다면
    //검색할게 없었다는 메시지를 출력함
    //만약 출력할게 없는 것이 아니라
    //1보다 커서 출력할게 있다면 
    //아래에 있는 else를 실행한다
    //else문에는 검색된 결과행들을 화면에 
    //출력해주는 코드들이 작동된다
    print "검색결과가 없습니다.<BR>";
  }else{
    ?>
    <TABLE width="450" border="1" cellspacing="0" cellpadding="8">
      <TBODY>
      <TR>
        <TH>번호</TH>
        <TH>성</TH>
        <TH>이름</TH>
        <TH>연령</TH>
      </TR>
      <!--표의 첫번째행타이틀이 출력되고-->
      <?php
while($row = $stmh->fetch(PDO::FETCH_ASSOC)){
  //반복문이 작동된다
//row배열에 저장을 하는데
//검색결과 가 들어있는 stmh변수에서 
//fetch문을 활용해서 한줄씩한줄씩 검색결과로 나온 데이터행을
//뽑아낸다
//fetch문은 더이상 뽑아낼 데이턱 없다면 false를 돌려준다
//그래서 while문이 종료하게 된다

          ?>
          <TR>
<TD align="center">
  <?=htmlspecialchars($row['id'])?></TD>
  <!--연관배열row에서 id키하고 연결된 값을
  불러와서 표시하는거예요-->
 <!-- < ? =  php에서 데이터를 표시하는 애다   -->
 <!-- htmlspecialchars함수를 결과값에 감싸면
 데이터가 html로서 동작하지못하게 한다-->
 <!-- 그냥 화면출력용으로만 사용함 -->
            <TD><?=htmlspecialchars($row['last_name'])?></TD>
            <TD><?=htmlspecialchars($row['first_name'])?></TD>
            <TD align="center"><?=htmlspecialchars($row['age'])?></TD>
          </TR>
          <?php
        }
//php관련 구분이 html에 끼어있으면 작동이 안되요
//지금같은 html구문에 내용을 반복하고 싶으면
//php로서 while을 설정하고 
// html로 표시해야하는 부분만 html로 하고
//나머지 php의 룰을 따른다
//tr은 테이블의 하나의 행이 나타나도록 함
//그래서 tr이 끝나는 지금에서 
//반복할 영역이 끝나는 지역에서 
//while문의 반복영역인 중괄호를 종료시킴
//그리고 다시 문서를 마무리하기위해서
//html닫는 태그들을 배치한거예요
      ?>

      </TBODY>
    </TABLE>
    <?php
  }
?>
</BODY>
</HTML>