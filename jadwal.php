<?php

include "connect.php";

if(!empty($_POST['id_poli'])){
    $q = "SELECT * FROM dokter WHERE id_poli = ".$_POST['id_poli'];
    $r = $conn->query($q);
    if($r->num_rows > 0){
        echo "<option selected disabled value=''>Pilih Dokter</option>";

        while ($data = $r->fetch_object()):
            echo "<option value=".$data->id_dokter.">".$data->nama_dokter."</option>";
        endwhile;
    }else{
        echo "<option selected disabled value=''>Tidak Ada Dokter</option>";
    }
}elseif (!empty($_POST['id_dokter'])){
    $q = "SELECT jadwal.* FROM jadwal_dokter JOIN jadwal ON jadwal.id_jadwal = jadwal_dokter.id_jadwal WHERE jadwal_dokter.id_dokter=".$_POST['id_dokter'];
    $r = $conn->query($q);
    if($r->num_rows > 0){
        echo "<option selected disabled value=''>Pilih Jadwal</option>";
        while ($data = $r->fetch_object()):
            echo "<option value=".$data->id_jadwal.">".$data->hari.", ".$data->jam_mulai."-".$data->jam_selesai."</option>";
        endwhile;
    }
}
