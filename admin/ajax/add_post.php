<?php 
	include_once '../../core/posts.class.php';
	include_once '../../core/core.function.php';

	echo add_post();
	function add_post(){
		$post_obj = new posts();
		$title = $_POST['title'];
		$content = $_POST['content'];

		if ($post_obj->check_post_existence($title)) {
			return  displayWarning($title.' already exist');
		}
		$cover_image = upload_file($_FILES['cover_image'],'../../uploads/images/');
		if ($post_obj-> add_post($title,$content,$cover_image)) {
			return displaySuccess($title.' successfully added');
		}
		else{
			return displayError('Unable to add');
		}
	}
?>