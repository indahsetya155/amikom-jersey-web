
<?php 
include "../lib/config.php";
include "../lib/koneksi.php";
 
$idMerek=$_GET['id_merek'];
$queryEdit=mysqli_query($koneksi, "SELECT * FROM tbl_merek WHERE id_merek='$idMerek'");

$hasilQuery=mysqli_fetch_array($queryEdit);
$idMerek=$hasilQuery['id_merek'];  
$namaMerek=$hasilQuery['nama_merek'];

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Management
            <small>Merek</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Merek</li>
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
                  <h3 class="box-title">Form Edit Merek</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form class="form-horizontal" action="../admin/module/merek/aksi_edit.php" method="post">
                <input type="hidden" name="id_merek" value="<?php echo $idMerek; ?>"> 
                  <div class="box-body">
                    <div class="form-group">
                      <label for="namaMerek" class="col-sm-2 control-label">Nama Merek</label>
                      <div class="col-sm-10">
                        <input autofocus type="text" class="form-control" id="namaMerek" name="nama_merek" placeholder="Nama Merek" value="<?= $namaMerek;?>">
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