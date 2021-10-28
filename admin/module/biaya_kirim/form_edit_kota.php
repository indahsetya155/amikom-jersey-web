
<?php 
include "../lib/config.php";
include "../lib/koneksi.php";
 
$id_kota=$_GET['id_kota'];
$queryEdit=mysqli_query($koneksi, "SELECT * FROM tbl_kota WHERE id_kota='$id_kota'");

$hasilQuery=mysqli_fetch_array($queryEdit);
$id_kota=$hasilQuery['id_kota'];  
$nama_kota=$hasilQuery['nama_kota'];

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Management
            <small>Kota</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Kota</li>
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
                  <h3 class="box-title">Form Edit Kota</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form class="form-horizontal" action="../admin/module/biaya_kirim/aksi_edit_kota.php" method="post">
                <input type="hidden" name="id_kota" value="<?php echo $id_kota; ?>"> 
                  <div class="box-body">
                    <div class="form-group">
                      <label for="nama_kota" class="col-sm-2 control-label">Nama Kota</label>
                      <div class="col-sm-10">
                        <input autofocus type="text" class="form-control" id="nama_kota" name="nama_kota" placeholder="Nama Kota" value="<?= $nama_kota;?>">
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