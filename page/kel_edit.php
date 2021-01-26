<?php
  $kel_id = $_GET['kel_id'];
  $query  = mysqli_query($koneksi,"SELECT * FROM tb_kel WHERE kel_id='$kel_id'");
  $data   = mysqli_fetch_array($query);
?>

<head>
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
</head>

<?php //$tgl_sekarang=date("d-m-Y");?>

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
          <h3 class="box-title">Edit Data Kondisi Keluarga Covid</h3>
        </div>
        <div class="box-body">
          <div class="row">
            <div class="col-md-12">
              <form method="POST">


                <div class="form-group" >
                  <label>Nama Pegawai</label> <br>
                  <select  class="myselect" name="kel_peg_nik" required="required" style="width:1210px;">
                    <option class="form-control" value="<?php echo $data['kel_peg_nik']; ?>"><?php echo $data['kel_peg_nik']." - ".$data['kel_peg_nama']; ?></option>
                    <?php
                      $sqlp = $koneksi->query("SELECT * FROM tb_peg");
                        while ($datap=$sqlp->fetch_assoc()) {
                    ?>
                        <option class="form-control" value="<?php echo $datap['peg_nik']; ?>"><?php echo $datap['peg_nik']." - ".$datap['peg_nama']; ?></option>
                    <?php 
                      } 
                    ?>
                  </select>
                </div>

                <div class="form-group">
                  <label>Nama Keluarga Covid</label>
                  <input class="form-control" name="kel_nama" required="required" value="<?php echo $data['kel_nama']; ?>"/>
                </div>

                <div class="form-group">
                  <label>Jenis Kelamin</label>
                  <select name="kel_jk" class="form-control" required="required">
                    <option><?php echo $data['kel_jk']; ?></option>
                    <option class="form-control">Laki-laki</option>
                    <option class="form-control">Perempuan</option>
                  </select>  
                </div>

                <div class="form-group">
                  <label>Hubungan</label>
                  <select name="kel_hubungan" class="form-control" required="required">
                    <option><?php echo $data['kel_hubungan']; ?></option>
                    <option class="form-control">Suami/Istri</option>
                    <option class="form-control">Anak/Menantu</option>
                    <option class="form-control">Bapak/Ibu/Mertua</option>
                    <option class="form-control">Kakek/Nenek</option>
                    <option class="form-control">Cucu</option>
                    <option class="form-control">Paman/Bibi</option>
                    <option class="form-control">Sepupu</option>
                    <option class="form-control">Keponakan</option>
                    <option class="form-control">Teman</option>
                    <option class="form-control">Lainnya</option>
                  </select>  
                </div>

                <div class="form-group">
                  <label>Tanggal Lahir</label>
                  <input class="form-control" name="kel_tgllahir" type="date" required="required" value="<?php echo $data['kel_tgllahir']; ?>"/>
                </div>

                <div class="form-group">
                  <label>NIK</label>
                  <input class="form-control" name="kel_nik" type="number" required="required"    value="<?php echo $data['kel_nik']; ?>"/>
                </div>



                <div class="form-group">
                  <label>Tanggal Hasil Swab Positif</label>
                  <input class="form-control" name="kel_tglswab" type="date" required="required"  value="<?php echo $data['kel_tglswab']; ?>"/>
                </div>

                <div class="form-group">
                  <label>Kondisi</label>
                  <select name="kel_kondisi" class="form-control" required="required">
                    <option><?php echo $data['kel_kondisi']; ?></option>
                    <option class="form-control">Isman</option>
                    <option class="form-control">Rujuk</option>
                    <option class="form-control">Sembuh</option>
                    <option class="form-control">Meninggal</option>
                  </select>  
                </div>

                <div class="form-group">
                    <label>Keterangan</label><textarea class="form-control" name="kel_ket"><?php echo $data['kel_ket']; ?> 
                    </textarea>
                </div>    

                <div class="form-group">
                  <label>Tanggal Kondisi</label>
                  <input class="form-control" name="kel_tgl" type="date" required="required" value="<?php echo $data['kel_tgl']; ?>" readonly/>
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

                  $kel_peg_id       = $chosen['peg_id'];
                  $kel_peg_nama     = $chosen['peg_nama'];
                  //$kel_peg_jk       = $chosen['peg_jk'];
                  //$kel_peg_tgllahir = $chosen['peg_tgllahir'];
                  $kel_peg_nip      = $chosen['peg_nip'];
                  $kel_peg_nik      = $chosen['peg_nik'];

                  $kel_nama         = $_POST['kel_nama'];
                  $kel_jk           = $_POST['kel_jk'];
                  $kel_hubungan     = $_POST['kel_hubungan'];
                  $kel_tgllahir     = $_POST['kel_tgllahir'];
                  $kel_nik          = $_POST['kel_nik'];

                  $kel_tglswab      = $_POST['kel_tglswab'];
                  $kel_kondisi      = $_POST['kel_kondisi'];
                  $kel_ket          = $_POST['kel_ket'];
                  $kel_tgl          = $_POST['kel_tgl'];
                  //$kel_tglinput     = date('Y-m-d');                
//////////////////////////////////////////////////////////   

                  $q ="UPDATE tb_kel SET kel_peg_id='$kel_peg_id', kel_peg_nama='$kel_peg_nama', kel_peg_nip='$kel_peg_nip', kel_peg_nik='$kel_peg_nik', kel_nama='$kel_nama', kel_jk='$kel_jk', kel_hubungan='$kel_hubungan', kel_tgllahir='$kel_tgllahir', kel_nik='$kel_nik', kel_tglswab='$kel_tglswab', kel_kondisi='$kel_kondisi', kel_ket='$kel_ket' WHERE kel_id='$kel_id' ";
                  mysqli_query($koneksi,$q);
//, kel_tgl,='$kel_tgl'
              ?>
                <script type="text/javascript">
                  alert('Berhasil merubah data kondisi keluarga covid');
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