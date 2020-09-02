<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="../assets/js/jquery-3.4.1.min.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/fontawesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="../assets/css/index.css">
    <title>전주 독서 대전</title>
</head>
<body>
    <div id="wrap">
        <header>
            <a href="../index.php"><div class="logo"></div></a>
            <div class="main-menu-area">
                <div class="main-menu">
                    전주독서대전
                    <div class="sub-menu-area">
                        <div class="sub-menu-title">전주독서대전</div>
                        <hr class="sub-menu-line">
                        <a href="../index.php"><div class="sub-menu">대전 소개</div></a>
                        <?php if(!isset($_SESSION['userid'])) {
                            echo "<a href='../pages/login.php'><div class='sub-menu'>로그인 및 회원가입</div></a>";
                        }
                        else{
                            echo "<a href='../pages/logout.php'><div class='sub-menu'>로그아웃</div></a>";
                        } ?>
                        <a href="../pages/overview.php"><div class="sub-menu">행사개요</div></a>
                    </div>
                </div>
                <div class="main-menu">온라인 책만들기</div>
                <div class="main-menu">
                    독자와의 만남
                    <div class="sub-menu-area">
                        <div class="sub-menu-title">독자와의 만남</div>
                        <hr class="sub-menu-line">
                        <a href="<?=$link_reservate;?>"><div class="sub-menu">예약하기</div></a>
                        <a href="<?=$link_mylist;?>"><div class="sub-menu">예약확인</div></a>
                    </div>
                </div>
                <div class="main-menu">
                    관리자페이지
                    <div class="sub-menu-area">
                        <div class="sub-menu-title">관리자페이지</div>
                        <hr class="sub-menu-line">
                        <a href="<?=$link_list;?>"><div class="sub-menu">행사등록</div></a>
                        <a href="<?=$link_manager?>"><div class="sub-menu">예약관리</div></a>
                        <a href="<?=$link_current?>"><div class="sub-menu">예약현황</div></a>
                    </div>
                </div>
            </div>
        </header>
