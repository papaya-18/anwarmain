<!DOCTYPE html>
<html>
<head>
<title></title>
</head>
<body>
    <div class="row">
    <div class="col-xs-12 col-md-12">
      <h3><span class="fa fa-database"></span>
        Rekap Grafik
        <?php
          $qjumlah = mysqli_query($koneksi,"SELECT * FROM tb_rekap ");
          $jumlah = mysqli_num_rows($qjumlah);
        ?>
        <!-- <button class="btn btn-sm btn-default"><span class="badge"><?php echo $jumlah; ?></span></button>

        <a href="?menu=rekap_data_refresh" class="btn btn-sm btn-primary"><span class="glyphicon glyphicon-refresh"></a>
        <a href="?menu=peg_tambah" class="btn btn-success">Tambah Pegawai <span class="glyphicon glyphicon-plus-sign"></a>        
        <a onclick="return confirm('Anda yakin menghapus semua data industri rumahan ?')" href="?menu=peg_hapus_semua" class="btn btn-danger">Hapus Semua Data <span class="glyphicon glyphicon-trash"></a>-->
    </h3>
    </div>
  </div>






          <?php
              $no = 1;
              $sql = $koneksi->query("SELECT * FROM tb_rekap ORDER BY rekap_tahun DESC");
              //while ($data=$sql->fetch_assoc()) {
          ?>















<?php
 
$dataPoints1 = array(
  array("label"=> "Desember 2020", "y"=> 4),
  array("label"=> "Januari 2021", "y"=> 2),
);
 
$dataPoints2 = array(
  array("label"=> "Desember 2020", "y"=> 2),
  array("label"=> "Januari 2021", "y"=> 2),
);
 
$dataPoints3 = array(
  array("label"=> "Desember 2020", "y"=> 0),
  array("label"=> "Januari 2021", "y"=> 3),
);
 
$dataPoints4 = array(
  array("label"=> "Desember 2020", "y"=> 0),
  array("label"=> "Januari 2021", "y"=> 1),
);
 
 
 
?>
<!DOCTYPE HTML>
<html>
<head>  
<script>
window.onload = function () {
 
var chart = new CanvasJS.Chart("chartContainer", {
  title: {
    text: "Pegawai Covid"
  },
  theme: "light2",
  animationEnabled: true,
  toolTip:{
    shared: true,
    reversed: true
  },
  axisY: {
    title: "Pegawai Covid",
    suffix: " Orang"
  },
  legend: {
    cursor: "pointer",
    itemclick: toggleDataSeries
  },
  data: [
    {
      type: "stackedColumn",
      name: "Isman",
      showInLegend: true,
      yValueFormatString: "#,##0 MW",
      dataPoints: <?php echo json_encode($dataPoints1, JSON_NUMERIC_CHECK); ?>
    },{
      type: "stackedColumn",
      name: "Rujuk",
      showInLegend: true,
      yValueFormatString: "#,##0 MW",
      dataPoints: <?php echo json_encode($dataPoints2, JSON_NUMERIC_CHECK); ?>
    },{

      type: "stackedColumn",
      name: "Sembuh",
      showInLegend: true,
      yValueFormatString: "#,##0 MW",
      dataPoints: <?php echo json_encode($dataPoints3, JSON_NUMERIC_CHECK); ?>
    },{
      type: "stackedColumn",
      name: "Meninggal",
      showInLegend: true,
      yValueFormatString: "#,##0 MW",
      dataPoints: <?php echo json_encode($dataPoints4, JSON_NUMERIC_CHECK); ?>
    }
  ]
});
 
chart.render();
 
function toggleDataSeries(e) {
  if (typeof (e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
    e.dataSeries.visible = false;
  } else {
    e.dataSeries.visible = true;
  }
  e.chart.render();
}
 
}
</script>
</head>
<body>
<div id="chartContainer" style="height: 370px; width: 100%;"></div>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
</body>
</html>











<!-- ////////////////////////////////////////////// -->

</body>
</html>          