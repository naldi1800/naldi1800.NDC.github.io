 
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
       
        <div class="row">
          <div class="col-12">
            <div class="invoice p-3 mb-3">
              <!-- Content -->
            <h1 class="text-bold text-black">Edit Data Peserta</h1>
            <hr style="border: 1px solid lime;"  >
            <div class="text-black text-capitalize"><?php echo $_SESSION['slogan'] ?></div>
            <hr style="border-top: 1px dashed lime;"  width="100%" >
              <!-- Content -->
              <?php 
                if (!isset($_GET['id']) || $_GET['id'] == "") {
                  $_SESSION['rereg'] = "invalid";
                  header('Location: ../index.php?page='.base64_encrypt('dataTerinput', $key));
                }
                
                $id = base64_decrypt($_GET['id'],$key);
                $sql = "SELECT * FROM peserta WHERE id='$id'";
                $query = mysqli_query($link, $sql);
                while ($row = mysqli_fetch_array($query)) {
               ?>
              <form id="addUserForm">
                  <input type="text" value="<?= base64_encrypt($row['id'], $key) ?>" class="form-control" name="idUser" id="idUser" hidden>
                  <input type="text" value="<?= $_GET['c'] ?>" class="form-control" name="page" id="page" hidden>
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputSTB1">STB</label>
                    <input type="text" value="<?= $row['STB'] ?>" class="form-control" name="stb" onkeypress="return /[0-9]/i.test(event.key)" id="exampleInputSTB1"  placeholder="Enter STB">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputNama1">Nama Lengkap</label>
                    <input type="text" value="<?= $row['Nama'] ?>" class="form-control" name="nama" onkeypress="return /^[a-zA-Z \s]+$/i.test(event.key)" id="exampleInputNama1" placeholder="Enter Nama">
                  </div>

                  <div class="form-group">
                    <label for="exampleInputJkl1" >Jenis Kelamin</label>
                    <div class="custom-control custom-radio">
                      <input class="custom-control-input custom-control-input-info custom-control-input-outline" type="radio"  name="jkl" value="Laki Laki" id="lakilaki" <?= ($row['jkl'] == 'L')? "checked" : ""; ?>>
                      <label for="lakilaki" class="custom-control-label" >Laki Laki</label>
                      <br>
                    </div>
                    <div class="custom-control custom-radio">
                      <input class="custom-control-input custom-control-input-info custom-control-input-outline" type="radio"  name="jkl" value="Perempuan" id="perempuan"  <?= ($row['jkl'] == 'P')? "checked" : ""; ?>>
                      <label for="perempuan" class="custom-control-label">Perempuan</label>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputAlamat1">Alamat Makassar</label>
                    <textarea row="3" class="form-control" name="alamat" id="exampleInputAlamat1" placeholder="Masukan Alamat Makassar"><?= $row['Alamat'] ?></textarea>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputNoWA1">Nomor WA</label>
                    <input type="text" value="<?= $row['NoWA'] ?>" class="form-control" name="nWA" id="exampleInputNoWA1" placeholder="Masukan No WhatsApp" data-inputmask='"mask": "+62 999 9999 9999"' data-mask>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Email</label>
                    <input type="email" value="<?= $row['email'] ?>" class="form-control" name="email" id="exampleInputEmail1" placeholder="Masukan Email">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputKelas1">Kelas</label>
                    <input type="text" value="<?= $row['Kelas'] ?>" class="form-control" name="kelas" id="exampleInputKelas1" placeholder="Masukan Kelas">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputalasan1">Alasan Masuk NDC</label>
                    <textarea row="3" class="form-control" name="alasan" id="exampleInputalasan1" placeholder="Masukan Alasan Masuk NDC"><?= $row['Alasan'] ?></textarea>
                  </div>
                <!-- /.card-body -->

                <!-- <div class="card-footer"> -->
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            <?php } ?>
            </div>
          </div>
          <!-- ./col -->
        </div>
      </div>
    </section>

<script src="https://code.jquery.com/jquery-3.5.0.js"></script>
<script type="text/javascript">
$(function () {

  var x = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000
  });
  
  $('[data-mask]').inputmask()

  $.validator.setDefaults({
    submitHandler: function () {
      var stb = $('#exampleInputSTB1').val();
      var Nama = $('#exampleInputNama1').val();
      var Jkl = $("input[name='jkl']:checked").val();
      var NoWA = $('#exampleInputNoWA1').val();
      var Email = $('#exampleInputEmail1').val();
      var Kelas = $('#exampleInputKelas1').val();
      var alasan = $('#exampleInputalasan1').val();
      var alamat = $('#exampleInputAlamat1').val();
      var id = $('#idUser').val();
      var page = $('#page').val();
      var temp = [id, stb, Nama, Jkl, alamat, Kelas, NoWA, Email, alasan];
      var saveData = "";
      for (var i = 0; i < temp.length; i++) {
        saveData += temp[i];
        if (i != temp.length - 1) {
          saveData += ",";
        }
      }
      window.location = "config/editUserInput.php?save="+saveData+"&page="+page;
    }
  });
  $('#addUserForm').validate({
    rules: {
      stb: {
        required: true,
        minlength: 6,
        maxlength: 6
      },
      nama: {
        required: true,
        minlength: 3

      },
      nWA:{
        required: true,
        minlength: 3
      },
      email:{
        required: true,
        email: true
      },
      kelas: {
        required: true
      },
      alasan: {
        required: true,
        minlength:10
      },
      alamat: {
        required: true
      }
    },
    messages: {
      stb: {
        required:  "Harap menginput STB Anda.",
        minlength: "Harap masukkan STB Anda minimal 6 karakter.",
        maxlength: "Harap masukkan STB Anda tidak lebih dari 6 karakter."
      },
      nama: {
        required: "Harap menginput Nama Anda.",
        minlength: "Harap masukkan Nama setidaknya 3 karakter."
      },
      nWA: {
        required: "Harap menginput No WhatsApp And.a",
      },
      email: {
        required: "Harap menginput Email Anda.",
        email: "Email tidak sah (someone@example.xx)."
      },
      kelas: {
        required: "Harap menginput Kelas Anda."
      },
      alasan: {
        required: "Harap menginput Alasan Anda Masuk NDC.",
        minlength: "Harap masukkan Nama setidaknya 10 karakter."
      },
      alamat: {
        required: "Harap menginput alamat Makassar anda.",
      }
    },
    errorElement: 'span',
    errorPlacement: function (error, element) {
      error.addClass('invalid-feedback');
      element.closest('.form-group').append(error);

    },
    highlight: function (element, errorClass, validClass) {
      $(element).addClass('is-invalid');
      $(element).removeClass('is-valid');
    },
    unhighlight: function (element, errorClass, validClass) {
      $(element).removeClass('is-invalid');
      $(element).addClass('is-valid');
    }
  });



});
</script>
