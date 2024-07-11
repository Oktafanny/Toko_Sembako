<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Checkout Sukses</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container my-5">
        <div class="text-center mb-5">
            <h2>Checkout Sukses</h2>
            <p>Terima kasih <strong><?= $customer['nama'] ?></strong> telah berbelanja di toko kami. Pesanan Anda sedang diproses.</p>
        </div>

        <div class="row">
            <!-- Tabel Detail Belanjaan -->
            <div class="col-md-6 mb-4">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <h4 class="card-title">Detail Belanjaan</h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Nama Barang</th>
                                    <th>Jumlah</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $totalBelanja = 0;
                                foreach ($items as $item) :
                                    $totalBelanja += $item['total'];
                                ?>
                                    <tr>
                                        <td><?= $item['nama_barang'] ?></td>
                                        <td><?= $item['jumlah'] ?></td>
                                        <td><?= number_format($item['total'], 0, ',', '.') ?></td>
                                    </tr>
                                <?php endforeach; ?>

                                <!-- Baris Total Bayar -->
                                <tr>
                                    <td colspan="2" class="text-end"><strong>Total Bayar:</strong></td>
                                    <td><strong><?= number_format($totalBelanja, 0, ',', '.') ?></strong></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Tabel Detail Pemesanan -->
            <div class="col-md-6 mb-4">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <h4 class="card-title">Detail Pemesanan</h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <tbody>
                                <!-- <tr>
                                    <th>Total Belanja</th>
                                    <td><?= number_format($total, 0, ',', '.') ?></td>
                                </tr> -->
                                <tr>
                                    <th>Nama Pelanggan</th>
                                    <td><?= $customer['nama'] ?></td>
                                </tr>
                                <tr>
                                    <th>Alamat</th>
                                    <td><?= $customer['alamat'] ?></td>
                                </tr>
                                <tr>
                                    <th>No Telepon</th>
                                    <td><?= $customer['no_telp'] ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="text-center">
            <a href="<?= site_url('user/dashboard'); ?>" class="btn btn-primary">Kembali ke Dashboard</a>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>