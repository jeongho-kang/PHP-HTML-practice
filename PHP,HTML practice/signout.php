<?php
session_start();
include "dbconn.php";
$uid = $_SESSION['uid'];
$sql = "delete from member where uid = '$uid'";
if($result = $conn->query($sql)) {
    session_unset();
    session_destroy();
    header("location: index.php");
}
else {
    echo $conn->error . ":" . $sql;
}

?>