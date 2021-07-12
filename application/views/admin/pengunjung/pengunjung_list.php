
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <div class="well well-sm well-primary">
                    <form action="<?php echo $action ?>" method="post">
                        <i class="fa fa-sort-alpha-desc"></i>&nbsp;Urutkan :
                        &nbsp;
                        <select id="sorting" name="sorting">
                            <?php foreach ($pengunjung_data[0] as $key => $v): ?>
                                <option value="<?php echo $key ?>" <?php echo input_select($sorting, $key, 'selected="true"') ?>><?php echo $key ?></option>
                            <?php endforeach ?>
                        </select>
                        &nbsp;
                        <select id="sortingorder" name="sortingorder">
                            <option value="ASC" <?php echo input_select($sortingorder, "ASC", 'selected="true"') ?>>Menaik</option>
                            <option value="DESC" <?php echo input_select($sortingorder, "DESC", 'selected="true"') ?>>Menurun</option>
                        </select>
                        &nbsp;
                        <button type="submit" class="btn btn-sm btn-white btn-round">Tampilkan</button>
                    </form>
                </div>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <small><?php echo $this->session->userdata('ci_flash_message') <> '' ? $this->session->userdata('ci_flash_message') : ''; ?></small>
                </div>
            </div>
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right">
                <form action="<?php echo site_url('admin/Pengunjung/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('admin/Pengunjung'); ?>" class="btn btn-sm btn-default">Reset</a>
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
                    <th class="text-center">No</th>
                    <th class="text-center" style="max-width: 40px"><input type="checkbox" class="form-control" id="cb-parent"></th>
                    <th>
                        <?php if ($sorting=="ip"): ?>
                            <i class="fa fa-sort-alpha-<?php echo strtolower($sortingorder) ?>"></i>&nbsp;
                        <?php endif ?>
                        Ip
                    </th>
                    <th>
                        <?php if ($sorting=="useragent"): ?>
                            <i class="fa fa-sort-alpha-<?php echo strtolower($sortingorder) ?>"></i>&nbsp;
                        <?php endif ?>
                        Useragent
                    </th>
                    <th>
                        <?php if ($sorting=="tanggal"): ?>
                            <i class="fa fa-sort-alpha-<?php echo strtolower($sortingorder) ?>"></i>&nbsp;
                        <?php endif ?>
                        Tanggal
                    </th>
                    <th></th>
				</tr>
				</thead>
				<tbody>
                <?php
				foreach ($pengunjung_data as $pengunjung)
				{
				?>
                <tr>
                    <td class="text-center" style="max-width: 80px; width: 40px"><?php echo ++$start ?></td>
                    <td class="text-center"><input type="hidden" class="hide hidden d-none id-placeholder" value="<?php echo $pengunjung->id ?>"><input type="checkbox" class="form-control"></td>
                    <td><?php echo $pengunjung->ip ?></td>
                    <td><?php echo $pengunjung->useragent ?></td>
                    <td><?php echo date("d M Y", $pengunjung->tanggal) ?></td>
                    <td style="text-align:center" width="200px">
                            <a href="<?php echo site_url('admin/Pengunjung/delete/'.$pengunjung->id) ?>" title="Hapus" onclick="return confirm('Anda yakin ingin menghapus data ini ?')"><i class="fa fa-trash fa-2x text-danger"></i></a>
                    </td>
                </tr>
				<?php
				}
				?>
				</tbody>
			</table>
		</div>
        <div class="row">
            <div class="col-md-12">
                <div class="well well-sm well-primary">
                    <i class="fa fa-arrow-up"></i>&nbsp;Dengan terpilih :
                    &nbsp;
                    <button type="button" class="btn btn-sm btn-white btn-default btn-round" onclick="return confirm('Anda yakin ingin menghapus data terpilih ?')" id="btn-hapus"><i class="fa fa-trash text-danger"></i>&nbsp;Hapus</button>&nbsp;
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="well well-sm well-primary">Total Record : <?php echo $total_rows ?></div>
            </div>
            <div class="col-md-6 text-right">
                <?php echo $pagination ?>
            </div>
        </div>