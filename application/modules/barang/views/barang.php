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

          <h4 class="mt-0 header-title">Silahkan buat product management anda</h4>
          <p class="text-muted m-b-30 font-14">
            Liat tutorial <a href="#">disini</a>.
          </p>

          <?php echo $this->session->flashdata('message'); ?>

          <a href="#" class="btn btn-primary waves-effect waves-light mb-3" data-toggle="modal" data-target="#newAddModal">Tambahkan barang baru</a>

          <div class="table-responsive">
            <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
              <thead>
                <tr class="text-center">
                  <th>#</th>
                  <th>Nama Barang</th>
                  <th>Harga</th>
                  <th>Warna</th>
                  <th>Stok</th>
                  <th>Gambar</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php $no = 1; ?>
                <?php foreach ($product as $p) : ?>
                  <tr class="text-center">
                    <th scope="row"><?php echo $no; ?></th>
                    <td><?php echo $p['nama_barang']; ?></td>
                    <td>Rp.<?php echo number_format($p['harga'], 0); ?></td>
                    <td><?php echo $p['warna']; ?></td>
                    <td><?php echo $p['stok']; ?></td>
                    <td> <img src="<?php echo base_url('assets/images/product_barang/') . $p['image']; ?>" width="200" height="150" alt="Gambar Product"> </td>
                    <td>
                      <a href="#" class="mr-3"><span class="btn btn-sm btn-success waves-effect waves-light" data-toggle="modal" data-target="#newEditModal<?php echo $p['id_barang']; ?>">Edit</span></a>
                      <a class="btn-hapus" href="<?php echo base_url('barang/deleteproduct/') . encrypt_url($p['id_barang']); ?>"><span class="btn btn-sm btn-danger waves-effect waves-light">Delete</span></a>
                    </td>
                  </tr>
                  <?php $no++; ?>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div> <!-- end col -->
    <!--====END CONTENT HERE =====-->

  </div> <!-- end container -->
</div>
<!-- end wrapper -->

<!-- START TAMBAH Product MODAL -->
<div class="modal fade" id="newAddModal" tabindex="-1" aria-labelledby="newAddModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="newAddModalLabel">Tambah Product Baru</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?php echo base_url(); ?>barang/tambahproduct" method="POST" enctype="multipart/form-data">
        <div class="modal-body">
          <div class="form-group">
            <label for="kategori">Kategori</label><br>
            <input type="text" class="form-control" id="kategori" name="kategori" placeholder="Kategori" autocomplete="off" required>
          </div>
          <div class="form-group">
            <label for="nama_barang">Nama Barang</label><br>
            <input type="text" class="form-control" id="nama_barang" name="nama_barang" placeholder="Nama Barang" autocomplete="off" required>
          </div>
          <div class="form-group">
            <label for="harga">harga</label><br>
            <input type="number" class="form-control" id="harga" min="0" name="harga" placeholder="Harga" autocomplete="off" required>
          </div>
          <div class="form-group">
            <label for="deskripsi">Deskripsi Barang</label><br>
            <textarea class="form-control" name="deskripsi" rows="5" required></textarea>
          </div>
          <div class="form-group">
            <label for="warna">Warna</label><br>
            <input type="text" class="form-control" id="warna" name="warna" placeholder="Warna" autocomplete="off" required>
          </div>
          <div class="form-group">
            <label for="stok">Stok</label><br>
            <input type="text" class="form-control" id="stok" name="stok" placeholder="Stok" autocomplete="off" onkeypress="isInputNumber(event)" required>
          </div>
          <div class="form-group">
            <label class="control-label">Upload Foto</label>
            <div class="card shadow-lg">
              <div class="card-body">
                <h4 class="mt-0 header-title">File Upload</h4>
                <p class="text-muted mb-3">Upload gambar disini</p>
                <input type="file" id="input-file-now" name="image" class="dropify" required />
              </div>
              <!--end card-body-->
            </div>
            <!--end card-->
            <small>Upload foto ukuran 4x6 Maksimal 3MB | Ukuran 420x420</small>
            <!--end form-group-->
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Tambah</button>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- END TAMBAH Product MODAL -->

<!-- START EDIT Product MODAL -->
<?php
foreach ($product as $p) :  ?>
  <div class="modal fade" id="newEditModal<?php echo $p['id_barang']; ?>" tabindex="-1" aria-labelledby="newEditModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="newEditModalLabel">Edit Product</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="<?php echo base_url(); ?>barang/editproduct" method="POST" enctype="multipart/form-data">
          <input type="hidden" name="id_barang" value="<?php echo $p['id_barang']; ?>">
          <div class="modal-body">
            <div class="form-group">
              <label for="kategori">Kategori</label><br>
              <input type="text" class="form-control" id="kategori" name="kategori" placeholder="Kategori" autocomplete="off" value="<?= $p['kategori'] ?>" required>
            </div>
            <div class="form-group">
              <label for="nama_barang">Nama Barang</label><br>
              <input type="text" class="form-control" id="nama_barang" name="nama_barang" placeholder="Nama Barang" autocomplete="off" value="<?= $p['nama_barang'] ?>" required>
            </div>
            <div class="form-group">
              <label for="harga">harga</label><br>
              <input type="number" class="form-control" id="harga" min="0" name="harga" placeholder="Harga" autocomplete="off" value="<?= $p['harga'] ?>" required>
            </div>
            <div class="form-group">
              <label for="deskripsi">Deskripsi Barang</label><br>
              <textarea class="form-control" name="deskripsi" rows="5" required><?php echo $p['harga'] ?></textarea>
            </div>
            <div class="form-group">
              <label for="warna">Warna</label><br>
              <input type="text" class="form-control" id="warna" name="warna" placeholder="Warna" autocomplete="off" value="<?= $p['warna'] ?>" required>
            </div>
            <div class="form-group">
              <label for="stok">Stok</label><br>
              <input type="text" class="form-control" id="stok" name="stok" placeholder="Stok" autocomplete="off" onkeypress="isInputNumber(event)" value="<?= $p['stok'] ?>" required>
            </div>
            <div class="form-group">
              <label class="control-label">Preview Foto</label>
              <br>
              <img src="<?php echo base_url('assets/images/product_barang/') . $p['image']; ?>" width="200" height="150" alt="Gambar Product">
            </div>
            <div class="form-group">
              <label class="control-label">Upload Foto</label>
              <div class="card shadow-lg">
                <div class="card-body">
                  <h4 class="mt-0 header-title">File Upload</h4>
                  <p class="text-muted mb-3">Upload gambar disini</p>
                  <input type="file" id="input-file-now" name="image" class="dropify" />
                </div>
                <!--end card-body-->
              </div>
              <!--end card-->
              <small>Upload foto ukuran 4x6 Maksimal 3MB | Ukuran 420x420</small>
              <!--end form-group-->
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Edit</button>
          </div>
        </form>
      </div>
    </div>
  </div>
<?php endforeach; ?>
<!-- END EDIT Product MODAL -->


<!-- Footer -->
<?php $this->load->view('templates/footers/footer'); ?>
<!-- End Footer -->