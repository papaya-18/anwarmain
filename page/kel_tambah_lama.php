<head>
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
</head>

<?php //$tgl_sekarang=date("d-m-Y"); ?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
  <div class="row">
    <div class="col-xs-12 col-md-8">
      <h3><span class="fa fa-database"></span>
        Data Kondisi Keluarga Covid
    </h3>
    </div>
  </div>
  <section class="content">
      <div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title">Tambah Data Kondisi Keluarga Covid (Lama)</h3>
        </div>
        <div class="box-body">
          <div class="row">
            <div class="col-md-12">
              <form method="POST">

                <div class="form-group" >
                  <label>Nama Pegawai</label> <br>
                  <select  class="myselect" name="kel_peg_nik" required="required" style="width:1210px;">
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

                <div class="form-group" >
                  <label>Nama Keluarga Covid</label> <br>
                  <select  class="myselect" name="kel_nik" required="required" style="width:1210px;">
                    <option class="form-control"></option>
                    <?php
                      $sql = $koneksi->query("SELECT * FROM tb_kel ORDER BY kel_id DESC");
                        while ($datal=$sql->fetch_assoc()) {
                    ?>
                        <option class="form-control" value="<?php echo $datal['kel_nik']; ?>"><?php echo $datal['kel_nik']." - ".$datal['kel_nama']; ?></option>
                    <?php 
                      } 
                    ?>
                  </select>
                </div>

                <div class="form-group">
                  <label>Tanggal Hasil Swab Positif</label>
                  <input class="form-control" name="kel_tglswab" type="date" required="required" />
                </div>

                <div class="form-group">
                  <label>Kondisi</label>
                  <select name="kel_kondisi" class="form-control" required="required">
                    <option></option>
                    <option class="form-control">Isman</option>
                    <option class="form-control">Rujuk</option>
                    <option class="form-control">Sembuh</option>
                    <option class="form-control">Meninggal</option>
                  </select>  
                </div>

                <div class="form-group">
                    <label>Keterangan</label><textarea class="form-control" name="kel_ket"> 
                    </textarea>
                </div>    

                <div class="form-group">
                  <label>Tanggal Kondisi</label>
                  <input class="form-control" name="kel_tgl" type="date" required="required" value="<?php echo date('Y-m-d'); ?>" readonly/>
                </div>                           
<!-- /////////////////////////////////////////////////////////////////////////////////////////////   -->
                <div class="col-xs-12">
                  <br>                     
                  <input name="fsimpan" type="submit"  class="btn btn-primary" value="Simpan">
                  <a class="btn btn-danger" href="?menu=kel_data">Batal</a>
                </div>                
              </form>
              <?php 
                if (isset($_POST['fsimpan'])) {
                  $kel_chosen       = $_POST['kel_peg_nik'];
                  $query = mysqli_query($koneksi,"SELECT * FROM tb_peg WHERE peg_nik='$kel_chosen'");
                  $chosen = mysqli_fetch_array($query);
                  $kel_chosenl       = $_POST['kel_nik'];
                  $queryl = mysqli_query($koneksi,"SELECT * FROM tb_kel WHERE kel_nik='$kel_chosenl'");
                  $chosenl = mysqli_fetch_array($queryl);

                  $kel_peg_id       = $chosen['peg_id'];
                  $kel_peg_nama     = $chosen['peg_nama'];
                  //$kel_peg_jk       = $chosen['peg_jk'];
                  //$kel_peg_tgllahir = $chosen['peg_tgllahir'];
                  $kel_peg_nip      = $chosen['peg_nip'];
                  $kel_peg_nik      = $chosen['peg_nik'];

                  $kel_nama         = $chosenl['kel_nama'];
                  $kel_jk           = $chosenl['kel_jk'];
                  $kel_hubungan     = $chosenl['kel_hubungan'];
                  $kel_tgllahir     = $chosenl['kel_tgllahir'];
                  $kel_nik          = $chosenl['kel_nik'];

                  $kel_tglswab      = $_POST['kel_tglswab'];
                  $kel_kondisi      = $_POST['kel_kondisi'];
                  $kel_ket          = $_POST['kel_ket'];
                  $kel_tgl          = $_POST['kel_tgl'];
                  $kel_tglinput     = date('Y-m-d');
                            
//////////////////////////////////////////////////////////   

                  $q ="INSERT INTO tb_kel (
                  kel_peg_id, 
                  kel_peg_nama, 
                  kel_peg_nip,
                  kel_peg_nik, 
                  kel_nama,
                  kel_jk,
                  kel_hubungan,
                  kel_tgllahir,
                  kel_nik,
                  kel_tglswab, 
                  kel_kondisi, 
                  kel_ket, 
                  kel_tgl, 
                  kel_tglinput
                ) VALUES (
                '$kel_peg_id', 
                '$kel_peg_nama', 
                '$kel_peg_nip', 
                '$kel_peg_nik', 
                '$kel_nama', 
                '$kel_jk', 
                '$kel_hubungan', 
                '$kel_tgllahir', 
                '$kel_nik',
                '$kel_tglswab', 
                '$kel_kondisi', 
                '$kel_ket', 
                '$kel_tgl', 
                '$kel_tglinput')";
                  mysqli_query($koneksi,$q);

              ?>
                <script type="text/javascript">
                  alert('Berhasil menambah data kondisi keluarga covid');
                  document.location.href="?menu=kel_data";
                </script>
              <?php } ?>
            </div>
          </div>
        </div>
      </div>
    </section>

    <script type="text/javascript">
      $(".myselect").select2();
</script>