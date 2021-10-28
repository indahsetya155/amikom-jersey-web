<?php 
include "../lib/config.php";
include "../lib/koneksi.php";
 
$idProduk=$_GET['id_produk'];
$queryEdit=mysqli_query($koneksi, "SELECT * FROM tbl_produk WHERE id_Produk='$idProduk'");
$hasilQuery=mysqli_fetch_array($queryEdit);
$id_produk=$hasilQuery['id_produk'];  
$id_kategori_produk = $hasilQuery['id_kategori_produk'];
$id_merek = $hasilQuery['id_merek'];
$namaProduk=$hasilQuery['nama_produk'];
$hargaProduk=$hasilQuery['harga'];
$deskripsiProduk=$hasilQuery['deskripsi'];
$gambar = $hasilQuery['gambar'];
$slide = $hasilQuery['slide'];
$rekomendasi = $hasilQuery['rekomendasi'];

?>



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
                  <h3 class="box-title">Form Edit Produk</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form class="form-horizontal" action="../admin/module/produk/aksi_edit.php" method="POST" enctype="multipart/form-data">
                  <input type="hidden" name="id_produk" value="<?php echo $idProduk; ?>"> 
                  <div class="box-body">
                    <div class="form-group">
                      <label for="idKategori" class="col-sm-2 control-label">Kategori</label>
                      <div class="col-sm-10">
                        <select class="form-control" name="idKategori">
                          <option>Pilih Kategori</option>
                          <?php 
                        
                        include "../lib/koneksi.php";
                        $kueriKategori = mysqli_query($koneksi,"SELECT * FROM tbl_kategori");
                        while ($idKategori=mysqli_fetch_array($kueriKategori)) {
                        ?>
                        <option value="<?php echo $idKategori['id_kategori'];?>"><?php echo $idKategori['nama_kategori'];?></option><?php } ?>
                        </select>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="idMerek" class="col-sm-2 control-label">Merek</label>
                      <div class="col-sm-10">
                        <select class="form-control" name="idMerek">
                          <option>Pilih Merek</option>
                          <?php 
                        $kueriMerek = mysqli_query($koneksi,"SELECT * FROM tbl_merek");
                        while ($idMerek=mysqli_fetch_array($kueriMerek)) {
                        ?>
                        <option value="<?php echo $idMerek['id_merek'];?>"><?php echo $idMerek['nama_merek'];?></option><?php } ?>
                        </select>
                      </div>
                    </div>
                     <div class="form-group">
                      <label for="namaProduk" class="col-sm-2 control-label">Nama Produk</label>
                      <div class="col-sm-10">
                        <input autofocus type="text" class="form-control" id="namaProduk" name="nama_produk" placeholder="Nama Produk" value="<?= $namaProduk;?>">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="gambar" class="col-sm-2 control-label">Gambar</label>
                      <div class="col-sm-10">
                        <input type="file" id="gambar" name="gambar" required>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="deskripsiProduk" class="col-sm-2 control-label">Deskripsi Produk</label>
                      <div class="col-sm-10">
                        <input autofocus type="text" class="form-control" id="deskripsiProduk" name="deskripsi" placeholder="Deskripsi Produk" value="<?= $deskripsiProduk;?>">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="hargaProduk" class="col-sm-2 control-label">Harga Produk</label>
                      <div class="col-sm-10">
                        <input autofocus type="text" class="form-control" id="hargaProduk" name="harga" placeholder="Harga Produk" value="<?= $hargaProduk;?>">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="slide" class="col-sm-2 control-label">Slide</label>
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
                      <label for="rekomendasi" class="col-sm-2 control-label">Produk Rekomendasi</label>
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