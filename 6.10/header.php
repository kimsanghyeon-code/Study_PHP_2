<?php 
    $downloadfile = "data.csv";
    header("Content-Disposition: attachment; filename=$downloadfile");
    header("Content-type: applicaion/octet-stream; name=$downloadfile");
    $result = file_get_contents("test.data");
    print $result;
?>

<?php
  /*// 이 코드를 동작시키기 위해서는 test.data가 필요합니다.
  $downloadfile = "data.csv";
  //다운로드파일변수에 data.csv파일명을 넣음
  header("Content-Disposition: attachment; filename=$downloadfile");
  //헤더함수가 담겨있는 컨텐츠는 첨부파일임, 다운받는 파일은 다운로드파일변수에 담긴 이름이다.
  header("Content-type: application/octet-stream; name=$downloadfile");
  //헤더함수는 컨텐츠타입은 전달방식이 옥텟스트림임.그리고 파일명은 다운로드파일변수에 담긴 이름이다. 
  $result = file_get_contents("test.data");
  //파일의 내용은 test.data에서 받아옴 이것이 result변수에 담김
  print $result;*/
?>