<?php
include "koneksi.php";
$query = mysqli_query($konek, "SELECT * FROM tb_air ORDER BY id DESC LIMIT 10");
$data = [];
while($row = mysqli_fetch_assoc($query)) {
    $data[] = $row;
}
echo json_encode($data);
?>