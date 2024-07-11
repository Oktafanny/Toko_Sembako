<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Edit Data Admin</h3>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Form <small>Edit Data Admin</small></h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br />
                        <form id="demo-form2" method="post" action="<?php echo site_url('admin/edit'); ?>"
                            data-parsley-validate class="form-horizontal form-label-left">
                            <input type="hidden" name="id" value="<?php echo $admin->id_admin; ?>" class="form-control"
                                id="inputEmail3" placeholder="Nama Admin">
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Nama
                                    Admin
                                    <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input name="nama" value="<?php echo $admin->nama; ?>" type="text" id="first-name"
                                        required="required" class="form-control ">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">No. Telpon
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input name="no_telp" value="<?php echo $admin->no_telp; ?>" type="text" id="no-telp"
                                        required="required" class="form-control">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label for="middle-name"
                                    class="col-form-label col-md-3 col-sm-3 label-align">Email</label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input name="email" value="<?php echo $admin->email; ?>" id="middle-name"
                                        class="form-control" type="text" required="required">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label for="middle-name"
                                    class="col-form-label col-md-3 col-sm-3 label-align">Password</label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input name="password" value="<?php echo $admin->password; ?>" id="middle-name"
                                        class="form-control" type="text" required="required">
                                </div>
                            </div>
                            <!-- <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align">Tanggal Lahir
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input name="tgl_lahir" value="<?php echo $ibu->tgl_lahir; ?>" id="birthday"
                                        class="date-picker form-control" placeholder="dd-mm-yyyy" type="text"
                                        required="required" type="text" onfocus="this.type='date'"
                                        onmouseover="this.type='date'" onclick="this.type='date'"
                                        onblur="this.type='text'" onmouseout="timeFunctionLong(this)">
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
                                    <a class="btn btn-primary" href="<?php echo site_url('admin'); ?>">Cancel</a>
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