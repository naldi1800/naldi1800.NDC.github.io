<?php 
	session_start();

	include 'connect.php';
	include 'encryption.php';
	$key = "ctrlsan";

	$u = md5($_GET['e']);
	$p = md5($_GET['p']);

	$sql = "SELECT * FROM user WHERE Username='$u' AND Password='$p' ";
	$que = mysqli_query($link,$sql);
	$cek = mysqli_num_rows($que);


	if($dt = mysqli_fetch_array($que)){
		$_SESSION['LEVEL'] = $dt['Level'];
		$_SESSION['panitia'] = $_GET['c'];
		echo $_SESSION['panitia'];
		header('Location: ../index.php?page='.base64_encrypt('home', $key));
	}else{
		unset($_SESSION['LEVEL']);
	 	header("Location: ../index.php?login=failed&page=".base64_encrypt('login', $key));
	}
 ?>
 <!-- jaga jaga -->
<!-- <meta http-equiv="refresh" content="0;URL='../index.php?page=<?php  echo base64_encrypt('home', $key) ?>" />     -->
<!-- <meta http-equiv="refresh" content="0;URL='../index.php?login=failed&page=<?php  echo base64_encrypt('login', $key) ?>" />  -->