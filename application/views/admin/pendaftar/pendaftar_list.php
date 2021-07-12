<div class="row" style="margin-bottom: 10px">
	<div class="col-md-4">
	</div>
	<div class="col-md-4 text-center">
		<div style="margin-top: 8px" id="message">
			<?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
		</div>
	</div>
	<div class="col-md-1 text-right">
	</div>
	<div class="col-md-3 text-right">
		<form action="<?php echo site_url('pendaftar/index'); ?>" class="form-inline" method="get">
			<div class="input-group">
				<input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
				<span class="input-group-btn">
					<?php
					if ($q <> '') {
					?>
						<a href="<?php echo site_url('pendaftar'); ?>" class="btn btn-sm btn-default">Reset</a>
					<?php
					}
					?>
					<button class="btn btn-sm btn-primary" type="submit">Search</button>
				</span>
			</div>
		</form>
	</div>
</div>
<div class="table-responsive">
	<table class="table" style="width: 100%; border-collapse: collapse;table-layout: auto;">
		<thead>
			<tr>
				<th class="text-center">#</th>
				<th>Nama</th>
				<th>Tempat & Tanggal Lahir</th>
				<th>Nilai Ujian</th>
				<th>Nama Ortu</th>
				<th>Email Ortu</th>
				<th>Hp Ortu</th>
				<th>Tanggal</th>
				<th></th>
			</tr>
		</thead>
		<tbody><?php
				foreach ($pendaftar_data as $pendaftar) {
				?>
				<tr>
					<td width="80px" class="text-center"><?php echo ++$start ?></td>
					<td><?php echo $pendaftar->nama ?></td>
					<td><?php echo $pendaftar->tempat_lahir . ", " . $pendaftar->tanggal_lahir ?></td>
					<td><?php echo $pendaftar->nilai_ujian ?></td>
					<td><?php echo $pendaftar->nama_ortu ?></td>
					<td><a href="mailto:<?php echo $pendaftar->email_ortu ?>"><?php echo $pendaftar->email_ortu ?></a></td>
					<td><?php echo $pendaftar->hp_ortu ?></td>
					<td><?php echo date("d M Y H:i:s", $pendaftar->id) ?></td>
					<td style="text-align:center" width="200px">
						<a href="<?php echo site_url('admin/Pendaftar/read/' . $pendaftar->id) ?>" class="btn btn-sm" title="Lihat detail"><i class="fa fa-eye fa-lg text-primary"></i></a>&nbsp;
						<a href="<?php echo site_url('admin/Pendaftar/delete/' . $pendaftar->id) ?>" class="btn btn-sm" title="Hapus" onclick="return confirm('Anda yakin ingin menghapus data ini ?')"><i class="fa fa-trash fa-lg text-danger"></i></a>
					</td>
				</tr>
			<?php
				}
			?>
		</tbody>
	</table>
</div>
<div class="row">
	<div class="col-md-6">
		<a href="#" class="btn btn-primary">Total Record : <?php echo $total_rows ?></a>
		<?php echo anchor(site_url('admin/Pendaftar/excel'), 'Excel', 'class="btn btn-primary"'); ?>
		<?php echo anchor(site_url('admin/Pendaftar/word'), 'Word', 'class="btn btn-primary"'); ?>
	</div>
	<div class="col-md-6 text-right">
		<?php echo $pagination ?>
	</div>
</div>