<?php
# MySQL 데이터베이스 접속 정보 설정
$server = "localhost";  /* MySQL 서버가 동작중인 컴퓨터이름 또는 ip 주소값 */
$account = "root"; /* MySQL 계정 : root라는 계정으로 만들었으니까 */
$password = "";
$dbname = "shake";

# MySQL 서버에 접속하기
$conn = new mysqli($server,$account,$password,$dbname); /*
(객체 생성된게 conn에 들어감) object라서 새로 만들기 위해 new를 써줘야함 */
if($conn->connect_error)    {
    die("접속오류 : " . $conn->connect_error);
}
?>