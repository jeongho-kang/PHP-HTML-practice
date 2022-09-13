<?php
session_start();
if(!isset($_SESSION['uid'])) { // 로그인하지 않았다면
    echo "<script>alert('로그인을 먼저 하시기 바랍니다.')</script>";
    echo "<script>location.href='index.php'</script>";
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        * {box-sizing: border-box}
        body {font-family: "Lato", sans-serif; margin: 0}

        
        .tab {
            float: left;
            border: 1px solid #ccc;
            background-color: #f1f1f1;
            width: 20%;
            height: 100vh;
        }

       
        .tab button {
            display: block;
            background-color: inherit;
            color: black;
            padding: 22px 16px;
            width: 100%;
            border: none;
            outline: none;
            text-align: left;
            cursor: pointer;
            transition: 0.3s;
            font-size: 17px;
        }

        
        .tab button:hover {
            background-color: #ddd;
        }

       
        .tab button.active {
            background-color: #ccc;
        }

      
        .tabcontent {
            float: left;
            padding: 0px 12px;
            width: 80%;
            border-left: none;
            height: 100vh;
        }
        
        
        .rsvform {
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
        .listform {
            width: 800px;
            margin-left: auto;
            margin-right: auto;            
        }
        input[type=text], input[type=datetime-local],  input[type=number], select, textarea {
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

        input[type=submit] {
            background-color: #449ADF;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            float: right;
        }

        input[type=submit]:hover {
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

        
        .row:after {
            content: "";
            display: table;
            clear: both;
        }

    body{
        text-align : center;
    }
    table {
        border-collapse : collapse;
        width: 100%;
    }
    td , th{
        border: 1px solid #ddd;
        padding: 8px;
    }
    tr:nth-child(even){
        background-color: #f2f2f2;
    }
    tr:hover {
        cursor : "pointer";
        background-color: #ddd;
    }
    th{
        padding-top: 12px;
        padding-bottom: 12px;
        text-align: center;
        background-color: #449ADF;
        color: white;
    }
    </style>
</head>
<body>
    <div class="tab">
      <button class="tablinks" onclick="openTab(event, 'newrsv')" id="defaultOpen">예약하기</button>
      <button class="tablinks" onclick="openTab(event, 'confirm')">예약확인</button>
      <button class="tablinks" onclick="location.href='newcontact.html'">문의하기</button>
      <button class="tablinks" onclick="openTab(event, 'questions')">문의확인</button>
    </div>

    <div id="newrsv" class="tabcontent">
        <div class="rsvform">
        <h2>예약신청</h2>
        <p>쉑쉑버거에 예약신청 남깁니다.</p>
        <div class="divider"></div>
        <div class="container">
          <form action="newrsv.php" method="post">
            <div class="row">
              <div class="col-25">
                <label for="name">예약자</label>
              </div>
              <div class="col-75">
                <input type="text" name="name" placeholder="User name..">
              </div>
            </div>
            <div class="row">
              <div class="col-25">
                <label for="rdate">예약일</label>
              </div>
              <div class="col-75">
                <input type="datetime-local" name="rdate" placeholder="Date..">
              </div>
            </div>
            <div class="row">
              <div class="col-25">
                <label for="persons">인원</label>
              </div>
              <div class="col-75">
                <input type="number" name="persons" placeholder="How many..">
              </div>
            </div>
            <div class="row">
              <div class="col-25">
                <label for="telno">전화번호</label>
              </div>
              <div class="col-75">
                <input type="text" name="telno" placeholder="Mobile..">
              </div>
            </div>
            <div class="row">
              <div class="col-25">
                <label for="msg">문의사항</label>
              </div>
              <div class="col-75">
                <textarea name="msg" placeholder="Message.."></textarea>
              </div>
            </div>
            <div class="row">
              <input type="submit" value="Submit">
            </div>
          </form>
        </div>
        </div>
    </div>

    <div id="confirm" class="tabcontent">
        <div class="listform">
            <h2>예약확인</h2>
            <p>예약 내용을 확인합니다.</p>
            <?php
                include "viewrsv.php";
            ?>
        </div>
    </div>

    <div id="questions" class="tabcontent">
      <iframe src="listcontact.php?page=1"
      style="width:100%; height:100%; border:none;"></iframe>
 
    </div>

<script>
function openTab(evt, tabName) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(tabName).style.display = "block";
    evt.currentTarget.className += " active";
}

// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen").click();
</script>
     
</body>
</html> 