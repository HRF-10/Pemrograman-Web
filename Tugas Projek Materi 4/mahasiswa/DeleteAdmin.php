<?php
include 'Koneksi.php';
$id_admin = $_GET['id_admin'];
$query = "DELETE from admin where id_admin='$id_admin'";
mysqli_query($koneksi,$query);
header("location:HomeAdmin.php");
?>