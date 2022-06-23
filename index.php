<?php

require_once ('conf/conf.php');

if(!is_null($current_user->id)){
    header('Location: perfil/');
}else{
    header('Location: entrar/');
}