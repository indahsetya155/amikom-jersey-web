<div class="col-sm-3">
					<div class="left-sidebar">
						<h2>Category</h2>
						<div class="panel-group category-products" id="accordian"><!--category-productsr-->
						
						<?php
						$q = mysqli_query($koneksi, "select * from tbl_kategori");
						while($r=mysqli_fetch_array($q)){
							?>

							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title"><a href="produkbykategori.php?id_kategori=<?php echo $r['id_kategori']?>"><?php echo $r['nama_kategori']?></a></h4>
							</div>
						</div><!--/category-products-->
					<?php } ?>
				</div>
						<div class="brands_products"><!--brands_products-->
							<h2>Brands</h2>
							<div class="brands-name">
								<ul class="nav nav-pills nav-stacked">
									<?php 
									$q = mysqli_query($koneksi, "select * from tbl_merek");
									while($r=mysqli_fetch_array($q)) {
										?>
										<li><a href="produkbymerek.php?id_merek=<?php echo $r['id_merek']?>"><?php echo $r['nama_merek']?></a></li>
									<?php } ?>
								</ul>
							</div>
						</div><!--/brands_products-->
						
						<div class="price-range"><!--price-range-->
							<h2>Price Range</h2>
							<div class="well text-center">
								 <input type="text" class="span2" value="" data-slider-min="0" data-slider-max="600" data-slider-step="5" data-slider-value="[250,450]" id="sl2" ><br />
								 <b class="pull-left">$ 0</b> <b class="pull-right">$ 600</b>
							</div>
						</div><!--/price-range-->
						
						<div class="shipping text-center"><!--shipping-->
							<img src="asset/images/home/shipping.jpg" alt="" />
						</div><!--/shipping-->
					
					</div>
				</div>