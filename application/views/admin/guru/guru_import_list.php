
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
                         <th>NIP</th>
                         <th>Nama</th>
                         <th>Tempat/Tanggal Lahir</th>
                         <th>Jabatan</th>
                         <th>Email</th>
                         <th>Hp</th>
    				    </tr>
				</thead>
				<tbody>
                    <?php
                    foreach ($guru_data as $guru)
                    {
                    ?>
                    <tr>
                        <td width="80px"><?php echo ++$start ?></td>
                        <td><?php echo $guru['nip'] ?></td>
                        <td><?php echo $guru['nama'] ?></td>
                        <td><?php echo $guru['tempat_lahir'].", ".$guru['tanggal_lahir'] ?></td>
                        <td><?php echo $guru['jabatan'] ?></td>
                        <td><?php echo $guru['email'] ?></td>
                        <td><?php echo $guru['hp'] ?></td>
                    </tr>
                    <?php
                    }
                    ?>
				</tbody>
			</table>
		</div>
        <div class="row">
            <div class="col-md-6">
                <form action="admin/Guru" method="post">
                    <input type="text" name="xlsxpathfile" class="hide hidden d-none visible-none" value="<?php echo $file ?>">
                    <button type="submit" class="btn btn-md btn-warning" ><i class="fa fa-times"></i>&nbsp;Batalkan</button>
                </form>
            </div>
            <div class="col-md-6 text-right">
                <form action="<?php echo $action ?>" method="post">
                    <input type="text" name="xlsxpathfile" class="hide hidden d-none visible-none" value="<?php echo $file ?>">
                    <button type="submit" class="btn btn-md btn-success" ><i class="fa fa-save"></i>&nbsp;Import</button>
                </form>
            </div>
        </div>