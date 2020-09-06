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

    case 'insert' :
        $sql = "
        INSERT INTO meet SET
        Title = ? ,
        Photo = ? ,
        Writer = ? ,
        Target = ? ,
        ReleaseDate = ?,        
        meetDate = ? ,
        days = ?,
        startTime = ? ,
        endTime = ? ;
        ";
        $Photo = "";
        if( isset($_FILES['Photo']) ) {
            $up_folder = "../upload/";
            $photo_file = $_FILES['Photo']['name'];
            $tmp_file = $_FILES['Photo']['tmp_name'];
            $target = $up_folder . $photo_file;
            if( move_uploaded_file($tmp_file, $target) ) {
                $Photo = $photo_file;
            }
        }
        $execArr = [$Title, $Photo, $Writer, $Target, $ReleaseDate, $meetDate, $days, $startTime, $endTime];
        $url = "../pages/festival_list.php";
        break;

    case 'update' :
        $Photo = "";
        if( isset($_FILES['Photo']) ) {
            $up_folder = "../uploads/";
            $photo_file = $_FILES['Photo']['name'];
            $tmp_file = $_FILES['Photo']['tmp_name'];
            $target = $up_folder . $photo_file;
            if( move_uploaded_file($tmp_file, $target) ) {
                $Photo = $photo_file;
            }
        }
        $sql = "
        UPDATE meet SET
        Title = ? ,";
        if( $Photo ) $sql .= "Photo = ? ,";
        $sql .= "Writer = ? ,
        Target = ? ,
        ReleaseDate = ?,        
        MDate = ? ,
        MTime = ? 
        WHERE idx = ?                                                                                                                                                                                                                          
        ";

        $url = "../pages/festival_list.php";
        if($Photo) $execArr = [$Title, $Photo, $Writer, $Target, $ReleaseDate, $MDate, $MTime, $idx];
        else $execArr = [$Title, $Writer, $Target, $ReleaseDate, $MDate, $MTime, $idx];
        break;

    case 'delete' :
        $sql = "DELETE FROM meet WHERE idx = ?";
        $execArr = [$idx];
        $url = "../pages/festival_list.php";
        break;

    case 'reservate' :
        $sql = "
        INSERT INTO reservate SET
        title = ? ,
        photo = ? ,
        writer = ? ,
        username = ? ,
        gender = ? ,
        age = ? ,
        school = ? ,
        date = ? ,
        days = ? ,
        startTime = ? ,
        endTime = ? , 
        about = ? , 
        ready = ?;
        ";
        $execArr = [$title, $photo, $writer, $username, $gender, $age, $school, $date, $days, $startTime, $endTime, $about, $ready];
        $url = "../index.php";
        break;
        
    case 'res-delete' :
        $sql = "DELETE FROM reservate WHERE idx = ?";
        $execArr = [$idx];
        $url = "/pages/reservate_my_list.php";
        break;
}
$res = query($sql, $execArr);
move($url);

exit;