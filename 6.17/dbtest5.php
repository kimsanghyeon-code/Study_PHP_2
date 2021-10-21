<?php
  // 1. 이름이 붙여진 placeholder
  $sql = "INSERT  INTO member (last_name, first_name, age) VALUES ( :last_name, :first_name, :age )";
  //VALUES ( :last_name, :first_name, :age )"
  //이전의 sql에서는 value에 고정된 값을 써줬죠
  //:콜론하고 칼럼명을 써줬죠
  //외부에서 들어오는 입력값이 value에 갖다 꽂힐때 위치를 의미하는 거예요
  
  $stmh = $pdo->prepare($sql);
  //sql작업을 진행하기위한 준비작업이 prepare메서드안에 sql문장이 들어있는 변수 $sql을 인수로 넣어줌으로 
  //그리고 $stmh변수에 넣어줌으로 준비작업이 끝난다
  $stmh->bindValue(':last_name',$_POST['last_name']);
  //$stmh->bindValue가 sql문장으로 작동될 코드에 값을 진짜로 붙여주는 작업을 한다
  //:last_name',$_POST['last_name']
  // 콜론라스트네임이 있는 위치에 포스트변수인 last_name에 저장된 내용을 옮겨준다
  // :last_name = $_POST['last_name']

  $stmh->bindValue(':first_name',$_POST['first_name']);
  $stmh->bindValue(':age',$_POST['age']);
  //각각의 플레이스홀더안에있는 바인딩변수에 포스트변수값을 넣어준다
  //플레이스홀더는 이렇게 값을 붙여줘서 SQL문장을 만드는 전체적인 틀의 의미하고
  // :칼럼명이나 ? 같은 애는 값이 붙는 다해서 바인딩변수라고 불러요

  $stmh->execute();
//sql문장이 준비되었고, 값도 붙었으니까 
//sql문장이 작동이 되도록 DBMS연락을 함
//문장이 작동하도록
//execute메서드를 실행시키면 
//그결과가 작동이 된다
//select , delete, update, insert 문이나 이런 데이터베이스연산을 작동시킨다
//execute메서드가 작동을 시킴

  // 2. 「?」placeholder
  $sql = "INSERT  INTO member (last_name, first_name, age) VALUES ( ?, ?, ?)";
  //VALUES ( ?, ?, ?) 
  //위와 다르게 아래에는 ?가 value의 플레이스홀더가 되어줌

  $stmh = $pdo->prepare($sql);
  $stmh->bindValue(1,$_POST['last_name']);
  //?바인딩변수는 구분하기힘드니까 
  //넘버링으로 바인딩변수를 구분했다
  //넘버링으로 바인딩변수를 구분하고 거기에 포스트변수를 연결해줬다
  $stmh->bindValue(2,$_POST['first_name']);
  $stmh->bindValue(3,$_POST['age']);
  $stmh->execute();
  // 해설을 위한 코드입니다. 동작하지 않습니다.
?>