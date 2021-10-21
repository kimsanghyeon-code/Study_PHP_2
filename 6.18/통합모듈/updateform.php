<?php 
session_start();
?>
<html>
    <head>
        <title>php 테스트</title>
    </head>
    <body>
        <hr size="1" noshade>
        수정화면
        <hr size="1" noshade>
        [ <a href="list.php">되돌아가기</a>]
        <br>
        <?php 
        require_once("MYDB.php");
        $pdo = db_connect();
        if(isset($_GET['id']) && $_GET['id'] > 0){
            $id = $_GET['id'];
            $_SESSION['id'];
            $_SESSION['id'] = $id;
        }else{
            exit('잘못된 파라미터입니다.');
        }
        try{
            $sql = "SELECT * FROM member WHERE id = :id ";
            $stmh = $pdo->prepare($sql);
            $stmh->bindValue(':id',$id,PDO::PARAM_INT);
            $stmh->execute();
            $count = $stmh->rowCount();
        }catch(PDOException $Exception){
            print "오류:".$Exception->getMessage();
        }
        if($count <1){
            print "수정 데이터가 없습니다. <br>";
        }else{
            $row = $stmh->fetch(PDO::FETCH_ASSOC);
            ?>
            <FORM name="form1" method="post" action="list.php">
                번호 : <?=htmlspecailchars($row['id'])?><br>
                성 : <input type="text" name="last_name"
                value="<?=htmlspecialchars($row['first_name'])?>"><br>
                연령 : <input type="text" name="age"
                value="<?=htmlspecailchars($row['age'])?>"><br>
                <input type="hidden" name="action" value="update">
                <input type="submit" value="수정">
        </form>
        <?php
        }
        ?>
        </body>
        </html>