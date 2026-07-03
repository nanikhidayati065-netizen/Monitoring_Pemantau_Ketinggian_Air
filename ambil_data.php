<?php
include "koneksi.php";
$query = mysqli_query($konek, "SELECT * FROM tb_air ORDER BY id DESC LIMIT 1");
$data = mysqli_fetch_array($query);
echo json_encode([
    "cm" => $data ? $data['ketinggian'] : 0,
    "status" => $data ? $data['status_air'] : "Kosong"
]);
?>