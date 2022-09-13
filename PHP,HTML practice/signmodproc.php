<?php
session_start();
include "dbconn.php";

# 입력양식에 입력된 데이터 가져오기
if(!empty($_POST['uid'])) $uid = $_POST['uid'];
else die("User id 입력필드에 값이 없습니다.");
if(!empty($_POST['uname'])) $uname = $_POST['uname'];
else die("User name 입력필드에 값이 없습니다.");
if(!empty($_POST['pwd'])) $pwd = $_POST['pwd'];
else die("Password 입력필드에 값이 없습니다.");
if(!empty($_POST['telno'])) $telno = $_POST['telno'];
else die("Tel number 입력필드에 값이 없습니다.");
if(!empty($_POST['addr'])) $addr = $_POST['addr'];
else die("address 입력필드에 값이 없습니다.");

$sql = "update member set uname = '$uname', pwd = '$pwd', telno = '$telno', addr = '$addr' where uid = '$uid'";
if($result = $conn->query($sql)) {
    $_SESSTION['uname'] = $uname;
    header("location: index.php");
}
else {
    echo $conn->error . ":" . $sql;
}
?>