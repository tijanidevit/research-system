<?php 
	include_once '../../core/departments.class.php';
	include_once '../../core/core.function.php';

	echo add_department();
	function add_department(){
		$department_obj = new Departments();
		$department = $_POST['department'];

		if ($department_obj->check_department_existence($department)) {
			return  displayWarning($department.' already exist');
		}

		if ($department_obj->add_department($department)) {
			return displaySuccess($department.' successfully added');
		}
		else{
			return displayError('Unable to add');
		}
	}
?>