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

          <h4 class="card-title mb-4">List Rekap Pembayaran</h4>

          <!-- Nav tabs -->
          <ul class="nav nav-pills nav-justified" role="tablist">
            <li class="nav-item waves-effect waves-light">
              <a class="nav-link active" data-toggle="tab" href="#home-1" role="tab" aria-selected="true">
                <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                <span class="d-none d-sm-block">Pesanan Masuk</span>
              </a>
            </li>

            <!-- Pesanan Di Proses -->
            <li class="nav-item waves-effect waves-light">
              <a class="nav-link" data-toggle="tab" href="#profile-1" role="tab" aria-selected="false">
                <span class="d-block d-sm-none"><i class="far fa-user"></i></span>
                <span class="d-none d-sm-block">Pesanan Di Proses</span>
              </a>
            </li>

            <!-- Pesanan Dikirim -->
            <li class="nav-item waves-effect waves-light">
              <a class="nav-link" data-toggle="tab" href="#messages-1" role="tab" aria-selected="false">
                <span class="d-block d-sm-none"><i class="far fa-envelope"></i></span>
                <span class="d-none d-sm-block">Pesanan Di Kirim</span>
              </a>
            </li>

            <!-- Pesanan Selesai -->
            <li class="nav-item waves-effect waves-light">
              <a class="nav-link" data-toggle="tab" href="#settings-1" role="tab" aria-selected="false">
                <span class="d-block d-sm-none"><i class="fas fa-cog"></i></span>
                <span class="d-none d-sm-block">Pesanan Di Terima</span>
              </a>
            </li>
          </ul>


          <div class="tab-content p-3 text-muted">
            <!-- Pesanan Masuk -->
            <div class="tab-pane active" id="home-1" role="tabpanel">

              <?php echo $this->session->flashdata('message'); ?>

              <table class="datatable table table-bordered nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                <thead>
                  <tr class="text-center">
                    <th>#</th>
                    <th>No. Order</th>
                    <th>Tanggal</th>
                    <th>Total Bayar</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $no = 1; ?>
                  <?php foreach ($belum_bayar as $bb) : ?>
                    <tr class="text-center">
                      <th scope="row"><?php echo $no; ?></th>
                      <td><?php echo $bb['no_order']; ?></td>
                      <td><?php echo $bb['tgl_order']; ?></td>
                      <td>
                        <b>Rp. <?php echo number_format($bb['grand_total'], 0); ?></b> <br>
                        <?php if ($bb['status_pembayaran'] == 0) : ?>
                          <span class="badge badge-boxed  badge-soft-danger">Belum Bayar</span>
                        <?php else : ?>
                          <span class="badge badge-boxed  badge-soft-success">Sudah Bayar</span> <br>
                          <span class="badge badge-boxed  badge-soft-primary">Menunggu diverifikasi</span>
                        <?php endif; ?>
                      </td>
                      <?php if ($bb['status_pembayaran'] == 1) : ?>
                        <td>
                          <a href="<?= base_url('rekappembayarancustomer/proses/' . encrypt_url($bb['id'])); ?>" class="mr-3"><span class="btn btn-sm btn-success waves-effect waves-light">Proses</span></a>
                          <a class="btn btn-sm btn-primary waves-effect waves-light text-white" data-toggle="modal" data-target="#newCekBuktiModal<?php echo $bb['id']; ?>">Cek Bukti Bayar</a>
                        </td>
                      <?php else : ?>
                        <td> <button class="btn btn-sm btn-danger waves-effect waves-light" disabled>Belum Bayar</button></td>
                      <?php endif; ?>
                    </tr>
                    <?php $no++; ?>
                  <?php endforeach; ?>
                </tbody>
              </table>
            </div>

            <!-- Pesanan Di Proses -->
            <div class="tab-pane" id="profile-1" role="tabpanel">

              <?php echo $this->session->flashdata('message'); ?>

              <table class="datatable table table-bordered nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                <thead>
                  <tr class="text-center">
                    <th>#</th>
                    <th>No. Order</th>
                    <th>Tanggal</th>
                    <th>Total Bayar</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $no = 1; ?>
                  <?php foreach ($pesanan_diproses as $bb) : ?>
                    <tr class="text-center">
                      <th scope="row"><?php echo $no; ?></th>
                      <td><?php echo $bb['no_order']; ?></td>
                      <td><?php echo $bb['tgl_order']; ?></td>
                      <td>
                        <b>Rp. <?php echo number_format($bb['grand_total'], 0); ?></b> <br>
                        <span class="badge badge-boxed  badge-soft-primary">Diproses/Dikemas</span>
                      </td>
                      <?php if ($bb['status_pembayaran'] == 1) : ?>
                        <td>
                          <a href="#" data-toggle="modal" data-target="#newKirimModal<?php echo $bb['id']; ?>" class="mr-3"> <span class="btn btn-sm btn-success waves-effect waves-light"><i class="far fa-paper-plane"></i> Dikirim</span></a>
                        </td>
                      <?php endif; ?>
                    </tr>
                    <?php $no++; ?>
                  <?php endforeach; ?>
                </tbody>
              </table>
            </div>

            <!-- Pesanan Di Kirim -->
            <div class="tab-pane" id="messages-1" role="tabpanel">

              <?php echo $this->session->flashdata('message'); ?>

              <table class="datatable table table-bordered nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                <thead>
                  <tr class="text-center">
                    <th>#</th>
                    <th>No. Order</th>
                    <th>Tanggal</th>
                    <th>Total Bayar</th>
                    <th>No.Resi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $no = 1; ?>
                  <?php foreach ($pesanan_dikirim as $bb) : ?>
                    <tr class="text-center">
                      <th scope="row"><?php echo $no; ?></th>
                      <td><?php echo $bb['no_order']; ?></td>
                      <td><?php echo $bb['tgl_order']; ?></td>
                      <td>
                        <b>Rp. <?php echo number_format($bb['grand_total'], 0); ?></b> <br>
                        <span class="badge badge-boxed  badge-soft-warning">Dikirim</span>
                      </td>
                      <td>No.Resi : <?= $bb['no_resi']; ?></td>
                    </tr>
                    <?php $no++; ?>
                  <?php endforeach; ?>
                </tbody>
              </table>
            </div>

            <!-- Pesanan Selesai -->
            <div class="tab-pane" id="settings-1" role="tabpanel">

              <?php echo $this->session->flashdata('message'); ?>

              <table class="datatable table table-bordered nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                <thead>
                  <tr class="text-center">
                    <th>#</th>
                    <th>No. Order</th>
                    <th>Tanggal</th>
                    <th>Total Bayar</th>
                    <th>No.Resi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $no = 1; ?>
                  <?php foreach ($pesanan_diterima as $bb) : ?>
                    <tr class="text-center">
                      <th scope="row"><?php echo $no; ?></th>
                      <td><?php echo $bb['no_order']; ?></td>
                      <td><?php echo $bb['tgl_order']; ?></td>
                      <td>
                        <b>Rp. <?php echo number_format($bb['grand_total'], 0); ?></b> <br>
                        <span class="badge badge-boxed  badge-soft-success">Selesai</span>
                      </td>
                      <td>No.Resi : <?= $bb['no_resi']; ?></td>
                    </tr>
                    <?php $no++; ?>
                  <?php endforeach; ?>
                </tbody>
              </table>
            </div>
          </div>

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

<!-- START CEK BUKTI PEMBAYARAN MODAL -->
<?php foreach ($belum_bayar as $bb) : ?>
  <div class="modal fade newCekBuktiModal" id="newCekBuktiModal<?php echo $bb['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <!-- <div class="modal fade" id="newCekBuktiModal</?php echo $bb['id']; ?>" tabindex="-1" aria-labelledby="newCekBuktiModalLabel" aria-hidden="true"> -->
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="newCekBuktiModalLabel">Bukti Pembayaran</h5>
          <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <label for="menu">Gambar Bukti Pembayaran</label> <br>
            <img src="<?php echo base_url('assets/images/bukti_bayar/') . $bb['bukti_bayar']; ?>" width="400" height="250" alt="Gambar Product">
          </div>
          <div class="form-group mt-3">
            <label for="name">Atas Nama</label>
            <div class="input-group">
              <input type="text" class="form-control" id="name" name="name" placeholder="Nama Pemilik Rekening" value="<?= $bb['atas_nama']; ?>" readonly>
            </div>
          </div>

          <div class="form-group mt-3">
            <label for="nama_bank">Nama Bank</label>
            <div class="input-group">
              <input type="text" class="form-control" id="nama_bank" name="nama_bank" placeholder="Nama Bank" value="<?= $bb['nama_bank']; ?>" readonly>
            </div>
          </div>

          <div class="form-group mt-3">
            <label for="no_rek">No. Rekening</label>
            <div class="input-group">
              <input type="text" class="form-control" id="no_rek" name="no_rek" placeholder="Nomer Rekening" value="<?= $bb['no_rek']; ?>" readonly>
            </div>
          </div>

          <div class="form-group mt-3">
            <label for="total_bayar">Total Bayar</label>
            <div class="input-group">
              <input type="text" class="form-control" id="total_bayar" name="total_bayar" placeholder="Total Bayar" value="<?= number_format($bb['grand_total'], 0); ?>" readonly>
            </div>
          </div>
        </div>
        <button type="button" class="btn btn-sm btn-danger waves-effect waves-light" data-dismiss="modal">
          Close
        </button>
      </div>
    </div>
  </div>
<?php endforeach; ?>
<!-- END CEK BUKTI PEMBAYARAN MODAL -->

<!-- START KIRIM MODAL -->
<?php foreach ($pesanan_diproses as $bb) : ?>
  <div class="modal fade" id="newKirimModal<?php echo $bb['id']; ?>" tabindex="-1" aria-labelledby="newKirimModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="newKirimModalLabel">No. Order : <?= $bb['no_order']; ?></h5>
          <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="<?php echo base_url('rekappembayarancustomer/kirim/') . encrypt_url($bb['id']); ?>" method="POST">
          <div class="modal-body">
            <div class="form-group">
              <label for="no_resi">No.Resi</label>
              <div class="input-group">
                <input type="text" class="form-control" id="no_resi" name="no_resi" placeholder="Nomor Resi" required>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-sm btn-danger waves-effect waves-light" data-dismiss="modal">
              Close
            </button>
            <button type="submit" class="btn btn-sm btn-primary waves-effect waves-light">
              Kirim
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
<?php endforeach; ?>
<!-- END KIRIM MODAL -->