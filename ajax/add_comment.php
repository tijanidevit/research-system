<?php 
	session_start();
	include_once '../core/posts.class.php';
	include_once '../core/core.function.php';

	echo add_comment();
	function add_comment(){
		$post_obj = new Posts();
		$user_id = $_SESSION['research_user']['id'];
		$comment = $_POST['comment'];
		$post_id = $_POST['post_id'];

		if ($post_obj->check_comment_existence($user_id,$post_id,$comment)) {
			return  displayWarning('You have already added this comment');
		}

		if ($post_obj->add_comment($user_id,$post_id,$comment)) {
			return 1;
		}
		else{
			return displayError('Unable to add');
		}
	}
?>