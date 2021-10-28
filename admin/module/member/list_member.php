
      <div class="col-lg-12 stretch-card">

              <div class="card">
                <div class="card-body">

                 <h4 class="font-weight-bold mb-0 d-none d-md-block mt-1">Data Member</h4>
                  <p class="card-description">
                    Daftar Member 
                  </p>

                 <table class="table table-hover table-white">
  <thead>
    <tr>
      <th scope="col"><center>  No</center></th>
      <th scope="col"><center>username</center> </th>
      <th scope="col"><center>password </center> </th>
      <th scope="col"><center> nama</center></th>
      <th scope="col"><center> alamat</center></th>
      <th scope="col"><center> id kota</center> </th>
      <th scope="col"><center> email</center></th>
      <th scope="col"><center> no hp</center></th>
    </tr>
  </thead>
  <?php 


  include "../../lib/koneksi.php";
 $a = 1;
  $kuericus= mysqli_query($koneksi, "SELECT * FROM tb_logincus");
  while ($kat=mysqli_fetch_array($kuericus))

    
{
  $id_cus = $kat ['username'];
  $status = $kat ['status'];
    
    ?>

  <tbody>
    <tr>
      <th>
        <center>
          <?php
          echo  $a++;
          ?>
        </center>
      </th>
      <td>
        <center>
          <?php 
          echo $kat ['nama'];
          ?>
        </center>
      </td>
      <td>
      <center>
         <?php 
          echo $kat ['alamat'];
          ?>
        </center>
      </td>
      <th>
        <center>
          <?php 
          echo $kat ['email'];
          ?>
        </center>
      </th>
      <td>
        <center>
         <?php 
          echo $kat ['hp'];
          ?>
        </center>
      </td>
      <td>
        <center>
           <?php 
           $status= $kat ['status'];
         if ($status =='A') {
           echo "Aktif";
         }elseif ($status =='N') {
           echo "Nonaktif";
         }
         else{
          echo "Aktif";
        }
          ?>
        </center>
      </td>
      <td>
        <center>
          <div class="btn-group">
                            <button type="button" class="btn btn-outline-secondary dropdown-toggle" data-toggle="dropdown">Action</button>
                            <div class="dropdown-menu">
                               <a class="dropdown-item" href="view.php?id=<?php echo$kat ['id_login']; ?>&id_cus=<?php echo $id_cus; ?>" ><i class="mdi mdi-eye"></i> Lihat</a>
<? if ($status== '' || $status == 'A') {
  ?>
 <a href="aksi_nonaktif.php?id=<?php echo$kat ['id_login']; ?>&id_cus=<?php echo $id_cus; ?>&status=<?php echo "N" ?> " onClick="return confrim('yakin mau menghapus?')" class="dropdown-item">
                                 <i class="mdi mdi-block-helper"></i>
                               Nonaktifkan
                               </a>

  <?
}else{
  ?>
 <a href="aksi_nonaktif.php?id=<?php echo$kat ['id_login']; ?>&id_cus=<?php echo $id_cus; ?>&status=<?php echo "A"; ?> " class="dropdown-item">
                                
                               Aktifkan
                               </a>
<?
}
                              
  ?>                            
                              
                            </div>                          
                          </div>
        </center></td>
   
    </tr>

  </tbody>
    <?php

  }
  ?>
</table>



 

<?php
include "../page/footer.php";
}
?>