        <?php echo(form_open_multipart($action, 'id="user-profile-3" role="form"')) ?>
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="form-group">
                        <label for="varchar">Prestasi <?php echo form_error('nama') ?></label>
                        <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama Prestasi" value="<?php echo $nama; ?>" maxlength="150" />
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-3">
                    <div class="form-group">
                        <label for="varchar">Tingkat <?php echo form_error('tingkat') ?></label>
                        <input type="text" class="form-control" name="tingkat" id="tingkat" placeholder="Tingkat prestasi (Kota / Nasional / Internasional)" value="<?php echo $tingkat; ?>" maxlength="150" />
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-3">
                    <div class="form-group">
                        <label for="varchar">Tanggal <?php echo form_error('tanggal') ?></label>
                        <input class="form-control date-picker" id="form-field-date" type="text" data-date-format="dd-mm-yyyy" placeholder="Tanggal prestasi diraih" name="tanggal" required="true" value="<?php echo $tanggal ?>" />
                    </div>
                </div>
            </div>
            
            <div class="form-group">
                <label for="deskripsi">Deskripsi <?php echo form_error('deskripsi') ?></label>
                <textarea class="form-control ckeditor-editor" rows="3" name="deskripsi" id="deskripsi" placeholder="Deskripsi" ><?php echo $deskripsi; ?></textarea>
            </div>
            
            <div class="form-group">
                <label for="foto">Foto <?php echo form_error('foto') ?></label>
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm- col-xs-8">
                        <input type="file" name="foto" accept="image/*" class="form-control">
                    </div>
                    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-4">
                        <img src="<?php echo $foto ?>" style="max-width: 100%;max-height: 250px">
                    </div>
                </div>
            </div>

           <input type="hidden" name="oldfoto" value="<?php echo $foto; ?>" /> 
           <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
           <button type="submit" class="btn btn-primary"><?php echo $button ?></button>
           <button type="button" class="btn btn-seccondary" onclick="window.history.go(-1)">Batalkan</button>
        </form>