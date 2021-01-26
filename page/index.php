<?php 
  include "../inc/koneksi.php";
  session_start();
  if($_SESSION['userweb']=="Super"){
    header('location:index.php'); 
  }
  if($_SESSION['userweb']=="Admin"){
    header('location:index.php'); 
  }
  $qprofil = mysqli_query($koneksi,"SELECT * FROM tb_user WHERE user_id='$_SESSION[userweb]'");
  $profil = mysqli_fetch_array($qprofil);
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title> User <?php echo $profil['user_akses']; ?> | Potensi Wilayah Industri</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="../lte/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="../lte/dist/css/AdminLTE.min.css">
    <link rel="stylesheet" href="../lte/dist/css/skins/skin-blue.min.css">
    <link rel="stylesheet" href="../lte/plugins/datatables/dataTables.bootstrap.css">
    <link rel="stylesheet" href="../lte/dist/css/skins/_all-skins.min.css">
    <link rel="icon" href="../lte/favcon/favicon2.ico">

  </head>
  <body class="hold-transition skin-blue sidebar-mini">
  <div class="wrapper">
    <header class="main-header">
      <a href="" class="logo">
        <span class="logo-mini"><b>U</b>ser</span>
        <span class="logo-lg"><b>U</b>ser</span>
      </a>
      <nav class="navbar navbar-static-top" role="navigation">
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
         <span class="sr-only">Toggle navigation</span>
        </a>
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="../lte/dist/img/user1.png" class="user-image" alt="User Image"> 
              <span class="hidden-xs"><span class="glyphicon glyphicon-triangle-bottom"></span></span>
            </a>
            <ul class="dropdown-menu">
              <li class="user-header">
                <img src="../lte/dist/img/user1.png" class="img-circle" alt="User Image"> 

                <p>
                  <?php echo $profil['user_name']; ?>
                  <small><?php echo $profil['user_nama']; ?></small><br>
                </p>
              </li>
              <li class="user-footer">
                <div class="pull-left">
                  <a href="?menu=user_profil" class="btn btn-default btn-flat"><span class="fa fa-user"></span> Profile</a>
                </div>
                <div class="pull-right">
                  <a onclick="return confirm('Anda yakin ingin logout ?')" class="btn btn-default btn-flat" href="../inc/keluar.php"><span class="fa fa-sign-out"></span> Logout</a>
                </div>
              </li>
            </ul>
          </li>          
        </ul>
      </div>
    </nav>
  </header>
  <aside class="main-sidebar">
    <section class="sidebar">
      <div class="user-panel">
        <div class="pull-left image">
          <img src="../lte/dist/img/user1.png" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $profil['user_nama']; ?></p>
          <a href="#">
            <i class="fa fa-circle text-success"></i> User <?php echo $profil['user_akses']; ?></a>
        </div>
      </div>

      <?php 
        @$menu= $_GET['menu'];
      ?>
      <ul class="sidebar-menu">
        <li class="header">Menu</li>
<!-- /////////////////////////////////////////////////////////////////////////////////////// -->
        <li <?php if ($menu=="" || $menu=="dashboard"){echo "class='active'";} ?>>
          <a href="?menu=dashboard"><i class="fa fa-home"></i> 
            <span>Beranda</span>
          </a>
        </li>
        <?php //|| $menu=="profil" || $menu=="edit_profil" ?>
<!-- /////////////////////////////////////////////////////////////////////////////////////// -->



      <?php if($profil['user_akses']=='Super'){ ?> 
        <li <?php if ($menu=="user_data" || $menu=="user_tambah" || $menu=="user_edit" || $menu=="user_hapus")
        {echo "class='active treeview'";} ?>>
          <a href="?menu=user_data">
            <i class="fa fa-dashboard"></i> <span>Data User</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
<li <?php if ($menu=="user_data" || $menu=="user_edit")  {echo "class='active'";} ?>><a href="?menu=user_data">  <i class="fa fa-circle-o"></i>Tabel Data User</a></li>
<li <?php if ($menu=="user_tambah"){echo "class='active'";} ?>><a href="?menu=user_tambah"><i class="fa fa-circle-o"></i>Tambah Data User</a></li>
          </ul>
        </li>
      <?php } ?>
<!-- /////////////////////////////////////////////////////////////////////////////////////// -->
        <li <?php if ($menu=="peg_data" || $menu=="peg_tambah" || $menu=="peg_edit" || $menu=="peg_hapus"|| $menu=="peg_hapus_semua"|| $menu=="kon_data"|| $menu=="kon_edit"|| $menu=="kon_tambah"|| $menu=="kel_data"|| $menu=="kel_edit"|| $menu=="kel_tambah")
        {echo "class='active treeview'";} ?>>
          <a href="?menu=peg_data">
            <i class="fa fa-dashboard"></i> <span>Data Pegawai</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
<li <?php if ($menu=="peg_data" || $menu=="peg_edit"|| $menu=="kon_data"|| $menu=="kon_edit"|| $menu=="kon_tambah"|| $menu=="kel_data"|| $menu=="kel_edit"|| $menu=="kel_tambah")  {echo "class='active'";} ?>><a href="?menu=peg_data">  <i class="fa fa-circle-o"></i>Tabel Pegawai</a></li>
<li <?php if ($menu=="peg_tambah"){echo "class='active'";} ?>><a href="?menu=peg_tambah"><i class="fa fa-circle-o"></i>Tambah Pegawai</a></li>
          </ul>
        </li>
<!-- /////////////////////////////////////////////////////////////////////////////////////// -->
        <li <?php if ($menu=="kon_data" || $menu=="kon_tambah" || $menu=="kon_edit" || $menu=="kon_hapus"|| $menu=="kon_hapus_semua")
        {echo "class='active treeview'";} ?>>
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Data Kondisi Pegawai Covid</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
<li <?php if ($menu=="kon_data" || $menu=="kon_edit")  {echo "class='active'";} ?>><a href="?menu=kon_data">  <i class="fa fa-circle-o"></i>Tabel Kondisi Pegawai Covid</a></li>
<li <?php if ($menu=="kon_tambah"){echo "class='active'";} ?>><a href="?menu=kon_tambah"><i class="fa fa-circle-o"></i>Tambah Kondisi Pegawai Covid</a></li>
          </ul>
        </li>
<!-- /////////////////////////////////////////////////////////////////////////////////////// -->        
        <li <?php if ($menu=="kel_data" || $menu=="kel_tambah" || $menu=="kel_tambah_lama" || $menu=="kel_edit" || $menu=="kel_hapus"|| $menu=="kel_hapus_semua" || $menu=="kel_identitas" || $menu=="kel_identitas_edit")
        {echo "class='active treeview'";} ?>>
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Data Kondisi Keluarga Covid</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
<li <?php if ($menu=="kel_data" || $menu=="kel_edit") {echo "class='active'";} ?>><a href="?menu=kel_data">  <i class="fa fa-circle-o"></i>Tabel Kondisi Keluarga Covid</a></li>
<li <?php if ($menu=="kel_tambah"){echo "class='active'";} ?>><a href="?menu=kel_tambah"><i class="fa fa-circle-o"></i>Tambah Keluarga Covid (Baru)</a></li>
<li <?php if ($menu=="kel_tambah_lama"){echo "class='active'";} ?>><a href="?menu=kel_tambah_lama"><i class="fa fa-circle-o"></i>Tambah Keluarga Covid (Lama)</a></li>
<li <?php if ($menu=="kel_identitas" || $menu=="kel_identitas_edit"){echo "class='active'";} ?>><a href="?menu=kel_identitas"><i class="fa fa-circle-o"></i>Edit Identitas Keluarga Covid</a></li>
          </ul>
        </li>        
<!-- /////////////////////////////////////////////////////////////////////////////////////// -->
        <li <?php if ($menu=="rekap_data"||$menu=="rekap_detail"||$menu=="rekap_detail_kel"||$menu=="rekap_grafik"||$menu=="rekap_grafik_kel")
        {echo "class='active treeview'";} ?>>
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Hasil Rekap Grafik Covid</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
<li <?php if ($menu=="rekap_data"||$menu=="rekap_detail") {echo "class='active'";} ?>><a href="?menu=rekap_data">  <i class="fa fa-circle-o"></i>Rekap Bulanan</a></li>
<li <?php if ($menu=="rekap_grafik"){echo "class='active'";} ?>><a href="?menu=rekap_grafik"><i class="fa fa-circle-o"></i>Rekap Grafik Pegawai Covid</a></li>
<li <?php if ($menu=="rekap_grafik_kel"){echo "class='active'";} ?>><a href="?menu=rekap_grafik_kel"><i class="fa fa-circle-o"></i>Rekap Grafik Keluarga Covid</a></li>
          </ul>
        </li>  
<!-- /////////////////////////////////////////////////////////////////////////////////////// -->



<!-- /////////////////////////////////////////////////////////////////////////////////////// -->
      </ul>
    </section>
  </aside>
  <div class="content-wrapper">
    <section class="content">
      <?php
        error_reporting(0);
        switch($_GET['menu']){
////////////////////////////////////////////////////////////////////////////////////////////
          case 'dashboard';
          include "dashboard.php";
          break;

          case '';
          include "dashboard.php";
          break;
///////////////////////////////////////////////////////////////////////////////////////////
          case 'user_profil':
          include "user_profil.php";
          break;

          case 'user_profil_edit':
          include "user_profil_edit.php";
          break;
///////////////////////////////////////////////////////////////////////////////////////////
          case 'user_data':
          include "user_data.php";
          break;

          case 'user_tambah':
          include "user_tambah.php";
          break;

          case 'user_edit':
          include "user_edit.php";
          break;

          case 'user_hapus': $id=$_GET['user_id']; mysqli_query($koneksi,"DELETE FROM tb_user WHERE user_id='$id'"); 
          include "user_data.php"; 
          break;
///////////////////////////////////////////////////////////////////////////////////////////
          case 'peg_data':              
          include "peg_data.php";
          break;

          case 'peg_tambah':
          include "peg_tambah.php";
          break;

          case 'peg_edit':
          include "peg_edit.php";
          break;
          
          case 'peg_hapus_semua':                         
          mysqli_query($koneksi,"DELETE FROM tb_peg"); 
          include "peg_data.php";
          break;

          case 'peg_hapus': 
          $id=$_GET['peg_id']; 
          $query = mysqli_query($koneksi,"SELECT * FROM tb_peg WHERE peg_id='$id'");
          $data = mysqli_fetch_array($query);
          $ir_nama=$data['peg_nama'];
          $ir_id=$data['peg_id'];
          mysqli_query($koneksi,"DELETE FROM tb_peg WHERE peg_id='$id'"); 
          include "peg_data.php"; 
          break;
///////////////////////////////////////////////////////////////////////////////////////////
          case 'kon_data':
          include "kon_data.php";
          break;

          case 'kon_tambah':
          include "kon_tambah.php";
          break;

          case 'kon_edit':
          include "kon_edit.php";
          break;
          
          case 'kon_hapus_semua':                         
          mysqli_query($koneksi,"DELETE FROM tb_kon");
          include "kon_data.php";
          break;

          case 'kon_hapus': 
          $id=$_GET['kon_id'];
          $query = mysqli_query($koneksi,"SELECT * FROM tb_kon WHERE kon_id='$id'");
          $data = mysqli_fetch_array($query);
          $kon_nama=$data['kon_nama']; 
          mysqli_query($koneksi,"DELETE FROM tb_kon WHERE kon_id='$id'"); 
          include "kon_data.php"; 
          break;
///////////////////////////////////////////////////////////////////////////////////////////
          case 'kel_data':
          include "kel_data.php";
          break;

          case 'kel_tambah':
          include "kel_tambah.php";
          break;

          case 'kel_tambah_lama':
          include "kel_tambah_lama.php";
          break;

          case 'kel_edit':
          include "kel_edit.php";
          break;
          
          case 'kel_hapus_semua':                         
          mysqli_query($koneksi,"DELETE FROM tb_kel");
          include "kel_data.php";
          break;

          case 'kel_hapus': 
          $id=$_GET['kel_id'];
          $query = mysqli_query($koneksi,"SELECT * FROM tb_kel WHERE kel_id='$id'");
          $data = mysqli_fetch_array($query);
          $kel_nama=$data['kel_nama']; 
          mysqli_query($koneksi,"DELETE FROM tb_kel WHERE kel_id='$id'"); 
          include "kel_data.php"; 
          break;

          case 'kel_identitas':
          include "kel_identitas.php";
          break;

          case 'kel_identitas_edit':
          include "kel_identitas_edit.php";
          break;
///////////////////////////////////////////////////////////////////////////////////////////
          case 'rekap_data':
          include "rekap_data.php";
          break;

          case 'rekap_data_refresh':                         
          include "rekap_data_refresh.php";
          include "rekap_data.php";
          break;

          case 'rekap_detail':
          include "rekap_detail.php";
          break;

          case 'rekap_detail_kel':
          include "rekap_detail_kel.php";
          break;

          case 'rekap_grafik':
          include "rekap_grafik.php";
          break;

          case 'rekap_grafik_kel':
          include "rekap_grafik_kel.php";
          break;
///////////////////////////////////////////////////////////////////////////////////////////
          case 'hapus_logout': $id=$_GET['user_id']; 
                ?>
                <script type="text/javascript">
                  alert('Profil berhasil dihapus');
                  document.location.href="../inc/keluar.php";
                </script>
                <?php
          mysqli_query($koneksi,"DELETE FROM tb_user WHERE user_id='$id'");  
          break;
          //default:
          //include "dashboard.php";
          //break;
        }
      ?>
    </section>
  </div>

  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      
    </div>
    <strong><a href="">Pegcov1</a> &copy; 2021 </a>
  </footer>
  <div class="control-sidebar-bg"></div>
</div>
<script src="../lte/plugins/jQuery/jquery-2.2.3.min.js"></script>
<script src="../lte/bootstrap/js/bootstrap.min.js"></script>
<script src="../lte/dist/js/app.min.js"></script>
<script src="../lte/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../lte/plugins/datatables/dataTables.bootstrap.min.js"></script>
<script src="../lte/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<script src="../lte/plugins/fastclick/fastclick.js"></script>
<script src="../lte/dist/js/demo.js"></script>
<script src="../inc/Chart.js"></script>
<script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
  });
</script>
</body>
</html>