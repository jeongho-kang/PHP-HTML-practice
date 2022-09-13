<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
    <title>회원정보수정</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>

    * {
        box-sizing: border-box;
    }
    body {
        width: 600px;
        margin-left: auto;
        margin-right: auto;
    }
    input[type=text], select, textarea {
        width: 100%;
        padding: 12px;
        border: 1px solid #ccc;
        border-radius: 4px;
        resize: vertical;
    }
    input[type=text]:read-only {
        background: #ccc;
    }
    label {
        padding: 12px 12px 12px 0;
        display: inline-block;
    }
    input[type=submit], button {
        background-color: #449ADF;
        color: white;
        padding: 12px 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        float: right;
        margin: 5px;
    }
    input[type=submit]:hover, button:hover {
        background-color: #4682B4;
    }
    .container {
        border-radius: 5px;
        background-color: #f2f2f2;
        padding: 20px;
    }
    .col-25 {
        float: left;
        width: 25%;
        margin-top: 6px;
    }
    .col-75 {
        float: left;
        width: 75%;
        margin-top: 6px;
    }
    /* Clear floats after the columns */
    .row:after {
        content: "";
        display: table;
        clear: both;
    }
    </style>
    </head>
    <body>
        <h2>회원정보수정</h2>
        <p>회원정보 수정바랍니다.</p>
        <hr>
<?php
include "dbconn.php";
$uid = $_SESSION['uid'];
$sql = "select * from member where uid = '$uid'";
$result = $conn->query($sql);
if($result->num_rows > 0) {
    $row = $result->fetch_row(); // 1차원배열. 값만 존재.
?>
        <div class="container">
          <form action="signmodproc.php" method="post">
            <div class="row">
              <div class="col-25">
                <label for="fname">아이디</label>
              </div>
              <div class="col-75">
                <input type="text" readonly name="uid" value="<?=$row[0]?>">
              </div>
            </div>
            <div class="row">
              <div class="col-25">
                <label for="lname">이름</label>
              </div>
              <div class="col-75">
                <input type="text" name="uname" value="<?=$row[1]?>">
              </div>
            </div>
            <div class="row">
              <div class="col-25">
                <label for="lname">비밀번호</label>
              </div>
              <div class="col-75">
                <input type="text" name="pwd" value="<?=$row[2]?>">
              </div>
            </div>
            <div class="row">
              <div class="col-25">
                <label for="lname">전화번호</label>
              </div>
              <div class="col-75">
                <input type="text" name="telno" value="<?=$row[3]?>">
              </div>
            </div>
            <div class="row">
              <div class="col-25">
                <label for="lname">주소</label>
              </div>
              <div class="col-75">
                <input type="text" name="addr" value="<?=$row[4]?>">
              </div>
            </div>
            <div class="row">
              <input type="submit" value="Submit">
              <button type="button" 
                    onclick="location.href='signout.php'">Sign Out</button>
            </div>
          </form>
        </div>
<?php } ?>
    </body>
</html>