<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Tambah Data Kategori</h3>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Form <small> Tambah Data Kategori</small></h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br />
                        <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left"
                            method="post" action="<?php echo site_url('kategori/save'); ?>">

                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Nama
                                    Kategori
                                    <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input name="kategori" type="text" id="first-name" required="required"
                                        class="form-control ">
                                </div>
                            </div>
                            <!-- <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">No. Telpon
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input name="no_telp" type="text" id="no-telp" required="required"
                                        class="form-control">
                                </div>
                            </div> -->
                            <!-- <div class="item form-group">
                                <label for="middle-name"
                                    class="col-form-label col-md-3 col-sm-3 label-align">Alamat</label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input name="alamat" id="middle-name" class="form-control" type="text"
                                    required="required">
                                </div>
                            </div> -->
                            <!-- <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align">Tanggal Lahir
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input name="tgl_lahir" id="birthday" class="date-picker form-control"
                                        placeholder="dd-mm-yyyy" type="text" required="required" type="text"
                                        onfocus="this.type='date'" onmouseover="this.type='date'"
                                        onclick="this.type='date'" onblur="this.type='text'"
                                        onmouseout="timeFunctionLong(this)">
                                    <script>
                                        function timeFunctionLong(input) {
                                            setTimeout(function () {
                                                input.type = 'text';
                                            }, 60000);
                                        }
                                    </script>
                                </div>
                            </div> -->
                            <div class="ln_solid"></div>
                            <div class="item form-group">
                                <div class="col-md-6 col-sm-6 offset-md-3">
                                    <a class="btn btn-primary" href="<?php echo site_url('kategori'); ?>">Cancel</a>
                                    <button type="submit" class="btn btn-success">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>