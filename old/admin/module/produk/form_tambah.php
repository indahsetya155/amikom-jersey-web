
<!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Management 
            <small>Produk</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Produk</li>
          </ol>
        </section>

        <!-- Main content -->
    <section class="content">
          <!-- Info boxes -->
          <div class="row">
        <div class="col-md-12">
            <!-- Horizontal Form -->
            <div class="box box-info">
                <div class="box-header with-border">
                  <h3 class="box-title">Form Tambah Produk</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form class="form-horizontal" action="../admin/module/produk/aksi_simpan.php" method="post" enctype="multipart/form-data">
                  <div class="box-body">
                    <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">Kategori</label>
                      <div class="col-sm-10">
                        <select class="form-control" name="idKategori">
                          <?php 
                        
                        include "../lib/koneksi.php";
                        $kueriKategori = mysqli_query($koneksi,"SELECT * FROM tbl_kategori");
                        while ($pro=mysqli_fetch_array($kueriKategori)) {
                        ?>
                        <option value="<?php echo $pro['id_kategori'];?>"><?php echo $pro['nama_kategori'];?></option><?php } ?>
                        </select>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">Merek</label>
                      <div class="col-sm-10">
                        <select class="form-control" name="idMerek">
                          <?php 
                        $kueriMerek = mysqli_query($koneksi,"SELECT * FROM tbl_merek");
                        while ($pro=mysqli_fetch_array($kueriMerek)) {
                        ?>
                        <option value="<?php echo $pro['id_merek'];?>"><?php echo $pro['nama_merek'];?></option><?php } ?>
                        </select>
                      </div>
                    </div>
                     <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">Nama Produk</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="namaProduk" name="namaProduk" placeholder="Nama Produk">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">Gambar</label>
                      <div class="col-sm-10">
                        <input type="file" id="gambar" name="gambar">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">Deskripsi Produk</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="deskripsiProduk" name="deskripsiProduk" placeholder="Deskripsi Produk">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">Harga Produk</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="hargaProduk" name="hargaProduk" placeholder="Harga Produk">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">Slide</label>
                      <div class="col-sm-10">
                        <div class="radio">
                          <label>
                        <input type="radio" name="slide" id="slide" value="Y">Ya
                      </label>
                      </div>
                      <div class="radio">
                          <label>
                        <input type="radio" name="slide" id="slide" value="N">Tidak
                      </label>
                      </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">Produk Rekomendasi</label>
                      <div class="col-sm-10">
                        <div class="radio">
                          <label>
                        <input type="radio" name="rekomendasi" id="rekomendasi" value="Y">Ya
                      </label>
                      </div>
                      <div class="radio">
                          <label>
                        <input type="radio" name="rekomendasi" id="rekomendasi" value="N">Tidak
                      </label>
                      </div>
                      </div>
                    </div> 
                  </div><!-- /.box-body -->
                  <div class="box-footer">
                     <button type="submit" class="btn btn-info pull-right">Simpan</button>
                  </div><!-- /.box-footer -->
                </form>
            </div><!-- /.box -->   
            </div>
            </section>
            <!-- Main content -->          
    </div><!-- /.content-wrapper -->