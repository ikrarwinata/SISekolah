
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">

            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <small><?php echo $this->session->userdata('ci_flash_message') <> '' ? $this->session->userdata('ci_flash_message') : ''; ?></small>
                </div>
            </div>
            <div class="col-md-4 text-right">

            </div>
        </div>
        <?php echo(form_open_multipart($action, "role='form'")) ?>
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
                    <a href="<?php echo $gambar_struktur->nilai ?>" target="_blank"><img src="<?php echo $gambar_struktur->nilai ?>" style="max-height: 350px; max-width: 90%"></a>
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
                    <input type="file" name="struktur" class="form-control" accept="image/*">
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <textarea class="form-control inline-editor" name="keterangan_struktur"><?php echo $detail_struktur->nilai ?></textarea>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-6">
                    <button type="button" class="btn btn-seccondary" onclick="window.history.go(-1)">Batalkan</button>
                </div>
                <div class="col-md-6 text-right">
                    <input type="hidden" name="urlback" value="<?php echo $urlback ?>">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </div>
        </form>