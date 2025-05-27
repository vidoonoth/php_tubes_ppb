<?php
include '../config/conn.php';

header("Content-Type: application/json");

$data = json_decode(file_get_contents("php://input"));

if (!isset($data->nama, $data->harga, $data->deskripsi)) {
    echo json_encode(['success' => false, 'message' => 'Data tidak lengkap']);
    exit;
}

$nama = mysqli_real_escape_string($conn, $data->nama);
$harga = intval($data->harga);
$deskripsi = mysqli_real_escape_string($conn, $data->deskripsi);

$sql = "INSERT INTO produk (nama, harga, deskripsi) VALUES ('$nama', $harga, '$deskripsi')";

if (mysqli_query($conn, $sql)) {
    echo json_encode(['success' => true, 'message' => 'Produk berhasil ditambahkan']);
} else {
    echo json_encode(['success' => false, 'message' => 'Gagal menambahkan produk']);
}
?>