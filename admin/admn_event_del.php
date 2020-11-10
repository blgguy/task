<?php
session_start();
require_once('main.class.php');
$blogPost = new Engine();

//return to login if not logged in
if (!$blogPost->im_logIn() ||(trim ($blogPost->session()) == '')) {
	$blogPost->rd('login.php');
}
$getId = $_GET["ref"];
$Del  = $blogPost->dataDel('event', $getId);

    if ($Del) {
    	$_SESSION['delete3455message'] = "<b> :$getId: </b> Event deleted successfully!";
        header('Location: adm_event_view.php');
    }else{
    header('location: logout.php');
    }
?>