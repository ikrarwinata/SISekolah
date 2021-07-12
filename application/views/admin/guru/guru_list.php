<div class="row" style="margin-bottom: 10px">
    <div class="col-md-4">
        <a href="admin/Guru/create" class="btn btn-primary">Tambah Guru</a>
    </div>
    <div class="col-md-4 text-center">
        <div style="margin-top: 8px" id="message">
            <small class="<?php echo $this->session->userdata('ci_flash_message_type'); ?>"><?php echo $this->session->userdata('ci_flash_message') <> '' ? $this->session->userdata('ci_flash_message') : ''; ?></small>
        </div>
    </div>
    <div class="col-md-1 text-right">
    </div>
    <div class="col-md-3 text-right">
        <form action="<?php echo site_url('admin/Guru/index'); ?>" class="form-inline" method="get">
            <div class="input-group">
                <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                <span class="input-group-btn">
                    <?php
                    if ($q <> '') {
                    ?>
                        <a href="<?php echo site_url('admin/Guru'); ?>" class="btn btn-sm btn-default">Reset</a>
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
                <th>Nama</th>
                <th>Tempat/Tanggal Lahir</th>
                <th>Jabatan</th>
                <th>Email</th>
                <th>Hp</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($guru_data as $guru) {
            ?>
                <tr>
                    <td width="80px"><?php echo ++$start ?></td>
                    <td><?php echo $guru->nama ?></td>
                    <td><?php echo $guru->tempat_lahir . ", " . $guru->tanggal_lahir ?></td>
                    <td><?php echo $guru->jabatan ?></td>
                    <td><?php echo $guru->email ?></td>
                    <td><?php echo $guru->hp ?></td>
                    <td><img src="<?php echo $guru->foto ?>" style="max-width: 90%;max-height: 100px"></td>
                    <td style="text-align:center" width="200px">
                        <a href="<?php echo site_url('admin/Guru/read/' . $guru->nip) ?>" title="Lihat detail"><i class="fa fa-eye fa-lg text-primary"></i></a>&nbsp;
                        <a href="<?php echo site_url('admin/Guru/update/' . $guru->nip) ?>" title="Ubah"><i class="fa fa-edit fa-lg text-success"></i></a>&nbsp;
                        <a href="<?php echo site_url('admin/Guru/delete/' . $guru->nip) ?>" title="Hapus" onclick="return confirm('Anda yakin ingin menghapus data ini ?')"><i class="fa fa-trash fa-lg text-danger"></i></a>
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
        <div class="well well-sm well-primary">Total Data Guru : <?php echo $total_rows ?></div>
        <?php echo (form_open_multipart('admin/Guru/set_import_excel')) ?>
        <input type="file" name="file" class="hide hidden d-none visible-none" id="xlsx-file" accept="application/xlsx">
        <button type="submit" class="hide hidden d-none visible-none" id="xlsx-send">Simpan</button>
        <button type="button" role="button" class="btn btn-success" id="xlsx-loader">Import Excel</button>
        <?php echo anchor(site_url('admin/Guru/excel'), 'Export Excel', 'class="btn btn-primary"'); ?>
        <a href="<?php echo (base_url('admin/Guru/print_all')) ?>" class="btn btn-default" target="_blank"><i class="fa fa-print"></i>&nbsp;Cetak</a>
        </form>
    </div>
    <div class="col-md-6 text-right">
        <?php echo $pagination ?>
    </div>
</div>