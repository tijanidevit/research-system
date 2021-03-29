<?php 
	include_once '../../core/session.class.php';
	include_once '../../core/admin.class.php';
	include_once '../../core/core.function.php';

	$session = new Session();
	$admin_obj = new Admin();

	if (isset($_POST['username'])) {
		$username = $_POST['username'];
		$password = md5($_POST['password']);

		if ($admin_obj->admin_login($username,$password)) {
			$session->create_session('research_admin','admin');
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