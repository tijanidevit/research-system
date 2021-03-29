<?php 
session_start();
if (!isset($_SESSION['museum_admin'])) {
    header('location: ./');
    exit();
}

if (!isset($_GET['id'])) {
    header('location: posts');
    exit();
}

include_once '../core/posts.class.php';

$post_obj = new posts();
$post_obj->delete_post($_GET['id']);
header('location: posts');
?>