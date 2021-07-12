
        <form action="<?php echo $action; ?>" method="post">

            <div class="form-group">
                <label for="varchar">Nama <?php echo form_error('nama') ?></label>
                <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama" value="<?php echo $nama; ?>" maxlength="50" />
            </div>
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="form-group">
                        <label for="varchar">Username <small class="text-danger"><?php echo $this->session->userdata('ci_flash_message'); ?></small></label>
                        <input type="text" class="form-control" name="newusername" id="username" placeholder="Username" value="<?php echo $username; ?>" maxlength="35" />
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="form-group">
                        <label for="varchar">Password <?php echo form_error('password') ?></label>
                        <input type="password" class="form-control" name="password" id="password" placeholder="Password" value="<?php echo $password; ?>" maxlength="100" />
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="form-group">
                        <label for="varchar">Email <?php echo form_error('email') ?></label>
                        <input type="text" class="form-control" name="email" id="email" placeholder="Email" value="<?php echo $email; ?>" maxlength="50" required="true" />
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="form-group">
                        <label for="varchar">Telp <?php echo form_error('telp') ?></label>
                        <input type="text" class="form-control" name="telp" id="telp" placeholder="Telp" value="<?php echo $telp; ?>" maxlength="22" required="true" />
                    </div>
                </div>
            </div>
           <input type="hidden" name="username" value="<?php echo $username; ?>" /> 
           <button type="submit" class="btn btn-primary"><?php echo $button ?></button>
           <button type="button" class="btn btn-seccondary" onclick="window.history.go(-1)">Batalkan</button>
        </form>