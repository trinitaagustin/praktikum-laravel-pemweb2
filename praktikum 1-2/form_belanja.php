<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Belanja Online</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"> 
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <div class="container mt-4">
        <div class="row">
            <!-- Form Belanja -->
            <div class="col-md-8">
                <h2>Belanja Online</h2>
                <form method="POST" action="">
                    <div class="form-group row">
                        <label for="nama" class="col-4 col-form-label">Nama Customer</label> 
                        <div class="col-8">
                            <input id="nama" name="customer" type="text" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-4">Pilih Produk</label> 
                        <div class="col-8">
                            <div class="custom-control custom-radio custom-control-inline">
                            <input class="form-check-input" type="radio" name="produk" value="TV" id="produk_tv" required>
                            <label class="form-check-label" for="produk_tv">TV</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="produk" value="Kulkas" id="produk_kulkas">
                            <label class="form-check-label" for="produk_kulkas">Kulkas</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="produk" value="MESIN CUCI" id="produk_mesin_cuci">
                            <label class="form-check-label" for="produk_mesin_cuci">MESIN CUCI</label>
                        </div>
                    </div>
                    </div>
                    <div class="form-group row">
                        <label for="jumlah" class="col-4 col-form-label">Jumlah</label>
                        <div class="col-8">
                            <input type="number" class="form-control" id="jumlah" name="jumlah" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="offset-4 col-8">
                            <button name="submit" type="submit" class="btn btn-primary">Kirim</button>
                        </div>
                    </div>
                </form>
            </div>

            <!-- Daftar Harga -->
            <div class="col-md-4">
                <h4>Daftar Harga</h4>
                <ul class="list-group">
                    <li class="list-group-item">TV: Rp 4.200.000</li>
                    <li class="list-group-item">Kulkas: Rp 3.100.000</li>
                    <li class="list-group-item">Mesin Cuci: Rp 3.800.000</li>
                    <li class="list-group-item list-group-item-primary text-center">
                        Harga Dapat Berubah Setiap Saat
                    </li>
                </ul>
            </div>
        </div>

        <hr>

        <!-- Hasil Form -->
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $customer = $_POST['customer'];
            $produk = $_POST['produk'];
            $jumlah = $_POST['jumlah'];

            // Daftar harga produk
            $harga_produk = [
                "TV" => 4200000,
                "Kulkas" => 3100000,
                "MESIN CUCI" => 3800000
            ];

            $total_belanja = $harga_produk[$produk] * $jumlah;

            echo "<h4>Struk Belanja</h4>";
            echo "<p>Nama Customer: <b>$customer</b></p>";
            echo "<p>Produk Pilihan: <b>" . ucfirst($produk) . "</b></p>";
            echo "<p>Jumlah Beli: <b>$jumlah</b></p>";
            echo "<p>Total Belanja: <b>Rp " . number_format($total_belanja, 0, ',', '.') . "</b></p>";
        }
        ?>
    </div>

</body>
</html>