<?php 
	session_start();
	unset($_SESSION['research_admin']);
	header('location: ./');
?>