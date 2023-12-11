<?php
include 'Koneksi.php';
$id_admin       = $_POST['id_admin'];
$username       = $_POST['username'];
$password       = $_POST['password'];
$status         = $_POST['status'];

$query = "UPDATE admin SET username='$username',password='$passwword',status='$status' where id_admin='$id_admin' ";

mysqli_query($koneksi,$query);

header("location:HomeAdmin.php");
?>