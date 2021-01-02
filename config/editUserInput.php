<?php 
	session_start();

	include 'connect.php';
	include 'encryption.php';
	$key = "ctrlsan";

	if (isset($_GET['save'])) {
		$s =  explode(",", $_GET['save']);

		if ($s[3] == 'Laki Laki') {
			$s[3] = "L";
		}else{
			$s[3] = "P";
		}
		$page = base64_decrypt($_GET['page'], $key);
	
		

		$s[0] = base64_decrypt($s[0], $key);
		// echo $s[0];
		// $sql = "UPDATE peserta SET STB='$s[1]', Nama='$s[2]', jkl='$s[3]',Alamat='$s[4]',Kelas='$s[5]',NoWA='$s[6]',email='$s[7]',Alasan='$s[8]' WHERE id='$s[0]'";


		$sql = "UPDATE `peserta` SET `STB` = '$s[1]', `Nama` = '$s[2]', `jkl` = '$s[3]', `Alamat` = '$s[4]', `Kelas` = '$s[5]', `NoWA` = '$s[6]', `email` = '$s[7]', `Alasan` = '$s[8]' WHERE `peserta`.`id` = $s[0]";
		$query = mysqli_query($link, $sql);
		if ($query) {
			$_SESSION['edit'] = "valid";
		}else{
			$_SESSION['edit'] = "invalid";
		}
		header('Location: ../index.php?page='.base64_encrypt($page, $key));
	}
 ?>