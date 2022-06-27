<?php
 include "../lib/config.php";
 if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])) {
	 echo "<center>Untuk mengakses modul, Anda harus login <br>";
	 echo "<a href=$admin_url><b>LOGIN</b></a></center>";
 } else{
 ?> 

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Management
            <small>Kategori</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Kategori</li>
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
                  <h3 class="box-title">Form Edit Kategori</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
				<?php 
		include "../lib/config.php";
		include "../lib/koneksi.php";
 
		$idKategori=$_GET['id_kategori'];
		$queryEdit=mysqli_query($koneksi, "SELECT * FROM tbl_kategori WHERE id_kategori='$idKategori'");

		$hasilQuery=mysqli_fetch_array($queryEdit);
		$idKategori=$hasilQuery['id_kategori'];  
		$namaKategori=$hasilQuery['nama_kategori'];

				?>
                <form class="form-horizontal" action="../admin/module/kategori/aksi_edit.php" method="post">
                <input type="hidden" name="id_kategori" value="<?php echo $idKategori; ?>"> 
                  <div class="box-body">
                    <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">Nama Kategori</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="namaKategori" name="nama_kategori" placeholder="Nama Kategori" value="<?= $namaKategori;?>">
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
	
	 <?php } ?>