
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <a href="admin/Gallery/create" class="btn btn-primary">Tambah Foto</a>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <small><?php echo $this->session->userdata('ci_flash_message') <> '' ? $this->session->userdata('ci_flash_message') : ''; ?></small>
                </div>
            </div>
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right">
                <form action="<?php echo site_url('admin/Gallery/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('admin/Gallery'); ?>" class="btn btn-sm btn-default">Reset</a>
                                    <?php
                                }
                            ?>
                          <button class="btn btn-sm btn-primary" type="submit">Cari</button>
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
                    <th></th>
                    <th>Caption</th>
                    <th></th>
				</tr>
				</thead>
				<tbody>
                <?php
				foreach ($gallery_data as $gallery)
				{
				?>
                <tr>
                    <td width="80px"><?php echo ++$start ?></td>
                    <td><a href="<?php echo $gallery->file ?>"><img src="<?php echo $gallery->file ?>" style="max-height: 250px;max-width: 80%"></a></td>
                    <td><?php echo $gallery->caption ?></td>
                    <td style="text-align:center" width="200px">
                            <a href="<?php echo site_url('admin/Gallery/update/'.$gallery->id) ?>" title="Ubah"><i class="fa fa-edit fa-2x text-success"></i></a>&nbsp;&nbsp;&nbsp;
                            <a href="<?php echo site_url('admin/Gallery/delete/'.$gallery->id) ?>" title="Hapus" onclick="return confirm('Anda yakin ingin menghapus data ini ?')"><i class="fa fa-trash fa-2x text-danger"></i></a>
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
                <div class="well well-sm well-primary">Total Foto : <?php echo $total_rows ?></div>
            </div>
            <div class="col-md-6 text-right">
                <?php echo $pagination ?>
            </div>
        </div>