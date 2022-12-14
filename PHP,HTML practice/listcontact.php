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
        <h1>?????????</h1>
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
        if(isset($_GET['search']) && strpos($_GET['search'], "%") === false) // ???????????? search??? ?????? ??? ?????? %??? ???????????? %??? ????????? ?????????
            $search = "%" . $_GET['search'] . "%";
        else if(!isset($_GET['search'])) // ???????????? search??? ?????????
            $search = "%";
        else $search = $_GET['search']; // search??? ?????? ??? ?????? %??? ?????????

        $listsize = 6; // ??? ???????????? ?????? ????????? ???
        $pages = 3; // ????????? ????????? ?????? ???????????? ?????? ??????????
        // ?????? ????????? ????????????
        $page = $_GET['page'] ? intval($_GET['page']) : 1;
        $result = $conn->query("select count(*) from board where title like '$search'");
        $row = $result->fetch_row(); // ??? ??? ????????????
        $rowcount = $row[0]; // ?????? ????????? ??????
        $pagecount = (int)($rowcount / $listsize);
        if($rowcount % $listsize > 0) $pagecount++; // ????????? ??????

        // ?????? ????????? ???????????? ????????? ?????? ?????? ?????????
        // ?????? ????????? ???????????? ???????????? ?????? ??? ?????????
        $startpage = max($page - $pages, 1);
        $endpage = min($page + $pages, $pagecount);
        // ???????????? ????????? ????????? ??????
        $offset = ($page - 1) * $listsize;
        $sql = "select * from board where title like '$search' order by no desc limit $offset, $listsize";
        $result = $conn->query($sql);
        if($result->num_rows > 0) {
        ?>
        <table id="contact">
            <tr>
                <th style="width:7%">??????</th>
                <th>??????</th>
                <th style="width:10%">?????????</th>
                <th style="width:15%">?????????</th>
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
            // ?????? ??????
            if($page > 1) {
                $prev = $page - 1;
                echo "<a href='listcontact.php?page=$prev&search=$search'>PREV</a>";
            }
            else
            echo "<span>PREV</span>";

            // ????????? ?????? ??????
            for($p=$startpage; $p<=$endpage; $p++) {
                if($page == $p)
                    echo "<a class='active' href='#'>$p</a>";
                else
                    echo "<a href='listcontact.php?page=$p&search=$search'>$p</a>";
            }
            // ?????? ??????
            if($page < $endpage) {
                $prev = $page + 1;
                echo "<a href='listcontact.php?page=$prev&search=$search'>NEXT</a>";

            }
            else
            echo "<span>NEXT</span>";
        ?>
        <hr>
        <button type="button" onclick="location.href='newcontact.html'">?????????</button>

        </div>
        <?php } else {
               echo "????????? ???????????? ????????????.<br>";
               echo $conn->error . ":" . $sql;
           }
           $conn->close();
           ?>
    </body>
</html>
