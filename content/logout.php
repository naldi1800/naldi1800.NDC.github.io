<?php 	
	
	include '../config/encryption.php';
	$key = "ctrlsan";

	session_start();
	session_destroy();
	header('Location: ../index.php?page='.base64_encrypt('home', $key));
 ?>