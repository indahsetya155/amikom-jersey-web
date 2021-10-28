<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Manajement
            <small>Biaya Kirim</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
            <li class="active">Data Biaya Kirim</li>
          </ol>
        </section>
    <!-- Main content -->
    <section class="content">
          <!-- Info boxes -->
          <div class="row">
         <div class="col-md-12">
            <div class="box box-info">
                <div class="box-header with-border">
                  <h3 class="box-title">List Biaya Kirim</h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                  </div>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <div class="table-responsive">
                    <table class="table no-margin">
                      <thead> 
                        <tr>
                          <th>Kota tujuan</th>
                          <th>Kurir</th>
                          <th>Biaya</th>
                          <th style="width: 110px">Aksi</th>
                        </tr>
                      </thead>

                        <?php 
                        include "../lib/config.php";
                        include "../lib/koneksi.php";
                        $kueriKirim = mysqli_query($koneksi,"SELECT b.id_biaya_kirim, k.nama_kota, j.nama_kurir,b.biaya
                                                              FROM tbl_kota k, tbl_kurir j, tbl_biaya_kirim b
                                                              WHERE b.id_kota=k.id_kota AND b.id_kurir=j.id_kurir");
                        while ($kir=mysqli_fetch_array($kueriKirim)) {
                        ?>

                        <tr>
                            <td><?php echo $kir['nama_kota']; ?></td>
                            <td><?php echo $kir['nama_kurir']; ?></td>
                            <td><?php echo $kir['biaya']; ?></td>
                             <td>
                            <div class="btn-group">
                            <a href="<?php echo $admin_url; ?>adminweb.php?module=edit_biaya&id_biaya_kirim=<?php echo $kir['id_biaya_kirim']; ?>" class = "btn btn-warning"><i class="fa fa-pencil"></i></button></a> 
                            <a href="<?php echo $admin_url; ?>module/biaya_kirim/aksi_hapus_biaya.php?id_=<?php echo $kir['id_biaya_kirim']; ?>" onClick = "return confirm('anda yakin ingin menghapus data ini')" class = "btn btn-danger"><i class="fa fa-power-off"></i></button></a> 
                            </div>
                            </td>
                        </tr>
                        
                        <?php } ?>
                    </table>
                  </div><!-- /.table-responsive -->
                </div><!-- /.box-body -->
                <div class="box-footer clearfix">
                  <a href="adminweb.php?module=tambah_biaya" class="btn btn-sm btn-info btn-flat pull-left">Tambah Biaya Kirim</a>
                  <a href="javascript::;" class="btn btn-sm btn-default btn-flat pull-right">View All Biaya</a>
                </div><!-- /.box-footer -->
              </div><!-- /.box -->
              </div>
            </div>
            </section>
            <!-- Main content -->
        </div><!-- /.content-wrapper -->





