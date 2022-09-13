<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
    <title>Contact Us</title>
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
    .divider {
      margin: 0.5em 0 0.5em 0;
      border: 0;
      height: 1px;
      width: 100%;
      display: block;
      background-color: #4f6fad;
      background-image: linear-gradient(to right, #ee9cb4, #4f6fad);
    }        
    input[type=text], input[type=email], select, textarea {
        width: 100%;
        padding: 12px;
        border: 1px solid #ccc;
        border-radius: 4px;
        resize: vertical;
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
        margin: 0 10px;
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
        <h2>메세지 확인</h2>
        <p>메세지 내용을 확인하고 수정합니다.</p>
        <?php
        include_once "dbconn.php";

        $no = $_POST['no'];
        $password = $_POST['password'];
        $sql = "select * from board where no = $no";
        $result = $conn->query($sql);
        if($result->num_rows > 0) {
            $row = $result->fetch_row();
            if($password != $row[4])
              die("게시글의 비밀번호가 맞지 않습니다.");
        }
        else echo $conn->error . ":" . $sql;
        ?>
        <div class="divider"></div>
        <div class="container">
          <form action="modcontact_proc.php" method="post">
            <div class="row">
              <div class="col-25">
                <label for="title">제목</label>
              </div>
              <div class="col-75">
                <input type="number" name="no" value="<?=$row[0]?>" hidden>
                <input type="text" name="title" value="<?=$row[1]?>">
              </div>
            </div>
            <div class="row">
              <div class="col-25">
                <label for="author">이름</label>
              </div>
              <div class="col-75">
                <input type="text" name="author" value="<?=$row[3]?>">
              </div>
            </div>
            <div class="row">
              <div class="col-25">
                <label for="content">메세지</label>
              </div>
              <textarea name="content" cols="80" rows="10"><?=$row[2]?></textarea>
            <div class="row">
            <button type="button" onclick="location.href='delcontact.php?no=<?=$row[0]?>'">삭제하기</button>
              <input type="submit" value="수정하기">
            </div>
          </form>
        </div>
    </body>
</html>
