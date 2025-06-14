<!DOCTYPE html>
<html>

<head>
    <title>Daftar Produk</title>
</head>

<body>
    <h1>Daftar Produk</h1>
    <table border="1" cellpadding="10">
        <thead>
            <tr>
                <th>Kode</th>
                <th>Nama Produk</th>
                <th>Harga (Rp)</th>
            </tr>
        </thead>
        <tbody>
            @foreach($ar_produk as $produk)
                <tr>
                    <td>{{ $produk->kode }}</td>
                    <td>{{ $produk->nama }}</td>
                    <td>{{ number_format($produk->harga, 0, ',', '.') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>