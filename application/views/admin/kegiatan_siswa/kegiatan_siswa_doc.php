<!doctype html>
<html>
    <head>
        <title>Document File</title>
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
        </style>
    </head>
    <body>
        <h2>Data Kegiatan_siswa</h2>
        <table class="word-table" style="margin-bottom: 10px; max-width: 601px">
            <tr>
                <th>No</th>
                <th>Hari</th>
                <th>Kegiatan</th>
                <th>Jam</th>
		
            </tr><?php
            foreach ($kegiatan_siswa_data as $kegiatan_siswa)
            {
            ?>
            <tr>
                <td><?php echo ++$start ?></td>
                <td><?php echo $kegiatan_siswa->hari ?></td>
                <td><?php echo $kegiatan_siswa->kegiatan ?></td>
                <td><?php echo $kegiatan_siswa->jam ?></td>	
            </tr>
            <?php
            }
            ?>
        </table>
    </body>
</html>