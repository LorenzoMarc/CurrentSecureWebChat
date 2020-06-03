<?php

session_start();

if(!isset($_SESSION["Authenticated"]) || ($_SESSION["Authenticated"]!=1)){
	header("Refresh: 4; url=session_index.php");
	exit();
}
?>