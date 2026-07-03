<?php
$host = "localhost";
$user = "root";
$pass = ""; 
$db   = "db_monitoring_air";

$konek = mysqli_connect($host, $user, $pass, $db);

// Cek apakah koneksi berhasil
if (mysqli_connect_errno()) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>