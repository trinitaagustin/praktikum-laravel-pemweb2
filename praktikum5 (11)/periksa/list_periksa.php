<?php
require_once '../db/dbkoneksi.php';

$sql = "SELECT pr.id, pr.tanggal, pr.berat, pr.tinggi, pr.tensi, p.nama AS pasien, d.nama AS dokter 
        FROM periksa pr
        LEFT JOIN pasien p ON pr.pasien_id = p.id
        LEFT JOIN paramedik d ON pr.dokter_id = d.id";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>List Pemeriksaan</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h2>Daftar Pemeriksaan</h2>
    <a href="form_periksa.php" class="btn btn-primary mb-3">Tambah Pemeriksaan</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Tanggal</th>
                <th>Berat</th>
                <th>Tinggi</th>
                <th>Tensi</th>
                <th>Pasien</th>
                <th>Dokter</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                    <td>{$no}</td>
                    <td>{$row['tanggal']}</td>
                    <td>{$row['berat']}</td>
                    <td>{$row['tinggi']}</td>
                    <td>{$row['tensi']}</td>
                    <td>{$row['pasien']}</td>
                    <td>{$row['dokter']}</td>
                    <td>
                        <a href='form_periksa.php?idedit={$row['id']}' class='btn btn-warning btn-sm'>Edit</a>
                        <a href='delete_periksa.php?id={$row['id']}' class='btn btn-danger btn-sm' onclick='return confirm(\"Apakah Anda yakin?\")'>Delete</a>
                    </td>
                </tr>";
                $no++;
            }
            ?>
        </tbody>
    </table>
</div>
</body>
</html>
