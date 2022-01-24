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
					<tr class="cart_menu text-center">
						<td class="image">Gambar</td>
						<td class="description">Nama Produk</td>
						<td class="quantity">Jumlah</td>
						<td class="price">Harga</td>
						<td class="total">Sub Total</td>
						<td></td>
					</tr>
				</thead>
				<tbody>
					<?php
					$sql = mysqli_query($koneksi, "SELECT * FROM tbl_order, tbl_produk WHERE tbl_order.id_session='$sid' AND tbl_order.id_produk=tbl_produk.id_produk");

					while ($r = mysqli_fetch_array($sql)) {
						$subtotal = $r['harga'] * $r['jumlah'];


					?>
						<tr>
							<td class="cart_product text-center">
								<a href=""><img src="admin/upload/<?php echo $r['gambar']; ?>" style="height: 120px;" class="rounded img-thumbnail" alt=""></a>
							</td>
							<td class="cart_description">
								<h4><a href=""><?php echo $r['nama_produk']; ?> </a></h4>
							</td>
							<td class="cart_quantity text-center">
								<?php if ($r['jumlah'] > 1) {
									echo '<a class="cart_quantity_delete" href="aksi_kurang_order.php?id_order=' . $r['id_order'] . '"><i class="fa fa-minus-circle text-danger"></i></a>';
								} ?>
								<?php echo $r['jumlah']; ?>
								<a class="cart_quantity_delete" href="aksi_tambah_order.php?id_order=<?php echo $r['id_order']; ?>"><i class="fa fa-plus-circle"></i></a>
							</td>
							<td class="cart_price text-right">
								<p>Rp. <?php echo $r['harga']; ?></p>
							</td>
							<td class="cart_total">
								<p class="cart_total_price text-right">Rp. <?php echo number_format($subtotal); ?></p>
							</td>
							<td class="cart_delete text-center">
								<a class="cart_quantity_delete" href="aksi_hapus_keranjang.php?id_order=<?php echo $r['id_order']; ?>"><i class="fa fa-times"></i></a>
							</td>
						</tr>
					<?php } ?>

				</tbody>
			</table>
		</div>
		<a href="selesai.php" class="btn btn-default add-to-cart">Checkout</a>
	</div>
</section>
<!--/#cart_items-->