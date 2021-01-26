<?php
  $rekap_id = $_GET['rekap_id'];
  $query1  = mysqli_query($koneksi,"SELECT * FROM tb_rekap WHERE rekap_id='$rekap_id'");
  $data1   = mysqli_fetch_array($query1);

  $rekap_tahun = $data1['rekap_tahun'];
  $rekap_bulan0 = $data1['rekap_bulan'];
  $rekap_bulan  = date('m',strtotime($rekap_bulan0));


  $rekap_kelisman   = $data1['rekap_kelisman'];
  $rekap_kelrujuk   = $data1['rekap_kelrujuk'];
  $rekap_kelsembuh  = $data1['rekap_kelsembuh'];
  $rekap_kelmeninggal  = $data1['rekap_kelmeninggal']; 

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
        Detail Rekap Keluarga Covid Bulan <?php echo $rekap_bulan0; ?> Tahun <?php echo $rekap_tahun; ?>
        <?php
          $qjumlah = mysqli_query($koneksi,"SELECT * FROM tb_kel WHERE YEAR(kel_tgl)='$rekap_tahun' AND  MONTH(kel_tgl)='$rekap_bulan'  ORDER BY kel_id DESC");
          $jumlah = mysqli_num_rows($qjumlah);
        ?>
        <button class="btn btn-sm btn-default"><span class="badge"><?php echo $jumlah; ?></span></button>
        <!--<a href="?menu=kon_data" class="btn btn-primary"><span class="glyphicon glyphicon-refresh"></a>
        <a href="?menu=kon_tambah" class="btn btn-success">Tambah Kondisi <span class="glyphicon glyphicon-plus-sign"></a>
        <a onclick="return confirm('Anda yakin menghapus semua data industri rumahan ?')" href="?menu=kon_hapus_semua" class="btn btn-danger">Hapus Semua Data <span class="glyphicon glyphicon-trash"></a>-->
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
      array("label"=>"Isman", "symbol" => "Isman","y"=>$rekap_kelisman),
      array("label"=>"Rujuk", "symbol" => "Rujuk","y"=>$rekap_kelrujuk),
      array("label"=>"Sembuh", "symbol" => "Sembuh","y"=>$rekap_kelsembuh),
      array("label"=>"Menginggal", "symbol" => "Menginggal","y"=>$rekap_kelmeninggal),  



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
          yValueFormatString: "#,##0.0\"%\"",
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
        <div class="box-body">
            <table id="example2" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Nama Pegawai (NIK)</th>
                  <th>Nama Keluarga Covid</th>            
                  <th>Hubungan</th>
                  <th>Tanggal Lahir</th>
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
                    $sql3 = $koneksi->query("SELECT * FROM tb_kel WHERE YEAR(kel_tgl)='$rekap_tahun' AND  MONTH(kel_tgl)='$rekap_bulan'   ORDER BY kel_id DESC");
                    while ($data3=$sql3->fetch_assoc()) {
                ?>
                <tr>
                    <td> <?php echo $no++; ?> </td>
                    <td> <?php echo $data3['kel_peg_nama']." (".$data3['kel_peg_nik'].")"; ?></td>
                    <td> <?php echo $data3['kel_nama']; ?></td>
                    <td> <?php echo $data3['kel_hubungan']; ?></td>
                    <td> <?php echo $data3['kel_tgllahir']; ?></td>
                    <td> <?php echo $data3['kel_nik']; ?></td>
                    <td> <?php echo $data3['kel_tglswab']; ?></td>
                    <td> <?php echo $data3['kel_kondisi']; ?></td>
                    <td> <?php echo $data3['kel_ket']; ?></td>
                    <td> <?php echo $data3['kel_tgl']; ?></td>
                    <!--<td></td>-->                    
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

<!--<iframe src="peg_data.php" height="2200" width="1000"></iframe>-->
<!-- ////////////////////////////////////////////// -->