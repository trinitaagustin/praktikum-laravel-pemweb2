<?php
require_once '../db/dbkoneksi.php';

$sql = "SELECT p.id, p.nama, p.kategori, u.nama AS unit_kerja 
        FROM paramedik p 
        LEFT JOIN unit_kerja u ON p.unit_kerja_id = u.id";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>List Paramedik</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h2>Daftar Paramedik</h2>
    <a href="form_paramedik.php" class="btn btn-primary mb-3">Tambah Paramedik</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Kategori</th>
                <th>Unit Kerja</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                    <td>{$no}</td>
                    <td>{$row['nama']}</td>
                    <td>{$row['kategori']}</td>
                    <td>{$row['unit_kerja']}</td>
                    <td>
                        <a href='form_paramedik.php?idedit={$row['id']}' class='btn btn-warning btn-sm'>Edit</a>
                        <a href='delete_paramedik.php?id={$row['id']}' class='btn btn-danger btn-sm' onclick='return confirm(\"Apakah Anda yakin?\")'>Delete</a>
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
