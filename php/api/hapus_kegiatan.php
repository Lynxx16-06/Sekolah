<?php
// Tambahkan header CORS
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");

// Cek apakah request adalah preflight (OPTIONS)
if ($_SERVER['REQUEST_METHOD'] == "OPTIONS") {
    http_response_code(200);
    exit();
}

include '../config/db.php'; // Sesuaikan dengan struktur proyek Anda

$data = json_decode(file_get_contents("php://input"));

if ($data && isset($data->id)) {
    $id = intval($data->id);  // Pastikan ID adalah angka

    $sql = "DELETE FROM kegiatan WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        echo json_encode(["message" => "Data berhasil dihapus"]);
    } else {
        echo json_encode(["message" => "Gagal menghapus data"]);
    }
} else {
    echo json_encode(["message" => "Data tidak valid"]);
}
?>
