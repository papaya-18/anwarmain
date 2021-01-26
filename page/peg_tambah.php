<?php 
  $iy=1;
?>
<head>
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
</head>
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
          <h3 class="box-title">Tambah Data Pegawai</h3>
        </div>
        <div class="box-body">
          <div class="row">
            <div class="col-md-12">
              <form method="POST">

             <div class="form-group" >
                  <label>Nama Pegawai</label> <br>
                  <select  class="form-control" name="kel_peg_nik" required="required" onkey="otomatis()">
                    <option class="form-control"></option>
                    <?php
                      $sql = $koneksi->query("SELECT * FROM tb_peg");
                        while ($data=$sql->fetch_assoc()) {
                    ?>
                        <option class="form-control" value="<?php echo $data['peg_nik']; ?>"><?php echo $data['peg_nik']." - ".$data['peg_nama']; ?></option>
                    <?php 
                      } 
                    ?>
                  </select>
                </div>

                <div class="form-group">
                  <label>Jenis Kelamin</label>
                  <select name="peg_jk" class="form-control" required="required" id="peg_jk" disabled>
                    <option></option>
                    <option class="form-control">Laki-laki</option>
                    <option class="form-control">Perempuan</option>
                  </select>  
                </div>

                <div class="form-group">
                  <label>Tanggal Lahir</label>
                  <input class="form-control" name="peg_tgllahir" type="date" required="required" id="peg_tgllahir" />
                </div>

                <div class="form-group">
                  <label>NIP</label>
                  <input class="form-control" name="peg_nip" type="number" required="required" id="peg_nip"/>
                </div>

                <div class="form-group">
                  <label>NIK</label>
                  <input class="form-control" name="peg_nik" type="number" required="required" id="peg_nik"/>
                </div>

                <div class="form-group">
                  <label>Status Pegawai</label>
                  <select name="peg_stapeg" class="form-control" required="required" id="peg_stapeg">
                    <option></option>
                    <option class="form-control">PNS</option>
                    <option class="form-control">Non PNS</option>
                  </select>  
                </div>

                <div class="form-group">
                  <label>Organisasi</label>
                  <input class="form-control" name="peg_org" required="required" id="peg_org"/>
                </div>

                <div class="form-group">
                  <label>Organisasi Unit</label>
                  <input class="form-control" name="peg_orgunit" required="required" id="peg_orgunit"/>
                </div>
                                  
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

                  $q ="INSERT INTO tb_peg(peg_nama, peg_jk, peg_tgllahir, peg_nip, peg_nik, peg_stapeg, peg_org, peg_orgunit) VALUES ('$peg_nama', '$peg_jk','$peg_tgllahir', '$peg_nip', '$peg_nik', '$peg_stapeg','$peg_org','$peg_orgunit')";

                  mysqli_query($koneksi,$q);

              ?>
                <script type="text/javascript">
                  alert('Berhasil menambah data pegawai');
                  document.location.href="?menu=peg_data";
              <?php } ?>
          
</script>
                <script type="text/javascript">
                var nama = $(".myselect").select2();

                </script>

