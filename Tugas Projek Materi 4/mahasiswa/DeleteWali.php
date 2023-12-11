<?php
include 'Koneksi.php';
$id_wali = $_GET['id_wali'];
$query = "DELETE from admin where id_wali='$id_wali'";
mysqli_query($koneksi,$query);
header("location:HomeWali.php");
?>