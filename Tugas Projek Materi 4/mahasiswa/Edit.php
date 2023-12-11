<?php
include 'Koneksi.php';
$id_mhs         = $_POST['id_mhs'];
$nim            = $_POST['nim'];
$nama           = $_POST['nama'];
$jurusan        = $_POST["jurusan"];
$jenis_kelamin  = $_POST['jenis_kelamin'];
$id_wali        = $_POST['id_wali'];
$alamat         = $_POST['alamat'];

$query = "UPDATE mahasiswa SET nim='$nim',nama='$nama',jurusan='$jurusan',jenis_kelamin='$jenis_kelamin',id_wali='$id_wali',alamat='$alamat' where id_mhs='$id_mhs' ";

mysqli_query($koneksi,$query);

header("location:Home.php");
?>