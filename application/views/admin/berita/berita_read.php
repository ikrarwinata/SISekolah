
        <table class="table">
			<tr><td>Caption</td><td><?php echo $caption; ?></td></tr>
			<tr><td>Tanggal</td><td><?php echo $tanggal; ?></td></tr>
			<tr><td>User</td><td><?php echo $user; ?></td></tr>
			<tr><td>Deskripsi</td><td><?php echo $deskripsi; ?></td></tr>
			<tr><td>Foto</td><td><img src="<?php echo $foto; ?>" style="max-width: 80%; max-height: 250px"></td></tr>
			<tr><td></td><td><button type="button" class="btn btn-default" onclick="window.history.go(-1)">Batalkan</button></td></tr>
		</table>