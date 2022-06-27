
	<section>
		<div class="container">
			<div class="row">
				
				<?php 
				include "Template/menu_side_kiri.php"
				?>
				
				<div class="col-sm-9 padding-right">
					<div class="features_items"><!--features_items-->
						<h2 class="title text-center">Features Items</h2>
						<?php
						$q = mysqli_query($koneksi, " select * from tbl_produk order by id_produk desc limit 6");
						while($r=mysqli_fetch_array($q)){
						?>
						<div class="col-sm-4">
							<div class="product-image-wrapper">
								<div class="single-products">
										<div class="productinfo text-center">
											<img src="admin/upload/<?php echo $r['gambar'] ?>" alt="" />
											<h2>Rp.<?php echo number_format($r['harga']) ?></h2>
											<p><?php echo $r['nama_produk'] ?></p>
											<a href="aksi_keranjang.php?id_produk=<?php echo $r['id_produk'];?>&harga=<?php echo $r['harga'];?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
										</div>
										<div class="product-overlay">
											<div class="overlay-content">
												<h2>Rp.<?php echo number_format($r['harga']) ?></h2>
												<p><?php echo $r['nama_produk'] ?></p>
												<a href="aksi_keranjang.php?id_produk=<?php echo $r['id_produk'];?>&harga=<?php echo $r['harga'];?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
											</div>
										</div>
								</div>
							</div>
						</div>
						
								
					<?php } ?>	
						
					</div><!--features_items-->
					
					
					
							 		
						</div>
					</div><!--/recommended_items-->
					
				</div>
			</div>
		</div>