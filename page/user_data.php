<!DOCTYPE html>
<html>
<head>
<title></title>
</head>
<body>
	<div class="row">
	  <div class="col-xs-12 col-md-12">
	    <h3><span class="fa fa-users"></span>
		    Data User     
		    <?php
		      $qjumlah = mysqli_query($koneksi,"SELECT * FROM tb_user ");
		      $jumlah = mysqli_num_rows($qjumlah);
		    ?>
		    <button class="btn btn-sm btn-default"><span class="badge"><?php echo $jumlah; ?></span></button>
		    <a href="?menu=user_data" class="btn btn-primary"><span class="glyphicon glyphicon-refresh"></a>
			<!-- <a href="?menu=user_tambah" class="btn btn-success">Tambah User <span class="glyphicon glyphicon-plus-sign"></a> -->
		</h3>
	  </div>
	</div>

<!-- ////////////////////////////////////////////// -->
	<div class="box">
        <div class="box-body">
          	<table id="example1" class="table table-bordered table-striped">
	            <thead>
		            <tr>
		              <th>No</th>
		              <th>Nama</th>
		              <th>Email</th>
		              <th>Telepon</th>
		              <th>Akses</th>
		              <th>Username</th>
		              <!--<th>Password</th>-->
		              <th>NIP</th>
		              <th>NIK</th>
		              <th>Opsi</th>
		            </tr>
	            </thead>
	            <tbody>
					<?php
					    $no = 1;
					    $sql = $koneksi->query("select * from tb_user");
					    while ($data=$sql->fetch_assoc()) {
					?>
				    <tr>
				        <td> <?php echo $no++; ?> </td>
				        <td> <?php echo $data['user_nama']; ?></td>
				        <td> <?php echo $data['user_email']; ?></td>
				        <td> <?php echo $data['user_telp']; ?></td>
				        <td> <?php echo $data['user_akses']; ?></td>
				        <td> <?php echo $data['user_name']; ?></td>
				        <!--<td> <?php echo $data['password']; ?></td> -->
				        <td> <?php echo $data['user_nip']; ?></td>
				        <td> <?php echo $data['user_nik']; ?></td>
				        <td>
				        	<?php 
				        		if($data['user_id']==$profil['user_id']){ ?>
									<a href="?menu=profil_edit" class="btn btn-sm btn-primary" title="Edit dari profil <?php echo $data['user_nama'];?>">Edit dari profil</a>  
				          	<?php }
				         		elseif($data['user_akses']=='Super'){ }
						        else { ?>
									<a href="?menu=user_edit&user_id=<?php echo $data['user_id']; ?>" class="btn btn-sm btn-success" title="Edit <?php echo $data['user_nama'];?>">Edit</a>
									<a onclick="return confirm('Anda yakin menghapus data user <?php echo $data['user_nama']; ?> ?')" href="?menu=user_hapus&user_id=<?php echo $data['user_id']; ?>" class="btn btn-sm btn-danger" title="Hapus <?php echo $data['user_nama'];?>" >Hapus</a>
							<?php }?>
				        </td>
				    </tr>
	      			<?php 
	    				} 
					?>
	            </tbody>
        	</table>
    	</div>
	</div>
</body>
</html>          