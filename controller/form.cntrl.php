<?php

require_once('../conf/conf.php');

if(!is_null($current_user->id)){
    header('Location: ' . ROOT);
}else{
	require_once(VIEW . 'form.view.php');
}

