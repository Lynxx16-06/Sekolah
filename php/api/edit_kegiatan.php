<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    exit();
}

include '../config/db.php';

$data = json_decode(file_get_contents("php://input"));

if ($data && isset($data->id)) {
    $id = intval($data->id);
    $nama = $conn->real_escape_string($data->nama);
    $hari_jam = $conn->real_escape_string($data->hari_jam);
    $selesai = $conn->real_escape_string($data->selesai);
    $keterangan = $conn->real_escape_string($data->keterangan);

    $sql = "UPDATE kegiatan SET 
            nama='$nama', 
            hari_jam='$hari_jam', 
            selesai='$selesai', 
            keterangan='$keterangan' 
            WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo json_encode(["message" => "Data berhasil diperbarui"]);
    } else {
        echo json_encode(["message" => "Gagal memperbarui data"]);
    }
} else {
    echo json_encode(["message" => "Data tidak valid"]);
}
?>
