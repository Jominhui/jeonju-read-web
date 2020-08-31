<?php
    include_once('lib.php');
    $action = isset($_POST['action']) ? $_POST['action'] : "";
    if( $action == "checkcaptcha") {
        $result = array("success"=>false);
        $result['post'] = $_POST;
        $captcha = isset($_POST['captcha']) ? $_POST['captcha'] : "";
        $server_captcha = isset($_SESSION['capt']) ? $_SESSION['capt'] : "";
    
        if( $captcha && $server_captcha && $server_captcha == $captcha) $result['success'] = true;
        echo json_encode($result);
    }