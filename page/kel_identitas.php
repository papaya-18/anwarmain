<?php
  $peg_id = $_GET['peg_id'];
  $queryx  = mysqli_query($koneksi,"SELECT * FROM tb_peg WHERE peg_id='$peg_id'");
  $datax   = mysqli_fetch_array($queryx);
  $peg_idx	= $datax['peg_id'];
?>


<!DOCTYPE html>
<html>
<head>
<title></title>
</head>
<body>
  	<div class="row">
	  <div class="col-xs-12 col-md-12">
	    <h3><span class="fa fa-database"></span>
		    Data Keluarga Covid
		    <?php
		      $qjumlah = mysqli_query($koneksi,"SELECT DISTINCT kel_peg_nik, kel_nik FROM tb_kel WHERE kel_peg_id='$peg_idx' ");
		      $jumlah = mysqli_num_rows($qjumlah);
		    ?>
		    <button class="btn btn-sm btn-default"><span class="badge"><?php echo $jumlah; ?></span></button>
		</h3>
	  </div>
	</div>

    <div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title">Informasi Pegawai</h3>
        </div>
        <div class="box-body">
         	<div class="row">
	            <div class="col-md-9">
	            	<div class="col-md-8">
						<div class="panel-body">
							<table class="table" cellpadding="8" cellspacing="8">
								<tr><th>Nama Pegawai</th><td>:</td> <td><?php echo $datax['peg_nama']; ?></td></tr>
								<tr><th>Jenis Kelamin </th><td>:</td> <td><?php echo $datax['peg_jk']; ?></td></tr>
								<tr><th>Tanggal Lahir </th><td>:</td> <td><?php echo $datax['peg_tgllahir']; ?></td></tr>	
								<tr><th>NIK </th><td>:</td> <td><?php echo $datax['peg_nik']; ?></td></tr>	
								<tr><th>NIP </th><td>:</td> <td><?php echo $datax['peg_nip']; ?></td></tr>	
								<tr><th>Status Pegawai </th><td>:</td> <td><?php echo $datax['peg_stapeg']; ?></td>
								<tr><th>Organisasi </th><td>:</td> <td><?php echo $datax['peg_org']; ?></td>
								<tr><th>Org. Unit </th><td>:</td> <td><?php echo $datax['peg_orgunit']; ?></td>
								</tr>														
							</table>
						</div>
					</div>
				</div>
			</div>
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
						<th>NIP Pegawai</th>						
						<th>NIK Pegawai</th>
						<th>Nama Keluarga</th>
						<th>Jenis Kelamin Keluarga</th>
						<th>Hubungan Keluarga</th>
						<th>Tanggal Lahir Keluarga</th>
						<th>NIK Keluarga</th>
						<th>Opsi</th>
		            </tr>
	            </thead>
	            <tbody>
					<?php
					    $no = 1;
					    $sql = $koneksi->query("SELECT DISTINCT kel_peg_nama, kel_peg_nip, kel_peg_nik, kel_nama, kel_jk, kel_hubungan, kel_tgllahir, kel_nik, kel_nama FROM tb_kel WHERE kel_peg_id='$peg_idx' ");
					    while ($data=$sql->fetch_assoc()) {
					?>
				    <tr>
				        <td> <?php echo $no++; ?> </td>
				        <td> <?php echo $data['kel_peg_nama']; ?></td>
				        <td> <?php echo $data['kel_peg_nip']; ?></td>
				        <td> <?php echo $data['kel_peg_nik']; ?></td>
				        <td> <?php echo $data['kel_nama']; ?></td>
				        <td> <?php echo $data['kel_jk']; ?></td>
				        <td> <?php echo $data['kel_hubungan']; ?></td>
				        <td> <?php echo $data['kel_tgllahir']; ?></td>
				        <td> <?php echo $data['kel_nik']; ?></td>
				        <!--
				        -->
				        <td>
							<a href="?menu=kel_identitas_edit&kel_nik=<?php echo $data['kel_nik']; ?>" class="btn btn-sm btn-success" title="Edit <?php echo $data['kel_nama'];?>">Edit</a>

							<a onclick="return confirm('Anda yakin menghapus data Keluarga Covid <?php echo $data['kel_nama']; ?> ?')" href="?menu=kel_hapus&kel_id=<?php echo $data['kel_id']; ?>" class="btn btn-sm btn-danger" title="Hapus <?php echo $data['kel_nama'];?>" >Hapus</a>
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