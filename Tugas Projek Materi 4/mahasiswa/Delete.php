<?php
include 'Koneksi.php';

$id_mhs = $_GET['id_mhs'];
$id_wali = $_GET['id_wali'];

// Hapus data dari tabel mahasiswa
$query_mahasiswa = "DELETE FROM mahasiswa WHERE id_mhs = '$id_mhs'";
mysqli_query($koneksi, $query_mahasiswa);

// Hapus data dari tabel wali
$query_wali = "DELETE FROM wali WHERE id_wali = '$id_wali'";
mysqli_query($koneksi, $query_wali);

header("location:Home.php");
?>
