<div class="wrapper">
  <div class="container-fluid">

    <!-- Page-Title -->
    <div class="row mt-3">
      <div class="col-sm-12">
        <div class="page-title-box">
          <div class="btn-group float-right">
            <ol class="breadcrumb hide-phone p-0 m-0">
              <li class="breadcrumb-item"><a href="#"><?php echo $title; ?></a></li>
            </ol>
          </div>
          <h4 class="page-title"><?php echo $title; ?></h4>
        </div>
      </div>
    </div>
    <!-- end page title end breadcrumb -->

    <!--====START CONTENT HERE =====-->
    <div class="col-lg">
      <div class="card m-b-30">
        <div class="card-body">

          <h4 class="mt-0 header-title">Cetak Report Bulanan</h4>
          <p class="text-muted m-b-30 font-14">
            <!-- Liat tutorial <a href="#">disini</a>. -->
          </p>

          <?php echo $this->session->flashdata('message'); ?>

          <form method="post" action="<?= base_url('report/report_bulanan') ?>">
            <div class="form-group mb-3">
              <label for="tanggal">Tanggal</label>
              <div class="row">
                <div class="col-3">
                  <input type="date" class="form-control" name="tanggal" id="tanggal">
                </div>
              </div>
            </div>

            <button type="submit" class="btn btn-primary waves-effect waves-light mb-3">Cetak</button>
          </form>

        </div>
      </div>
    </div> <!-- end col -->
    <!--====END CONTENT HERE =====-->

  </div> <!-- end container -->
</div>
<!-- end wrapper -->


<!-- Footer -->
<?php $this->load->view('templates/footers/footer'); ?>
<!-- End Footer -->