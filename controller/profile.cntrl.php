<?php

$social = array(array('icon' => 'fa fa-twitter', 'href' => 'https://twitter.com/albertmueladot1'), array('icon' => 'fa fa-linkedin', 'href' => 'https://www.linkedin.com/in/albertmueladote/'), array('icon' => 'fa fa-facebook', 'href' => 'https://www.facebook.com/albert.mueladote'));
//echo json_encode($social);
require_once('../conf/conf.php');

if(!is_null($current_user->id)){
	require_once(VIEW . 'profile.view.php');
}else{
    header('Location: ' . ROOT);
}

