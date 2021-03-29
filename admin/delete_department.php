<?php 
session_start();
if (!isset($_SESSION['research_admin'])) {
    header('location: ./');
    exit();
}

if (!isset($_GET['id'])) {
    header('location: departments');
    exit();
}

include_once '../core/departments.class.php';

$department_obj = new Departments();
$departments = $department_obj->delete_department($_GET['id']);
header('location: departments');
?>