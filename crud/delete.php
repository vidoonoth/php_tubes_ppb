<?php
include '../config/conn.php';

$data = json_decode(file_get_contents("php://input"));

if (!isset($data->id)) {
    echo json_encode(['success' => false, 'message' => 'ID tidak ditemukan']);
    exit;
}

$id = intval($data->id); 

$sql = "DELETE FROM produk WHERE id = $id";

if ($conn->query($sql)) {
    echo json_encode(['success' => true, 'message' => 'Produk berhasil dihapus']);
} else {
    echo json_encode(['success' => false, 'message' => 'Gagal menghapus produk']);
}
?>