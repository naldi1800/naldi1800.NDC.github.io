<?php 
	session_start();

	include 'connect.php';
	include 'encryption.php';
	$key = "ctrlsan";

	if (isset($_GET['save'])) {
		$s =  explode(",", $_GET['save']);

		if ($s[2] == 'Laki Laki') {
			$s[2] = "L";
		}else{
			$s[2] = "P";
		}

		$sql = "INSERT INTO peserta VALUES ('','$s[0]','$s[1]','$s[2]','$s[3]','$s[4]','$s[5]','$s[6]','$s[7]','No','')";
		$query = mysqli_query($link, $sql);
		if ($query) {
			$_SESSION['validasiAdd'] = "valid";
		}else{
			$_SESSION['validasiAdd'] = "invalid";
		}

		header('Location: ../index.php?page='.base64_encrypt('addUser', $key));

	}

 ?>