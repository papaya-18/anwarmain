<?php
  $peg_id = $_GET['peg_id'];
  $query  = mysqli_query($koneksi,"SELECT * FROM tb_peg WHERE peg_id='$peg_id'");
  $data   = mysqli_fetch_array($query);
?>
<!DOCTYPE html>
<html>
<head>
  <title></title>
</head>
<body>
  <div class="row">
    <div class="col-xs-12 col-md-8">
      <h3><span class="fa fa-database"></span>
        Data Pegawai
    </h3>
    </div>
  </div>
  <section class="content">
      <div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title">Edit Data Pegawai</h3>
        </div>
        <div class="box-body">
          <div class="row">
            <div class="col-md-12">
              <form method="POST">

                <div class="form-group">
                  <label>Nama Pegawai</label>
                  <input class="form-control" name="peg_nama" required="required" value="<?php echo $data['peg_nama']; ?>"/>
                </div>

                <div class="form-group">
                  <label>Jenis Kelamin</label>
                  <select name="peg_jk" class="form-control" required="required" value="<?php echo $data['peg_jk']; ?>">
                    <option></option>
                     <option <?php if ($data['peg_jk']=="Laki-laki"){ echo "selected"; } ?> class="form-control">Laki-laki</option>
                     <option <?php if ($data['peg_jk']=="Perempuan"){ echo "selected"; } ?> class="form-control">Perempuan</option>
                  </select>  
                </div>

                <div class="form-group">
                  <label>Tanggal Lahir</label>
                  <input class="form-control" name="peg_tgllahir" type="date" required="required" value="<?php echo $data['peg_tgllahir']; ?>"/>
                </div>

                <div class="form-group">
                  <label>NIP</label>
                  <input class="form-control" name="peg_nip" type="number" required="required" value="<?php echo $data['peg_nip']; ?>"/>
                </div>

                <div class="form-group">
                  <label>NIK</label>
                  <input class="form-control" name="peg_nik" type="number" required="required" value="<?php echo $data['peg_nik']; ?>"/>
                </div>

                <div class="form-group">
                  <label>Status Pegawai</label>
                  <select name="peg_stapeg" class="form-control" required="required" value="<?php echo $data['peg_stapeg']; ?>">
                    <option></option>
                    <option class="form-control">PNS</option>
                    <option class="form-control">Non PNS</option>
                  </select>  
                </div>

                <div class="form-group">
                  <label>Organisasi</label>
                  <input class="form-control" name="peg_org" required="required" value="<?php echo $data['peg_org']; ?>"/>
                </div>

                <div class="form-group">
                  <label>Organisasi Unit</label>
                  <input class="form-control" name="peg_orgunit" required="required" value="<?php echo $data['peg_orgunit']; ?>"/>
                </div>

                <!--                -->
<!-- /////////////////////////////////////////////////////////////////////////////////////////////   -->
                <div class="col-xs-12">
                  <br>
                  <input name="fsimpan" type="submit"  class="btn btn-primary" value="Simpan">
                  <a class="btn btn-danger" href="?menu=peg_data">Batal</a>
                </div>                
              </form>
              <?php 
                if (isset($_POST['fsimpan'])) {
                  $peg_nama       = $_POST['peg_nama'];
                  $peg_jk         = $_POST['peg_jk'];
                  $peg_tgllahir   = $_POST['peg_tgllahir'];
                  $peg_nip        = $_POST['peg_nip'];
                  $peg_nik        = $_POST['peg_nik'];
                  $peg_stapeg     = $_POST['peg_stapeg'];
                  $peg_org        = $_POST['peg_org'];
                  $peg_orgunit    = $_POST['peg_orgunit'];

//////////////////////////////////////////////////////////
                  $q ="UPDATE tb_peg SET peg_nama='$peg_nama', peg_jk='$peg_jk', peg_tgllahir='$peg_tgllahir', peg_nip='$peg_nip', peg_nik='$peg_nik', peg_stapeg='$peg_stapeg' , peg_org='$peg_org' , peg_orgunit='$peg_orgunit' WHERE peg_id='$peg_id'";
                  mysqli_query($koneksi,$q);

                  $sql2 = $koneksi->query("SELECT * FROM tb_kon");
                  while ($data2=$sql2->fetch_assoc()) {

                      $q2 ="UPDATE tb_kon SET kon_peg_nama='$peg_nama', kon_peg_jk='$peg_jk', kon_peg_tgllahir='$peg_tgllahir', kon_peg_nip='$peg_nip', kon_peg_nik='$peg_nik', kel_peg_stapeg='$peg_stapeg' , kel_peg_org='$peg_org' , kel_peg_orgunit='$peg_orgunit' WHERE kon_peg_id='$peg_id'";
                      mysqli_query($koneksi,$q2);
                  }
//,  kon_peg_status='$peg_status'

              $sql3 = $koneksi->query("SELECT * FROM tb_kel");
              while ($data3=$sql3->fetch_assoc()) {

                  $q3 ="UPDATE tb_kel SET kel_peg_nama='$peg_nama', kel_peg_nip='$peg_nip', kel_peg_nik='$peg_nik'WHERE kel_peg_id='$peg_id'";
                  mysqli_query($koneksi,$q3);

              }
//, kel_peg_status='$peg_status' 
//////////////////////////////////////////////////////////              
              ?>
                <script type="text/javascript">
                  alert('Berhasil merubah data pegawai');
                  document.location.href="?menu=peg_data";
                </script>
              <?php } ?>
            </div>
          </div>
        </div>
      </div>
</section>