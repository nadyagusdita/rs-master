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
    <link rel="stylesheet" href="../../template/vendors/simple-datatables/style.css">

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
                            <p class="text-subtitle text-muted">Kelola Dokter</p>
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
                    <a href="?page=tambahdokter" class="btn btn-primary mb-1">Tambah Data</a>
                    <div class="col-4">
                        <?php if (isset($_GET['berhasil']) == 'yes') : ?>
                            <div class="alert alert-success alert-dismissible show fade">
                                Berhasil.
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        <?php endif; ?>
                    </div>
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
                                                <a href="dokter/delete.php?id_dokter=<?= $row->id_dokter; ?>" class="btn icon btn-danger" onclick="return confirm('Anda yakin ingin menghapus?'); "><i class="bi bi-trash"></i></a>
                                                <a href="?page=editdokter&id_dokter=<?= $row->id_dokter; ?>" class="btn icon btn-warning"><i class="bi bi-pencil"></i></a>

                                                <!-- <button class="btn btn-sm btn-danger" onclick="deleteDok('<?php echo $row->id_dokter ?>')"><i class="bi bi-trash"></i></button> -->
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