<?php
session_start();
if (isset($_GET['no_antrian'])) :
    include "../../../connect.php";
    $no_antrian = $_GET['no_antrian'];

    $result = $conn->query("UPDATE daftar SET status = 1 WHERE no_antrian = '$no_antrian'");

    if ($conn->affected_rows > 0) {
        header('location: ../index.php');
    } else {
        header('location: ../index.php');
    }
endif;
