<?php 
	session_start();
	include_once '../core/posts.class.php';
	include_once '../core/core.function.php';

	echo add_post();
		function add_post(){
		$post_obj = new Posts();
		$title = $_POST['title'];
		$department_id = $_POST['department_id'];
		$content = $_POST['content'];
		$user_id = $_SESSION['research_user']['id'];

		$document = upload_file($_FILES['document'],'../uploads/documents/');

		// if ($post_obj->check_post_existence($title)) {
		// 	//return  displayWarning($title.' already exist');
		// }
		if ($post_obj->add_post($user_id,$department_id,$title,$content,$document)) {
			return $post_obj->fetch_user_last_post($user_id)['id'];
		}
		else{
			return displayError('Unable to add');
		}
	}
?>