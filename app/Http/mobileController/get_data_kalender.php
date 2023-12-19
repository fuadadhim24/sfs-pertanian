<?php
$response = array();

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    include_once("../../../config/database.php");

    $query = "SELECT bibit.id_bibit, bibit.nama_bibit, bibit.deskripsi_singkat as 'bibit.deskripsi_singkat', bibit.kelebihan as 'bibit.kelebihan', bibit.durasi_penanaman, bibit.durasi_anakan, bibit.durasi_bunting, bibit.durasi_pemasakan, bibit.gambar_path_main as 'bibit.gambar_path_main',
    sawah.id_sawah, sawah.deskripsi as 'sawah.deskripsi', sawah.nama_sawah, sawah.lokasi_sawah, sawah.luas_sawah, sawah.created_at,
    detail_sawah.id_detail_sawah, detail_sawah.jumlah_benih, detail_sawah.tanggal_tanam, detail_sawah.jumlah_benih,
    masa_panen.id_masa_panen, masa_panen.tanggal_panen, masa_panen.jumlah_panen, masa_panen.quest_1, masa_panen.quest_2, masa_panen.quest_3, masa_panen.quest_4,
    users.id_user,users.nama_depan,users.nama_belakang,users.no_handphone, users.alamat,users.email, users.tanggal_lahir,users.tanggal_daftar, users.gambar_path as 'users.gambar_path' FROM bibit, sawah, detail_sawah, masa_panen, users WHERE sawah.id_sawah = $id;";
    
    $result = mysqli_query($conn, $query);

    $data = mysqli_fetch_array($result);

    // Ambil tanggal tanam dari $sawah
    $tanggal_tanam = new DateTime($data['tanggal_tanam']);
    $durasi_penanaman = $data['durasi_penanaman'];
    $durasi_anakan = $data['durasi_anakan'];
    $durasi_bunting = $data['durasi_bunting'];
    $durasi_pemasakan = $data['durasi_pemasakan'];

    // Hitung tanggal-tanggal berdasarkan durasi
    $tanggal_anakan = clone $tanggal_tanam;
    $tanggal_anakan->add(new DateInterval("P{$durasi_penanaman}D"))->add(new DateInterval("P1D"));

    $tanggal_bunting = clone $tanggal_anakan;
    $tanggal_bunting->add(new DateInterval("P{$durasi_anakan}D"))->add(new DateInterval("P1D"));

    $tanggal_pemasakan = clone $tanggal_bunting;
    $tanggal_pemasakan->add(new DateInterval("P{$durasi_bunting}D"))->add(new DateInterval("P1D"));

    $tanggal_panen = clone $tanggal_pemasakan;
    $tanggal_panen->add(new DateInterval("P{$durasi_pemasakan}D"))->add(new DateInterval("P1D"));

    $durasiPenanaman = $tanggal_tanam->format('j M') . " - " . $tanggal_anakan->format('j M');
    $durasiAnakan = ($tanggal_anakan->format('j M')) . " - " . $tanggal_bunting->format('j M');
    $durasiBunting = ($tanggal_bunting->format('j M')) . " - " . $tanggal_pemasakan->format('j M');
    $durasiPemasakan = ($tanggal_pemasakan->format('j M')) . " - " . $tanggal_pemasakan->add(new DateInterval("P{$durasi_pemasakan}D"))->format('j M');
    $durasiPanen = ($tanggal_pemasakan->format('j M')) . " - " . $tanggal_panen->format('j M');

    // Prepare response
    $response['durasiPenanaman'] = $durasiPenanaman;
    $response['durasiAnakan'] = $durasiAnakan;
    $response['durasiBunting'] = $durasiBunting;
    $response['durasiPemasakan'] = $durasiPemasakan;
    $response['durasiPanen'] = $durasiPanen;

    mysqli_close($conn);
}

// Convert response to JSON and echo it
echo json_encode($response);
?>
