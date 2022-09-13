<?php
session_start();

session_unset();    // 세션데이터 전체 삭제
session_destroy();  // 세션 정보 삭제

# 자동으로 페이지 이동하는 방법 3가지
header("location: index.php");     
 // 페이지 이동 : index.php로 이동하라는 뜻 header가 동작하려면 echo(출력)가 없어야함.
// header를 제일 많이 씀
# 자바스크립트를 이용한 2가지
echo "<script>location.href='index.php';</script>";
echo "<script>location.replace('index.php');</script>";

?>