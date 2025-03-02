<?php
$server = "localhost";
$username = "root";
$password = "";
$database = "sekolah"; // Pastikan database ini ada di MySQL

$conn = new mysqli($server, $username, $password, $database);

if ($conn->connect_error) {
    die(json_encode(["error" => "Koneksi gagal: " . $conn->connect_error]));
}
?>
