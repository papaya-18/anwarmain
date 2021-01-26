<?php
  $rekap_id = $_GET['rekap_id'];
  $query1  = mysqli_query($koneksi,"SELECT * FROM tb_rekap WHERE rekap_id='$rekap_id'");
  $data1   = mysqli_fetch_array($query1);

  $rekap_tahun = $data1['rekap_tahun'];
  $rekap_bulan0 = $data1['rekap_bulan'];
  $rekap_bulan  = date('m',strtotime($rekap_bulan0));


  $rekap_konisman   = $data1['rekap_konisman'];
  $rekap_konrujuk   = $data1['rekap_konrujuk'];
  $rekap_konsembuh  = $data1['rekap_konsembuh'];
  $rekap_konmeninggal  = $data1['rekap_konmeninggal']; 

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
        Detail Rekap Pegawai Covid Bulan <?php echo $rekap_bulan0; ?> Tahun <?php echo $rekap_tahun; ?>
        <?php
          $qjumlah = mysqli_query($koneksi,"SELECT * FROM tb_kon WHERE YEAR(kon_tgl)='$rekap_tahun'  AND  MONTH(kon_tgl)='$rekap_bulan' ORDER BY kon_id DESC");
          $jumlah = mysqli_num_rows($qjumlah);
        ?>
        <button class="btn btn-sm btn-default"><span class="badge"><?php echo $jumlah; ?></span></button>
        <a href="?menu=kon_data" class="btn btn-primary"><span class="glyphicon glyphicon-refresh"></a>
          <!--
        <a href="?menu=kon_tambah" class="btn btn-success">Tambah Kondisi <span class="glyphicon glyphicon-plus-sign"></a>
        -->
        <a onclick="return confirm('Anda yakin menghapus semua data industri rumahan ?')" href="?menu=kon_hapus_semua" class="btn btn-danger">Hapus Semua Data <span class="glyphicon glyphicon-trash"></a>
    </h3>
    </div>
  </div>

<!-- ////////////////////////////////////////////// -->

  <div class="row">
  <?php     
    $dataPoints = array( 

//$sql3 = $koneksi->query("SELECT * FROM tb_kel ORDER BY kel_id DESC");
//while ($data3=$sql3->fetch_assoc()) {           
//} 
      array("label"=>"Isman", "symbol" => "Isman","y"=>$rekap_konisman),
      array("label"=>"Rujuk", "symbol" => "Rujuk","y"=>$rekap_konrujuk),
      array("label"=>"Sembuh", "symbol" => "Sembuh","y"=>$rekap_konsembuh),
      array("label"=>"Menginggal", "symbol" => "Menginggal","y"=>$rekap_konmeninggal),  



    )
  ?>
    <script>
      window.onload = function() {
      var chart = new CanvasJS.Chart("chartContainer", {
        theme: "light2",
        animationEnabled: true,
        //title: { // text: "Average Composition of Magma" //},
        data: [{
          type: "doughnut",
          indexLabel: "{symbol} - {y}",
          yValueFormatString: "#,##0.00\"%\"",
          showInLegend: true,
          legendText: "{label} : {y}",
          dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
        }]
      });
      chart.render();       
      }
    </script>
    <div id="chartContainer" style="height: 370px; width: 100%;"></div>
    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
</div>










  <div class="box">

      <div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title">Edit Data Kondisi Pegawai Covid</h3>
        </div>
        <div class="box-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
            <th>No</th>
            <th>Nama Pegawai Covid</th>
            <th>Jenis Kelamin</th>
            <th>Tanggal Lahir</th>
            <th>NIP</th>
            <th>NIK</th>
            <th>Tanggal Swab</th>
            <th>Kondisi</th>
            <th>Keterangan</th>
            <th>Tanggal Kondisi</th>
            <!--<th>Opsi</th>-->
                </tr>
              </thead>
              <tbody>
          <?php
              $no = 1;
              $sql = $koneksi->query("SELECT * FROM tb_kon WHERE YEAR(kon_tgl)='$rekap_tahun' AND  MONTH(kon_tgl)='$rekap_bulan' ORDER BY kon_id DESC");
              while ($data=$sql->fetch_assoc()) {
          ?>
            <tr>
                <td> <?php echo $no++; ?> </td>
                <td> <?php echo $data['kon_peg_nama']; ?></td>
                <td> <?php echo $data['kon_peg_jk']; ?></td>
                <td> <?php echo $data['kon_peg_tgllahir']; ?></td>
                <td> <?php echo $data['kon_peg_nip']; ?></td>
                <td> <?php echo $data['kon_peg_nik']; ?></td>
                <td> <?php echo $data['kon_tglswab']; ?></td>
                <td> <?php echo $data['kon_kondisi']; ?></td>
                <td> <?php echo $data['kon_ket']; ?></td>
                <td> <?php echo $data['kon_tgl']; ?></td>
                <!--
                <td>
              <a href="?menu=kon_edit&kon_id=<?php echo $data['kon_id']; ?>" class="btn btn-sm btn-success" title="Edit <?php echo $data['kon_peg_nama'];?>">Edit</a>

              <a onclick="return confirm('Anda yakin menghapus data kondisi pegawai covid <?php echo $data['kon_nama']; ?> ?')" href="?menu=kon_hapus&kon_id=<?php echo $data['kon_id']; ?>" class="btn btn-sm btn-danger" title="Hapus <?php echo $data['kon_nama'];?>" >Hapus</a>
                </td>
              -->
            </tr>
              <?php 
              } 
          ?>
              </tbody>
          </table>
      </div>
    </div>
  </div>

  

</body>
</html> 




<!--

<iframe src="peg_data.php" height="2200" width="1000"></iframe>
-->
<!-- ////////////////////////////////////////////// -->
