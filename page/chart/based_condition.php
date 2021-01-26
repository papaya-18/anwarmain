<?php  
$connect = mysqli_connect("localhost", "root", "", "anwar3");  
$query = "SELECT kon_kondisi, count(*) as number FROM tb_kon GROUP BY kon_kondisi"; 
$query2 = "SELECT kon_kondisi, count(*) as number FROM tb_kon GROUP BY kon_kondisi";  
$result = mysqli_query($connect, $query);  
$result2 = mysqli_query($connect, $query2);  
//$result = 100;  
 ?>

<div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Berdasarkan Kondisi</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body">
              <div class="chart">
                <canvas id="kondisi" style="height:250px"></canvas>
              </div>

<script  type="text/javascript">
  var ctx = document.getElementById("kondisi").getContext("2d");
  var data = {
            labels: [<?php  
                          while($row = mysqli_fetch_array($result))  
                          {  
                            echo "'" .$row[kon_kondisi] ."',";
                          }  
                          ?>],
            datasets: [
            {
              label: "Penjualan Barang",
              data: [<?php  
                          while($jml = mysqli_fetch_array($result2))  
                          {  
                            echo "'" .$jml[number] ."',";
                          }  
                          ?>],
              backgroundColor: [
                '#2ec4b6',
                '#8b2fc9',
                '#ff9f1c',
                '#e01e37', //ungu
                '#00afb9'
                             ]
            }
            ]
            };

  var myPieChart = new Chart(ctx, {
                  type: 'polarArea',
                  data: data,
                  options: {
                    responsive: true
                }
              });

</script>