<?php
include_once('lib.php');
extract($_POST);
$sql = "";
$url = "/";
$execArr = [];

switch ($action){
    case 'register' :
        $sql = "
        INSERT INTO users SET
        username = ? ,
        email = ? ,
        password = ? ,
        gender = ? ,
        age = ? ,
        school = ? ;
      ";
        $execArr = [$username, $email, $password, $gender, $age, $school];
        if($_SESSION['capt'] != $_POST['captcha']){
            echo "<script>alert('자동가입방지문구가 올바르지 않습니다.');</script>";
            $url = "../pages/register.php";
        }
        else {
            $url = "../index.php";
            alert($username, "님 회원가입이 완료되었습니다.");
        }
        break;
}
$res = query($sql, $execArr);
move($url);

exit;