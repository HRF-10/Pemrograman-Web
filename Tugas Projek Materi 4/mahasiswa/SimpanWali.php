<?php
include 'Koneksi.php';
$id_wali        = $_POST['id_wali'];
$nama_wali      = $_POST['nama_wali'];
$jenis_kelamin  = $_POST['jenis_kelamin'];
$alamat         = $_POST['alamat'];

$query = "INSERT INTO wali SET id_wali='$id_wali',nama_wali='$nama_wali',jenis_kelamin='$jenis_kelamin',alamat='$alamat'";
mysqli_query($koneksi,$query);

header("location:Home.php");