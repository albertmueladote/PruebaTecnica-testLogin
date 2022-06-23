<?php

require_once('../../conf/conf.php');

if(isset($_POST['email']) && isset($_POST['password'])){
	if(strlen($_POST['password']) >= 8){
		if(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
			$user = new user();
			$user->email = $_POST['email'];
			$user->password = hash("sha256", PASSWORD . $_POST['password']);
			$user->login();
			if(!is_null($user->id)){
				setcookie(COOKIE_NAME, session_id(), time() + COOKIE_EXPIRE_TIME, '/');
				$session = new session();
				$session->id = session_id();
				$session->data = $user->id;
				$session->save();
				$result = array('result' => true, 'redirect' => ROOT);
			}else{
				$result = array('result' => false, 'message' => 'Usuario o contraseña incorrecto');
			}
		}else{
			$result = array('result' => false, 'message' => 'Formato de email incorrecto');
		}
	}else{
		$result = array('result' => false, 'message' => 'Contraseña demasiado corta');
	}
}else{
	$result = array('result' => false, 'message' => 'Código de error 001');
}

echo json_encode($result);