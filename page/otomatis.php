<?php

//membuat koneksi ke database
$koneksi = mysqli_connect("localhost", "root", "", "pegcovid1");

//variabel nim yang dikirimkan form.php
$kon_peg_nik = $_GET['kon_peg_nik'];

//mengambil data
$query = mysqli_query($koneksi, "select * from tb_peg where peg_nik='$kon_peg_nik'");
$pegawai = mysqli_fetch_array($query);
$data = array(
            'peg_nip'      =>  $pegawai['peg_nip'],
            'peg_stapeg'   =>  $pegawai['peg_stapeg']);

//tampil data
echo json_encode($data);
?>