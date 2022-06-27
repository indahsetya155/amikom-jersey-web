<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Manajement
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
            <div class="box box-info">
                <div class="box-header with-border">
                  <h3 class="box-title">List Produk</h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                  </div>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <div class="table-responsive">
                    <table class="table no-margin">
                      <thead> 
                        <tr>
                          <th>Produk</th>
                          <th>Deskripsi</th>
                          <th>Harga</th>
                          <th>Slide</th>
                          <th>Rekomendasi</th>
                          <th>Gambar</th>
                          <th style="width: 110px">Aksi</th>
                        </tr>
                      </thead>

                        <?php 
                        include "../lib/config.php";
                        include "../lib/koneksi.php";
                        $kueriProduk = mysqli_query($koneksi,"SELECT * FROM tbl_produk");
                        while ($pro=mysqli_fetch_array($kueriProduk)) {
                        ?>

                        <tr>
                            <td><?php echo $pro['nama_produk']; ?></td>
                            <td><?php echo $pro['deskripsi']; ?></td>
                            <td><?php echo $pro['harga']; ?></td>
                            <td><?php echo $pro['slide']; ?></td>
                            <td><?php echo $pro['rekomendasi']; ?></td>
                            <td>
                              <img src="upload/<?php echo $pro['gambar'];?>" alt="<?= $pro['nama_produk']; ?>" height="80" width="120">
                            </td>
                            <td>
                            <div class="btn-group">
                            <a href="<?php echo $admin_url; ?>adminweb.php?module=edit_produk&id_produk=<?php echo $pro['id_produk']; ?>" class = "btn btn-warning"><i class="fa fa-pencil"></i></button></a> 
                            <a href="<?php echo $admin_url; ?>module/produk/aksi_hapus.php?id_produk=<?php echo $pro['id_produk']; ?>" onClick = "return confirm('anda yakin ingin menghapus data ini')" class = "btn btn-danger"><i class="fa fa-power-off"></i></button></a> 
                            </div>
                            </td>
                        </tr>
                        
                        <?php } ?>
                    </table>
                  </div><!-- /.table-responsive -->
                </div><!-- /.box-body -->
                <div class="box-footer clearfix">
                  <a href="adminweb.php?module=tambah_produk" class="btn btn-sm btn-info btn-flat pull-left">Tambah Produk</a>
                  <a href="javascript::;" class="btn btn-sm btn-default btn-flat pull-right">View All Produk</a>
                </div><!-- /.box-footer -->
              </div><!-- /.box -->
              </div>
            </div>
            </section>
            <!-- Main content -->
        </div><!-- /.content-wrapper -->





