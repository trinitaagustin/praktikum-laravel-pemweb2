<?php include '../config/koneksi.php'; ?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Tambah Kampus</title>
  <!-- Bootstrap 5 CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <style>
    body {
      background-color: #f1f4f9;
      position: relative;
      min-height: 100vh;
      padding-bottom: 80px;
    }
    .sidebar {
      width: 250px;
      min-height: 100vh;
      background-color: #212529;
      position: fixed;
      color: #fff;
    }
    .sidebar h4 {
      font-weight: bold;
    }
    .sidebar a {
      color: #adb5bd;
      display: block;
      padding: 14px 20px;
      text-decoration: none;
      transition: all 0.2s;
    }
    .sidebar a:hover, .sidebar a.active {
      background-color: #495057;
      color: #fff;
    }
    .content {
      margin-left: 250px;
      padding: 40px 30px;
    }
    .navbar {
      margin-left: 250px;
    }
    footer {
      position: fixed;
      bottom: 0;
      left: 250px;
      right: 0;
      background-color: #212529;
      color: #fff;
      text-align: center;
      padding: 16px 0;
      font-size: 0.9rem;
    }
  </style>
</head>
<body>

<!-- Sidebar -->
<div class="sidebar">
  <div class="p-4 text-center border-bottom border-secondary">
    <h4><i class="fas fa-parking me-2"></i>Parkir Kampus</h4>
  </div>
  <a href="../adminlte/admin.php"><i class="fas fa-home me-2"></i>Dashboard</a>
  <a href="../kendaraan/index.php"><i class="fas fa-car me-2"></i>Kendaraan</a>
  <a href="../jenis/index.php"><i class="fas fa-tags me-2"></i>Jenis Kendaraan</a>
  <a href="index.php" class="active"><i class="fas fa-university me-2"></i>Kampus</a>
  <a href="../area_parkir/index.php"><i class="fas fa-map-marker-alt me-2"></i>Area Parkir</a>
  <a href="../transaksi/index.php"><i class="fas fa-receipt me-2"></i>Transaksi</a>
  <a href="../logout/index.php"><i class="fas fa-sign-out-alt me-2"></i>Logout</a>
</div>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top shadow">
  <div class="container-fluid">
    <span class="navbar-brand">Tambah Kampus</span>
  </div>
</nav>

<!-- Content -->
<div class="content">
  <h2 class="fw-bold mb-4">Tambah Data Kampus</h2>

  <div class="card shadow-sm p-4">
    <form method="post">
      <div class="mb-3">
        <label for="nama" class="form-label">Nama Kampus</label>
        <input type="text" name="nama" id="nama" class="form-control" required>
      </div>
      <div class="mb-3">
        <label for="alamat" class="form-label">Alamat</label>
        <input type="text" name="alamat" id="alamat" class="form-control" required>
      </div>
      <div class="mb-3">
        <label for="latitude" class="form-label">Latitude</label>
        <input type="text" name="latitude" id="latitude" class="form-control" required>
      </div>
      <div class="mb-3">
        <label for="longitude" class="form-label">Longitude</label>
        <input type="text" name="longitude" id="longitude" class="form-control" required>
      </div>
      <button type="submit" class="btn btn-primary" name="simpan"><i class="fas fa-save me-2"></i>Simpan</button>
    </form>

    <?php
    if (isset($_POST['simpan'])) {
        $nama = $_POST['nama'];
        $alamat = $_POST['alamat'];
        $latitude = $_POST['latitude'];
        $longitude = $_POST['longitude'];

        $query = "INSERT INTO kampus (nama, alamat, latitude, longitude) 
                  VALUES ('$nama', '$alamat', '$latitude', '$longitude')";

        if ($koneksi->query($query)) {
            echo "<script>location='index.php';</script>";
        } else {
            echo "<div class='alert alert-danger mt-3'>Gagal menyimpan data: " . $koneksi->error . "</div>";
        }
    }
    ?>
  </div>
</div>

<!-- Footer -->
<footer>
  <div class="container">
    <span>&copy; <?= date('Y') ?> Parkir Kampus | Sistem Informasi Parkir Terintegrasi</span>
  </div>
</footer>

<!-- JS Bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
