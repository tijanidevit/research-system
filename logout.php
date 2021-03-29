<?php 
	session_start();
	unset($_SESSION['research_user']);
	header('location: login');
?>