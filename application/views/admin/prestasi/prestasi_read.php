        <h2 style="margin-top:0px">Prestasi Read</h2>
        <table class="table">
			<tr><td>Nama</td><td><?php echo $nama; ?></td></tr>
			<tr><td>Tingkat</td><td><?php echo $tingkat; ?></td></tr>
			<tr><td>Tanggal</td><td><?php echo $tanggal; ?></td></tr>
			<tr><td>Deskripsi</td><td><?php echo $deskripsi; ?></td></tr>
			<tr><td></td><td><a href="<?php echo $foto; ?>" target="_blank"><img src="<?php echo $foto; ?>" style="max-height: 280px;max-width: 90%"></a></td></tr>
			<tr><td></td><td><button type="button" class="btn btn-default" onclick="window.history.go(-1)">Batalkan</button></td></tr>
		</table>