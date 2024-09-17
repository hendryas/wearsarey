<!-- Loader -->
<div id="preloader">
    <div id="status">
        <div class="spinner"></div>
    </div>
</div>

<!-- Begin page -->
<div class="bg1">
    <!-- Bubble Animation using li -->
    <ul class="bubbles">
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
    </ul>

    <div class="content-center">
        <div class="content-desc-center">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-5 col-md-8">
                        <div class="card">
                            <div class="card-body">

                                <h3 class="text-center mt-0 m-b-15">
                                    <a href="<?php echo base_url(); ?>auth" class="logo logo-admin"><img
                                            src="<?php echo base_url(); ?>assets/images/logo-adi.png" height="130"
                                            alt="logo" style='border-radius: 10px 10px 10px 10px;'></a>
                                </h3>

                                <h4 class="text-muted text-center font-18"><b>Ubah password</b></h4>
                                <h6 class="text-center"><?php echo $this->session->userdata('reset_email'); ?></h6>
                                <?php echo $this->session->flashdata('message'); ?>

                                <div class="p-3">
                                    <form class="form-horizontal m-t-20" method="POST"
                                        action="<?php echo base_url(); ?>auth/resetpassword/changepassword">

                                        <div class="alert alert-danger alert-dismissible">
                                            <button type="button" class="close" data-dismiss="alert"
                                                aria-hidden="true">×</button>
                                            Silahkan ubah password baru anda!
                                        </div>

                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="password1">Password<span>*</span></label>
                                                <input type="password" class="pr-password form-control"
                                                    placeholder="Password" name="password1" id="password1"
                                                    data-toggle="password">
                                                <small
                                                    class="text-danger"><?php echo form_error('password1'); ?></small>
                                            </div>
                                            <div class="col">
                                                <label for="password2">Repeat Password<span>*</span></label>
                                                <input type="password" class="form-control"
                                                    placeholder="Repeat Password" name="password2" id="password2"
                                                    data-toggle="password">
                                                <small
                                                    class="text-danger"><?php echo form_error('password2'); ?></small>
                                            </div>
                                        </div>

                                        <div class="form-group text-center row m-t-20">
                                            <div class="col-12">
                                                <button class="btn btn-primary btn-block waves-effect waves-light"
                                                    type="submit">Ubah Password</button>
                                            </div>
                                        </div>

                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <!-- end row -->
            </div>
        </div>
    </div>
</div>
</div>