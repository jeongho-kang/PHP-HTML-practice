<!doctype html>
<html>
    <head>
        <title>Contact Us</title>
        <meta charset="utf-8">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <style>
            * {
                box-sizing: border-box;
            }
            body {
                text-align: center;
            }
            #contact {
                font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
                border-collapse: collapse;
                width: 100%;
            }

            #contact td, #contact th {
                border: 1px solid #ddd;
                padding: 8px;
            }

            #contact tr:nth-child(even){background-color: #f2f2f2;}

            #contact tr:hover {background-color: #ddd;}

            #contact th {
                padding-top: 12px;
                padding-bottom: 12px;
                text-align: center;
                background-color: #449ADF;
                color: white;
            }    
            /* Style Page */
            .paging_area { 
                width: 100%;
                height: 50px;
                padding-top: 7px;
                margin-left: auto;
            }
            .paging_area a, .paging_area span {
                
                color: black;
                display: inline-block;
                padding: 8px 16px;
                text-decoration: none;
                transition: background-color .3s;
                /*display: inline-block;
                border-radius: 3px;
                border: solid 1px #c0c0c0;
                background: #e9e9e9;
                box-shadow: inset 0px 1px 0px rgba(255,255,255, .8), 0px 1px 3px rgba(0,0,0, .1);
                padding: 3px 9px;
                font-weight: bold;
                text-decoration: none;
                color: #717171;
                text-shadow: 0px 1px 0px rgba(255,255,255, 1);*/
            }

            .paging_area a.active {
                background-color: dodgerblue;
                color: white;
            }

            .paging_area a:hover:not(.active) {background-color: #fefefe;}

            /* Search */
            .topnav .search-container {
              float: right;
            }

            .topnav input[type=text] {
              padding: 6px;
              margin-top: 8px;
              font-size: 17px;
              border: 3px solid #ddd;
                margin-right: 6px; 
                margin-bottom: 10px;
            }

            .topnav .search-container button {
              float: right;
              padding: 6px 10px;
              margin-top: 8px;
              margin-right: 16px;
              background: #ddd;
              font-size: 17px;
              border: none;
              cursor: pointer;
            }

            .topnav .search-container button:hover {
              background: #ccc;
            }

        button {
        background-color: #449ADF;
        color: white;
        padding: 12px 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        float: right;
        margin: 5px;
        }
 
        button:hover {
        background-color: #4682B4;
        }
        </style>
    </head>
    <body>
        <h1>메세지</h1>
        <hr>
        <div class="topnav">
            <div class="search-container">
                <form action="<?php echo $_SERVER['PHP_SELF']?>" method="get"> 
                    <input type="text" name="page" value="1" hidden>
                    <input type="text" name="search" placeholder="Search..">
                    <button type="submit">
                        <i class="fa fa-search"></i>   
                    </button>
                </form>    
            </div>
        </div>
        <?php
        include_once "dbconn.php";

        // Search
        if(isset($_GET['search']) && strpos($_GET['search'], "%") === false) // 주소줄에 search가 있고 그 안에 %가 없을때는 %를 앞뒤에 붙이기
            $search = "%" . $_GET['search'] . "%";
        else if(!isset($_GET['search'])) // 주소줄에 search가 없을때
            $search = "%";
        else $search = $_GET['search']; // search가 있고 그 안에 %가 있을때

        $listsize = 6; // 한 페이지에 보일 레코드 수
        $pages = 3; // 좌우에 몇개의 추가 페이지를 보일 것인가?
        // 현재 페이지 가져오기
        $page = $_GET['page'] ? intval($_GET['page']) : 1;
        $result = $conn->query("select count(*) from board where title like '$search'");
        $row = $result->fetch_row(); // 한 건 가져오기
        $rowcount = $row[0]; // 전체 레코드 개수
        $pagecount = (int)($rowcount / $listsize);
        if($rowcount % $listsize > 0) $pagecount++; // 페이지 개수

        // 현재 페이지 기준으로 왼쪽에 나올 시작 페이지
        // 현재 페이지 기준으로 오른쪽에 나올 끝 페이지
        $startpage = max($page - $pages, 1);
        $endpage = min($page + $pages, $pagecount);
        // 시작부터 건너갈 레코드 개수
        $offset = ($page - 1) * $listsize;
        $sql = "select * from board where title like '$search' order by no desc limit $offset, $listsize";
        $result = $conn->query($sql);
        if($result->num_rows > 0) {
        ?>
        <table id="contact">
            <tr>
                <th style="width:7%">번호</th>
                <th>제목</th>
                <th style="width:10%">작성자</th>
                <th style="width:15%">작성일</th>
            </tr>
        <?php
           while($row = $result->fetch_assoc()) {
        ?>
           <tr>
               <td><?=$row['no']?></td>
               <td><a href="modcontact_check.php?no=<?=$row['no']?>">
                                              <?=$row['title']?></a></td>
               <td><?=$row['author']?></td>
               <td><?=$row['wdate']?></td>
            <tr>
        <?php } ?>
        </table>
        
        <!-- Paging -->
        <div class="paging_area">
        <?php
            // 이전 버튼
            if($page > 1) {
                $prev = $page - 1;
                echo "<a href='listcontact.php?page=$prev&search=$search'>PREV</a>";
            }
            else
            echo "<span>PREV</span>";

            // 페이지 번호 출력
            for($p=$startpage; $p<=$endpage; $p++) {
                if($page == $p)
                    echo "<a class='active' href='#'>$p</a>";
                else
                    echo "<a href='listcontact.php?page=$p&search=$search'>$p</a>";
            }
            // 다음 버튼
            if($page < $endpage) {
                $prev = $page + 1;
                echo "<a href='listcontact.php?page=$prev&search=$search'>NEXT</a>";

            }
            else
            echo "<span>NEXT</span>";
        ?>
        <hr>
        <button type="button" onclick="location.href='newcontact.html'">글쓰기</button>

        </div>
        <?php } else {
               echo "검색된 레코드가 없습니다.<br>";
               echo $conn->error . ":" . $sql;
           }
           $conn->close();
           ?>
    </body>
</html>
