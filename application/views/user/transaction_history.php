<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaction History</title>
    <link rel="stylesheet" href="<?php echo site_url('assets/css/style.css'); ?>">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6">
                <h1 class="mb-4">Transaction History</h1>
            </div>
            <div class="col-md-6 d-flex justify-content-end align-items-center">
                <a href="<?php echo site_url('user/dashboard2'); ?>" class="btn btn-primary">Kembali ke Dashboard</a>
            </div>
        </div>
        <?php if (!empty($transactions)) : ?>
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">Transaction ID</th>
                            <th scope="col">Date</th>
                            <th scope="col">Items</th>
                            <th scope="col">Total Amount</th>
                            <th scope="col">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($transactions as $transaction) : ?>
                            <tr>
                                <td><?php echo $transaction['id_transaksi']; ?></td>
                                <td><?php echo date('d-m-Y H:i:s', strtotime($transaction['tgl_transaksi'])); ?></td>
                                <td>
                                    <ul class="list-unstyled">
                                        <?php foreach ($transaction['items'] as $item) : ?>
                                            <li><?php echo $item['nama_barang']; ?> (<?php echo $item['jumlah']; ?> pcs) - Rp. <?php echo number_format($item['total'], 0, ',', '.'); ?></li>
                                        <?php endforeach; ?>
                                    </ul>
                                </td>
                                <td>Rp. <?php echo number_format($transaction['totbay'], 0, ',', '.'); ?></td>
                                <td>
                                    <?php
                                    switch ($transaction['status']) {
                                        case 'pending':
                                            echo '<span class="badge badge-warning rounded-pill">Pending</span>';
                                            break;
                                        case 'selesai':
                                            echo '<span class="badge badge-success rounded-pill">Selesai</span>';
                                            break;
                                        case 'Canceled':
                                            echo '<span class="badge badge-danger badge-pill">Canceled</span>';
                                            break;
                                        default:
                                            echo '<span class="badge badge-secondary badge-pill">' . $transaction['status'] . '</span>';
                                            break;
                                    }
                                    ?>
                                </td>

                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        <?php else : ?>
            <p class="alert alert-info">No transactions found.</p>
        <?php endif; ?>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>