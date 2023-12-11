<?php
include 'Koneksi.php';

$username = $_POST['username'];
$password = $_POST['password'];
$status = $_POST['status'];

// Periksa status dan atur password sesuai
if ($status == 'admin') {
    $password = 'Test010'; // Password admin
} elseif ($status == 'user') {
    $password = 'Test020'; // Password user
}

$query = "INSERT INTO admin SET username='$username', password='$password', status='$status'";
mysqli_query($koneksi, $query);

// Redirect ke halaman yang sesuai berdasarkan status
if ($status == 'admin') {
    header("location:HomeAdmin.php");
} elseif ($status == 'user') {
    header("location:HomeUser.php");
} else {
    // Handle situasi tidak valid
    header("location:Form-inputAdmin.php?error=1");
}
