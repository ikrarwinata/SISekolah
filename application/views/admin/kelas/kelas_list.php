        <h2 style="margin-top:0px"><?php echo $PageAttribute['title'] ?></h2>
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <a href="admin/Kelas/create" class="btn btn-primary">Tambah Data</a>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <small><?php echo $this->session->userdata('ci_flash_message') <> '' ? $this->session->userdata('ci_flash_message') : ''; ?></small>
                </div>
            </div>
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right">
                <form action="<?php echo site_url('admin/Kelas/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('admin/Kelas'); ?>" class="btn btn-default">Reset</a>
                                    <?php
                                }
                            ?>
                          <button class="btn btn-primary" type="submit">Search</button>
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
                    <th>Kelas</th>
                    <th></th>
				</tr>
				</thead>
				<tbody>
                <?php
				foreach ($kelas_data as $kelas)
				{
				?>
                <tr>
                    <td width="80px"><?php echo ++$start ?></td>
                    <td><?php echo $kelas->kelas ?></td>
                    <td style="text-align:center" width="200px">
                            <a href="<?php echo site_url('admin/Kelas/read/'.$kelas->id) ?>" title="Lihat detail"><i class="fa fa-eye text-primary"></i>&nbsp;</a>
                            <a href="<?php echo site_url('admin/Kelas/update/'.$kelas->id) ?>" title="Ubah"><i class="fa fa-edit text-success"></i>&nbsp;</a>
                            <a href="<?php echo site_url('admin/Kelas/delete/'.$kelas->id) ?>" title="Hapus" onclick="return confirm('Anda yakin ingin menghapus data ini ?')"><i class="fa fa-trash text-danger"></i>&nbsp;</a>
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
                <div class="well well-sm well-primary">Total Record : <?php echo $total_rows ?></div>
            </div>
            <div class="col-md-6 text-right">
                <?php echo $pagination ?>
            </div>
        </div>