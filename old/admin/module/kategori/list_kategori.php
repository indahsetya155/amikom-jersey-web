<?php
 include "../lib/config.php";
 session_start();
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
            Manajement
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
            <div class="box box-info">
                <div class="box-header with-border">
                  <h3 class="box-title">List Kategori</h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                  </div>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <div class="table-responsive">
                    <table class="table no-margin">
                      <thead> 
                        <tr>
                          <th>Kategori</th>
                          <th style="width: 110px">Aksi</th>
                        </tr>
                      </thead>

                        <?php 
                        include "../lib/config.php";
                        include "../lib/koneksi.php";
                        $kueriKategori = mysqli_query($koneksi, "select * from tbl_kategori");
                        while ($kat=mysqli_fetch_array($kueriKategori)) {
                        ?>

                        <tr>
                            <td><?php echo $kat['nama_kategori']; ?></td>
                            <td>
                            <div class="btn-group">
                            <a href=" <?php echo $admin_url; ?>adminweb.php?module=edit_kategori&id_kategori=<?php echo $kat['id_kategori']; ?>" class = "btn btn-warning"><i class="fa fa-pencil"></i></button></a> 
                            <a href=" <?php echo $admin_url; ?>module/kategori/aksi_hapus.php?id_kategori=<?php echo $kat['id_kategori']; ?>" onClick = "return confirm('anda yakin ingin menghapus data ini')" class = "btn btn-danger"><i class="fa fa-power-off"></i></button></a> 
                            </div>
                            </td>
                        </tr>
                        
                        <?php } ?>
                    </table>
                  </div><!-- /.table-responsive -->
                </div><!-- /.box-body -->
                <div class="box-footer clearfix">
                  <a href="adminweb.php?module=tambah_kategori" class="btn btn-sm btn-info btn-flat pull-left">Tambah Kategori</a>
                  <a href="javascript::;" class="btn btn-sm btn-default btn-flat pull-right">View All Orders</a>
                </div><!-- /.box-footer -->
              </div><!-- /.box -->
              </div>
            </div>
            </section>
            <!-- Main content -->
        </div><!-- /.content-wrapper -->
 <?php } ?>




