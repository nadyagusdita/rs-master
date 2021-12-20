<?php
include "connect.php";
if (isset($_POST['submit'])) {
    $nama = $_POST['nama'];
    $user = $_POST['username'];
    $password = md5($_POST['password']);
    $tgl = $_POST['tanggal'];
    $agm = $_POST['agama'];
    $jk = $_POST['jk'];
    $pkj = $_POST['pekerjaan'];
    $stat = $_POST['status'];
    $pend = $_POST['pend_terakhir'];
    $kwn = $_POST['kewarganegaraan'];
    $tr = $_POST['cara_pembayaran'];
    $kota = $_POST['kota'];
    $goldar = $_POST['gol_darah'];
    $level = 'user';

    $date = substr($tgl, 2, -6);
    echo $tahunLahir = substr($tgl, 0, -6);
    $prov = substr($kota, 0, -2);
    $kot = substr($kota, 2);
    $hitung = 0;
    $query = "SELECT COUNT(pasien.no_rm) AS hitung FROM pasien WHERE idWilayah = " . $kota . " AND year(tgl_lahir) = " . $tahunLahir;
    $result = $conn->query($query);
    if ($result) {
        while ($data = $result->fetch_object()) {
            $hitung = $data->hitung;
        }
    } else {
        $conn->connect_error;
    }
    echo $hitung++;
    $no_rm = $date . "-" . $prov . "-" . $kot . "-" . $hitung;

    //    var_dump($nama, $tgl, $agm, $jk,$kota, $kwn, $pend, $pkj, $stat, $tr, $prov, $kot, $no_rm, $goldar, $tahunLahir);
    $insert = "INSERT INTO pasien (no_rm, nama, tgl_lahir, agama, gol_darah, status_kawin, pend_terakhir, jk, kewarganegaraan, cara_pembayaran, idWilayah, username, password, level) VALUES ('$no_rm', '$nama', '$tgl', '$agm', '$goldar', '$stat', '$pend', '$jk', '$kwn', '$tr', '$kota', '$user', '$password', '$level')";

    $exec = $conn->query($insert);
    if ($conn->affected_rows > 0) {
        header("Location: pilih_jadwal.php?no_rm=$no_rm");
    } else {
        echo "gagal";
    }
}
