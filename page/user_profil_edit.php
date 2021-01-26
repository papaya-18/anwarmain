<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<div class="row">
	  <div class="col-xs-12 col-md-8">
	    <h3><span class="fa fa-user"></span>
		    Profile     
		</h3>
	  </div>
	</div>
	<div class="row">
		<section class="content">

			<!-- Profil	-->	
		    <div class="box box-default">
		        <div class="box-header with-border">
		          <h3 class="box-title">Edit Informasi Profile</h3>
		        </div>
		        <div class="box-body">
		         	<div class="row">
			            <div class="col-md-9">
			            	<div class="col-md-8">
					
								<form method="post">
									<div class="form-group">
									    <label>Nama</label>
									    <input type="text" name="user_nama"  class="form-control" value="<?php echo $profil['user_nama']; ?>">
									</div>
									<div class="form-group">
									    <label>Email</label>
									    <input type="text" name="user_email" class="form-control" value="<?php echo $profil['user_email']; ?>">
									</div>
									<div class="form-group">
									    <label>Telepon</label>
									    <input type="text" name="user_telp" class="form-control" value="<?php echo $profil['user_telp']; ?>">
									</div>
									<div class="form-group">
									    <label>NIP</label>
									    <input type="text" name="user_nip"  class="form-control" value="<?php echo $profil['user_nip']; ?>">
									</div>
									<div class="form-group">
									    <label>NIK</label>
									    <input type="text" name="user_nik"  class="form-control" value="<?php echo $profil['user_nik']; ?>">
									</div>
						  			<input type="submit" name="user_profil_edit" class="btn btn-primary" value="Simpan">
										<a class="btn btn-danger" href="?menu=user_profil">Batal</a>
								</form>
								<?php 
									if (isset($_POST['user_profil_edit'])) {
										$user_nama 	= $_POST['user_nama'];
										$user_email = $_POST['user_email'];
										$user_telp 	= $_POST['user_telp'];
										$user_nip 	= $_POST['user_nip'];
										$user_nik 	= $_POST['user_nik'];
										mysqli_query($koneksi,"UPDATE tb_user SET user_nama='$user_nama', user_email='$user_email', user_telp='$user_telp' , user_nip='$user_nip' , user_nik='$user_nik' WHERE user_id='$profil[user_id]'");
										?>
										<script type="text/javascript">
											alert('Profil berhasil dirubah');
											document.location.href="?menu=user_profil";
										</script>
										<?php
									}
								 ?>						
							</div>
			            </div>
		        	</div>
		        </div>
		    </div>
<div class="col-xs-6">
			<!-- username	-->
		    <div class="box box-default">
		        <div class="box-header with-border">
		          	<h3 class="box-title">Edit Username</h3>
		        </div>
		        <div class="box-body">
		         	<div class="row">
			            <div class="col-md-9">
			            	<div class="col-md-8">
								<form class="form" method="post">
									<div class="form-group">
										<label>User lama</label>
									    <input type="text" readonly class="form-control" value="<?php echo $profil['user_name']; ?>" aria-describedy="basic-addon1">
									</div>							
									<div class="form-group">
										<label>User baru</label>
										<input type="text" name="user_name_baru" class="form-control" placeholder="User baru" aria-describedy="basic-addon1">
									</div>							
									<div class="form-group">
										<label>Password anda</label>
										<input type="password" name="user_pass" class="form-control" placeholder="Password anda" aria-describedy="basic-addon1">
									</div>							
										<input type="submit" name="user_username" value="Simpan" class="btn btn-primary">
										<a class="btn btn-danger" href="?menu=user_profil">
										Batal</a>							
								</form>
								<?php 
									if (isset($_POST['user_username'])) {
										$user_baru = $_POST['user_name_baru'];
										$user_pass = $_POST['user_pass'];
										//$tabel="admin";
										//include "_nama_sama.php";
										if (md5($user_pass)==$profil['user_pass']){
											mysqli_query($koneksi,"UPDATE tb_user SET user_name='$user_baru' WHERE user_id='$profil[user_id]' ");
											?>
											<script type="text/javascript">
												alert('User name berhasil diganti');
												document.location.href="?menu=user_profil";
											</script>
											<?php
										}
										else {
											?>
											<script type="text/javascript">
												alert('Password salah, silahkan coba lagi');
											</script>
											<?php
										}
									}
								?>
							</div>
			            </div>
		        	</div>
		        </div>
		    </div>
</div>
<div class="col-xs-6">
			<!-- password	-->
		    <div class="box box-default">
		        <div class="box-header with-border">
		          <h3 class="box-title">Edit Password </h3>
		        </div>
		        <div class="box-body">
		         	<div class="row">
			            <div class="col-md-9">
			            	<div class="col-md-8">
								<form class="form" method="post">
									<div class="form-group">
											<label>Password baru</label>
										<input type="password" name="pass1" class="form-control" placeholder="password baru" aria-describedy="basic-addon1">
									</div>							
									<div class="form-group">
											<label>Ketik ulang password</label>
										<input type="password" name="pass2" class="form-control" placeholder="ketikan ulang password" aria-describedy="basic-addon1">
									</div>							
									<div class="form-group">
											<label>Password lama</label>
										<input type="password" name="pass_awal" class="form-control" placeholder="Password lama" aria-describedy="basic-addon1">
									</div>							
										<input type="submit" name="edit_password" value="Simpan" class="btn btn-primary">
										<a class="btn btn-danger" href="?menu=user_profil">
										Batal</a>
								</form>
								<?php 
									if (isset($_POST['edit_password'])) {
										$pass1 = md5($_POST['pass1']);
										$pass2 = md5($_POST['pass2']);
										$pass = $_POST['pass_awal'];
										if ($pass1 != $pass2){
											?>
											<script type="text/javascript">
												alert('Password konfirmasi salah, silahkan coba lagi');
											</script>
											<?php
										}
										else {
											if(md5($pass)==$profil['user_pass']){
											mysqli_query($koneksi,"UPDATE tb_user SET user_pass='$pass1' WHERE user_id='$profil[user_id]' ");
											?>
											<script type="text/javascript">
												alert('Password berhasil diganti. Silahkan login kembali');
												document.location.href="../inc/keluar.php";
											</script>
											<?php
											}
											else {
											?>
											<script type="text/javascript">
												alert('Password lama salah, silahkan coba lagi');
											</script>
											<?php
											}
										}
									}
								 ?>						
							</div>
						</div>
		            </div>
		    	</div>
		    </div>
</div>
		</section>
	</div>
</body>
</html>