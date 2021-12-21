<?php

$id_jadwal = $_GET['id_jadwal'];
$id_dokter = $_GET['id_dokter'];

$rs = mysqli_query($conn, "SELECT * FROM jadwal_dokter 
INNER JOIN dokter ON dokter.id_dokter = jadwal_dokter.id_dokter 
INNER JOIN jadwal ON jadwal.id_jadwal = jadwal_dokter.id_jadwal
WHERE jadwal_dokter.id_jadwal = $id_jadwal AND dokter.id_dokter = $id_dokter") or die(mysqli_error($conn));;
$old = mysqli_fetch_assoc($rs);

$old_jadwal = $old['id_jadwal'];
$old_dokter = $old['id_dokter'];

if (isset($_POST['submit'])) {
    $id_jadwal = $_POST['id_jadwal'];
    $id_dokter = $_POST['id_dokter'];

    $update = "UPDATE jadwal_dokter SET id_jadwal = $id_jadwal, id_dokter = $id_dokter
    WHERE id_jadwal = $old_jadwal AND id_dokter = $old_dokter";

    $exec = $conn->query($update);
    if ($conn->affected_rows > 0) {
        header("location: ?page=jadwal");
    } else {
        header("location: ?page=jadwal");
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
                            <h3>Jadwal Dokter</h3>
                            <p class="text-subtitle text-muted">Edit Jadwal Dokter</p>
                        </div>

                        <div class="col-12 col-md-6 order-md-2 order-first float-end">
                            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Jadwal Dokter</li>
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
                                            <label for="id_dokter" class="mb-1">Nama Dokter</label>
                                            <select id="id_dokter" name="id_dokter" class="form-control">
                                                <?php
                                                $query = $conn->query("SELECT * FROM dokter");
                                                while ($qtabel = $query->fetch_assoc()) {
                                                    if ($qtabel['id_dokter'] == $old['id_dokter']) {
                                                        echo '<option value="' . $qtabel['id_dokter'] . '" disabled selected>' . $qtabel['nama_dokter'] . '</option>';
                                                    }
                                                    echo '<option value="' . $qtabel['id_dokter'] . '">' . $qtabel['nama_dokter'] . '</option>';
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group mb-3">
                                            <label for="id_jadwal" class="mb-1">Jadwal Dokter</label>
                                            <select id="id_jadwal" name="id_jadwal" class="form-control">
                                                <?php
                                                $query = $conn->query("SELECT * FROM jadwal");
                                                while ($qtabel = $query->fetch_assoc()) {
                                                    if ($qtabel['id_jadwal'] == $old['id_jadwal']) {
                                                        echo '<option value="' . $qtabel['id_jadwal'] . '" disabled selected>' . $qtabel['hari'] .
                                                            '-' . $qtabel['jam_mulai'] . '-' . $qtabel['jam_selesai'] . '</option>';
                                                    }
                                                    echo '<option value="' . $qtabel['id_jadwal'] . '">' . $qtabel['hari'] . '-' . $qtabel['jam_mulai'] . '-' . $qtabel['jam_selesai'] . '</option>';
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