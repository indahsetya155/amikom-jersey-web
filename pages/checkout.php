
	<?php
$sid = session_id();
	?>

	<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="#">Home</a></li>
				  <li class="active">Shopping Cart</li>
				</ol>
			</div>
			<div class="table-responsive cart_info">
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="image">Gambar</td>
							<td class="description">Nama Produk</td>
							<td class="price">Harga</td>
							<td class="quantity">Jumlah</td>
							<td class="total">Sub Total</td>
							<td></td>
						</tr>
					</thead>
					<tbody>
						<?php
						$sql = mysqli_query($koneksi, "SELECT * FROM tbl_order, tbl_produk WHERE tbl_order.id_session='$sid' AND tbl_order.id_produk=tbl_produk.id_produk");

						while($r=mysqli_fetch_array($sql)){
							$subtotal = $r['harga']*$r['jumlah'];

						
						?>
						<tr>
							<td class="cart_product">
								<a href=""><img src="admin/upload/<?php echo $r['gambar'];?>" style="height: 120px;" alt=""></a>
							</td>
							<td class="cart_description">
								<h4><a href=""><?php echo $r['nama_produk'];?> </a></h4>
								
							</td>
							<td class="cart_price">
								<p>Rp. <?php echo $r['harga'];?></p>
							</td>
							<td class="cart_quantity">
								<?php echo $r['jumlah'];?>
							</td>
							<td class="cart_total">
								<p class="cart_total_price">Rp. <?php echo number_format($subtotal); ?></p>
							</td>
							<td class="cart_delete">
								<a class="cart_quantity_delete" href=""><i class="fa fa-times"></i></a>
							</td>
						</tr>
							<?php } ?>
							<tr>
							<td colspan="4">&nbsp;</td>
							<td colspan="2">
								<table class="table table-condensed total-result">
									<tr>
										<td>Sub Total</td>
										<td>Rp. </td>
									</tr>
									<tr>
										<td>Biaya Kirim</td>
										<td>Rp.</td>
									<tr>
										<td>Total</td>
										<td><span>Rp.</span></td>
									</tr>
								</table>
							</td>
						</tr>
					</tbody>
				</table>
			</div>

			<div class="row">
			<div class="col-sm-8">
				<div class="contact-form">
					<h2 class="title text-center">Pilih Kurir</h2>
					<div class="status alert-success" style="display: none"></div>
					<form id="main-contact-form" class="contact-form row" name="contact-form" method="post">
						
						<div class="form-group col-md-6">
							<select class="form-control" >
								<?php
								$getKurir = mysqli_query($koneksi, "select * from tbl_kurir");
								while($itemKurir=mysqli_fetch_array($getKurir)){

								?>

								
								<option value="<?php echo $itemKurir['id_kurir']?>"><?php echo $itemKurir['nama_kurir'] ?></option>
							<?php } ?>
							</select>	
						</div>
						<div class="form-group col-md-2">
							<input type="submit" name="submit" class="btn btn-primary pull-right" value="Pilih Kurir">
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</section>
			<?php
						$idMember = $_SESSION['idMember'];
						$queryGetProfilMember = mysqli_query($koneksi, " SELECT * FROM tbl_member WHERE id_member='$idMember'");
						$res = mysqli_fetch_array($queryGetProfilMember);

						?>
			<div class="row">
			<div class="col-sm-8">
				<div class="contact-form">
					<h2 class="title text-center">DATA PENERIMA</h2>
					<div class="status alert-success" style="display: none"></div>
					<form id="main-contact-form" class="contact-form row" name="contact-form" method="post">
						<div class="form-group col-md-6">
							<input type="text" name="name" class="form-control" required="required" placeholder="Nama" value="<?php echo $res['nama'];?>" disabled>

						</div>
						<div class="form-group col-md-6">
							<input type="email" name="email" class="form-control" required="required" placeholder="Email" value="<?php echo $res['email'];?> " disabled>	
						</div>
						<div class="form-group col-md-6">
							<input type="text" name="name" class="form-control" required="required" placeholder="Nomor handphone" value="<?php echo $res['no_hp']; ?>" disabled>	
						</div>
						<div class="form-group col-md-6">
							<select class="form-control" name="ongkir">
								
								<?php
								$getKota = mysqli_query($koneksi, "select * from tbl_kota");
								while($itemkota=mysqli_fetch_array($getKota)){

								?>
								<option>Pilih Tujuan Kota</option>
								<option value="<?php echo $itemkota['id_kota']?>">
									<?php echo $itemkota['nama_kota'] ?>
									</option>
							<?php } ?>
							</select>	
						</div>
						<div class="form-group col-md-12">
							<textarea name="message" id="message" required="required" class="form-control" rows="8" placeholder="Your Message Here" disabled><?php echo $res['alamat']; ?></textarea>
						</div>
						<div class="form-group col-md-12">
							<input type="submit" name="submit" class="btn btn-primary pull-right" value="Submit">
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</section>
			