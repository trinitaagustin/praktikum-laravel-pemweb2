<?php
require_once '../db/dbkoneksi.php';

$nama = $_POST['nama'];
$tmp_lahir = $_POST['tmp_lahir'];
$tgl_lahir = $_POST['tgl_lahir'];
$gender = $_POST['gender'];
$email = $_POST['email'];
$alamat = $_POST['alamat'];
$kelurahan_id = $_POST['kelurahan_id'];

if (isset($_POST['id'])) {
    $id = $_POST['id'];
    $sql = "UPDATE pasien SET nama=?, tmp_lahir=?, tgl_lahir=?, gender=?, email=?, alamat=?, kelurahan_id=? WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssssii", $nama, $tmp_lahir, $tgl_lahir, $gender, $email, $alamat, $kelurahan_id, $id);
} else {
    $sql = "INSERT INTO pasien (nama, tmp_lahir, tgl_lahir, gender, email, alamat, kelurahan_id) VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssssi", $nama, $tmp_lahir, $tgl_lahir, $gender, $email, $alamat, $kelurahan_id);
}

$stmt->execute();
header("Location: list_pasien.php");
exit();
?>
