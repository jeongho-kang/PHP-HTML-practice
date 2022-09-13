<?php
session_start();
?>
<!doctype html>
<html>
<head>
    <title>쉑쉑버거</title>
    <meta charset="utf-8">
    <link type="text/css" rel="stylesheet" href="msgbox.css">
</head>
<script>
    function go_cart(cart) {
        var go = confirm('예약확인 하시겠습니까?');
        if(go) location.href=cart;    // yes를 눌렀을때(true)
        else location.href="index.php";
    }
</script>
<body>
<?php
include "dbconn.php";
include "msgbox.php";
#데이터 읽어오기
$rdate = $_POST['rdate'];  
$uid = $_SESSION['uid'];
$name = $_POST['name'];
$telno = $_POST['telno'];
$msg = $_POST['msg'];
$persons = $_POST['persons'];

#SQL문 작성하기
$sql = "insert into reservation(name,rdate,telno,person,msg,noshow,uid)
        values('$name', '$rdate', '$telno', $persons, '$msg', '', '$uid')";

#SQL문 실행하기
if($result = $conn->query($sql)) {
    echo "<script>go_cart('contact.php?')</script>";
}
else
    echo $conn->error. ":" . $sql;
?>
</body>
</html>