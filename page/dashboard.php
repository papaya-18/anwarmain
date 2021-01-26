<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<script src="../inc/Chart.js"></script>
<body>
    <div class="login-logo">
    <a><b>Rekapan Pegawai dan Keluarga Covid</b><br>
    Kementerian Kesehatan</a>
  </div>

  <section class="content">
      <div class="row">
        <div class="col-lg-3 col-xs-6">
        <div class="info-box bg-yellow">
            <span class="info-box-icon"><i class="glyphicon glyphicon-user"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">TOTAL</span>
              <span class="info-box-number">  
              <?php
                $q = mysqli_query($koneksi, "SELECT * FROM tb_peg"); //ambil kolomnya
                $j = mysqli_num_rows($q);
                echo $j;
               ?></span>
               <span>
               Pegawai Kemenkes
                  </span>
            </div>
         </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="info-box bg-green">
            <span class="info-box-icon"><i class="ion ion-ios-heart-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Pegawai Kemenkes</span>
              <span class="info-box-number"><?php
                $q = mysqli_query($koneksi, "SELECT * FROM tb_kon");
                $j = mysqli_num_rows($q);
                echo $j;
               ?></span>
              <span class="progress-description">
                    Positif Covid 19
                  </span>
            </div>
          </div>
        </div>
        <!-- ./col -->
        
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="info-box bg-red">
            <span class="info-box-icon"><i class="ion ion-ios-cloud-download-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Keluarga Pegawai</span>
              <span class="info-box-number"><?php
                $q = mysqli_query($koneksi, "SELECT * FROM tb_kel");
                $j = mysqli_num_rows($q);
                echo $j;
               ?></span>
              <span>
                    Positif Covid 19
                  </span>
            </div>
            <!-- /.info-box-content -->
          </div>
        </div>
      
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
        <div class="info-box bg-aqua">
            <span class="info-box-icon"><i class="ion-ios-chatbubble-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Total Pegawai</span>
              <span class="info-box-number">  <?php
                $q = mysqli_query($koneksi, "SELECT * FROM tb_kon WHERE kon_staakhir='Dalam Proses'");
                $j = mysqli_num_rows($q);
                echo $j;
               ?></span>
              <span>
                  Dalam Perawatan
                  </span>
            </div>
            <!-- /.info-box-content -->
          </div>
      </div>

      
        <div class="col-md-6">
          <!-- chart bulan -->
         <?php
         include "chart/based_month.php";
         ?>
          <!-- chart gender -->
          <?php
         include "chart/based_gender.php";
         ?>
          <!-- DONUT CHART -->
         
          <!-- /.box -->

        </div>
        <!-- /.col (LEFT) -->
        <div class="col-md-6">
          <!-- kondisi -->
          <?php
         include "chart/based_condition.php";
         ?>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

          <!-- trend -->
          <div>
          <?php
         include "chart/trend.php";
         ?>
          <!-- /.box -->

        </div>
        <!-- /.col (RIGHT) -->
      
      <!-- /.row -->

    </section>

</body>
</html>