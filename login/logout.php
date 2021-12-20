<?php
session_start();
if (isset($_SESSION['no_rm'])){
    session_destroy();
    header('location: index.php');
}
else{
    header('location: index.php');
}
?>
