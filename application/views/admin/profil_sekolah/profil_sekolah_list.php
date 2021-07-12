
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">

            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <small><?php echo $this->session->userdata('ci_flash_message') <> '' ? $this->session->userdata('ci_flash_message') : ''; ?></small>
                </div>
            </div>
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right">
                
            </div>
        </div>
        <form action="<?php echo $action ?>" method="post">
            <div class="table-responsive">
                <table class="table" style="width: 100%; border-collapse: collapse;table-layout: auto;">
                    <thead>
                    <tr>
                        <th>No</th>
                        <th></th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($profil_sekolah_data as $profil_sekolah)
                        {
                        ?>
                        <tr>
                            <td width="80px"><?php echo ++$start ?></td>
                            <td><?php echo $profil_sekolah->text ?></td>
                            <td>
                                <div class="form-group">
                                    <input type="hidden" name="id[]" value="<?php echo $profil_sekolah->id ?>">
                                    <?php if ($profil_sekolah->inputtype=="textarea"): ?>
                                        <textarea class="form-control ckeditor-editor" name="nilai[]" id="<?php echo $profil_sekolah->id ?>"><?php echo $profil_sekolah->nilai ?></textarea>
                                    <?php elseif ($profil_sekolah->inputtype=="text"): ?>
                                        <input type="text" class="form-control" name="nilai[]" value="<?php echo $profil_sekolah->nilai ?>">
                                    <?php elseif ($profil_sekolah->inputtype=="int"): ?>
                                        <div class="row">
                                            <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                                                <input type="number" name="nilai[]" class="form-control" min="1" max="99999999999" value="<?php echo $profil_sekolah->nilai ?>">
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                                <small>m2</small>
                                            </div>
                                        </div>
                                    <?php elseif ($profil_sekolah->inputtype=="file"): ?>
                                        <div class="row">
                                            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                                <input type="file" name="nilai[]" class="form-control">
                                            </div>
                                            <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                                                <img src="<?php echo $profil_sekolah->nilai ?>" style="max-width: 80%; max-height: 100px">
                                            </div>
                                        </div>
                                    <?php endif ?>
                                </div>
                            </td>
                        </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
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