
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <a href="admin/Carousel/create" class="btn btn-primary">Tambah Slider</a>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <small><?php echo $this->session->userdata('ci_flash_message') <> '' ? $this->session->userdata('ci_flash_message') : ''; ?></small>
                </div>
            </div>
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right">
                <form action="<?php echo site_url('admin/Carousel/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('admin/Carousel'); ?>" class="btn btn-sm btn-default">Reset</a>
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
                    <th>Judul</th>
                    <th>Text</th>
                    <th></th>
				</tr>
				</thead>
				<tbody>
                <?php
				foreach ($carousel_data as $carousel)
				{
				?>
                <tr>
                    <td width="80px"><?php echo ++$start ?></td>
                    <td class="text-center"><img src="<?php echo $carousel->file ?>" alt="" style="max-height: 250px; max-width: 90%"></td>
                    <td><?php echo $carousel->header ?></td>
                    <td><?php echo $carousel->text ?></td>
                    <td style="text-align:center" width="200px">
                            <a href="<?php echo site_url('admin/Carousel/update/'.$carousel->id) ?>" title="Ubah"><i class="fa fa-edit fa-2x text-success"></i></a>&nbsp;&nbsp;
                            <a href="<?php echo site_url('admin/Carousel/delete/'.$carousel->id) ?>" title="Hapus" onclick="return confirm('Anda yakin ingin menghapus data ini ?')"><i class="fa fa-trash fa-2x text-danger"></i></a>
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
                <div class="well well-sm well-primary">Total Gambar Slider : <?php echo $total_rows ?></div>
            </div>
            <div class="col-md-6 text-right">
                <?php echo $pagination ?>
            </div>
        </div>