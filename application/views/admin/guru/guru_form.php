        <img id="avatar" class="hide hidden d-none visible-none" alt="img" src="<?php echo $foto ?>" />

        <?php echo(form_open_multipart($action, 'id="user-profile-3" role="form" class="form-horizontal"')) ?>
            <div class="tabbable">
                <ul class="nav nav-tabs padding-16">
                    <li class="active">
                        <a data-toggle="tab" href="#edit-basic">
                            <i class="green ace-icon fa fa-pencil-square-o bigger-125"></i>
                            Data Guru
                        </a>
                    </li>

                    <li>
                        <a data-toggle="tab" href="#edit-contact">
                            <i class="purple ace-icon fa fa-feed bigger-125"></i>
                            Kontak
                        </a>
                    </li>
                </ul>

                <div class="tab-content profile-edit-tab-content">
                    <div id="edit-basic" class="tab-pane in active">
                        <h4 class="header blue bolder smaller">General</h4>

                        <div class="row">
                            <div class="col-xs-12 col-sm-4">
                                <input type="file" name="file" accept="image/*" />
                            </div>

                            <div class="vspace-12-sm"></div>

                            <div class="col-xs-12 col-sm-8">
                                <div class="form-group">
                                    <label class="col-sm-4 control-label no-padding-right" for="form-field-name">Nama</label>

                                    <div class="col-sm-8">
                                        <input class="col-xs-12 col-sm-10" type="text" name="nama" id="form-field-name" placeholder="Nama lengkap" value="<?php echo $nama ?>" required="true" />
                                    </div>
                                </div>

                                <div class="space-4"></div>

                                <div class="form-group">
                                    <label class="col-sm-4 control-label no-padding-right" for="form-field-jabatan">Jabatan</label>

                                    <div class="col-sm-8">
                                        <input class="col-xs-12 col-sm-10" type="text" id="form-field-jabatan" placeholder="Posisi/Jabatan saat ini" value="<?php echo $jabatan ?>" name="jabatan" required="true" />
                                    </div>
                                </div>
                            </div>
                        </div>

                        <hr />
                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-date">Tanggal Lahir</label>

                            <div class="col-sm-2">
                                <div class="input-medium">
                                    <div class="input-group">
                                        <input class="input-medium date-picker" id="form-field-date" type="text" data-date-format="dd-mm-yyyy" placeholder="dd-mm-yyyy" name="tanggal_lahir" required="true" value="<?php echo $tanggal_lahir ?>" />
                                        <span class="input-group-addon">
                                            <i class="ace-icon fa fa-calendar"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>

                            <label class="col-sm-3 control-label no-padding-right" for="form-field-bp">Tempat Lahir</label>
                            <div class="col-sm-4">
                                <div class="input-medium">
                                    <div class="input-group">
                                        <input class="input-medium" id="form-field-bp" type="text" placeholder="Tempat Lahir" name="tempat_lahir" required="true" value="<?php echo $tempat_lahir ?>" />
                                        <span class="input-group-addon">
                                            <i class="ace-icon fa fa-map-marker"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="space-4"></div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right">Jenis Kelamin</label>

                            <div class="col-sm-9">
                                <label class="inline">
                                    <input name="jenis_kelamin" type="radio" class="ace" value="Pria" <?php echo input_select($jenis_kelamin, "Pria", 'checked="true"') ?> />
                                    <span class="lbl middle"> Pria</span>
                                </label>

                                &nbsp; &nbsp; &nbsp;
                                <label class="inline">
                                    <input name="jenis_kelamin" type="radio" class="ace" value="Wanita" <?php echo input_select($jenis_kelamin, "Wanita", 'checked="true"') ?> />
                                    <span class="lbl middle"> Wanita</span>
                                </label>
                            </div>
                        </div>

                        <div class="space-4"></div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-comment">Alamat</label>

                            <div class="col-sm-9">
                                <textarea id="form-field-comment" name="alamat" class="form-control" required="true" ><?php echo $alamat ?></textarea>
                            </div>
                        </div>
                    </div>

                    <div id="edit-contact" class="tab-pane">
                        
                        <div class="space"></div>
                        <h4 class="header blue bolder smaller">Contact</h4>

                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-email">Email</label>

                            <div class="col-sm-9">
                                <span class="input-icon input-icon-right">
                                    <input type="email" id="form-field-email" value="<?php echo $email ?>" name="email" required="true" />
                                    <i class="ace-icon fa fa-envelope"></i>
                                </span>
                            </div>
                        </div>

                        <div class="space-4"></div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-phone">Phone</label>

                            <div class="col-sm-9">
                                <span class="input-icon input-icon-right">
                                    <input class="input-medium input-mask-phone" type="text" id="form-field-phone" value="<?php echo $hp; ?>" name="hp" required="true" />
                                    <i class="ace-icon fa fa-phone fa-flip-horizontal"></i>
                                </span>
                            </div>
                        </div>

                        <div class="space"></div>
                        <h4 class="header blue bolder smaller">Social</h4>

                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-facebook">Facebook</label>

                            <div class="col-sm-9">
                                <span class="input-icon">
                                    <input type="text" value="<?php echo $fb; ?>" id="form-field-facebook" name="fb" />
                                    <i class="ace-icon fa fa-facebook blue"></i>
                                </span>
                            </div>
                        </div>

                        <div class="space-4"></div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-twitter">Twitter</label>

                            <div class="col-sm-9">
                                <span class="input-icon">
                                    <input type="text" value="<?php echo $twitter; ?>" id="form-field-twitter" name="twitter" />
                                    <i class="ace-icon fa fa-twitter light-blue"></i>
                                </span>
                            </div>
                        </div>

                        <div class="space-4"></div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-gplus">Whatsapp</label>

                            <div class="col-sm-9">
                                <span class="input-icon">
                                    <input type="text" value="<?php echo $whatsapp; ?>" id="form-field-wa" name="whatsapp" />
                                    <i class="ace-icon fa fa-whatsapp green"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

           <input type="hidden" name="oldfoto" value="<?php echo $foto; ?>" /> 
           <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
            <div class="clearfix form-actions">
                <div class="col-md-offset-3 col-md-9">
                    <button class="btn btn-info" type="submit">
                        <i class="ace-icon fa fa-check bigger-110"></i>
                        Save
                    </button>

                    &nbsp; &nbsp;
                    <button class="btn" type="reset">
                        <i class="ace-icon fa fa-undo bigger-110"></i>
                        Reset
                    </button>

                    &nbsp; &nbsp;
                    <button type="button" class="btn btn-danger" onclick="window.history.go(-1)">Batalkan</button>
                </div>
            </div>           
        </form>