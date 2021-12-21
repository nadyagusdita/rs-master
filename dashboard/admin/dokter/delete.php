<?php
session_start();
if (isset($_GET['id_dokter'])) :
    include "../../../connect.php";
    $id_dokter = $_GET['id_dokter'];

    $result = $conn->query("DELETE FROM dokter WHERE id_dokter = $id_dokter");

    if ($conn->affected_rows > 0) {
        header('location: ../index.php');
    } else {
        header('location: ../index.php');
    }
endif;
