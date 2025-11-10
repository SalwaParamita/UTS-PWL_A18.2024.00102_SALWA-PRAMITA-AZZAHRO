<?php
$host = 'localhost';
$user = 'root';        // sesuaikan
$pass = '';            // sesuaikan
$db   = 'hris_db';

$conn = mysqli_connect($host, $user, $pass, $db);

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>