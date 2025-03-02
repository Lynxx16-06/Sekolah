<?php
header('Content-Type: application/json');
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, DELETE");
header("Access-Control-Allow-Headers: Content-Type");

include 'config/db.php';

$method = $_SERVER['REQUEST_METHOD'];

if ($method === 'GET') {
    // Ambil Data Pengguna
    $sql = "SELECT id, nama, email, pw FROM main"; // Ambil password (hashed)
    $result = $conn->query($sql);

    $users = [];
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $users[] = [
                "id" => $row["id"],
                "nama" => $row["nama"],
                "email" => $row["email"],
                "pw" => $row["pw"] // Password tetap dalam bentuk hash
            ];
        }
    }

    echo json_encode($users);
}

if ($method === 'POST') {
    // Tambah Data Pengguna
    $data = json_decode(file_get_contents("php://input"), true);
    
    if (!isset($data['nama']) || !isset($data['email']) || !isset($data['pw'])) {
        echo json_encode(["error" => "Data tidak lengkap"]);
        exit();
    }

    $nama = $conn->real_escape_string($data['nama']);
    $email = $conn->real_escape_string($data['email']);
    $pw = password_hash($data['pw'], PASSWORD_DEFAULT); // Hash password!

    $sqladd = "INSERT INTO main (nama, email, pw) VALUES ('$nama', '$email', '$pw')";
    
    if ($conn->query($sqladd) === TRUE) {
        echo json_encode(["success" => "Pengguna berhasil ditambahkan"]);
    } else {
        echo json_encode(["error" => "Gagal menambah pengguna"]);
    }
}

if ($method === 'DELETE') {
    // Hapus Data Pengguna
    if (!isset($_GET['id'])) {
        echo json_encode(["error" => "ID pengguna tidak diberikan"]);
        exit();
    }

    $id = intval($_GET['id']);
    $sqlDel = "DELETE FROM main WHERE id = $id";

    if ($conn->query($sqlDel) === TRUE) {
        echo json_encode(["success" => "Pengguna berhasil dihapus"]);
    } else {
        echo json_encode(["error" => "Gagal menghapus pengguna"]);
    }
}

$conn->close();
?>
