<?php

require_once('../conf/conf.php');

if(!is_null($current_user->id)){
	require_once(VIEW . 'profile.view.php');
}else{
    header('Location: ' . ROOT);
}

