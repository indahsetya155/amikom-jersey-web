
<?php 
include "../lib/config.php";
include "../lib/koneksi.php";
 
$id_kurir=$_GET['id_kurir'];
$queryEdit=mysqli_query($koneksi, "SELECT * FROM tbl_kurir WHERE id_kurir='$id_kurir'");

$hasilQuery=mysqli_fetch_array($queryEdit);
$id_kurir=$hasilQuery['id_kurir'];  
$nama_kurir=$hasilQuery['nama_kurir'];

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Management
            <small>Kurir</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Kurir</li>
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
                  <h3 class="box-title">Form Edit Kurir</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form class="form-horizontal" action="../admin/module/biaya_kirim/aksi_edit_kurir.php" method="post">
                <input type="hidden" name="id_kurir" value="<?php echo $id_kurir; ?>"> 
                  <div class="box-body">
                    <div class="form-group">
                      <label for="nama_kurir" class="col-sm-2 control-label">Nama kurir</label>
                      <div class="col-sm-10">
                        <input autofocus type="text" class="form-control" id="nama_kurir" name="nama_kurir" placeholder="Nama Kurir" value="<?= $nama_kurir;?>">
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