<?php
//session_start();
include_once "dbconn.php";

# 입력양식에 입력된 데이터 가져오기
if(!empty($_POST['title'])) $title = $_POST['title'];
else die("title 입력필드에 값이 없습니다.");
if(!empty($_POST['author'])) $name = $_POST['author'];
else die("author 입력필드에 값이 없습니다.");
if(!empty($_POST['content'])) $email = $_POST['content'];
else die("content 입력필드에 값이 없습니다.");
if(!empty($_POST['no'])) $no = $_POST['no'];
else die("no 입력필드에 값이 없습니다.");

$sql = "update board set title = '$title', author = '$author', content = '$content' where no = '$no'";
if($result = $conn->query($sql)) {
    header("location: listcontact.php?page=1");
}
else {
    echo $conn->error . ":" . $sql;
}
?>