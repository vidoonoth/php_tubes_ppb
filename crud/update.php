<?php
include '../config/conn.php';

$data = json_decode(file_get_contents("php://input"));

$id = $data->id;
$nama = $data->nama;
$harga = $data->harga;
$deskripsi = $data->deskripsi;

$sql = "UPDATE produk SET nama='$nama', harga=$harga, deskripsi='$deskripsi' WHERE id=$id";

if ($conn->query($sql)) {
    echo json_encode(["message" => "Produk berhasil diperbarui"]);
} else {
    echo json_encode(["message" => "Gagal memperbarui produk"]);
}
?>
