<?php
session_start();

include "dbconn.php";
#입력 값을 가져오기
if(isset($_POST['uid'])) $uid = $_POST['uid'];
else {
    die("아이디가 입력되지 않았습니다.");
    header("location: signin.html");
}
$pwd = $_POST['pwd'];

#SQL 실행하기
$sql = "select * from member where uid = '$uid' and pwd = '$pwd'";
$result = $conn->query($sql);
#결과 확인하기
if($result->num_rows > 0) {
    $row = $result->fetch_assoc(); // $row는 연관배열 : (키,값) 배열
    #세션 생성하기
    $_SESSION['uid'] = $row['uid'];
    $_SESSION['uname'] = $row['uname'];
    echo "로그인이 성공하였습니다. <br>";
    echo "<a href = 'index.php'>쉑쉑버거</a> 이동";
}
else {
    echo "로그인이 실패하였습니다. <br>";
    echo $conn->error . ":" . $sql;
}
?>