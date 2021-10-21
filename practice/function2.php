<?php 
    function happy(){
        print("i'm happy to see you<br>");
        print("and you?<br>");
    }
    happy();
?>

<h1>parameter &amp; argument</h2>
<?php 
function sum($left, $right){
    print($left+$right);
    print("<br>");
}
sum(2,4);
sum(4,6);
sum(10,10);
sum(-3,8);
?>

<h2>return</h2>
<?php 
function sum2($left, $right){
    return $left+$right;
}

print(sum2(2,4));
file_put_contents('result.txt',sum2(2,4));


?>
