<?php 
	session_start();

	include 'connect.php';
	include 'encryption.php';
	$key = "ctrlsan";
	if (!isset($_GET['id']) || $_GET['id'] == "") {
		$_SESSION['rereg'] = "invalid";
		header('Location: ../index.php?page='.base64_encrypt('dataTerinput', $key));
	}
	
	$id = base64_decrypt($_GET['id'],$key);
	$sql = "SELECT * FROM peserta WHERE id='$id'";
	$query = mysqli_query($link, $sql);

	$g = base64_decrypt($_GET['page'], $key);	
	$page = base64_encrypt($g, $key);


	// if ($query) {
	// 	$_SESSION['print'] = "valid";
	// }else{
	// 	$_SESSION['print'] = "invalid";
	// }


	// header('Location: ../index.php?page='.base64_encrypt('dataTerinput', $key));
 ?>	
 <body onafterprint="porc();">
 	
	 <script type="text/javascript">
	 	window.print();
	 	function porc() {
	 		window.location = '../index.php?page='+<?= json_encode($page); ?>;
	 	}
	 </script>

	 <style type="text/css">
	 	td{
	 		height: 50px;
	 	}
	 	.photos{
	 		width: 135px;
	 		height: 155px;
	 		border: 1px solid black;
	 		vertical-align: middle;
	 		text-align: center;
	 		position: absolute;
	 		left: 78%;
	 		margin-top: 10px;
	 	}
	 	.ttd{
	 		position: absolute;
	 		left: 10%;
	 		margin-top: 210px;
	 		text-align: center;
	 	}
	 	.ttd_peserta{
	 		position: absolute;
	 		left: 75%;
	 		margin-top: 210px;
	 		text-align: center;
	 	}
	 </style>

	<?php while($row = mysqli_fetch_array($query)){ ?>
		<div style="width: 100%; margin-bottom: 22%">
			<img  src="../img/ndc.png" style="top: 10px; padding-left: 3%; position: absolute; width: 20%;"> 
			<h1 style=" top: 10px; position: absolute; width: 80%; text-align: center; margin-left: 8%;">
				Niphaz Diploma Club <br>
				Pendaftran Cinta XVIII
			</h1>
			<img style="right:5%; top: 4px; position: absolute; width: 20%;" src="../img/DP.png" > 
		</div>
		<hr>
		<h2 align="center">Peserta</h2>
		<table  width="100%">
			<tr>
				<td colspan="3">
					

				</td>
			</tr>
			<tr>
				<td width="130">STB</td>
				<td width="20">:</td>
				<td><?= $row['STB'] ?></td>
			</tr>
			<tr>
				<td>Nama</td>
				<td>:</td>
				<td><?= $row['Nama'] ?></td>
			</tr>
			<tr>
				<td>Kelas</td>
				<td>:</td>
				<td><?= $row['Kelas'] ?></td>
			</tr>
			<tr>
				<td>Jenis Kelamin</td>
				<td>:</td>
				<td><?= ($row['jkl'] == "L")? "Laki-Laki": "Perempuan" ?></td>
			</tr>
			<tr>
				<td>No WhatsApp</td>
				<td>:</td>
				<td><?= "+".$row['NoWA'] ?></td>
			</tr>
			<tr>
				<td>Email</td>
				<td>:</td>
				<td><?= $row['email'] ?></td>
			</tr>
			<tr>
				<td>Alamat</td>
				<td>:</td>
				<td><?= $row['Alamat'] ?></td>
			</tr>
			<tr>
				<td>Alasan</td>
				<td>:</td>
				<td><?= $row['Alasan'] ?></td>
			</tr>
		</table>

		<div class="photos">
			<br>
			<br>
			<br>
			3 x 4
		</div>
		<div class="ttd">
			Panitia
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<?php echo $_SESSION['panitia']; ?>
		</div>
		<div class="ttd_peserta">
			Peserta
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<?= $row['Nama'] ?>
		</div>
	<?php } ?>
 </body>