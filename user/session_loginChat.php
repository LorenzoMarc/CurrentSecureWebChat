<?php

session_start();

if(!isset($_SESSION["Authenticated"]) || ($_SESSION["Authenticated"]!=1)){
	header("Refresh: 4; url=http://127.0.0.1/SecureWebPage-master/index.php");
	exit();
}
?>