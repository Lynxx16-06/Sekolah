<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Content-Type");

include __DIR__ . '/../config/db.php';
// echo __DIR__ . '/../config/db.php';



$method = $_SERVER['REQUEST_METHOD'];

if ($method === 'POST') {
    // Ambil data dari JSON request body
    $data = json_decode(file_get_contents("php://input"), true);

    // Debugging: Simpan input ke file log
    file_put_contents("debug.log", print_r($data, true));

    if (empty($data['username']) || empty($data['pass'])) {
        die("<script>alert('Data tidak lengkap!');</script>");
    }

    $username = trim($data['username']);
    $password = trim($data['pass']);

    file_put_contents("debug.log", "Username: $username, Password: $password\n", FILE_APPEND);

    $sql = "SELECT username, pass FROM adminlogin WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        header("Content-Type: application/json");
            if ($password === $row['pass']) {
                echo json_encode(["success" => "Login berhasil!"]);
            } else {
                echo json_encode(["error" => "Password salah!"]);
            }

    } else {
        echo "<script>alert('Username tidak ditemukan!'); window.location.href = 'login.php';</script>";
    }
}

$conn->close();
?>
