<!-- page content -->
<!-- Add this in the <head> section of your HTML -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<div class="right_col" role="main">
    <!-- top tiles -->
    <div class="row" style="display: flex; flex-wrap: wrap; justify-content: space-between;">
        <div class="tile_count" style="width: 100%; display: flex; justify-content: space-between;">
            <div class="col-md-2 col-sm-4 tile_stats_count" style="flex: 1; margin: 5px;">
                <span class="count_top"><i class="fa fa-cubes"></i> Total Barang</span>
                <div class="count"><?= $total_barang ?></div>
                <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>4% </i> From last Week</span>
            </div>
            <div class="col-md-2 col-sm-4 tile_stats_count" style="flex: 1; margin: 5px;">
                <span class="count_top"><i class="fa fa-users"></i> Total Pelanggan</span>
                <div class="count"><?= $total_pelanggan ?></div>
                <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>4% </i> From last Week</span>
            </div>
            <div class="col-md-2 col-sm-4 tile_stats_count" style="flex: 1; margin: 5px;">
                <span class="count_top"><i class="fa fa-exchange"></i> Total Transaksi</span>
                <div class="count"><?= $total_transaksi ?></div>
                <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>4% </i> From last Week</span>
            </div>
            <div class="col-md-3 col-sm-4 tile_stats_count" style="flex: 1; margin: 5px;">
                <span class="count_top"><i class="fa fa-money"></i> Total Bayar</span>
                <div class="count green"><?= $total_bayar ?></div>
                <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>4% </i> From last Week</span>
            </div>
        </div>
    </div>

    <!-- /top tiles -->

    <div class="row">
        <div class="col-md-12 col-sm-12  ">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Daftar Pesanan<small>Masuk</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="#">Settings 1</a>
                                <a class="dropdown-item" href="#">Settings 2</a>
                            </div>
                        </li>
                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                        </li>
                    </ul>
                    <div class="table-responsive">
                        <table class="table table-striped jambo_table bulk_action">
                            <thead>
                                <tr class="headings">
                                    <th class="column-title">No</th>
                                    <th class="column-title">Tanggal Transaksi</th>
                                    <th class="column-title">Nama Pelanggan</th>
                                    <th class="column-title">Alamat</th>
                                    <th class="column-title">No. Telepon</th>
                                    <th class="column-title">Daftar Belanjaan</th>
                                    <th class="column-title">Total Bayar</th>
                                    <th class="column-title">Status</th>
                                    <th class="column-title"><span class="nobr">Action</span></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; ?>
                                <?php foreach ($transactions as $transaction) { ?>
                                    <tr class="even pointer">
                                        <td><?php echo $no++; ?></td>
                                        <td><?php echo date('d-m-Y H:i:s', strtotime($transaction['tgl_transaksi'])); ?></td>
                                        <td><?php echo $transaction['nama']; ?></td>
                                        <td><?php echo $transaction['alamat']; ?></td>
                                        <td><?php echo $transaction['no_telp']; ?></td>
                                        <td>
                                            <ul>
                                                <?php foreach ($transaction['items'] as $item) { ?>
                                                    <li><?php echo $item['nama_barang']; ?> (<?php echo $item['jumlah']; ?>)</li>
                                                <?php } ?>
                                            </ul>
                                        </td>
                                        <td><?php echo number_format($transaction['totbay'], 0, ',', '.'); ?></td>
                                        <td><?php echo $transaction['status']; ?></td>
                                        <td>
                                            <?php if ($transaction['status'] == 'pending') { ?>
                                                <a href="<?= site_url('Adminpanel/update_status/' . $transaction['id_transaksi'] . '/proses'); ?>" class="btn btn-warning">Proses</a>
                                            <?php } elseif ($transaction['status'] == 'proses') { ?>
                                                <a href="<?= site_url('Adminpanel/update_status/' . $transaction['id_transaksi'] . '/selesai'); ?>" class="btn btn-success">Selesai</a>
                                            <?php } elseif ($transaction['status'] == 'selesai') { ?>
                                                <a class="btn btn-secondary" disabled>Selesai</a>
                                            <?php } ?>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- <div class="row">
        <div class="col-md-12 col-sm-12 ">
            <div class="dashboard_graph">

                <div class="row x_title">
                    <div class="col-md-6">
                        <h3>Network Activities <small>Graph title sub-title</small></h3>
                    </div>
                    <div class="col-md-6">
                        <div id="reportrange" class="pull-right" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc">
                            <i class="glyphicon glyphicon-calendar fa fa-calendar"></i>
                            <span>December 30, 2014 - January 28, 2015</span> <b class="caret"></b>
                        </div>
                    </div>
                </div>

                <div class="col-md-9 col-sm-9 ">
                    <div id="chart_plot_01" class="demo-placeholder"></div>
                </div>
                <div class="col-md-3 col-sm-3  bg-white">
                    <div class="x_title">
                        <h2>Top Campaign Performance</h2>
                        <div class="clearfix"></div>
                    </div>

                    <div class="col-md-12 col-sm-12 ">
                        <div>
                            <p>Facebook Campaign</p>
                            <div class="">
                                <div class="progress progress_sm" style="width: 76%;">
                                    <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="80">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div>
                            <p>Twitter Campaign</p>
                            <div class="">
                                <div class="progress progress_sm" style="width: 76%;">
                                    <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="60">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 col-sm-12 ">
                        <div>
                            <p>Conventional Media</p>
                            <div class="">
                                <div class="progress progress_sm" style="width: 76%;">
                                    <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="40">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div>
                            <p>Bill boards</p>
                            <div class="">
                                <div class="progress progress_sm" style="width: 76%;">
                                    <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="50">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div> -->
    <br />
</div>
<!-- /page content -->