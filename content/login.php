<?php $key = "ctrlsan"; ?>
<?php if($_SESSION['LEVEL'] == 'Admin' || $_SESSION['LEVEL'] == 'User'){
    // header('Location: index.php?page='.base64_encrypt('home', $key));
  ?>
  <meta http-equiv="refresh" content="0;URL='index.php?page=<?php  echo base64_encrypt('home', $key) ?>" />
  <?php
} ?>
    
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-12">
            <!-- <div class="invoice p-3 mb-3"> -->
              <div  class="invoice login-page p-3 mb-3">
               <div class="login-box">
                <div class="login-logo">
                  <a href="?page=<?php echo base64_encrypt('company',$key)?>">Login <b>NDC</b></a>
                </div>
                <!-- /.login-logo -->
                <div class="card">
                  <div class="card-body login-card-body">
                    <!-- <p class="login-box-msg">Login Admin</p> -->

                    <form method="post" id="quickForm">
                      <div class="card-body">
                        <div class="input-group mb-3">
                          <input type="email" name="email" id="emailInput" class="form-control"  placeholder="Enter email">
                          <div class="input-group-append">
                            <div class="input-group-text">
                              <span class="fas fa-envelope"></span>
                            </div>
                          </div>
                        </div>
                        <div class="input-group mb-3">
                          <input type="password" name="password" id="passwordInput" class="form-control"  placeholder="Password">
                          <div class="input-group-append">
                            <div class="input-group-text">
                              <span class="fas fa-lock"></span>
                            </div>
                          </div>
                        </div>
                        <div class="input-group mb-3">
                          <input type="text" name="committe" id="committe" class="form-control"  placeholder="Name Committe">
                          <div class="input-group-append">
                            <div class="input-group-text">
                              <span class="fas fa-user"></span>
                            </div>
                          </div>
                        </div>
                         <?php if (isset($_GET['login'])) { ?>
                          <div class="alert alert-danger alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <h6><i class="icon fas fa-ban"></i> Alert!</h6>
                            Email dan Password Salah !!
                          </div>
                          
                        <?php }
                            if (!isset($_SESSION['LEVEL'])) {
                         ?>
                         <div class="alert alert-danger alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <h6><i class="icon fas fa-ban"></i> Alert!</h6>
                            Anda Harus Login Dulu !!
                          </div>
                        <?php } ?>
                        <div class="input-group mb-3">
                            <button type="submit" class="btn btn-primary btn-block swalDefaultSuccess">Login</button>
                        </div>
                      </div>
                    </form>

                    
                    <!-- /.social-auth-links -->

                  </div>
                  <!-- /.login-card-body -->
                </div>
              </div>
              <!-- /.login-box -->
<!-- </div> -->

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

  $.validator.setDefaults({
    submitHandler: function () {
      var em = $('#emailInput').val();
      var pas = $('#passwordInput').val();
      var com = $('#committe').val();
      // alert(com);
      window.location = "config/loginCondition.php?e="+em+"&p="+pas+"&c="+com;
      // alert( "Form successful successfulbmitted!" );
    }
  });
  $('#quickForm').validate({
    rules: {
      email: {
        required: true,
        email: true,
      },
      password: {
        required: true,
        minlength: 3
      },
      committe: {
        required: true
      },
    },
    messages: {
      email: {
        required: "Please enter a email address",
        email: "Please enter a vaild email address"
      },
      password: {
        required: "Please provide a password",
        minlength: "Your password must be at least 3 characters long"
      },
      committe: {
        required: "Enter the name of the committee"
      }
    },
    errorElement: 'span',
    errorPlacement: function (error, element) {
      error.addClass('invalid-feedback');
      element.closest('.input-group').append(error);
    },
    highlight: function (element, errorClass, validClass) {
      $(element).addClass('is-invalid');
    },
    unhighlight: function (element, errorClass, validClass) {
      $(element).removeClass('is-invalid');
      $(element).addClass('is-valid');
      
    }
  });



});
</script>
