<?php
include 'Koneksi.php';

function displayUserRow($row, $no) {
    echo "<tr>
        <td>$no</td>
        <td>{$row['username']}</td>
        <td>{$row['password']}</td>
        <td>{$row['status']}</td>
        <td>
            <a href='Form-editAdmin.php?id_admin={$row['id_admin']}' class='btn btn-warning btn-sm'>Edit</a>
            <a href='DeleteAdmin.php?id_admin={$row['id_admin']}' class='btn btn-danger btn-sm'>Delete</a>
        </td>
    </tr>";
}

function displayAdminRow($row, $no) {
    echo "<tr>
        <td>$no</td>
        <td>{$row['username']}</td>
        <td>{$row['password']}</td>
        <td>{$row['status']}</td>
        <td>
            <a href='Form-editAdmin.php?id_admin={$row['id_admin']}' class='btn btn-warning btn-sm'>Edit</a>
            <a href='DeleteAdmin.php?id_admin={$row['id_admin']}' class='btn btn-danger btn-sm'>Delete</a>
        </td>
    </tr>";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sistem Informasi Akademik</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        main {
            flex: 1;
            margin-bottom: 60px;
        }

        .footer {
            background-color: #343a40;
            color: white;
            text-align: center;
            padding: 10px 0;
            width: 100%;
        }

        .footer p {
            margin-bottom: 0;
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container">
        <a class="navbar-brand" href="index.php">Sistem Informasi Akademik</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-link active" aria-current="page" href="ListAdmin.php">Home</a>
                <a class="nav-link" href="Form-input.php">Mahasiswa</a>
                <a class="nav-link" href="Form-inputWali.php">Wali</a>
                <a class="nav-link" href="Form-inputAdmin.php">Admin</a>
            </div>
        </div>
    </div>
</nav>


<main class="container mt-4">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Daftar Admin</h5>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>USERNAME</th>
                        <th>PASSWORD</th>
                        <th>STATUS</th>
                        <th>ACTION</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    $admin = mysqli_query($koneksi, "SELECT * FROM admin");
                    $no = 1;
                    foreach ($admin as $row) {
                        if ($row['status'] == 'admin') {
                            displayAdminRow($row, $no);
                            $no++;
                        }
                    }
                ?>
                </tbody>
            </table>
        </div>
    </div>
</main>

<main class="container mt-4">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Daftar User</h5>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>USERNAME</th>
                        <th>PASSWORD</th>
                        <th>STATUS</th>
                        <th>ACTION</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    $no = 1;
                    foreach ($admin as $row) {
                        if ($row['status'] == 'user') {
                            displayUserRow($row, $no);
                            $no++;
                        }
                    }
                ?>
                </tbody>
            </table>
        </div>
    </div>
</main>

<main class="container mt-4">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Daftar Mahasiswa</h5>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>NIM</th>
                        <th>NAMA</th>
                        <th>GENDER</th>
                        <th>JURUSAN</th>
                        <th>ALAMAT</th>
                        <th>NAMA WALI</th>
                        <th>ACTION</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include 'Koneksi.php';

                    $query = "SELECT mahasiswa.*, wali.nama_wali
                            FROM mahasiswa
                            LEFT JOIN wali ON mahasiswa.id_wali = wali.id_wali";
                    $result = mysqli_query($koneksi, $query);

                    $no = 1;
                    while ($row = mysqli_fetch_assoc($result)) {
                        $jenis_kelamin = $row['jenis_kelamin'] == 'P' ? 'perempuan' : 'Laki-Laki';
                        echo "<tr>
                                <td>$no</td>
                                <td>" . $row['nim'] . "</td>
                                <td>" . $row['nama'] . "</td>
                                <td>" . $jenis_kelamin . "</td>
                                <td>" . $row['jurusan'] . "</td>
                                <td>" . $row['alamat'] . "</td>
                                <td>" . $row['nama_wali'] . "</td>
                                <td>
                                    <a href='Form-edit.php?id_mhs=$row[id_mhs]' class='btn btn-warning btn-sm'>Edit</a>
                                    <a href='Delete.php?id_mhs=$row[id_mhs]' class='btn btn-danger btn-sm'>Delete</a>
                                </td>
                            </tr>";
                        $no++;
                    }
                    ?>
                </tbody>
            </table>
            <button class="btn btn-primary">
                <a href="ListWali.php" class="text-white text-decoration-none">Lihat data wali</a>
            </button>
        </div>
    </div>
</main>

<footer class="footer">
    <div class="container">
        <p>&copy; 2023 All Rights Reserved.</p>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>
</html>