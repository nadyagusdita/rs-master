<?php
// session_start();
// if ($_SESSION['no_rm'] == 'adminRS') {
//     $no_rm = $_SESSION['no_rm'];
//     include "../../connect.php";
// } else {
//     header("location: ../../login");
// }

include "../../connect.php";

$p = @$_GET['page'];

if ($p == 'pendaftar') :
    require_once 'daftar/index.php';

elseif ($p == 'poliklinik') :
    include "poliklinik/index.php";
elseif ($p == 'tambahpoli') :
    include "poliklinik/tambah.php";
elseif ($p == 'editpoli') :
    include "poliklinik/edit.php";

elseif ($p == 'dokter') :
    include "dokter/index.php";
elseif ($p == 'tambahdokter') :
    include "dokter/tambah.php";
elseif ($p == 'editdokter') :
    include "dokter/edit.php";

elseif ($p == 'jadwal') :
    include "jadwal/index.php";
elseif ($p == 'tambahjadwal') :
    include "jadwal/tambah.php";
elseif ($p == 'editjadwal') :
    include "jadwal/edit.php";

elseif ($p == 'user') :
    include "user/index.php";
endif;

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Sistem Informasi BEM KM FTI</title>

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
            <header>
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>

            <div class="page-content">
                <section class="row">
                    <div class="col-12 col-lg-9">
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4>Status</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-4">
                                                <div class="c-callout c-callout-info"><small class="text-muted">Pasien</small>
                                                    <div class="text-value-lg">
                                                        <?php
                                                        $result = $conn->query("SELECT COUNT(no_rm) as no_rm FROM pasien");
                                                        if ($result->num_rows > 0) {
                                                            while ($data = $result->fetch_object()) :
                                                                echo $data->no_rm;
                                                            endwhile;
                                                        } else {
                                                            echo "Tidak ada data pasien";
                                                        }
                                                        ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- /.col-->
                                            <div class="col-4">
                                                <div class="c-callout c-callout-danger"><small class="text-muted">Pendaftar Hari Ini</small>
                                                    <div class="text-value-lg">
                                                        <?php
                                                        $result = $conn->query("SELECT COUNT(no_antrian) as no FROM daftar WHERE year(waktu) = year(now()) AND month(waktu) = month(now()) AND day(waktu) = day(now())");
                                                        if ($result->num_rows > 0) {
                                                            while ($data = $result->fetch_object()) :
                                                                if ($data->no == 0) {
                                                                    echo "Tidak ada";
                                                                } else {
                                                                    echo $data->no;
                                                                }

                                                            endwhile;
                                                        } else {
                                                            echo "Tidak ada data pasien";
                                                        }
                                                        ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- /.col-->
                                            <div class="col-4">
                                                <div class="c-callout c-callout-danger"><small class="text-muted">Jumlah Dokter</small>
                                                    <div class="text-value-lg">
                                                        <?php
                                                        $result = $conn->query("SELECT COUNT(id_dokter) as no FROM dokter");
                                                        if ($result->num_rows > 0) {
                                                            while ($data = $result->fetch_object()) :
                                                                echo $data->no;
                                                            endwhile;
                                                        } else {
                                                            echo "Tidak ada data pasien";
                                                        }
                                                        ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>




    <script src="../../template/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="../../template/js/bootstrap.bundle.min.js"></script>

    <script src="../../template/vendors/apexcharts/apexcharts.js"></script>
    <script src="../../template/js/pages/dashboard.js"></script>

    <script src="../../template/js/main.js"></script>
    <script src="../_function.js"></script>
</body>

</html>