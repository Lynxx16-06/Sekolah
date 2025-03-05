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

if ($data && isset($data->nama)) {
    $nama = $conn->real_escape_string($data->nama);
    $hari_jam = $conn->real_escape_string($data->hari_jam);
    $selesai = $conn->real_escape_string($data->selesai);
    $keterangan = $conn->real_escape_string($data->keterangan);

    $sql = "INSERT INTO kegiatan (nama, hari_jam, selesai, keterangan) VALUES ('$nama', '$hari_jam', '$selesai', '$keterangan')";

    if ($conn->query($sql) === TRUE) {
        echo json_encode(["success" => true, "id" => $conn->insert_id]);
    } else {
        echo json_encode(["success" => false]);
    }
} else {
    echo json_encode(["success" => false]);
}
?>
