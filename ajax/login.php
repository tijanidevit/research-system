<?php 
	include_once '../core/session.class.php';
	include_once '../core/users.class.php';
	include_once '../core/core.function.php';

	$session = new Session();
	$user_obj = new users();

	if (isset($_POST['username'])) {
		$username = $_POST['username'];
		$password = md5($_POST['password']);

		if ($user_obj->user_login($username,$password)) {
			$user = $user_obj->fetch_user($username);
			$session->create_session('research_user',$user);
			echo 1;
		}
		else{
			echo displayWarning('Invalid Credentials');
		}
	}

	else{
		echo "No input made";
	}
?>