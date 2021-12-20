<?php
session_start();
if(isset($_SESSION['no_rm'])){
    $no_rm = $_SESSION['no_rm'];

    if($no_rm == 'adminRS'){
        header('location: admin');
    }elseif($no_rm == null){
        header('location: ../login');
    }else{
        header('location: user');
    }
}else{
    header('location: ../login');
}
