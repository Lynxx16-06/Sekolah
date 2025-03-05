<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");

include 'config/db.php';

$method = $_SERVER['REQUEST_METHOD'];

if ($method === 'GET') {
    $sql = "SELECT id, nama, hari_jam, selesai, keterangan FROM kegiatan"; 
    $result = $conn->query($sql);

    if (!$result) {
        echo json_encode(["error" => "Query gagal: " . $conn->error]);
        exit;
    }

    $users = [];
    while ($row = $result->fetch_assoc()) {
        $users[] = [
            "id" => $row["id"],
            "nama" => $row["nama"],
            "hari_jam" => $row["hari_jam"],
            "selesai" => $row["selesai"],
            "keterangan" => $row["keterangan"],
        ];
    }

    echo json_encode($users);
}

$conn->close();
?>
