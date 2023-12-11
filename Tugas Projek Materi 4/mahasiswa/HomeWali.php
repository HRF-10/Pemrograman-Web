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
                <a class="nav-link active" aria-current="page" href="Home.php">Home</a>
                <a class="nav-link" href="Form-input.php">Mahasiswa</a>
                <a class="nav-link" href="Form-inputWali.php">Wali</a>
                <a class="nav-link disabled" aria-disabled="true">Admin</a>
            </div>
        </div>
    </div>
</nav>

<main class="container mt-4">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Daftar Wali</h5>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>NAMA WALI</th>
                        <th>GENDER</th>
                        <th>ALAMAT</th>
                        <th>ACTION</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include 'Koneksi.php';
                    $wali = mysqli_query($koneksi, "SELECT * FROM wali");
                    $no = 1;
                    foreach ($wali as $row) {
                        echo "<tr>
                            <td>$no</td>
                            <td>" . $row['nama_wali'] . "</td>
                            <td>" . $row['jenis_kelamin'] . "</td>
                            <td>" . $row['alamat'] . "</td>
                            <td>
                                <a href='Form-editWali.php?id_wali=$row[id_wali]' class='btn btn-warning btn-sm'>Edit</a>
                            </td>
                            </tr>";
                        $no++;
                    }
                    ?>
                </tbody>
            </table>
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
