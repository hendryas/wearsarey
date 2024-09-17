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

  <link rel="stylesheet" href="css/style.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" />

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
              <h2>WearSarey</h2>
              <h3 style="color:#fff;">Welcome to Our Website</h3>
              <p style="color: white">Fashion Brand For Women Who Define Themselves by Their Style</p>
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
  <section id="about">
    <div class="px-5 pt-5 pb-0 text-center">
      <div class="container pt-5 pb-2">
        <div class="row">
          <div class="col-12 mt-5 title">
            <h2>Why <span>Us</span></h2>
          </div>
          <div class="row row-cols-lg-2 row-cols-1 pt-4">
            <div class="col d-flex justify-content-between flex-column pt-4 pb-4">
              <h3 class="pb-4">Mengapa Wearsarey?</h3>
              <p>
                Wearsarey merupakan fashion brand untuk wanita yang mendefinisikan diri meraka sendiri dengan gayanya masing – masing.
                Wearsarey menawarkan berbagai produk yang dibuat dengan baik tentunya juga dengan harga yang terjangkau. Banyak juga proma yang kita berikan kepada penggemar setia customer kita
              </p>
            </div>
            <div class="col d-flex justify-content-between flex-column pt-4 pb-4">
              <h3 class="pb-4">Apa Kelebihan membeli baju di WearSarey?</h3>
              <p>
                1.Mempunyai design wanita yang kekinian<br>
                2.Harga Terjangkau Dengan Banyak Promo<br>
                3.Menggunakan bahan yang memiliki kualitas tinggi<br>
                Jadi bagi kalian yang ingin membeli baju dengan design kekinian, segera checkout!
              </p>
            </div>
          </div>
          <div class="col services pt-4 mt-4">
            <div class="container">
              <div class="col-12 mt-5 title">
                <h2>Our New<span> Product</span></h2>
              </div>
              <div class="row justify-content-center text-center mt-2">
                <div class="col-lg-4">
                  <div class="card">
                    <div class="card-body">
                      <img src="img/avatop.jpg" style="width: 300px;height:300px;">
                      <h4>Ava top </h4>
                      <p>body suit untuk wanita</p>
                    </div>
                  </div>
                </div>
                <div class="col-lg-4">
                  <div class="card">
                    <div class="card-body">
                      <img src="img/arabela.jpg" style="width: 300px;height:300px;">
                      <h4>Arabella Top</h4>
                      <p>Atasan Kemben untuk wanita</p>
                    </div>
                  </div>
                </div>
                <div class="col-lg-4">
                  <div class="card">
                    <div class="card-body">
                      <img src="img/harper.jpg" style="width: 300px;height:300px;">
                      <h4>Harper Tank</h4>
                      <p>PTanktop wanita / Halter neck top</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>



  </section>
  <!-- PRODUCT-AREA START -->

  <!-- DISCOUNT-PRODUCT START -->
  <div class="discount-product-area mt-5">
    <div class="container">
      <div class="row">
        <div class="discount-product-slider dots-bottom-right">
          <!-- single-discount-product start -->
          <div class="col-lg-12">
            <div class="discount-product">
              <img src="<?= base_url('img/stylelis-woman1.jpg'); ?>" alt="" />
              <div class="discount-img-brief">
                <!-- <div class="onsale"> -->
                <!-- <span class="onsale-text">On Sale</span>
                  <span class="onsale-price">$ 80.00</span> -->
                <!-- </div> -->
                <div class="discount-info">
                  <!-- <h1 class="text-dark-red d-none d-md-block">Discount 50%</h1>
                  <p class="d-none d-md-block">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed does eiusmodes tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim venim, quis nostrud exercitation ullamco laboris.</p>
                  <a href="#" class="button-one font-16px style-3 text-uppercase mt-md-5" data-text="Buy now">Buy now</a> -->
                </div>
              </div>
            </div>
          </div>
          <!-- single-discount-product end -->
          <!-- single-discount-product start -->
          <div class="col-lg-12">
            <div class="discount-product">
              <img src="<?= base_url('img/stylelis-woman2.jpg'); ?>" alt="" />
              <div class="discount-img-brief">
                <!-- <div class="onsale"> -->
                <!-- <span class="onsale-text">On Sale</span>
                  <span class="onsale-price">$ 80.00</span> -->
                <!-- </div> -->
                <div class="discount-info">
                  <!-- <h1 class="text-dark-red d-none d-md-block">Discount 50%</h1>
                  <p class="d-none d-md-block">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed does eiusmodes tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim venim, quis nostrud exercitation ullamco laboris.</p>
                  <a href="#" class="button-one font-16px style-3 text-uppercase mt-md-5" data-text="Buy now">Buy now</a> -->
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- DISCOUNT-PRODUCT END -->

  <div class="product-area pt-80 pb-80 product-style-2">
    <div class="container">
      <div class="col-12 mt-5 title">
        <h2>Our Katalog<span> Product</span></h2>
      </div>
      <br>
      <!-- Shop-Content End -->
      <div class="shop-content">
        <div class="row">
          <div class="col-md-12">
          </div>
          <div class="col-md-12">
            <div class="row">
              <!-- Single-product start -->
              <?php foreach ($product as $p) : ?>
                <div class="col-xl-3 col-md-4">
                  <?php
                  echo form_open('cart/add');
                  echo form_hidden('id', $p['id_barang']);
                  echo form_hidden('qty', 1);
                  echo form_hidden('price', $p['harga']);
                  echo form_hidden('name', $p['nama_barang']);
                  echo form_hidden('redirect_page', str_replace('index.php/', '', current_url()));
                  ?>
                  <div class="single-product">
                    <div class="product-img">
                      <?php
                      $amount = $p['harga'];
                      $formatted_amount = format_rupiah($amount);
                      ?>
                      <span class="pro-price-2"><?php echo $formatted_amount ?></span>
                      <a href="#"><img src="<?= base_url('assets/images/product_barang/') . $p['image']; ?>" alt="" /></a>
                    </div>
                    <div class="product-info clearfix text-center">
                      <div class="fix">
                        <h4 class="post-title"><a href="<?php echo base_url('detailbarang/detail/') . $p['id_barang'] ?>"><?php echo $p['nama_barang'] ?></a></h4>
                      </div>
                      <div class="product-action clearfix">
                        <button type="submit" class="btn btn-sm btn-primary text-center text-white">Beli</button>
                        <!-- <a href="wishlist.html" data-bs-toggle="tooltip" data-placement="top" title="Wishlist"><i class="zmdi zmdi-favorite-outline"></i></a>
                        <a href="#" data-bs-toggle="modal" data-bs-target="#productModal" title="Quick View"><i class="zmdi zmdi-zoom-in"></i></a>
                        <a href="#" data-bs-toggle="tooltip" data-placement="top" title="Compare"><i class="zmdi zmdi-refresh"></i></a>
                        <a href="cart.html" data-bs-toggle="tooltip" data-placement="top" title="Add To Cart"><i class="zmdi zmdi-shopping-cart-plus"></i></a> -->
                      </div>
                    </div>
                  </div>
                  <?php echo form_close(); ?>
                </div>
              <?php endforeach; ?>
              <!-- Single-product end -->
            </div>
          </div>
          <div class="col-md-12">
          </div>
        </div>
      </div>
      <!-- Shop-Content End -->
    </div>
  </div>
  <!-- PRODUCT-AREA END -->
  <!-- FOOTER START -->
  <footer>
    <!-- Footer-area start -->
    <section class="kontak" id="kontak">
      <div class="container p-3 p-sm-0">
        <div class="row">
          <div class="col-12">
            <h2 class="fw-bold text-center text-white pt-5 pb-4">Contact Us</h2>
          </div>
        </div>
        <div class="row justify-content-center pb-5">
          <div class="col-xl-3 col-lg-4 col-12 m-0">
            <div class="card alamat">
              <div class="card-body">
                <h5 class="fw-bold pb-5">Contact Information</h5>
                <div class="row">
                  <div class="col-1 mb-3">
                    <i class="fas fa-map-marker-alt"></i>
                  </div>
                  <div class="col-10 offset-1 mb-3">
                    <p>Jakarta Barat</p>
                  </div>
                  <div class="col-1 mb-3">
                    <i class="fas fa-envelope"></i>
                  </div>
                  <div class="col-10 offset-1 mb-3">
                    <p>wearsarey@gmail.com</p>
                  </div>
                  <div class="col-1 mb-3">
                    <i class="fas fa-phone-alt"></i>
                  </div>
                  <div class="col-10 offset-1 mb-3">
                    <p>0812-1816-9266</p>
                  </div>
                  <div class="col-lg-12 mt-5">
                    <i class="fab fa-facebook-square"></i>
                    <i class="fab fa-twitter"></i>
                    <i class="fab fa-instagram"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-8 col-12">
            <div class="card">
              <div class="card-body">
                <div class="row justify-content-end">
                  <div class="col-lg-9 p-5">
                    <form action="https://formspree.io/f/mknevylp" method="POST">
                      <h3 class="fw-bold mb-5">Send a massage</h3>
                      <div class="row">
                        <div class="col-md-6 mb-3">
                          <label for="name" class="form-label text-primary">Your name</label>
                          <input type="text" class="w-100 border-0 border-bottom mb-3 p-1" placeholder="Enter Your name" id="name" name="name" />
                        </div>
                        <div class="col-md-6 mb-3">
                          <label for="number" class="form-label text-primary">Mobile Number</label>
                          <input type="text" class="w-100 border-0 border-bottom mb-3 p-1" placeholder="Enter your mobile number" id="number" name="number" />
                        </div>
                        <div class="col-md-6 mb-3">
                          <label for="subject" class="form-label text-primary">Address</label>
                          <input type="text" class="w-100 border-0 border-bottom mb-3 p-1" placeholder="Subject..." id="subject" name="subject" />
                        </div>
                        <div class="col-md-6 mb-3">
                          <label for="email" class="form-label text-primary">Email Address</label>
                          <input type="text" class="w-100 border-0 border-bottom mb-3 p-1" placeholder="Enter your email address" id="email" name="email" />
                        </div>
                      </div>
                      <div class="col-12 mb-3">
                        <label for="message" class="form-label text-primary">Kritik dan Saran</label>
                        <textarea class="w-100 border-0 border-bottom mb-4 p-1" id="massage" placeholder="write your massage" rows="1" name="message"></textarea>
                      </div>
                      <button type="submit" class="btn btn-primary rounded-1">Send message</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
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


</div>
<!-- WRAPPER END -->