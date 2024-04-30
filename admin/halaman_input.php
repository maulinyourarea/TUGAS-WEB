<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</head>

<body class="container">
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">BASIS DATA</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="../dashboard.html">Home</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                Feature
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="halaman_input.php">Input</a></li>
                                <li><a class="dropdown-item" href="halaman.php">Tampil</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="../data_gambar.html">Gambar</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link disabled" aria-disabled="true"></a>
                        </li>
                    </ul>
                    <form class="d-flex" role="search">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success" type="submit">Search</button>
                    </form>
                </div>
            </div>
        </nav>
    </header>
    <main>

        <?php include ("../inc/inc_koneksi.php");

        $nama = "";
        $pendidikan = "";
        $error = "";
        $sukses = "";

        if (isset($_POST['simpan'])) {
            $nama = $_POST['nama'];
            $pendidikan = $_POST['pendidikan'];

            if ($nama == "" or $pendidikan == "") {
                $error = "Silahkan masukan data";
            }
            if (empty($error)) {
                $query = "INSERT INTO hal VALUE('','$nama','$pendidikan', '')";
                mysqli_query($koneksi, $query);
            }
            if ($query) {
                $sukses = "Sukses memasukkan data";
            } else {
                $error = "Gagal memasukkan data";
            }
        }

        ?>
        <h1>Halaman Admin Input Data</h1>
        <div class="mb-3 row">
            <a href="halaman.php">
                << Kembali ke halaman admin</a>
        </div>
        <?php
        if ($error) {
            ?>
            <div class="alert alert-danger" role="alert">
                <?php echo $error ?>
            </div>
            <?php
        }
        if ($sukses) {
            ?>
            <div class="alert alert-primary" role="alert">
                <?php echo $sukses ?>
            </div>
            <?php
        }
        ?>
        <form action="" method="post">
            <div class="mb-3 row">
                <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="nama" value="<?php echo $nama ?>" name="nama">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="pendidikan" class="col-sm-2 col-form-label">Pendidikan</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="pendidikan" value="<?php echo $pendidikan ?>"
                        name="pendidikan">
                </div>
            </div>
            <div class="mb-3 row">
                <div class="col-sm-2"></div>
                <div class="col-sm-10">
                    <input type="submit" name="simpan" value="Simpan Data" class="btn btn-primary" />
                </div>

        </form>
        <?php include ("inc_footer.php"); ?>