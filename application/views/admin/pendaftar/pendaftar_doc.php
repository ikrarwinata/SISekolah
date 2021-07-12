<!doctype html>
<html>
    <head>
        <title>Data Pendaftar</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            .word-table {
                border:1px solid black !important; 
                border-collapse: collapse !important;
                width: 100%;
            }
            .word-table tr th, .word-table tr td{
                border:1px solid black !important; 
                padding: 5px 10px;
            }
            th {
                font-size: 10px;
            }
            td {
                font-size: 9px;
            }
        </style>
    </head>
    <body>
        <h2>Data Pendaftar</h2>
        <h5>Dibuat pada : <?php echo (date("d M Y H:i:s")) ?></h5>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Asal Sekolah</th>
                <th>Tempat Lahir</th>
                <th>Tanggal Lahir</th>
                <th>Nilai Ujian</th>
                <th>Hubungan Wali</th>
                <th>Nama Ortu</th>
                <th>Pekerjaan Ortu</th>
                <th>Alamat Ortu</th>
                <th>Email Ortu</th>
                <th>Hp Ortu</th>		
            </tr><?php
            foreach ($pendaftar_data as $pendaftar)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $pendaftar->nama ?></td>
		      <td><?php echo $pendaftar->asal_sekolah ?></td>
		      <td><?php echo $pendaftar->tempat_lahir ?></td>
		      <td><?php echo $pendaftar->tanggal_lahir ?></td>
		      <td><?php echo $pendaftar->nilai_ujian ?></td>
		      <td><?php echo $pendaftar->hubungan_wali ?></td>
		      <td><?php echo $pendaftar->nama_ortu ?></td>
		      <td><?php echo $pendaftar->pekerjaan_ortu ?></td>
		      <td><?php echo $pendaftar->alamat_ortu ?></td>
		      <td><?php echo $pendaftar->email_ortu ?></td>
		      <td><?php echo $pendaftar->hp_ortu ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>