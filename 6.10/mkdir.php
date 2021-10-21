<?php
    $dirname = "temp";
    if(!is_dir($dirname) && mkdir($dirname)){
        print $dirname."를 만들었습니다.";
    }else{
        print $dirname."는 만들 수 없습니다.";
    }
?>


<?php
//   $dirname = "temp";//만들려고 하는 디렉토리의 이름을 넣어요
//     if(!is_dir($dirname) && mkdir($dirname)){
//       //이즈디렉토리함수는 정보함수임. 
//       //디렉토리가 없다면 is_dir함수는 false인데
//       //앞에 !부정이 붙어서
//       //true가 됨
//       //dirname변수에 있는 값의 이름으로 
//       //디렉토리만드는 mkdir함수가 작동이되면
//       //true가 되는거예요
//       //&& 는 왼쪽부터 작동을 해요
//       //디렉토리 없는 확인하고 그리고 디렉토리를
//       //만드는 명령을 실행시켜서 둘다 완수가 되면
//       //중괄호안에 있는 명령을 실행한다
//     print $dirname."를 만들었습니다.";
//     //dirname변수를 만들었습니다라는 텍스트를 띄운다
//   }else{
//     print $dirname."는 만들 수 없습니다.";
//     //디렉토리가 있거나 디렉토리를 만들지못했거나
//     //둘중하나라도 안되면 else문을 실행하는거예요
//   }
?>