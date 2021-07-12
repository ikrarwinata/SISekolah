<div class="row" style="margin-bottom: 10px">
    <div class="col-md-4">

    </div>
    <div class="col-md-4 text-center">
        <div style="margin-top: 8px" id="message" class="text-primary">
            <h4>Data yang akan di import : <?php echo $total_rows ?></h4>
        </div>
    </div>
    <div class="col-md-1 text-right">
    </div>
    <div class="col-md-3 text-right">

    </div>
</div>
<div class="table-responsive">
    <table class="table" style="width: 100%; border-collapse: collapse;table-layout: auto;">
        <thead>
            <tr>
                <th>No</th>
                <th>NIS</th>
                <th>Nama Lengkap</th>
                <th>Tempat/Tanggal Lahir</th>
                <th>Tahun Masuk</th>
                <th>Email</th>
                <th>Hp</th>
                <th>Alamat</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($siswa_data as $siswa) {
            ?>
                <tr>
                    <td width="80px"><?php echo ++$start ?></td>
                    <td><?php echo $siswa['nis'] ?></td>
                    <td><?php echo $siswa['nama'] ?></td>
                    <td><?php echo $siswa['tempat_lahir'] . ", " . $siswa['tanggal_lahir'] ?></td>
                    <td><?php echo $siswa['tahun_masuk'] ?></td>
                    <td><?php echo $siswa['email'] ?></td>
                    <td><?php echo $siswa['hp'] ?></td>
                    <td><?php echo $siswa['alamat'] ?></td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
</div>
<div class="row">
    <div class="col-md-6">
        <form action="admin/Siswa" method="post">
            <input type="text" name="xlsxpathfile" class="hide hidden d-none visible-none" value="<?php echo $file ?>">
            <button type="submit" class="btn btn-md btn-warning"><i class="fa fa-times"></i>&nbsp;Batalkan</button>
        </form>
    </div>
    <div class="col-md-6 text-right">
        <form action="<?php echo $action ?>" method="post">
            <input type="text" name="xlsxpathfile" class="hide hidden d-none visible-none" value="<?php echo $file ?>">
            <button type="submit" class="btn btn-md btn-success"><i class="fa fa-save"></i>&nbsp;Import</button>
        </form>
    </div>
</div>