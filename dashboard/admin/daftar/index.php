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
                            <h3>Antrian</h3>
                            <p class="text-subtitle text-muted">Kelola antrian</p>
                        </div>

                        <div class="col-12 col-md-6 order-md-2 order-first float-end">
                            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Antrian</li>
                                </ol>
                            </nav>
                        </div>
                    </div>

                </div>
            </div>

            <section class="section">
                <div class="card">
                    <div class="card-body">
                        <table class="table table-striped" id="table1">
                            <thead>
                                <tr>
                                    <th class="text-center">No Antrian</th>
                                    <th class="text-center">No Rekam Medis</th>
                                    <th class="text-center">Nama</th>
                                    <th class="text-center">Tanggal Antrian</th>
                                    <th class="text-center">Tanggal Pendaftaran</th>
                                    <th>Activity</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $sql = "SELECT daftar.no_antrian, daftar.status, daftar.no_rm, pasien.nama, daftar.tglDatangDaftar, daftar.waktu FROM daftar JOIN pasien WHERE pasien.no_rm = daftar.no_rm ORDER BY waktu DESC ";

                                $result = $conn->query($sql);

                                if ($result->num_rows > 0) :
                                    while ($row = $result->fetch_object()) :
                                ?>
                                        <tr>
                                            <td class="text-center"><?php echo $row->no_antrian ?></td>
                                            <td class="text-center"><?php echo $row->no_rm ?></td>
                                            <td class="text-center"><?php echo $row->nama ?></td>
                                            <td class="text-center"><?php echo $row->tglDatangDaftar ?></td>
                                            <td class="text-center"><?php echo $row->waktu ?></td>
                                            <td>
                                                <button class="btn btn-sm btn-danger" onclick="deleteReg('<?php echo $row->no_antrian ?>')"><i class="bi bi-trash"></i></button>
                                                <?php
                                                if ($row->status == 0) : ?>
                                                    <button class="btn btn-sm btn-success" onclick="completeReg('<?php echo $row->no_antrian ?>')"><i class="bi bi-check"></i></button>
                                                <?php
                                                else : ?>
                                                    <button class="btn btn-sm btn-light" disabled><i class="bi bi-check"></i></button>
                                                <?php
                                                endif; ?>
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

    <script src="../../template/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="../../template/js/bootstrap.bundle.min.js"></script>

    <script src="../../template/vendors/simple-datatables/simple-datatables.js"></script>
    <script>
        let table1 = document.querySelector('#table1');
        let dataTable = new simpleDatatables.DataTable(table1);
    </script>

    <script src="../../template/js/main.js"></script>
    <script src="../_function.js"></script>
</body>

</html>