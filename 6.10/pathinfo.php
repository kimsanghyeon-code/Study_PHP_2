<?php
    $pathname = pathinfo(__FILE__);
    print $pathname['dirname']."<br>";
    print $pathname['basename']."<br>";
    print $pathname['extension']."<br>";
?>


<?php
//   $pathname = pathinfo(__FILE__);
//   //언더바2개를 양쪽에 붙인 FILE시스템상수
//   //이코드가 있는 파일의 정보를 
//   //패스인포는 경로정보
//   //이것을 pathname변수에 저장
//   print $pathname['dirname']."<BR>";
//   //출력하죠 dirname 연관배열의 키 dirname을
//   //통해서 경로정보를 출력함
//   print $pathname['basename']."<BR>";
//   //키basename 의 값을 출력 / 파일명
//   print $pathname['extension']."<BR>";
//   //키 extension 확장자를 출력
?>