<?php 
	include_once '../../core/diseases.class.php';
	include_once '../../core/core.function.php';

	echo add_disease();
	// function FunctionName($value='')
	// {
	// 	# code...
	// }
	function add_disease(){
		$disease = new Diseases();
		$disease_name = $_POST['disease_name'];
		$symptoms = $_POST['symptoms'];
		$causes = $_POST['causes'];
		$prevention = $_POST['prevention'];
		$cure = $_POST['cure'];
		$comments = $_POST['comments'];

		if ($disease->check_disease_existence($disease_name)) {
			return  displayWarning($disease_name.' already exist');
		}
		if ($disease->add_disease($disease_name,$symptoms,$causes,$prevention,$cure,$comments)) {
			return displaySuccess($disease_name.' successfully added');
		}
		else{
			return displayError('Unable to add');
		}
	}
?>