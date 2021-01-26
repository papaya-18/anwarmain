<?php  
$connect = mysqli_connect("localhost", "root", "", "pegcovid1");  
$query = "SELECT * FROM tb_rekap";  
$query2 = "SELECT * FROM tb_rekap";  
$result = mysqli_query($connect, $query);  
$result2 = mysqli_query($connect, $query2);  
//$result = 100;  
 ?>
<div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Grafik Per Bulan</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body"> 
              <div class="chart">
                <canvas id="month" style="height:250px"></canvas>
              </div>
            </div>
        </div>
<script>
var ctx = document.getElementById('month').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: [<?php  
                          while($row = mysqli_fetch_array($result))  
                          {  
                            echo "'" .$row[rekap_bulan] ."',";
                          }  
                          ?>  ],
        datasets: [{
            label: '# of Votes',
            data: [<?php  
                          while($jml = mysqli_fetch_array($result2))  
                          {  
                            echo "'" .$jml[rekap_total] ."',";
                          }  
                          ?>  ],
            backgroundColor: [
                'rgba(255, 99, 132)',
                'rgba(54, 162, 235)',
                'rgba(255, 206, 86)',
                'rgba(75, 192, 192)',
                'rgba(153, 102, 255)',
                'rgba(255, 159, 64)',
                'rgba(231, 111, 81)',
                'rgba(85, 166,48)',
                'rgba(129, 178,154)',
                'rgba(212, 163,115)'

            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }
});
</script>