<?php
function format_rupiah($number)
{
  return 'Rp ' . number_format($number, 0, ',', '.');
}
?>
<?php
$keranjang = $this->cart->contents();
$jml_item = 0;
foreach ($keranjang as $k) {
  $jml_item = $jml_item + $k['qty'];
}
?>
<!-- WRAPPER START -->
<div class="wrapper bg-dark-white">

  <!-- HEADER-AREA START -->
  <header id="sticky-menu" class="header header-2">
    <div class="header-area">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-4 offset-md-4 col-7">
            <div class="logo text-md-center">
              <a href="index.html"><img src="img/logo/logo.png" alt="" /></a>
            </div>
          </div>
          <div class="col-md-4 col-5">
            <div class="mini-cart text-end">
              <ul>
                <li style="margin-right:50px;">
                  <p><?php echo isset($user['name']) ? $user['name'] : '' ?></p>
                </li>
                <li>
                  <a class="cart-icon" href="#">
                    <i class="zmdi zmdi-shopping-cart"></i>
                    <?php if ($jml_item == 0) : ?>
                      <span>0</span>
                    <?php else : ?>
                      <span><?php echo $jml_item ?></span>
                    <?php endif; ?>
                  </a>
                  <div class="mini-cart-brief text-left">
                    <div class="cart-items">
                      <?php if ($jml_item == 0) : ?>
                        <p class="mb-0">Tidak ada barang</p>
                      <?php else : ?>
                        <?php foreach ($keranjang as $k) : ?>
                          <?php $barang = $this->barang_model->getDataProductDetail($k['id'])->row_array(); ?>
                          <div class="all-cart-product clearfix">
                            <div class="single-cart clearfix">
                              <div class="cart-photo">
                                <a href="#"><img src="<?= base_url('assets/images/product_barang/') . $barang['image'] ?>" alt="" /></a>
                              </div>
                              <div class="cart-info">
                                <h5><a href="#"><?php echo $barang['nama_barang'] ?></a></h5>
                                <?php
                                $amount = $barang['harga'];
                                $formatted_amount = format_rupiah($amount);
                                ?>
                                <p class="mb-0">Harga : <?php echo $formatted_amount ?></p>
                                <p class="mb-0">Qty : <?php echo $k['qty']; ?> </p>
                              </div>
                            </div>
                          </div>
                        <?php endforeach; ?>
                      <?php endif; ?>
                    </div>
                    <div class="cart-totals">
                      <h5 class="mb-0">Total <span class="floatright"><?php echo $this->cart->format_number($this->cart->total()); ?></span></h5>
                    </div>
                    <div class="cart-bottom  clearfix">
                      <a href="<?= base_url('cart/viewcart') ?>" class="button-one floatleft text-uppercase" data-text="View cart">View cart</a>
                      <a href="<?= base_url('cart/checkout') ?>" class="button-one floatright text-uppercase" data-text="Check out">Check out</a>
                    </div>
                  </div>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- MAIN-MENU START -->
    <div class="menu-toggle menu-toggle-2 hamburger hamburger--emphatic d-none d-md-block">
      <div class="hamburger-box">
        <div class="hamburger-inner"></div>
      </div>
    </div>
    <div class="main-menu  d-none d-md-block">
      <nav>
        <?php if ($this->session->userdata('email') == true) : ?>
          <ul>
            <li><a href="<?= base_url('home') ?>">home</a>
            </li>
            <li><a href="<?= base_url('rekappembayaran') ?>">History Pesanan</a></li>
            <li><a href="about">about us</a></li>
            <li><a href="contact">contact</a></li>
            <li><a href="<?= base_url('auth/logout') ?>">Logout</a></li>
          </ul>
        <?php else : ?>
          <ul>
            <li><a href="<?= base_url('home') ?>">home</a>
            <li><a href="<?= base_url('auth/login') ?>">login</a></li>
          </ul>
        <?php endif; ?>
      </nav>
    </div>
    <!-- MAIN-MENU END -->
  </header>
  <!-- HEADER-AREA END -->
  <!-- Mobile-menu start -->
  <div class="mobile-menu-area">
    <div class="container-fluid">
      <div class="row">
        <div class="col-xs-12 d-block d-md-none">
          <div class="mobile-menu">
            <nav id="dropdown">
              <?php if ($this->session->userdata('email') == true) : ?>
                <ul>
                  <li><a href="<?= base_url('home') ?>">home</a>
                  </li>
                  <li><a href="<?= base_url('rekappembayaran') ?>">History Pesanan</a></li>
                  <li><a href="about">about us</a></li>
                  <li><a href="contact">contact</a></li>
                  <li><a href="<?= base_url('auth/logout') ?>">Logout</a></li>
                </ul>
              <?php else : ?>
                <ul>
                  <li><a href="<?= base_url('home') ?>">home</a>
                  <li><a href="<?= base_url('auth/login') ?>">login</a></li>
                </ul>
              <?php endif; ?>
            </nav>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Mobile-menu end -->
  <!-- HEADING-BANNER START -->
  <div class="heading-banner-area overlay-bg">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="heading-banner">
            <div class="heading-banner-title">
              <h2>List Rekap Pembayaran</h2>
            </div>
            <div class="breadcumbs pb-15">
              <ul>
                <li><a href="#">Home</a></li>
                <li>List Rekap Pembayaran</li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- HEADING-BANNER END -->
  <!-- PRODUCT-AREA START -->
  <div class="login-area  pt-80 pb-80">
    <div class="container">

      <div class="wrapper">
        <div class="container-fluid">

          <!-- Page-Title -->
          <div class="row mt-3">
            <div class="col-sm-12">
              <div class="page-title-box">
                <div class="btn-group float-right">
                  <ol class="breadcrumb hide-phone p-0 m-0">
                    <!-- <li class="breadcrumb-item"><a href="#"><?php echo $title; ?></a></li> -->
                  </ol>
                </div>
                <!-- <h4 class="page-title"><?php echo $title; ?></h4> -->
              </div>
            </div>
          </div>
          <!-- end page title end breadcrumb -->

          <!--====START CONTENT HERE =====-->
          <div class="col-lg">
            <div class="card m-b-30">
              <div class="card-body">

                <!-- <h4 class="card-title mb-4">List Rekap Pembayaran</h4> -->

                <!-- Nav tabs -->
                <ul class="nav nav-pills nav-justified" role="tablist">
                  <li class="nav-item waves-effect waves-light">
                    <a class="nav-link active" data-bs-toggle="tab" href="#home-1" role="tab" aria-selected="true">
                      <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                      <span class="d-none d-sm-block">Pesanan Saya</span>
                    </a>
                  </li>
                  <li class="nav-item waves-effect waves-light">
                    <a class="nav-link" data-bs-toggle="tab" href="#profile-1" role="tab" aria-selected="false">
                      <span class="d-block d-sm-none"><i class="far fa-user"></i></span>
                      <span class="d-none d-sm-block">Pesanan di Proses</span>
                    </a>
                  </li>
                  <li class="nav-item waves-effect waves-light">
                    <a class="nav-link" data-bs-toggle="tab" href="#messages-1" role="tab" aria-selected="false">
                      <span class="d-block d-sm-none"><i class="far fa-envelope"></i></span>
                      <span class="d-none d-sm-block">Pesanan di Terima</span>
                    </a>
                  </li>
                  <li class="nav-item waves-effect waves-light">
                    <a class="nav-link" data-bs-toggle="tab" href="#settings-1" role="tab" aria-selected="false">
                      <span class="d-block d-sm-none"><i class="fas fa-cog"></i></span>
                      <span class="d-none d-sm-block">Pesanan Selesai</span>
                    </a>
                  </li>
                </ul>

                <!-- Tab Pesanan -->
                <div class="tab-content p-3 text-muted">
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
                            <?php if ($bb['status_pembayaran'] == 0) : ?>
                              <td> <a href="<?= base_url('pesanansaya/bayar/' . encrypt_url($bb['id'])); ?>" class="mr-3"><span class="btn btn-sm btn-success waves-effect waves-light">Bayar</span></a></td>
                            <?php else : ?>
                              <td> <button class="btn btn-sm btn-danger waves-effect waves-light" disabled>Menunggu Verifikasi</button></td>
                            <?php endif; ?>
                          </tr>
                          <?php $no++; ?>
                        <?php endforeach; ?>
                      </tbody>
                    </table>
                  </div>

                  <!-- Di Kirim -->
                  <div class="tab-pane" id="profile-1" role="tabpanel">

                    <?php echo $this->session->flashdata('message'); ?>

                    <table class="datatable table table-bordered nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                      <thead>
                        <tr class="text-center">
                          <th>#</th>
                          <th>No. Order</th>
                          <th>Tanggal</th>
                          <th>Total Bayar</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $no = 1; ?>
                        <?php foreach ($diproses as $bb) : ?>
                          <tr class="text-center">
                            <th scope="row"><?php echo $no; ?></th>
                            <td><?php echo $bb['no_order']; ?></td>
                            <td><?php echo $bb['tgl_order']; ?></td>
                            <td>
                              <b>Rp. <?php echo number_format($bb['grand_total'], 0); ?></b> <br>
                              <?php if ($bb['status_pembayaran'] == 0) : ?>
                                <span class="badge badge-boxed  badge-soft-danger">Belum Bayar</span>
                              <?php else : ?>
                                <span class="badge badge-boxed  badge-soft-success">Terverifikasi</span> <br>
                                <span class="badge badge-boxed  badge-soft-primary">Diproses/Dikemas</span>
                              <?php endif; ?>
                            </td>
                          </tr>
                          <?php $no++; ?>
                        <?php endforeach; ?>
                      </tbody>
                    </table>
                  </div>

                  <!-- Di Terima -->
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
                        <?php foreach ($dikirim as $bb) : ?>
                          <tr class="text-center">
                            <th scope="row"><?php echo $no; ?></th>
                            <td><?php echo $bb['no_order']; ?></td>
                            <td><?php echo $bb['tgl_order']; ?></td>
                            <td>
                              <b>Rp. <?php echo number_format($bb['grand_total'], 0); ?></b> <br>
                              <span class="badge badge-boxed  badge-soft-warning">Dikirim</span>
                            </td>
                            <td>
                              No.Resi : <?= $bb['no_resi']; ?> <br>
                              <a href="<?= base_url('rekappembayaran/diterima/') . encrypt_url($bb['id']); ?>" class="btn btn-sm btn-primary waves-effect waves-light">Diterima</a>
                            </td>
                          </tr>
                          <?php $no++; ?>
                        <?php endforeach; ?>
                      </tbody>
                    </table>
                  </div>

                  <!-- Di Selesai -->
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
                        <?php foreach ($diterima as $bb) : ?>
                          <tr class="text-center">
                            <th scope="row"><?php echo $no; ?></th>
                            <td><?php echo $bb['no_order']; ?></td>
                            <td><?php echo $bb['tgl_order']; ?></td>
                            <td>
                              <b>Rp. <?php echo number_format($bb['grand_total'], 0); ?></b> <br>
                              <span class="badge badge-boxed  badge-soft-success">Selesai</span>
                            </td>
                            <td>
                              No.Resi : <?= $bb['no_resi']; ?> <br>
                            </td>
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

    </div>
  </div>
  <!-- PRODUCT-AREA END -->
  <!-- FOOTER START -->
  <footer>
    <!-- Footer-area start -->
    <div class="footer-area footer-2">
      <div class="container">
        <div class="row">
          <div class="col-lg-4 col-md-6">
            <div class="single-footer">
              <h3 class="footer-title  title-border">Contact Us</h3>
              <ul class="footer-contact">
                <li><span>Address :</span>Jakarta barat</li>
                <li><span>Cell-Phone :</span>081218169265</li>
                <li><span>Email :</span>Wearsareyjakarta@gmail.com</li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Footer-area end -->
    <!-- Copyright-area start -->
    <div class="copyright-area copyright-2">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <div class="copyright">
              <p class="mb-0">&copy; <a href="https://themeforest.net/user/codecarnival/portfolio" target="_blank">WearSarey </a> 2023</p>
            </div>
          </div>
          <div class="col-md-6">
            <div class="payment  text-md-end">
              <a href="#"><img src="img/payment/1.png" alt="" /></a>
              <a href="#"><img src="img/payment/2.png" alt="" /></a>
              <a href="#"><img src="img/payment/3.png" alt="" /></a>
              <a href="#"><img src="img/payment/4.png" alt="" /></a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Copyright-area start -->
  </footer>
  <!-- FOOTER END -->
  <!-- QUICKVIEW PRODUCT -->
  <div id="quickview-wrapper">
    <!-- Modal -->
    <div class="modal fade" id="productModal" tabindex="-1" role="dialog">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          </div>
          <div class="modal-body">
            <div class="modal-product">
              <div class="product-images">
                <div class="main-image images">
                  <img alt="#" src="img/product/quickview-photo.jpg" />
                </div>
              </div><!-- .product-images -->

              <div class="product-info">
                <h1>Aenean eu tristique</h1>
                <div class="price-box-3">
                  <hr />
                  <div class="s-price-box">
                    <span class="new-price">$160.00</span>
                    <span class="old-price">$190.00</span>
                  </div>
                  <hr />
                </div>
                <a href="shop.html" class="see-all">See all features</a>
                <div class="quick-add-to-cart">
                  <form method="post" class="cart">
                    <div class="numbers-row">
                      <input type="number" id="french-hens" value="3" min="1">
                    </div>
                    <button class="single_add_to_cart_button" type="submit">Add to cart</button>
                  </form>
                </div>
                <div class="quick-desc">
                  Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam fringilla augue nec est tristique auctor. Donec non est at libero.
                </div>
                <div class="social-sharing">
                  <div class="widget widget_socialsharing_widget">
                    <h3 class="widget-title-modal">Share this product</h3>
                    <ul class="social-icons">
                      <li><a target="_blank" title="Google +" href="#" class="gplus social-icon"><i class="zmdi zmdi-google-plus"></i></a></li>
                      <li><a target="_blank" title="Twitter" href="#" class="twitter social-icon"><i class="zmdi zmdi-twitter"></i></a></li>
                      <li><a target="_blank" title="Facebook" href="#" class="facebook social-icon"><i class="zmdi zmdi-facebook"></i></a></li>
                      <li><a target="_blank" title="LinkedIn" href="#" class="linkedin social-icon"><i class="zmdi zmdi-linkedin"></i></a></li>
                    </ul>
                  </div>
                </div>
              </div><!-- .product-info -->
            </div><!-- .modal-product -->
          </div><!-- .modal-body -->
        </div><!-- .modal-content -->
      </div><!-- .modal-dialog -->
    </div>
    <!-- END Modal -->
  </div>
  <!-- END QUICKVIEW PRODUCT -->

</div>
<!-- WRAPPER END -->

<!-- BATAS -->

<!-- START MODAL DITERIMA -->
<?php foreach ($dikirim as $bb) : ?>
  <div class="modal fade" id="newDiterimaModal<?php echo $bb['id']; ?>" tabindex="-1" aria-labelledby="newDiterimaModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="newDiterimaModalLabel">Pesanan diterima</h5>
          <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="<?= base_url('rekappembayaran/diterima/') . encrypt_url($bb['id']); ?>" method="POST" enctype="multipart/form-data">
          <div class="modal-body">
            <div class="form-group">
              Apakah anda yakin pesanan sudah diterima....?
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-sm btn-danger waves-effect waves-light" data-dismiss="modal">
              Close
            </button>
            <button type="submit" class="btn btn-sm btn-primary waves-effect waves-light">Ya</button>
          </div>
        </form>
      </div>
    </div>
  </div>
<?php endforeach; ?>
<!-- END MODAL DITERIMA -->

<!-- Footer -->
<?php $this->load->view('templates/footers/footer'); ?>
<!-- End Footer -->

<script>
  $(document).ready(function() {
    $('.datatable').DataTable({
      "ordering": false,
      scrollX: true
    });
  });
</script>