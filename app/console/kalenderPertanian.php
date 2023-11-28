<?php

function kalender(){
    require_once '../../config/database.php';
    $result = 'SELECT detail_sawah.id_sawah, detail_sawah.tanggal_tanam, detail_sawah.id_bibit, bibit.durasi_penanaman, bibit.durasi_anakan, bibit.durasi_bunting, bibit.durasi_pemasakan FROM detail_sawah JOIN bibit ON bibit.id_bibit=detail_sawah.id_bibit WHERE detail_sawah.id_sawah = $id = $_GET['id'];';
    $sawah = mysqli_fetch_array($result);
}


?>