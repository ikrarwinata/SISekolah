
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <a href="admin/Berita/create" class="btn btn-primary">Tambah Berita</a>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <small><?php echo $this->session->userdata('ci_flash_message') <> '' ? $this->session->userdata('ci_flash_message') : ''; ?></small>
                </div>
            </div>
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right">
                <form action="<?php echo site_url('admin/Berita/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('admin/Berita'); ?>" class="btn btn-sm btn-default">Reset</a>
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
                    <th>Caption</th>
                    <th>Tanggal</th>
                    <th class="text-center">Foto</th>
                    <th class="text-center">Dilihat</th>
                    <th></th>
				</tr>
				</thead>
				<tbody>
                <?php
				foreach ($berita_data as $berita)
				{
				?>
                <tr>
                    <td width="80px"><?php echo ++$start ?></td>
                    <td><?php echo $berita->caption ?></td>
                    <td><?php echo date("d M Y", $berita->tanggal) ?></td>
                    <td class="text-center"><img src="<?php echo $berita->foto ?>" style="max-width: 100px; max-height: 150px"></td>
                    <td class="text-center"><?php echo $berita->dilihat ?></td>
                    <td style="text-align:center" width="200px">
                            <a href="<?php echo site_url('admin/Berita/read/'.$berita->id) ?>" title="Lihat detail"><i class="fa fa-eye fa-lg text-primary"></i></a>&nbsp;
                            <a href="<?php echo site_url('admin/Berita/update/'.$berita->id) ?>" title="Ubah"><i class="fa fa-edit fa-lg text-success"></i></a>&nbsp;
                            <a href="<?php echo site_url('admin/Berita/delete/'.$berita->id) ?>" title="Hapus" onclick="return confirm('Anda yakin ingin menghapus data ini ?')"><i class="fa fa-trash fa-lg text-danger"></i></a>
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
                <div class="well well-sm well-primary">Total Berita : <?php echo $total_rows ?></div>
            </div>
            <div class="col-md-6 text-right">
                <?php echo $pagination ?>
            </div>
        </div>