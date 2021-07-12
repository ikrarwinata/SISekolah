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
        <h2>Data Berita</h2>
        <table class="word-table" style="margin-bottom: 10px; max-width: 601px">
            <tr>
                <th>No</th>
                <th>Caption</th>
                <th>Foto</th>
                <th>Deskripsi</th>
                <th>Tanggal</th>
                <th>User</th>
		
            </tr><?php
            foreach ($berita_data as $berita)
            {
            ?>
            <tr>
                <td><?php echo ++$start ?></td>
                <td><?php echo $berita->caption ?></td>
                <td><?php echo $berita->foto ?></td>
                <td><?php echo $berita->deskripsi ?></td>
                <td><?php echo $berita->tanggal ?></td>
                <td><?php echo $berita->user ?></td>	
            </tr>
            <?php
            }
            ?>
        </table>
    </body>
</html>