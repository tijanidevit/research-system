<?php 

	function upload_file($file,$upload_link)
	{
		$file_name = rand(1000,9999).'-'.$file['name'];
		$file_name = str_replace(' ', '-', $file_name);
		$file_tmp = $file['tmp_name'];

		move_uploaded_file($file_tmp, $upload_link.$file_name);
		return $file_name;
	}
	function redirect($link){
		header("location:".$link);
	}
	function displayError($message)
	{
	    return '<div class="alert alert-danger">' . $message . '</div>';
	}

	function displayWarning($message)
	{
	    return '<div class="alert alert-warning">' . $message . '</div>';
	}

	function displaySuccess($message)
	{
	    return '<div class="alert alert-success">' . $message . '</div>';
	}
?>