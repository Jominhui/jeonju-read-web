<?php include_once('lib/lib.php');?>
<?php include_once('pages/_header.php'); ?>
<!-- 비주얼 영역 -->
<div class="visual-area carousel slide" data-interval="3000" data-ride="carousel" data-pause="false">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="assets/img/A_img/book-3480216_1920.jpg">
        </div>
        <div class="carousel-item">
            <img src="assets/img/A_img/young-1822682_1920.jpg">
        </div>
        <div class="carousel-item">
            <img src="assets/img/A_img/book-2432139_1920.jpg">
        </div>
    </div>

    <div class="main-read-area">
        <div class="main-read">
            <h3>2020 전주독서대전</h3>
            <h1>책 읽는 도시<br>글 쓰는 전주</h1>
            <h3>2020. 9. 18 (금) ~ 9. 20 (일)</h3>
        </div>
    </div>

    <div class="carousel_btn_area">
        <div class="carousel_btn" href=".visual-area" data-slide="prev" id="prev_btn">
            <span class="fa fa-arrow-left"></span>
        </div>
        <div class="carousel_btn" href=".visual-area" data-slide="next" id="next_btn">
            <span class="fa fa-arrow-right"></span>
        </div>
    </div>

    <div class="select_img_area">
        <div data-target=".visual-area" data-slide-to="0" class="ac_img">
            <img src="assets/img/A_img/book-3480216_1920.jpg" alt="">
        </div>
        <div data-target=".visual-area" data-slide-to="1" class="ac_img">
            <img src="assets/img/A_img/young-1822682_1920.jpg" alt="">
        </div>
        <div data-target=".visual-area" data-slide-to="2" class="ac_img">
            <img src="assets/img/A_img/book-2432139_1920.jpg" alt="">
        </div>
    </div>
</div>

<!-- 소개 영역 -->
<div id="info-area">
    <h1 id="info-back-title">2020 JEONJU<br>READ FESTIVAL</h1>
    <div id="info-circle-area">
        <div class="info-circle" id="circle1">多</div>
        <div class="info-circle" id="circle2">讀</div>
        <div class="info-circle" id="circle3">多</div>
        <div class="info-circle" id="circle4">讀</div>
        <p id="info-sub"><span>다 독 다 독</span><br>당신을 듣겠습니다</p>
    </div>

    <p id="info-content">전주독서대전 올해의 주제는 ‘다독 다독, 당신을 듣겠습니다’입니다. 독서의 끝은 자신의 고유한 세계와 감정을 직접 글로 쓰는<br>
        것이고 이것은 또 다른 책 읽기의 기쁨으로 이어집니다. 읽기와 쓰기는 한 몸처럼 연결되어 있습니다. 전주의 여러 도서관에서<br>
        상설로 다양한 글쓰기 프로그램(시쓰기, 서평쓰기, 글쓰기 등)을 진행하는 것은 독서의 본질을 꿰뚫는 좋은 기획입니다. 전주<br>
        독서대전은 독서공동체들이 자발적으로 참여하는 시민 주도형 책 축제라는 특성을 갖고 있습니다. <a href="#">자세히보기</a></p>

    <div id="info-img-area">
        <img id="info-img" src="assets/img/bookhu.png">
    </div>
</div>

<!-- 이벤트 영역 -->
<div id="event-list">
    <p id="event-title">EVENT <span>LIST</span></p>
    <div class="event-content" style="border-radius: 10px 30px 60px 60px; float: left;">
        <p class="event-content-title">개막행사</p>
        <p>책으로 떠나는 백이십 년의 시간여행 조선 말 책을 읽어주던 전기수와 전주 부윤일행, 2020년 전주한벽루 나타나다.<br>
        현대판 전기수인 북튜버와 조선 전기수의 입심 대결. 판소리와 랩, 흥겨운 연주가 함께 합니다.</p>
        <div class="event-circle event-left"><i class="fa fa-angle-right"></i></div>
    </div>

    <div class="event-content" style="border-radius: 30px 10px 60px 60px; float: right; text-align: right; padding-right: 50px;">
        <p class="event-content-title">책에게 말 걸기</p>
        <p>문학을 대표하는 중견 소설가. 전북 고창 출생. 소설집 '타인에게 말 걸기', '행복한 사람은 시계를 보지 않는다'<br>
        '다른 모든 눈송이와 아주 비슷하게 생긴 단 하나의 눈송이' 장편소설 '새의 선문', <br>
        '마지막 춤은 나와 함께', '그것은 꿈이었을까', '마이너리그', '비밀과 거짓말', '소년을 위로해줘', '태연한 인생'</p>
        <div class="event-circle" style="padding-right: 22px; top: -100px; left: -80px;"><i class="fa fa-angle-left"></i></div>
    </div>

    <div class="event-content" style="border-radius: 30px 10px 60px 60px; float: left;">
        <p class="event-content-title">그 책_작가를 만나다</p>
        <p>어떻게 슬픔은 빛이 되는가 '정혜윤의 읽기와 쓰기'<br>
        독서에세이 '침대와 책'을 시작으로 '삶을 바꾸는 책 읽기', '마술라디오' 등 책과 사람에 관한 이야기를 썼다.</p>
        <div class="event-circle event-left"><i class="fa fa-angle-right"></i></div>
    </div>
</div>

<!-- 작가 영역 -->
<div id="writer-area">
    <p id="writer-title">초청작가</p>
    <a href="#popup1"><div class="writer-content writer1"></div></a>
    <a href="#popup2"><div class="writer-content writer2"></div></a>
    <a href="#popup3"><div class="writer-content writer3"></div></a>
    <a href="#popup4"><div class="writer-content writer4"></div></a>
    <h2 id="writer-back-title1">INVITED</h2><h2 id="writer-back-title2">WRITER</h2><P id="writer-content1">전주에서는 매일이 책 축제이지만,</P>
    <P id="writer-content2">생일잔치처럼 작가와 독자가 즐겁게 만나는</P>
    <P id="writer-content3">특별한 마당도 펼쳐놓았습니다.</P>
    <P id="writer-content4">책을 사랑하는 이들이 정겹게 만나는 아름다운 독서축제에</P>
    <P id="writer-content5">살아있는 이야기의 주인공이신 여러분들을 초대합니다.</P>
    <div id="writer-more">더보기</div>
    <img id="writer-image" src="assets/img/writer-human.png">
</div>

<a href="#writer-area">
    <div id="popup1" class="layer">
        <div class="box">
            <img src="assets/img/A_img/초청작가/1.jpg">
        </div>
    </div>
</a>

<a href="#writer-area">
    <div id="popup2" class="layer">
        <div class="box">
            <img src="assets/img/A_img/초청작가/2.jpg">
        </div>
    </div>
</a>
<a href="#writer-area">
    <div id="popup3" class="layer">
        <div class="box">
            <img src="assets/img/A_img/초청작가/3.jpg">
        </div>
    </div>
</a>

<a href="#writer-area">
    <div id="popup4" class="layer">
        <div class="box">
            <img src="assets/img/A_img/초청작가/4.jpg">
        </div>
    </div>
</a>

<!-- 행사 영역 -->
<div id="festival">
    <input type="radio" class="festival-btn" id="btn1" name="btn" checked>
    <input type="radio" class="festival-btn" id="btn2" name="btn">
    <input type="radio" class="festival-btn" id="btn3" name="btn">
    <input type="radio" class="festival-btn" id="btn4" name="btn">


    <label for="btn1" class="btn-turn" id="one"></label>
    <label for="btn2" class="btn-turn" id="two"></label>
    <label for="btn3" class="btn-turn" id="three"></label>
    <label for="btn4" class="btn-turn" id="four"></label>

    <p id="festival-title">강연목록</p>
    <div id="festival-back-list">
        <div class="festival-list" style="text-align: right; padding-right: 10px;">
            <h1 class="festival-number">01</h1>
            <p class="festival-title">작가_독자를 만나다</p>
            <p class="festival-content">일시: '20. 9. 19 (토) 10:00</p>
            <p class="festival-content">초청작가: 장석주&백연준(작가)</p>
            <p class="festival-content">주제: 작가 부부의 '읽는 생활, 쓰는삶'</p>
        </div>

        <div class="festival-list" style="padding-left: 10px;">
            <h1 class="festival-number" >02</h1>
            <p class="festival-title">전주를 읽어드립니다</p>
            <p class="festival-content">기간: '20. 9. 18 (금) ~ 9. 20 (일)</p>
            <p class="festival-content">강연자 : 정진욱(영화), 장명수(음식), <br> 이재운(역사)</p>
            <p class="festival-content">주제 : 전주를 읽어드립니다</p>
        </div>

        <div class="festival-list" style="text-align: right; padding-right: 10px;">
            <p class="festival-title">전주 올해의 책_작가</p>
            <p class="festival-content">일시 : '20. 9. 19.(토) 13:00</p>
            <p class="festival-content">초청작가 : 강양구(작가)</p>
            <p class="festival-content">주제 : 인류는 바이러스를 이길 수 있을까?</p>
            <h1 class="festival-number" >03</h1>
        </div>

        <div class="festival-list" style="padding-left: 10px;">
            <p class="festival-title">여는 이야기</p>
            <p class="festival-content">일시 : '20. 9. 18.(금) 19:00</p>
            <p class="festival-content">초청작가 : 최재천(작가)</p>
            <p class="festival-content">주제 : 인류의 미래와 생태적 전환</p>
            <h1 class="festival-number" >04</h1>
        </div>
    </div>

    <div id="festival-cover">
        <div class="festival-cover-card"></div>
        <div class="festival-cover-card on"></div>
        <div class="festival-cover-card on"></div>
        <div class="festival-cover-card on"></div>
    </div>

    <div id="festival-btn"><i class="fa fa-book"></i></div>
</div>
<?php include_once('pages/footer.php'); ?>