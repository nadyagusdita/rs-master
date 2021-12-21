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
                            <h3>Jadwal</h3>
                            <p class="text-subtitle text-muted">Jadwal Dokter</p>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 order-md-2 order-first float-end">
                        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Dokter</li>
                            </ol>
                        </nav>
                    </div>
                    <a href="?page=tambahjadwal" class="btn btn-primary">Tambah Jadwal</a>
                </div>
            </div>

            <section class="section">
                <div class="card">
                    <div class="card-body">
                        <table class="table table-striped" id="table1">
                            <thead>
                                <tr>
                                    <th class="text-center">No</th>
                                    <th class="text-center">Nama Dokter</th>
                                    <th class="text-center">Spesialis</th>
                                    <th class="text-center">Poliklinik</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $sql = "SELECT dokter.*, poli.nama_poli FROM mpsi.dokter join poli on dokter.id_poli = poli.id_poli";

                                $result = $conn->query($sql);

                                if ($result->num_rows > 0) :
                                    $i = 1;
                                    while ($row = $result->fetch_object()) :
                                ?>
                                        <tr>
                                            <td class="text-center"><?php echo $i++ ?></td>
                                            <td class="text-center"><?php echo $row->nama_dokter ?></td>
                                            <td class="text-center"><?php echo $row->spesialis ?></td>
                                            <td class="text-center"><?php echo $row->nama_poli ?></td>
                                            <td>
                                                <button class="btn btn-sm btn-danger" onclick="deleteReg('<?php echo $row->no_antrian ?>')"><i class="bi bi-trash"></i></button>
                                            </td>
                                        </tr>
                                <?php
                                    endwhile;
                                endif;
                                ?>
                            </tbody>
                        </table>
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