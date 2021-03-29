<?php 
	include_once '../core/session.class.php';
	include_once '../core/users.class.php';
	include_once '../core/core.function.php';
	echo register();
	function register()
	{
		$session = new Session();
		$user_obj = new Users();
		if (isset($_POST['username'])) {
			$username = $_POST['username'];
			$first_name = $_POST['first_name'];
			$last_name = $_POST['last_name'];
			$department_id = $_POST['department_id'];
			if ($_POST['password'] != $_POST['c_password']) {
				return displayWarning('Both passwords did not match');
			}
			$password = md5($_POST['password']);

			if ($user_obj->check_username($username)) {
				return displayWarning($username.' has already been registered. Try a unique one');
			}

			$profile_image = upload_file($_FILES['profile_image'],'../uploads/images/');
			if ($user_obj->register_user($department_id,$first_name,$last_name,$username,$profile_image,$password)) {
				$user = $user_obj->fetch_user($username);
				$session->create_session('research_user',$user);
				return 1;
			}
			else{
				return displayWarning('Error With Server! Try again.');
			}
		}
	}
?>