<!DOCTYPE html>
<html>
<head>
<title></title>
</head>
<body>
  	<div class="row">
	  <div class="col-xs-12 col-md-12">
	    <h3><span class="fa fa-database"></span>
		    Data Pegawai
		    <?php
		      $qjumlah = mysqli_query($koneksi,"SELECT * FROM tb_peg ");
		      $jumlah = mysqli_num_rows($qjumlah);
		    ?>
		    <button class="btn btn-sm btn-default"><span class="badge"><?php echo $jumlah; ?></span></button>
		    <a href="?menu=peg_data" class="btn btn-primary"><span class="glyphicon glyphicon-refresh"></a>
		    <!-- <a href="?menu=peg_tambah" class="btn btn-success">Tambah Pegawai <span class="glyphicon glyphicon-plus-sign"></a>   -->
		    <a onclick="return confirm('Anda yakin menghapus semua data industri rumahan ?')" href="?menu=peg_hapus_semua" class="btn btn-danger">Hapus Semua Data <span class="glyphicon glyphicon-trash"></a>
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
						<th>Nama Pegawai</th>
						<th>Jenis Kelamin</th>
						<th>Tanggal Lahir</th>
						<th>NIP</th>
						<th>NIK</th>
						<th>Status Pegawai</th>
						<th>Organisasi</th>
						<th>Org. Unit</th>
						<th>Opsi</th>
		            </tr>
	            </thead>
	            <tbody>
					<?php
					    $no = 1;
					    $sql = $koneksi->query("SELECT * FROM tb_peg");
					    while ($data=$sql->fetch_assoc()) {
					?>
				    <tr>
				        <td> <?php echo $no++; ?> </td>
				        <td> <?php echo $data['peg_nama']; ?></td>
				        <td> <?php echo $data['peg_jk']; ?></td>
				        <td> <?php echo $data['peg_tgllahir']; ?></td>
				        <td> <?php echo $data['peg_nip']; ?></td>
				        <td> <?php echo $data['peg_nik']; ?></td>
				        <td> <?php echo $data['peg_stapeg']; ?></td>
				        <td> <?php echo $data['peg_org']; ?></td>
				        <td> <?php echo $data['peg_orgunit']; ?></td>
				        <!-- 				        -->
				        <td>
							<a href="?menu=peg_edit&peg_id=<?php echo $data['peg_id']; ?>" class="btn btn-xs btn-success" title="Edit <?php echo $data['peg_nama'];?>">Edit</a>
							<a onclick="return confirm('Anda yakin menghapus data pegawai <?php echo $data['peg_nama']; ?> ?')" href="?menu=peg_hapus&peg_id=<?php echo $data['peg_id']; ?>" class="btn btn-xs btn-danger" title="Hapus <?php echo $data['peg_nama'];?>" >Hapus</a>
							<br>

							<a href="?menu=kon_data&peg_id=<?php echo $data['peg_id']; ?>" class="btn btn-xs btn-primary" title="Kondisi <?php echo $data['peg_nama'];?>">Kondisi</a>
							<a href="?menu=kel_identitas&peg_id=<?php echo $data['peg_id']; ?>" class="btn btn-xs btn-primary" title="Keluarga <?php echo $data['peg_nama'];?>">Keluarga</a>
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