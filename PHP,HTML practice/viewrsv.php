<?php

# DB 연결
include "dbconn.php";

# 날짜와 아이디 읽어오기
$rdate = date("Y/m/d"); // 오늘날짜 가져오기
$uid = $_SESSION['uid'];
# SQL문 작성 : select
$sql = "select * from reservation
where rdate >= '$rdate' and uid = '$uid'"; // 오늘이랑 오늘이후
# SQL문 실행
$result = $conn->query($sql);
# 레코드 출력하기, 표 형식
if($result -> num_rows > 0){ // select한게 있으면
    ?>
    <table>
       <tr>
           <th>예약자</th> <th>전화번호</th> <th>예약일</th> <th>인원</th> <th>요청사항</th>
       <tr>
    <?php
        while($row = $result -> fetch_assoc()){ 
    ?>
        <tr>
            <td><?=$row['name']?> </td> 
            <td><?=$row['telno']?> </td> 
            <td><?=$row['rdate']?> </td>
            <td><?=$row['person']?> </td>
            <td><?=$row['msg']?> </td>
        </tr>
    <?php
    }
    ?>
    </table>
    <?php
}
else{
   echo "<p> 검색된 레코드가 없습니다. </p>";
}
?>