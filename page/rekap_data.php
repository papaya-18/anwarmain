<!DOCTYPE html>
<html>
<head>
<title></title>
</head>
<body>
    <div class="row">
    <div class="col-xs-12 col-md-12">
      <h3><span class="fa fa-database"></span>
        Data Rekap Bulanan
        <?php
          $qjumlah = mysqli_query($koneksi,"SELECT * FROM tb_rekap ");
          $jumlah = mysqli_num_rows($qjumlah);
        ?>
        <button class="btn btn-sm btn-default"><span class="badge"><?php echo $jumlah; ?></span></button>
        <a href="?menu=rekap_data_refresh" class="btn btn-sm btn-primary"><span class="glyphicon glyphicon-refresh"></a>
        <!-- <a href="?menu=peg_tambah" class="btn btn-success">Tambah Pegawai <span class="glyphicon glyphicon-plus-sign"></a>        
        <a onclick="return confirm('Anda yakin menghapus semua data industri rumahan ?')" href="?menu=peg_hapus_semua" class="btn btn-danger">Hapus Semua Data <span class="glyphicon glyphicon-trash"></a>-->
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
            <th>Tahun</th>
            <th>Bulan</th>
            <th>Peg. Isman</th>
            <th>Peg. Rujuk</th>
            <th>Peg. Sembuh</th>
            <th>Peg. Mening.</th>
            <th>Peg. Jml</th>
            <th>Kel. Isman</th>
            <th>Kel. Rujuk</th>
            <th>Kel. Sembuh</th>
            <th>Kel. Mening.</th>
            <th>Kel. Jml</th>
            <th>Tot</th>
            <th>Opsi</th>
                </tr>
              </thead>
              <tbody>
          <?php
              $no = 1;
              $sql = $koneksi->query("SELECT * FROM tb_rekap ORDER BY rekap_tahun DESC");
              while ($data=$sql->fetch_assoc()) {
          ?>
            <tr>
                <td> <?php echo $no++; ?> </td>
                <td> <?php echo $data['rekap_tahun']; ?></td>
                <td> <?php echo $data['rekap_bulan']; ?></td>
                <td> <?php echo $data['rekap_konisman']; ?></td>
                <td> <?php echo $data['rekap_konrujuk']; ?></td>
                <td> <?php echo $data['rekap_konsembuh']; ?></td>
                <td> <?php echo $data['rekap_konmeninggal']; ?></td>
                <td> <?php echo $data['rekap_konjumlah']; ?></td>
                <td> <?php echo $data['rekap_kelisman']; ?></td>
                <td> <?php echo $data['rekap_kelrujuk']; ?></td>
                <td> <?php echo $data['rekap_kelsembuh']; ?></td>
                <td> <?php echo $data['rekap_kelmeninggal']; ?></td>
                <td> <?php echo $data['rekap_keljumlah']; ?></td>
                <td> <?php echo $data['rekap_total']; ?></td>
                <!--             -->
                <td>
                  <a href="?menu=rekap_detail&rekap_id=<?php echo $data['rekap_id']; ?>" class="btn btn-xs btn-primary" title="Rekap <?php echo $data['rekap_bulan']." ".$data['rekap_tahun'];?>">Detail Pegawai</a>
                  <a href="?menu=rekap_detail_kel&rekap_id=<?php echo $data['rekap_id']; ?>" class="btn btn-xs btn-primary" title="Rekap <?php echo $data['rekap_bulan']." ".$data['rekap_tahun'];?>">Detail Keluarga</a>
                  <!-- <a href="?menu=peg_edit&peg_id=<?php echo $data['peg_id']; ?>" class="btn btn-xs btn-success" title="Edit <?php echo $data['peg_nama'];?>">Edit</a>
                  <a onclick="return confirm('Anda yakin menghapus data pegawai <?php echo $data['peg_nama']; ?> ?')" href="?menu=peg_hapus&peg_id=<?php echo $data['peg_id']; ?>" class="btn btn-xs btn-danger" title="Hapus <?php echo $data['peg_nama'];?>" >Hapus</a> -->              
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