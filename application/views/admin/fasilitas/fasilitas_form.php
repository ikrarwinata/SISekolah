
        <?php echo(form_open_multipart($action, "role='form'")) ?>
            <div class="form-group">
                <label for="gambar">Gambar <?php echo form_error('gambar') ?></label>
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm- col-xs-8">
                        <input type="file" name="gambar" accept="image/*" class="form-control">
                    </div>
                    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-4">
                        <img src="<?php echo $gambar ?>" style="max-width: 100%;max-height: 250px">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-9 col-md-9 col-sm-9">
                    <div class="form-group">
                        <label for="varchar">Fasilitas <?php echo form_error('nama') ?></label>
                        <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama" value="<?php echo $nama; ?>" maxlength="150" required="true" />
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-3">
                    <div class="form-group">
                        <label for="varchar">Jumlah <?php echo form_error('nama') ?></label>
                        <input type="number" min="0" max="9999999999" class="form-control" name="jumlah" id="jumlah" placeholder="Jumlah saat ini" value="<?php echo $jumlah; ?>" maxlength="150" required="true" />
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="deskripsi">Keterangan <?php echo form_error('deskripsi') ?></label>
                <textarea class="form-control" rows="3" name="deskripsi" id="deskripsi" placeholder="Deskripsi" ><?php echo $deskripsi; ?></textarea>
            </div>
           <input type="hidden" name="oldgambar" value="<?php echo $gambar; ?>" /> 
           <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
           <button type="submit" class="btn btn-primary"><?php echo $button ?></button>
           <button type="button" class="btn btn-seccondary" onclick="window.history.go(-1)">Batalkan</button>
        </form>