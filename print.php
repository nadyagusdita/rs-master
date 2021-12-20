<?php
$rm = $_GET['rm'];
$antri = $_GET['no_antri'];
$tgl = $_GET['tgt'];
$doc = $_GET['doc'];
$skr = $_GET['skr'];
?>
<div class="align-content-center">
    <div style="border: #0b2e13 1px;height: 325px; background-color: lightgrey; width:450px; padding: 10px; font-family: "Raleway", sans-serif; ">
        <div style="text-align: center">
            <h3>No Antrian</h3>
            <h2><?php echo $antri ?></h2>
        </div>

        <div style="text-align: left; padding: 10px">
            <h3>No Rekam Medis &nbsp;<?php echo $rm?></h3>
            <h3>Nama Dokter &nbsp;<?php echo $doc ?></h3>
            <h3>Terdaftar Pada &nbsp;<?php echo $tgl  ?></h3><br>
            <h3 style="text-align: right; margin-bottom:5px "><i>Pendaftaran <?php echo $skr ?></i></h3>
        </div>
    </div>
</div>

<script>
    window.print();
</script>
