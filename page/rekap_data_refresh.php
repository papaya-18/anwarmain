<?php

  mysqli_query($koneksi,"DELETE FROM tb_rekap");

  $sqla = $koneksi->query("SELECT * FROM tb_kon");
    while ($dataa=$sqla->fetch_assoc()) {
      $bulan  = date("F",strtotime($dataa['kon_tgl']));
      $tahun   =date("Y",strtotime($dataa['kon_tgl']));
      $kon_kondisi = $dataa['kon_kondisi'];
      $ada = 0;
      $sqlb = $koneksi->query("SELECT * FROM tb_rekap WHERE rekap_tahun='$tahun' AND rekap_bulan='$bulan'");
      while ($datab=$sqlb->fetch_assoc()) {
        $ada++;
      }
      if ($ada==0){
        $rekap_konjumlah = 1;
        $q ="INSERT INTO tb_rekap(rekap_tahun, rekap_bulan, rekap_konjumlah) VALUES ('$tahun', '$bulan', '$rekap_konjumlah')";
        mysqli_query($koneksi,$q);    
      } else {
        $q ="UPDATE tb_rekap SET rekap_konjumlah=rekap_konjumlah+1 WHERE rekap_tahun='$tahun' AND rekap_bulan='$bulan'";
        mysqli_query($koneksi,$q);
      }
      if ($kon_kondisi=="Isman"){
        $q ="UPDATE tb_rekap SET rekap_konisman=rekap_konisman+1 WHERE rekap_tahun='$tahun' AND rekap_bulan='$bulan'";
        mysqli_query($koneksi,$q);
      } else if ($kon_kondisi=="Rujuk"){
        $q ="UPDATE tb_rekap SET rekap_konrujuk=rekap_konrujuk+1 WHERE rekap_tahun='$tahun' AND rekap_bulan='$bulan'";
        mysqli_query($koneksi,$q);
      } else if ($kon_kondisi=="Sembuh"){
        $q ="UPDATE tb_rekap SET rekap_konsembuh=rekap_konsembuh+1 WHERE rekap_tahun='$tahun' AND rekap_bulan='$bulan'";
        mysqli_query($koneksi,$q);
      } else if ($kon_kondisi=="Meninggal"){
        $q ="UPDATE tb_rekap SET rekap_konmeninggal=rekap_konmeninggal+1 WHERE rekap_tahun='$tahun' AND rekap_bulan='$bulan'";
        mysqli_query($koneksi,$q);
      }
    }


  $sqla = $koneksi->query("SELECT * FROM tb_kel");
    while ($dataa=$sqla->fetch_assoc()) {
      $bulan  = date("F",strtotime($dataa['kel_tgl']));
      $tahun   =date("Y",strtotime($dataa['kel_tgl']));
      $kel_kondisi = $dataa['kel_kondisi'];
      $ada = 0;
      $sqlb = $koneksi->query("SELECT * FROM tb_rekap WHERE rekap_tahun='$tahun' AND rekap_bulan='$bulan'");
      while ($datab=$sqlb->fetch_assoc()) {
        $ada++;
      }
      if ($ada==0){
        $rekap_keljumlah = 1;
        $q ="INSERT INTO tb_rekap(rekap_tahun, rekap_bulan, rekap_keljumlah) VALUES ('$tahun', '$bulan', '$rekap_keljumlah')";
        mysqli_query($koneksi,$q);    
      } else {
        $q ="UPDATE tb_rekap SET rekap_keljumlah=rekap_keljumlah+1 WHERE rekap_tahun='$tahun' AND rekap_bulan='$bulan'";
        mysqli_query($koneksi,$q);
      }
      if ($kel_kondisi=="Isman"){
        $q ="UPDATE tb_rekap SET rekap_kelisman=rekap_kelisman+1 WHERE rekap_tahun='$tahun' AND rekap_bulan='$bulan'";
        mysqli_query($koneksi,$q);
      } else if ($kel_kondisi=="Rujuk"){
        $q ="UPDATE tb_rekap SET rekap_kelrujuk=rekap_kelrujuk+1 WHERE rekap_tahun='$tahun' AND rekap_bulan='$bulan'";
        mysqli_query($koneksi,$q);
      } else if ($kel_kondisi=="Sembuh"){
        $q ="UPDATE tb_rekap SET rekap_kelsembuh=rekap_kelsembuh+1 WHERE rekap_tahun='$tahun' AND rekap_bulan='$bulan'";
        mysqli_query($koneksi,$q);
      } else if ($kel_kondisi=="Meninggal"){
        $q ="UPDATE tb_rekap SET rekap_kelmeninggal=rekap_kelmeninggal+1 WHERE rekap_tahun='$tahun' AND rekap_bulan='$bulan'";
        mysqli_query($koneksi,$q);
      }
    }


    $sqlx = $koneksi->query("SELECT * FROM tb_rekap");
    while ($datax=$sqlx->fetch_assoc()) {
      $rekap_id     = $datax['rekap_id'];
      $rekap_total  = $datax['rekap_konjumlah']+$datax['rekap_keljumlah'];
      $q ="UPDATE tb_rekap SET rekap_total='$rekap_total' WHERE rekap_id='$rekap_id'";
      mysqli_query($koneksi,$q);
    }
?>