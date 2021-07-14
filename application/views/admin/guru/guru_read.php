
        <table class="table">
			<tr><td>Nama</td><td><?php echo $nama; ?></td></tr>
			<tr><td>Jabatan</td><td><?php echo $jabatan; ?></td></tr>
			<tr><td>Jenis Kelamin</td><td><?php echo $jenis_kelamin; ?></td></tr>
			<tr><td>Tempat/Tanggal Lahir</td><td><?php echo $tempat_lahir.", ".$tanggal_lahir; ?></td></tr>
			<tr><td>Email</td><td><?php echo $email; ?></td></tr>
			<tr><td>Hp</td><td><?php echo $hp; ?></td></tr>
			<tr><td>Alamat</td><td><?php echo $alamat; ?></td></tr>
			<tr><td>Foto</td><td><a href="<?php echo $foto; ?>"><img src="<?php echo $foto; ?>" style="max-height: 250px; max-width: 90%"></a></td></tr>
			<tr>
				<td></td>
				<td>
					<?php if (isset($fb) && $fb!=NULL): ?>
						<a href="<?php echo $fb ?>"><i class="fa fa-facebook fa-3x blue "></i></a>
					<?php endif ?>
					<?php if (isset($twitter) && $twitter!=NULL): ?>
						<a href="<?php echo $twitter ?>"><i class="ace-icon fa fa-twitter fa-3x light-blue "></i></a>
					<?php endif ?>
					<?php if (isset($whatsapp) && $whatsapp!=NULL): ?>
						<a href="https://api.whatsapp.com/send?phone=<?php echo $whatsapp ?>&text=&source=&data="><i class="ace-icon fa fa-whatsapp fa-3x green"></i></a>
					<?php endif ?>
				</td>
			</tr>
			<tr><td></td><td><button type="button" class="btn btn-default" onclick="window.history.go(-1)">Batalkan</button></td></tr>
		</table>