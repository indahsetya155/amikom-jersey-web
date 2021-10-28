<section id="form"><!--form-->
		<div class="container">
			<div class="row">
				<div class="col-sm-4 col-sm-offset-4">
					<div class="signup-form"><!--sign up form-->
						<h2>PROFIL MEMBER</h2>
						<?php
						$idMember = $_SESSION['idMember'];
						$queryGetProfilMember = mysqli_query($koneksi, " SELECT * FROM tbl_member WHERE id_member='$idMember'");
						$res = mysqli_fetch_array($queryGetProfilMember);

						?>
						<form action="aksi_edit_member.php" method="POST">
							<input type="text" name="username" placeholder="username" value="<?php echo $res['username'];?>" />
					
							<input type="text" name="namalengkap" placeholder="Nama Lengkap" value="<?php echo $res['nama'];?> " />
							<input type="text" name="alamat" placeholder="Alamat" value="<?php echo $res['alamat'];?>" />
							<select name="id_kota">
								<?php
								$getKota = mysqli_query($koneksi, "select * from tbl_kota");
								while($itemkota=mysqli_fetch_array($getKota)){

								?>

								
								<option value="<?php echo $itemkota['id_kota']?>"><?php echo $itemkota['nama_kota'] ?></option>
							<?php } ?>
							</select>
							<br>
							<br>
							<input type="email" name="email"placeholder="Email" value="<?php echo $res['email'];?>" />
							<input type="text"name="hp" placeholder="Nomor Handphone" value="<?php echo $res['no_hp'];?>" />

							<button type="submit" class="btn btn-default">Edit Member</button>
						</form>
					</div><!--/sign up form-->
				</div>
			</div>
		</div>
	</section><!--/form-->
	