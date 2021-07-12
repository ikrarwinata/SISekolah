
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <a href="admin/Fasilitas/create" class="btn btn-primary">Tambah Fasilitas</a>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <small><?php echo $this->session->userdata('ci_flash_message') <> '' ? $this->session->userdata('ci_flash_message') : ''; ?></small>
                </div>
            </div>
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right">
                <form action="<?php echo site_url('admin/Fasilitas/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('admin/Fasilitas'); ?>" class="btn btn-sm btn-default">Reset</a>
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
					<th>No</th>
                    <th>Gambar</th>
                    <th>Nama</th>
                    <th></th>
				</tr>
				</thead>
				<tbody>
                <?php
				foreach ($fasilitas_data as $fasilitas)
				{
				?>
                <tr>
                    <td width="80px"><?php echo ++$start ?></td>
                    <td><img src="<?php echo $fasilitas->gambar ?>" style="max-width: 80%; max-height: 150px"></td>
                    <td><?php echo $fasilitas->nama ?></td>
                    <td style="text-align:center" width="200px">
                            <a href="<?php echo site_url('admin/Fasilitas/read/'.$fasilitas->id) ?>" title="Lihat detail"><i class="fa fa-eye fa-lg text-primary"></i></a>&nbsp;
                            <a href="<?php echo site_url('admin/Fasilitas/update/'.$fasilitas->id) ?>" title="Ubah"><i class="fa fa-edit fa-lg text-success"></i></a>&nbsp;
                            <a href="<?php echo site_url('admin/Fasilitas/delete/'.$fasilitas->id) ?>" title="Hapus" onclick="return confirm('Anda yakin ingin menghapus data ini ?')"><i class="fa fa-trash fa-lg text-danger"></i></a>
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
                <div class="well well-sm well-primary">Total Fasilitas : <?php echo $total_rows ?></div>
            </div>
            <div class="col-md-6 text-right">
                <?php echo $pagination ?>
            </div>
        </div>