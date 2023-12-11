<?php
include 'Koneksi.php';

$id_wali = $_GET['id_wali'];

$query = "SELECT * FROM wali WHERE id_wali='$id_wali'";
$waliQuery = mysqli_query($koneksi, $query);
$row = mysqli_fetch_array($waliQuery);

function active_radio_button($value, $input)
{
    return isset($input) && $value === $input ? 'checked' : '';
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
                <a class="nav-link" href="Home.php">Home</a>
                <a class="nav-link" href="Form-input.php">Mahasiswa</a>
                <a class="nav-link active" aria-current="page" href="Form-inputWali.php">Wali</a>
                <a class="nav-link disabled" aria-disabled="true">Admin</a>
            </div>
        </div>
    </div>
</nav>

    <div class="container mt-5">
        <form action="UpdateWali.php" method="post">
            <input type="hidden" value="<?php echo $row['id_wali'] ?>" name="id_wali">
            <div class="mb-3">
                <label for="inputText3" class="form-label">Nama</label>
                <input type="text" class="form-control" id="inputText3" value="<?php echo $row['nama_wali'] ?>" name="nama_wali">
            </div>
            <fieldset class="mb-3">
                <legend class="col-form-label">Jenis Kelamin</legend>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="jenis_kelamin" value="L" id="gridRadios1" <?php echo active_radio_button('L', $row['jenis_kelamin']) ?>>
                    <label class="form-check-label" for="gridRadios1">Laki-laki</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="jenis_kelamin" value="P" id="gridRadios2" <?php echo active_radio_button('P', $row['jenis_kelamin']) ?>>
                    <label class="form-check-label" for="gridRadios2">Perempuan</label>
                </div>
            </fieldset>
            <div class="mb-3">
                <label for="inputText3" class="form-label">Alamat</label>
                <input type="text" class="form-control" id="inputText3" value="<?php echo $row['alamat'] ?>" name="alamat">
            </div>
            <button type="submit" class="btn btn-primary">Kirim</button>
        </form>
    </div>
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