<?php  
$connect = mysqli_connect("localhost", "root", "", "anwar3");  
$query = "SELECT kon_peg_jk, count(*) as number FROM tb_kon GROUP BY kon_peg_jk"; 
$query2 = "SELECT kon_peg_jk, count(*) as number FROM tb_kon GROUP BY kon_peg_jk";  
$result = mysqli_query($connect, $query);  
$result2 = mysqli_query($connect, $query2);  
//$result = 100;  
 ?>
<div class="box box-danger">
            <div class="box-header with-border">
              <h3 class="box-title">Berdasarkan Jenis Kelamin</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body">
              <canvas id="jeniskelamin" style="height:250px"></canvas>
            </div>
            </div>
<script>
  var ctx = document.getElementById("jeniskelamin").getContext("2d");
  var data = {
    labels: [<?php  
                          while($row = mysqli_fetch_array($result))  
                          {  
                            echo "'" .$row[kon_peg_jk] ."',";
                          }  
                          ?> ],
            datasets: [
            {
              label: "Penjualan Barang",
              data: [<?php  
                          while($jml = mysqli_fetch_array($result2))  
                          {  
                            echo "'" .$jml[number] ."',";
                          }  
                          ?> ],
              backgroundColor: [
                '#83E377',
                '#EFEA5A'
                // '#F07124',
                // '#CBE0E3',
                // '#979193'
              ]
            }
            ]
            };

  var myPieChart = new Chart(jeniskelamin, {
                  type: 'doughnut',
                  data: data,
                  options: {
                    responsive: true
                }
              });
</script>