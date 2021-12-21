function completeReg(id){
    window.location.href = "daftar/update.php?no_antrian="+id;
}

function deleteReg(id){
    window.location.href = "daftar/delete.php?no_antrian="+id;
}

function deleteRegUser(id){
    window.location.href = "daftar/delete.php?no_antrian="+id;
}

function deleteDok(id){
    window.location.href = "dokter/delete.php?id_dokter="+id;
}

function printReg(id){
    window.location.href = "user/daftar/print.php?no_antrian="+id;
}