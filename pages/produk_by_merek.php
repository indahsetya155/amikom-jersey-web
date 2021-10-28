
	
	<section>
		<div class="container">
			<div class="row">
				
				<?php 

				include "Template/menu_side_kiri.php"
				?>
				
				<div class="col-sm-9 padding-right">
					<div class="features_items"><!--features_items-->

							<?php 
							$id = $_GET['id_merek'];
							$query = mysqli_query($koneksi, "select * from tbl_merek where id_merek=$id");
							$res = mysqli_fetch_array($query);
							//echo "<pre>";
							//print_r($res);
							//echo "</pre>";
							//exit();
							$namaMerek = $res['nama_merek'];
						?>
						<h2 class="title text-center">Produk Berdasar Merek <?php echo $namaMerek; ?> </h2>
						<?php
					
						$q = mysqli_query($koneksi, "select * from tbl_produk where id_merek=$id");
						while($r=mysqli_fetch_array($q)){
						?>
						<div class="col-sm-4">
							<div class="product-image-wrapper">
								<div class="single-products">
										<div class="productinfo text-center">
											<img src="admin/upload/<?php echo $r['gambar'] ?>" alt="" />
											<h2>Rp.<?php echo number_format($r['harga']) ?></h2>
											<p><?php echo $r['nama_produk'] ?></p>
											<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
										</div>
										<div class="product-overlay">
											<div class="overlay-content">
												<h2>Rp.<?php echo number_format($r['harga']) ?></h2>
												<p><?php echo $r['nama_produk'] ?></p>
												<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
											</div>
										</div>
								</div>
								
							</div>
						</div>
						
								
					<?php } ?>	
						
					</div><!--features_items-->

			</div>
		</div>