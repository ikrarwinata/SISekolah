
        <?php echo(form_open_multipart($action, "role='form'")) ?>
            <div class="form-group">
                <label for="foto">Foto <?php echo form_error('foto') ?></label>
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm- col-xs-8">
                        <input type="file" name="foto" accept="image/*" class="form-control">
                    </div>
                    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-4">
                        <img src="<?php echo $file ?>" style="max-width: 100%;max-height: 250px">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="varchar">Title <?php echo form_error('header') ?></label>
                <input type="text" class="form-control" name="header" id="header" placeholder="Header" value="<?php echo $header; ?>" maxlength="200" required="true" />
            </div>
            <div class="form-group">
                <label for="varchar">Subtitle <?php echo form_error('text') ?></label>
                <textarea class="form-control" name="text" id="text" placeholder="Subtitle text" required="true"><?php echo $text; ?></textarea>
            </div>
            <input type="hidden" name="oldfile" value="<?php echo $file; ?>" />
           <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
           <button type="submit" class="btn btn-success"><?php echo $button ?></button>
           <button type="button" class="btn btn-seccondary" onclick="window.history.go(-1)">Batalkan</button>
        </form>