
        <?php echo(form_open_multipart($action, "role='form'")) ?>
            <div class="form-group">
                <label for="file">Foto <?php echo form_error('file') ?></label>
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm- col-xs-8">
                        <input type="file" name="file" accept="image/*" class="form-control">
                    </div>
                    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-4">
                        <img src="<?php echo $file ?>" style="max-width: 100%;max-height: 250px">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="caption">Caption <?php echo form_error('caption') ?></label>
                <input type="text" class="form-control" name="caption" id="caption" placeholder="Caption" value="<?php echo $caption; ?>">
            </div>
           <input type="hidden" name="odlfile" value="<?php echo $file; ?>" /> 
           <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
           <button type="button" class="btn btn-seccondary" onclick="window.history.go(-1)">Batalkan</button>
           <button type="submit" class="btn btn-primary"><?php echo $button ?></button>
        </form>