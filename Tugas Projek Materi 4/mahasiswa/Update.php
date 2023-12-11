<?php
include 'Koneksi.php';
$id_mhs         = $_POST['id_mhs'];
$nim            = $_POST['nim'];
$nama           = $_POST['nama'];
$jurusan        = $_POST['jurusan'];
$jenis_kelamin  = $_POST['jenis_kelamin'];
$alamat         = $_POST['alamat'];
$id_wali        = $_POST['id_wali'];

$query = "UPDATE mahasiswa SET id_wali='$id_wali',nim='$nim',nama='$nama',jurusan='$jurusan',jenis_kelamin='$jenis_kelamin',alamat='$alamat' where id_mhs='$id_mhs' ";

mysqli_query($koneksi,$query);

header("location:Home.php");
?>