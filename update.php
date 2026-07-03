<?php
include "koneksi.php";

// Gunakan nama variabel yang sama dengan di ESP32
if(isset($_POST['ketinggian']) && isset($_POST['status'])) {
    $ketinggian = $_POST['ketinggian'];
    $status = $_POST['status'];
    
    // SESUAIKAN NAMA KOLOM DIBAWAH INI DENGAN DATABASE KAMU
    // Saya asumsikan kolomnya adalah 'ketinggian' dan 'status_air'
    $query = "INSERT INTO tb_air (ketinggian, status_air, waktu) VALUES ('$ketinggian', '$status', NOW())";
    
    if(mysqli_query($konek, $query)) {
        echo "Data berhasil disimpan";
    } else {
        echo "Error SQL: " . mysqli_error($konek);
    }
} else {
    echo "Data tidak lengkap";
}
?>