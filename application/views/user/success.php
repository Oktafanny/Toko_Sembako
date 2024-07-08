<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Checkout Sukses</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <h2>Checkout Sukses</h2>
        <p>Terima kasih <strong><?= $customer['nama'] ?></strong> telah berbelanja di toko kami. Pesanan Anda sedang diproses.</p>

        <h4>Detail Pesanan:</h4>
        <p>Total Belanja: <?= number_format($total, 0, ',', '.') ?></p>
        <p>Nama Pelanggan: <?= $customer['nama'] ?></p>
        <p>Alamat: <?= $customer['alamat'] ?></p>
        <p>No Telepon: <?= $customer['no_telp'] ?></p>

        <a href="<?php echo site_url('user/dashboard'); ?>" class="btn btn-primary">Kembali ke Dashboard</a>
    </div>
</body>

</html>