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

		<?php
		$idMember = $_SESSION['idMember'];
		$queryGetProfilMember = mysqli_query($koneksi, " SELECT * FROM tbl_member WHERE id_member='$idMember'");
		$res = mysqli_fetch_array($queryGetProfilMember);
		?>

		<div class="row">
			<div class="col-sm-12">
				<div class="contact-form text-center">
					<h2 class="title text-center">Pilih Kurir</h2>
					<div class="status alert-success" style="display: none"></div>
					<form id="main-contact-form" class="contact-form row" name="contact-form" method="get" action="selesai.php">

						<div class="form-group col-md-5">
							<select class="form-control" name="id_kurir">
								<option>Pilih Kurir</option>
								<?php
								$getKurir = mysqli_query($koneksi, "select * from tbl_kurir");
								while ($itemKurir = mysqli_fetch_array($getKurir)) {
								?>
									<?php if ($itemKurir['id_kurir'] == $_GET["id_kurir"]) { ?>
										<option selected value="<?php echo $itemKurir['id_kurir'] ?>"><?php echo $itemKurir['nama_kurir'] ?></option>
									<?php } else { ?>
										<option value="<?php echo $itemKurir['id_kurir'] ?>"><?php echo $itemKurir['nama_kurir'] ?></option>
									<?php } ?>
								<?php } ?>
							</select>
						</div>
						<div class="form-group col-md-5">
							<select class="form-control" name="id_kota">
								<option>Pilih Tujuan Kota</option>
								<?php
								$getKota = mysqli_query($koneksi, "select * from tbl_kota");
								while ($itemkota = mysqli_fetch_array($getKota)) {
								?>
									<?php if ($itemkota['id_kota'] == $_GET["id_kota"]) { ?>
										<option selected value="<?php echo $itemkota['id_kota'] ?>">
											<?php echo $itemkota['nama_kota'] ?>
										</option>
									<?php } else { ?>
										<option value="<?php echo $itemkota['id_kota'] ?>">
											<?php echo $itemkota['nama_kota'] ?>
										</option>
									<?php } ?>
								<?php } ?>
							</select>
						</div>
						<div class="form-group col-md-2">
							<button type="submit" class="btn btn-primary pull-right">Pilih Kurir</button>
						</div>
					</form>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-sm-12">
				<div class="contact-form">
					<h2 class="title text-center">DATA PENERIMA</h2>
					<div class="status alert-success" style="display: none"></div>
					<form id="main-contact-form" class="contact-form row" name="contact-form" method="post">
						<div class="form-group col-md-6">
							<input type="text" name="name" class="form-control" required="required" placeholder="Nama" value="<?php echo $res['nama']; ?>" disabled>

						</div>
						<div class="form-group col-md-6">
							<input type="email" name="email" class="form-control" required="required" placeholder="Email" value="<?php echo $res['email']; ?> " disabled>
						</div>
						<div class="form-group col-md-6">
							<input type="text" name="name" class="form-control" required="required" placeholder="Nomor handphone" value="<?php echo $res['no_hp']; ?>" disabled>
						</div>
						<div class="form-group col-md-6">
							<select class="form-control" name="ongkir" disabled>
								<option>Pilih Tujuan Kota</option>
								<?php
								$getKota = mysqli_query($koneksi, "select * from tbl_kota");
								while ($itemkota = mysqli_fetch_array($getKota)) {
								?>
									<?php if ($itemkota['id_kota'] == $_GET["id_kota"]) { ?>
										<option selected value="<?php echo $itemkota['id_kota'] ?>">
											<?php echo $itemkota['nama_kota'] ?>
										</option>
									<?php } else { ?>
										<option value="<?php echo $itemkota['id_kota'] ?>">
											<?php echo $itemkota['nama_kota'] ?>
										</option>
									<?php } ?>
								<?php } ?>
							</select>
						</div>
						<div class="form-group col-md-12">
							<textarea name="message" id="message" required="required" class="form-control" rows="8" placeholder="Your Message Here" disabled><?php echo $res['alamat']; ?></textarea>
						</div>

						<br>
						<hr><br>

						<div class="table-responsive cart_info">
							<table class="table table-condensed">
								<thead>
									<tr class="cart_menu">
										<td class="image text-center">Gambar</td>
										<td class="description">Nama Produk</td>
										<td class="quantity text-center">Jumlah</td>
										<td class="price text-center">Harga</td>
										<td class="total text-right">Sub Total</td>
										<td></td>
									</tr>
								</thead>
								<tbody>
									<?php
									$total = 0;
									$totalsuborder = 0;
									$sql = mysqli_query($koneksi, "SELECT * FROM tbl_order, tbl_produk WHERE tbl_order.id_session='$sid' AND tbl_order.id_produk=tbl_produk.id_produk");

									while ($r = mysqli_fetch_array($sql)) {
										$subtotal = $r['harga'] * $r['jumlah'];


									?>
										<tr>
											<td class="cart_product text-center">
												<a href=""><img src="admin/upload/<?php echo $r['gambar']; ?>" style="height: 120px;" alt=""></a>
											</td>
											<td class="cart_description">
												<h4><a href=""><?php echo $r['nama_produk']; ?> </a></h4>
											</td>
											<td class="cart_quantity text-center">
												<?php echo $r['jumlah']; ?>
											</td>
											<td class="cart_price text-right">
												<p>Rp. <?php echo $r['harga']; ?></p>
											</td>
											<td class="cart_total text-right">
												<p class="cart_total_price">Rp. <?php echo number_format($subtotal); ?></p>
												<?php $totalsuborder += $subtotal ?>
											</td>
											<td class="cart_delete text-center">
												<a class="cart_quantity_delete" href=""><i class="fa fa-times"></i></a>
											</td>
										</tr>
									<?php } ?>
									<tr>
										<td colspan="4">&nbsp;</td>
										<?php if (isset($_GET["id_kurir"]) && isset($_GET["id_kota"])) { ?>
											<?php
											$idkurir = $_GET["id_kurir"];
											$idkota = $_GET["id_kota"];
											$kurir = mysqli_query($koneksi, " SELECT * FROM tbl_biaya_kirim WHERE id_kota='$idkota' AND id_kurir='$idkurir'");
											$har = mysqli_fetch_array($kurir);
											?>

											<td colspan="2">
												<table class="table table-condensed total-result">
													<tr>
														<td>Sub Total </td>
														<td class="text-right"><?php echo number_format($totalsuborder); ?></td>
														<?php $total += $totalsuborder ?>
													</tr>
													<tr>
														<td>Biaya Kirim</td>
														<?php if (isset($har)) { ?>
															<td class="text-right"><?php echo $har['biaya']; ?></td>
															<?php $total += $har['biaya']; ?>
														<?php } else { ?>
															<td class="text-right"> -</td>
														<?php } ?>
													<tr>
														<td>Total</td>
														<td class="text-right"><span>Rp. <?php echo number_format($total); ?></span></td>
													</tr>
												</table>
											</td>
										<?php } ?>
									</tr>
								</tbody>
							</table>
						</div>
						<div class="form-group col-md-12">
							<a href="check.php" class="btn btn-default add-to-cart">Submit</a>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</section>