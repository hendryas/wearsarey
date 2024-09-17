<?php
function format_rupiah($number)
{
  return 'Rp ' . number_format($number, 0, ',', '.');
}
?>
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

          <h4 class="mt-0 header-title">List Produk</h4>

          <div class="row g-0 mt-5">

            <?php foreach ($product as $p) : ?>
              <div class="col-xl-4 col-sm-6">
                <?php
                echo form_open('cart/add');
                echo form_hidden('id', $p['id_barang']);
                echo form_hidden('qty', 1);
                echo form_hidden('price', $p['harga']);
                echo form_hidden('name', $p['nama_barang']);
                echo form_hidden('redirect_page', str_replace('index.php/', '', current_url()));
                ?>
                <div class="product-box">
                  <div class="product-img">

                    <div class="product-like">

                    </div>
                    <img src="<?= base_url('assets/images/product_barang/') . $p['image']; ?>" alt="img-1" class="img-fluid mx-auto d-block" style="width: 200px;">
                  </div>

                  <div class="text-center">
                    <p class="font-size-12 mb-3"></p>
                    <h5 class="font-size-15"><a href="#" class="text-dark"><?php echo $p['nama_barang'] ?></a></h5>
                    <?php
                    $amount = $p['harga'];
                    $formatted_amount = format_rupiah($amount);
                    ?>
                    <h5 class="mt-3 mb-0"><?php echo $formatted_amount; ?></h5>

                    <button type="submit" class="btn btn-sm btn-primary waves-effect waves-light mt-3">
                      Add Cart <i class="fas fa-cart-plus align-middle ms-2"></i>
                    </button>
                  </div>
                </div>
                <?php echo form_close(); ?>
              </div>
            <?php endforeach; ?>

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