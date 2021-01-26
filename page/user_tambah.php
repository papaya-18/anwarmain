<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
    <div class="row">
      <div class="col-xs-12 col-md-8">
        <h3><span class="fa fa-users"></span>
          Data User     
      </h3>
      </div>
    </div>
<section class="content">
      <div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title">Tambah Data User</h3>
        </div>
        <div class="box-body">
          <div class="row">
            <div class="col-md-9">
              <form method="POST">
                <div class="form-group">
                  <label>Nama</label>
                  <input class="form-control" name="nama" required="required"/>
                </div>
                <div class="form-group">
                  <label>Email</label>
                  <input class="form-control" name="email" required="required" type="email" />
                </div>
                <div class="form-group">
                  <label>Telepon</label>
                  <input class="form-control" name="telp" type="number" />
                </div>
                <div class="form-group">
                    <label>Akses</label><font color="red"> *user dengan akses Super hanya dapat dihapus oleh penggunanya sendiri melalui profil </font>
                    <select name="akses" class="form-control" required="required" >
                      <option <?php if ($data['Admin']=="Admin") { echo "selected"; } ?> class="form-control">Admin</option>
                      <option <?php if ($data['Super']=="Super")   { echo "selected"; } ?> class="form-control">Super</option>
                    </select> 
                </div>
                <div class="form-group">
                  <label>Username</label>
                  <input class="form-control" name="user" required="required"/>
                </div>
                <div class="form-group">
                  <label>Password</label>
                  <input class="form-control" name="pass" type="password" required="required"/>
                </div>
                <div class="form-group">
                  <label>Ketik Ulang Password</label>
                  <input class="form-control" name="pass2" type="password" required="required"/>
                </div>                
                <div class="form-group">
                  <label>NIP</label>
                  <input class="form-control" name="nip" type="number" />
                </div>
                <div class="form-group">
                  <label>NIK</label>
                  <input class="form-control" name="nik" type="number" />
                </div>
                <input name="fsimpan" type="submit"  class="btn btn-primary" value="Simpan">
                <a class="btn btn-danger" href="?menu=data_admin">Batal</a>
              </form>
              <?php 
                if (isset($_POST['fsimpan'])) {
                  $nama = $_POST['nama'];
                  $email = $_POST['email'];
                  $telp = $_POST['telp'];
                  $akses = $_POST['akses'];
                  $user = $_POST['user'];
                  $pass = md5($_POST['pass']);
                  $pass2 = md5($_POST['pass2']);
                  $nip = $_POST['nip'];
                  $nik = $_POST['nik'];
////////////////////////////////////////////////////////// user ganda
                  $sqlx = $koneksi->query("select * from tb_user");
                  while ($datax=$sqlx->fetch_assoc()) {
                    if($user==$datax['username']){
                      ?>
                      <script type="text/javascript">
                          alert('Username yang dipilih sudah ada, silahkan coba lagi');
                          document.location.href="?menu=tambah_admin";
                      </script>
                      <?php newExit();
                    }
                  }
////////////////////////////////////////////////////////// pass konfirmasi salah
                    if($pass!=$pass2){
                      ?>
                      <script type="text/javascript">
                          alert('Password konfirmasi salah, silahkan coba lagi');
                          document.location.href="?menu=tambah_admin";
                      </script>
                      <?php newExit();
                    }else{
//////////////////////////////////////////////////////////
                      
                  $q ="INSERT INTO tb_user(user_nama, user_email, user_telp, user_akses, user_name, user_pass, user_nip, user_nik) VALUES ('$nama', '$email', '$telp', '$akses', '$user', '$pass', '$nip','$nik') ";

                  mysqli_query($koneksi,$q);
                ?>
                <script type="text/javascript">
                  alert('Berhasil menambah user');
                  document.location.href="?menu=user_data";
                </script>
              <?php }} ?>
            </div>
          </div>
        </div>
      </div>
</section>

