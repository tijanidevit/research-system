<?php 
	include_once '../core/session.class.php';
	include_once '../core/users.class.php';
	include_once '../core/core.function.php';
	echo register();
	function register()
	{
		$session = new Session();
		$user_obj = new Users();
		if (isset($_POST['email'])) {
			$email = $_POST['email'];
			$fullname = $_POST['fullname'];
			if ($_POST['password'] != $_POST['c_password']) {
				return displayWarning('Both passwords did not match');
			}
			$password = md5($_POST['password']);

			if ($user_obj->check_email($email)) {
				return displayWarning($email.' has already been registered. Try a unique one');
			}

			if ($user_obj->register_user($fullname,$email,$password)) {
				$user = $user_obj->fetch_user($email);
				$session->create_session('museum_user',$user);
				return 1;
			}
			else{
				return displayWarning('Error With Server! Try again.');
			}
		}
	}
?>