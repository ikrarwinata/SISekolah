<form action="<?php echo $action; ?>" method="post">
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="form-group">
                <label for="varchar">Nama <?php echo form_error('nama') ?></label>
                <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama" value="<?php echo $nama; ?>" maxlength="50" />
            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="form-group">
                <label for="varchar">NIS <?php echo form_error('nama') ?></label>
                <input type="text" class="form-control" name="newnis" id="newnis" placeholder="NIS" value="<?php echo $nis; ?>" maxlength="50" />
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-4">
            <div class="form-group">
                <label class="col-sm-12 control-label no-padding-right">Jenis Kelamin</label>
                <div class="col-sm-12">
                    <label class="inline">
                        <input name="jenis_kelamin" type="radio" class="ace" value="Pria" <?php echo input_select($jenis_kelamin, "Pria", 'checked="true"') ?> />
                        <span class="lbl middle"> Pria</span>
                    </label>

                    &nbsp; &nbsp; &nbsp;
                    &nbsp; &nbsp; &nbsp;
                    <label class="inline">
                        <input name="jenis_kelamin" type="radio" class="ace" value="Wanita" <?php echo input_select($jenis_kelamin, "Wanita", 'checked="true"') ?> />
                        <span class="lbl middle"> Wanita</span>
                    </label>
                </div>

                <div class="col">

                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-4">
            <div class="form-group">
                <label for="varchar">Tanggal Lahir <?php echo form_error('tanggal_lahir') ?></label>
                <input class="form-control date-picker" id="form-field-date" type="text" data-date-format="dd-mm-yyyy" placeholder="dd-mm-yyyy" name="tanggal_lahir" required="true" value="<?php echo $tanggal_lahir ?>" />
            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-4">
            <div class="form-group">
                <label for="varchar">Tempat Lahir <?php echo form_error('tempat_lahir') ?></label>
                <input type="text" class="form-control" name="tempat_lahir" id="tempat_lahir" placeholder="Tempat Lahir" value="<?php echo $tempat_lahir; ?>" maxlength="100" />
            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-4">
            <div class="form-group">
                <label for="varchar">Tahun Masuk <?php echo form_error('tahun_masuk') ?></label>
                <input type="number" class="form-control" name="tahun_masuk" id="tahun_masuk" placeholder="Tahun Masuk Sekolah" value="<?php echo $tahun_masuk; ?>" min="1999" maxlength="4" />
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="form-group">
                <label for="varchar">Email <?php echo form_error('email') ?></label>
                <input type="text" class="form-control" name="email" id="email" placeholder="Email" value="<?php echo $email; ?>" maxlength="50" required="true" />
            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="form-group">
                <label for="varchar">Hp <?php echo form_error('hp') ?></label>
                <input type="text" class="form-control" name="hp" id="hp" placeholder="Hp" value="<?php echo $hp; ?>" maxlength="22" required="true" />
            </div>
        </div>
    </div>

    <div class="form-group">
        <label for="alamat">Alamat <?php echo form_error('alamat') ?></label>
        <textarea class="form-control" rows="3" name="alamat" id="alamat" placeholder="Alamat" required="true"><?php echo $alamat; ?></textarea>
    </div>
    <input type="hidden" name="nis" value="<?php echo $nis; ?>" />
    <button type="button" class="btn btn-seccondary" onclick="window.history.go(-1)">Batalkan</button>
    <button type="submit" class="btn btn-primary"><?php echo $button ?></button>
</form>