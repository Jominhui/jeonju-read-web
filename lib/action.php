<?php
include_once('lib.php');

$action = isset($_POST['action']) ? $_POST['action'] : "";
if( $action == "getmeets" ) {
    $data = array();
    $mdate = isset($_POST['mdate']) ? $_POST['mdate'] : "";
    if( $mdate ) {
        $sql = "SELECT * FROM meet WHERE meetDate=:meetDate";
        if( $rs = $db->prepare($sql) ) {
            $rs->bindParam(":meetDate", $mdate);
            if( $rs->execute() ) {
                $data = $rs->fetchAll(PDO::FETCH_ASSOC);
            }

        }
    }
    echo json_encode($data);
} else if( $action == "changereadystate" ) {
    $data = array("success"=>false);
    $idx = isset($_POST['idx']) ? (int)$_POST['idx'] : 0;
    $ready = isset($_POST['ready']) ? $_POST['ready'] : "";
    if( $idx && $ready ) {
        $sql = "UPDATE reservate SET ready=:ready WHERE idx=:idx";
        if( $rs = $db->prepare($sql) ) {
            $rs->bindParam(":ready", $ready);
            $rs->bindParam(":idx", $idx);
            if( $rs->execute() ) {
               if( $rs->rowCount() ) $data['success'] = true;
            }
        }
    }
    echo json_encode($data);
} else if( $action == "checkcaptcha") {
    $result = array("success"=>false);
    $result['post'] = $_POST;
    $captcha = isset($_POST['captcha']) ? $_POST['captcha'] : "";
    $server_captcha = isset($_SESSION['capt']) ? $_SESSION['capt'] : "";

    if( $captcha && $server_captcha && $server_captcha == $captcha) $result['success'] = true;
    echo json_encode($result);
}
