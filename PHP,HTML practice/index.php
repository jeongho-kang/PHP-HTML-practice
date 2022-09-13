<?php session_start() ?>
<!DOCTYPE html>
<html>
<title>쉑쉑버거 맛보기</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymus">
    <link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet"> 
    <link href="https://fonts.googleapis.com/css?family=Jua" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <head>
    <link rel="shortcut icon" href="images/p18.jpg">   
    </head>
 
    
<style>
 @import url('https://fonts.googleapis.com/css?family=Pacifico');
    body {
      font-family: 'Pacifico', cursive;
    }
    .container {
        padding: 80px 120px;
    }
    .dev {
    border: 10px solid transparent;
    margin-bottom: 25px;
    width: 100%;
    height: 100%;
    }
    .dev:hover {
    border-color: #f1f1f1;
    }
      
    .carousel-inner img {
        /*filter: grayscale(90%);  make all photos black and white */ 
        width: 80%; /* Set width to 100% */
        margin: auto;
    }

    .carousel-caption h3 {
        color: #fff !important;
    }

    @media (max-width: 600px) {
        .carousel-caption {
           font-family: 'Quicksand', sans-serif; display: none; /* Hide the carousel text when the screen is less than 600 pixels wide */
        }
    }
h1,h2,h3,h4,h5{
    font-family: 'Pacifico', cursive;
    letter-spacing: 5px;
    
}
    p,h6{
        font-family: 'Jua', sans-serif;
        letter-spacing: 8px;
    }
</style>
<body>

<!-- Navbar (sit on top) -->
<div class="w3-top">
  <div class="w3-bar w3-white w3-padding w3-card" style="letter-spacing:3px;">
  <a href="#home" class="w3-bar-item w3-button">Shake Shake</a>
    <!-- Right-sided navbar links. Hide them on small screens -->
    <div class="w3-right w3-hide-small">
     <a href="#about" class="w3-bar-item w3-button"><i class="fas fa-align-justify"></i>About</a>
      <a href="#menu" class="w3-bar-item w3-button"><i class="fas fa-glass-martini"></i>Food& Drink</a>
    <a href="#shop" class="w3-bar-item w3-button"><i class="fas fa-shopping-cart"></i>Shop</a>
        <a href="#sns" class="w3-bar-item w3-button"><i class="fas fa-mobile-alt"></i>SNS</a>
        <a href="contact.php" class="w3-bar-item w3-button"><i class="fas fa-check"></i>Contact</a>
        <a href="#location" class="w3-bar-item w3-button">
            <?php
                    if(isset($_SESSION['uname'])) { // isset : uname이라는 값이 있으면
                ?>
                <a href="signmodify.php"class="w3-bar-item w3-button"><i class="fas fa-map-marker"></i><?= $_SESSION['uname'] ?></a>
                <a href="logout.php"class="w3-bar-item w3-button"><i class="fas fa-map-marker"></i>Logout</a>
                <?php } else { ?>
                <a href="signin.html"class="w3-bar-item w3-button"><i class="fas fa-map-marker"></i>SignIn</a> 
                <?php } ?>
            <div class="w3-dropdown-hover">
                <button class="w3-padding-large w3-button"></button>
        <a href="#location" class="w3-bar-item w3-button">
            <i class="fas fa-map-signs"></i><i class="fa fa-caret-down"></i>Location
            <div class="w3-dropdown-content w3-bar-block">
                    <a href="signin.html" class="w3-bar-item w3-button"><i class="fas fa-map-marker"></i>Login</a>
                    <a href="#gangnam" class="w3-bar-item w3-button"><i class="fas fa-map-marker"></i>Gangnam</a>
                    <a href="#cheongdam" class="w3-bar-item w3-button"><i class="fas fa-map-marker"></i>Chenongdam</a>
                    <a href="#doota" class="w3-bar-item w3-button"><i class="fas fa-map-marker"></i>Doota</a>
                 
                
                
                </div>
                </a>
        </div>
        
        
         
    </div>
  </div>
</div>
    
    <!-- 카루셀(슬라이드쇼) -->
    <div class="carousel slide" data-ride="carousel" id="myCarousel">
    <!-- 카루셀 인디케이터 -->
        <div>
            <ol class="carousel-indicators"> <!-- 밑에 동그라미 -->
                <li data-target="#myCarousel" data-slide to="0" class="active"></li>
                <li data-target="#myCarousel" data-slide to="1"></li>
                <li data-target="#myCarousel" data-slide to="2"></li>
            </ol>
        </div>
        <!-- 카루셀 슬라이드 -->
        <div class="carousel-inner" role="listbox">
            <div class="item active"> 
                <img src="images/main3.jpg" style="width:1600px" "height:900px" >
                <div class="carousel-caption">
                </div>
            </div>
            <div class="item"> 
                <img src="images/main1.jpg" style="width:1600px" "height:900px">
                <div class="carousel-caption">
                </div>
            </div>
            <div class="item"> 
                <img src="images/main2.jpg" style="width:1600px" "height:900px">
                <div class="carousel-caption">
                </div>
            </div>
        </div>
        <!-- 카루셀 Left/Right 컨트롤 -->
        <div>
            <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>

<!-- Page content -->
<div class="w3-content" style="max-width:1100px">
    <hr>

  <!-- Food&Drink Section -->
<div class="w3-content w3-container w3-padding-64" id="Food&Drink">   
<div class="w3-container w3-padding-30 w3-center">  
    <h3>About Me, Our Story</h3><br>
    <img src="images/logo2.png" alt="logo" class="w3-image" style="display:block;margin:auto" width="200" height="200">
    <div class="w3-padding-32">
      <p>쉐이크쉑은 뉴욕 메디슨 스퀘어 공원 복구 기금 마련을 돕고자 시작한 USHG의 여름 이벤트에서 우연히 시작되었습니다. 매년 여름 많은 쉑 팬들이 핫 도그 카트 앞에 길게 줄을 설 정도로 인기를 끌면서 2004년, 쉐이크쉑 이라는 이름의 간판을 달고 공원 내에 키오스크 매장을 열었습니다.</p>
    </div>
  </div>
    
    <div class="w3-row w3-padding-25" id="about">
    <div class="w3-col m6 w3-padding-large w3-hide-small">
     <img src="images/logo.png" class="w3-round w3-image w3-opacity-min" alt="logo2" width="350" height="350">
    </div>

    <div class="w3-col m6 w3-padding-large">
      <h1 class="w3-center">Stand for Something good</h1><br>
      <p class="w3-middle w3-padding-30">쉐이크쉑은 프리미엄 식재료를 사용한 클래식 아메리칸 스타일의 메뉴를 제공하는 파인 캐주얼 레스토랑입니다.
    프리미엄 버거, 플랫탑 도그, 크링클 컷 프라이, 신선한 커스터드, 에일 맥주, 와인 등을 함께 즐길 수 있을 뿐만 아니라 쉑에 방문한 모든 분들을 내 집에 머물러 온 게스트로서 응대하며 따뜻한 호스피탈리티를 제공합니다. 
이처럼 쉐이크쉑은 늘 활기가 넘치고 긍정적인 분위기가 가득한 사람들의 커뮤니티 개더링 공간입니다.
      </p>
    </div>
  </div>
  <hr>
    
    <h1>Food& drink</h1><br>
    
  <div class="w3-row-padding w3-padding-16 w3-center" id="menu">
    <div class="w3-quarter">
      <img src="images/p4.jpg" alt="Burgers" style="width:100%">
              <h3> <strong>Burgers</strong></h3><Br>
      <p>항생제와 호르몬제를 사용하지 않은 앵거스 비프 통살을 다져 만든 패티와 쫄깃한 식감의 토종효모 포테이토 번, 토마토, 양상추에 쉑소스를 올려 만든 심플하면서도 맛있는 쉑버거와 다양한 버거 메뉴가 있습니다.
채식을 사랑한다면, 몬스터 치즈와 체다 치즈로 속을 채워 바삭하게 튀겨낸 포토벨로 버섯 패티가 들어간 슈룸 버거도 만나보세요.
 </p>
    </div>
      
    <div class="w3-quarter">
      <img src="images/p51.jpg" alt="Chicken" style="width:100%">
              <h3> <strong>Chicken</strong></h3><br>
      <p>자연친화적인 신선한 닭가슴살을 버터밀크에 수비드하여 주문과동시에 바삭하게 튀겨낸 두툼한 치킨 패티에, 토종효모 포테이토 번, 아삭한 식감의 양상추와 피클, 쉐이크쉑만의 허브마요 소스가 토핑 된 프리미엄 버거를 즐겨보세요. 
                (치킨쉑은 청담점에서 만날 수 있어요!
                 다른 매장은 11월 중순 이후 출시 예정입니다)</p>
    </div>
    <div class="w3-quarter">
      <img src="images/p7.jpg" alt="Fries" style="width:100%">
              <h3> <strong>Fries</strong></h3><br><br>
        <p>바삭한 감자 크링클 컷 프라이, 치즈 소스를 듬뿍 올린 치즈 프라이와 함께라면 오늘의 스트레스는 없습니다. </p>
   
        </div>
      <div class="w3-quarter">
      <img src="images/p6.jpg" alt="Cherries" style="width:100%">
          <h3> <strong>Flat-top hotdogs</strong></h3><br>
        <p>쉐이크쉑의 시작을 알리기도 했던 플랫-탑 도그도 쉐이크쉑에서 꼭 함께 맛보아야 하는 메뉴입니다.
참나무 칩으로 훈연한 소시지와 쫄깃한 토종효모 포테이토 번 위에 쉑 랠리쉬 토핑과 다진 양파, 오이, 피클, 토마토, 스포츠 페퍼, 셀러리 솔트, 머스터드 토핑을 풍성하게 올린 시카고식 핫 도그와 포크 소시지가 들어간 담백한 핫 도그, 비프 소시지가 들어간 핫 도그도 만나보세요. </p>

        </div>
        </div>
      
        <div class="w3-row-padding w3-padding-16 w3-center" id="menu">
    <div class="w3-quarter">
      <img src="images/p8.jpg" alt="Sandwich" style="width:100%">
           <h3> <strong>Frozen Custard</strong></h3><br>
      <p>매인 매장에서 신선하게 직접 만드는 부드럽고 진한 맛의 쫀득한 커스터드는 쉐이크쉑만의 디저트입니다.

바닐라, 초콜렛, 솔티드 카라멜, 블랙&화이트, 피넛 버터, 커피, 스트로베리 외에도 매주마다 새롭게 추가되는 플레이버 오브 더 위크가 궁금하지 않으세요? 
 </p>
    </div>
    <div class="w3-quarter">
      <img src="images/p9.jpg" alt="Steak" style="width:100%">
            <h3> <strong>Drinks</strong></h3><br><br>

      <p>매장에서 직접 만드는 상큼한 레몬에이드, 유기농 홍차를 우려낸 아이스티, 레몬에이드와 아이스티를 반반 섞은 피프티/피프티도 잊지 마세요.</p>
    </div>
    <div class="w3-quarter">
      <img src="images/p10.jpg" alt="Cherries" style="width:100%">
           <h3> <strong>Beer and Wine</strong></h3><br>

        <p>쉑버거의 절친이라 불릴 수 있는 쉑마이스터 에일을 소개합니다.
쉐이크쉑 버거 맛을 돋우기 위해 뉴욕 브루클린 브루어리에서 특별히 양조한 쉑마이스터 에일 맥주와 맥파이 맥주가 기다리고 있습니다.

와인을 찾는 게스트들을 위해 라파주 와이너리에서 생산한 쉑와인 (쉑 레드, 쉑 화이트)도 있답니다 </p>
   
        </div>
      <div class="w3-quarter">
      <img src="images/p11.jpg" alt="Cherries" style="width:100%">
      <h3> <strong>Woof</strong></h3><br><br>
        <p> 우리 마음 속엔 언제나 귀여운 네 발 친구도 함께 합니다. 행복한 반려견을 위한 강아지 테이크 아웃 메뉴도 준비해 두었거든요. </p>

        </div>
        </div>
        </div>
  
  <hr>
  
    <!--Shop-->
    
    <h1>Shop</h1><br>
    <div class="w3-container w3-padding-20"> 
           <div class="w3-row-padding w3-padding-16 w3-center" id="shop">
    <div class="w3-quarter">
      <img src="images/p14.jpg" alt="Sandwich" style="width:100%">
           <h3> <strong>Frozen Custard</strong></h3><br>
      <p>매인 매장에서 신선하게 직접 만드는 부드럽고 진한 맛의 쫀득한 커스터드는 쉐이크쉑만의 디저트입니다.

바닐라, 초콜렛, 솔티드 카라멜, 블랙&화이트, 피넛 버터, 커피, 스트로베리 외에도 매주마다 새롭게 추가되는 플레이버 오브 더 위크가 궁금하지 않으세요? 
 </p>
    </div>
    <div class="w3-quarter">
      <img src="images/p15.jpg" alt="Steak" style="width:100%">
            <h3> <strong>Drinks</strong></h3><br><br>

      <p>매장에서 직접 만드는 상큼한 레몬에이드, 유기농 홍차를 우려낸 아이스티, 레몬에이드와 아이스티를 반반 섞은 피프티/피프티도 잊지 마세요.</p>
    </div>
    <div class="w3-quarter">
      <img src="images/p16.jpg" alt="Cherries" style="width:100%">
           <h3> <strong>Beer and Wine</strong></h3><br>

        <p>쉑버거의 절친이라 불릴 수 있는 쉑마이스터 에일을 소개합니다.
쉐이크쉑 버거 맛을 돋우기 위해 뉴욕 브루클린 브루어리에서 특별히 양조한 쉑마이스터 에일 맥주와 맥파이 맥주가 기다리고 있습니다.

와인을 찾는 게스트들을 위해 라파주 와이너리에서 생산한 쉑와인 (쉑 레드, 쉑 화이트)도 있답니다 </p>
   
        </div>
      <div class="w3-quarter">
      <img src="images/p17.jpg" alt="Cherries" style="width:100%">
      <h3> <strong>Woof</strong></h3><br><br>
        <p> 우리 마음 속엔 언제나 귀여운 네 발 친구도 함께 합니다. 행복한 반려견을 위한 강아지 테이크 아웃 메뉴도 준비해 두었거든요. </p>

        </div>
        </div>
        </div>
  
  <hr>
    <!-- SNS -->
        <div class="w3-container-fluid w3-padding-30 w3-center">
            <div class="w3-container w3-content w3-center w3-padding-64" style="max-width:800px" id="sns">
    <h2 class="w3-wide">Follow Us!</h2>
    <div class="w3-row w3-padding-32">
      <div class="w3-third">
        
          <ul class="sns">
            <a href="http://www.facebook.com/share.php?u=http://www.shakeshack.kr/location/index.asp" onclick="window.open(encodeURI(decodeURI(this.href)), 'FBwindow', 'width=20, height=20, menubar=no, toolbar=no, scrollbars=yes'); return false;" rel="nofollow" >
                <img src="images/facebood.png" class="w3-round w3-margin-bottom" alt="Random Name" style="width:60%"></a>
      </div>
          
          <div class="w3-third">
        
          <ul class="sns">
             <a href="https://twitter.com/intent/tweet?text=쉐이크쉑&url=http://www.shakeshack.co.kr/location/" onclick="window.open(encodeURI(decodeURI(this.href)), 'FBwindow', 'width=20, height=20 menubar=no, toolbar=no, scrollbars=yes'); return false;" rel="nofollow">
                <img src="images/twitter.jpg" class="w3-round w3-margin-bottom" alt="Random Name" style="width:60%"></a>
      </div>
              
              
              <div class="w3-third">
        
          <ul class="sns">
             <a href="https://www.instagram.com/shakeshackkr/" target="_blank">
                <img src="images/instagram.jpg" class="w3-round w3-margin-bottom" alt="Random Name" style="width:60%"></a>
                  </div>
              </div>
          </div>
        </div>
    </div>

                <hr>
       
        <!-- Reservation Section -->
  <div class="w3-container w3-padding-30" id="contact">
    <h1>Reservation</h1><br>
    <p class="w3-text-blue-grey w3-large"><b>예약하기</b></p>
    <form method="POST" action="viewrsv.php" target="_blank">
      <p><input class="w3-input w3-padding-16" type="text" placeholder="Name" required name="Name"></p>
      <p><input class="w3-input w3-padding-16" type="number" placeholder="How many people" required name="People"></p>
      <p><input class="w3-input w3-padding-16" type="datetime-local" placeholder="Date and time" required name="date" value="2017-11-16T20:00"></p>
      <p><input class="w3-input w3-padding-16" type="text" placeholder="Message \ Special requirements" required name="Message"></p>
      <p><button class="w3-button w3-light-grey w3-section" type="submit">SEND MESSAGE</button></p>
    </form>
  </div>
                    
    
    <hr>
    
    <!-- Contact Section -->
  <div class="w3-container w3-padding-30" id="contact">
    <h1>Contact</h1><br>
    <p class="w3-text-blue-grey w3-large"><b>질문하기</b></p>
    <form method="POST" action="newcontact_proc.php" target="_blank">
      <p><input class="w3-input w3-padding-16" type="text" placeholder="Title" required name="Title" name="title"></p>
      <p><input class="w3-input w3-padding-16" type="text" placeholder="Contents" required name="Contents" name="content"></p>
      <p><input class="w3-input w3-padding-16" type="text" placeholder="Name" required name="Name" name="name"></p>
      <p><input class="w3-input w3-padding-16" type="password" placeholder="Password" required name="Password" name="password"></p>
      <p><input class="w3-input w3-padding-16" type="datetine-local" name="wdate"></p>
      <p><button class="w3-button w3-light-grey w3-section" type="submit">SEND</button></p>
    </form>
        </div>
      </div>
    </div>
</div>

    <hr>
<!-- Map page content -->

         <div class="container w3-padding-20">
    <div class="map" id="gangnam">  
        <div class="w3-container w3-padding-10">  
    <h3>Gangnam</h3>
    <div class="w3-padding-32">
      <p>뉴욕 메디슨 스퀘어 공원의 활기찬 분위기를 재현할 수 있는 서울의 가장 역동적인 장소. 쉐이크쉑 한국 1호점, 강남점.
이곳에서 소중한 친구, 가족과 함께 즐거운 시간을 보내세요</p>
        
    </div>
        <h3>Where you eat</h3>
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3165.219248159019!2d127.0235124153099!3d37.50274677980989!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x357ca1589ef2d775%3A0xcb38f532752ed8e0!2z7ImQ7J207YGs7ImRIOqwleuCqOygkA!5e0!3m2!1sko!2skr!4v1529399502624" width="850" height="400" frameborder="0" style="border:0" allowfullscreen></iframe>
    </div>
        
        <hr>
        
         <div class="map" id="cheongdam">  
        <div class="w3-container w3-padding-20">  
    <h3>Cheongdam</h3>
    <div class="w3-padding-32">
      <p>뉴욕 메디슨 스퀘어 공원의 활기찬 분위기를 재현할 수 있는 서울의 가장 역동적인 장소. 쉐이크쉑 한국 1호점, 강남점.
이곳에서 소중한 친구, 가족과 함께 즐거운 시간을 보내세요</p>
        
    </div>
        <h3>Where you eat</h3>
  </div>
       <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d12657.988463220441!2d127.05061835910008!3d37.51977730191432!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x7915572c89550242!2z7ImQ7J207YGs7ImRIOyyreuLtOygkA!5e0!3m2!1sko!2skr!4v1529430914125" width="850" height="400" frameborder="0" style="border:0" allowfullscreen></iframe>
    </div>
        
        <hr>
        
        <div class="map" id="doota"> 
            <h3>Doota</h3>
             <div class="w3-padding-32">
      <p>활기찬 분위기와 트렌디함을 그대로 재현한 동대문 두타, 이곳에서 세번째 쉐이크쉑이 함께합니다. 
쉐이크쉑 3호점에서 Shake Shacker가 되어주세요 

</p>
        
    </div>
        <h3>Where you eat</h3>
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3162.4098357849193!2d127.00697861526986!3d37.5689659797974!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x357ca33ca488ff7d%3A0x95878684d07466de!2z7ImQ7J207YGs7ImRIOuRkO2DgOygkA!5e0!3m2!1sko!2skr!4v1529431231569" width="850" height="400" frameborder="0" style="border:0" allowfullscreen></iframe>
            
    </div>
            </div>
    </div>
        
    
 <!-- Footer -->
<footer class="w3-center w3-light-grey w3-padding-32">
    
  <h6>Powered by
      Shake Shake Burger
    </h6>
    <p>2004-2016 SHAKE SHACK. ALL RIGHTS RESERVED.
SOME INFORMATION ON THIS SITE MAY VARY SLIGHTLY BY
LOCATION AND IN STADIUMS</p>
    <img src="images/shakelogo.png"  style="width:20%">
</footer>

    
    <script>
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip(); 
});
$(document).ready(function(){
  // Add scrollspy to <body>
  $('body').scrollspy({target: ".navbar", offset: 50});   

  // Add smooth scrolling on all links inside the navbar
  $("#myNavbar a").on('click', function(event) {
    // Make sure this.hash has a value before overriding default behavior
    if (this.hash !== "") {
      // Prevent default anchor click behavior
      event.preventDefault();

      // Store hash
      var hash = this.hash;

      // Using jQuery's animate() method to add smooth page scroll
      // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
      $('html, body').animate({
        scrollTop: $(hash).offset().top
      }, 800, function(){
   
        // Add hash (#) to URL when done scrolling (default click behavior)
        window.location.hash = hash;
      });
    }  // End if
  });
});
</script>

</body>
</html>