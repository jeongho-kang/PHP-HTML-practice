<?php
# 세션 시작하기
session_start();

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
else die("Addr 입력필드에 값이 없습니다.");

include "dbconn.php";   // 파일 내용을 삽입할 것 include는 다른 파일에 있는 내용을 가져오기 위해 씀

# INSERT 명령문 작성하기
$sql = "insert into member values('$uid', '$uname', '$pwd', '$telno' , '$addr', 0)";     /* 포인트는 null값도 가능하기 때문에 ,뒤에 아무것도 쓰지 않아도 됨 */

# SQL문 실행하기
if($conn->query($sql) === TRUE) {  /*  => $conn(mysql 접속정보) */
    # 세션 데이터 생성하기
    $_SESSION['uid'] = $uid;    // 세션이라는 곳에 저장할 수 있게 해주는 것 : $_SESSION []안에 들어가는것이 이름표
    $_SESSION['uname'] = $uname;
    echo "회원가입이 성공하였습니다. : $uid - $uname";
    echo "<a href='index.php'>쉑쉑버거</a>로 이동";
}                                                                               
else {
    echo "Error : " . $conn->error . "<br>";    /* 에러 message */
    echo $sql;
}

# MySQL 접속 종료
$conn->close();
?>