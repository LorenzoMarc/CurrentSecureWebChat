<?php

session_start();

if(!isset($_SESSION["ID"])){
	header("Refresh: 4; url=../index.php#accedi");
	exit();
}
?>