<section class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-12">
			    <div class="invoice p-3 mb-3">
			      <!-- Content -->
			    <h1 class="text-bold text-black">Data Terinput</h1>
			    <hr style="border: 1px solid lime;"  >
		    	<div class="text-black text-capitalize"><?php echo $_SESSION['slogan'] ?></div>
		    	<hr style="border-top: 1px dashed lime;"  width="100%" >

		    	<!-- <div class="card">
              <div class="card-header">
                <h3 class="card-title">DataTable with default features</h3>
              </div> -->
              <!-- /.card-header -->

              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>STB</th>
                    <th>Nama</th>
                    <th>Jenis Kelamin</th>
                    <th>No WhatsApp</th>
                    <th>Email</th>
                    <th>Kelas</th>
                    <th>Alamat</th>
                    <th>Alasan</th>
                    <th >Setting</th>
                  </tr>
                  </thead>
                  <tbody>
                  	<?php 	
						$sql = "SELECT * FROM peserta WHERE registrasi='Yes'";
						$query = mysqli_query($link, $sql);
						$no = 1;
						while ($row = mysqli_fetch_array($query)) {
                  	 ?>
  			         <tr>
	                    <td><?= $no ?></td>
	                    <td class="text-center"><?= $row['STB'] ?></td>
	                    <td><?= $row['Nama'] ?></td>
	                    <td width="30"><?= ($row['jkl'] == "L")? "Laki-Laki" : "Perempuan"; ?></td>
	                    <td><?= "+".$row['NoWA'] ?></td>
	                    <td><?= $row['email'] ?></td>
	                    <td class="text-center"><?= $row['Kelas'] ?></td>
	                    <td><?= $row['Alamat'] ?></td>
	                    <td><?= $row['Alasan'] ?></td>
	                    <td>
	                    	<a class="btn btn-app" data-toggle="modal" data-target="#re_regis<?= $row['id'] ?>">
			                  <img width="35" src="https://img.icons8.com/metro/100/000000/checked-user-male.png"/> Cancel Re-Registration
			                </a>
	                    	<a class="btn btn-app" data-toggle="modal" data-target="#editUser<?= $row['id'] ?>">
			                   <img width="35" src="https://img.icons8.com/fluent-systems-filled/100/000000/edit-user.png"/> Edit Data Peserta
		               		</a>	
	                    	<a class="btn btn-app" data-toggle="modal" data-target="#deleteUser<?= $row['id'] ?>">
			                 <img width="35" src="https://img.icons8.com/metro/100/000000/remove-user-male.png"/> Delete Data Peserta
			                </a>
			                <a class="btn btn-app" data-toggle="modal" data-target="#printUser<?= $row['id'] ?>">
			                	<img width="35" src="https://img.icons8.com/android/100/000000/print.png"/> Print Data Peserta
			                </a>
	                    </td>
	                  </tr>
	                  <!-- MODAL RE-Regis -->
	                  <div class="modal fade" id="re_regis<?= $row['id'] ?>">
				        <div class="modal-dialog">
				          <div class="modal-content">
				            <div class="modal-header">
				              <h4 class="modal-title">Re-Registration</h4>
				              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				                <span aria-hidden="true">&times;</span>
				              </button>
				            </div>
				            <div class="modal-body">
				              <p>Apa peserta atas nama "<?= $row['Nama'] ?>" ingin dibatalkan Registrasi Ulangnya  ?</p>
				            </div>
				            <div class="modal-footer justify-content-between">
				              <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
				              <a href="config/re_regis.php?id=<?= base64_encrypt($row['id'], $key) ?>&c=No&page=<?php echo base64_encrypt('dataRegistrasi',$key)?>" type="button" class="btn btn-primary">Yes</a>
				            </div>
				          </div>
				        </div>
				      </div>
				      <!-- MODAL Edit -->
				      <div class="modal fade" id="editUser<?= $row['id'] ?>">
				        <div class="modal-dialog">
				          <div class="modal-content">
				            <div class="modal-header">
				              <h4 class="modal-title">Edit Data Peserta</h4>
				              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				                <span aria-hidden="true">&times;</span>
				              </button>
				            </div>
				            <div class="modal-body">
				              <p>Apa Peserta atas nama "<?= $row['Nama'] ?>" Ingin dilakukan pengeditan  ?</p>
				            </div>
				            <div class="modal-footer justify-content-between">
				              <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
				              <a href="?page=<?php echo base64_encrypt('editUser',$key)?>&id=<?= base64_encrypt($row['id'], $key) ?>&c=<?php echo base64_encrypt('dataRegistrasi',$key)?>" type="button" class="btn btn-primary">Yes</a>
				            </div>
				          </div>
				        </div>
				      </div>
				      <!-- MODAL Delete -->
				      <div class="modal fade" id="deleteUser<?= $row['id'] ?>">
				        <div class="modal-dialog">
				          <div class="modal-content">
				            <div class="modal-header">
				              <h4 class="modal-title">Delete Data Peserta</h4>
				              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				                <span aria-hidden="true">&times;</span>
				              </button>
				            </div>
				            <div class="modal-body">
				              <p>Apa Peserta atas nama "<?= $row['Nama'] ?>" Ingin Dihapus ? </p>
				            </div>
				            <div class="modal-footer justify-content-between">
				              <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
				              <a href="config/deleteUser.php?id=<?= base64_encrypt($row['id'], $key) ?>&page=<?php echo base64_encrypt('dataRegistrasi',$key)?>" type="button" class="btn btn-primary">Yes</a>
				            </div>
				          </div>
				        </div>
				      </div>
				      <!-- MODAL Print -->
				      <div class="modal fade" id="printUser<?= $row['id'] ?>">
				        <div class="modal-dialog">
				          <div class="modal-content">
				            <div class="modal-header">
				              <h4 class="modal-title">Re-Registration</h4>
				              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				                <span aria-hidden="true">&times;</span>
				              </button>
				            </div>
				            <div class="modal-body">
				              <p>Apa peserta atas nama "<?= $row['Nama'] ?>" Ingin Diprint Datanya  ?</p>
				            </div>
				            <div class="modal-footer justify-content-between">
				              <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
				              <a href="config/printUser.php?id=<?= base64_encrypt($row['id'], $key) ?>&page=<?php echo base64_encrypt('dataRegistrasi',$key)?>" type="button" class="btn btn-primary">Yes</a>
				            </div>
				          </div>
				        </div>
				      </div>
				      <?php $no++; } ?>
			      </tbody>
                  <tfoot>
                  <tr>
                    <th>No</th>
                    <th>STB</th>
                    <th>Nama</th>
                    <th>Jenis Kelamin</th>
                    <th>No WhatsApp</th>
                    <th>Email</th>
                    <th>Kelas</th>
                    <th>Alamat</th>
                    <th>Alasan</th>	
                    <th>Setting</th>
                  </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            <!-- </div> -->

		        </div>
		    </div>
		</div>
	</div>
</section>
<?php 
	$j = 0;
	$k = 0;
	$l = 0;
 ?>
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      // "buttons": ["excel", "pdf", "print", "colvis"]
      "buttons": ["excel", "pdf", "print"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });

	// $("a[data-cv-idx='3']").removeClass('active');

	var btnDrop = $("<button type='button' class='btn btn-secondary buttons-print dropdown-toggle dropdown-icon' data-toggle='dropdown'></button>").append("<span>Seting</span>");
	// th = $('#example1 thead tr th:nth-child('+len+')');
	th = $('#example1 thead tr th');
	var action;
	var acAjaxMove = [];
	// alert(th.length);
	// $('.hideNama').hide();
	var btnMenu = $("<div class='dropdown-menu' id='menuItemBtn' role='menu'></div>");
	for (var i = 1; i <= th.length; i++) {
		action = $('#example1 thead tr th:nth-child('+i+')');
		acAjaxMove.push(action.text());
		// alert(action.text());
		if (action.text() == "Alamat" || action.text() == "Email") {
			btnMenu.append('<a class="dropdown-item btn-menu-item" name='+action.text().replace(/\s+/g, "")+' href="#">'+action.text()+'</a>');
		}else if(action.text() != "Setting"){
			btnMenu.append('<a class="dropdown-item btn-menu-item active" name='+action.text().replace(/\s+/g, "")+' href="#">'+action.text()+'</a>');
		}
	}

    var btnGroup = $("<div class='btn-group'></div>").append(btnDrop, btnMenu);

    

    
    $('div.dt-buttons').append(btnGroup);

    var headAclick = document.getElementById('menuItemBtn');
	var aclick = headAclick.getElementsByClassName('btn-menu-item');
	//Alamat
	$('#example1 thead tr th:nth-child(8)').hide();
	$('#example1 tbody tr td:nth-child(8)').hide();
	$('#example1 tfoot tr th:nth-child(8)').hide();
	//Email
	$('#example1 thead tr th:nth-child(6)').hide();
	$('#example1 tbody tr td:nth-child(6)').hide();
	$('#example1 tfoot tr th:nth-child(6)').hide();
	for (var i = 0; i < aclick.length; i++) {
		aclick[i].addEventListener("click", function () {
			if (this.name == "No") {
				$('#example1 thead tr th:nth-child(1)').toggle();
				$('#example1 tbody tr td:nth-child(1)').toggle();
				$('#example1 tfoot tr th:nth-child(1)').toggle();
			}else if (this.name == "STB") {
				$('#example1 thead tr th:nth-child(2)').toggle();
				$('#example1 tbody tr td:nth-child(2)').toggle();
				$('#example1 tfoot tr th:nth-child(2)').toggle();
			}else if (this.name == "Nama") {
				$('#example1 thead tr th:nth-child(3)').toggle();
				$('#example1 tbody tr td:nth-child(3)').toggle();
				$('#example1 tfoot tr th:nth-child(3)').toggle();
			}else if (this.name == "JenisKelamin") {
				$('#example1 thead tr th:nth-child(4)').toggle();
				$('#example1 tbody tr td:nth-child(4)').toggle();
				$('#example1 tfoot tr th:nth-child(4)').toggle();
			}else if (this.name == "NoWhatsApp") {
				$('#example1 thead tr th:nth-child(5)').toggle();
				$('#example1 tbody tr td:nth-child(5)').toggle();
				$('#example1 tfoot tr th:nth-child(5)').toggle();
			}else if (this.name == "Email") {
				$('#example1 thead tr th:nth-child(6)').toggle();
				$('#example1 tbody tr td:nth-child(6)').toggle();
				$('#example1 tfoot tr th:nth-child(6)').toggle();
			}else if (this.name == "Kelas") {
				$('#example1 thead tr th:nth-child(7)').toggle();
				$('#example1 tbody tr td:nth-child(7)').toggle();
				$('#example1 tfoot tr th:nth-child(7)').toggle();
			}else if (this.name == "Alamat") {
				$('#example1 thead tr th:nth-child(8)').toggle();
				$('#example1 tbody tr td:nth-child(8)').toggle();
				$('#example1 tfoot tr th:nth-child(8)').toggle();
			}else if (this.name == "Alasan") {
				$('#example1 thead tr th:nth-child(9)').toggle();
				$('#example1 tbody tr td:nth-child(9)').toggle();
				$('#example1 tfoot tr th:nth-child(9)').toggle();
			}
			
			this.classList.toggle("active");
			
		})
	}

  });

</script>
<?php 
  if (isset($_SESSION['rereg'])) {
    if ($_SESSION['rereg'] == 'valid') {
      echo "<script>";
      echo "$(function () { 
        toastr.success('Data Berhasil Dibatalkan registrasi Ulangnya'); 
      }); ";
      echo "</script>";
    }else{
      echo "<script>";
      echo "$(function () { 
        toastr.error('Data gagal Dibatalkan registrasi Ulangnya'); 
      }); ";
      echo "</script>";
    }
    unset($_SESSION['rereg']);    
  }

  if (isset($_SESSION['delete'])) {
    if ($_SESSION['delete'] == 'valid') {
      echo "<script>";
      echo "$(function () { 
        toastr.success('Data Berhasil Dihapus'); 
      }); ";
      echo "</script>";
    }else{
      echo "<script>";
      echo "$(function () { 
        toastr.error('Data gagal Dihapus'); 
      }); ";
      echo "</script>";
    }
    unset($_SESSION['delete']);    
  }

  if (isset($_SESSION['edit'])) {
    if ($_SESSION['edit'] == 'valid') {
      echo "<script>";
      echo "$(function () { 
        toastr.success('Data Berhasil Diedit'); 
      }); ";
      echo "</script>";
    }else{
      echo "<script>";
      echo "$(function () { 
        toastr.error('Data gagal Diedit'); 
      }); ";
      echo "</script>";
    }
    unset($_SESSION['edit']);    
  }

  if (isset($_SESSION['print'])) {
    if ($_SESSION['print'] == 'valid') {
      echo "<script>";
      echo "$(function () { 
        toastr.success('Data Berhasil Diprint'); 
      }); ";
      echo "</script>";
    }else{
      echo "<script>";
      echo "$(function () { 
        toastr.error('Data gagal Diprint'); 
      }); ";
      echo "</script>";
    }
    unset($_SESSION['print']);    
  }
 ?>