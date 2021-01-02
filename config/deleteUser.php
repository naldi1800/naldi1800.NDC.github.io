<?php 
	session_start();

	include 'connect.php';
	include 'encryption.php';
	$key = "ctrlsan";
	$page = base64_decrypt($_GET['page'], $key);
	
	
	
	if (!isset($_GET['id']) || $_GET['id'] == "") {
		$_SESSION['delete'] = "invalid";
		header('Location: ../index.php?page='.base64_encrypt($page, $key));
	}	
	$id = base64_decrypt($_GET['id'],$key);

	$sql = "DELETE FROM peserta WHERE id='$id'";
	$query = mysqli_query($link, $sql);
	if ($query) {
		$_SESSION['delete'] = "valid";
	}else{
		$_SESSION['delete'] = "invalid";
	}
	header('Location: ../index.php?page='.base64_encrypt($page, $key));
 ?>