<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Data Pelanggan</h3>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="row" style="display: block;">
            <div class="clearfix"></div>
            <div class="clearfix"></div>
            <div class="col-md-12 col-sm-12  ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Daftar<small>Data Pelanggan</small></h2>
                        <ul class="nav navbar-left panel_toolbox">
                            <button type="button" class="btn btn-success"><a href=<?php echo site_url('pelanggan/add'); ?>> +
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
                                        <th class="column-title">Nama Pelanggan</th>
                                        <th class="column-title">Alamat</th>
                                        <th class="column-title">No. Telepon </th>
                                        <!-- <th class="column-title">Alamat </th> -->
                                        <th class="column-title"><span class="nobr">Action</span>
                                        </th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php $no = 1;
                                    foreach ($pelanggan as $val) { ?>
                                        <tr class="even pointer">
                                            <!-- <td class="a-center ">
                                            <input type="checkbox" class="flat" name="table_records">
                                        </td> -->
                                            <td class=" ">
                                                <?php echo $no; ?>
                                            </td>
                                            <td class=" ">
                                                <?php echo $val->nama; ?>
                                            </td>
                                            <td class=" ">
                                                <?php echo $val->alamat; ?>
                                            </td>
                                            <td class=" ">
                                                <?php echo $val->no_telp; ?>
                                            </td>
                                            <!--<td class=" ">
                                                <?php echo $val->alamat; ?>
                                            </td> -->
                                            <td class=" last">
                                                <button type="button" class="btn btn-warning">
                                                    <a href=<?php echo site_url('pelanggan/get_by_id/' . $val->id_pelanggan); ?>> Edit
                                                    </a></button>
                                                <button type="button" class="btn btn-danger">
                                                    <a href=<?php echo site_url('pelanggan/delete/' . $val->id_pelanggan); ?>> Hapus
                                                    </a></button>
                                            </td>
                                        </tr>
                                        <?php $no++;
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