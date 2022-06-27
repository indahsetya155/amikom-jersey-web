
<!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Management 
            <small>Biaya Kirim</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Biaya Kirim</li>
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
                  <h3 class="box-title">Form Edit Biaya Kirim</h3>
                </div><!-- /.box-header -->
                  <?php 
    include "../lib/config.php";
    include "../lib/koneksi.php";
 
    $id_biaya_kirim=$_GET['id_biaya_kirim'];
    $queryEdit=mysqli_query($koneksi, "SELECT * FROM tbl_biaya_kirim WHERE id_biaya_kirim='$id_biaya_kirim'");

    $hasilQuery=mysqli_fetch_array($queryEdit);
    $id_kota=$hasilQuery['id_kota'];  
    $id_kurir=$hasilQuery['id_kurir'];
    $biaya=$hasilQuery['biaya'];
        ?>
                <!-- form start -->
                <form class="form-horizontal" action="../admin/module/biaya_kirim/aksi_edit_biaya.php" method="post" enctype="multipart/form-data">
                  <input type="hidden" name="id_biaya_kirim" value="<?php echo $id_biaya_kirim; ?>"></input>
                  <div class="box-body">
                    <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">Kota Tujuan</label>
                      <div class="col-sm-10">
                        <select class="form-control" name="id_kota">

                          <?php 
                        include "../lib/koneksi.php";
                        $kueriKota = mysqli_query($koneksi,"SELECT * FROM tbl_kota");
                        while ($kota=mysqli_fetch_array($kueriKota)) {
                           if ($id_kota==$kota['id_kotar']) {
                            $select = "selected";
                            } else {
                                $selected="";
                          }
                        ?>
                        <option value="<?php echo $kota['id_kota'];?>" <?php echo $selected; ?>><?php echo $kota['nama_kota'];?></option><?php } ?>
                        </select>
                      </div>
                    </div>
                         <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">Kurir</label>
                      <div class="col-sm-10">
                        <select class="form-control" name="id_kurir">

                          <?php 
                        $kueriKurir = mysqli_query($koneksi,"SELECT * FROM tbl_kurir");
                        while ($kurir=mysqli_fetch_array($kueriKurir)) {
                          if ($id_kurir==$kurir['id_kurir']) {
                            $select = "selected";
                            } else {
                                $selected="";
                          }
                        ?>
                        <option value="<?php echo $kurir['id_kurir'];?>" <?php echo $selected; ?>><?php echo $kurir['nama_kurir'];?></option> <?php } ?>
                        </select>
                      </div>
                   </div>

                         <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">Biaya</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="biaya" name="biaya" placeholder="Biaya" value="<?php echo $biaya; ?>">
                      </div>
                    </div>
                    
                  <div class="box-footer">
                     <button type="submit" class="btn btn-info pull-right">Simpan</button>
                  </div><!-- /.box-footer -->
                </form>
            </div><!-- /.box -->   
            </div>
            </section>
            <!-- Main content -->          
    </div><!-- /.content-wrapper -->