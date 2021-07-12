        <?php echo(form_open_multipart($action, "role='form'")) ?>
            <div class="row">
                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-6">
                    <div class="form-group">
                        <label for="varchar">Hari <?php echo form_error('hari') ?></label>
                        <select class="form-control" name="hari" id="hari" placeholder="Hari">
                            <option value="Senin" <?php echo input_select($hari, "Senin") ?>>Senin</option>
                            <option value="Selasa" <?php echo input_select($hari, "Selasa") ?>>Selasa</option>
                            <option value="Rabu" <?php echo input_select($hari, "Rabu") ?>>Rabu</option>
                            <option value="Kamis" <?php echo input_select($hari, "Kamis") ?>>Kamis</option>
                            <option value="Jumat" <?php echo input_select($hari, "Jumat") ?>>Jumat</option>
                            <option value="Sabtu" <?php echo input_select($hari, "Sabtu") ?>>Sabtu</option>
                            <option value="Minggu" <?php echo input_select($hari, "Minggu") ?>>Minggu</option>
                        </select>
                    </div>
                </div>
                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-3">
                    <div class="form-group">
                        <label for="varchar">Jam <?php echo form_error('jam') ?></label>
                        <div class="input-group bootstrap-timepicker">
                            <input id="timepicker1" type="text" class="form-control" name="jam" id="jam" placeholder="Jam" value="<?php echo $jam; ?>" />
                            <span class="input-group-addon">
                                <i class="fa fa-clock-o bigger-110"></i>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-3">
                    <div class="form-group">
                        <label for="varchar">Selesai <?php echo form_error('jam_selesai') ?></label>
                        <div class="input-group bootstrap-timepicker">
                            <input id="timepicker2" type="text" class="form-control" name="jam_selesai" id="jam_selesai" placeholder="Jam Selesai" value="<?php echo $jam_selesai; ?>" />
                            <span class="input-group-addon">
                                <i class="fa fa-clock-o bigger-110"></i>
                            </span>
                        </div>
                    </div>
                </div>
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
            <div class="form-group">
                <label for="kegiatan">Kegiatan <?php echo form_error('kegiatan') ?></label>
                <textarea class="form-control" rows="3" name="kegiatan" id="kegiatan" placeholder="Kegiatan" ><?php echo $kegiatan; ?></textarea>
            </div>
            
           <input type="hidden" name="oldfoto" value="<?php echo $foto; ?>" />
           <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
           <button type="submit" class="btn btn-primary"><?php echo $button ?></button>
           <button type="button" class="btn btn-seccondary" onclick="window.history.go(-1)">Batalkan</button>
        </form>