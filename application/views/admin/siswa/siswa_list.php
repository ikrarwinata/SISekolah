<div class="row" style="margin-bottom: 10px">
    <div class="col-md-4">
        <a href="admin/Siswa/create" class="btn btn-primary">Tambah Siswa</a>
    </div>
    <div class="col-md-4 text-center">
        <div style="margin-top: 8px" id="message">
            <small class="<?php echo $this->session->userdata('ci_flash_message_type'); ?>"><?php echo $this->session->userdata('ci_flash_message') <> '' ? $this->session->userdata('ci_flash_message') : ''; ?></small>
        </div>
    </div>
    <div class="col-md-1 text-right">
    </div>
    <div class="col-md-3 text-right">
        <form action="<?php echo site_url('admin/Siswa/index'); ?>" class="form-inline" method="get">
            <div class="input-group">
                <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                <span class="input-group-btn">
                    <?php
                    if ($q <> '') {
                    ?>
                        <a href="<?php echo site_url('admin/Siswa'); ?>" class="btn btn-sm btn-default">Reset</a>
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
                <th>NIS</th>
                <th>Nama</th>
                <th>Jenis Kelamin</th>
                <th>Tempat / tanggal Lahir</th>
                <th>Hp</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($siswa_data as $siswa) {
            ?>
                <tr>
                    <td width="80px"><?php echo ++$start ?></td>
                    <td><?php echo $siswa->nis ?></td>
                    <td><?php echo $siswa->nama ?></td>
                    <td><?php echo $siswa->jenis_kelamin ?></td>
                    <td><?php echo $siswa->tempat_lahir . ", " . $siswa->tanggal_lahir ?></td>
                    <td><?php echo $siswa->hp ?></td>
                    <td style="text-align:center" width="200px">
                        <a href="<?php echo site_url('admin/Siswa/read/' . $siswa->nis) ?>" title="Lihat detail"><i class="fa fa-eye fa-lg text-primary"></i></a>&nbsp;
                        <a href="<?php echo site_url('admin/Siswa/update/' . $siswa->nis) ?>" title="Ubah"><i class="fa fa-edit fa-lg text-success"></i></a>&nbsp;
                        <a href="<?php echo site_url('admin/Siswa/delete/' . $siswa->nis) ?>" title="Hapus" onclick="return confirm('Anda yakin ingin menghapus data ini ?')"><i class="fa fa-trash fa-lg text-danger"></i></a>
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
        <div class="well well-sm well-primary">Total Data Siswa : <?php echo $total_rows ?></div>
        <?php echo (form_open_multipart('admin/Siswa/set_import_excel')) ?>
        <input type="file" name="file" class="hide hidden d-none visible-none" id="xlsx-file" accept="application/xlsx">
        <button type="submit" class="hide hidden d-none visible-none" id="xlsx-send">Simpan</button>
        <button type="button" role="button" class="btn btn-success" id="xlsx-loader">Import Excel</button>
        <?php echo anchor(site_url('admin/Siswa/excel'), 'Export Excel', 'class="btn btn-primary"'); ?>
        <a href="<?php echo (base_url('admin/Siswa/print_all')) ?>" class="btn btn-default"><i class="fa fa-print"></i>&nbsp;Cetak</a>
        </form>
    </div>
    <div class="col-md-6 text-right">
        <?php echo $pagination ?>
    </div>
</div>