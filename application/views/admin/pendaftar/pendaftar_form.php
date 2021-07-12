<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            body{
                padding: 15px;
            }
        </style>
    </head>
    <body>
        <h2 style="margin-top:0px">Pendaftar <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">Nama <?php echo form_error('nama') ?></label>
            <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama" value="<?php echo $nama; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Asal Sekolah <?php echo form_error('asal_sekolah') ?></label>
            <input type="text" class="form-control" name="asal_sekolah" id="asal_sekolah" placeholder="Asal Sekolah" value="<?php echo $asal_sekolah; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Tempat Lahir <?php echo form_error('tempat_lahir') ?></label>
            <input type="text" class="form-control" name="tempat_lahir" id="tempat_lahir" placeholder="Tempat Lahir" value="<?php echo $tempat_lahir; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Tanggal Lahir <?php echo form_error('tanggal_lahir') ?></label>
            <input type="text" class="form-control" name="tanggal_lahir" id="tanggal_lahir" placeholder="Tanggal Lahir" value="<?php echo $tanggal_lahir; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Nilai Ujian <?php echo form_error('nilai_ujian') ?></label>
            <input type="text" class="form-control" name="nilai_ujian" id="nilai_ujian" placeholder="Nilai Ujian" value="<?php echo $nilai_ujian; ?>" />
        </div>
	    <div class="form-group">
            <label for="enum">Hubungan Wali <?php echo form_error('hubungan_wali') ?></label>
            <input type="text" class="form-control" name="hubungan_wali" id="hubungan_wali" placeholder="Hubungan Wali" value="<?php echo $hubungan_wali; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Nama Ortu <?php echo form_error('nama_ortu') ?></label>
            <input type="text" class="form-control" name="nama_ortu" id="nama_ortu" placeholder="Nama Ortu" value="<?php echo $nama_ortu; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Pekerjaan Ortu <?php echo form_error('pekerjaan_ortu') ?></label>
            <input type="text" class="form-control" name="pekerjaan_ortu" id="pekerjaan_ortu" placeholder="Pekerjaan Ortu" value="<?php echo $pekerjaan_ortu; ?>" />
        </div>
	    <div class="form-group">
            <label for="alamat_ortu">Alamat Ortu <?php echo form_error('alamat_ortu') ?></label>
            <textarea class="form-control" rows="3" name="alamat_ortu" id="alamat_ortu" placeholder="Alamat Ortu"><?php echo $alamat_ortu; ?></textarea>
        </div>
	    <div class="form-group">
            <label for="varchar">Email Ortu <?php echo form_error('email_ortu') ?></label>
            <input type="text" class="form-control" name="email_ortu" id="email_ortu" placeholder="Email Ortu" value="<?php echo $email_ortu; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Hp Ortu <?php echo form_error('hp_ortu') ?></label>
            <input type="text" class="form-control" name="hp_ortu" id="hp_ortu" placeholder="Hp Ortu" value="<?php echo $hp_ortu; ?>" />
        </div>
	    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('pendaftar') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>