
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Berita</h3>
            </div>
            <div class="card-body">
                <?php echo(form_open_multipart($action, "role='form'")) ?>
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
                    <div class="row">
                        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-8">
                            <div class="form-group">
                                <label for="varchar">Caption <?php echo form_error('caption') ?></label>
                                <input type="text" class="form-control" name="caption" id="caption" placeholder="Caption" value="<?php echo $caption; ?>" maxlength="200" />
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-4">
                            <div class="form-group">
                                <label for="varchar">Tanggal <?php echo form_error('tanggal') ?></label>
                                <input type="date" class="form-control" name="tanggal" id="tanggal" placeholder="Tanggal" value="<?php echo $tanggal; ?>" maxlength="100" />
                            </div>
                        </div>
                    </div>
                            
                    <div class="form-group">
                        <label for="deskripsi">Deskripsi <?php echo form_error('deskripsi') ?></label>
                        <textarea class="form-control ckeditor-editor" rows="3" name="deskripsi" id="deskripsi" placeholder="Deskripsi" ><?php echo $deskripsi; ?></textarea>
                    </div>
                    
                    <input type="hidden" name="oldfoto" value="<?php echo $foto; ?>" />
                    <input type="hidden" name="user" id="user" value="<?php echo $user; ?>" maxlength="26" />
                    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
                    <button type="submit" class="btn btn-primary"><?php echo $button ?></button>
                    <button type="button" class="btn btn-seccondary" onclick="window.history.go(-1)">Batalkan</button>
                </form>
            </div>
        </div>