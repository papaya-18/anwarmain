<?php  
$connect = mysqli_connect("localhost", "root", "", "anwar3");  
$query = "SELECT * FROM tb_rekap";  
$query2 = "SELECT * FROM tb_rekap";  
$result = mysqli_query($connect, $query);  
$result2 = mysqli_query($connect, $query2);  
//$result = 100;  
 ?>

<div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">Berdasarkan Kondisi Akhir</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body">
              <div class="chart">
                <canvas id="trend" style="height:230px"></canvas>
              </div>
            </div>
            <!-- /.box-body -->
          </div>

<script>

var speedCanvas = document.getElementById("trend");
var speedData = {
  labels: [<?php  
                          while($row = mysqli_fetch_array($result))  
                          {  
                            echo "'" .$row[rekap_bulan] ."',";
                          }  
                          ?>  ],
  datasets: [{
    label: "Based Month",
    data: [<?php  
                          while($jml = mysqli_fetch_array($result2))  
                          {  
                            echo "'" .$jml[rekap_total] ."',";
                          }  
                          ?>  ],
    backgroundColor: [
                'rgba(153, 193, 185)'

            ],
            backgroundDash: [
                'rgba(142, 125, 190)'

            ],

  }]
};

var chartOptions = {
  legend: {
    display: true,
    position: 'top',
    labels: {
      boxWidth: 80,
      fontColor: 'black',
      backgroundDash:'black'
    }
  }
};

var lineChart = new Chart(trend, {
  type: 'line',
  data: speedData,
  options: chartOptions
});

</script>