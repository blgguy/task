<?php
//start session
session_start();
// include class file.
require_once('main.class.php');
// call the class obj
$user = new engine();
$user->logOut();

$user->rd('login.php');
