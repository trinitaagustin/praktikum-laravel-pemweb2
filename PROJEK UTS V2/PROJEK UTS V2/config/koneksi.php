<?php
$host = "localhost";
$user = "root";
$pass = "";
$db   = "db_parkir_kampus";

$koneksi = new mysqli($host, $user, $pass, $db);

if ($koneksi->connect_error) {
    die("Koneksi gagal: " . $koneksi->connect_error);
}
?>
