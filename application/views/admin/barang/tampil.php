<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Data Barang</h3>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="row" style="display: block;">
            <div class="clearfix"></div>
            <div class="clearfix"></div>
            <div class="col-md-12 col-sm-12  ">
                <div class="x_panel">
                    <div class="x_title">
                    <h2>Daftar<small>Data Barang</small></h2>
                        <ul class="nav navbar-left panel_toolbox">
                            <button type="button" class="btn btn-success"><a href=<?php echo site_url('barang/add'); ?>> +
                                    Tambah </a></button>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">

                        <!-- <p>Add class <code>bulk_action</code> to table for bulk actions options on row select</p> -->
                        <div class="table-responsive">
                            <table class="table table-striped jambo_table bulk_action">
                                <thead>
                                    <tr class="headings">
                                        <!-- <th>
                                            <input type="checkbox" id="check-all" class="flat">
                                        </th> -->
                                        <th class="column-title">No </th>
                                        <th class="column-title">Kategori</th>
                                        <th class="column-title">Barang</th>
                                        <th class="column-title">Harga</th>
                                        <th class="column-title">Stok</th>
                                        <th class="column-title"><span class="nobr">Action</span>
                                        </th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php $no = 1;
                                    foreach ($barang as $valBarang) { 
                                        foreach ($kategori as $valKategori) {
                                            if ($valKategori->id_kategori == $valBarang->id_kategori) {?>
                                                <tr class="even pointer">
                                                <td class=" ">
                                                    <?php echo $no; ?>
                                                </td>
                                                <td class=" ">
                                                    <?php echo $valKategori->kategori; ?>
                                                </td>
                                                <td class=" ">
                                                    <?php echo $valBarang->nama_barang; ?>
                                                </td>
                                                <td class=" ">
                                                    <?php echo $valBarang->harga; ?>
                                                </td>
                                                <td class=" ">
                                                    <?php echo $valBarang->stok; ?>
                                                </td>
                                                <td class=" last">
                                                    <button type="button" class="btn btn-warning">
                                                        <a href=<?php echo site_url('barang/get_by_id/' . $valBarang->id_barang); ?>> Edit
                                                        </a></button>
                                                    <button type="button" class="btn btn-danger">
                                                        <a href=<?php echo site_url('barang/delete/' . $valBarang->id_barang); ?>> Hapus
                                                        </a></button>
                                                </td>
                                            </tr>
                                            <?php $no++;
                                            break;
                                            }
                                        }
                                    }
                                    ; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /page content -->