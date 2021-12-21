<?php

$id = $_GET['id_dokter'];

$rs = mysqli_query($conn, "SELECT * FROM dokter INNER JOIN poli ON dokter.id_poli = poli.id_poli WHERE id_dokter = $id");
$old = mysqli_fetch_assoc($rs);

if (isset($_POST['submit'])) {
    $nama = $_POST['nama'];
    $spesialis = $_POST['spesialis'];
    $poli = $_POST['poli'];

    $update = "UPDATE dokter SET nama_dokter = '$nama', spesialis = '$spesialis', id_poli = $poli WHERE id_dokter = $id";

    $exec = $conn->query($update);
    if ($conn->affected_rows > 0) {
        header("location: ?page=dokter");
    } else {
        header("location: ?page=dokter");
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="../../template/css/bootstrap.css">
    <link rel="stylesheet" href="../../template/vendors/iconly/bold.css">

    <link rel="stylesheet" href="../../template/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="../../template/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="../../template/css/app.css">
    <link rel="shortcut icon" href="../../template/images/favicon.svg" type="image/x-icon">
</head>

<body>
    <div id="app">
        <?php include 'sidebar.php' ?>

        <div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>

            <div class="page-heading">
                <div class="page-title">
                    <div class="row">
                        <div class="col-12 col-md-6 order-md-1 order-last">
                            <h3>Dokter</h3>
                            <p class="text-subtitle text-muted">Edit Dokter</p>
                        </div>

                        <div class="col-12 col-md-6 order-md-2 order-first float-end">
                            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Dokter</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                    <!-- <a href="../index.php" class="btn btn-primary">Kembali</a> -->
                </div>
            </div>

            <section class="section">
                <div class="card">
                    <div class="card-body">
                        <form class="form form-vertical" method="POST" action="">
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group mb-3">
                                            <label for="nama" class="mb-1">Nama Dokter</label>
                                            <input class="form-control" type="text" id="nama" name="nama" value="<?= $old['nama_dokter']; ?>" required>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group mb-3">
                                            <label for="spesialis" class="mb-1">Spesialis</label>
                                            <select id="spesialis" name="spesialis" class="form-control">
                                                <option value="<?= $old['spesialis']; ?>"><?= $old['spesialis']; ?></option>
                                                <option value="Anak">Anak</option>
                                                <option value="Jantung">Jantung</option>
                                                <option value="THT">THT</option>
                                                <option value="Gigi & Mulut">Gigi & Mulut</option>
                                                <option value="Syaraf">Syaraf</option>
                                                <option value="Bedah Anak">Bedah Anak</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group mb-3">
                                            <label for="poli" class="mb-1">Poli</label>
                                            <select id="poli" name="poli" class="form-control">
                                                <?php
                                                $query = $conn->query("SELECT * FROM poli");
                                                while ($qtabel = $query->fetch_assoc()) {
                                                    if ($qtabel['id_poli'] == $old['id_poli']) {
                                                        echo '<option value="' . $qtabel['id_poli'] . '" disabled selected>' . $qtabel['nama_poli'] . '</option>';
                                                    }
                                                    echo '<option value="' . $qtabel['id_poli'] . '">' . $qtabel['nama_poli'] . '</option>';
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-12 d-flex justify-content-end">
                                        <button type="submit" class="btn btn-primary me-1 mb-1" name="submit">Submit</button>
                                        <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </section>
        </div>
    </div>

    <script src="assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/main.js"></script>
</body>

</html>