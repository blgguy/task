<?php
session_start();
require_once('main.class.php');
$blogPost = new Engine();

//return to login if not logged in
if (!$blogPost->im_logIn() ||(trim ($blogPost->session()) == '')) {
	$blogPost->rd('login.php');
}
$getId = $_GET["ref"];
$Del  = $blogPost->dataDel('blogpost', $getId);

    if ($Del) {
    	$_SESSION['delete3455message'] = "<b> :$getId: </b> Post deleted successfully!";
        header('Location: adm_blogpost_view.php');
    }else{
    header('location: logout.php');
    }
?>