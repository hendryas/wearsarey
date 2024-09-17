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
              <h2>Shop</h2>
            </div>
            <div class="breadcumbs pb-15">
              <ul>
                <li><a href="#">Home</a></li>
                <li>Shop</li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- HEADING-BANNER END -->
  <!-- PRODUCT-AREA START -->
  <div class="product-area pt-80 pb-80 product-style-2">
    <div class="container">

      <div class="wrapper">
        <div class="container-fluid">

          <!-- Page-Title -->
          <div class="row mt-3">
            <div class="col-sm-12">
              <div class="page-title-box">
                <div class="btn-group float-right">
                  <ol class="breadcrumb hide-phone p-0 m-0">
                    <!-- <li class="breadcrumb-item"><a href="#"></?php echo $title; ?></a></li> -->
                  </ol>
                </div>
                <!-- <h4 class="page-title"></?php echo $title; ?></h4> -->
              </div>
            </div>
          </div>
          <!-- end page title end breadcrumb -->

          <!--====START CONTENT HERE =====-->
          <div class="col-lg">
            <div class="card m-b-30">
              <div class="card-body">

                <h4 class="mt-0 header-title">Upload Bukti Pembayaran</h4>
                <p class="text-muted m-b-30 font-14">
                  Jika sudah melakukan pembayaran, silahkan upload bukti pembayaran anda di form dibawah ini.
                </p>

                <?php echo $this->session->flashdata('message'); ?>

                <div class="row">
                  <div class="col-lg-12">
                    <form class="form-horizontal auth-form my-4" enctype="multipart/form-data" method="POST" action="<?php echo base_url('pesanansaya/bayarpesanan/') . encrypt_url($DataPesanan['id']); ?>">

                      <div class="form-group">
                        <label for="name">Atas Nama</label>
                        <div class="input-group">
                          <input type="text" class="form-control" id="no_order" name="no_order" placeholder="Nomer Order" value="<?= $DataPesanan['no_order']; ?>" hidden>
                          <input type="text" class="form-control" id="name" name="name" placeholder="Nama Pemilik Rekening" value="<?php echo set_value('name'); ?>" required>
                        </div>
                        <small class="text-danger"><?php echo form_error('name'); ?></small>
                        <small>Tulis Nama Pemilik Bank</small>
                      </div>

                      <div class="form-group mt-3">
                        <label for="nama_bank">Nama Bank</label>
                        <div class="input-group">
                          <input type="text" class="form-control" id="nama_bank" name="nama_bank" placeholder="Nama Bank" value="<?php echo set_value('nama_bank'); ?>" required>
                        </div>
                        <small class="text-danger"><?php echo form_error('nama_bank'); ?></small>
                        <small>Tulis Nama Bank</small>
                      </div>

                      <div class="form-group mt-3">
                        <label for="no_rek">No. Rekening</label>
                        <div class="input-group">
                          <input type="text" class="form-control" id="no_rek" name="no_rek" placeholder="Nomer Rekening" value="<?php echo set_value('no_rek'); ?>" required>
                        </div>
                        <small class="text-danger"><?php echo form_error('no_rek'); ?></small>
                        <small>Tulis Nomer Rekening Bank</small>
                      </div>

                      <div class="form-group mt-3">
                        <label class="control-label">Bukti Bayar</label>
                        <div class="card shadow-lg">
                          <div class="card-body">
                            <h4 class="mt-0 header-title">File Upload</h4>
                            <p class="text-muted mb-3">Upload gambar disini</p>
                            <input type="file" id="input-file-now" name="image" class="dropify" required />
                          </div>
                          <!--end card-body-->
                        </div>
                        <!--end card-->
                        <small>Upload foto Maksimal 3MB</small>
                        <!--end form-group-->
                      </div>
                      <!--end form-group-->

                      <div class="form-group mb-0 row">
                        <div class="col-3">
                          <button class="btn btn-sm btn-warning btn-round btn-block waves-effect waves-light" onclick="history.back()">Go Back</button>
                        </div>
                        <div class="col-3">
                          <button class="btn btn-sm btn-primary btn-round btn-block waves-effect waves-light ml-5" type="submit">Submit</button>
                        </div>
                        <!--end col-->
                      </div>
                      <!--end form-group-->
                    </form>
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

          <h4 class="mt-0 header-title">Upload Bukti Pembayaran</h4>
          <p class="text-muted m-b-30 font-14">
            Jika sudah melakukan pembayaran, silahkan upload bukti pembayaran anda di form dibawah ini.
          </p>

          <?php echo $this->session->flashdata('message'); ?>

          <div class="row">
            <div class="col-lg-12">
              <form class="form-horizontal auth-form my-4" enctype="multipart/form-data" method="POST" action="<?php echo base_url('pesanansaya/bayarpesanan/') . encrypt_url($DataPesanan['id']); ?>">

                <div class="form-group">
                  <label for="name">Atas Nama</label>
                  <div class="input-group">
                    <input type="text" class="form-control" id="no_order" name="no_order" placeholder="Nomer Order" value="<?= $DataPesanan['no_order']; ?>" hidden>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Nama Pemilik Rekening" value="<?php echo set_value('name'); ?>" required>
                  </div>
                  <small class="text-danger"><?php echo form_error('name'); ?></small>
                  <small>Tulis Nama Pemilik Bank</small>
                </div>

                <div class="form-group mt-3">
                  <label for="nama_bank">Nama Bank</label>
                  <div class="input-group">
                    <input type="text" class="form-control" id="nama_bank" name="nama_bank" placeholder="Nama Bank" value="<?php echo set_value('nama_bank'); ?>" required>
                  </div>
                  <small class="text-danger"><?php echo form_error('nama_bank'); ?></small>
                  <small>Tulis Nama Bank</small>
                </div>

                <div class="form-group mt-3">
                  <label for="no_rek">No. Rekening</label>
                  <div class="input-group">
                    <input type="text" class="form-control" id="no_rek" name="no_rek" placeholder="Nomer Rekening" value="<?php echo set_value('no_rek'); ?>" required>
                  </div>
                  <small class="text-danger"><?php echo form_error('no_rek'); ?></small>
                  <small>Tulis Nomer Rekening Bank</small>
                </div>

                <div class="form-group mt-3">
                  <label class="control-label">Bukti Bayar</label>
                  <div class="card shadow-lg">
                    <div class="card-body">
                      <h4 class="mt-0 header-title">File Upload</h4>
                      <p class="text-muted mb-3">Upload gambar disini</p>
                      <input type="file" id="input-file-now" name="image" class="dropify" required />
                    </div>
                    <!--end card-body-->
                  </div>
                  <!--end card-->
                  <small>Upload foto Maksimal 3MB</small>
                  <!--end form-group-->
                </div>
                <!--end form-group-->

                <div class="form-group mb-0 row">
                  <div class="col-3">
                    <button class="btn btn-sm btn-warning btn-round btn-block waves-effect waves-light" onclick="history.back()">Go Back</button>
                  </div>
                  <div class="col-3">
                    <button class="btn btn-sm btn-primary btn-round btn-block waves-effect waves-light ml-5" type="submit">Submit</button>
                  </div>
                  <!--end col-->
                </div>
                <!--end form-group-->
              </form>
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

<script>
  $(document).ready(function() {
    $('.datatable').DataTable({
      "ordering": false,
      scrollX: true
    });
  });
</script>