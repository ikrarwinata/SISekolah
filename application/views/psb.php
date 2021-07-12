<!--/about -->
<div id="about" class="about all_pad w3ls">
	<div class="container">
		<h3 class="w3-about-title">Penerimaan Siswa Baru</h3>
		<div class="ser-top-grids">
			<form action="<?php echo (base_url('Welcome/psb_action')) ?>" method="POST">
				<strong style="font-size: 16px;"><i class="fa fa-user"></i>&nbsp;Data Calon Siswa/Siswi</strong>
				<hr>
				<div class="form-group">
					<div class="row">
						<div class="col-lg-3 col-md-3 col-sm-3 text-right" style="padding-top: 5px;">
							<label for="nama">Nama Calon Siswa :</label>
						</div>
						<div class="col-lg-9 col-md-9 col-sm-9">
							<input type="text" name="nama" id="nama" class="form-control" required>
						</div>
					</div>
				</div>

				<div class="form-group">
					<div class="row">
						<div class="col-lg-3 col-md-3 col-sm-3 text-right" style="padding-top: 5px;">
							<label for="sekolah_asal">Asal Sekolah :</label>
						</div>
						<div class="col-lg-9 col-md-9 col-sm-9">
							<input type="text" name="sekolah_asal" id="sekolah_asal" class="form-control" required>
						</div>
					</div>
				</div>

				<div class="form-group">
					<div class="row">
						<div class="col-lg-3 col-md-3 col-sm-3 text-right" style="padding-top: 5px;">
							<label for="tempat_lahir">Tempat & Tanggal Lahir :</label>
						</div>
						<div class="col-lg-4 col-md-4 col-sm-4">
							<input type="text" name="tempat_lahir" id="tempat_lahir" class="form-control" required>
						</div>
						<div class="col-lg-5 col-md-5 col-sm-5">
							<input type="date" name="tanggal_lahir" id="tanggal_lahir" class="form-control" required>
						</div>
					</div>
				</div>

				<div class="form-group">
					<div class="row">
						<div class="col-lg-3 col-md-3 col-sm-3 text-right" style="padding-top: 5px;">
							<label for="jenis_kelamin">Jenis Kelamin :</label>
						</div>
						<div class="col-lg-2 col-md-2 col-sm-2" style="padding-top: 5px;">
							<input type="radio" name="jenis_kelamin" id="jenis_kelamin_pria" value="Pria" required>&nbsp;<label for="jenis_kelamin_pria">Pria</label>
						</div>
						<div class="col-lg-2 col-md-2 col-sm-2" style="padding-top: 5px;">
							<input type="radio" name="jenis_kelamin" id="jenis_kelamin_wanita" value="Wanita" required>&nbsp;<label for="jenis_kelamin_wanita">Wanita</label>
						</div>
						<div class="col-lg-3 col-md-3 col-sm-3 text-right" style="padding-top: 5px;">
							<label for="nilai_ujian">Nilai Ujian Nasional :</label>
						</div>
						<div class="col-lg-2 col-md-2 col-sm-2">
							<input type="number" min="1" max="100" name="nilai_ujian" id="nilai_ujian" class="form-control" required>
						</div>
					</div>
				</div>

				<hr style="border: 0px;">
				<span style="margin-top: 15px;">
					<strong style="font-size: 16px;"><i class="fa fa-user"></i>&nbsp;Data Orang Tua / Wali</strong>
				</span>
				<hr>

				<div class="form-group">
					<div class="row">
						<div class="col-lg-3 col-md-3 col-sm-3 text-right" style="padding-top: 5px;">
							<label for="hubungan_ortu">Hubungan :</label>
						</div>
						<div class="col-lg-9 col-md-9 col-sm-9">
							<select name="hubungan_ortu" id="hubungan_ortu" class="form-control" required>
								<option value="Ayah Kandung">Ayah Kandung</option>
								<option value="Ibu Kandung">Ibu Kandung</option>
								<option value="Wali">Wali</option>
							</select>
						</div>
					</div>
				</div>

				<div class="form-group">
					<div class="row">
						<div class="col-lg-3 col-md-3 col-sm-3 text-right" style="padding-top: 5px;">
							<label for="nama_ortu">Nama Orang Tua / Wali :</label>
						</div>
						<div class="col-lg-9 col-md-9 col-sm-9">
							<input type="text" name="nama_ortu" id="nama_ortu" class="form-control" required>
						</div>
					</div>
				</div>

				<div class="form-group">
					<div class="row">
						<div class="col-lg-3 col-md-3 col-sm-3 text-right" style="padding-top: 5px;">
							<label for="pekerjaan_ortu">Pekerjaan Orang Tua / Wali :</label>
						</div>
						<div class="col-lg-9 col-md-9 col-sm-9">
							<input type="text" name="pekerjaan_ortu" id="pekerjaan_ortu" class="form-control" required>
						</div>
					</div>
				</div>

				<div class="form-group">
					<div class="row">
						<div class="col-lg-3 col-md-3 col-sm-3 text-right" style="padding-top: 5px;">
							<label for="alamat_ortu">Alamat Orang Tua / Wali :</label>
						</div>
						<div class="col-lg-9 col-md-9 col-sm-9">
							<input type="text" name="alamat_ortu" id="alamat_ortu" class="form-control" required>
						</div>
					</div>
				</div>

				<div class="form-group">
					<div class="row">
						<div class="col-lg-3 col-md-3 col-sm-3 text-right" style="padding-top: 5px;">
							<label for="email_ortu">Email :</label>
						</div>
						<div class="col-lg-9 col-md-9 col-sm-9">
							<input type="mail" name="email_ortu" id="email_ortu" class="form-control">
						</div>
					</div>
				</div>

				<div class="form-group">
					<div class="row">
						<div class="col-lg-3 col-md-3 col-sm-3 text-right" style="padding-top: 5px;">
							<label for="hp_ortu">No Telepon / HP :</label>
						</div>
						<div class="col-lg-9 col-md-9 col-sm-9">
							<input type="tel" name="hp_ortu" id="hp_ortu" class="form-control">
						</div>
					</div>
				</div>

				<div class="form-group">
					<div class="row">
						<div class="col-lg-2 col-md-2 col-sm-2">
							&nbsp;
						</div>
						<div class="col-lg-9 col-md-9 col-sm-9">
							<input type="checkbox" name="persetujuan" id="persetujuan" required checked>&nbsp;<label for="persetujuan"><small>Data yang saya masukan diatas adalah benar, dan saya siap bertanggung jawab apabila ditemukan data yang tidak benar.</small></label>
						</div>
					</div>
				</div>

				<div class="form-group">
					<div class="row">
						<div class="col-lg-12 col-md-12 col-sm-12 text-right">
							<button type="submit" class="btn btn-success btn-lg">Lanjutkan</button>
						</div>
					</div>
				</div>
			</form>
		</div>
		<hr>
	</div>
</div>
<!--//about -->