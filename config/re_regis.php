<?php 
	session_start();

	include 'connect.php';
	include 'encryption.php';
	$key = "ctrlsan";
	if (!isset($_GET['id']) || $_GET['id'] == "") {
		$_SESSION['rereg'] = "invalid";
		header('Location: ../index.php?page='.base64_encrypt('dataTerinput', $key));
	}
	$page = base64_decrypt($_GET['page'], $key);
	
	$id = base64_decrypt($_GET['id'],$key);
	if ($_GET['c'] == "Yes") {
		$sql = "UPDATE peserta SET registrasi='Yes' WHERE id='$id'";
	}else if ($_GET['c'] == "No") {
		$sql = "UPDATE peserta SET registrasi='No' WHERE id='$id'";
	}
	$query = mysqli_query($link, $sql);
	if ($query) {
		$_SESSION['rereg'] = "valid";
	}else{
		$_SESSION['rereg'] = "invalid";
	}
	header('Location: ../index.php?page='.base64_encrypt($page, $key));
 ?>	