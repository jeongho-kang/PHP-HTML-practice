<?php
session_start();
include_once "dbconn.php";

#데이터 읽어오기
$wdate = date("Y/m/d");
$uid = $_SESSION['uid'];
$author = $_POST['author'];
$password = $_POST['password'];
$content = $_POST['content'];
$title = $_POST['title'];

#SQL문 작성하기
$sql = "insert into board(wdate,author,password,content,title)
        values('$wdate', '$author', '$password', '$content', '$title')";

#SQL문 실행하기
if($result = $conn->query($sql)) {
    echo "<script>location.href='listcontact.php?page=1'</script>"; // 함수호출
}
else
    echo $conn->error. ":" . $sql;
?>