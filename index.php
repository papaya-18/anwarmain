<?php
  include "inc/koneksi.php";
  session_start();
  if(@$_SESSION['userweb'] != ""){
    if($_SESSION['level']="Super"){
      header('location:page/index.php');
    }
    else if($_SESSION['userweb']="Admin"){
      header('location:page/index.php');  
    }
  }
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Login | Rekap Pegawai Covid</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="lte/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="lte/dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="lte/plugins/iCheck/square/blue.css">
  <link rel="icon" href="lte/favcon/favicon2.ico">

</head>
  <div class="login-logo">
    <br><br>
    <a ><b>Rekapan Pegawai dan Keluarga Covid</b><br>
    Kementrian Kesehatan</a>
  </div>
<body class="hold-transition login-page">
<div class="login-box">

  <div class="login-box-body">
    <p class="login-box-msg">Login untuk melanjutkan</p>

    <form role="form" action="" method="post" class="login-form">
      <div class="form-group has-feedback">
        <input type="text" class="form-control" placeholder="Username"
        name="user">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="Password"
        name="pass">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-8"></div>
        <div class="col-xs-4">
          <button name="flogin" type="submit"  value="Login" class="btn btn-primary btn-block btn-flat">Login</button>
        </div>
      </div>
    </form>
    <?php
  if(isset($_POST['flogin'])){
    $user = $_POST['user'];
    $pass = $_POST['pass'];
    $qlogin = mysqli_query($koneksi,"SELECT * FROM tb_user WHERE user_name ='$user' AND user_pass=md5('$pass')");
    $cek = mysqli_num_rows($qlogin);
    $data = mysqli_fetch_array($qlogin);
    if($cek < 1){
      ?>
      <br>
        <div class="alert alert-danger">
          Username atau password salah !
        </div>
      <?php
    }
    else {
        $_SESSION['userweb']=$data['user_id'];
        if ($data['user_akses']=="Super") {
          $_SESSION['level']="Super";
          header('location:page/index.php');
        }
        else if ($data['user_akses']=="Admin") {
          $_SESSION['level']="Admin";
          header('location:page/index.php');
        }
    }
  }
?>

  </div>

  <div class="description">
    <p><center>
      <br><br><br><br><br>
      <strong><a href="">Pegcov1</a> &copy; 2021 </center> 
    </p>
  </div>
</div>

<script src="lte/plugins/jQuery/jquery-2.2.3.min.js"></script>
<script src="lte/bootstrap/js/bootstrap.min.js"></script>
<script src="lte/plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });
</script>
</body>
</html>
