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
        <h2>Data Carousel</h2>
        <table class="word-table" style="margin-bottom: 10px; max-width: 601px">
            <tr>
                <th>No</th>
                <th>File</th>
                <th>Header</th>
                <th>Text</th>
		
            </tr><?php
            foreach ($carousel_data as $carousel)
            {
            ?>
            <tr>
                <td><?php echo ++$start ?></td>
                <td><?php echo $carousel->file ?></td>
                <td><?php echo $carousel->header ?></td>
                <td><?php echo $carousel->text ?></td>	
            </tr>
            <?php
            }
            ?>
        </table>
    </body>
</html>