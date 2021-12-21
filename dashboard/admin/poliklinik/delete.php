<?php
session_start();
if (isset($_GET['id_poli'])) :
    include "../../../connect.php";
    $id_poli = $_GET['id_poli'];

    $result = $conn->query("DELETE FROM poli WHERE id_poli = $id_poli");

    if ($conn->affected_rows > 0) {
        header('location: ../index.php');
    } else {
        header('location: ../index.php');
    }
endif;
