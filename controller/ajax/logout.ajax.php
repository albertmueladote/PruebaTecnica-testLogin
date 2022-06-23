<?php

require_once('../../conf/conf.php');

if(isset($_COOKIE[COOKIE_NAME])){
    $session = new session($_COOKIE[COOKIE_NAME]);
    $session->remove();
    unset($_COOKIE[COOKIE_NAME]);
    setcookie(COOKIE_NAME, null, time() - COOKIE_EXPIRE_TIME, '/');
    $current_user = null;
    $current_user_guilds = null;
    session_destroy();
    $result = array('result' => true, 'redirect' => ROOT);
}else{
    $result = array('result' => false, 'message' => 'Cookie error');
}

echo json_encode($result);
