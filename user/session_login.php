<?php

session_start();
error_reporting (0); // Do not show anything
if(!isset($_SESSION["ID"])){
	header("Refresh: 4; url=../index.php#accedi");
	exit();
}
?>