<?php
include 'Koneksi.php';

$nim            = $_POST['nim'];
$nama           = $_POST['nama'];
$jurusan        = $_POST['jurusan'];
$jenis_kelamin  = $_POST['jenis_kelamin'];
$alamat         = $_POST['alamat'];
$id_wali        = $_POST['id_wali'];

// Pastikan bahwa id_wali yang dimasukkan ada di tabel wali
$query_check_wali = "SELECT * FROM wali WHERE id_wali = '$id_wali'";
$result_check_wali = mysqli_query($koneksi, $query_check_wali);

if (mysqli_num_rows($result_check_wali) > 0) {
    // id_wali valid, lakukan INSERT
    $query = "INSERT INTO mahasiswa (nim, nama, jurusan, jenis_kelamin, alamat, id_wali) VALUES ('$nim', '$nama', '$jurusan', '$jenis_kelamin', '$alamat', '$id_wali')";
    mysqli_query($koneksi, $query);
    header("location:Home.php");
} else {
    // id_wali tidak valid
    echo "ID Wali tidak valid.";
}
?>