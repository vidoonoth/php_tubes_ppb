<?php
include '../config/conn.php';


$sql = "SELECT * FROM produk";
$result = $conn->query($sql);

$data = [];

while ($row = $result->fetch_assoc()) {
    $data[] = $row;
}

echo json_encode($data);
?>

